<?php
// progress.php - Learning Progress Dashboard & Personal Cookbook (Local Device Storage)
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "My Culinary Progress & Personal Cookbook — Master Chef Academy";
$current_page = 'academy';

$allLessons = get_academy_lessons();
$allChallenges = get_cooking_challenges();
$allQuizzes = get_cooking_quizzes();
$totalLessons = count($allLessons);
$totalRecipes = count($recipes);

$totalChallenges = 0;
foreach ($allChallenges as $cGroup) {
    $totalChallenges += count($cGroup['items']);
}

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     PROGRESS DASHBOARD — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.progress-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 46px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.progress-hero::before {
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
.progress-hero::after {
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
.progress-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
}
.progress-breadcrumb {
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
.progress-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.progress-breadcrumb a:hover {
    text-decoration: underline;
}
.progress-breadcrumb .sep {
    color: #A8A29E;
}
.progress-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.progress-hero-title .accent {
    color: var(--primary);
    font-style: italic;
}
.progress-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 720px;
    margin-bottom: 22px;
}
.progress-privacy-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid #FED7AA;
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    font-size: 13px;
    color: var(--earth-brown);
    font-weight: 600;
    backdrop-filter: blur(6px);
    box-shadow: 0 2px 8px rgba(194, 65, 12, 0.08);
}

/* ---------- MAIN ---------- */
.progress-main {
    padding: 44px 0 80px;
}

/* ---------- SUMMARY CARD ---------- */
.progress-summary-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 26px;
    padding: 32px;
    box-shadow:
        0 16px 40px -12px rgba(69, 26, 3, 0.1),
        0 4px 12px rgba(69, 26, 3, 0.04);
    margin-bottom: 40px;
    overflow: hidden;
}
.progress-summary-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 50%, #FCD34D 100%);
}
.progress-summary-card::after {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.28) 0%, transparent 70%);
    pointer-events: none;
}

/* Rank header row */
.rank-header-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    z-index: 1;
    margin-bottom: 24px;
}
.rank-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 8px;
}
.rank-eyebrow::before {
    content: '';
    width: 28px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.rank-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(26px, 3vw, 34px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.7px;
    line-height: 1.15;
    margin-bottom: 6px;
}
.rank-desc {
    font-size: 14.5px;
    color: var(--text-muted);
    line-height: 1.6;
    max-width: 500px;
}

/* Big percentage display */
.rank-pct-block {
    text-align: right;
    flex-shrink: 0;
}
.rank-pct-number {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 56px;
    font-weight: 800;
    line-height: 1;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -2px;
}
.rank-pct-label {
    font-size: 12px;
    font-weight: 800;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-top: 4px;
}

/* Progress bar */
.progress-bar-wrap {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 14px;
    background: linear-gradient(90deg, #FEF3C7 0%, #FED7AA 100%);
    border-radius: var(--radius-pill);
    overflow: hidden;
    margin: 20px 0 30px;
    box-shadow: inset 0 2px 4px rgba(69, 26, 3, 0.06);
}
.progress-bar-fill {
    width: 0%;
    height: 100%;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, #FCD34D 100%);
    border-radius: var(--radius-pill);
    transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 0 8px rgba(234, 88, 12, 0.4);
    position: relative;
}
.progress-bar-fill::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.35) 50%, transparent 100%);
    animation: shimmer 2.4s ease-in-out infinite;
}
@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* ---------- METRIC GRID ---------- */
.metric-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
    gap: 18px;
    position: relative;
    z-index: 1;
}
.metric-box {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 12px -4px rgba(69, 26, 3, 0.06);
    overflow: hidden;
}
.metric-box::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: var(--metric-accent, #EA580C);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.metric-box:hover {
    transform: translateY(-3px);
    border-color: #FDBA74;
    box-shadow: 0 12px 28px -8px rgba(194, 65, 12, 0.15);
}
.metric-box:hover::before {
    opacity: 1;
}
.metric-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    border: 1.5px solid;
}
.metric-box:hover .metric-icon {
    transform: scale(1.1) rotate(-5deg);
}
.metric-icon--lessons {
    background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%);
    border-color: #A7F3D0;
}
.metric-icon--mastered {
    background: linear-gradient(135deg, #FFF7ED 0%, #FED7AA 100%);
    border-color: #FDBA74;
}
.metric-icon--challenges {
    background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
    border-color: #BFDBFE;
}
.metric-icon--quizzes {
    background: linear-gradient(135deg, #FDF4FF 0%, #F5D0FE 100%);
    border-color: #F0ABFC;
}
.metric-value {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.15;
    letter-spacing: -0.4px;
}
.metric-label {
    font-size: 12px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 3px;
}

/* ---------- DATA MANAGEMENT BAR ---------- */
.data-mgmt-bar {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    padding: 18px 20px;
    margin-top: 28px;
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px dashed var(--border-warm);
    border-radius: 16px;
}
.data-mgmt-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: var(--earth-brown);
    font-weight: 700;
}
.data-mgmt-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.data-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 16px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 0.1px;
    cursor: pointer;
    transition: all 0.22s ease;
    border: 1.5px solid;
    text-decoration: none;
    white-space: nowrap;
}
.data-btn--export {
    background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%);
    border-color: #A7F3D0;
    color: #15803D;
}
.data-btn--export:hover {
    background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
    color: #FFFFFF;
    border-color: #15803D;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.28);
}
.data-btn--import {
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border-color: #FDBA74;
    color: var(--primary);
}
.data-btn--import:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.28);
}
.data-btn--reset {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%);
    border-color: #FCA5A5;
    color: #B91C1C;
}
.data-btn--reset:hover {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    border-color: #B91C1C;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.28);
}
.import-notice {
    display: none;
    margin-top: 12px;
    font-size: 13.5px;
    font-weight: 700;
    padding: 12px 16px;
    border-radius: 10px;
    line-height: 1.5;
    position: relative;
    z-index: 1;
}

/* ---------- SECTION HEADERS ---------- */
.progress-section {
    margin-bottom: 44px;
}
.section-header-custom {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 22px;
    padding-bottom: 18px;
    border-bottom: 2px dashed var(--border-warm);
}
.section-header-text {
    flex: 1;
    min-width: 260px;
}
.section-eyebrow-custom {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    margin-bottom: 6px;
}
.section-eyebrow-custom::before {
    content: '';
    width: 28px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.section-heading-custom {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(22px, 2.8vw, 28px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.5px;
    line-height: 1.18;
}
.section-link-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.22s ease;
    box-shadow: 0 2px 6px rgba(217, 119, 6, 0.1);
    white-space: nowrap;
}
.section-link-btn:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.28);
}

/* ---------- LIST ITEM CARDS ---------- */
.item-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.item-list-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 16px;
    padding: 16px 20px;
    box-shadow: 0 4px 12px -4px rgba(69, 26, 3, 0.06);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}
.item-list-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(180deg, #EA580C 0%, #F59E0B 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.item-list-card:hover {
    border-color: #FDBA74;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px -8px rgba(194, 65, 12, 0.15);
}
.item-list-card:hover::before {
    opacity: 1;
}

/* Card left content */
.item-content {
    display: flex;
    align-items: center;
    gap: 16px;
    flex: 1;
    min-width: 0;
}

/* Thumbnail */
.item-thumb {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    overflow: hidden;
    flex-shrink: 0;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 10px rgba(217, 119, 6, 0.14);
    transition: transform 0.35s ease;
}
.item-list-card:hover .item-thumb {
    transform: scale(1.06) rotate(-3deg);
}
.item-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.item-thumb-placeholder {
    font-size: 28px;
    filter: drop-shadow(0 2px 4px rgba(69, 26, 3, 0.15));
}

/* Thumbnail variants */
.item-thumb--lesson {
    background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%);
    border-color: #A7F3D0;
}

/* Item text */
.item-text {
    min-width: 0;
    flex: 1;
}
.item-eyebrow {
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 3px;
    display: flex;
    align-items: center;
    gap: 4px;
}
.item-eyebrow--mastered { color: #15803D; }
.item-eyebrow--category { color: var(--primary); }
.item-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 17px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.25;
    margin-bottom: 3px;
    letter-spacing: -0.3px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.item-meta {
    font-size: 12.5px;
    color: var(--text-muted);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.item-meta-sep {
    color: var(--border-color);
}

/* Item CTA */
.item-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 16px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.22s ease;
    flex-shrink: 0;
    white-space: nowrap;
}
.item-cta:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.28);
}
.item-cta .arrow {
    transition: transform 0.22s ease;
}
.item-cta:hover .arrow {
    transform: translateX(3px);
}

/* ---------- EMPTY STATE ---------- */
.empty-note {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 2px dashed #FED7AA;
    border-radius: 20px;
    padding: 40px 24px;
    text-align: center;
    color: var(--text-muted);
    font-size: 14.5px;
    line-height: 1.6;
    position: relative;
    overflow: hidden;
}
.empty-note::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.3) 0%, transparent 70%);
    pointer-events: none;
}
.empty-note-emoji {
    font-size: 48px;
    margin-bottom: 14px;
    display: block;
}
.empty-note-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 8px;
    letter-spacing: -0.3px;
}
.empty-note-text {
    max-width: 440px;
    margin: 0 auto;
    font-size: 14px;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 780px) {
    .rank-header-row {
        flex-direction: column;
    }
    .rank-pct-block {
        text-align: left;
    }
    .data-mgmt-bar {
        flex-direction: column;
        align-items: stretch;
    }
    .data-mgmt-buttons {
        width: 100%;
    }
    .data-btn {
        flex: 1;
        justify-content: center;
    }
}
@media (max-width: 640px) {
    .progress-hero {
        padding: 38px 0 40px;
    }
    .progress-hero-title {
        font-size: 30px;
    }
    .progress-hero-desc {
        font-size: 15px;
    }
    .progress-main {
        padding: 32px 0 60px;
    }
    .progress-summary-card {
        padding: 22px;
        border-radius: 20px;
    }
    .rank-pct-number {
        font-size: 44px;
    }
    .metric-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .metric-box {
        padding: 14px;
        gap: 12px;
    }
    .metric-icon {
        width: 42px;
        height: 42px;
        font-size: 20px;
    }
    .metric-value {
        font-size: 18px;
    }
    .metric-label {
        font-size: 10.5px;
    }
    .item-list-card {
        padding: 14px;
    }
    .item-content {
        gap: 12px;
    }
    .item-thumb {
        width: 54px;
        height: 54px;
    }
    .item-thumb-placeholder {
        font-size: 22px;
    }
    .item-title {
        font-size: 15px;
    }
    .item-cta {
        padding: 7px 12px;
        font-size: 11.5px;
        width: 100%;
        justify-content: center;
    }
    .section-header-custom {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="progress-hero">
    <div class="container">
        <div class="progress-hero-inner">

            <nav class="progress-breadcrumb" aria-label="Breadcrumb">
                <a href="academy.php">🎓 Master Chef Academy</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Learning Progress</span>
            </nav>

            <h1 class="progress-hero-title">
                My Culinary <span class="accent">Progress</span> & Cookbook
            </h1>
            <p class="progress-hero-desc">
                Track completed kitchen lessons, recipes marked as mastered, challenge badges, and quiz scores. Your culinary milestones are safely saved locally on this device.
            </p>

            <div class="progress-privacy-pill">
                <span>🔒</span>
                <span>Private & Offline — Progress stays on this device</span>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="container progress-main">

    <!-- ============================================================
         OVERALL SUMMARY CARD
         ============================================================ -->
    <div class="progress-summary-card">

        <div class="rank-header-row">
            <div>
                <div class="rank-eyebrow">Current Culinary Rank</div>
                <h2 id="overallRankTitle" class="rank-title">Beginner Cook 🌱</h2>
                <p id="rankNextStepDesc" class="rank-desc">
                    Complete lessons and mark dishes as practiced to level up toward Intermediate Cook.
                </p>
            </div>
            <div class="rank-pct-block">
                <div class="rank-pct-number" id="overallPctNumber">0%</div>
                <div class="rank-pct-label">Master Chef Progress</div>
            </div>
        </div>

        <div class="progress-bar-wrap">
            <div id="overallMainProgressBar" class="progress-bar-fill"></div>
        </div>

        <!-- Metrics -->
        <div class="metric-grid">
            <div class="metric-box" style="--metric-accent: #16A34A;">
                <div class="metric-icon metric-icon--lessons">📚</div>
                <div>
                    <div class="metric-value" id="metricLessons">0 / <?= $totalLessons ?></div>
                    <div class="metric-label">Lessons Completed</div>
                </div>
            </div>

            <div class="metric-box" style="--metric-accent: #EA580C;">
                <div class="metric-icon metric-icon--mastered">👑</div>
                <div>
                    <div class="metric-value" id="metricMastered">0 / <?= $totalRecipes ?></div>
                    <div class="metric-label">Recipes Mastered</div>
                </div>
            </div>

            <div class="metric-box" style="--metric-accent: #2563EB;">
                <div class="metric-icon metric-icon--challenges">🏆</div>
                <div>
                    <div class="metric-value" id="metricChallenges">0 / <?= $totalChallenges ?></div>
                    <div class="metric-label">Challenges Finished</div>
                </div>
            </div>

            <div class="metric-box" style="--metric-accent: #9333EA;">
                <div class="metric-icon metric-icon--quizzes">⭐</div>
                <div>
                    <div class="metric-value" id="metricQuizzes">0 / 3</div>
                    <div class="metric-label">Quizzes Attempted</div>
                </div>
            </div>
        </div>

        <!-- Data management -->
        <div class="data-mgmt-bar">
            <div class="data-mgmt-label">
                <span>💾</span>
                <span>Data Management</span>
            </div>
            <div class="data-mgmt-buttons">
                <button type="button" id="btnExportProgress" class="data-btn data-btn--export">
                    <span>⬇️</span> Export Progress
                </button>
                <label class="data-btn data-btn--import" style="cursor: pointer;">
                    <span>⬆️</span> Import Progress
                    <input type="file" id="importFileInput" accept=".json,application/json" style="display: none;">
                </label>
                <button type="button" id="btnResetProgress" class="data-btn data-btn--reset">
                    <span>🗑️</span> Reset Progress
                </button>
            </div>
        </div>
        <div id="importExportNotice" class="import-notice"></div>

    </div>

    <!-- ============================================================
         SECTION 1: MASTERED RECIPES
         ============================================================ -->
    <section class="progress-section">
        <div class="section-header-custom">
            <div class="section-header-text">
                <div class="section-eyebrow-custom">Personal Cookbook</div>
                <h3 class="section-heading-custom">Dishes You Have Mastered</h3>
            </div>
            <a href="recipes.php" class="section-link-btn">
                <span>Browse All Recipes</span>
                <span>→</span>
            </a>
        </div>

        <div id="masteredRecipesContainer" class="item-list">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- ============================================================
         SECTION 2: COMPLETED LESSONS
         ============================================================ -->
    <section class="progress-section">
        <div class="section-header-custom">
            <div class="section-header-text">
                <div class="section-eyebrow-custom">Curriculum Milestones</div>
                <h3 class="section-heading-custom">Completed Cooking Lessons</h3>
            </div>
            <a href="academy.php#lessonsDirectory" class="section-link-btn">
                <span>View Academy</span>
                <span>→</span>
            </a>
        </div>

        <div id="completedLessonsContainer" class="item-list">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- ============================================================
         SECTION 3: RECENTLY VIEWED
         ============================================================ -->
    <section class="progress-section">
        <div class="section-header-custom">
            <div class="section-header-text">
                <div class="section-eyebrow-custom">Quick Resume</div>
                <h3 class="section-heading-custom">Recently Viewed Recipes</h3>
            </div>
        </div>

        <div id="recentRecipesContainer" class="item-list">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- ============================================================
         SECTION 4: FAVORITES
         ============================================================ -->
    <section class="progress-section">
        <div class="section-header-custom">
            <div class="section-header-text">
                <div class="section-eyebrow-custom">Saved For Later</div>
                <h3 class="section-heading-custom">Favorite Recipes Shortcut</h3>
            </div>
            <a href="favorites.php" class="section-link-btn">
                <span>Open Favorites</span>
                <span>→</span>
            </a>
        </div>

        <div id="favoritesListContainer" class="item-list">
            <!-- Filled dynamically -->
        </div>
    </section>

</div>

<!-- ============================================================
     JAVASCRIPT — PROGRESS DASHBOARD
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const allLessonsData = <?= json_encode($allLessons, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

    const recipeMap = {};
    allRecipesData.forEach(function(r) { recipeMap[r.id] = r; });

    const totalLessons = <?= $totalLessons ?>;
    const totalRecipes = <?= $totalRecipes ?>;
    const totalChallenges = <?= $totalChallenges ?>;

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function getRecipeThumbHtml(r) {
        if (r.image) {
            return '<div class="item-thumb">' +
                '<img src="' + escapeHtml(r.image) + '" alt="' + escapeHtml(r.name || 'Recipe') + '" loading="lazy" onerror="this.parentElement.innerHTML=\'<span class=&quot;item-thumb-placeholder&quot;>' + (r.icon || '🍲') + '</span>\';">' +
            '</div>';
        }
        return '<div class="item-thumb"><span class="item-thumb-placeholder">' + (r.icon || '🍲') + '</span></div>';
    }

    function renderEmpty(emoji, title, text) {
        return '<div class="empty-note">' +
            '<span class="empty-note-emoji">' + emoji + '</span>' +
            '<div class="empty-note-title">' + title + '</div>' +
            '<div class="empty-note-text">' + text + '</div>' +
        '</div>';
    }

    function renderProgressDashboard() {
        if (!window.AmmaStorage) return;

        const learnedLessons = window.AmmaStorage.get('amma_learned_lessons', []);
        const masteredRecipes = window.AmmaStorage.get('amma_mastered_recipes', []);
        const completedChallenges = window.AmmaStorage.get('amma_completed_challenges', []);
        const quizScores = window.AmmaStorage.get('amma_quiz_best_scores', {});
        const recentRecipeIds = window.AmmaStorage.get('amma_recent_recipes', []);
        const favoriteIds = window.AmmaStorage.get('amma_fav_recipes', []);

        // Metric values
        document.getElementById('metricLessons').textContent = learnedLessons.length + ' / ' + totalLessons;
        document.getElementById('metricMastered').textContent = masteredRecipes.length + ' / ' + totalRecipes;
        document.getElementById('metricChallenges').textContent = completedChallenges.length + ' / ' + totalChallenges;
        document.getElementById('metricQuizzes').textContent = Object.keys(quizScores).length + ' / 3';

        // Weighted overall
        const lPct = totalLessons > 0 ? (learnedLessons.length / totalLessons) * 40 : 0;
        const rPct = totalRecipes > 0 ? (masteredRecipes.length / totalRecipes) * 40 : 0;
        const cPct = totalChallenges > 0 ? (completedChallenges.length / totalChallenges) * 20 : 0;
        const overall = Math.min(100, Math.round(lPct + rPct + cPct));

        document.getElementById('overallPctNumber').textContent = overall + '%';
        document.getElementById('overallMainProgressBar').style.width = overall + '%';

        let rank = 'Beginner Cook 🌱';
        let desc = 'Complete your foundational lessons on knife skills and everyday staples.';
        if (overall >= 75) {
            rank = 'Restaurant Chef at Home 👑';
            desc = 'Outstanding mastery! You have conquered advanced technique and complex culinary recipes.';
        } else if (overall >= 50) {
            rank = 'Advanced Home Cook 🌟';
            desc = 'You have mastered core bases and multi-course meals. Tackle dum biryanis and sweets!';
        } else if (overall >= 25) {
            rank = 'Intermediate Cook 🔥';
            desc = 'Great progress! Practice onion-tomato gravies, flatbreads, and restaurant curries.';
        }
        document.getElementById('overallRankTitle').textContent = rank;
        document.getElementById('rankNextStepDesc').textContent = desc;

        // 1. Mastered recipes
        const mContainer = document.getElementById('masteredRecipesContainer');
        if (masteredRecipes.length === 0) {
            mContainer.innerHTML = renderEmpty('🍳', 'No Dishes Mastered Yet', 'Open any recipe, complete the mastery checklist, and set status to "Mastered" to add it here.');
        } else {
            let mHtml = '';
            masteredRecipes.forEach(function(rId) {
                const r = recipeMap[rId];
                if (!r) return;
                const totalTime = ((parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0));
                const timeStr = totalTime > 0 ? totalTime + ' min' : '';
                mHtml += '<div class="item-list-card">' +
                    '<div class="item-content">' +
                        getRecipeThumbHtml(r) +
                        '<div class="item-text">' +
                            '<div class="item-eyebrow item-eyebrow--mastered">👑 Mastered</div>' +
                            '<div class="item-title">' + escapeHtml(r.name) + '</div>' +
                            '<div class="item-meta">' +
                                '<span>' + escapeHtml(r.category || '') + '</span>' +
                                (timeStr ? '<span class="item-meta-sep">•</span><span>⏱️ ' + timeStr + '</span>' : '') +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="item-cta">' +
                        '<span>View Recipe</span><span class="arrow">→</span>' +
                    '</a>' +
                '</div>';
            });
            mContainer.innerHTML = mHtml;
        }

        // 2. Completed lessons
        const lContainer = document.getElementById('completedLessonsContainer');
        if (learnedLessons.length === 0) {
            lContainer.innerHTML = renderEmpty('📚', 'No Lessons Completed Yet', 'Visit the Master Chef Academy and click "Mark as Learned" on lessons you finish.');
        } else {
            let lHtml = '';
            learnedLessons.forEach(function(lId) {
                const l = allLessonsData[lId];
                if (!l) return;
                lHtml += '<div class="item-list-card">' +
                    '<div class="item-content">' +
                        '<div class="item-thumb item-thumb--lesson">' +
                            '<span class="item-thumb-placeholder">' + (l.icon || '📖') + '</span>' +
                        '</div>' +
                        '<div class="item-text">' +
                            '<div class="item-eyebrow item-eyebrow--category">' + escapeHtml(l.category || 'Lesson') + '</div>' +
                            '<div class="item-title">' + escapeHtml(l.title || '') + '</div>' +
                        '</div>' +
                    '</div>' +
                    '<a href="lesson.php?id=' + encodeURIComponent(l.id) + '" class="item-cta">' +
                        '<span>Review</span><span class="arrow">→</span>' +
                    '</a>' +
                '</div>';
            });
            lContainer.innerHTML = lHtml;
        }

        // 3. Recently viewed
        const rContainer = document.getElementById('recentRecipesContainer');
        const validRecents = recentRecipeIds.filter(function(id) { return !!recipeMap[id]; }).slice(0, 5);
        if (validRecents.length === 0) {
            rContainer.innerHTML = renderEmpty('🕐', 'No Recent Recipes', 'Explore recipes across the site and they will appear here for quick access.');
        } else {
            let rHtml = '';
            validRecents.forEach(function(rId) {
                const r = recipeMap[rId];
                const totalTime = ((parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0));
                const timeStr = totalTime > 0 ? totalTime + ' min' : '';
                rHtml += '<div class="item-list-card">' +
                    '<div class="item-content">' +
                        getRecipeThumbHtml(r) +
                        '<div class="item-text">' +
                            '<div class="item-title">' + escapeHtml(r.name) + '</div>' +
                            '<div class="item-meta">' +
                                '<span>' + escapeHtml(r.category || '') + '</span>' +
                                (timeStr ? '<span class="item-meta-sep">•</span><span>⏱️ ' + timeStr + '</span>' : '') +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="item-cta">' +
                        '<span>Cook</span><span class="arrow">→</span>' +
                    '</a>' +
                '</div>';
            });
            rContainer.innerHTML = rHtml;
        }

        // 4. Favorites
        const fContainer = document.getElementById('favoritesListContainer');
        const validFavs = favoriteIds.filter(function(id) { return !!recipeMap[id]; }).slice(0, 5);
        if (validFavs.length === 0) {
            fContainer.innerHTML = renderEmpty('❤️', 'No Favorite Recipes', 'Click the heart icon on any recipe card to save it here for quick access.');
        } else {
            let fHtml = '';
            validFavs.forEach(function(rId) {
                const r = recipeMap[rId];
                const totalTime = ((parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0));
                const timeStr = totalTime > 0 ? totalTime + ' min' : '';
                fHtml += '<div class="item-list-card">' +
                    '<div class="item-content">' +
                        getRecipeThumbHtml(r) +
                        '<div class="item-text">' +
                            '<div class="item-title">' + escapeHtml(r.name) + '</div>' +
                            '<div class="item-meta">' +
                                '<span>' + escapeHtml(r.category || '') + '</span>' +
                                (timeStr ? '<span class="item-meta-sep">•</span><span>⏱️ ' + timeStr + '</span>' : '') +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="item-cta">' +
                        '<span>View</span><span class="arrow">→</span>' +
                    '</a>' +
                '</div>';
            });
            fContainer.innerHTML = fHtml;
        }
    }

    // Export
    document.getElementById('btnExportProgress').addEventListener('click', function() {
        if (!window.AmmaStorage) return;
        const backupData = {
            export_version: "1.0",
            app: "Amma's Recipe Book — Master Chef Academy",
            exported_at: new Date().toISOString(),
            amma_learned_lessons: window.AmmaStorage.get('amma_learned_lessons', []),
            amma_mastered_recipes: window.AmmaStorage.get('amma_mastered_recipes', []),
            amma_practiced_recipes: window.AmmaStorage.get('amma_practiced_recipes', []),
            amma_completed_challenges: window.AmmaStorage.get('amma_completed_challenges', []),
            amma_quiz_best_scores: window.AmmaStorage.get('amma_quiz_best_scores', {}),
            amma_fav_recipes: window.AmmaStorage.get('amma_fav_recipes', [])
        };

        const jsonStr = JSON.stringify(backupData, null, 2);
        const blob = new Blob([jsonStr], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'ammas_recipe_book_progress_backup.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotice('✓ Progress exported successfully as JSON file!', '#ECFDF5', '#15803D');
    });

    // Import
    document.getElementById('importFileInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(evt) {
            try {
                const parsed = JSON.parse(evt.target.result);
                if (typeof parsed !== 'object' || parsed === null) {
                    throw new Error('Invalid JSON structure');
                }

                if (Array.isArray(parsed.amma_learned_lessons)) {
                    window.AmmaStorage.set('amma_learned_lessons', parsed.amma_learned_lessons.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_mastered_recipes)) {
                    window.AmmaStorage.set('amma_mastered_recipes', parsed.amma_mastered_recipes.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_practiced_recipes)) {
                    window.AmmaStorage.set('amma_practiced_recipes', parsed.amma_practiced_recipes.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_completed_challenges)) {
                    window.AmmaStorage.set('amma_completed_challenges', parsed.amma_completed_challenges.filter(function(x) { return typeof x === 'string'; }));
                }
                if (typeof parsed.amma_quiz_best_scores === 'object' && parsed.amma_quiz_best_scores !== null) {
                    window.AmmaStorage.set('amma_quiz_best_scores', parsed.amma_quiz_best_scores);
                }
                if (Array.isArray(parsed.amma_fav_recipes)) {
                    window.AmmaStorage.set('amma_fav_recipes', parsed.amma_fav_recipes.filter(function(x) { return typeof x === 'string'; }));
                }

                renderProgressDashboard();
                if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
                showNotice('✓ Backup imported and validated successfully!', '#ECFDF5', '#15803D');
            } catch (err) {
                showNotice('✕ Failed to import: Invalid JSON backup file.', '#FEF2F2', '#B91C1C');
            }
        };
        reader.readAsText(file);
        this.value = '';
    });

    // Reset
    document.getElementById('btnResetProgress').addEventListener('click', function() {
        const confirmed = window.confirm('Are you sure you want to reset all your cooking progress, completed lessons, challenges, and quiz scores on this device? This cannot be undone.');
        if (!confirmed) return;

        if (window.AmmaStorage) {
            window.AmmaStorage.set('amma_learned_lessons', []);
            window.AmmaStorage.set('amma_mastered_recipes', []);
            window.AmmaStorage.set('amma_practiced_recipes', []);
            window.AmmaStorage.set('amma_completed_challenges', []);
            window.AmmaStorage.set('amma_quiz_best_scores', {});
            for (let i = 0; i < localStorage.length; i++) {
                const k = localStorage.key(i);
                if (k && (k.startsWith('amma_cook_step_') || k.startsWith('amma_mastery_'))) {
                    localStorage.removeItem(k);
                }
            }
        }
        renderProgressDashboard();
        showNotice('All local progress has been reset.', '#FFFBEB', '#B45309');
    });

    function showNotice(text, bg, color) {
        const notice = document.getElementById('importExportNotice');
        notice.textContent = text;
        notice.style.background = bg;
        notice.style.color = color;
        notice.style.display = 'block';
        setTimeout(function() { notice.style.display = 'none'; }, 4000);
    }

    renderProgressDashboard();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>