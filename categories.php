<?php
// categories.php - Categories Directory for Amma's Recipe Book
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "Recipe Categories — Amma's Recipe Book";
$current_page = 'categories';

$categories = get_categories_with_meta();
$totalCategories = count($categories);
$totalRecipes = 0;
foreach ($categories as $c) { $totalRecipes += (int)($c['count'] ?? 0); }

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     CATEGORIES PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.cat-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 60px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.cat-hero::before {
    content: '';
    position: absolute;
    top: -110px;
    right: -110px;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.22) 0%, transparent 70%);
    pointer-events: none;
}
.cat-hero::after {
    content: '';
    position: absolute;
    bottom: -130px;
    left: -100px;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(194, 65, 12, 0.1) 0%, transparent 70%);
    pointer-events: none;
}
.cat-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 780px;
}
.cat-breadcrumb {
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
    margin-bottom: 18px;
    box-shadow: 0 2px 8px rgba(194, 65, 12, 0.06);
}
.cat-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.cat-breadcrumb a:hover {
    text-decoration: underline;
}
.cat-breadcrumb .sep {
    color: #A8A29E;
}
.cat-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.cat-hero-title .accent {
    color: var(--primary);
    font-style: italic;
}
.cat-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 660px;
    margin-bottom: 24px;
}

/* Hero stats pills */
.cat-hero-stats {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 8px;
}
.cat-hero-stat {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.9);
    border: 1.5px solid #FDE68A;
    padding: 10px 20px;
    border-radius: var(--radius-pill);
    box-shadow: 0 4px 14px rgba(217, 119, 6, 0.1);
    backdrop-filter: blur(6px);
}
.cat-hero-stat-emoji {
    font-size: 20px;
    line-height: 1;
}
.cat-hero-stat-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
    text-align: left;
}
.cat-hero-stat-num {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--earth-brown);
}
.cat-hero-stat-label {
    font-size: 10.5px;
    font-weight: 700;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.6px;
}

/* ---------- SECTION ---------- */
.cat-section {
    padding: 56px 0 80px;
}
.cat-section-header {
    margin-bottom: 36px;
}
.cat-section-eyebrow {
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
.cat-section-eyebrow::before {
    content: '';
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.cat-section-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(28px, 3.5vw, 38px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.8px;
    line-height: 1.15;
    margin-bottom: 8px;
    position: relative;
    padding-bottom: 18px;
}
.cat-section-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 64px;
    height: 4px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 3px;
}
.cat-section-subtitle {
    font-size: 15.5px;
    color: var(--text-muted);
    line-height: 1.6;
    max-width: 620px;
}

/* ---------- CATEGORY GRID ---------- */
.cat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 26px;
}

/* ---------- CATEGORY CARD ---------- */
.cat-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 20px -6px rgba(69, 26, 3, 0.07);
    overflow: hidden;
    text-decoration: none;
    color: inherit;
}
.cat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FCD34D 0%, #FB923C 50%, #C2410C 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.cat-card:hover {
    transform: translateY(-8px);
    border-color: #FDBA74;
    box-shadow:
        0 24px 48px -12px rgba(194, 65, 12, 0.22),
        0 8px 20px -4px rgba(69, 26, 3, 0.08);
}
.cat-card:hover::before {
    transform: scaleX(1);
}

/* Card top row: icon + count */
.cat-card-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 14px;
    margin-bottom: 18px;
}

/* Icon tile */
.cat-card-icon {
    width: 68px;
    height: 68px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 2px solid #FCD34D;
    box-shadow: 0 6px 16px -4px rgba(217, 119, 6, 0.18);
    flex-shrink: 0;
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.cat-card:hover .cat-card-icon {
    transform: scale(1.1) rotate(-6deg);
}

/* Count badge */
.cat-card-count {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border: 1px solid #FED7AA;
    color: var(--primary);
    font-size: 12px;
    font-weight: 800;
    padding: 6px 12px;
    border-radius: var(--radius-pill);
    letter-spacing: 0.2px;
    white-space: nowrap;
    box-shadow: 0 2px 6px rgba(194, 65, 12, 0.08);
}
.cat-card-count-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--primary);
    opacity: 0.7;
}

/* Title & description */
.cat-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 21px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.28;
    letter-spacing: -0.3px;
    margin-bottom: 8px;
    min-height: 54px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.cat-card:hover .cat-card-title {
    color: var(--primary);
}
.cat-card-desc {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 22px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
    min-height: 64px;
}

/* Footer CTA */
.cat-card-cta {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    width: 100%;
    padding: 12px 18px;
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.2px;
    border-radius: var(--radius-md);
    transition: all 0.3s ease;
    margin-top: auto;
}
.cat-card:hover .cat-card-cta {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    border-color: var(--primary);
    color: #FFFFFF;
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.32);
}
.cat-card-cta .arrow {
    transition: transform 0.3s ease;
}
.cat-card:hover .cat-card-cta .arrow {
    transform: translateX(5px);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 640px) {
    .cat-hero {
        padding: 38px 0 44px;
    }
    .cat-hero-title {
        font-size: 30px;
    }
    .cat-hero-desc {
        font-size: 15px;
    }
    .cat-hero-stat {
        padding: 8px 14px;
    }
    .cat-hero-stat-emoji {
        font-size: 17px;
    }
    .cat-hero-stat-num {
        font-size: 16px;
    }
    .cat-hero-stat-label {
        font-size: 9.5px;
    }
    .cat-section {
        padding: 40px 0 60px;
    }
    .cat-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .cat-card {
        padding: 22px;
    }
    .cat-card-icon {
        width: 58px;
        height: 58px;
        font-size: 26px;
    }
    .cat-card-title {
        font-size: 19px;
        min-height: 48px;
    }
    .cat-card-desc {
        min-height: 0;
    }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="cat-hero">
    <div class="container">
        <div class="cat-hero-inner">

            <nav class="cat-breadcrumb" aria-label="Breadcrumb">
                <a href="index.php">🏠 Home</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Recipe Categories</span>
            </nav>

            <h1 class="cat-hero-title">
                Explore <span class="accent">Recipe</span> Categories
            </h1>
            <p class="cat-hero-desc">
                Browse Amma's authentic home-cooked dishes organized by traditional course, meal type, and Telugu culinary specialties.
            </p>

            <!-- Stats row -->
            <div class="cat-hero-stats">
                <div class="cat-hero-stat">
                    <span class="cat-hero-stat-emoji">📂</span>
                    <div class="cat-hero-stat-text">
                        <span class="cat-hero-stat-num"><?= $totalCategories ?></span>
                        <span class="cat-hero-stat-label">Categories</span>
                    </div>
                </div>
                <div class="cat-hero-stat">
                    <span class="cat-hero-stat-emoji">📖</span>
                    <div class="cat-hero-stat-text">
                        <span class="cat-hero-stat-num"><?= $totalRecipes ?></span>
                        <span class="cat-hero-stat-label">Recipes</span>
                    </div>
                </div>
                <div class="cat-hero-stat">
                    <span class="cat-hero-stat-emoji">🍲</span>
                    <div class="cat-hero-stat-text">
                        <span class="cat-hero-stat-num">Andhra</span>
                        <span class="cat-hero-stat-label">Inspired</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     CATEGORIES GRID
     ============================================================ -->
<section class="cat-section">
    <div class="container">

        <div class="cat-section-header">
            <div class="cat-section-eyebrow">Browse By Collection</div>
            <h2 class="cat-section-title">All Recipe Categories</h2>
            <p class="cat-section-subtitle">
                Find exactly what you're looking for — from everyday tiffins and quick curries to festive sweets and traditional Andhra specialities.
            </p>
        </div>

        <div class="cat-grid">
            <?php foreach ($categories as $cat): ?>
                <a href="recipes.php?cat=<?= urlencode($cat['name']) ?>" class="cat-card">

                    <div class="cat-card-top">
                        <div class="cat-card-icon"><?= $cat['icon'] ?></div>
                        <span class="cat-card-count">
                            <span class="cat-card-count-dot"></span>
                            <?= (int)$cat['count'] ?> <?= (int)$cat['count'] === 1 ? 'recipe' : 'recipes' ?>
                        </span>
                    </div>

                    <h3 class="cat-card-title"><?= h($cat['name']) ?></h3>

                    <p class="cat-card-desc"><?= h($cat['desc']) ?></p>

                    <div class="cat-card-cta">
                        <span>Browse Recipes</span>
                        <span class="arrow">→</span>
                    </div>

                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>