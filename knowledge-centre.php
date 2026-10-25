<?php
// knowledge-centre.php - Cooking Knowledge Centre: Ingredients, Food Science & Kitchen Troubleshooting
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Cooking Knowledge Centre — Master Chef Academy";
$current_page = 'academy';

$kcData = get_knowledge_centre_data();
$activeTab = trim($_GET['tab'] ?? 'ingredients');
if (!in_array($activeTab, ['ingredients', 'science', 'troubleshooting'], true)) {
    $activeTab = 'ingredients';
}

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED KNOWLEDGE CENTRE STYLES -->
<style>
    .kc-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
        padding: 45px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .kc-tab-nav {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 24px;
    }
    .kc-tab-btn {
        padding: 10px 22px;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 14.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        border: 1.5px solid var(--border-color);
        background: #FFF;
        color: var(--text-muted);
        text-decoration: none;
    }
    .kc-tab-btn:hover {
        border-color: var(--primary);
        color: var(--primary);
    }
    .kc-tab-btn.active {
        background: var(--primary);
        color: #FFF;
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(194, 65, 12, 0.25);
    }
    .kc-card {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 26px 28px;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    .kc-card:hover {
        border-color: #FDBA74;
        box-shadow: var(--shadow-md);
    }
    .kc-search-input {
        width: 100%;
        max-width: 480px;
        padding: 12px 18px;
        border-radius: var(--radius-pill);
        border: 1.5px solid var(--border-warm);
        font-size: 15px;
        background: #FFF;
        outline: none;
        transition: var(--transition);
    }
    .kc-search-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(194, 65, 12, 0.12);
    }
    .problem-box {
        background: #FEF2F2;
        border-left: 4px solid #EF4444;
        padding: 12px 16px;
        border-radius: 0 var(--radius-md) var(--radius-md) 0;
        margin-bottom: 12px;
        font-size: 14px;
        color: #991B1B;
    }
    .solution-box {
        background: #F0FDF4;
        border-left: 4px solid #22C55E;
        padding: 14px 18px;
        border-radius: 0 var(--radius-md) var(--radius-md) 0;
        font-size: 14.5px;
        color: #14532D;
        line-height: 1.65;
    }
</style>

<!-- HERO -->
<section class="kc-hero">
    <div class="container">
        <div style="max-width: 860px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
                <a href="academy.php" style="color: var(--primary);">Master Chef Academy</a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);">Cooking Knowledge Centre</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(28px, 4vw, 42px); font-weight: 700; color: var(--earth-brown); margin-bottom: 12px;">
                📖 Cooking Knowledge Centre
            </h1>
            <p style="font-size: 16px; color: var(--text-muted); line-height: 1.65;">
                Deepen your culinary intuition with structured ingredient insights, the food science behind browning and fermentation, and safe troubleshooting fixes for everyday cooking mishaps.
            </p>

            <!-- TABS -->
            <div class="kc-tab-nav">
                <a href="knowledge-centre.php?tab=ingredients" class="kc-tab-btn <?= $activeTab === 'ingredients' ? 'active' : '' ?>">
                    <span>🌿</span> Ingredient Knowledge Library
                </a>
                <a href="knowledge-centre.php?tab=science" class="kc-tab-btn <?= $activeTab === 'science' ? 'active' : '' ?>">
                    <span>🧪</span> The Science of Cooking
                </a>
                <a href="knowledge-centre.php?tab=troubleshooting" class="kc-tab-btn <?= $activeTab === 'troubleshooting' ? 'active' : '' ?>">
                    <span>🛠️</span> Kitchen Troubleshooting & Fixes
                </a>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="container" style="padding: 40px 20px 80px;">
    
    <!-- SEARCH & FILTER BAR -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 32px;">
        <div>
            <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown);">
                <?= h($kcData[$activeTab]['title'] ?? 'Culinary Knowledge') ?>
            </h2>
            <p style="font-size: 14.5px; color: var(--text-muted); margin-top: 4px;">
                <?= h($kcData[$activeTab]['desc'] ?? '') ?>
            </p>
        </div>

        <div>
            <input type="text" id="kcSearchInput" class="kc-search-input" placeholder="Search topic or ingredient..." aria-label="Search knowledge base">
        </div>
    </div>

    <!-- TAB 1: INGREDIENTS -->
    <?php if ($activeTab === 'ingredients'): ?>
        <div id="kcArticlesList">
            <?php foreach ($kcData['ingredients']['items'] as $item): ?>
                <div class="kc-card search-target">
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; border-radius: var(--radius-md); background: #FFF8EE; border: 1.5px solid #FED7AA; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                            <?= $item['icon'] ?? '🌿' ?>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="item-title" style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                                <?= h($item['title']) ?>
                            </h3>
                            <p class="item-body" style="font-size: 15px; color: var(--text-main); line-height: 1.7;">
                                <?= h($item['content']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- TAB 2: SCIENCE -->
    <?php if ($activeTab === 'science'): ?>
        <div id="kcArticlesList">
            <?php foreach ($kcData['science']['items'] as $item): ?>
                <div class="kc-card search-target" style="border-left: 5px solid var(--saffron);">
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; border-radius: var(--radius-md); background: #FFFBEB; border: 1.5px solid #FDE68A; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                            <?= $item['icon'] ?? '🧪' ?>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="item-title" style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                                <?= h($item['title']) ?>
                            </h3>
                            <p class="item-body" style="font-size: 15px; color: var(--text-main); line-height: 1.7;">
                                <?= h($item['content']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- TAB 3: TROUBLESHOOTING -->
    <?php if ($activeTab === 'troubleshooting'): ?>
        <div id="kcArticlesList">
            <?php foreach ($kcData['troubleshooting']['items'] as $item): ?>
                <div class="kc-card search-target" style="border-left: 5px solid #C2410C;">
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; border-radius: var(--radius-md); background: #FFF1EB; border: 1.5px solid #FDBA74; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                            <?= $item['icon'] ?? '🛠️' ?>
                        </div>
                        <div style="flex: 1;">
                            <h3 class="item-title" style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown); margin-bottom: 12px;">
                                <?= h($item['problem']) ?>
                            </h3>
                            
                            <div class="problem-box">
                                <strong>Possible Root Cause:</strong> <?= h($item['cause']) ?>
                            </div>

                            <div class="solution-box">
                                <strong>✅ Safe, Practical Fix:</strong><br>
                                <?= h($item['solution']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- NO RESULTS STATE -->
    <div id="kcNoResults" style="display: none; text-align: center; padding: 60px 20px; background: #FFF; border: 2px dashed #FED7AA; border-radius: var(--radius-xl);">
        <div style="font-size: 48px; margin-bottom: 12px;">🔍</div>
        <h3 style="font-family: var(--font-serif); font-size: 20px; color: var(--earth-brown); margin-bottom: 6px;">
            No Matching Topics Found
        </h3>
        <p style="color: var(--text-muted); font-size: 14.5px;">
            Try searching for a different keyword like "salt", "rice", "onions", or "dough".
        </p>
    </div>

</div>

<!-- CLIENT JAVASCRIPT FOR INSTANT TOPIC FILTERING -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('kcSearchInput');
    const cards = document.querySelectorAll('.search-target');
    const noResults = document.getElementById('kcNoResults');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const q = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(function(card) {
                const text = card.textContent.toLowerCase();
                if (!q || text.includes(q)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (noResults) {
                noResults.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
        });
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
