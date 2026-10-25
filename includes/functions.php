<?php
// includes/functions.php - Helper functions for Amma's Recipe Book

declare(strict_types=1);

/**
 * Sanitize and escape string for HTML output
 */
function h(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Get all recipes
 */
function get_all_recipes(): array {
    global $recipes;
    return $recipes ?? [];
}

/**
 * Find recipe by ID or Slug
 */
function find_recipe_by_id(string $id): ?array {
    $recipes = get_all_recipes();
    foreach ($recipes as $r) {
        if (isset($r['id']) && strtolower($r['id']) === strtolower(trim($id))) {
            return $r;
        }
    }
    return null;
}

/**
 * Get all categories with recipe counts and icons
 */
function get_categories_with_meta(): array {
    $recipes = get_all_recipes();
    $counts = [];
    foreach ($recipes as $r) {
        $cat = $r['category'] ?? 'Other';
        $counts[$cat] = ($counts[$cat] ?? 0) + 1;
    }

    $meta = [
        'South Indian Breakfast' => ['icon' => '🥞', 'color' => '#E65100', 'desc' => 'Soft idlis, crispy dosas, fluffy vadas & upma'],
        'Andhra Specialities'   => ['icon' => '🌶️', 'color' => '#C62828', 'desc' => 'Spicy, tangy & authentic Telugu household favorites'],
        'North Indian Dishes'   => ['icon' => '🫓', 'color' => '#D84315', 'desc' => 'Rich gravies, stuffed parathas & butter paneer'],
        'Rice and Biryani'      => ['icon' => '🍚', 'color' => '#F57C00', 'desc' => 'Fragrant pulaos, biryanis & comforting variety rices'],
        'Vegetarian Curries'    => ['icon' => '🍲', 'color' => '#2E7D32', 'desc' => 'Everyday home-style vegetable curries & fries'],
        'Non-Vegetarian Dishes' => ['icon' => '🍗', 'color' => '#8D2424', 'desc' => 'Spicy chicken curries, eggs & seafood specials'],
        'Dal and Sambar'        => ['icon' => '🥣', 'color' => '#EF6C00', 'desc' => 'Wholesome lentil stews, comforting pappus & sambars'],
        'Rasam and Soups'       => ['icon' => '🍵', 'color' => '#AD1457', 'desc' => 'Tangy, peppery broths that soothe the soul'],
        'Chutneys and Pickles'  => ['icon' => '🫙', 'color' => '#6A1B9A', 'desc' => 'Freshly ground pachadis, spicy podis & pickles'],
        'Evening Snacks'        => ['icon' => '🥟', 'color' => '#E65100', 'desc' => 'Crispy pakodis, hot bajji & tea-time snacks'],
        'Sweets and Desserts'   => ['icon' => '🍨', 'color' => '#C2185B', 'desc' => 'Traditional payasams, kesari & festive mithais'],
        'Drinks and Juices'     => ['icon' => '🍹', 'color' => '#00838F', 'desc' => 'Cooling buttermilk, herbal teas & fresh juices'],
        'Quick Meals'           => ['icon' => '⏱️', 'color' => '#0277BD', 'desc' => 'Speedy 20-30 min recipes for busy weekdays'],
        'Healthy Recipes'       => ['icon' => '🥗', 'color' => '#2E7D32', 'desc' => 'Nutritious, high-fiber, low-oil dishes'],
        'Festival Special Recipes' => ['icon' => '🪔', 'color' => '#B71C1C', 'desc' => 'Traditional offerings & auspicious festive delicacies'],
    ];

    $result = [];
    foreach ($meta as $name => $info) {
        $result[] = [
            'name' => $name,
            'count' => $counts[$name] ?? 0,
            'icon' => $info['icon'],
            'color' => $info['color'],
            'desc' => $info['desc']
        ];
    }

    // Add any category from recipes that wasn't in predefined meta
    foreach ($counts as $cat => $count) {
        if (!isset($meta[$cat])) {
            $result[] = [
                'name' => $cat,
                'count' => $count,
                'icon' => '🍳',
                'color' => '#5D4037',
                'desc' => 'Delicious homemade recipes'
            ];
        }
    }

    return $result;
}

/**
 * Filter and search recipes
 */
function search_and_filter_recipes(
    array $recipes,
    string $query = '',
    string $category = '',
    string $type = '', // 'Vegetarian' or 'Non-Vegetarian'
    string $time_filter = '', // 'under30', 'under45', 'all'
    string $difficulty = '', // 'Easy', 'Medium', 'Hard'
    string $sort = 'name_asc' // 'name_asc', 'time_asc', 'difficulty_asc'
): array {
    $results = [];
    $query = strtolower(trim($query));
    $category = trim($category);
    $type = trim($type);
    $difficulty = trim($difficulty);

    foreach ($recipes as $r) {
        // Category filter
        if ($category !== '' && strtolower($r['category']) !== strtolower($category)) {
            continue;
        }

        // Type filter (Veg / Non-Veg)
        if ($type !== '' && strtolower($r['type']) !== strtolower($type)) {
            continue;
        }

        // Difficulty filter
        if ($difficulty !== '' && strtolower($r['difficulty']) !== strtolower($difficulty)) {
            continue;
        }

        // Time filter
        $total_time = ($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0);
        if ($time_filter === 'under30' && $total_time > 30) {
            continue;
        }
        if ($time_filter === 'under45' && $total_time > 45) {
            continue;
        }

        // Text query search: Dish name, regional/telugu name, cuisine, ingredients, description
        if ($query !== '') {
            $matched = false;
            if (str_contains(strtolower($r['name'] ?? ''), $query)) {
                $matched = true;
            } elseif (str_contains(strtolower($r['regional_name'] ?? ''), $query)) {
                $matched = true;
            } elseif (str_contains(strtolower($r['cuisine'] ?? ''), $query)) {
                $matched = true;
            } elseif (str_contains(strtolower($r['category'] ?? ''), $query)) {
                $matched = true;
            } elseif (str_contains(strtolower($r['description'] ?? ''), $query)) {
                $matched = true;
            } else {
                // Check in ingredients
                foreach ($r['ingredients'] ?? [] as $ing) {
                    if (str_contains(strtolower($ing['name'] ?? ''), $query)) {
                        $matched = true;
                        break;
                    }
                }
            }

            if (!$matched) {
                continue;
            }
        }

        $results[] = $r;
    }

    // Sort
    usort($results, function($a, $b) use ($sort) {
        if ($sort === 'time_asc') {
            $tA = ($a['prep_time'] ?? 0) + ($a['cook_time'] ?? 0);
            $tB = ($b['prep_time'] ?? 0) + ($b['cook_time'] ?? 0);
            return $tA <=> $tB;
        } elseif ($sort === 'difficulty_asc') {
            $diffOrder = ['Easy' => 1, 'Medium' => 2, 'Hard' => 3];
            $dA = $diffOrder[$a['difficulty'] ?? 'Easy'] ?? 2;
            $dB = $diffOrder[$b['difficulty'] ?? 'Easy'] ?? 2;
            return $dA <=> $dB;
        } else {
            // Default: A-Z
            return strcasecmp($a['name'] ?? '', $b['name'] ?? '');
        }
    });

    return $results;
}

/**
 * Format quantity number for display (e.g. 0.5 -> 1/2 or 0.5, avoid trailing zeros)
 */
function format_quantity(float|int|string|null $qty): string {
    if ($qty === null || $qty === '') return '';
    $val = (float)$qty;
    if ($val == 0) return '';
    
    // Check common fractions
    if (abs($val - 0.25) < 0.001) return '¼';
    if (abs($val - 0.5) < 0.001) return '½';
    if (abs($val - 0.75) < 0.001) return '¾';
    if (abs($val - 1.5) < 0.001) return '1 ½';
    if (abs($val - 2.5) < 0.001) return '2 ½';
    
    // Whole numbers
    if (floor($val) == $val) {
        return (string)(int)$val;
    }
    
    // Trim trailing zeros
    return rtrim(rtrim(number_format($val, 2, '.', ''), '0'), '.');
}

/**
 * Render a beautiful recipe card
 */
function render_recipe_card(array $recipe): void {
    $id = h($recipe['id'] ?? '');
    $name = h($recipe['name'] ?? '');
    $regName = !empty($recipe['regional_name']) ? h($recipe['regional_name']) : '';
    $category = h($recipe['category'] ?? '');
    $type = h($recipe['type'] ?? 'Vegetarian');
    $isVeg = strtolower($type) === 'vegetarian';
    $prep = (int)($recipe['prep_time'] ?? 0);
    $cook = (int)($recipe['cook_time'] ?? 0);
    $totalTime = $prep + $cook;
    $servings = (int)($recipe['servings'] ?? 4);
    $difficulty = h($recipe['difficulty'] ?? 'Easy');
    $desc = h($recipe['description'] ?? '');
    $image = !empty($recipe['image']) ? h($recipe['image']) : '';
    $icon = $recipe['icon'] ?? '🍲';

    ?>
    <article class="recipe-card" data-recipe-id="<?= $id ?>" data-type="<?= strtolower($type) ?>">
        <a href="recipe.php?id=<?= urlencode($id) ?>" class="card-image-link" aria-label="View recipe for <?= $name ?>">
            <div class="card-image-wrap">
                <?php if ($image && file_exists(__DIR__ . '/../' . ltrim($recipe['image'], '/'))): ?>
                    <img src="<?= $image ?>" alt="<?= $name ?>" class="card-img" loading="lazy">
                <?php else: ?>
                    <div class="card-placeholder-img" style="background: <?= $recipe['accent_color'] ?? '#FFF3E0' ?>;">
                        <span class="recipe-icon" aria-hidden="true"><?= $icon ?></span>
                        <span class="cuisine-pill"><?= h($recipe['cuisine'] ?? 'Indian') ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-badges">
                    <span class="diet-badge <?= $isVeg ? 'veg' : 'non-veg' ?>" title="<?= $type ?>">
                        <span class="diet-dot"></span> <?= $isVeg ? 'Veg' : 'Non-Veg' ?>
                    </span>
                    <span class="diff-badge diff-<?= strtolower($difficulty) ?>"><?= $difficulty ?></span>
                </div>
                <button type="button" class="btn-fav-card" data-fav-id="<?= $id ?>" aria-label="Save to favorites" title="Save to favorites">
                    <svg class="heart-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>
            </div>
        </a>

        <div class="card-body">
            <div class="card-meta-top">
                <span class="card-cat"><?= $category ?></span>
                <span class="card-time" title="Total preparation & cooking time">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px; margin-right: 3px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <?= $totalTime ?> mins
                </span>
            </div>

            <h3 class="card-title">
                <a href="recipe.php?id=<?= urlencode($id) ?>">
                    <?= $name ?>
                </a>
            </h3>

            <?php if ($regName): ?>
                <p class="card-regional"><?= $regName ?></p>
            <?php endif; ?>

            <p class="card-desc"><?= $desc ?></p>

            <div class="card-footer">
                <div class="card-servings">
                    <span>👥 <?= $servings ?> Servings</span>
                </div>
                <a href="recipe.php?id=<?= urlencode($id) ?>" class="btn-view-recipe">
                    View Recipe
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </article>
    <?php
}

/**
 * Get related recipes from same category or cuisine
 */
function get_related_recipes(array $currentRecipe, int $limit = 3): array {
    $all = get_all_recipes();
    $related = [];
    $currId = $currentRecipe['id'] ?? '';
    $currCat = $currentRecipe['category'] ?? '';
    $currCuisine = $currentRecipe['cuisine'] ?? '';

    // First try same category
    foreach ($all as $r) {
        if (($r['id'] ?? '') === $currId) continue;
        if (($r['category'] ?? '') === $currCat) {
            $related[] = $r;
            if (count($related) >= $limit) return $related;
        }
    }

    // Then try same cuisine
    foreach ($all as $r) {
        if (($r['id'] ?? '') === $currId) continue;
        if (!in_array($r, $related, true) && ($r['cuisine'] ?? '') === $currCuisine) {
            $related[] = $r;
            if (count($related) >= $limit) return $related;
        }
    }

    // Fill remaining with any recipe
    foreach ($all as $r) {
        if (($r['id'] ?? '') === $currId) continue;
        if (!in_array($r, $related, true)) {
            $related[] = $r;
            if (count($related) >= $limit) break;
        }
    }

    return $related;
}

/**
 * Get related Academy lessons for a given recipe
 */
function get_related_lessons_for_recipe(array $recipe): array {
    $matched = [];
    $recipeId = $recipe['id'] ?? '';
    $explicitLessons = $recipe['related_lessons'] ?? [];

    if (function_exists('get_academy_lessons')) {
        $allLessons = get_academy_lessons();

        // 1. Check explicit lesson IDs in recipe
        foreach ($explicitLessons as $lId) {
            if (isset($allLessons[$lId]) && !isset($matched[$lId])) {
                $matched[$lId] = $allLessons[$lId];
            }
        }

        // 2. Check reverse mapping in lessons
        foreach ($allLessons as $lId => $lesson) {
            $relatedR = $lesson['related_recipes'] ?? [];
            if (in_array($recipeId, $relatedR, true) && !isset($matched[$lId])) {
                $matched[$lId] = $lesson;
            }
        }

        // 3. Category heuristics if still empty
        if (empty($matched)) {
            $cat = strtolower($recipe['category'] ?? '');
            if (str_contains($cat, 'breakfast')) {
                if (isset($allLessons['int-fermentation'])) $matched['int-fermentation'] = $allLessons['int-fermentation'];
            } elseif (str_contains($cat, 'curry') || str_contains($cat, 'north')) {
                if (isset($allLessons['int-onion-tomato-masala'])) $matched['int-onion-tomato-masala'] = $allLessons['int-onion-tomato-masala'];
                if (isset($allLessons['int-curry-bases'])) $matched['int-curry-bases'] = $allLessons['int-curry-bases'];
            } elseif (str_contains($cat, 'rice') || str_contains($cat, 'biryani')) {
                if (isset($allLessons['int-rice-perfection'])) $matched['int-rice-perfection'] = $allLessons['int-rice-perfection'];
                if (str_contains($cat, 'biryani') && isset($allLessons['adv-dum-science'])) $matched['adv-dum-science'] = $allLessons['adv-dum-science'];
            } elseif (str_contains($cat, 'dal') || str_contains($cat, 'sambar')) {
                if (isset($allLessons['int-tempering-mastery'])) $matched['int-tempering-mastery'] = $allLessons['int-tempering-mastery'];
            } elseif (str_contains($cat, 'sweet') || str_contains($cat, 'dessert')) {
                if (isset($allLessons['adv-sugar-syrup-science'])) $matched['adv-sugar-syrup-science'] = $allLessons['adv-sugar-syrup-science'];
            }
        }
    }

    return array_values($matched);
}
