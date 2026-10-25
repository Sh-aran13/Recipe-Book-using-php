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

// Count items for stat display
$counts = [
    'ingredients' => count($kcData['ingredients']['items'] ?? []),
    'science' => count($kcData['science']['items'] ?? []),
    'troubleshooting' => count($kcData['troubleshooting']['items'] ?? []),
];

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     KNOWLEDGE CENTRE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.kc-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 46px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.kc-hero::before {
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
.kc-hero::after {
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
.kc-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
}
.kc-breadcrumb {
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
.kc-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.kc-breadcrumb a:hover {
    text-decoration: underline;
}
.kc-breadcrumb .sep {
    color: #A8A29E;
}
.kc-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.kc-hero-title .accent {
    color: var(--primary);
    font-style: italic;
}
.kc-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 700px;
    margin-bottom: 30px;
}

/* Tab navigation */
.kc-tab-nav {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
}
.kc-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14.5px;
    letter-spacing: 0.1px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.kc-tab-btn:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFFDF9;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.kc-tab-btn.active {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    box-shadow: 0 6px 18px rgba(194, 65, 12, 0.32);
}
.kc-tab-btn.active:hover {
    color: #FFFFFF;
    transform: translateY(-1px);
}
.kc-tab-btn-icon {
    font-size: 16px;
    line-height: 1;
}
.kc-tab-btn-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 22px;
    height: 22px;
    padding: 0 7px;
    border-radius: var(--radius-pill);
    background: rgba(194, 65, 12, 0.12);
    color: var(--primary);
    font-family: var(--font-sans);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0;
    margin-left: 2px;
}
.kc-tab-btn.active .kc-tab-btn-count {
    background: rgba(255, 255, 255, 0.28);
    color: #FFFFFF;
}

/* ---------- MAIN CONTENT ---------- */
.kc-main-section {
    padding: 44px 0 80px;
}

/* Section header row with search */
.kc-section-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 2px dashed var(--border-warm);
}
.kc-section-header-text {
    flex: 1;
    min-width: 280px;
}
.kc-section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 8px;
}
.kc-section-eyebrow::before {
    content: '';
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.kc-section-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(26px, 3.2vw, 34px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.6px;
    line-height: 1.18;
    margin-bottom: 8px;
}
.kc-section-desc {
    font-size: 15px;
    color: var(--text-muted);
    line-height: 1.6;
    max-width: 640px;
}

/* Search input */
.kc-search-wrap {
    position: relative;
    width: 320px;
    flex-shrink: 0;
}
.kc-search-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    pointer-events: none;
    display: flex;
    align-items: center;
}
.kc-search-input {
    width: 100%;
    height: 48px;
    padding: 10px 16px 10px 46px;
    border-radius: var(--radius-pill);
    border: 1.5px solid var(--border-warm);
    font-size: 14.5px;
    background: #FFFFFF;
    outline: none;
    transition: all 0.22s ease;
    color: var(--text-main);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.kc-search-input::placeholder {
    color: var(--text-light);
}
.kc-search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(194, 65, 12, 0.12);
}

/* ---------- ARTICLE CARDS ---------- */
.kc-article-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.kc-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px 28px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
}
.kc-card::before {
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
.kc-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 16px 36px -10px rgba(194, 65, 12, 0.16);
    transform: translateY(-3px);
}
.kc-card:hover::before {
    opacity: 1;
}

/* Card inner layout */
.kc-card-inner {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    position: relative;
    z-index: 1;
}

/* Icon tile */
.kc-card-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 4px 12px -2px rgba(69, 26, 3, 0.1);
}
.kc-card:hover .kc-card-icon {
    transform: scale(1.08) rotate(-4deg);
}

/* Icon variants per tab */
.kc-card-icon--ingredients {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border: 1.5px solid #BBF7D0;
}
.kc-card-icon--science {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
}
.kc-card-icon--troubleshooting {
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border: 1.5px solid #FDBA74;
}

/* Card content */
.kc-card-body {
    flex: 1;
    min-width: 0;
}
.kc-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.28;
    letter-spacing: -0.3px;
    margin-bottom: 10px;
}
.kc-card-title-link {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
}
.kc-card-title-link:hover {
    color: var(--primary);
}
.kc-card-text {
    font-size: 14.5px;
    line-height: 1.7;
    color: var(--text-main);
}

/* Troubleshooting boxes */
.problem-box {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%);
    border-left: 4px solid #DC2626;
    padding: 14px 18px;
    border-radius: 0 12px 12px 0;
    margin-bottom: 12px;
    font-size: 14px;
    color: #7F1D1D;
    line-height: 1.6;
}
.problem-box strong {
    color: #991B1B;
    font-weight: 800;
    display: inline;
}
.solution-box {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border-left: 4px solid #16A34A;
    padding: 14px 18px;
    border-radius: 0 12px 12px 0;
    font-size: 14.5px;
    color: #14532D;
    line-height: 1.65;
}
.solution-box strong {
    color: #15803D;
    font-weight: 800;
    display: inline;
}

/* Empty search results */
.kc-empty-state {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 2px dashed #FED7AA;
    border-radius: 24px;
    padding: 60px 30px;
    text-align: center;
    max-width: 560px;
    margin: 40px auto;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.06);
    position: relative;
    overflow: hidden;
}
.kc-empty-state::before {
    content: '';
    position: absolute;
    top: -70px;
    right: -70px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.3) 0%, transparent 70%);
    pointer-events: none;
}
.kc-empty-emoji {
    font-size: 64px;
    margin-bottom: 16px;
    display: inline-block;
    animation: kcFloatBounce 3s ease-in-out infinite;
}
@keyframes kcFloatBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.kc-empty-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    letter-spacing: -0.4px;
}
.kc-empty-text {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.6;
    max-width: 420px;
    margin: 0 auto;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 780px) {
    .kc-search-wrap {
        width: 100%;
    }
    .kc-section-header {
        flex-direction: column;
        align-items: stretch;
    }
}
@media (max-width: 640px) {
    .kc-hero {
        padding: 38px 0 40px;
    }
    .kc-hero-title {
        font-size: 30px;
    }
    .kc-hero-desc {
        font-size: 15px;
    }
    .kc-tab-btn {
        padding: 10px 16px;
        font-size: 13px;
    }
    .kc-main-section {
        padding: 32px 0 60px;
    }
    .kc-card {
        padding: 20px;
    }
    .kc-card-inner {
        gap: 14px;
    }
    .kc-card-icon {
        width: 48px;
        height: 48px;
        font-size: 22px;
    }
    .kc-card-title {
        font-size: 18px;
    }
    .kc-card-text {
        font-size: 14px;
    }
    .kc-empty-state {
        padding: 44px 20px;
    }
    .kc-empty-emoji {
        font-size: 52px;
    }
    .kc-empty-title {
        font-size: 20px;
    }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="kc-hero">
    <div class="container">
        <div class="kc-hero-inner">

            <nav class="kc-breadcrumb" aria-label="Breadcrumb">
                <a href="academy.php">🎓 Master Chef Academy</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Cooking Knowledge Centre</span>
            </nav>

            <h1 class="kc-hero-title">
                Cooking <span class="accent">Knowledge</span> Centre
            </h1>
            <p class="kc-hero-desc">
                Deepen your culinary intuition with structured ingredient insights, the food science behind browning and fermentation, and safe troubleshooting fixes for everyday cooking mishaps.
            </p>

            <!-- Tabs -->
            <div class="kc-tab-nav">
                <a href="knowledge-centre.php?tab=ingredients" class="kc-tab-btn <?= $activeTab === 'ingredients' ? 'active' : '' ?>">
                    <span class="kc-tab-btn-icon">🌿</span>
                    <span>Ingredient Library</span>
                    <span class="kc-tab-btn-count"><?= $counts['ingredients'] ?></span>
                </a>
                <a href="knowledge-centre.php?tab=science" class="kc-tab-btn <?= $activeTab === 'science' ? 'active' : '' ?>">
                    <span class="kc-tab-btn-icon">🧪</span>
                    <span>Science of Cooking</span>
                    <span class="kc-tab-btn-count"><?= $counts['science'] ?></span>
                </a>
                <a href="knowledge-centre.php?tab=troubleshooting" class="kc-tab-btn <?= $activeTab === 'troubleshooting' ? 'active' : '' ?>">
                    <span class="kc-tab-btn-icon">🛠️</span>
                    <span>Troubleshooting</span>
                    <span class="kc-tab-btn-count"><?= $counts['troubleshooting'] ?></span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="container kc-main-section">

    <!-- SECTION HEADER + SEARCH -->
    <div class="kc-section-header">
        <div class="kc-section-header-text">
            <div class="kc-section-eyebrow">
                <?php if ($activeTab === 'ingredients'): ?>
                    Ingredient Fundamentals
                <?php elseif ($activeTab === 'science'): ?>
                    Food Science Explained
                <?php else: ?>
                    Kitchen Problem Solving
                <?php endif; ?>
            </div>
            <h2 class="kc-section-title">
                <?= h($kcData[$activeTab]['title'] ?? 'Culinary Knowledge') ?>
            </h2>
            <p class="kc-section-desc">
                <?= h($kcData[$activeTab]['desc'] ?? '') ?>
            </p>
        </div>

        <div class="kc-search-wrap">
            <span class="kc-search-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            <input
                type="text"
                id="kcSearchInput"
                class="kc-search-input"
                placeholder="Search topic, ingredient, or problem..."
                aria-label="Search knowledge base"
            >
        </div>
    </div>

    <!-- ============================================================
         TAB 1: INGREDIENTS
         ============================================================ -->
    <?php if ($activeTab === 'ingredients'): ?>
        <div id="kcArticlesList" class="kc-article-list">
            <?php foreach ($kcData['ingredients']['items'] as $item): ?>
                <div class="kc-card search-target">
                    <div class="kc-card-inner">
                        <div class="kc-card-icon kc-card-icon--ingredients">
                            <?= $item['icon'] ?? '🌿' ?>
                        </div>
                        <div class="kc-card-body">
                            <h3 class="kc-card-title"><?= h($item['title']) ?></h3>
                            <p class="kc-card-text"><?= h($item['content']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- ============================================================
         TAB 2: SCIENCE
         ============================================================ -->
    <?php if ($activeTab === 'science'): ?>
        <div id="kcArticlesList" class="kc-article-list">
            <?php foreach ($kcData['science']['items'] as $item): ?>
                <div class="kc-card search-target">
                    <div class="kc-card-inner">
                        <div class="kc-card-icon kc-card-icon--science">
                            <?= $item['icon'] ?? '🧪' ?>
                        </div>
                        <div class="kc-card-body">
                            <h3 class="kc-card-title"><?= h($item['title']) ?></h3>
                            <p class="kc-card-text"><?= h($item['content']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- ============================================================
         TAB 3: TROUBLESHOOTING
         ============================================================ -->
    <?php if ($activeTab === 'troubleshooting'): ?>
        <div id="kcArticlesList" class="kc-article-list">
            <?php foreach ($kcData['troubleshooting']['items'] as $item): ?>
                <div class="kc-card search-target">
                    <div class="kc-card-inner">
                        <div class="kc-card-icon kc-card-icon--troubleshooting">
                            <?= $item['icon'] ?? '🛠️' ?>
                        </div>
                        <div class="kc-card-body">
                            <h3 class="kc-card-title"><?= h($item['problem']) ?></h3>

                            <div class="problem-box">
                                <strong>⚠️ Possible Root Cause:</strong> <?= h($item['cause']) ?>
                            </div>

                            <div class="solution-box">
                                <strong>✅ Safe, Practical Fix:</strong> <?= h($item['solution']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- EMPTY STATE -->
    <div id="kcNoResults" class="kc-empty-state" style="display: none;">
        <div class="kc-empty-emoji">🔍</div>
        <h3 class="kc-empty-title">No Matching Topics Found</h3>
        <p class="kc-empty-text">
            Try searching for a different keyword like "<strong>salt</strong>", "<strong>rice</strong>", "<strong>onions</strong>", or "<strong>dough</strong>".
        </p>
    </div>

</div>

<!-- ============================================================
     SEARCH FILTERING SCRIPT
     ============================================================ -->
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