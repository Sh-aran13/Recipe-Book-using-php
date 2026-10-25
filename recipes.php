<?php
// recipes.php - All Recipes Directory with Comprehensive Search, Filters & Sorting
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "All Recipes — Amma's Recipe Book";
$current_page = 'recipes';

// Capture and sanitize query parameters
$query = trim($_GET['q'] ?? '');
$category = trim($_GET['cat'] ?? '');
$type = trim($_GET['type'] ?? ''); // 'Vegetarian' or 'Non-Vegetarian'
$time_filter = trim($_GET['time'] ?? ''); // 'under30', 'under45'
$difficulty = trim($_GET['diff'] ?? ''); // 'Easy', 'Medium', 'Hard'
$sort = trim($_GET['sort'] ?? 'name_asc'); // 'name_asc', 'time_asc', 'difficulty_asc'

// Check special shortcut filter
$filter_param = trim($_GET['filter'] ?? '');
if ($filter_param === 'quick' && $time_filter === '') {
    $time_filter = 'under30';
}

// Perform search and filter
$filteredRecipes = search_and_filter_recipes(
    $recipes,
    $query,
    $category,
    $type,
    $time_filter,
    $difficulty,
    $sort
);

$allCategories = get_categories_with_meta();

include __DIR__ . '/includes/header.php';
?>

<!-- BROWSE RECIPES HERO / SEARCH HEADER -->
<div style="background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 100%); padding: 40px 0 35px; border-bottom: 1px solid var(--border-warm);">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
            <a href="index.php" style="color: var(--primary);">Home</a>
            <span>›</span>
            <span style="font-weight: 600; color: var(--earth-brown);">All Recipes</span>
            <?php if ($category): ?>
                <span>›</span>
                <span style="color: var(--primary);"><?= h($category) ?></span>
            <?php endif; ?>
        </div>

        <h1 style="font-family: var(--font-serif); font-size: 34px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
            <?= $category ? h($category) : "All Amma's Recipes" ?>
        </h1>
        <p style="color: var(--text-muted); font-size: 16px; max-width: 650px;">
            <?= $category ? "Delicious authentic dishes under the " . h($category) . " collection." : "Browse through " . count($recipes) . " complete, easy-to-follow authentic recipes." ?>
        </p>

        <!-- MAIN SEARCH & FILTER BAR -->
        <form action="recipes.php" method="GET" id="recipeFilterForm" style="margin-top: 24px; background: #FFF; padding: 20px; border-radius: var(--radius-lg); border: 1.5px solid var(--border-warm); box-shadow: var(--shadow-sm);">
            
            <!-- Top search field row -->
            <div style="display: flex; gap: 12px; margin-bottom: 16px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 240px; position: relative;">
                    <label for="filterQuery" class="visually-hidden" style="position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0,0,0,0);">Search</label>
                    <input type="text" id="filterQuery" name="q" value="<?= h($query) ?>" placeholder="Search by dish name, Telugu name, or ingredient (e.g. Pappu, Ghee, Peanuts)..." style="width: 100%; height: 46px; padding: 10px 16px; border: 1.5px solid var(--border-color); border-radius: var(--radius-md); font-size: 15px; color: var(--text-main); outline: none; transition: var(--transition);" onfocus="this.style.borderColor='var(--primary)';" onblur="this.style.borderColor='var(--border-color)';">
                </div>
                <button type="submit" class="btn btn-primary" style="height: 46px; padding: 0 24px; border-radius: var(--radius-md);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    Search
                </button>
                <?php if ($query || $category || $type || $time_filter || $difficulty || $sort !== 'name_asc'): ?>
                    <a href="recipes.php" class="btn btn-secondary" style="height: 46px; border-radius: var(--radius-md);" title="Clear all active filters">
                        ✕ Reset
                    </a>
                <?php endif; ?>
            </div>

            <!-- Filter Dropdowns Row -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 12px;">
                
                <!-- Category Filter -->
                <div>
                    <label for="selectCat" style="display: block; font-size: 12px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px; text-transform: uppercase;">Category</label>
                    <select name="cat" id="selectCat" onchange="this.form.submit()" style="width: 100%; height: 40px; padding: 0 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 14px; background: #FFF; color: var(--text-main);">
                        <option value="">All Categories (15)</option>
                        <?php foreach ($allCategories as $c): ?>
                            <option value="<?= h($c['name']) ?>" <?= $category === $c['name'] ? 'selected' : '' ?>>
                                <?= $c['icon'] ?> <?= h($c['name']) ?> (<?= $c['count'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Food Type (Diet) Filter -->
                <div>
                    <label for="selectType" style="display: block; font-size: 12px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px; text-transform: uppercase;">Food Type</label>
                    <select name="type" id="selectType" onchange="this.form.submit()" style="width: 100%; height: 40px; padding: 0 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 14px; background: #FFF; color: var(--text-main);">
                        <option value="">All Diet Types</option>
                        <option value="Vegetarian" <?= $type === 'Vegetarian' ? 'selected' : '' ?>>🌱 Vegetarian Only</option>
                        <option value="Non-Vegetarian" <?= $type === 'Non-Vegetarian' ? 'selected' : '' ?>>🍗 Non-Vegetarian Only</option>
                    </select>
                </div>

                <!-- Time Filter -->
                <div>
                    <label for="selectTime" style="display: block; font-size: 12px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px; text-transform: uppercase;">Cooking Time</label>
                    <select name="time" id="selectTime" onchange="this.form.submit()" style="width: 100%; height: 40px; padding: 0 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 14px; background: #FFF; color: var(--text-main);">
                        <option value="">Any Total Time</option>
                        <option value="under30" <?= $time_filter === 'under30' ? 'selected' : '' ?>>⏱️ Under 30 Mins (Quick)</option>
                        <option value="under45" <?= $time_filter === 'under45' ? 'selected' : '' ?>>⏱️ Under 45 Mins</option>
                    </select>
                </div>

                <!-- Difficulty Filter -->
                <div>
                    <label for="selectDiff" style="display: block; font-size: 12px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px; text-transform: uppercase;">Difficulty</label>
                    <select name="diff" id="selectDiff" onchange="this.form.submit()" style="width: 100%; height: 40px; padding: 0 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 14px; background: #FFF; color: var(--text-main);">
                        <option value="">Any Difficulty</option>
                        <option value="Easy" <?= $difficulty === 'Easy' ? 'selected' : '' ?>>Easy (Beginner)</option>
                        <option value="Medium" <?= $difficulty === 'Medium' ? 'selected' : '' ?>>Medium (Intermediate)</option>
                    </select>
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="selectSort" style="display: block; font-size: 12px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px; text-transform: uppercase;">Sort By</label>
                    <select name="sort" id="selectSort" onchange="this.form.submit()" style="width: 100%; height: 40px; padding: 0 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 14px; background: #FFF; color: var(--text-main);">
                        <option value="name_asc" <?= $sort === 'name_asc' ? 'selected' : '' ?>>Alphabetical (A to Z)</option>
                        <option value="time_asc" <?= $sort === 'time_asc' ? 'selected' : '' ?>>Shortest Cooking Time</option>
                        <option value="difficulty_asc" <?= $sort === 'difficulty_asc' ? 'selected' : '' ?>>Easiest Recipes First</option>
                    </select>
                </div>

            </div>

        </form>
    </div>
</div>

<!-- RESULTS CONTENT -->
<div class="container" style="padding: 40px 20px 60px;">
    
    <!-- Results Count Bar -->
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
        <div style="font-size: 15px; font-weight: 600; color: var(--text-muted);">
            Showing <strong style="color: var(--earth-brown);"><?= count($filteredRecipes) ?></strong> <?= count($filteredRecipes) === 1 ? 'recipe' : 'recipes' ?>
            <?php if ($query): ?>
                matching "<span style="color: var(--primary);"><?= h($query) ?></span>"
            <?php endif; ?>
        </div>

        <?php if ($query || $category || $type || $time_filter || $difficulty): ?>
            <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                <span style="font-size: 13px; color: var(--text-light);">Active filters:</span>
                <?php if ($category): ?>
                    <span style="background: #FFF; border: 1px solid #FDBA74; color: var(--primary); font-size: 12px; padding: 2px 10px; border-radius: var(--radius-pill); font-weight: 600;">
                        Cat: <?= h($category) ?>
                    </span>
                <?php endif; ?>
                <?php if ($type): ?>
                    <span style="background: #FFF; border: 1px solid #FDBA74; color: var(--primary); font-size: 12px; padding: 2px 10px; border-radius: var(--radius-pill); font-weight: 600;">
                        <?= h($type) ?>
                    </span>
                <?php endif; ?>
                <?php if ($time_filter === 'under30'): ?>
                    <span style="background: #FFF; border: 1px solid #FDBA74; color: var(--primary); font-size: 12px; padding: 2px 10px; border-radius: var(--radius-pill); font-weight: 600;">
                        Under 30 mins
                    </span>
                <?php endif; ?>
                <a href="recipes.php" style="font-size: 13px; color: var(--primary); text-decoration: underline; font-weight: 600;">Clear all</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- RECIPES GRID OR ATTRACTIVE NO-RESULTS -->
    <?php if (!empty($filteredRecipes)): ?>
        <div class="recipes-grid">
            <?php foreach ($filteredRecipes as $r): ?>
                <?php render_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- ATTRACTIVE NO RESULTS SCREEN -->
        <div style="background: var(--bg-surface); border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 60px 20px; text-align: center; max-width: 580px; margin: 40px auto; box-shadow: var(--shadow-sm);">
            <div style="font-size: 64px; margin-bottom: 16px;">🔍🍲</div>
            <h2 style="font-family: var(--font-serif); font-size: 26px; color: var(--earth-brown); margin-bottom: 10px;">
                No Recipes Found
            </h2>
            <p style="color: var(--text-muted); font-size: 15px; line-height: 1.6; margin-bottom: 24px;">
                We couldn't find any dishes matching your current search or filter criteria. Try searching for common terms like "pappu", "chutney", "idli", or reset the filters below.
            </p>
            <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                <a href="recipes.php" class="btn btn-primary" style="padding: 12px 28px;">
                    Reset All Filters
                </a>
                <a href="categories.php" class="btn btn-secondary">
                    Browse Categories
                </a>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
