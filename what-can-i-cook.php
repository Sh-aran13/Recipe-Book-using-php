<?php
// what-can-i-cook.php - Transparent Ingredient-Based Recipe Discovery Engine
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "What Can I Cook? — Amma's Pantry Discovery Engine";
$current_page = 'what_can_i_cook';

// Comprehensive catalog of common household ingredients
$pantryCategories = [
    'Staples & Grains' => [
        'Rice', 'Basmati Rice', 'Poha (Flattened rice)', 'Rava / Sooji', 'Whole Wheat Flour (Atta)', 
        'All-Purpose Flour (Maida)', 'Vermicelli (Semiya)', 'Bread'
    ],
    'Lentils & Pulses' => [
        'Toor Dal', 'Moong Dal', 'Urad Dal', 'Chana Dal', 'Chickpeas (Chana)', 'Rajma (Kidney beans)'
    ],
    'Vegetables' => [
        'Onions', 'Tomatoes', 'Potatoes', 'Green Chillies', 'Ginger', 'Garlic', 'Carrots', 
        'Green Beans', 'Green Peas', 'Capsicum (Bell Pepper)', 'Brinjal (Eggplant)', 'Okra (Ladyfinger)',
        'Spinach (Palak)', 'Cabbage', 'Cauliflower', 'Curry Leaves', 'Coriander Leaves'
    ],
    'Dairy & Proteins' => [
        'Milk', 'Curd / Yogurt', 'Paneer', 'Butter', 'Desi Ghee', 'Chicken', 'Eggs', 'Fresh Coconut'
    ],
    'Spices & Pantry' => [
        'Mustard Seeds', 'Cumin Seeds', 'Turmeric Powder', 'Red Chilli Powder', 'Coriander Powder',
        'Garam Masala', 'Asafoetida (Hing)', 'Tamarind', 'Lemon', 'Kasuri Methi', 'Peanuts', 'Cashews'
    ]
];

// Capture submitted ingredients from GET
$selectedIngredients = $_GET['ingredients'] ?? [];
if (!is_array($selectedIngredients)) {
    $selectedIngredients = array_filter(array_map('trim', explode(',', (string)$selectedIngredients)));
}
$selectedIngredients = array_map('trim', $selectedIngredients);
$selectedIngredients = array_filter($selectedIngredients);

// Filters
$typeFilter = trim($_GET['type'] ?? 'all'); // 'all', 'Vegetarian', 'Non-Vegetarian'
$maxTime = (int)($_GET['time'] ?? 0); // 0 = all, 30, 45, 60
$diffFilter = trim($_GET['diff'] ?? 'all'); // 'all', 'Easy', 'Medium', 'Hard'

/**
 * Transparent match calculation
 */
$matches = [];
if (!empty($selectedIngredients)) {
    // Normalize selected lower-case
    $selectedNorm = array_map('strtolower', $selectedIngredients);

    foreach ($recipes as $r) {
        // Apply filters
        if ($typeFilter !== 'all' && strcasecmp($r['type'] ?? '', $typeFilter) !== 0) {
            continue;
        }
        $totalTime = ($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0);
        if ($maxTime > 0 && $totalTime > $maxTime) {
            continue;
        }
        if ($diffFilter !== 'all' && strcasecmp($r['difficulty'] ?? '', $diffFilter) !== 0) {
            continue;
        }

        $ingList = $r['ingredients'] ?? [];
        if (empty($ingList)) continue;

        $totalRequired = 0;
        $matchedCount = 0;
        $availableList = [];
        $missingList = [];

        foreach ($ingList as $ing) {
            $rawName = $ing['name'] ?? '';
            if (empty($rawName)) continue;

            // Skip water and basic salt from match penalty (everyone has water and salt)
            $low = strtolower($rawName);
            if (str_contains($low, 'water') || $low === 'salt' || str_contains($low, 'salt (')) {
                continue;
            }

            $totalRequired++;
            $foundMatch = false;

            foreach ($selectedNorm as $sel) {
                // Check if pantry item matches recipe ingredient substring
                if (str_contains($low, $sel) || str_contains($sel, $low)) {
                    $foundMatch = true;
                    break;
                }
            }

            if ($foundMatch) {
                $matchedCount++;
                $availableList[] = $rawName;
            } else {
                $missingList[] = $rawName;
            }
        }

        if ($totalRequired === 0) continue;

        $matchPct = (int)round(($matchedCount / $totalRequired) * 100);

        // Only include if at least 15% match
        if ($matchPct >= 15) {
            $matches[] = [
                'recipe' => $r,
                'match_pct' => $matchPct,
                'matched_count' => $matchedCount,
                'total_required' => $totalRequired,
                'available' => $availableList,
                'missing' => $missingList
            ];
        }
    }

    // Sort by match percentage descending, then total time ascending
    usort($matches, function($a, $b) {
        if ($b['match_pct'] !== $a['match_pct']) {
            return $b['match_pct'] <=> $a['match_pct'];
        }
        $tA = ($a['recipe']['prep_time'] ?? 0) + ($a['recipe']['cook_time'] ?? 0);
        $tB = ($b['recipe']['prep_time'] ?? 0) + ($b['recipe']['cook_time'] ?? 0);
        return $tA <=> $tB;
    });
}

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED STYLES FOR WHAT CAN I COOK -->
<style>
    .pantry-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
        padding: 40px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .pantry-layout {
        display: grid;
        grid-template-columns: 340px 1fr;
        gap: 32px;
        align-items: start;
        margin: 36px 0 60px;
    }
    .pantry-sidebar {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 24px;
        box-shadow: var(--shadow-card);
        position: sticky;
        top: 90px;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
    }
    .pantry-group {
        margin-bottom: 20px;
        border-bottom: 1px dashed var(--border-color);
        padding-bottom: 16px;
    }
    .pantry-group:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .pantry-group-title {
        font-size: 13.5px;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .ingredient-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--bg-warm);
        border: 1px solid var(--border-warm);
        padding: 5px 12px;
        border-radius: var(--radius-pill);
        font-size: 13px;
        color: var(--text-main);
        cursor: pointer;
        user-select: none;
        transition: var(--transition);
        margin: 3px;
    }
    .ingredient-chip:hover {
        border-color: var(--primary);
        background: #FFF;
    }
    .ingredient-chip.selected {
        background: #C2410C;
        color: #FFF;
        border-color: #C2410C;
        font-weight: 700;
    }
    .match-card {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 24px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 20px;
        transition: var(--transition);
        display: grid;
        grid-template-columns: 140px 1fr auto;
        gap: 24px;
        align-items: center;
    }
    .match-card:hover {
        border-color: #FDBA74;
        box-shadow: var(--shadow-md);
    }
    .match-gauge {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        line-height: 1.1;
        box-shadow: var(--shadow-sm);
        flex-shrink: 0;
    }
    .ing-tag-pill {
        display: inline-block;
        font-size: 11.5px;
        padding: 2px 8px;
        border-radius: var(--radius-pill);
        margin: 2px;
    }
    @media (max-width: 900px) {
        .pantry-layout { grid-template-columns: 1fr; }
        .pantry-sidebar { position: static; max-height: none; }
        .match-card { grid-template-columns: 1fr; }
    }
</style>

<!-- PANTRY HERO -->
<section class="pantry-hero">
    <div class="container">
        <div style="max-width: 800px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
                <a href="index.php" style="color: var(--primary);">Home</a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);">What Can I Cook?</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(28px, 4vw, 38px); font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                🥕 What Can I Cook Today?
            </h1>
            <p style="font-size: 16px; color: var(--text-muted); line-height: 1.6;">
                Check off the ingredients you currently have in your kitchen. Our local smart matching engine instantly reveals delicious homestyle recipes you can make right now.
            </p>
        </div>
    </div>
</section>

<!-- MAIN DISCOVERY WORKSPACE -->
<div class="container">
    <div class="pantry-layout">
        
        <!-- SIDEBAR: INGREDIENT SELECTOR & FILTERS -->
        <aside class="pantry-sidebar">
            <form action="what-can-i-cook.php" method="GET" id="pantryForm">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                    <h2 style="font-size: 16px; font-weight: 800; color: var(--earth-brown);">
                        🛒 Your Available Pantry
                    </h2>
                    <button type="button" id="btnClearPantry" style="background: none; border: none; color: var(--primary); font-size: 12.5px; font-weight: 700; cursor: pointer;">
                        Reset All
                    </button>
                </div>

                <!-- QUICK SELECTION SHORTCUTS -->
                <div style="margin-bottom: 18px; display: flex; gap: 6px; flex-wrap: wrap;">
                    <button type="button" class="btn btn-secondary" id="btnQuickSouthIndian" style="padding: 4px 10px; font-size: 11.5px; border-radius: var(--radius-pill);">
                        + South Indian Staples
                    </button>
                    <button type="button" class="btn btn-secondary" id="btnQuickVeggies" style="padding: 4px 10px; font-size: 11.5px; border-radius: var(--radius-pill);">
                        + Basic Veggies
                    </button>
                </div>

                <!-- FILTER ROW -->
                <div style="background: var(--bg-warm); padding: 14px; border-radius: var(--radius-md); margin-bottom: 20px; border: 1px solid var(--border-warm);">
                    <div style="font-size: 12px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px;">
                        Filter Dishes
                    </div>
                    
                    <div style="margin-bottom: 10px;">
                        <select name="type" onchange="this.form.submit()" style="width: 100%; height: 36px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 13.5px; padding: 0 8px; background: #FFF;">
                            <option value="all" <?= $typeFilter === 'all' ? 'selected' : '' ?>>All Diet Types</option>
                            <option value="Vegetarian" <?= $typeFilter === 'Vegetarian' ? 'selected' : '' ?>>Vegetarian Only (🌱)</option>
                            <option value="Non-Vegetarian" <?= $typeFilter === 'Non-Vegetarian' ? 'selected' : '' ?>>Non-Vegetarian (🍗)</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 10px;">
                        <select name="time" onchange="this.form.submit()" style="width: 100%; height: 36px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 13.5px; padding: 0 8px; background: #FFF;">
                            <option value="0" <?= $maxTime === 0 ? 'selected' : '' ?>>Any Cooking Time</option>
                            <option value="30" <?= $maxTime === 30 ? 'selected' : '' ?>>Quick (Under 30 mins)</option>
                            <option value="45" <?= $maxTime === 45 ? 'selected' : '' ?>>Under 45 mins</option>
                            <option value="60" <?= $maxTime === 60 ? 'selected' : '' ?>>Under 60 mins</option>
                        </select>
                    </div>

                    <div>
                        <select name="diff" onchange="this.form.submit()" style="width: 100%; height: 36px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 13.5px; padding: 0 8px; background: #FFF;">
                            <option value="all" <?= $diffFilter === 'all' ? 'selected' : '' ?>>All Difficulties</option>
                            <option value="Easy" <?= $diffFilter === 'Easy' ? 'selected' : '' ?>>Easy Only</option>
                            <option value="Medium" <?= $diffFilter === 'Medium' ? 'selected' : '' ?>>Medium</option>
                            <option value="Hard" <?= $diffFilter === 'Hard' ? 'selected' : '' ?>>Hard</option>
                        </select>
                    </div>
                </div>

                <!-- CATEGORIZED CHIPS -->
                <?php foreach ($pantryCategories as $grpName => $grpItems): ?>
                    <div class="pantry-group">
                        <div class="pantry-group-title">
                            <span><?= h($grpName) ?></span>
                        </div>
                        <div style="display: flex; flex-wrap: wrap;">
                            <?php foreach ($grpItems as $item): ?>
                                <?php $isSelected = in_array($item, $selectedIngredients, true); ?>
                                <label class="ingredient-chip <?= $isSelected ? 'selected' : '' ?>">
                                    <input type="checkbox" name="ingredients[]" value="<?= h($item) ?>" <?= $isSelected ? 'checked' : '' ?> style="display: none;" onchange="document.getElementById('pantryForm').submit()">
                                    <span><?= $isSelected ? '✓' : '+' ?></span>
                                    <span><?= h($item) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; border-radius: var(--radius-pill); font-size: 14.5px; padding: 12px 0;">
                        Find Matching Recipes
                    </button>
                </div>

            </form>
        </aside>

        <!-- RESULTS COLUMN -->
        <main>
            
            <?php if (empty($selectedIngredients)): ?>
                <!-- EMPTY STATE: NO INGREDIENTS SELECTED -->
                <div style="background: #FFF; border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 50px 30px; text-align: center; box-shadow: var(--shadow-sm);">
                    <div style="font-size: 64px; margin-bottom: 16px;">🧺🍳</div>
                    <h2 style="font-family: var(--font-serif); font-size: 26px; color: var(--earth-brown); margin-bottom: 10px;">
                        Select What You Have in Your Kitchen
                    </h2>
                    <p style="color: var(--text-muted); font-size: 15px; max-width: 520px; margin: 0 auto 24px; line-height: 1.6;">
                        Check off items like <strong>Rice, Tomatoes, Onions, Toor Dal, or Potatoes</strong> on the left panel to discover authentic homestyle recipes ready to cook with zero guesswork.
                    </p>
                    <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
                        <a href="what-can-i-cook.php?ingredients[]=Rice&ingredients[]=Tomatoes&ingredients[]=Onions&ingredients[]=Toor+Dal&ingredients[]=Green+Chillies" class="btn btn-primary" style="padding: 10px 22px; border-radius: var(--radius-pill); font-size: 14px;">
                            Try Example: Rice + Dal + Tomatoes
                        </a>
                    </div>
                </div>

            <?php elseif (empty($matches)): ?>
                <!-- EMPTY STATE: NO MATCHES FOUND -->
                <div style="background: #FFF; border: 2px solid var(--border-warm); border-radius: var(--radius-xl); padding: 50px 30px; text-align: center; box-shadow: var(--shadow-sm);">
                    <div style="font-size: 56px; margin-bottom: 14px;">🔍🍲</div>
                    <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown); margin-bottom: 8px;">
                        No Exact Recipes Found for This Combination
                    </h2>
                    <p style="color: var(--text-muted); font-size: 15px; max-width: 520px; margin: 0 auto 20px;">
                        Try selecting a few more staple items like onions, tomatoes, or rice, or clear diet/time filters.
                    </p>
                    <a href="what-can-i-cook.php" class="btn btn-secondary" style="border-radius: var(--radius-pill);">
                        Clear Ingredients Selection
                    </a>
                </div>

            <?php else: ?>
                <!-- MATCH RESULTS HEADER -->
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
                    <div>
                        <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown);">
                            Found <?= count($matches) ?> Matching Recipe<?= count($matches) > 1 ? 's' : '' ?>
                        </h2>
                        <p style="font-size: 14px; color: var(--text-muted);">
                            Sorted by highest match percentage based on <?= count($selectedIngredients) ?> selected ingredients.
                        </p>
                    </div>
                    <div style="font-size: 13px; color: var(--text-light); background: #FFF; border: 1px solid var(--border-warm); padding: 6px 14px; border-radius: var(--radius-pill);">
                        Formula: <strong>Available ÷ Total Required × 100</strong>
                    </div>
                </div>

                <!-- MATCH RESULT CARDS -->
                <div>
                    <?php foreach ($matches as $m): ?>
                        <?php
                            $r = $m['recipe'];
                            $pct = $m['match_pct'];
                            $isFull = $pct >= 85;
                            $gaugeBg = $isFull ? '#DCFCE7' : ($pct >= 50 ? '#FEF3C7' : '#F3F4F6');
                            $gaugeColor = $isFull ? '#15803D' : ($pct >= 50 ? '#B45309' : '#4B5563');
                            $gaugeBorder = $isFull ? '#86EFAC' : ($pct >= 50 ? '#FDE68A' : '#E5E7EB');
                        ?>
                        <article class="match-card">
                            
                            <!-- MATCH GAUGE & ICON -->
                            <div style="text-align: center;">
                                <div class="match-gauge" style="background: <?= $gaugeBg ?>; color: <?= $gaugeColor ?>; border: 2px solid <?= $gaugeBorder ?>; margin: 0 auto 8px;">
                                    <span style="font-size: 20px;"><?= $pct ?>%</span>
                                    <span style="font-size: 10px; text-transform: uppercase;">Match</span>
                                </div>
                                <div style="font-size: 32px;"><?= $r['icon'] ?? '🍲' ?></div>
                            </div>

                            <!-- DETAILS -->
                            <div>
                                <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 6px;">
                                    <span style="font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase;">
                                        <?= h($r['category'] ?? '') ?>
                                    </span>
                                    <span style="color: var(--border-color);">•</span>
                                    <span style="font-size: 12.5px; color: var(--text-muted);">
                                        ⏱️ <?= ($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0) ?> mins
                                    </span>
                                    <span style="color: var(--border-color);">•</span>
                                    <span style="font-size: 12.5px; color: var(--text-muted);">
                                        <?= h($r['difficulty'] ?? 'Easy') ?>
                                    </span>
                                </div>

                                <h3 style="font-family: var(--font-serif); font-size: 21px; font-weight: 700; color: var(--earth-brown); margin-bottom: 6px;">
                                    <a href="recipe.php?id=<?= urlencode($r['id']) ?>" style="color: inherit;">
                                        <?= h($r['name']) ?>
                                    </a>
                                </h3>

                                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5; margin-bottom: 12px;">
                                    <?= h($r['description'] ?? '') ?>
                                </p>

                                <!-- INGREDIENTS BREAKDOWN -->
                                <div style="font-size: 12.5px; line-height: 1.5;">
                                    <div style="margin-bottom: 4px;">
                                        <strong style="color: #15803D;">Available (<?= count($m['available']) ?>):</strong>
                                        <?php foreach ($m['available'] as $av): ?>
                                            <span class="ing-tag-pill" style="background: #DCFCE7; color: #166534; border: 1px solid #BBF7D0;">
                                                ✓ <?= h($av) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php if (!empty($m['missing'])): ?>
                                        <div>
                                            <strong style="color: #991B1B;">Missing (<?= count($m['missing']) ?>):</strong>
                                            <?php foreach (array_slice($m['missing'], 0, 5) as $ms): ?>
                                                <span class="ing-tag-pill" style="background: #FEE2E2; color: #991B1B; border: 1px solid #FECACA;">
                                                    - <?= h($ms) ?>
                                                </span>
                                            <?php endforeach; ?>
                                            <?php if (count($m['missing']) > 5): ?>
                                                <span style="color: var(--text-light); font-size: 11px;">+<?= count($m['missing']) - 5 ?> more</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <!-- ACTION BUTTON -->
                            <div style="text-align: right;">
                                <a href="recipe.php?id=<?= urlencode($r['id']) ?>" class="btn btn-primary" style="padding: 10px 22px; border-radius: var(--radius-pill); font-size: 14px; white-space: nowrap;">
                                    View Recipe →
                                </a>
                            </div>

                        </article>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </main>

    </div>
</div>

<!-- CLIENT JAVASCRIPT FOR SHORTCUTS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const clearBtn = document.getElementById('btnClearPantry');
    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php';
        });
    }

    const southIndianBtn = document.getElementById('btnQuickSouthIndian');
    if (southIndianBtn) {
        southIndianBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php?ingredients[]=Rice&ingredients[]=Toor+Dal&ingredients[]=Urad+Dal&ingredients[]=Mustard+Seeds&ingredients[]=Cumin+Seeds&ingredients[]=Turmeric+Powder&ingredients[]=Curry+Leaves&ingredients[]=Desi+Ghee';
        });
    }

    const veggiesBtn = document.getElementById('btnQuickVeggies');
    if (veggiesBtn) {
        veggiesBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php?ingredients[]=Onions&ingredients[]=Tomatoes&ingredients[]=Potatoes&ingredients[]=Green+Chillies&ingredients[]=Ginger&ingredients[]=Garlic';
        });
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
