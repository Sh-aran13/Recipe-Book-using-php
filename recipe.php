<?php
// recipe.php - Detailed Recipe View with Portion Calculator, Cooking Mode, Kitchen Timer, Checklist & Print
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

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
        <div style="background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%); border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 60px 20px; max-width: 580px; margin: 0 auto; box-shadow: var(--shadow-md);">
            <div style="font-size: 72px; margin-bottom: 16px;">🍲❓</div>
            <h1 style="font-family: 'Playfair Display', var(--font-serif); font-size: 32px; color: var(--earth-brown); margin-bottom: 12px;">
                Recipe Not Found
            </h1>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.6; margin-bottom: 28px;">
                We couldn't find the recipe you were looking for. It might have been moved or the recipe address may be incorrect.
            </p>
            <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                <a href="recipes.php" class="btn btn-primary" style="padding: 12px 28px;">
                    Browse All Recipes
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
$diffClass = 'diff-' . strtolower($difficulty);
$desc = h($recipe['description'] ?? '');
$icon = $recipe['icon'] ?? '🍲';
$accentColor = $recipe['accent_color'] ?? '#FFF3E0';
$image = !empty($recipe['image']) ? $recipe['image'] : '';
$imageExists = $image && file_exists(__DIR__ . '/' . ltrim($image, '/'));
$ingredients = $recipe['ingredients'] ?? [];
$steps = $recipe['steps'] ?? [];
$tips = $recipe['tips'] ?? [];
$substitutions = $recipe['substitutions'] ?? [];
$storage = !empty($recipe['storage']) ? h($recipe['storage']) : '';
$relatedRecipes = get_related_recipes($recipe, 3);
$relatedLessons = get_related_lessons_for_recipe($recipe);

$page_title = "{$name} Recipe — Amma's Recipe Book";
$current_page = 'recipes';

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     RECIPE DETAIL — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- SERIF TYPOGRAPHY ---------- */
.recipe-display {
    font-family: 'Playfair Display', 'Georgia', serif;
}

/* ---------- HERO ---------- */
.recipe-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 75%, #FDE68A 100%);
    padding: 40px 0 50px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.recipe-hero::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 360px;
    height: 360px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.2) 0%, transparent 70%);
    pointer-events: none;
}
.recipe-hero::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -100px;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(194, 65, 12, 0.12) 0%, transparent 70%);
    pointer-events: none;
}
.recipe-hero .container {
    position: relative;
    z-index: 2;
}

.hero-breadcrumb-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid rgba(253, 186, 116, 0.5);
    padding: 6px 16px;
    border-radius: var(--radius-pill);
    font-size: 13px;
    color: var(--text-muted);
    backdrop-filter: blur(6px);
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(194, 65, 12, 0.06);
}
.hero-breadcrumb-pill a {
    color: var(--primary);
    font-weight: 600;
}
.hero-breadcrumb-pill a:hover {
    color: var(--primary-hover);
    text-decoration: underline;
}
.hero-breadcrumb-pill .sep {
    color: #A8A29E;
}

/* Hero content layout */
.recipe-hero-grid {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 36px;
    align-items: center;
}

/* Image container — big, elegant, with frame */
.recipe-hero-image-wrap {
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    border-radius: 24px;
    overflow: hidden;
    background: <?= $accentColor ?>;
    border: 3px solid #FFFFFF;
    box-shadow:
        0 20px 44px -12px rgba(194, 65, 12, 0.28),
        0 8px 20px -6px rgba(69, 26, 3, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.recipe-hero-image-wrap:hover {
    transform: translateY(-4px) scale(1.01);
}
.recipe-hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.recipe-hero-emoji {
    font-size: 120px;
    filter: drop-shadow(0 10px 22px rgba(69, 26, 3, 0.2));
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.recipe-hero-image-wrap:hover .recipe-hero-emoji {
    transform: scale(1.08) rotate(-4deg);
}
.recipe-hero-image-corner-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFF;
    font-size: 11px;
    font-weight: 800;
    padding: 6px 12px;
    border-radius: var(--radius-pill);
    box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35);
    display: flex;
    align-items: center;
    gap: 5px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    z-index: 3;
}

/* Hero text */
.recipe-hero-text {
    display: flex;
    flex-direction: column;
}
.recipe-hero-badges {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 14px;
    flex-wrap: wrap;
}
.recipe-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    border-radius: var(--radius-pill);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    background: #FFF;
    border: 1px solid var(--border-warm);
    color: var(--text-muted);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.recipe-pill--veg { background: #F0FDF4; color: #15803D; border-color: #BBF7D0; }
.recipe-pill--nonveg { background: #FEF2F2; color: #B91C1C; border-color: #FECACA; }
.recipe-pill--veg::before,
.recipe-pill--nonveg::before {
    content: '';
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
}
.recipe-pill--veg::before { background: #16A34A; box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.2); }
.recipe-pill--nonveg::before { background: #DC2626; box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.2); }

.recipe-pill--easy { background: #F0FDF4; color: #047857; border-color: #86EFAC; }
.recipe-pill--medium { background: #FEF3C7; color: #B45309; border-color: #FCD34D; }
.recipe-pill--hard { background: #FEE2E2; color: #B91C1C; border-color: #FCA5A5; }

.recipe-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(30px, 4.2vw, 46px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.12;
    margin-bottom: 6px;
    letter-spacing: -1px;
}
.recipe-hero-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 12px;
    letter-spacing: 0.2px;
}
.recipe-hero-desc {
    font-size: 15.5px;
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 720px;
    margin-bottom: 22px;
}

/* Meta strip */
.recipe-meta-strip {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    padding: 16px 18px;
    background: rgba(255, 255, 255, 0.75);
    border: 1px solid rgba(253, 186, 116, 0.4);
    border-radius: var(--radius-lg);
    backdrop-filter: blur(8px);
    margin-bottom: 20px;
    box-shadow: 0 4px 16px rgba(194, 65, 12, 0.06);
}
.recipe-meta-tile {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    border-right: 1px solid rgba(69, 26, 3, 0.08);
}
.recipe-meta-tile:last-child {
    border-right: none;
}
.recipe-meta-tile-emoji {
    font-size: 18px;
    line-height: 1;
}
.recipe-meta-tile-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}
.recipe-meta-tile-label {
    font-size: 10.5px;
    font-weight: 700;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.recipe-meta-tile-value {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.2px;
}

/* Action buttons */
.recipe-hero-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}
.recipe-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14.5px;
    letter-spacing: 0.2px;
    border: 1.5px solid transparent;
    cursor: pointer;
    transition: all 0.25s ease;
    text-decoration: none;
}
.recipe-action-btn--primary {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
}
.recipe-action-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
    color: #FFF;
}
.recipe-action-btn--secondary {
    background: #FFF;
    color: var(--earth-brown);
    border-color: var(--border-warm);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.06);
}
.recipe-action-btn--secondary:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-1px);
}
.recipe-action-btn--fav.is-fav {
    background: #FEF2F2;
    color: #DC2626;
    border-color: #FECACA;
}

/* ---------- MAIN LAYOUT ---------- */
.recipe-detail-layout {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 36px;
    align-items: start;
    margin-top: 44px;
    margin-bottom: 60px;
}

/* ---------- INGREDIENTS CARD ---------- */
.ingredient-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px;
    box-shadow: 0 12px 32px -10px rgba(69, 26, 3, 0.1), 0 4px 12px rgba(69, 26, 3, 0.04);
    position: sticky;
    top: 100px;
}
.ingredient-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 22px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 4px;
    letter-spacing: -0.3px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}
.ingredient-card-progress {
    font-family: var(--font-sans);
    font-size: 11.5px;
    font-weight: 700;
    color: var(--primary);
    background: #FFF1EB;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    border: 1px solid #FED7AA;
    letter-spacing: 0.2px;
    text-transform: none;
    white-space: nowrap;
}

/* Servings scaler */
.servings-scaler {
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    border-radius: 16px;
    padding: 16px;
    margin: 16px 0 22px;
}
.servings-scaler-label {
    font-size: 11px;
    font-weight: 800;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.servings-scaler-controls {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}
.servings-scaler-text {
    font-size: 13.5px;
    color: var(--text-main);
    font-weight: 600;
}
.servings-scaler-counter {
    display: flex;
    align-items: center;
    gap: 8px;
}
.servings-btn {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: 1.5px solid #FCD34D;
    background: #FFFFFF;
    color: var(--primary);
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.22s ease;
    box-shadow: 0 2px 6px rgba(217, 119, 6, 0.12);
}
.servings-btn:hover {
    background: var(--primary);
    color: #FFF;
    border-color: var(--primary);
    transform: scale(1.08);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);
}
.servings-count {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    min-width: 32px;
    text-align: center;
}
.servings-scaler-hint {
    font-size: 11.5px;
    color: var(--text-muted);
    margin-top: 10px;
    line-height: 1.5;
    font-style: italic;
}

/* Ingredient checklist */
.ing-checkbox-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 8px;
    border-bottom: 1px dashed var(--border-warm);
    cursor: pointer;
    user-select: none;
    transition: all 0.22s ease;
    border-radius: 8px;
    margin: 0 -8px;
}
.ing-checkbox-row:last-child {
    border-bottom: none;
}
.ing-checkbox-row:hover {
    background-color: #FFF8EE;
    padding-left: 12px;
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
    font-size: 14.5px;
    line-height: 1.5;
    color: var(--text-main);
}
.ing-qty {
    font-weight: 800;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
}
.ing-name {
    font-weight: 500;
}

/* Ingredient actions */
.ing-actions {
    display: flex;
    gap: 8px;
    flex-direction: column;
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid var(--border-warm);
}
.ing-copy-btn {
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-weight: 800;
    font-size: 13px;
    padding: 10px;
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all 0.22s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}
.ing-copy-btn:hover {
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.18);
}
.ing-reset-btn {
    background: none;
    border: none;
    color: var(--text-light);
    font-size: 12px;
    text-decoration: underline;
    cursor: pointer;
    padding: 4px;
    transition: color 0.2s ease;
}
.ing-reset-btn:hover {
    color: var(--primary);
}

/* Side info cards */
.side-info-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    padding: 20px;
    margin-top: 18px;
    box-shadow: 0 4px 16px -4px rgba(69, 26, 3, 0.06);
}
.side-info-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 16px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.side-info-list {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.7;
    display: flex;
    flex-direction: column;
    gap: 7px;
}
.side-info-list strong {
    color: var(--earth-brown);
    font-weight: 700;
}

/* Timer card */
.timer-card {
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    border-radius: 18px;
    padding: 20px;
    margin-top: 18px;
    box-shadow: 0 6px 20px -6px rgba(217, 119, 6, 0.14);
}
.timer-display {
    font-family: 'Playfair Display', 'Georgia', monospace;
    font-size: 40px;
    font-weight: 800;
    color: var(--earth-brown);
    text-align: center;
    margin: 12px 0;
    background: #FFFFFF;
    padding: 10px;
    border-radius: 12px;
    border: 1.5px solid #FDE68A;
    letter-spacing: 1.5px;
    box-shadow: inset 0 2px 4px rgba(69, 26, 3, 0.04);
}
.timer-quick-btn {
    background: #FFF;
    border: 1px solid #FCD34D;
    color: #B45309;
    padding: 6px 4px;
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.timer-quick-btn:hover {
    background: #FEF3C7;
    border-color: var(--saffron);
}
.timer-start-btn {
    flex: 1;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    border: none;
    padding: 10px;
    font-size: 13.5px;
    font-weight: 800;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.22s ease;
    box-shadow: 0 3px 10px rgba(194, 65, 12, 0.3);
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.3px;
}
.timer-start-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.4);
}
.timer-reset-btn {
    background: #FFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    padding: 10px 14px;
    font-size: 13px;
    font-weight: 700;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.timer-reset-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}
.timer-alarm {
    display: none;
    margin-top: 10px;
    font-size: 13px;
    font-weight: 800;
    color: #DC2626;
    text-align: center;
    animation: pulse 1s infinite;
}
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ---------- MAIN CONTENT ---------- */
.recipe-main-content {
    min-width: 0;
}

/* Section heading style consistent with homepage */
.content-section-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 26px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.5px;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.content-section-title::before {
    content: '';
    display: inline-block;
    width: 4px;
    height: 26px;
    background: linear-gradient(180deg, #EA580C 0%, #F59E0B 100%);
    border-radius: 3px;
}
.content-section-subtitle {
    color: var(--text-muted);
    font-size: 14.5px;
    line-height: 1.65;
    margin-bottom: 24px;
    margin-left: 14px;
}

/* Step timeline */
.steps-timeline {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 40px;
}
.step-item {
    display: flex;
    gap: 20px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    padding: 22px 24px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}
.step-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #EA580C 0%, #F59E0B 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.step-item:hover {
    border-color: #FDBA74;
    box-shadow: 0 12px 32px -8px rgba(194, 65, 12, 0.18);
    transform: translateX(3px);
}
.step-item:hover::before {
    opacity: 1;
}
.step-number {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);
}
.step-text {
    font-size: 15.5px;
    line-height: 1.7;
    color: var(--text-main);
    flex: 1;
    padding-top: 6px;
}

/* Tips card — enhanced */
.tips-card {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    border-radius: 20px;
    padding: 26px;
    margin-bottom: 28px;
    box-shadow: 0 8px 24px -8px rgba(217, 119, 6, 0.12);
    position: relative;
    overflow: hidden;
}
.tips-card::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.5) 0%, transparent 70%);
    pointer-events: none;
}
.tips-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: #92400E;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 10px;
    letter-spacing: -0.3px;
    position: relative;
    z-index: 1;
}
.tips-list {
    padding-left: 0;
    list-style: none;
    color: #78350F;
    font-size: 14.5px;
    line-height: 1.7;
    display: flex;
    flex-direction: column;
    gap: 10px;
    position: relative;
    z-index: 1;
}
.tips-list li {
    padding-left: 28px;
    position: relative;
}
.tips-list li::before {
    content: '💡';
    position: absolute;
    left: 0;
    top: 0;
    font-size: 14px;
}

/* Info grid (substitutions/storage) */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 18px;
    margin-bottom: 32px;
}
.info-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.25s ease;
}
.info-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 8px 24px -8px rgba(194, 65, 12, 0.15);
}
.info-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 16px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.info-card-body {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.7;
}
.info-card-body ul {
    padding-left: 20px;
}

/* Mastery section */
.mastery-card {
    background: #FFFFFF;
    border: 2px solid var(--border-warm);
    border-radius: 22px;
    padding: 28px;
    margin-bottom: 36px;
    box-shadow: 0 8px 28px -8px rgba(69, 26, 3, 0.1);
    position: relative;
    overflow: hidden;
}
.mastery-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 50%, #FCD34D 100%);
}
.mastery-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 18px;
    padding-bottom: 16px;
    border-bottom: 1px dashed var(--border-warm);
}
.mastery-eyebrow {
    font-size: 11.5px;
    font-weight: 800;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
}
.mastery-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 22px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.3px;
}
.mastery-btn-group {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.mastery-status-btn {
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    font-weight: 700;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.22s ease;
    border: 1.5px solid transparent;
}
.mastery-status-btn[data-status="Learning"] {
    background: #FFFBEB;
    color: #B45309;
    border-color: #FDE68A;
}
.mastery-status-btn[data-status="Learning"]:hover {
    background: #FEF3C7;
    transform: translateY(-1px);
}
.mastery-status-btn[data-status="Practiced"] {
    background: #EFF6FF;
    color: #1D4ED8;
    border-color: #BFDBFE;
}
.mastery-status-btn[data-status="Practiced"]:hover {
    background: #DBEAFE;
    transform: translateY(-1px);
}
.mastery-status-btn[data-status="Mastered"] {
    background: #F0FDF4;
    color: #15803D;
    border-color: #86EFAC;
}
.mastery-status-btn[data-status="Mastered"]:hover {
    background: #DCFCE7;
    transform: translateY(-1px);
}
.mastery-intro {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 18px;
}
.mastery-checklist {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 18px;
}
.mastery-check-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 14.5px;
    color: var(--text-main);
    cursor: pointer;
    padding: 10px 12px;
    border-radius: 10px;
    transition: background 0.2s ease;
    line-height: 1.5;
}
.mastery-check-item:hover {
    background: #FFF8EE;
}
.mastery-chk {
    width: 18px;
    height: 18px;
    margin-top: 1px;
    accent-color: var(--primary);
    flex-shrink: 0;
    cursor: pointer;
}
.mastery-feedback {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--primary);
    padding-top: 14px;
    border-top: 1px dashed var(--border-warm);
}

/* Related lessons card */
.related-lessons-card {
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 100%);
    border: 1.5px solid #FDBA74;
    border-radius: 22px;
    padding: 26px;
    margin-bottom: 32px;
    box-shadow: 0 8px 24px -8px rgba(194, 65, 12, 0.12);
}
.related-lessons-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 14px;
    margin-top: 16px;
}
.related-lesson-tile {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    padding: 14px 16px;
    text-decoration: none;
    color: inherit;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.04);
}
.related-lesson-tile:hover {
    border-color: var(--primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px -6px rgba(194, 65, 12, 0.2);
}

/* Serving suggestion card */
.serving-suggestion-card {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border: 1.5px solid #BBF7D0;
    border-radius: 18px;
    padding: 22px;
    margin-bottom: 40px;
    box-shadow: 0 4px 16px -6px rgba(22, 163, 74, 0.1);
}
.serving-suggestion-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 17px;
    font-weight: 800;
    color: #166534;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.serving-suggestion-text {
    font-size: 14.5px;
    color: #14532D;
    line-height: 1.65;
}

/* ============================================================
   RELATED RECIPES SECTION — REDESIGNED "DISHES THAT PAIR WELL"
   ============================================================ */
.related-recipes-section {
    margin-top: 20px;
    padding: 40px 32px 32px;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    border-radius: 28px;
    position: relative;
    overflow: hidden;
    box-shadow:
        0 16px 40px -12px rgba(194, 65, 12, 0.14),
        0 6px 16px -4px rgba(69, 26, 3, 0.06);
}
.related-recipes-section::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.18) 0%, transparent 70%);
    pointer-events: none;
}
.related-recipes-section::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -80px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.28) 0%, transparent 70%);
    pointer-events: none;
}
.related-recipes-header {
    margin-bottom: 30px;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
}
.related-recipes-header-text {
    flex: 1;
    min-width: 260px;
}
.related-recipes-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 10px;
}
.related-recipes-eyebrow::before {
    content: '';
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.related-recipes-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.7px;
    line-height: 1.15;
    position: relative;
    padding-bottom: 16px;
}
.related-recipes-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 64px;
    height: 4px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 3px;
}
.related-recipes-browse-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.12);
    white-space: nowrap;
}
.related-recipes-browse-btn:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(194, 65, 12, 0.32);
}
.related-recipes-browse-btn .arrow {
    transition: transform 0.25s ease;
}
.related-recipes-browse-btn:hover .arrow {
    transform: translateX(4px);
}

/* Compact elegant grid for related recipe cards */
.related-recipes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 22px;
    position: relative;
    z-index: 2;
}

/* Compact card variant — refined and aligned */
.pair-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.35s ease,
                border-color 0.35s ease;
    box-shadow: 0 4px 16px -4px rgba(69, 26, 3, 0.08);
    position: relative;
    text-decoration: none;
    color: inherit;
}
.pair-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -10px rgba(194, 65, 12, 0.22);
    border-color: #FDBA74;
}

/* Card image */
.pair-card-image {
    position: relative;
    width: 100%;
    height: 160px;
    overflow: hidden;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
.pair-card-image::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(69,26,3,0) 50%, rgba(69,26,3,0.45) 100%);
    pointer-events: none;
    z-index: 1;
}
.pair-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.pair-card:hover .pair-card-img {
    transform: scale(1.1);
}
.pair-card-emoji {
    font-size: 64px;
    filter: drop-shadow(0 6px 14px rgba(69, 26, 3, 0.18));
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.pair-card:hover .pair-card-emoji {
    transform: scale(1.15) rotate(-5deg);
}

/* Diet badge overlay */
.pair-card-diet {
    position: absolute;
    top: 12px;
    left: 12px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 10.5px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    backdrop-filter: blur(8px);
    text-transform: uppercase;
    letter-spacing: 0.4px;
    z-index: 3;
}
.pair-card-diet--veg {
    background: rgba(255, 255, 255, 0.95);
    color: #15803D;
    border: 1px solid #BBF7D0;
}
.pair-card-diet--veg::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #16A34A;
}
.pair-card-diet--nonveg {
    background: rgba(255, 255, 255, 0.95);
    color: #B91C1C;
    border: 1px solid #FECACA;
}
.pair-card-diet--nonveg::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #DC2626;
}

/* Time badge bottom-right */
.pair-card-time {
    position: absolute;
    bottom: 12px;
    right: 12px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 800;
    color: #FFF;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    background: rgba(69, 26, 3, 0.82);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
}

/* Card body */
.pair-card-body {
    padding: 16px 18px 18px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.pair-card-cat {
    font-size: 10.5px;
    font-weight: 800;
    color: var(--saffron);
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 6px;
}
.pair-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 17px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.28;
    margin-bottom: 4px;
    letter-spacing: -0.3px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 44px;
}
.pair-card:hover .pair-card-title {
    color: var(--primary);
}
.pair-card-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 10px;
    letter-spacing: 0.1px;
}
.pair-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding-top: 12px;
    border-top: 1px dashed var(--border-warm);
    margin-top: auto;
}
.pair-card-servings {
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.pair-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: 800;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.1px;
    transition: gap 0.22s ease;
}
.pair-card:hover .pair-card-cta {
    gap: 8px;
}

/* ---------- COOKING MODE MODAL ---------- */
#cookingModeModal {
    display: none;
    position: fixed;
    inset: 0;
    background: linear-gradient(180deg, #FFFDF9 0%, #FFF8EE 100%);
    z-index: 9999;
    overflow-y: auto;
    padding: 24px 20px;
    flex-direction: column;
    justify-content: space-between;
}
#cookingModeModal.active {
    display: flex;
}
.cooking-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1.5px solid var(--border-warm);
    padding-bottom: 16px;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
}
.cooking-modal-eyebrow {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-weight: 700;
    font-style: italic;
    color: var(--primary);
    letter-spacing: 0.3px;
    margin-bottom: 2px;
}
.cooking-modal-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.4px;
}
.cooking-progress-bar-wrap {
    width: 100%;
    height: 10px;
    background: #FED7AA;
    border-radius: var(--radius-pill);
    overflow: hidden;
}
.cooking-progress-bar {
    width: 0%;
    height: 100%;
    background: linear-gradient(90deg, #EA580C, #C2410C);
    transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.cooking-step-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 0;
}
.cooking-step-card {
    background: #FFFFFF;
    border: 2px solid #FED7AA;
    border-radius: 24px;
    padding: clamp(24px, 5vw, 42px);
    max-width: 860px;
    width: 100%;
    box-shadow: 0 20px 48px -12px rgba(194, 65, 12, 0.2);
    text-align: center;
}
.cooking-step-badge {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 26px;
    font-weight: 800;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.35);
}
.cooking-step-text {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(20px, 3.2vw, 28px);
    line-height: 1.6;
    color: var(--earth-brown);
    margin-bottom: 24px;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 1000px) {
    .recipe-hero-grid {
        grid-template-columns: 220px 1fr;
        gap: 28px;
    }
    .recipe-detail-layout {
        grid-template-columns: 340px 1fr;
        gap: 28px;
    }
}
@media (max-width: 900px) {
    .recipe-hero-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }
    .recipe-hero-image-wrap {
        max-width: 240px;
        margin: 0 auto;
    }
    .recipe-detail-layout {
        grid-template-columns: 1fr;
    }
    .ingredient-card {
        position: static;
    }
    .recipe-hero-title {
        font-size: 32px;
    }
    .related-recipes-section {
        padding: 30px 22px 24px;
    }
}
@media (max-width: 640px) {
    .recipe-hero {
        padding: 24px 0 32px;
    }
    .hero-breadcrumb-pill {
        font-size: 12px;
        padding: 5px 12px;
        margin-bottom: 14px;
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
    }
    .recipe-hero-image-wrap {
        max-width: 200px;
        border-radius: 18px;
    }
    .recipe-hero-title {
        font-size: 24px;
        line-height: 1.2;
    }
    .recipe-hero-telugu {
        font-size: 15px;
    }
    .recipe-hero-desc {
        font-size: 13.5px;
        line-height: 1.55;
    }
    .recipe-meta-strip {
        padding: 10px;
        gap: 6px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .recipe-meta-tile {
        padding: 6px 10px;
        background: #FFF;
        border-radius: 10px;
        border: 1px solid var(--border-warm);
    }
    .recipe-meta-tile-emoji {
        font-size: 16px;
    }
    .recipe-meta-tile-value {
        font-size: 13.5px;
    }
    .recipe-hero-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        width: 100%;
    }
    .recipe-action-btn {
        font-size: 12.5px;
        padding: 10px 12px;
        justify-content: center;
        width: 100%;
    }
    .recipe-action-btn--primary {
        grid-column: 1 / -1;
    }
    .ingredient-card {
        padding: 18px 16px;
        border-radius: 18px;
    }
    .content-section-title {
        font-size: 20px;
    }
    .step-item {
        padding: 16px 14px;
        border-radius: 16px;
    }
    .step-badge {
        width: 32px;
        height: 32px;
        font-size: 14px;
    }
    .step-text {
        font-size: 14px;
        line-height: 1.55;
    }
    .related-recipes-section {
        padding: 22px 14px 18px;
        border-radius: 20px;
    }
    .related-recipes-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .pair-card-image {
        height: 170px;
    }
}
@media (max-width: 380px) {
    .recipe-hero-actions {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- ============================================================
     RECIPE HERO SECTION
     ============================================================ -->
<div class="recipe-hero">
    <div class="container">

        <!-- Breadcrumb pill -->
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
            <div class="hero-breadcrumb-pill">
                <a href="index.php">🏠 Home</a>
                <span class="sep">›</span>
                <a href="recipes.php">Recipes</a>
                <span class="sep">›</span>
                <a href="recipes.php?cat=<?= urlencode($recipe['category']) ?>"><?= $category ?></a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);"><?= $name ?></span>
            </div>

            <a href="recipes.php" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 8px 18px; font-size: 13px;">
                ← Back to All Recipes
            </a>
        </div>

        <!-- Hero grid -->
        <div class="recipe-hero-grid">

            <!-- Image -->
            <div class="recipe-hero-image-wrap">
                <?php if ($imageExists): ?>
                    <img src="<?= h($image) ?>" alt="<?= $name ?>" class="recipe-hero-image">
                <?php else: ?>
                    <span class="recipe-hero-emoji"><?= $icon ?></span>
                <?php endif; ?>
                <div class="recipe-hero-image-corner-badge">
                    <span>⭐</span> Amma's Recipe
                </div>
            </div>

            <!-- Text content -->
            <div class="recipe-hero-text">

                <div class="recipe-hero-badges">
                    <span class="recipe-pill <?= $isVeg ? 'recipe-pill--veg' : 'recipe-pill--nonveg' ?>">
                        <?= $isVeg ? 'Veg' : 'Non-Veg' ?>
                    </span>
                    <span class="recipe-pill recipe-pill--<?= strtolower($difficulty) ?>">
                        📊 <?= $difficulty ?>
                    </span>
                    <span class="recipe-pill">
                        📍 <?= $cuisine ?>
                    </span>
                    <span class="recipe-pill">
                        📂 <?= $category ?>
                    </span>
                </div>

                <h1 class="recipe-hero-title"><?= $name ?></h1>

                <?php if ($regName): ?>
                    <div class="recipe-hero-telugu"><?= $regName ?></div>
                <?php endif; ?>

                <p class="recipe-hero-desc"><?= $desc ?></p>

                <!-- Meta strip -->
                <div class="recipe-meta-strip">
                    <div class="recipe-meta-tile">
                        <span class="recipe-meta-tile-emoji">⏱️</span>
                        <div class="recipe-meta-tile-text">
                            <span class="recipe-meta-tile-label">Prep</span>
                            <span class="recipe-meta-tile-value"><?= $prep ?> min</span>
                        </div>
                    </div>
                    <div class="recipe-meta-tile">
                        <span class="recipe-meta-tile-emoji">🍳</span>
                        <div class="recipe-meta-tile-text">
                            <span class="recipe-meta-tile-label">Cook</span>
                            <span class="recipe-meta-tile-value"><?= $cook ?> min</span>
                        </div>
                    </div>
                    <div class="recipe-meta-tile">
                        <span class="recipe-meta-tile-emoji">⏳</span>
                        <div class="recipe-meta-tile-text">
                            <span class="recipe-meta-tile-label">Total</span>
                            <span class="recipe-meta-tile-value" style="color: var(--primary);"><?= $totalTime ?> min</span>
                        </div>
                    </div>
                    <div class="recipe-meta-tile">
                        <span class="recipe-meta-tile-emoji">👥</span>
                        <div class="recipe-meta-tile-text">
                            <span class="recipe-meta-tile-label">Serves</span>
                            <span class="recipe-meta-tile-value" id="metricServingDisplay"><?= $defaultServings ?></span>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="recipe-hero-actions">
                    <button type="button" id="btnStartCooking" class="recipe-action-btn recipe-action-btn--primary">
                        <span style="font-size: 17px;">👨‍🍳</span>
                        <span>Start Cooking Mode</span>
                    </button>

                    <button type="button" class="recipe-action-btn recipe-action-btn--secondary recipe-action-btn--fav btn-fav-card" data-fav-id="<?= h($recipe['id']) ?>" aria-label="Save to favorites">
                        <svg class="heart-icon" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <span id="favBtnLabel">Favorite</span>
                    </button>

                    <button type="button" onclick="window.print()" class="recipe-action-btn recipe-action-btn--secondary" title="Print this recipe">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
</div>

<!-- ============================================================
     MAIN BODY
     ============================================================ -->
<div class="container">
    <div class="recipe-detail-layout">

        <!-- ==================== LEFT: INGREDIENTS ==================== -->
        <aside class="recipe-sidebar">

            <div class="ingredient-card">

                <div class="ingredient-card-title">
                    <span>🧺 Ingredients</span>
                    <span class="ingredient-card-progress" id="checklistProgressText">0 / <?= count($ingredients) ?> ready</span>
                </div>

                <!-- Servings scaler -->
                <div class="servings-scaler">
                    <div class="servings-scaler-label">
                        <span>⚖️</span> Adjust Portion Size
                    </div>
                    <div class="servings-scaler-controls">
                        <span class="servings-scaler-text">Servings:</span>
                        <div class="servings-scaler-counter">
                            <button type="button" id="btnDecreaseServings" class="servings-btn" aria-label="Decrease servings">−</button>
                            <span id="currentServingCount" class="servings-count"><?= $defaultServings ?></span>
                            <button type="button" id="btnIncreaseServings" class="servings-btn" aria-label="Increase servings">+</button>
                        </div>
                    </div>
                    <div class="servings-scaler-hint">
                        ℹ️ Salt, chillies & spices should be adjusted to taste. Cooking times remain the same.
                    </div>
                </div>

                <!-- Ingredient checklist -->
                <div id="ingredientsList" role="list">
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
                                    <span style="display: block; font-size: 12px; color: var(--text-light); font-style: italic; margin-top: 2px;">
                                        (<?= $notes ?>)
                                    </span>
                                <?php endif; ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <!-- Ingredient actions -->
                <div class="ing-actions">
                    <button type="button" id="btnCopyIngredients" class="ing-copy-btn">
                        📋 Copy Ingredients
                    </button>
                    <button type="button" id="btnResetChecklist" class="ing-reset-btn">
                        Reset checklist
                    </button>
                </div>

            </div>

            <!-- Measurement guide -->
            <div class="side-info-card">
                <h3 class="side-info-title"><span>⚖️</span> Kitchen Measurements</h3>
                <div class="side-info-list">
                    <div>• <strong>1 Cup</strong> = 240 ml (≈200g rice/dal)</div>
                    <div>• <strong>1 Tablespoon</strong> = 15 ml (3 tsp)</div>
                    <div>• <strong>1 Teaspoon</strong> = 5 ml</div>
                    <div>• <strong>Lemon-sized tamarind</strong> = ≈15–20 g</div>
                </div>
            </div>

            <!-- Timer -->
            <div class="timer-card">
                <h3 class="side-info-title" style="color: var(--primary);"><span>⏱️</span> Kitchen Cooking Timer</h3>

                <div id="timerDisplay" class="timer-display">05:00</div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; margin-bottom: 10px;">
                    <button type="button" class="timer-quick-btn" onclick="setTimerMinutes(3)">3 min</button>
                    <button type="button" class="timer-quick-btn" onclick="setTimerMinutes(5)">5 min</button>
                    <button type="button" class="timer-quick-btn" onclick="setTimerMinutes(10)">10 min</button>
                </div>

                <div style="display: flex; gap: 8px;">
                    <button type="button" id="btnTimerStart" class="timer-start-btn">Start Timer</button>
                    <button type="button" id="btnTimerReset" class="timer-reset-btn">Reset</button>
                </div>
                <div id="timerAlarmNotice" class="timer-alarm">🔔 Time's up! Check your dish!</div>
            </div>

        </aside>

        <!-- ==================== RIGHT: STEPS & CONTENT ==================== -->
        <main class="recipe-main-content">

            <!-- Steps -->
            <div>
                <h2 class="content-section-title">Step-by-Step Cooking Instructions</h2>
                <p class="content-section-subtitle">
                    Follow these simple steps in order. Take your time, monitor the flame, and look for visual doneness cues.
                </p>

                <div class="steps-timeline">
                    <?php foreach ($steps as $sIdx => $stepText): ?>
                        <div class="step-item" id="step-row-<?= $sIdx + 1 ?>">
                            <div class="step-number"><?= $sIdx + 1 ?></div>
                            <div class="step-text"><?= h($stepText) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Tips -->
            <?php if (!empty($tips)): ?>
                <div class="tips-card">
                    <h3 class="tips-title"><span>💡</span> Amma's Secrets & Cooking Tips</h3>
                    <ul class="tips-list">
                        <?php foreach ($tips as $t): ?>
                            <li><?= h($t) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Substitutions & storage -->
            <div class="info-grid">
                <?php if (!empty($substitutions)): ?>
                    <div class="info-card">
                        <h4 class="info-card-title"><span>🔄</span> Ingredient Substitutions</h4>
                        <div class="info-card-body">
                            <ul>
                                <?php foreach ($substitutions as $sub): ?>
                                    <li><?= h($sub) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($storage)): ?>
                    <div class="info-card">
                        <h4 class="info-card-title"><span>🧊</span> Storage & Leftover Guidance</h4>
                        <div class="info-card-body"><?= $storage ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mastery checklist -->
            <div id="recipeMasterySection" class="mastery-card">
                <div class="mastery-header">
                    <div>
                        <div class="mastery-eyebrow">Culinary Skill Progression</div>
                        <h3 class="mastery-title">Recipe Mastery Checklist</h3>
                    </div>

                    <div class="mastery-btn-group">
                        <button type="button" class="mastery-status-btn" data-status="Learning">🌱 Learning</button>
                        <button type="button" class="mastery-status-btn" data-status="Practiced">🍳 Practiced</button>
                        <button type="button" class="mastery-status-btn" data-status="Mastered">👑 Mastered</button>
                    </div>
                </div>

                <p class="mastery-intro">
                    Track your personal confidence preparing this dish. Check each milestone as you practice:
                </p>

                <div class="mastery-checklist">
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="0">
                        <span>I understand the ingredients and flavor roles.</span>
                    </label>
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="1">
                        <span>I understand the step-by-step preparation flow.</span>
                    </label>
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="2">
                        <span>I have organized and measured all ingredients (Mise en place).</span>
                    </label>
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="3">
                        <span>I have successfully cooked this recipe at least once.</span>
                    </label>
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="4">
                        <span>I understand common mistakes and how to avoid/fix them.</span>
                    </label>
                    <label class="mastery-check-item">
                        <input type="checkbox" class="mastery-chk" data-idx="5">
                        <span>I can prepare this recipe confidently without looking at steps.</span>
                    </label>
                </div>

                <div id="masteryStatusFeedback" class="mastery-feedback">
                    Current Status: None selected
                </div>
            </div>

            <!-- Related lessons -->
            <?php if (!empty($relatedLessons)): ?>
                <div id="relatedLessonsBox" class="related-lessons-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                        <div>
                            <div class="mastery-eyebrow">Recommended Academy Guidance</div>
                            <h4 class="mastery-title" style="font-size: 19px;">Lessons to Build Confidence in This Dish</h4>
                        </div>
                        <a href="academy.php" style="font-size: 13px; font-weight: 700; color: var(--primary); font-family: 'Playfair Display', var(--font-serif);">Explore Academy →</a>
                    </div>

                    <div class="related-lessons-grid">
                        <?php foreach ($relatedLessons as $rLsn): ?>
                            <a href="lesson.php?id=<?= urlencode($rLsn['id']) ?>" class="related-lesson-tile">
                                <span style="font-size: 26px;"><?= $rLsn['icon'] ?? '📖' ?></span>
                                <div>
                                    <div style="font-size: 10.5px; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px;">
                                        <?= h($rLsn['category'] ?? 'Lesson') ?>
                                    </div>
                                    <div style="font-size: 14px; font-weight: 700; color: var(--earth-brown); line-height: 1.3;">
                                        <?= h($rLsn['title']) ?>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Serving suggestion -->
            <div class="serving-suggestion-card">
                <h4 class="serving-suggestion-title"><span>🍽️</span> How to Serve This Dish</h4>
                <p class="serving-suggestion-text">
                    Serve piping hot directly from the stove. Pair with fresh ghee, homemade pickles (Avakaya), and warm papads for the most authentic dining experience.
                </p>
            </div>

            <!-- ============================================================
                 RELATED RECIPES — REDESIGNED "DISHES THAT PAIR WELL"
                 ============================================================ -->
            <?php if (!empty($relatedRecipes)): ?>
                <div class="related-recipes-section">
                    <div class="related-recipes-header">
                        <div class="related-recipes-header-text">
                            <div class="related-recipes-eyebrow">You Might Also Love</div>
                            <h3 class="related-recipes-title">Dishes That Pair Well</h3>
                        </div>
                        <a href="recipes.php" class="related-recipes-browse-btn">
                            <span>Browse All Recipes</span>
                            <span class="arrow">→</span>
                        </a>
                    </div>

                    <div class="related-recipes-grid">
                        <?php foreach ($relatedRecipes as $rel): ?>
                            <?php
                                $relIsVeg = strtolower($rel['type'] ?? 'Vegetarian') === 'vegetarian';
                                $relTime = (int)($rel['prep_time'] ?? 0) + (int)($rel['cook_time'] ?? 0);
                                $relImage = !empty($rel['image']) ? $rel['image'] : '';
                                $relImageExists = $relImage && file_exists(__DIR__ . '/' . ltrim($relImage, '/'));
                                $relEmoji = $rel['icon'] ?? '🍲';
                                $relTelugu = $rel['regional_name'] ?? '';
                                $relCategory = $rel['category'] ?? '';
                                $relServings = $rel['servings'] ?? 2;
                                $relId = $rel['id'] ?? '';
                            ?>
                            <a href="recipe.php?id=<?= h((string)$relId) ?>" class="pair-card">
                                <div class="pair-card-image">
                                    <?php if ($relImageExists): ?>
                                        <img src="<?= h($relImage) ?>" alt="<?= h($rel['name'] ?? 'Recipe') ?>" class="pair-card-img" loading="lazy">
                                    <?php else: ?>
                                        <span class="pair-card-emoji"><?= $relEmoji ?></span>
                                    <?php endif; ?>

                                    <span class="pair-card-diet <?= $relIsVeg ? 'pair-card-diet--veg' : 'pair-card-diet--nonveg' ?>">
                                        <?= $relIsVeg ? 'Veg' : 'Non-Veg' ?>
                                    </span>

                                    <span class="pair-card-time">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <?= $relTime ?> min
                                    </span>
                                </div>

                                <div class="pair-card-body">
                                    <?php if ($relCategory): ?>
                                        <div class="pair-card-cat">🍽️ <?= h($relCategory) ?></div>
                                    <?php endif; ?>

                                    <div class="pair-card-title"><?= h($rel['name'] ?? 'Untitled') ?></div>

                                    <?php if ($relTelugu): ?>
                                        <div class="pair-card-telugu"><?= h($relTelugu) ?></div>
                                    <?php endif; ?>

                                    <div class="pair-card-footer">
                                        <span class="pair-card-servings">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                            </svg>
                                            <?= h((string)$relServings) ?>
                                        </span>
                                        <span class="pair-card-cta">
                                            View
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </main>

    </div>
</div>

<!-- ============================================================
     COOKING MODE MODAL
     ============================================================ -->
<div id="cookingModeModal" role="dialog" aria-modal="true" aria-labelledby="cookingModeTitle">

    <div class="cooking-modal-header">
        <div>
            <div class="cooking-modal-eyebrow">Interactive Cooking Mode</div>
            <h2 id="cookingModeTitle" class="cooking-modal-title"><?= $name ?></h2>
        </div>

        <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
            <button type="button" id="btnToggleIngredientsList" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 8px 16px; font-size: 13px;">
                📋 View Ingredients
            </button>
            <span style="font-size: 14px; font-weight: 700; color: var(--text-muted); background: #FFF; padding: 6px 14px; border-radius: var(--radius-pill); border: 1.5px solid var(--border-warm);">
                👥 <span id="cookingModeServingCount"><?= $defaultServings ?></span> Servings
            </span>
            <button type="button" id="btnExitCookingMode" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 8px 18px; font-size: 13.5px;">
                ✕ Exit
            </button>
        </div>
    </div>

    <!-- Ingredients drawer -->
    <div id="cookingModalIngDrawer" style="display: none; background: #FFF; border: 2px solid #FED7AA; border-radius: 18px; padding: 18px 22px; margin-bottom: 20px; max-height: 220px; overflow-y: auto;">
        <h4 style="font-family: 'Playfair Display', var(--font-serif); font-size: 16px; font-weight: 800; color: var(--earth-brown); margin-bottom: 10px;">
            Ingredients for <?= $name ?>
        </h4>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 8px; font-size: 14px;">
            <?php foreach ($ingredients as $mIng): ?>
                <div>• <strong><?= !empty($mIng['quantity']) ? $mIng['quantity'] . ' ' : '' ?><?= h($mIng['unit'] ?? '') ?></strong> <?= h($mIng['name']) ?></div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Progress -->
    <div style="margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
            <span id="cookingStepCounter" style="font-family: 'Playfair Display', var(--font-serif);">Step 1 of <?= count($steps) ?></span>
            <span id="cookingStepPercent">0% Completed</span>
        </div>
        <div class="cooking-progress-bar-wrap">
            <div id="cookingProgressBar" class="cooking-progress-bar"></div>
        </div>
    </div>

    <!-- Step content -->
    <div class="cooking-step-container">
        <div class="cooking-step-card">
            <div id="modalStepNumberBadge" class="cooking-step-badge">1</div>
            <p id="modalStepInstructionText" class="cooking-step-text"></p>

            <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-bottom: 12px;">
                <button type="button" id="btnRepeatStep" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 8px 18px; font-size: 13px;">
                    🔁 Repeat Step
                </button>
                <button type="button" id="btnModalTimerQuick5" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 8px 18px; font-size: 13px;">
                    ⏱️ Quick 5 Min Timer (<span id="modalTimerDisplay">05:00</span>)
                </button>
            </div>

            <div id="completionCelebration" style="display: none; background: linear-gradient(135deg, #ECFDF5 0%, #DCFCE7 100%); border: 2px solid #10B981; border-radius: 18px; padding: 24px; margin-top: 16px;">
                <div style="font-size: 48px; margin-bottom: 8px;">🎉🍲</div>
                <h3 style="font-family: 'Playfair Display', var(--font-serif); font-size: 24px; color: #065F46; margin-bottom: 6px; font-weight: 800;">
                    Recipe Complete!
                </h3>
                <p style="color: #047857; font-size: 15.5px; margin-bottom: 16px;">
                    Amma, your delicious <strong><?= $name ?></strong> is ready to serve. Enjoy your warm meal with family!
                </p>
                <button type="button" id="btnCelebrationMarkMastered" class="recipe-action-btn recipe-action-btn--primary" style="font-size: 14px;">
                    👑 Mark as Mastered Recipe
                </button>
            </div>
        </div>
    </div>

    <!-- Modal footer -->
    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1.5px solid var(--border-warm); padding-top: 18px; margin-top: 16px; gap: 16px; flex-wrap: wrap;">
        <button type="button" id="btnPrevStep" class="recipe-action-btn recipe-action-btn--secondary" style="padding: 12px 26px; font-size: 15px;">
            ← Previous Step
        </button>

        <button type="button" id="btnMarkComplete" class="recipe-action-btn" style="display: none; background: #ECFDF5; color: #047857; border: 1.5px solid #A7F3D0; padding: 12px 26px; font-size: 15px;">
            ✓ Mark Recipe Complete
        </button>

        <button type="button" id="btnNextStep" class="recipe-action-btn recipe-action-btn--primary" style="padding: 12px 30px; font-size: 15px;">
            Next Step →
        </button>
    </div>

</div>

<!-- ============================================================
     JAVASCRIPT — ALL ORIGINAL FUNCTIONALITY PRESERVED
     ============================================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const recipeId = <?= json_encode($recipe['id']) ?>;
        const defaultServings = <?= $defaultServings ?>;
        let currentServings = defaultServings;
        const stepsData = <?= json_encode($steps) ?>;
        let currentStepIndex = 0;

        // Record recent
        if (window.AmmaStorage) {
            let recents = window.AmmaStorage.get('amma_recent_recipes', []);
            recents = recents.filter(function(id) { return id !== recipeId; });
            recents.unshift(recipeId);
            recents = recents.slice(0, 10);
            window.AmmaStorage.set('amma_recent_recipes', recents);
        }

        // Servings calculator
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

        // Ingredient checklist
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
            if (progressEl) progressEl.textContent = checkedCount + ' / ' + checkboxes.length + ' ready';
            if (window.AmmaStorage) window.AmmaStorage.set(checklistKey, checkedIndices);
        }

        checkboxes.forEach(function(cb) {
            const idx = cb.getAttribute('data-ing-idx');
            if (savedChecked.includes(idx)) cb.checked = true;
            cb.addEventListener('change', updateChecklistProgress);
        });
        updateChecklistProgress();

        document.getElementById('btnResetChecklist').addEventListener('click', function() {
            checkboxes.forEach(function(cb) { cb.checked = false; });
            updateChecklistProgress();
        });

        // Copy ingredients
        document.getElementById('btnCopyIngredients').addEventListener('click', function() {
            const btn = this;
            let text = "Ingredients for <?= addslashes($name) ?> (" + currentServings + " servings):\n";
            document.querySelectorAll('.ing-checkbox-row').forEach(function(row) {
                const label = row.querySelector('.ing-label');
                if (label) text += "• " + label.innerText.replace(/\s+/g, ' ').trim() + "\n";
            });

            function fallbackCopy() {
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                btn.textContent = '✓ Copied!';
                setTimeout(function() { btn.textContent = '📋 Copy Ingredients'; }, 2500);
            }

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function() {
                    btn.textContent = '✓ Copied!';
                    setTimeout(function() { btn.textContent = '📋 Copy Ingredients'; }, 2500);
                }).catch(fallbackCopy);
            } else {
                fallbackCopy();
            }
        });

        // Cooking mode
        const modal = document.getElementById('cookingModeModal');
        const startBtn = document.getElementById('btnStartCooking');
        const exitBtn = document.getElementById('btnExitCookingMode');
        const prevBtn = document.getElementById('btnPrevStep');
        const nextBtn = document.getElementById('btnNextStep');
        const completeBtn = document.getElementById('btnMarkComplete');
        const repeatBtn = document.getElementById('btnRepeatStep');
        const toggleIngBtn = document.getElementById('btnToggleIngredientsList');
        const ingDrawer = document.getElementById('cookingModalIngDrawer');
        const counterEl = document.getElementById('cookingStepCounter');
        const percentEl = document.getElementById('cookingStepPercent');
        const progressBar = document.getElementById('cookingProgressBar');
        const badgeEl = document.getElementById('modalStepNumberBadge');
        const textEl = document.getElementById('modalStepInstructionText');
        const celebEl = document.getElementById('completionCelebration');
        const celebMasterBtn = document.getElementById('btnCelebrationMarkMastered');

        const savedCookingStepKey = 'amma_cook_step_' + recipeId;
        const savedCookingStep = window.AmmaStorage ? parseInt(window.AmmaStorage.get(savedCookingStepKey, '0'), 10) : 0;
        if (!isNaN(savedCookingStep) && savedCookingStep > 0 && savedCookingStep < stepsData.length) {
            currentStepIndex = savedCookingStep;
        }

        function renderCookingStep(index) {
            if (index < 0 || index >= stepsData.length) return;
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

            if (window.AmmaStorage) window.AmmaStorage.set(savedCookingStepKey, index);
        }

        startBtn.addEventListener('click', function() {
            renderCookingStep(currentStepIndex);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        exitBtn.addEventListener('click', function() {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        });

        prevBtn.addEventListener('click', function() {
            if (currentStepIndex > 0) renderCookingStep(currentStepIndex - 1);
        });

        nextBtn.addEventListener('click', function() {
            if (currentStepIndex < stepsData.length - 1) renderCookingStep(currentStepIndex + 1);
        });

        if (repeatBtn) {
            repeatBtn.addEventListener('click', function() {
                renderCookingStep(currentStepIndex);
            });
        }

        if (toggleIngBtn && ingDrawer) {
            toggleIngBtn.addEventListener('click', function() {
                const isHidden = (ingDrawer.style.display === 'none' || ingDrawer.style.display === '');
                ingDrawer.style.display = isHidden ? 'block' : 'none';
                toggleIngBtn.textContent = isHidden ? '✕ Hide Ingredients' : '📋 View Ingredients';
            });
        }

        completeBtn.addEventListener('click', function() {
            celebEl.style.display = 'block';
            completeBtn.style.display = 'none';
            if (window.AmmaStorage) {
                window.AmmaStorage.set(savedCookingStepKey, 0);
                let practiced = window.AmmaStorage.get('amma_practiced_recipes', []);
                if (!practiced.includes(recipeId)) {
                    practiced.push(recipeId);
                    window.AmmaStorage.set('amma_practiced_recipes', practiced);
                }
            }
        });

        if (window.location.hash === '#cookingModeModal' || localStorage.getItem('amma_trigger_cook_mode') === '1') {
            localStorage.removeItem('amma_trigger_cook_mode');
            renderCookingStep(currentStepIndex);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Timer
        let timerSeconds = 300;
        let timerInterval = null;
        let isRunning = false;
        const timerDisplay = document.getElementById('timerDisplay');
        const startTimerBtn = document.getElementById('btnTimerStart');
        const resetTimerBtn = document.getElementById('btnTimerReset');
        const alarmNotice = document.getElementById('timerAlarmNotice');
        const modalTimerBtn = document.getElementById('btnModalTimerQuick5');
        const modalTimerDisplay = document.getElementById('modalTimerDisplay');

        function formatTimer(s) {
            const m = Math.floor(s / 60);
            const remSec = s % 60;
            return (m < 10 ? '0' : '') + m + ':' + (remSec < 10 ? '0' : '') + remSec;
        }

        function updateTimerDisplay() {
            const txt = formatTimer(timerSeconds);
            if (timerDisplay) timerDisplay.textContent = txt;
            if (modalTimerDisplay) modalTimerDisplay.textContent = txt;
        }

        window.setTimerMinutes = function(mins) {
            clearInterval(timerInterval);
            isRunning = false;
            if (startTimerBtn) startTimerBtn.textContent = 'Start Timer';
            if (alarmNotice) alarmNotice.style.display = 'none';
            timerSeconds = mins * 60;
            updateTimerDisplay();
        };

        if (startTimerBtn) {
            startTimerBtn.addEventListener('click', function() {
                if (isRunning) {
                    clearInterval(timerInterval);
                    isRunning = false;
                    startTimerBtn.textContent = 'Resume Timer';
                } else {
                    if (alarmNotice) alarmNotice.style.display = 'none';
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
                            if (alarmNotice) alarmNotice.style.display = 'block';
                        }
                    }, 1000);
                }
            });
        }

        if (resetTimerBtn) {
            resetTimerBtn.addEventListener('click', function() {
                clearInterval(timerInterval);
                isRunning = false;
                if (startTimerBtn) startTimerBtn.textContent = 'Start Timer';
                if (alarmNotice) alarmNotice.style.display = 'none';
                timerSeconds = 300;
                updateTimerDisplay();
            });
        }

        if (modalTimerBtn) {
            modalTimerBtn.addEventListener('click', function() {
                if (!isRunning) {
                    timerSeconds = 300;
                    isRunning = true;
                    modalTimerBtn.style.background = 'var(--primary)';
                    modalTimerBtn.style.color = '#FFF';
                    timerInterval = setInterval(function() {
                        if (timerSeconds > 0) {
                            timerSeconds--;
                            updateTimerDisplay();
                        } else {
                            clearInterval(timerInterval);
                            isRunning = false;
                            modalTimerBtn.style.background = '#ECFDF5';
                            modalTimerBtn.style.color = '#047857';
                            if (modalTimerDisplay) modalTimerDisplay.textContent = "DONE!";
                        }
                    }, 1000);
                } else {
                    clearInterval(timerInterval);
                    isRunning = false;
                    modalTimerBtn.style.background = '';
                    modalTimerBtn.style.color = '';
                }
            });
        }

        // Mastery
        const masteryStorageKey = 'amma_mastery_' + recipeId;
        const statusFeedbackEl = document.getElementById('masteryStatusFeedback');
        const masteryButtons = document.querySelectorAll('.mastery-status-btn');
        const masteryCheckboxes = document.querySelectorAll('.mastery-chk');

        function loadMasteryState() {
            if (!window.AmmaStorage) return;
            const savedChecks = window.AmmaStorage.get(masteryStorageKey + '_checks', [false, false, false, false, false, false]);
            masteryCheckboxes.forEach(function(chk, idx) {
                chk.checked = !!savedChecks[idx];
            });
            const savedStatus = window.AmmaStorage.get(masteryStorageKey + '_status', null);
            updateMasteryStatusUI(savedStatus);
        }

        function updateMasteryStatusUI(status) {
            masteryButtons.forEach(function(btn) {
                const btnStatus = btn.getAttribute('data-status');
                if (btnStatus === status) {
                    btn.style.boxShadow = '0 0 0 3px rgba(194, 65, 12, 0.35)';
                    btn.style.fontWeight = '800';
                    btn.style.transform = 'scale(1.05)';
                } else {
                    btn.style.boxShadow = 'none';
                    btn.style.fontWeight = '700';
                    btn.style.transform = 'none';
                }
            });

            if (statusFeedbackEl) {
                if (status === 'Mastered') {
                    statusFeedbackEl.innerHTML = '<span style="color: #15803D;">👑 Recipe Status: Mastered! Saved in your culinary achievements.</span>';
                } else if (status === 'Practiced') {
                    statusFeedbackEl.innerHTML = '<span style="color: #1D4ED8;">🍳 Recipe Status: Practiced! Continue cooking to reach Master status.</span>';
                } else if (status === 'Learning') {
                    statusFeedbackEl.innerHTML = '<span style="color: #B45309;">🌱 Recipe Status: Currently Learning! Review steps and ingredients.</span>';
                } else {
                    statusFeedbackEl.textContent = 'Current Status: Not yet marked. Choose a level above when ready.';
                }
            }

            if (window.AmmaStorage) {
                let masteredList = window.AmmaStorage.get('amma_mastered_recipes', []);
                const idx = masteredList.indexOf(recipeId);
                if (status === 'Mastered') {
                    if (idx === -1) masteredList.push(recipeId);
                } else {
                    if (idx > -1) masteredList.splice(idx, 1);
                }
                window.AmmaStorage.set('amma_mastered_recipes', masteredList);
            }
        }

        masteryButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const newStatus = this.getAttribute('data-status');
                if (!window.AmmaStorage) return;
                window.AmmaStorage.set(masteryStorageKey + '_status', newStatus);
                updateMasteryStatusUI(newStatus);
            });
        });

        masteryCheckboxes.forEach(function(chk) {
            chk.addEventListener('change', function() {
                if (!window.AmmaStorage) return;
                const state = [];
                masteryCheckboxes.forEach(function(c) { state.push(c.checked); });
                window.AmmaStorage.set(masteryStorageKey + '_checks', state);

                const allChecked = state.every(function(v) { return v === true; });
                if (allChecked) {
                    const curr = window.AmmaStorage.get(masteryStorageKey + '_status', null);
                    if (curr !== 'Mastered') {
                        window.AmmaStorage.set(masteryStorageKey + '_status', 'Mastered');
                        updateMasteryStatusUI('Mastered');
                    }
                }
            });
        });

        if (celebMasterBtn) {
            celebMasterBtn.addEventListener('click', function() {
                if (window.AmmaStorage) {
                    window.AmmaStorage.set(masteryStorageKey + '_status', 'Mastered');
                    masteryCheckboxes.forEach(function(c) { c.checked = true; });
                    window.AmmaStorage.set(masteryStorageKey + '_checks', [true, true, true, true, true, true]);
                    updateMasteryStatusUI('Mastered');
                }
                celebMasterBtn.textContent = '✓ Saved as Mastered!';
            });
        }

        loadMasteryState();
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>