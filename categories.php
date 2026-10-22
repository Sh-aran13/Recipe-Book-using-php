<?php
// categories.php - Categories Directory for Amma's Recipe Book
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "Recipe Categories — Amma's Recipe Book";
$current_page = 'categories';

$categories = get_categories_with_meta();

include __DIR__ . '/includes/header.php';
?>

<!-- CATEGORIES HERO -->
<div style="background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 100%); padding: 45px 0 35px; border-bottom: 1px solid var(--border-warm);">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
            <a href="index.php" style="color: var(--primary);">Home</a>
            <span>›</span>
            <span style="font-weight: 600; color: var(--earth-brown);">Recipe Categories</span>
        </div>

        <h1 style="font-family: var(--font-serif); font-size: 36px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
            Recipe Categories
        </h1>
        <p style="color: var(--text-muted); font-size: 16px; max-width: 650px;">
            Browse Amma's authentic home-cooked dishes organized by traditional course, meal type, and Telugu culinary specialties.
        </p>
    </div>
</div>

<!-- CATEGORIES GRID -->
<div class="container" style="padding: 50px 20px 80px;">
    
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
        <?php foreach ($categories as $cat): ?>
            <div style="background: var(--bg-surface); border: 1.5px solid var(--border-warm); border-radius: var(--radius-lg); padding: 28px 24px; box-shadow: var(--shadow-card); display: flex; flex-direction: column; justify-content: space-between; transition: var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#FDBA74'; this.style.boxShadow='var(--shadow-hover)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--border-warm)'; this.style.boxShadow='var(--shadow-card)';">
                
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px;">
                        <div style="width: 64px; height: 64px; border-radius: 50%; background: #FFF8EE; display: flex; align-items: center; justify-content: center; font-size: 32px; border: 1.5px solid #FED7AA; box-shadow: var(--shadow-sm);">
                            <?= $cat['icon'] ?>
                        </div>
                        <span style="background: var(--primary-light); color: var(--primary); font-size: 12.5px; font-weight: 700; padding: 4px 12px; border-radius: var(--radius-pill);">
                            <?= $cat['count'] ?> <?= $cat['count'] === 1 ? 'recipe' : 'recipes' ?>
                        </span>
                    </div>

                    <h2 style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px; line-height: 1.3;">
                        <?= h($cat['name']) ?>
                    </h2>

                    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-bottom: 24px;">
                        <?= h($cat['desc']) ?>
                    </p>
                </div>

                <div>
                    <a href="recipes.php?cat=<?= urlencode($cat['name']) ?>" class="btn btn-secondary" style="width: 100%; justify-content: space-between; font-size: 14px; padding: 10px 16px; border-radius: var(--radius-md);">
                        <span>Browse Recipes</span>
                        <span>→</span>
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
