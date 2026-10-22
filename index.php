<?php
// index.php - Homepage for Amma's Recipe Book
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "Amma's Recipe Book — Homestyle Cooking Companion";
$current_page = 'home';

// Get categories with counts
$categories = get_categories_with_meta();

// Feature 1: Today's Special (deterministic daily rotation based on day of year)
$dayOfYear = (int)date('z');
$specialIndex = $dayOfYear % count($recipes);
$todaysSpecial = $recipes[$specialIndex];

// Feature 2: Popular Recipes (curated comfort classics)
$popularIds = ['andhra-tomato-pappu', 'soft-idli', 'masala-dosa', 'andhra-chicken-curry', 'hotel-style-sambar', 'punjabi-aloo-paratha'];
$popularRecipes = [];
foreach ($popularIds as $pid) {
    $found = find_recipe_by_id($pid);
    if ($found) $popularRecipes[] = $found;
}

// Feature 3: Quick and Easy Recipes (under 30 minutes total time)
$quickRecipes = array_filter($recipes, function($r) {
    return (($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0)) <= 30 && ($r['difficulty'] ?? 'Easy') === 'Easy';
});
$quickRecipes = array_slice($quickRecipes, 0, 4);

// Feature 4: Traditional Andhra Specialities
$andhraRecipes = array_filter($recipes, function($r) {
    return ($r['cuisine'] ?? '') === 'Andhra' || ($r['category'] ?? '') === 'Andhra Specialities';
});
$andhraRecipes = array_slice($andhraRecipes, 0, 4);

include __DIR__ . '/includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%); padding: 60px 0 70px; border-bottom: 1px solid var(--border-warm); position: relative; overflow: hidden;">
    <!-- Subtle decorative background SVG blobs -->
    <div style="position: absolute; right: -50px; top: -50px; width: 350px; height: 350px; background: radial-gradient(circle, rgba(251, 146, 60, 0.15) 0%, rgba(254, 243, 199, 0) 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; left: -80px; bottom: -80px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(194, 65, 12, 0.1) 0%, rgba(254, 243, 199, 0) 70%); border-radius: 50%; pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div style="max-width: 820px; margin: 0 auto; text-align: center;">
            
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.9); padding: 6px 18px; border-radius: var(--radius-pill); border: 1px solid #FDBA74; margin-bottom: 20px; box-shadow: var(--shadow-sm);">
                <span style="font-size: 18px;">👵</span>
                <span style="color: var(--primary); font-weight: 700; font-size: 13.5px; text-transform: uppercase; letter-spacing: 0.8px;">Amma's Personal Digital Kitchen</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(32px, 5vw, 54px); font-weight: 700; color: var(--earth-brown); line-height: 1.15; margin-bottom: 16px; letter-spacing: -0.5px;">
                What shall we cook today?
            </h1>

            <p style="font-size: clamp(16px, 2vw, 19px); color: var(--text-muted); line-height: 1.6; margin-bottom: 32px; max-width: 640px; margin-left: auto; margin-right: auto;">
                Simple ingredients. Easy steps. Delicious homemade food. Designed specially for you to cook everyday family favorites with confidence.
            </p>

            <!-- PROMINENT SEARCH BAR -->
            <form action="recipes.php" method="GET" style="max-width: 650px; margin: 0 auto 28px; position: relative;">
                <div style="display: flex; align-items: center; background: #FFFFFF; border: 2.5px solid var(--primary); border-radius: var(--radius-pill); padding: 6px 8px 6px 24px; box-shadow: 0 10px 25px -5px rgba(194, 65, 12, 0.18);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C2410C" stroke-width="2.5" style="margin-right: 12px; flex-shrink: 0;">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="q" placeholder="Search for a dish, ingredient, or recipe (e.g. Idli, Tomato Pappu, Chicken)..." aria-label="Search recipes" style="border: none; outline: none; width: 100%; font-size: 16px; color: var(--text-main); background: transparent;">
                    <button type="submit" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px; border-radius: var(--radius-pill); flex-shrink: 0;">
                        Find Recipe
                    </button>
                </div>
            </form>

            <!-- QUICK POPULAR SEARCH TAGS -->
            <div style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; gap: 8px; font-size: 13.5px; color: var(--text-muted);">
                <span style="font-weight: 600;">Popular searches:</span>
                <a href="recipes.php?q=Dosa" style="background: rgba(255,255,255,0.8); padding: 4px 12px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); color: var(--earth-brown);">🥞 Dosa</a>
                <a href="recipes.php?q=Pappu" style="background: rgba(255,255,255,0.8); padding: 4px 12px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); color: var(--earth-brown);">🥣 Andhra Pappu</a>
                <a href="recipes.php?q=Biryani" style="background: rgba(255,255,255,0.8); padding: 4px 12px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); color: var(--earth-brown);">🍗 Dum Biryani</a>
                <a href="recipes.php?q=Chutney" style="background: rgba(255,255,255,0.8); padding: 4px 12px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); color: var(--earth-brown);">🥥 Chutneys</a>
                <a href="recipes.php?q=Payasam" style="background: rgba(255,255,255,0.8); padding: 4px 12px; border-radius: var(--radius-pill); border: 1px solid var(--border-color); color: var(--earth-brown);">🍨 Payasam</a>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 1: TODAY'S SPECIAL SPOTLIGHT BANNER -->
<section style="padding: 40px 0 20px;">
    <div class="container">
        <div style="background: linear-gradient(135deg, #FFF8EE 0%, #FFFFFF 100%); border: 2px solid #FED7AA; border-radius: var(--radius-xl); padding: 32px; box-shadow: var(--shadow-card); display: grid; grid-template-columns: 1fr 1.3fr; gap: 32px; align-items: center;">
            
            <!-- SPECIAL LEFT: BADGE & VISUAL -->
            <div style="position: relative; background: <?= $todaysSpecial['accent_color'] ?? '#FFF3E0' ?>; border-radius: var(--radius-lg); height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 1px solid var(--border-warm);">
                <div style="position: absolute; top: 14px; left: 14px; background: #C2410C; color: #FFF; font-size: 12px; font-weight: 700; padding: 4px 14px; border-radius: var(--radius-pill); box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 6px;">
                    <span>⭐</span> TODAY'S SPECIAL RECOMMENDATION
                </div>
                <span style="font-size: 96px; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.12));">
                    <?= $todaysSpecial['icon'] ?? '🍲' ?>
                </span>
                <span style="position: absolute; bottom: 14px; right: 14px; background: rgba(255,255,255,0.9); font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: var(--radius-pill); color: var(--earth-brown);">
                    <?= h($todaysSpecial['category'] ?? '') ?>
                </span>
            </div>

            <!-- SPECIAL RIGHT: DETAILS -->
            <div>
                <div class="section-eyebrow">Fresh Daily Pick</div>
                <h2 style="font-family: var(--font-serif); font-size: 30px; font-weight: 700; color: var(--earth-brown); margin-bottom: 6px;">
                    <?= h($todaysSpecial['name']) ?>
                </h2>
                <?php if (!empty($todaysSpecial['regional_name'])): ?>
                    <p style="color: var(--primary); font-weight: 600; font-size: 15px; margin-bottom: 12px;">
                        <?= h($todaysSpecial['regional_name']) ?>
                    </p>
                <?php endif; ?>

                <p style="color: var(--text-muted); font-size: 15px; line-height: 1.6; margin-bottom: 20px;">
                    <?= h($todaysSpecial['description']) ?>
                </p>

                <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap; margin-bottom: 24px; font-size: 14px; font-weight: 600; color: var(--text-muted);">
                    <span style="display: inline-flex; align-items: center; gap: 6px;">
                        ⏱️ <?= (int)$todaysSpecial['prep_time'] + (int)$todaysSpecial['cook_time'] ?> mins total
                    </span>
                    <span style="display: inline-flex; align-items: center; gap: 6px;">
                        👥 <?= (int)$todaysSpecial['servings'] ?> Servings
                    </span>
                    <span style="display: inline-flex; align-items: center; gap: 6px;">
                        📊 <?= h($todaysSpecial['difficulty']) ?>
                    </span>
                    <span class="diet-badge <?= strtolower($todaysSpecial['type'] ?? '') === 'vegetarian' ? 'veg' : 'non-veg' ?>">
                        <span class="diet-dot"></span> <?= h($todaysSpecial['type']) ?>
                    </span>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="recipe.php?id=<?= urlencode($todaysSpecial['id']) ?>" class="btn btn-primary" style="padding: 12px 26px;">
                        Cook Today's Special →
                    </a>
                    <a href="recipes.php" class="btn btn-secondary">
                        Browse Full Menu
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: RECIPE CATEGORIES CAROUSEL / GRID -->
<section style="padding: 60px 0 40px;">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Explore By Category</span>
                <h2 class="section-heading">Browse Recipes by Course & Cuisine</h2>
                <p class="section-subheading">From morning tiffins to Andhra feasts and festive sweets, find exactly what Amma wants to make.</p>
            </div>
            <a href="categories.php" class="btn btn-secondary">View All 15 Categories →</a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 16px;">
            <?php foreach (array_slice($categories, 0, 10) as $cat): ?>
                <a href="recipes.php?cat=<?= urlencode($cat['name']) ?>" style="background: var(--bg-surface); border: 1.5px solid var(--border-warm); border-radius: var(--radius-lg); padding: 20px 16px; text-align: center; display: flex; flex-direction: column; align-items: center; box-shadow: var(--shadow-sm); transition: var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#FDBA74'; this.style.boxShadow='var(--shadow-md)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--border-warm)'; this.style.boxShadow='var(--shadow-sm)';">
                    <div style="width: 58px; height: 58px; border-radius: 50%; background: #FFF8EE; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 12px; border: 1px solid #FED7AA;">
                        <?= $cat['icon'] ?>
                    </div>
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--earth-brown); margin-bottom: 4px; line-height: 1.3;">
                        <?= h($cat['name']) ?>
                    </h3>
                    <span style="font-size: 12px; color: var(--primary); font-weight: 600;">
                        <?= $cat['count'] ?> recipes
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 3: POPULAR FAMILY RECIPES -->
<section style="padding: 50px 0; background: var(--bg-warm); border-top: 1px solid var(--border-warm); border-bottom: 1px solid var(--border-warm);">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">All-Time Comforts</span>
                <h2 class="section-heading">Most Popular Recipes</h2>
                <p class="section-subheading">Timeless homestyle dishes that make every meal feel like a warm hug.</p>
            </div>
            <a href="recipes.php" class="btn btn-secondary">View All Recipes (42) →</a>
        </div>

        <div class="recipes-grid">
            <?php foreach ($popularRecipes as $r): ?>
                <?php render_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 4: TRADITIONAL ANDHRA SPECIALITIES -->
<section style="padding: 60px 0 40px;">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Homeland Flavors</span>
                <h2 class="section-heading">Traditional Andhra Specialities</h2>
                <p class="section-subheading">Authentic Telugu recipes made with rich roasted spices, tangy tamarind, garlic, and pure desi ghee.</p>
            </div>
            <a href="recipes.php?cat=Andhra+Specialities" class="btn btn-secondary">Explore Andhra Dishes →</a>
        </div>

        <div class="recipes-grid">
            <?php foreach ($andhraRecipes as $r): ?>
                <?php render_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 5: QUICK & EASY (UNDER 30 MINS) -->
<section style="padding: 60px 0; background: #FFF; border-top: 1px solid var(--border-warm);">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Busy Weekdays</span>
                <h2 class="section-heading">Quick & Easy (Under 30 Mins)</h2>
                <p class="section-subheading">Speedy, fuss-free meals when you want something fresh, hot, and delicious in a jiffy.</p>
            </div>
            <a href="recipes.php?filter=quick" class="btn btn-secondary">See All Quick Recipes →</a>
        </div>

        <div class="recipes-grid">
            <?php foreach ($quickRecipes as $r): ?>
                <?php render_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 6: RECENTLY VIEWED RECIPES (DYNAMICALLY LOADED VIA LOCALSTORAGE) -->
<section id="recentRecipesSection" style="padding: 60px 0; display: none; background: var(--bg-warm); border-top: 1px solid var(--border-warm);">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Your Cooking History</span>
                <h2 class="section-heading">Recently Viewed Recipes</h2>
                <p class="section-subheading">Pick up right where you left off on this device.</p>
            </div>
            <button type="button" id="btnClearRecents" style="background: none; border: none; color: var(--text-muted); font-size: 13.5px; text-decoration: underline; cursor: pointer;">
                Clear History
            </button>
        </div>

        <div class="recipes-grid" id="recentRecipesGrid">
            <!-- Populated via client-side JavaScript -->
        </div>
    </div>
</section>

<!-- CLIENT SCRIPT TO RENDER RECENTLY VIEWED ON HOMEPAGE -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const recents = window.AmmaStorage ? window.AmmaStorage.get('amma_recent_recipes', []) : [];
        if (!recents || recents.length === 0) return;

        // Fetch recent recipe cards from embedded all-recipes JSON payload
        const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
        const recipeMap = {};
        allRecipesData.forEach(function(r) { recipeMap[r.id] = r; });

        const validRecents = recents.filter(function(id) { return !!recipeMap[id]; }).slice(0, 4);
        if (validRecents.length === 0) return;

        const grid = document.getElementById('recentRecipesGrid');
        const section = document.getElementById('recentRecipesSection');
        if (!grid || !section) return;

        grid.innerHTML = '';
        validRecents.forEach(function(id) {
            const r = recipeMap[id];
            const isVeg = (r.type || '').toLowerCase() === 'vegetarian';
            const totalTime = (parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0);

            const card = document.createElement('article');
            card.className = 'recipe-card';
            card.innerHTML = `
                <a href="recipe.php?id=${encodeURIComponent(r.id)}" class="card-image-link" aria-label="View recipe for ${r.name}">
                    <div class="card-image-wrap">
                        <div class="card-placeholder-img" style="background: ${r.accent_color || '#FFF3E0'};">
                            <span class="recipe-icon">${r.icon || '🍲'}</span>
                            <span class="cuisine-pill">${r.cuisine || 'Indian'}</span>
                        </div>
                        <div class="card-badges">
                            <span class="diet-badge ${isVeg ? 'veg' : 'non-veg'}">
                                <span class="diet-dot"></span> ${isVeg ? 'Veg' : 'Non-Veg'}
                            </span>
                            <span class="diff-badge diff-${(r.difficulty || 'Easy').toLowerCase()}">${r.difficulty}</span>
                        </div>
                        <button type="button" class="btn-fav-card" data-fav-id="${r.id}" aria-label="Save to favorites">
                            <svg class="heart-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </a>
                <div class="card-body">
                    <div class="card-meta-top">
                        <span class="card-cat">${r.category}</span>
                        <span class="card-time">⏱️ ${totalTime} mins</span>
                    </div>
                    <h3 class="card-title">
                        <a href="recipe.php?id=${encodeURIComponent(r.id)}">${r.name}</a>
                    </h3>
                    ${r.regional_name ? `<p class="card-regional">${r.regional_name}</p>` : ''}
                    <p class="card-desc">${r.description || ''}</p>
                    <div class="card-footer">
                        <div class="card-servings">👥 ${r.servings || 4} Servings</div>
                        <a href="recipe.php?id=${encodeURIComponent(r.id)}" class="btn-view-recipe">
                            View Recipe →
                        </a>
                    </div>
                </div>
            `;
            grid.appendChild(card);
        });

        section.style.display = 'block';

        // Clear button
        const clearBtn = document.getElementById('btnClearRecents');
        if (clearBtn) {
            clearBtn.addEventListener('click', function() {
                window.AmmaStorage.set('amma_recent_recipes', []);
                section.style.display = 'none';
            });
        }

        // Re-sync favorite icons on newly injected cards
        if (window.updateAmmaFavBadges) {
            window.updateAmmaFavBadges();
        }
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
