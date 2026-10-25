<?php
// challenges.php - Master Chef Cooking Challenges
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Cooking Challenges — Master Chef Academy";
$current_page = 'academy';

$allChallenges = get_cooking_challenges();

// Active tab filter: 'all', 'easy', 'intermediate', 'advanced'
$activeTab = trim($_GET['tier'] ?? 'all');
if (!in_array($activeTab, ['all', 'easy', 'intermediate', 'advanced'], true)) {
    $activeTab = 'all';
}

$displayedGroups = $allChallenges;
if ($activeTab !== 'all' && isset($allChallenges[$activeTab])) {
    $displayedGroups = [$activeTab => $allChallenges[$activeTab]];
}

// Compute totals for stat pills
$totalChallenges = 0;
$totalLevels = 0;
foreach ($allChallenges as $g) {
    $totalChallenges += count($g['items'] ?? []);
    $totalLevels++;
}

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     CHALLENGES PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.ch-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 46px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.ch-hero::before {
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
.ch-hero::after {
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
.ch-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
}
.ch-breadcrumb {
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
.ch-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.ch-breadcrumb a:hover {
    text-decoration: underline;
}
.ch-breadcrumb .sep {
    color: #A8A29E;
}
.ch-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.ch-hero-title .accent {
    color: var(--primary);
    font-style: italic;
}
.ch-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 720px;
    margin-bottom: 26px;
}

/* Hero stat pills */
.ch-hero-stats {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}
.ch-hero-stat {
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
.ch-hero-stat-emoji {
    font-size: 20px;
    line-height: 1;
}
.ch-hero-stat-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
    text-align: left;
}
.ch-hero-stat-num {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--earth-brown);
}
.ch-hero-stat-label {
    font-size: 10.5px;
    font-weight: 700;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.6px;
}

/* Tier tab navigation */
.ch-tier-nav {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
}
.ch-tier-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.1px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.ch-tier-btn:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFFDF9;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.ch-tier-btn-icon {
    font-size: 16px;
    line-height: 1;
}
.ch-tier-btn-count {
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

/* Tier active states */
.ch-tier-btn.active {
    color: #FFFFFF;
    border-color: transparent;
    box-shadow: 0 6px 18px rgba(194, 65, 12, 0.32);
}
.ch-tier-btn.active:hover {
    color: #FFFFFF;
    transform: translateY(-1px);
}
.ch-tier-btn.active .ch-tier-btn-count {
    background: rgba(255, 255, 255, 0.28);
    color: #FFFFFF;
}
.ch-tier-btn.active.ch-tier-btn--all {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
}
.ch-tier-btn.active.ch-tier-btn--easy {
    background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
    box-shadow: 0 6px 18px rgba(22, 163, 74, 0.32);
}
.ch-tier-btn.active.ch-tier-btn--intermediate {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    box-shadow: 0 6px 18px rgba(217, 119, 6, 0.32);
}
.ch-tier-btn.active.ch-tier-btn--advanced {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    box-shadow: 0 6px 18px rgba(220, 38, 38, 0.32);
}

/* ---------- MAIN ---------- */
.ch-main {
    padding: 44px 0 80px;
}

/* Tier group header */
.ch-group {
    margin-bottom: 48px;
}
.ch-group:last-child {
    margin-bottom: 0;
}
.ch-group-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    padding-bottom: 18px;
    border-bottom: 2px solid var(--border-warm);
    position: relative;
}
.ch-group-header::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 96px;
    height: 2px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 2px;
}
.ch-group-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 2px solid #FCD34D;
    box-shadow: 0 6px 16px -4px rgba(217, 119, 6, 0.18);
    flex-shrink: 0;
}
.ch-group-title-wrap {
    flex: 1;
    min-width: 0;
}
.ch-group-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(22px, 2.6vw, 28px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.5px;
    line-height: 1.2;
    margin-bottom: 4px;
}
.ch-group-subtitle {
    font-size: 12px;
    color: var(--primary);
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

/* ---------- CHALLENGE CARD ---------- */
.ch-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 24px;
    padding: 28px;
    box-shadow: 0 4px 20px -6px rgba(69, 26, 3, 0.08);
    margin-bottom: 24px;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
}
.ch-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FCD34D 0%, #FB923C 50%, #C2410C 100%);
    opacity: 0;
    transition: opacity 0.35s ease;
}
.ch-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 20px 44px -12px rgba(194, 65, 12, 0.18);
    transform: translateY(-4px);
}
.ch-card:hover::before {
    opacity: 1;
}

/* Completed state */
.ch-card.is-completed {
    border-color: #86EFAC;
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
}
.ch-card.is-completed::before {
    background: linear-gradient(90deg, #16A34A 0%, #15803D 50%, #22C55E 100%);
    opacity: 1;
}

/* Card header row */
.ch-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 22px;
}
.ch-card-header-text {
    flex: 1;
    min-width: 240px;
}

/* Difficulty badge */
.ch-difficulty-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border-radius: var(--radius-pill);
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 10px;
    border: 1px solid;
}

/* Card title */
.ch-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(20px, 2.4vw, 24px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.25;
    letter-spacing: -0.4px;
    margin-bottom: 8px;
}
.ch-card-objective {
    font-size: 14.5px;
    color: var(--text-muted);
    line-height: 1.65;
}
.ch-card-objective strong {
    color: var(--earth-brown);
    font-weight: 800;
}

/* Toggle button */
.ch-toggle-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: 0.1px;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border: 1.5px solid transparent;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    white-space: nowrap;
    flex-shrink: 0;
}
.ch-toggle-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}
.ch-card.is-completed .ch-toggle-btn {
    background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
    box-shadow: 0 4px 14px rgba(22, 163, 74, 0.35);
}
.ch-card.is-completed .ch-toggle-btn:hover {
    background: linear-gradient(135deg, #15803D 0%, #166534 100%);
    box-shadow: 0 8px 22px rgba(22, 163, 74, 0.42);
}

/* Info blocks grid (ingredients + utensils) */
.ch-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 16px;
    margin-bottom: 22px;
}
.ch-info-block {
    background: linear-gradient(135deg, #FFF8EE 0%, #FFFDF9 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 16px;
    padding: 18px;
    transition: all 0.25s ease;
}
.ch-info-block:hover {
    border-color: #FDBA74;
    background: #FFFFFF;
}
.ch-info-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 12px;
    letter-spacing: -0.1px;
}
.ch-info-title-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 26px;
    height: 26px;
    border-radius: 8px;
    background: #FFFFFF;
    border: 1px solid var(--border-warm);
    font-size: 13px;
    flex-shrink: 0;
}
.ch-info-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.ch-info-list li {
    font-size: 13.5px;
    color: var(--text-main);
    line-height: 1.5;
    padding-left: 22px;
    position: relative;
}
.ch-info-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    top: 0;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #FFF1EB;
    border: 1px solid #FED7AA;
    color: var(--primary);
    font-size: 9px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

/* Steps section */
.ch-steps-section {
    margin-bottom: 22px;
}
.ch-steps-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 16px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 14px;
    letter-spacing: -0.2px;
}
.ch-steps-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    counter-reset: step-counter;
}
.ch-step-item {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    padding: 12px 16px;
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1px solid var(--border-warm);
    border-radius: 12px;
    transition: all 0.22s ease;
    counter-increment: step-counter;
}
.ch-step-item:hover {
    border-color: #FDBA74;
    transform: translateX(3px);
    background: #FFFFFF;
}
.ch-step-number {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 3px 8px rgba(194, 65, 12, 0.28);
}
.ch-step-text {
    font-size: 14px;
    color: var(--text-main);
    line-height: 1.6;
    flex: 1;
    padding-top: 2px;
}

/* Success criteria checklist */
.ch-criteria-section {
    margin-bottom: 22px;
}
.ch-criteria-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 16px;
    font-weight: 800;
    color: #15803D;
    margin-bottom: 12px;
    letter-spacing: -0.2px;
}
.ch-criteria-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.ch-criteria-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 10px 14px;
    background: linear-gradient(135deg, #F0FDF4 0%, #ECFDF5 100%);
    border: 1px solid #BBF7D0;
    border-radius: 10px;
    font-size: 13.5px;
    color: #14532D;
    cursor: pointer;
    user-select: none;
    transition: all 0.22s ease;
    line-height: 1.55;
}
.ch-criteria-item:hover {
    background: #DCFCE7;
    border-color: #86EFAC;
}
.ch-criteria-item input[type="checkbox"] {
    width: 17px;
    height: 17px;
    accent-color: #15803D;
    cursor: pointer;
    flex-shrink: 0;
    margin-top: 1px;
}
.ch-criteria-item input[type="checkbox"]:checked + span {
    text-decoration: line-through;
    color: #15803D;
    font-weight: 600;
}
.ch-criteria-item span {
    flex: 1;
}

/* Warning and safety boxes */
.ch-warnings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 14px;
    margin-top: 18px;
}
.ch-warning-box {
    display: flex;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 12px;
    font-size: 13.5px;
    line-height: 1.6;
    align-items: flex-start;
}
.ch-warning-box--mistake {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%);
    border: 1px solid #FCA5A5;
    color: #7F1D1D;
}
.ch-warning-box--safety {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1px solid #FDE68A;
    color: #92400E;
}
.ch-warning-icon {
    font-size: 18px;
    flex-shrink: 0;
    line-height: 1.4;
}
.ch-warning-content {
    flex: 1;
}
.ch-warning-content strong {
    font-weight: 800;
    display: block;
    margin-bottom: 3px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    letter-spacing: 0.1px;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 780px) {
    .ch-tier-btn {
        padding: 10px 16px;
        font-size: 13px;
    }
    .ch-card {
        padding: 22px;
    }
    .ch-group-icon {
        width: 48px;
        height: 48px;
        font-size: 22px;
    }
}
@media (max-width: 640px) {
    .ch-hero {
        padding: 38px 0 40px;
    }
    .ch-hero-title {
        font-size: 30px;
    }
    .ch-hero-desc {
        font-size: 15px;
    }
    .ch-hero-stat {
        padding: 8px 14px;
    }
    .ch-hero-stat-emoji {
        font-size: 17px;
    }
    .ch-hero-stat-num {
        font-size: 16px;
    }
    .ch-main {
        padding: 32px 0 60px;
    }
    .ch-card {
        padding: 18px;
        border-radius: 20px;
    }
    .ch-card-header {
        flex-direction: column;
        align-items: stretch;
    }
    .ch-toggle-btn {
        width: 100%;
        justify-content: center;
    }
    .ch-info-block {
        padding: 14px;
    }
    .ch-group-header {
        flex-wrap: wrap;
    }
    .ch-group-title {
        font-size: 20px;
    }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="ch-hero">
    <div class="container">
        <div class="ch-hero-inner">

            <nav class="ch-breadcrumb" aria-label="Breadcrumb">
                <a href="academy.php">🎓 Master Chef Academy</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Cooking Challenges</span>
            </nav>

            <h1 class="ch-hero-title">
                Practical <span class="accent">Cooking</span> Challenges
            </h1>
            <p class="ch-hero-desc">
                Put your kitchen skills to the test with structured culinary missions. Review clear objectives, follow exact steps, verify success criteria, and manually mark each challenge complete.
            </p>

            <!-- Hero stats -->
            <div class="ch-hero-stats">
                <div class="ch-hero-stat">
                    <span class="ch-hero-stat-emoji">🏆</span>
                    <div class="ch-hero-stat-text">
                        <span class="ch-hero-stat-num"><?= $totalChallenges ?></span>
                        <span class="ch-hero-stat-label">Challenges</span>
                    </div>
                </div>
                <div class="ch-hero-stat">
                    <span class="ch-hero-stat-emoji">🎯</span>
                    <div class="ch-hero-stat-text">
                        <span class="ch-hero-stat-num"><?= $totalLevels ?></span>
                        <span class="ch-hero-stat-label">Tiers</span>
                    </div>
                </div>
                <div class="ch-hero-stat">
                    <span class="ch-hero-stat-emoji">✨</span>
                    <div class="ch-hero-stat-text">
                        <span class="ch-hero-stat-num">Progress</span>
                        <span class="ch-hero-stat-label">Saved Locally</span>
                    </div>
                </div>
            </div>

            <!-- Tier tabs -->
            <div class="ch-tier-nav">
                <a href="challenges.php?tier=all" class="ch-tier-btn ch-tier-btn--all <?= $activeTab === 'all' ? 'active' : '' ?>">
                    <span class="ch-tier-btn-icon">🎯</span>
                    <span>All Challenges</span>
                    <span class="ch-tier-btn-count">15</span>
                </a>
                <a href="challenges.php?tier=easy" class="ch-tier-btn ch-tier-btn--easy <?= $activeTab === 'easy' ? 'active' : '' ?>">
                    <span class="ch-tier-btn-icon">🌱</span>
                    <span>Easy</span>
                    <span class="ch-tier-btn-count">5</span>
                </a>
                <a href="challenges.php?tier=intermediate" class="ch-tier-btn ch-tier-btn--intermediate <?= $activeTab === 'intermediate' ? 'active' : '' ?>">
                    <span class="ch-tier-btn-icon">🔥</span>
                    <span>Intermediate</span>
                    <span class="ch-tier-btn-count">5</span>
                </a>
                <a href="challenges.php?tier=advanced" class="ch-tier-btn ch-tier-btn--advanced <?= $activeTab === 'advanced' ? 'active' : '' ?>">
                    <span class="ch-tier-btn-icon">🌟</span>
                    <span>Advanced</span>
                    <span class="ch-tier-btn-count">5</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CHALLENGES LIST
     ============================================================ -->
<div class="container ch-main">

    <?php foreach ($displayedGroups as $grpKey => $grp): ?>
        <?php
            // Determine tier badge color based on key
            $tierColorMap = [
                'easy' => ['#15803D', '#F0FDF4', '#BBF7D0'],
                'intermediate' => ['#B45309', '#FEF3C7', '#FDE68A'],
                'advanced' => ['#B91C1C', '#FEE2E2', '#FECACA'],
            ];
            $tierColors = $tierColorMap[$grpKey] ?? ['#C2410C', '#FFF1EB', '#FED7AA'];
        ?>
        <div class="ch-group">

            <div class="ch-group-header">
                <div class="ch-group-icon"><?= $grp['icon'] ?></div>
                <div class="ch-group-title-wrap">
                    <h2 class="ch-group-title"><?= h($grp['level_name']) ?></h2>
                    <div class="ch-group-subtitle" style="color: <?= $grp['color'] ?>;">
                        <?= h($grp['badge']) ?> Cooking Missions · <?= count($grp['items']) ?> challenges
                    </div>
                </div>
            </div>

            <?php foreach ($grp['items'] as $ch): ?>
                <?php $chId = $ch['id']; ?>
                <article class="ch-card" id="challenge-card-<?= $chId ?>" data-challenge-id="<?= $chId ?>">

                    <!-- Card header -->
                    <div class="ch-card-header">
                        <div class="ch-card-header-text">
                            <span class="ch-difficulty-badge" style="background: <?= $grp['color'] ?>15; color: <?= $grp['color'] ?>; border-color: <?= $grp['color'] ?>40;">
                                🎯 <?= h($ch['difficulty']) ?> Mission
                            </span>
                            <h3 class="ch-card-title"><?= h($ch['title']) ?></h3>
                            <p class="ch-card-objective">
                                <strong>Objective:</strong> <?= h($ch['objective']) ?>
                            </p>
                        </div>

                        <button type="button" class="ch-toggle-btn" data-challenge-btn="<?= $chId ?>">
                            <span>Mark Challenge Complete</span>
                            <span>✓</span>
                        </button>
                    </div>

                    <!-- Info blocks -->
                    <div class="ch-info-grid">

                        <div class="ch-info-block">
                            <div class="ch-info-title">
                                <span class="ch-info-title-icon">🛒</span>
                                <span>Required Ingredients</span>
                            </div>
                            <ul class="ch-info-list">
                                <?php foreach ($ch['required_ingredients'] as $ri): ?>
                                    <li><?= h($ri) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="ch-info-block">
                            <div class="ch-info-title">
                                <span class="ch-info-title-icon">🫕</span>
                                <span>Utensils & Equipment</span>
                            </div>
                            <ul class="ch-info-list">
                                <?php foreach ($ch['utensils'] as $ut): ?>
                                    <li><?= h($ut) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                    <!-- Execution steps -->
                    <div class="ch-steps-section">
                        <div class="ch-steps-title">
                            <span>📋</span>
                            <span>Execution Steps</span>
                        </div>
                        <ol class="ch-steps-list">
                            <?php foreach ($ch['steps'] as $sIdx => $st): ?>
                                <li class="ch-step-item">
                                    <div class="ch-step-number"><?= $sIdx + 1 ?></div>
                                    <div class="ch-step-text"><?= h($st) ?></div>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <!-- Success criteria -->
                    <div class="ch-criteria-section">
                        <div class="ch-criteria-title">
                            <span>✅</span>
                            <span>Success Criteria Checklist (Self-Evaluation)</span>
                        </div>
                        <div class="ch-criteria-list">
                            <?php foreach ($ch['success_criteria'] as $critIdx => $crit): ?>
                                <label class="ch-criteria-item">
                                    <input type="checkbox" class="challenge-subchk" data-ch-key="<?= $chId ?>_c<?= $critIdx ?>">
                                    <span><?= h($crit) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Warnings -->
                    <div class="ch-warnings-grid">
                        <div class="ch-warning-box ch-warning-box--mistake">
                            <span class="ch-warning-icon">⚠️</span>
                            <div class="ch-warning-content">
                                <strong>Common Mistake</strong>
                                <?= h($ch['common_mistakes']) ?>
                            </div>
                        </div>
                        <div class="ch-warning-box ch-warning-box--safety">
                            <span class="ch-warning-icon">🔒</span>
                            <div class="ch-warning-content">
                                <strong>Kitchen Safety</strong>
                                <?= h($ch['safety']) ?>
                            </div>
                        </div>
                    </div>

                </article>
            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>

</div>

<!-- ============================================================
     CHALLENGE PERSISTENCE SCRIPT
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    function refreshChallengesUI() {
        if (!window.AmmaStorage) return;
        const completed = window.AmmaStorage.get('amma_completed_challenges', []);

        document.querySelectorAll('[data-challenge-id]').forEach(function(card) {
            const chId = card.getAttribute('data-challenge-id');
            const btn = card.querySelector('[data-challenge-btn]');
            const isDone = completed.includes(chId);

            if (isDone) {
                card.classList.add('is-completed');
                if (btn) {
                    btn.innerHTML = '<span>Challenge Completed</span><span>✓</span>';
                }
            } else {
                card.classList.remove('is-completed');
                if (btn) {
                    btn.innerHTML = '<span>Mark Challenge Complete</span><span>✓</span>';
                }
            }
        });

        document.querySelectorAll('.challenge-subchk').forEach(function(cb) {
            const key = 'amma_ch_sub_' + cb.getAttribute('data-ch-key');
            cb.checked = (window.AmmaStorage.get(key, false) === true);
        });
    }

    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[data-challenge-btn]');
        if (!btn) return;
        e.preventDefault();

        const chId = btn.getAttribute('data-challenge-btn');
        if (!chId || !window.AmmaStorage) return;

        let completed = window.AmmaStorage.get('amma_completed_challenges', []);
        const idx = completed.indexOf(chId);
        if (idx > -1) {
            completed.splice(idx, 1);
        } else {
            completed.push(chId);
        }
        window.AmmaStorage.set('amma_completed_challenges', completed);
        refreshChallengesUI();
    });

    document.addEventListener('change', function(e) {
        if (!e.target.classList.contains('challenge-subchk')) return;
        const cb = e.target;
        const key = 'amma_ch_sub_' + cb.getAttribute('data-ch-key');
        if (window.AmmaStorage) {
            window.AmmaStorage.set(key, cb.checked);
        }
    });

    refreshChallengesUI();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>