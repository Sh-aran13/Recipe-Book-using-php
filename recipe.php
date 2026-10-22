<?php
// recipe.php - Detailed Recipe View with Portion Calculator, Cooking Mode, Kitchen Timer, Checklist & Print
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

// Validate recipe ID from GET
$id = trim($_GET['id'] ?? '');
$recipe = find_recipe_by_id($id);

// If recipe not found, display friendly 404
if (!$recipe) {
    http_response_code(404);
    $page_title = "Recipe Not Found — Amma's Recipe Book";
    $current_page = 'recipes';
    include __DIR__ . '/includes/header.php';
    ?>
    <div class="container" style="padding: 80px 20px; text-align: center;">
        <div style="background: var(--bg-surface); border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 60px 20px; max-width: 580px; margin: 0 auto; box-shadow: var(--shadow-sm);">
            <div style="font-size: 72px; margin-bottom: 16px;">🍲❓</div>
            <h1 style="font-family: var(--font-serif); font-size: 32px; color: var(--earth-brown); margin-bottom: 12px;">
                Recipe Not Found
            </h1>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.6; margin-bottom: 28px;">
                We couldn't find the recipe you were looking for. It might have been moved or the recipe address may be incorrect.
            </p>
            <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                <a href="recipes.php" class="btn btn-primary" style="padding: 12px 28px;">
                    Browse All Recipes (42)
                </a>
                <a href="index.php" class="btn btn-secondary">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/includes/footer.php';
    exit;
}

// Variables for valid recipe
$name = h($recipe['name']);
$regName = !empty($recipe['regional_name']) ? h($recipe['regional_name']) : '';
$category = h($recipe['category']);
$cuisine = h($recipe['cuisine'] ?? 'Indian');
$type = h($recipe['type'] ?? 'Vegetarian');
$isVeg = strtolower($type) === 'vegetarian';
$prep = (int)($recipe['prep_time'] ?? 0);
$cook = (int)($recipe['cook_time'] ?? 0);
$totalTime = $prep + $cook;
$defaultServings = (int)($recipe['servings'] ?? 4);
$difficulty = h($recipe['difficulty'] ?? 'Easy');
$desc = h($recipe['description'] ?? '');
$icon = $recipe['icon'] ?? '🍲';
$accentColor = $recipe['accent_color'] ?? '#FFF3E0';
$ingredients = $recipe['ingredients'] ?? [];
$steps = $recipe['steps'] ?? [];
$tips = $recipe['tips'] ?? [];
$substitutions = $recipe['substitutions'] ?? [];
$storage = !empty($recipe['storage']) ? h($recipe['storage']) : '';
$relatedRecipes = get_related_recipes($recipe, 3);

$page_title = "{$name} Recipe — Amma's Recipe Book";
$current_page = 'recipes';

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED RECIPE DETAILS STYLES -->
<style>
    .recipe-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 100%);
        padding: 40px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .recipe-meta-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #FFF;
        border: 1px solid var(--border-warm);
        padding: 6px 14px;
        border-radius: var(--radius-pill);
        font-size: 13.5px;
        font-weight: 600;
        color: var(--text-muted);
        box-shadow: var(--shadow-sm);
    }
    .recipe-detail-layout {
        display: grid;
        grid-template-columns: 360px 1fr;
        gap: 36px;
        align-items: start;
        margin-top: 36px;
    }
    .ingredient-card {
        background: var(--bg-surface);
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-card);
        position: sticky;
        top: 95px;
    }
    .step-item {
        display: flex;
        gap: 20px;
        background: #FFF;
        border: 1px solid var(--border-warm);
        border-radius: var(--radius-md);
        padding: 20px 22px;
        margin-bottom: 18px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    .step-item:hover {
        border-color: #FDBA74;
        box-shadow: var(--shadow-md);
    }
    .step-number {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--primary);
        color: #FFF;
        font-family: var(--font-serif);
        font-size: 17px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 3px 8px rgba(194, 65, 12, 0.25);
    }
    .step-text {
        font-size: 16px;
        line-height: 1.7;
        color: var(--text-main);
        flex: 1;
    }

    /* INGREDIENT CHECKBOX LIST */
    .ing-checkbox-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px dashed var(--border-warm);
        cursor: pointer;
        user-select: none;
        transition: var(--transition);
    }
    .ing-checkbox-row:last-child {
        border-bottom: none;
    }
    .ing-checkbox-row:hover {
        background-color: var(--bg-warm);
        padding-left: 6px;
        border-radius: 6px;
    }
    .ing-checkbox-input {
        width: 18px;
        height: 18px;
        margin-top: 3px;
        accent-color: var(--primary);
        cursor: pointer;
        flex-shrink: 0;
    }
    .ing-checkbox-input:checked + .ing-label {
        text-decoration: line-through;
        color: var(--text-light);
    }
    .ing-label {
        flex: 1;
        font-size: 15px;
        line-height: 1.5;
        color: var(--text-main);
    }
    .ing-qty {
        font-weight: 700;
        color: var(--primary);
    }

    /* FULLSCREEN COOKING MODE OVERLAY */
    #cookingModeModal {
        display: none;
        position: fixed;
        inset: 0;
        background: #FFFDF9;
        z-index: 9999;
        overflow-y: auto;
        padding: 24px 20px;
        flex-direction: column;
        justify-content: space-between;
    }
    #cookingModeModal.active {
        display: flex;
    }

    @media (max-width: 900px) {
        .recipe-detail-layout {
            grid-template-columns: 1fr;
        }
        .ingredient-card {
            position: static;
        }
    }
</style>

<!-- TOP BREADCRUMB & BACK ACTION -->
<div class="recipe-hero">
    <div class="container">
        
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 16px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted);">
                <a href="index.php" style="color: var(--primary);">Home</a>
                <span>›</span>
                <a href="recipes.php" style="color: var(--primary);">Recipes</a>
                <span>›</span>
                <a href="recipes.php?cat=<?= urlencode($recipe['category']) ?>" style="color: var(--primary);"><?= $category ?></a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);"><?= $name ?></span>
            </div>

            <a href="recipes.php" class="btn btn-secondary" style="font-size: 13.5px; padding: 6px 14px; border-radius: var(--radius-pill);">
                ← Back to All Recipes
            </a>
        </div>

        <!-- RECIPE HEADER BANNER -->
        <div style="display: grid; grid-template-columns: 140px 1fr; gap: 24px; align-items: center;">
            <div style="width: 140px; height: 140px; border-radius: var(--radius-lg); background: <?= $accentColor ?>; display: flex; align-items: center; justify-content: center; font-size: 68px; border: 2px solid var(--border-warm); box-shadow: var(--shadow-md);">
                <?= $icon ?>
            </div>

            <div>
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; flex-wrap: wrap;">
                    <span class="diet-badge <?= $isVeg ? 'veg' : 'non-veg' ?>">
                        <span class="diet-dot"></span> <?= $type ?>
                    </span>
                    <span class="diff-badge diff-<?= strtolower($difficulty) ?>">
                        📊 <?= $difficulty ?> Difficulty
                    </span>
                    <span class="recipe-meta-pill" style="padding: 3px 10px; font-size: 12px;">
                        📍 <?= $cuisine ?> Cuisine
                    </span>
                    <span class="recipe-meta-pill" style="padding: 3px 10px; font-size: 12px;">
                        📂 <?= $category ?>
                    </span>
                </div>

                <h1 style="font-family: var(--font-serif); font-size: clamp(26px, 4vw, 38px); font-weight: 700; color: var(--earth-brown); line-height: 1.2; margin-bottom: 4px;">
                    <?= $name ?>
                </h1>

                <?php if ($regName): ?>
                    <div style="font-size: 17px; color: var(--primary); font-weight: 600; margin-bottom: 10px;">
                        <?= $regName ?>
                    </div>
                <?php endif; ?>

                <p style="color: var(--text-muted); font-size: 15.5px; line-height: 1.6; max-width: 780px;">
                    <?= $desc ?>
                </p>
            </div>
        </div>

        <!-- KEY RECIPE METRICS BAR & ACTION BUTTONS -->
        <div style="margin-top: 28px; padding-top: 20px; border-top: 1px dashed var(--border-warm); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
            
            <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                <div class="recipe-meta-pill">
                    <span>⏱️ Prep:</span> <strong><?= $prep ?> mins</strong>
                </div>
                <div class="recipe-meta-pill">
                    <span>🍳 Cook:</span> <strong><?= $cook ?> mins</strong>
                </div>
                <div class="recipe-meta-pill" style="border-color: #FDBA74; background: #FFF8EE;">
                    <span>⏳ Total:</span> <strong style="color: var(--primary);"><?= $totalTime ?> mins</strong>
                </div>
                <div class="recipe-meta-pill">
                    <span>👥 Servings:</span> <strong id="metricServingDisplay"><?= $defaultServings ?></strong>
                </div>
            </div>

            <!-- ACTION BUTTONS: COOKING MODE, FAVORITE, PRINT -->
            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                <button type="button" id="btnStartCooking" class="btn btn-primary" style="padding: 10px 22px;">
                    <span style="font-size: 18px;">👨‍🍳</span>
                    <span>Start Cooking Mode</span>
                </button>

                <button type="button" class="btn btn-secondary btn-fav-card" data-fav-id="<?= h($recipe['id']) ?>" style="position: static; width: auto; height: 42px; padding: 0 16px; border-radius: var(--radius-pill); gap: 6px;" aria-label="Save to favorites">
                    <svg class="heart-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                    <span id="favBtnLabel">Favorite</span>
                </button>

                <button type="button" onclick="window.print()" class="btn btn-secondary" style="height: 42px; padding: 0 16px; border-radius: var(--radius-pill);" title="Print this recipe">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    <span>Print</span>
                </button>
            </div>

        </div>

    </div>
</div>

<!-- MAIN RECIPE BODY (TWO COLUMNS: INGREDIENTS ON LEFT, STEPS ON RIGHT) -->
<div class="container">
    <div class="recipe-detail-layout">
        
        <!-- ==================== LEFT COLUMN: INGREDIENTS & CALCULATOR ==================== -->
        <aside class="recipe-sidebar">
            
            <div class="ingredient-card">
                
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <h2 style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown);">
                        Ingredients
                    </h2>
                    <span style="font-size: 13px; color: var(--text-light);" id="checklistProgressText">
                        0 / <?= count($ingredients) ?> ready
                    </span>
                </div>

                <!-- PORTION SIZE CALCULATOR (SCALER) -->
                <div style="background: var(--bg-warm); border: 1.5px solid #FED7AA; border-radius: var(--radius-md); padding: 14px; margin-bottom: 20px;">
                    <div style="font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                        Adjust Portion Size
                    </div>
                    
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <span style="font-size: 14.5px; color: var(--text-main); font-weight: 600;">
                            Number of Servings:
                        </span>
                        
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <button type="button" id="btnDecreaseServings" aria-label="Decrease servings" style="width: 32px; height: 32px; border-radius: 50%; border: 1px solid var(--border-color); background: #FFF; font-size: 18px; font-weight: 700; color: var(--primary); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition);">
                                −
                            </button>
                            <span id="currentServingCount" style="font-size: 17px; font-weight: 700; color: var(--earth-brown); width: 28px; text-align: center;">
                                <?= $defaultServings ?>
                            </span>
                            <button type="button" id="btnIncreaseServings" aria-label="Increase servings" style="width: 32px; height: 32px; border-radius: 50%; border: 1px solid var(--border-color); background: #FFF; font-size: 18px; font-weight: 700; color: var(--primary); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition);">
                                +
                            </button>
                        </div>
                    </div>

                    <div style="font-size: 11.5px; color: var(--text-muted); margin-top: 8px; line-height: 1.4;">
                        ℹ️ Salt, chillies, and spices should be adjusted to taste. Cooking times remain the same.
                    </div>
                </div>

                <!-- INGREDIENT CHECKLIST -->
                <div id="ingredientsList" role="list" style="margin-bottom: 20px;">
                    <?php foreach ($ingredients as $idx => $ing): ?>
                        <?php
                            $baseQty = (float)($ing['quantity'] ?? 0);
                            $formattedQty = format_quantity($baseQty);
                            $unit = h($ing['unit'] ?? '');
                            $ingName = h($ing['name'] ?? '');
                            $notes = !empty($ing['notes']) ? h($ing['notes']) : '';
                            $itemId = "chk_ing_{$idx}";
                        ?>
                        <label class="ing-checkbox-row" for="<?= $itemId ?>">
                            <input type="checkbox" id="<?= $itemId ?>" class="ing-checkbox-input" data-ing-idx="<?= $idx ?>">
                            <span class="ing-label">
                                <span class="ing-qty" data-base-qty="<?= $baseQty ?>"><?= $formattedQty ?></span>
                                <span class="ing-unit"><?= $unit ? ' ' . $unit : '' ?></span>
                                <span class="ing-name"> <?= $ingName ?></span>
                                <?php if ($notes): ?>
                                    <span style="display: block; font-size: 12px; color: var(--text-light); font-style: italic;">
                                        (<?= $notes ?>)
                                    </span>
                                <?php endif; ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <!-- INGREDIENT ACTIONS: COPY TO CLIPBOARD & RESET CHECKLIST -->
                <div style="display: flex; gap: 8px; flex-direction: column;">
                    <button type="button" id="btnCopyIngredients" class="btn btn-secondary" style="width: 100%; font-size: 13.5px; padding: 8px; border-radius: var(--radius-sm);">
                        📋 Copy Ingredients to Clipboard
                    </button>
                    <button type="button" id="btnResetChecklist" style="background: none; border: none; font-size: 12.5px; color: var(--text-light); text-decoration: underline; cursor: pointer; padding: 4px;">
                        Reset Checklist
                    </button>
                </div>

            </div>

            <!-- UNIT CONVERTER HELPER CARD -->
            <div style="background: var(--bg-surface); border: 1px solid var(--border-warm); border-radius: var(--radius-md); padding: 18px; margin-top: 20px; box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 14.5px; font-weight: 700; color: var(--earth-brown); margin-bottom: 10px; display: flex; align-items: center; gap: 6px;">
                    <span>⚖️</span> Kitchen Measurement Guide
                </h3>
                <div style="font-size: 12.5px; color: var(--text-muted); line-height: 1.6; display: flex; flex-direction: column; gap: 6px;">
                    <div>• <strong>1 Cup</strong> = 240 ml (approx. 200g rice/dal)</div>
                    <div>• <strong>1 Tablespoon</strong> = 15 ml (3 teaspoons)</div>
                    <div>• <strong>1 Teaspoon</strong> = 5 ml</div>
                    <div>• <strong>Lemon-sized tamarind</strong> = approx. 15–20 grams</div>
                </div>
            </div>

            <!-- KITCHEN TIMER COMPONENT -->
            <div style="background: #FFF8EE; border: 1.5px solid #FDBA74; border-radius: var(--radius-md); padding: 18px; margin-top: 20px; box-shadow: var(--shadow-sm);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                    <h3 style="font-size: 14.5px; font-weight: 700; color: var(--primary); display: flex; align-items: center; gap: 6px;">
                        <span>⏱️</span> In-Kitchen Cooking Timer
                    </h3>
                </div>
                
                <div id="timerDisplay" style="font-family: monospace; font-size: 32px; font-weight: 700; color: var(--earth-brown); text-align: center; margin: 10px 0; background: #FFF; padding: 8px; border-radius: var(--radius-sm); border: 1px solid #FED7AA;">
                    05:00
                </div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; margin-bottom: 10px;">
                    <button type="button" class="btn btn-secondary" onclick="setTimerMinutes(3)" style="padding: 4px; font-size: 12px; border-radius: 4px;">3 mins</button>
                    <button type="button" class="btn btn-secondary" onclick="setTimerMinutes(5)" style="padding: 4px; font-size: 12px; border-radius: 4px;">5 mins</button>
                    <button type="button" class="btn btn-secondary" onclick="setTimerMinutes(10)" style="padding: 4px; font-size: 12px; border-radius: 4px;">10 mins</button>
                </div>

                <div style="display: flex; gap: 8px;">
                    <button type="button" id="btnTimerStart" class="btn btn-primary" style="flex: 1; padding: 8px; font-size: 13.5px; border-radius: var(--radius-sm);">
                        Start Timer
                    </button>
                    <button type="button" id="btnTimerReset" class="btn btn-secondary" style="padding: 8px 12px; font-size: 13.5px; border-radius: var(--radius-sm);">
                        Reset
                    </button>
                </div>
                <div id="timerAlarmNotice" style="display: none; margin-top: 8px; font-size: 13px; font-weight: 700; color: #DC2626; text-align: center; animation: pulse 1s infinite;">
                    🔔 Time's Up! Check your dish!
                </div>
            </div>

        </aside>

        <!-- ==================== RIGHT COLUMN: STEP-BY-STEP INSTRUCTIONS ==================== -->
        <main class="recipe-content-main">
            
            <div style="margin-bottom: 32px;">
                <h2 style="font-family: var(--font-serif); font-size: 24px; font-weight: 700; color: var(--earth-brown); margin-bottom: 6px;">
                    Step-by-Step Cooking Instructions
                </h2>
                <p style="color: var(--text-muted); font-size: 15px; margin-bottom: 20px;">
                    Follow these simple steps in order. Take your time, monitor the flame, and look for the visual doneness cues.
                </p>

                <div class="steps-timeline">
                    <?php foreach ($steps as $sIdx => $stepText): ?>
                        <div class="step-item" id="step-row-<?= $sIdx + 1 ?>">
                            <div class="step-number"><?= $sIdx + 1 ?></div>
                            <div class="step-text">
                                <?= h($stepText) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- AMMA'S PRO TIPS -->
            <?php if (!empty($tips)): ?>
                <div style="background: #FFFBEB; border: 1.5px solid #FDE68A; border-radius: var(--radius-lg); padding: 24px; margin-bottom: 28px; box-shadow: var(--shadow-sm);">
                    <h3 style="font-family: var(--font-serif); font-size: 19px; font-weight: 700; color: #92400E; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                        <span>💡</span> Amma's Secrets & Cooking Tips
                    </h3>
                    <ul style="padding-left: 20px; color: #78350F; font-size: 15px; line-height: 1.7; display: flex; flex-direction: column; gap: 8px;">
                        <?php foreach ($tips as $t): ?>
                            <li><?= h($t) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- SUBSTITUTIONS & STORAGE -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 32px;">
                
                <?php if (!empty($substitutions)): ?>
                    <div style="background: var(--bg-surface); border: 1px solid var(--border-warm); border-radius: var(--radius-md); padding: 20px; box-shadow: var(--shadow-sm);">
                        <h4 style="font-size: 16px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                            <span>🔄</span> Ingredient Substitutions
                        </h4>
                        <ul style="padding-left: 18px; font-size: 14px; color: var(--text-muted); line-height: 1.6;">
                            <?php foreach ($substitutions as $sub): ?>
                                <li><?= h($sub) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (!empty($storage)): ?>
                    <div style="background: var(--bg-surface); border: 1px solid var(--border-warm); border-radius: var(--radius-md); padding: 20px; box-shadow: var(--shadow-sm);">
                        <h4 style="font-size: 16px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                            <span>🧊</span> Storage & Leftover Guidance
                        </h4>
                        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">
                            <?= $storage ?>
                        </p>
                    </div>
                <?php endif; ?>

            </div>

            <!-- SERVING SUGGESTIONS -->
            <div style="background: #F0FDF4; border: 1px solid #BBF7D0; border-radius: var(--radius-md); padding: 20px; margin-bottom: 40px;">
                <h4 style="font-size: 16px; font-weight: 700; color: #166534; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                    <span>🍽️</span> How to Serve This Dish
                </h4>
                <p style="font-size: 14.5px; color: #14532D; line-height: 1.6;">
                    Serve piping hot directly from the stove. Pair with fresh ghee, homemade pickles (Avakaya), and warm papads for the most authentic dining experience.
                </p>
            </div>

            <!-- RELATED RECIPES -->
            <?php if (!empty($relatedRecipes)): ?>
                <div style="border-top: 1px solid var(--border-warm); padding-top: 36px;">
                    <div class="section-header-wrap">
                        <div>
                            <span class="section-eyebrow">You Might Also Love</span>
                            <h3 class="section-heading" style="font-size: 24px;">Dishes That Pair Well</h3>
                        </div>
                    </div>
                    <div class="recipes-grid">
                        <?php foreach ($relatedRecipes as $rel): ?>
                            <?php render_recipe_card($rel); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </main>

    </div>
</div>

<!-- ==================== DISTRACTION-FREE FULLSCREEN COOKING MODE MODAL ==================== -->
<div id="cookingModeModal" role="dialog" aria-modal="true" aria-labelledby="cookingModeTitle">
    
    <!-- COOKING MODE TOP HEADER -->
    <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1.5px solid var(--border-warm); padding-bottom: 16px; margin-bottom: 24px;">
        <div>
            <div style="font-size: 13px; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
                Distraction-Free Cooking Mode
            </div>
            <h2 id="cookingModeTitle" style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown);">
                <?= $name ?>
            </h2>
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="font-size: 15px; font-weight: 600; color: var(--text-muted);">
                👥 <span id="cookingModeServingCount"><?= $defaultServings ?></span> Servings
            </span>
            <button type="button" id="btnExitCookingMode" class="btn btn-secondary" style="padding: 8px 18px; border-radius: var(--radius-pill); font-size: 14px;">
                ✕ Exit Cooking Mode
            </button>
        </div>
    </div>

    <!-- PROGRESS BAR -->
    <div style="margin-bottom: 30px;">
        <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
            <span id="cookingStepCounter">Step 1 of <?= count($steps) ?></span>
            <span id="cookingStepPercent">0% Completed</span>
        </div>
        <div style="width: 100%; height: 10px; background: #FED7AA; border-radius: var(--radius-pill); overflow: hidden;">
            <div id="cookingProgressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #EA580C, #C2410C); transition: width 0.3s ease;"></div>
        </div>
    </div>

    <!-- LARGE STEP TEXT CONTAINER -->
    <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 20px 0;">
        <div style="background: #FFF; border: 2px solid #FED7AA; border-radius: var(--radius-xl); padding: clamp(24px, 5vw, 48px); max-width: 820px; width: 100%; box-shadow: var(--shadow-hover); text-align: center;">
            <div id="modalStepNumberBadge" style="width: 56px; height: 56px; border-radius: 50%; background: var(--primary); color: #FFF; font-family: var(--font-serif); font-size: 26px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 24px; box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);">
                1
            </div>
            
            <p id="modalStepInstructionText" style="font-size: clamp(20px, 3vw, 28px); line-height: 1.6; color: var(--earth-brown); font-family: var(--font-serif); margin-bottom: 28px;">
                <!-- Filled dynamically by JavaScript -->
            </p>

            <div id="completionCelebration" style="display: none; background: #ECFDF5; border: 2px solid #10B981; border-radius: var(--radius-lg); padding: 24px; margin-top: 16px;">
                <div style="font-size: 48px; margin-bottom: 8px;">🎉🍲</div>
                <h3 style="font-family: var(--font-serif); font-size: 24px; color: #065F46; margin-bottom: 6px;">
                    Recipe Complete!
                </h3>
                <p style="color: #047857; font-size: 16px;">
                    Amma, your delicious <strong><?= $name ?></strong> is ready to serve. Enjoy your warm meal with family!
                </p>
            </div>
        </div>
    </div>

    <!-- COOKING MODE CONTROLS: PREVIOUS, NEXT, COMPLETE -->
    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1.5px solid var(--border-warm); padding-top: 20px; margin-top: 20px; gap: 16px;">
        <button type="button" id="btnPrevStep" class="btn btn-secondary" style="padding: 12px 28px; font-size: 16px;">
            ← Previous Step
        </button>

        <button type="button" id="btnMarkComplete" class="btn btn-secondary" style="display: none; background: #ECFDF5; color: #047857; border-color: #A7F3D0; font-weight: 700;">
            ✓ Mark Finished
        </button>

        <button type="button" id="btnNextStep" class="btn btn-primary" style="padding: 12px 32px; font-size: 16px;">
            Next Step →
        </button>
    </div>

</div>

<!-- EMBEDDED JAVASCRIPT FOR CALCULATOR, CHECKLIST, RECENT HISTORY, TIMER, AND COOKING MODE -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const recipeId = <?= json_encode($recipe['id']) ?>;
        const defaultServings = <?= $defaultServings ?>;
        let currentServings = defaultServings;
        const stepsData = <?= json_encode($steps) ?>;
        let currentStepIndex = 0;

        // 1. RECORD RECENTLY VIEWED RECIPE IN LOCALSTORAGE
        if (window.AmmaStorage) {
            let recents = window.AmmaStorage.get('amma_recent_recipes', []);
            recents = recents.filter(function(id) { return id !== recipeId; });
            recents.unshift(recipeId);
            recents = recents.slice(0, 10);
            window.AmmaStorage.set('amma_recent_recipes', recents);
        }

        // 2. PORTION SIZE CALCULATOR (SCALER)
        const servingCountEl = document.getElementById('currentServingCount');
        const metricDisplayEl = document.getElementById('metricServingDisplay');
        const cookingModalServingsEl = document.getElementById('cookingModeServingCount');

        function formatDecimalQty(val) {
            if (val === 0) return '';
            if (Math.abs(val - 0.25) < 0.001) return '¼';
            if (Math.abs(val - 0.5) < 0.001) return '½';
            if (Math.abs(val - 0.75) < 0.001) return '¾';
            if (Math.abs(val - 1.5) < 0.001) return '1 ½';
            if (Math.abs(val - 2.5) < 0.001) return '2 ½';
            if (Math.floor(val) === val) return val.toString();
            return parseFloat(val.toFixed(2)).toString();
        }

        function updateServings(newServings) {
            if (newServings < 1 || newServings > 20) return;
            currentServings = newServings;
            servingCountEl.textContent = currentServings;
            if (metricDisplayEl) metricDisplayEl.textContent = currentServings;
            if (cookingModalServingsEl) cookingModalServingsEl.textContent = currentServings;

            // Recalculate each ingredient quantity
            document.querySelectorAll('.ing-qty').forEach(function(el) {
                const base = parseFloat(el.getAttribute('data-base-qty')) || 0;
                if (base > 0) {
                    const scaled = (base * currentServings) / defaultServings;
                    el.textContent = formatDecimalQty(scaled);
                }
            });
        }

        document.getElementById('btnDecreaseServings').addEventListener('click', function() {
            updateServings(currentServings - 1);
        });
        document.getElementById('btnIncreaseServings').addEventListener('click', function() {
            updateServings(currentServings + 1);
        });

        // 3. INGREDIENT CHECKLIST PERSISTENCE IN LOCALSTORAGE
        const checklistKey = 'amma_chk_' + recipeId;
        const savedChecked = window.AmmaStorage ? window.AmmaStorage.get(checklistKey, []) : [];
        const checkboxes = document.querySelectorAll('.ing-checkbox-input');
        const progressEl = document.getElementById('checklistProgressText');

        function updateChecklistProgress() {
            let checkedCount = 0;
            const checkedIndices = [];
            checkboxes.forEach(function(cb) {
                if (cb.checked) {
                    checkedCount++;
                    checkedIndices.push(cb.getAttribute('data-ing-idx'));
                }
            });
            if (progressEl) {
                progressEl.textContent = checkedCount + ' / ' + checkboxes.length + ' ready';
            }
            if (window.AmmaStorage) {
                window.AmmaStorage.set(checklistKey, checkedIndices);
            }
        }

        checkboxes.forEach(function(cb) {
            const idx = cb.getAttribute('data-ing-idx');
            if (savedChecked.includes(idx)) {
                cb.checked = true;
            }
            cb.addEventListener('change', updateChecklistProgress);
        });
        updateChecklistProgress();

        // Reset checklist button
        document.getElementById('btnResetChecklist').addEventListener('click', function() {
            checkboxes.forEach(function(cb) { cb.checked = false; });
            updateChecklistProgress();
        });

        // 4. COPY INGREDIENTS TO CLIPBOARD
        document.getElementById('btnCopyIngredients').addEventListener('click', function() {
            const btn = this;
            let text = "Ingredients for <?= addslashes($name) ?> (" + currentServings + " servings):\n";
            document.querySelectorAll('.ing-checkbox-row').forEach(function(row) {
                const label = row.querySelector('.ing-label');
                if (label) {
                    text += "• " + label.innerText.replace(/\s+/g, ' ').trim() + "\n";
                }
            });

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function() {
                    btn.textContent = '✓ Copied to Clipboard!';
                    setTimeout(function() { btn.textContent = '📋 Copy Ingredients to Clipboard'; }, 2500);
                }).catch(fallbackCopy);
            } else {
                fallbackCopy();
            }

            function fallbackCopy() {
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                btn.textContent = '✓ Copied to Clipboard!';
                setTimeout(function() { btn.textContent = '📋 Copy Ingredients to Clipboard'; }, 2500);
            }
        });

        // 5. DISTRACTION-FREE COOKING MODE
        const modal = document.getElementById('cookingModeModal');
        const startBtn = document.getElementById('btnStartCooking');
        const exitBtn = document.getElementById('btnExitCookingMode');
        const prevBtn = document.getElementById('btnPrevStep');
        const nextBtn = document.getElementById('btnNextStep');
        const completeBtn = document.getElementById('btnMarkComplete');
        const counterEl = document.getElementById('cookingStepCounter');
        const percentEl = document.getElementById('cookingStepPercent');
        const progressBar = document.getElementById('cookingProgressBar');
        const badgeEl = document.getElementById('modalStepNumberBadge');
        const textEl = document.getElementById('modalStepInstructionText');
        const celebEl = document.getElementById('completionCelebration');

        function renderCookingStep(index) {
            currentStepIndex = index;
            const total = stepsData.length;
            const currentStepNum = index + 1;
            const pct = Math.round((currentStepNum / total) * 100);

            counterEl.textContent = 'Step ' + currentStepNum + ' of ' + total;
            percentEl.textContent = pct + '% Completed';
            progressBar.style.width = pct + '%';
            badgeEl.textContent = currentStepNum;
            textEl.textContent = stepsData[index];

            prevBtn.disabled = (index === 0);
            prevBtn.style.opacity = (index === 0) ? '0.4' : '1';

            if (index === total - 1) {
                nextBtn.style.display = 'none';
                completeBtn.style.display = 'inline-flex';
            } else {
                nextBtn.style.display = 'inline-flex';
                completeBtn.style.display = 'none';
            }
            celebEl.style.display = 'none';
        }

        startBtn.addEventListener('click', function() {
            renderCookingStep(0);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        exitBtn.addEventListener('click', function() {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        });

        prevBtn.addEventListener('click', function() {
            if (currentStepIndex > 0) {
                renderCookingStep(currentStepIndex - 1);
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentStepIndex < stepsData.length - 1) {
                renderCookingStep(currentStepIndex + 1);
            }
        });

        completeBtn.addEventListener('click', function() {
            celebEl.style.display = 'block';
            completeBtn.style.display = 'none';
        });

        // 6. IN-KITCHEN COOKING TIMER
        let timerSeconds = 300;
        let timerInterval = null;
        let isRunning = false;
        const timerDisplay = document.getElementById('timerDisplay');
        const startTimerBtn = document.getElementById('btnTimerStart');
        const resetTimerBtn = document.getElementById('btnTimerReset');
        const alarmNotice = document.getElementById('timerAlarmNotice');

        function formatTimer(s) {
            const m = Math.floor(s / 60);
            const remSec = s % 60;
            return (m < 10 ? '0' : '') + m + ':' + (remSec < 10 ? '0' : '') + remSec;
        }

        function updateTimerDisplay() {
            timerDisplay.textContent = formatTimer(timerSeconds);
        }

        window.setTimerMinutes = function(mins) {
            clearInterval(timerInterval);
            isRunning = false;
            startTimerBtn.textContent = 'Start Timer';
            alarmNotice.style.display = 'none';
            timerSeconds = mins * 60;
            updateTimerDisplay();
        };

        startTimerBtn.addEventListener('click', function() {
            if (isRunning) {
                clearInterval(timerInterval);
                isRunning = false;
                startTimerBtn.textContent = 'Resume Timer';
            } else {
                alarmNotice.style.display = 'none';
                isRunning = true;
                startTimerBtn.textContent = 'Pause Timer';
                timerInterval = setInterval(function() {
                    if (timerSeconds > 0) {
                        timerSeconds--;
                        updateTimerDisplay();
                    } else {
                        clearInterval(timerInterval);
                        isRunning = false;
                        startTimerBtn.textContent = 'Start Timer';
                        alarmNotice.style.display = 'block';
                    }
                }, 1000);
            }
        });

        resetTimerBtn.addEventListener('click', function() {
            clearInterval(timerInterval);
            isRunning = false;
            startTimerBtn.textContent = 'Start Timer';
            alarmNotice.style.display = 'none';
            timerSeconds = 300;
            updateTimerDisplay();
        });
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
