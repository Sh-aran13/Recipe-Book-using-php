<?php
// academy.php - Master Chef Academy Portal & Curriculum Dashboard
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Master Chef Academy — Amma's Recipe Book";
$current_page = 'academy';

$levels = get_academy_levels();
$lessons = get_academy_lessons();
$challenges = get_cooking_challenges();
$quizzes = get_cooking_quizzes();

$totalLessons = count($lessons);
$totalChallenges = 0;
foreach ($challenges as $cGroup) {
    $totalChallenges += count($cGroup['items']);
}

$activeLevel = trim($_GET['level'] ?? 'all');
if (!in_array($activeLevel, ['all', 'beginner', 'intermediate', 'advanced', 'restaurant'], true)) {
    $activeLevel = 'all';
}

$displayedLessons = $lessons;
if ($activeLevel !== 'all') {
    $displayedLessons = array_filter($lessons, function($l) use ($activeLevel) {
        return ($l['level'] ?? '') === $activeLevel;
    });
}

$dayOfYear = (int)date('z');
$practiceRecipe = $recipes[$dayOfYear % count($recipes)];

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     ACADEMY PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.academy-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 60px 0 60px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.academy-hero::before {
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
.academy-hero::after {
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
.academy-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 860px;
    margin: 0 auto;
    text-align: center;
}
.academy-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.92);
    border: 1.5px solid #FDBA74;
    padding: 8px 20px;
    border-radius: var(--radius-pill);
    margin-bottom: 22px;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.12);
    backdrop-filter: blur(8px);
}
.academy-hero-badge-text {
    color: var(--primary);
    font-weight: 800;
    font-size: 12.5px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.academy-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(34px, 5vw, 52px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.08;
    letter-spacing: -1.5px;
    margin-bottom: 18px;
}
.academy-hero-title .accent {
    color: var(--primary);
    font-style: italic;
    display: inline-block;
    position: relative;
}
.academy-hero-title .accent::after {
    content: '';
    position: absolute;
    bottom: 4px;
    left: 0;
    right: 0;
    height: 8px;
    background: linear-gradient(90deg, rgba(253, 186, 116, 0.5) 0%, rgba(251, 146, 60, 0.3) 100%);
    border-radius: 4px;
    z-index: -1;
}
.academy-hero-desc {
    font-size: clamp(15.5px, 1.8vw, 18px);
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 680px;
    margin: 0 auto 30px;
}
.academy-hero-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}
.academy-hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 26px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14.5px;
    letter-spacing: 0.2px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid transparent;
    white-space: nowrap;
}
.academy-hero-btn--primary {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
}
.academy-hero-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFFFFF;
}
.academy-hero-btn--secondary {
    background: #FFFFFF;
    color: var(--earth-brown);
    border-color: var(--border-warm);
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.academy-hero-btn--secondary:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-2px);
}

/* ---------- STATS BAR ---------- */
.academy-stats-section {
    position: relative;
    z-index: 10;
    margin-top: -34px;
    padding-bottom: 40px;
}
.academy-stats-bar {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px 30px;
    box-shadow:
        0 16px 40px -12px rgba(69, 26, 3, 0.12),
        0 4px 12px rgba(69, 26, 3, 0.04);
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
    gap: 22px;
    align-items: center;
}
.stat-box {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 6px 0;
}
.stat-icon-wrap {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
    border: 1.5px solid;
    box-shadow: 0 4px 12px rgba(69, 26, 3, 0.06);
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.stat-box:hover .stat-icon-wrap {
    transform: scale(1.08) rotate(-4deg);
}
.stat-icon-wrap--lessons {
    background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%);
    color: #059669;
    border-color: #A7F3D0;
}
.stat-icon-wrap--mastered {
    background: linear-gradient(135deg, #FFF7ED 0%, #FED7AA 100%);
    color: #EA580C;
    border-color: #FDBA74;
}
.stat-icon-wrap--challenges {
    background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
    color: #2563EB;
    border-color: #BFDBFE;
}
.stat-icon-wrap--progress {
    background: linear-gradient(135deg, #FDF4FF 0%, #F5D0FE 100%);
    color: #9333EA;
    border-color: #F0ABFC;
}
.stat-value {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.15;
    letter-spacing: -0.4px;
}
.stat-label {
    font-size: 12px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 3px;
}
.stat-progress-bar-wrap {
    width: 100%;
    height: 10px;
    background: linear-gradient(90deg, #FEF3C7 0%, #FED7AA 100%);
    border-radius: var(--radius-pill);
    overflow: hidden;
    box-shadow: inset 0 2px 4px rgba(69, 26, 3, 0.06);
}
.stat-progress-bar {
    width: 0%;
    height: 100%;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, #FCD34D 100%);
    border-radius: var(--radius-pill);
    transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 0 8px rgba(234, 88, 12, 0.4);
}

/* ---------- CONTINUE LEARNING CARD ---------- */
.continue-learning-section {
    padding: 10px 0 40px;
}
.continue-learning-card {
    background: linear-gradient(135deg, #FFFFFF 0%, #FFFDF9 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px 30px;
    box-shadow: 0 8px 24px -8px rgba(69, 26, 3, 0.08);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    overflow: hidden;
}
.continue-learning-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #EA580C 0%, #F59E0B 100%);
}
.continue-learning-card::after {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.25) 0%, transparent 70%);
    pointer-events: none;
}
.continue-learning-left {
    display: flex;
    align-items: center;
    gap: 18px;
    position: relative;
    z-index: 1;
    flex: 1;
    min-width: 280px;
}
.continue-learning-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 2px solid #FCD34D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
    box-shadow: 0 6px 16px -4px rgba(217, 119, 6, 0.2);
}
.continue-learning-eyebrow {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 11.5px;
    font-weight: 700;
    font-style: italic;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 4px;
}
.continue-learning-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 19px;
    font-weight: 800;
    color: var(--earth-brown);
    margin: 0 0 4px;
    letter-spacing: -0.3px;
    line-height: 1.3;
}
.continue-learning-desc {
    font-size: 13.5px;
    color: var(--text-muted);
    margin: 0;
    line-height: 1.5;
}
.continue-learning-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 11px 24px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    white-space: nowrap;
    position: relative;
    z-index: 1;
}
.continue-learning-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFFFFF;
}

/* ---------- SECTION HEADERS ---------- */
.academy-section {
    padding: 20px 0 40px;
}
.section-header-wrap {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 16px;
}
.section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    color: var(--primary);
    letter-spacing: 0.2px;
    margin-bottom: 6px;
}
.section-eyebrow::before {
    content: '';
    width: 28px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.section-heading {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(26px, 3.2vw, 34px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.6px;
    line-height: 1.18;
    position: relative;
    padding-bottom: 14px;
}
.section-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 56px;
    height: 3px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 2px;
}
.section-subheading {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.6;
    margin-top: 6px;
    max-width: 620px;
}

/* ---------- LEVEL CARDS ---------- */
.level-card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 22px;
    margin-bottom: 48px;
}
.level-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px;
    box-shadow: 0 4px 20px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}
.level-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--level-color, #EA580C);
}
.level-card:hover {
    transform: translateY(-6px);
    border-color: #FDBA74;
    box-shadow: 0 20px 44px -12px rgba(194, 65, 12, 0.18);
}
.level-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    gap: 10px;
}
.level-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    border: 1px solid;
    white-space: nowrap;
}
.level-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1px solid #FCD34D;
    flex-shrink: 0;
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.level-card:hover .level-icon {
    transform: scale(1.1) rotate(-5deg);
}
.level-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 21px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 6px;
    letter-spacing: -0.4px;
    line-height: 1.25;
}
.level-tagline {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13.5px;
    font-weight: 600;
    font-style: italic;
    color: var(--level-color, var(--primary));
    margin-bottom: 12px;
    letter-spacing: 0.1px;
}
.level-desc {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 18px;
}
.level-target {
    border-top: 1px dashed var(--border-warm);
    padding-top: 14px;
    margin-bottom: 14px;
    font-size: 12.5px;
    color: var(--text-light);
    line-height: 1.5;
}
.level-target strong {
    color: var(--earth-brown);
    font-weight: 800;
}
.level-cta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 11px 20px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13.5px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
}
.level-cta:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.3);
}
.level-cta .arrow {
    transition: transform 0.25s ease;
}
.level-cta:hover .arrow {
    transform: translateX(3px);
}

/* ---------- PRACTICE RECIPE CARD ---------- */
.practice-recipe-card {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFFDF9 60%, #FFF1EB 100%);
    border: 1.5px solid #FED7AA;
    border-radius: 26px;
    padding: 30px;
    box-shadow: 0 16px 40px -12px rgba(194, 65, 12, 0.14), 0 4px 12px rgba(69, 26, 3, 0.04);
    display: grid;
    grid-template-columns: 1fr 1.4fr;
    gap: 32px;
    align-items: center;
    margin-bottom: 48px;
    overflow: hidden;
}
.practice-recipe-card::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.3) 0%, transparent 70%);
    pointer-events: none;
}
.practice-recipe-image {
    position: relative;
    border-radius: 20px;
    height: 280px;
    overflow: hidden;
    border: 2px solid #FFFFFF;
    box-shadow: 0 8px 24px -6px rgba(69, 26, 3, 0.15);
    background: <?= $practiceRecipe['accent_color'] ?? '#FFF3E0' ?>;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}
.practice-recipe-image::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.02) 0%, transparent 40%, rgba(0,0,0,0.35) 100%);
    pointer-events: none;
    z-index: 1;
}
.practice-recipe-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.practice-recipe-card:hover .practice-recipe-image img {
    transform: scale(1.06);
}
.practice-recipe-emoji {
    font-size: 96px;
    filter: drop-shadow(0 8px 16px rgba(0,0,0,0.15));
}
.practice-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFF;
    font-size: 11px;
    font-weight: 800;
    padding: 6px 14px;
    border-radius: var(--radius-pill);
    letter-spacing: 0.5px;
    box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35);
    z-index: 2;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 6px;
}
.practice-content {
    position: relative;
    z-index: 1;
}
.practice-meta-row {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 12px;
}
.practice-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    font-size: 12px;
    font-weight: 700;
    background: #FFFFFF;
    border: 1px solid var(--border-warm);
    color: var(--text-muted);
    box-shadow: 0 1px 3px rgba(69, 26, 3, 0.05);
}
.practice-meta-pill--easy {
    background: #F0FDF4;
    border-color: #BBF7D0;
    color: #15803D;
}
.practice-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(22px, 3vw, 28px);
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    letter-spacing: -0.5px;
    line-height: 1.2;
}
.practice-desc {
    font-size: 14.5px;
    color: var(--text-muted);
    line-height: 1.65;
    margin-bottom: 22px;
}
.practice-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.practice-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 11px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13.5px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid transparent;
    white-space: nowrap;
}
.practice-btn--primary {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
}
.practice-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFFFFF;
}
.practice-btn--secondary {
    background: #FFFFFF;
    color: var(--earth-brown);
    border-color: var(--border-warm);
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.practice-btn--secondary:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-2px);
}

/* ---------- LEVEL PILL NAV ---------- */
.level-pill-nav {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding-bottom: 10px;
    scrollbar-width: none;
    margin: 20px 0 30px;
}
.level-pill-nav::-webkit-scrollbar {
    display: none;
}
.level-nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 20px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13.5px;
    letter-spacing: 0.1px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    text-decoration: none;
    transition: all 0.25s ease;
    white-space: nowrap;
    cursor: pointer;
}
.level-nav-btn:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFFDF9;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.level-nav-btn.active {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.3);
}
.level-nav-btn.active:hover {
    color: #FFFFFF;
    transform: translateY(-1px);
}

/* ---------- LESSON CARDS ---------- */
.lesson-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 22px;
    margin-bottom: 48px;
}
.lesson-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    padding: 22px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}
.lesson-card::before {
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
.lesson-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 16px 36px -10px rgba(194, 65, 12, 0.16);
    transform: translateY(-4px);
}
.lesson-card:hover::before {
    opacity: 1;
}
.lesson-card.is-learned {
    border-color: #86EFAC;
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
}
.lesson-card.is-learned::before {
    background: linear-gradient(180deg, #16A34A 0%, #15803D 100%);
    opacity: 1;
}
.lesson-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
    gap: 10px;
}
.lesson-badge {
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 5px 11px;
    border-radius: var(--radius-pill);
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border: 1px solid;
}
.lesson-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1px solid #FCD34D;
    flex-shrink: 0;
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.lesson-card:hover .lesson-icon {
    transform: scale(1.1) rotate(-4deg);
}
.lesson-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 19px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 8px;
    line-height: 1.28;
    letter-spacing: -0.3px;
}
.lesson-title a {
    color: inherit;
    transition: color 0.2s ease;
}
.lesson-title a:hover {
    color: var(--primary);
}
.lesson-summary {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 62px;
}
.lesson-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px dashed var(--border-warm);
    padding-top: 14px;
    gap: 10px;
    flex-wrap: wrap;
}
.lesson-time {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12.5px;
    color: var(--text-light);
    font-weight: 600;
}
.lesson-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}
.btn-mark-lesson-learned {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.1px;
    cursor: pointer;
    transition: all 0.22s ease;
    white-space: nowrap;
}
.btn-mark-lesson-learned:hover {
    border-color: #15803D;
    background: #F0FDF4;
    color: #15803D;
}
.btn-read-lesson {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 16px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.22s ease;
    box-shadow: 0 3px 10px rgba(194, 65, 12, 0.28);
    white-space: nowrap;
}
.btn-read-lesson:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.38);
    color: #FFFFFF;
}

/* ---------- QUICK TOOLS GRID ---------- */
.quick-tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}
.quick-tool-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    text-align: center;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
}
.quick-tool-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #FCD34D 0%, #FB923C 50%, #C2410C 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.35s ease;
}
.quick-tool-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -10px rgba(194, 65, 12, 0.18);
    border-color: #FDBA74;
}
.quick-tool-card:hover::before {
    transform: scaleX(1);
}
.quick-tool-icon {
    width: 64px;
    height: 64px;
    border-radius: 18px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto 16px;
    box-shadow: 0 6px 16px -4px rgba(217, 119, 6, 0.2);
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.quick-tool-card:hover .quick-tool-icon {
    transform: scale(1.12) rotate(-6deg);
}
.quick-tool-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 8px;
    letter-spacing: -0.3px;
    line-height: 1.28;
}
.quick-tool-desc {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.55;
    min-height: 62px;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 900px) {
    .academy-hero { padding: 44px 0 50px; }
    .practice-recipe-card { grid-template-columns: 1fr; gap: 24px; }
    .practice-recipe-image { height: 240px; }
    .academy-stats-bar { grid-template-columns: repeat(2, 1fr); gap: 18px; padding: 20px; }
    .stat-icon-wrap { width: 46px; height: 46px; font-size: 22px; }
    .stat-value { font-size: 20px; }
}
@media (max-width: 640px) {
    .academy-hero { padding: 36px 0 44px; }
    .academy-hero-title { font-size: 32px; }
    .academy-hero-desc { font-size: 15px; }
    .academy-hero-btn { font-size: 13.5px; padding: 11px 20px; }
    .academy-stats-section { margin-top: -28px; }
    .academy-stats-bar { grid-template-columns: 1fr; gap: 14px; padding: 18px; }
    .continue-learning-card { padding: 20px; }
    .continue-learning-btn { width: 100%; justify-content: center; }
    .level-card { padding: 22px; }
    .lesson-grid { grid-template-columns: 1fr; }
    .quick-tools-grid { grid-template-columns: 1fr 1fr; gap: 14px; }
    .quick-tool-card { padding: 18px; }
    .quick-tool-icon { width: 52px; height: 52px; font-size: 26px; margin-bottom: 12px; }
    .quick-tool-title { font-size: 16px; }
    .quick-tool-desc { font-size: 12.5px; min-height: 54px; }
    .practice-recipe-image { height: 200px; }
    .practice-recipe-emoji { font-size: 72px; }
    .section-heading { font-size: 24px; }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="academy-hero">
    <div class="container">
        <div class="academy-hero-inner">

            <div class="academy-hero-badge">
                <span style="font-size: 18px;">🎓</span>
                <span class="academy-hero-badge-text">Amma's Master Chef Academy</span>
            </div>

            <h1 class="academy-hero-title">
                From Your First Dish to <span class="accent">Master Chef</span> at Home
            </h1>

            <p class="academy-hero-desc">
                Learn cooking step by step, master traditional recipes, understand culinary science, explore restaurant gravies, and build lifelong confidence in your kitchen.
            </p>

            <div class="academy-hero-actions">
                <a href="#learningLevels" class="academy-hero-btn academy-hero-btn--primary">
                    <span>📚</span>
                    <span>Explore Curriculum</span>
                </a>
                <a href="quiz.php" class="academy-hero-btn academy-hero-btn--secondary">
                    <span>✍️</span>
                    <span>Take Cooking Quiz</span>
                </a>
                <a href="challenges.php" class="academy-hero-btn academy-hero-btn--secondary">
                    <span>🏆</span>
                    <span>Cooking Challenges</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     STATS BAR
     ============================================================ -->
<section class="academy-stats-section">
    <div class="container">
        <div class="academy-stats-bar">

            <div class="stat-box">
                <div class="stat-icon-wrap stat-icon-wrap--lessons">📚</div>
                <div>
                    <div class="stat-value" id="statLessonsCount">0 / <?= $totalLessons ?></div>
                    <div class="stat-label">Lessons Mastered</div>
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-icon-wrap stat-icon-wrap--mastered">🍳</div>
                <div>
                    <div class="stat-value" id="statMasteredCount">0 / <?= count($recipes) ?></div>
                    <div class="stat-label">Recipes Mastered</div>
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-icon-wrap stat-icon-wrap--challenges">🏆</div>
                <div>
                    <div class="stat-value" id="statChallengesCount">0 / <?= $totalChallenges ?></div>
                    <div class="stat-label">Challenges Finished</div>
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-icon-wrap stat-icon-wrap--progress">🌟</div>
                <div style="flex: 1; min-width: 0;">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 8px; gap: 8px;">
                        <span class="stat-value" style="font-size: 20px;" id="statOverallPct">0%</span>
                        <span style="font-size: 11px; font-weight: 800; color: #9333EA; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap;" id="currentRankBadge">Beginner</span>
                    </div>
                    <div class="stat-progress-bar-wrap">
                        <div id="statProgressBar" class="stat-progress-bar"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     CONTINUE LEARNING
     ============================================================ -->
<section class="continue-learning-section" id="continueLearningSection">
    <div class="container">
        <div class="continue-learning-card">

            <div class="continue-learning-left">
                <div class="continue-learning-icon">📖</div>
                <div>
                    <div class="continue-learning-eyebrow">Recommended Next Lesson</div>
                    <h3 class="continue-learning-title" id="continueLessonTitle">
                        Understanding Teaspoons, Tablespoons, Cups & Kitchen Measurements
                    </h3>
                    <p class="continue-learning-desc" id="continueLessonDesc">
                        Start with precise measurement fundamentals to guarantee consistent cooking results.
                    </p>
                </div>
            </div>

            <a id="continueLessonBtn" href="lesson.php?id=beg-measurements" class="continue-learning-btn">
                <span>Start Lesson</span>
                <span>→</span>
            </a>

        </div>
    </div>
</section>

<!-- ============================================================
     LEARNING LEVELS
     ============================================================ -->
<section class="academy-section" id="learningLevels">
    <div class="container">

        <div class="section-header-wrap">
            <div>
                <div class="section-eyebrow">Structured Curriculum</div>
                <h2 class="section-heading">4 Progressive Cooking Levels</h2>
                <p class="section-subheading">
                    Progress systematically from kitchen foundations to restaurant-quality home cooking.
                </p>
            </div>
        </div>

        <div class="level-card-grid">
            <?php foreach ($levels as $lKey => $lvl): ?>
                <div class="level-card" style="--level-color: <?= $lvl['color'] ?>;">
                    <div>
                        <div class="level-card-top">
                            <span class="level-badge" style="background: <?= $lvl['bg_light'] ?>; color: <?= $lvl['color'] ?>; border-color: <?= $lvl['border_color'] ?>;">
                                <?= $lvl['badge'] ?>
                            </span>
                            <div class="level-icon"><?= $lvl['icon'] ?></div>
                        </div>
                        <h3 class="level-title"><?= h($lvl['title']) ?></h3>
                        <div class="level-tagline"><?= h($lvl['tagline']) ?></div>
                        <p class="level-desc"><?= h($lvl['description']) ?></p>
                    </div>

                    <div>
                        <div class="level-target">
                            <strong>Target:</strong> <?= h($lvl['target_audience']) ?>
                        </div>
                        <a href="academy.php?level=<?= urlencode($lKey) ?>#lessonsDirectory" class="level-cta">
                            <span>View Level Lessons</span>
                            <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     PRACTICE TODAY'S RECIPE
     ============================================================ -->
<section class="academy-section">
    <div class="container">
        <div class="practice-recipe-card">

            <div class="practice-recipe-image">
                <?php if (!empty($practiceRecipe['image']) && file_exists(__DIR__ . '/' . $practiceRecipe['image'])): ?>
                    <img src="<?= h($practiceRecipe['image']) ?>" alt="<?= h($practiceRecipe['name']) ?>" loading="lazy">
                <?php else: ?>
                    <span class="practice-recipe-emoji"><?= $practiceRecipe['icon'] ?? '🍲' ?></span>
                <?php endif; ?>
                <div class="practice-badge">
                    <span>🎯</span>
                    <span>Practice Today</span>
                </div>
            </div>

            <div class="practice-content">
                <div class="practice-meta-row">
                    <span class="practice-meta-pill">
                        ⏱️ <?= ($practiceRecipe['prep_time'] ?? 0) + ($practiceRecipe['cook_time'] ?? 0) ?> mins
                    </span>
                    <span class="practice-meta-pill">
                        👥 <?= $practiceRecipe['servings'] ?? 4 ?> servings
                    </span>
                    <span class="practice-meta-pill practice-meta-pill--easy">
                        📊 <?= h($practiceRecipe['difficulty'] ?? 'Easy') ?>
                    </span>
                </div>

                <h3 class="practice-title"><?= h($practiceRecipe['name']) ?></h3>

                <p class="practice-desc"><?= h($practiceRecipe['description'] ?? '') ?></p>

                <div class="practice-actions">
                    <a href="recipe.php?id=<?= urlencode($practiceRecipe['id']) ?>" class="practice-btn practice-btn--primary">
                        <span>View Recipe</span>
                        <span>→</span>
                    </a>
                    <a href="recipe.php?id=<?= urlencode($practiceRecipe['id']) ?>#cookingModeModal" onclick="localStorage.setItem('amma_trigger_cook_mode','1')" class="practice-btn practice-btn--secondary">
                        <span>🧑‍🍳</span>
                        <span>Launch Cooking Mode</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     LESSONS DIRECTORY
     ============================================================ -->
<section class="academy-section" id="lessonsDirectory">
    <div class="container">

        <div class="section-header-wrap">
            <div>
                <div class="section-eyebrow">Comprehensive Masterclass</div>
                <h2 class="section-heading">Cooking Lessons & Core Techniques</h2>
                <p class="section-subheading">
                    Browse all <?= count($lessons) ?> structured lessons across four progressive levels.
                </p>
            </div>
        </div>

        <!-- LEVEL FILTER PILLS -->
        <div class="level-pill-nav">
            <a href="academy.php?level=all#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'all' ? 'active' : '' ?>">
                <span>📚</span>
                <span>All Lessons (<?= count($lessons) ?>)</span>
            </a>
            <a href="academy.php?level=beginner#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'beginner' ? 'active' : '' ?>">
                <span>🌱</span>
                <span>Level 1: Beginner</span>
            </a>
            <a href="academy.php?level=intermediate#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'intermediate' ? 'active' : '' ?>">
                <span>🔥</span>
                <span>Level 2: Intermediate</span>
            </a>
            <a href="academy.php?level=advanced#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'advanced' ? 'active' : '' ?>">
                <span>🌟</span>
                <span>Level 3: Advanced</span>
            </a>
            <a href="academy.php?level=restaurant#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'restaurant' ? 'active' : '' ?>">
                <span>👑</span>
                <span>Level 4: Restaurant</span>
            </a>
        </div>

        <!-- LESSONS CARDS -->
        <div class="lesson-grid">
            <?php foreach ($displayedLessons as $lId => $les): ?>
                <?php $lvlInfo = $levels[$les['level']] ?? $levels['beginner']; ?>
                <article class="lesson-card" id="lesson-card-<?= $lId ?>" data-lesson-id="<?= $lId ?>">
                    <div>
                        <div class="lesson-card-top">
                            <span class="lesson-badge" style="background: <?= $lvlInfo['bg_light'] ?>; color: <?= $lvlInfo['color'] ?>; border-color: <?= $lvlInfo['border_color'] ?>;">
                                <?= $lvlInfo['badge'] ?> · <?= h($les['category']) ?>
                            </span>
                            <div class="lesson-icon"><?= $les['icon'] ?></div>
                        </div>

                        <h3 class="lesson-title">
                            <a href="lesson.php?id=<?= urlencode($lId) ?>"><?= h($les['title']) ?></a>
                        </h3>

                        <p class="lesson-summary"><?= h($les['summary']) ?></p>
                    </div>

                    <div class="lesson-footer">
                        <span class="lesson-time">
                            <span>⏱️</span>
                            <span><?= $les['read_time'] ?? 8 ?> min study</span>
                        </span>
                        <div class="lesson-actions">
                            <button type="button" class="btn-mark-lesson-learned" data-toggle-lesson="<?= $lId ?>">
                                Mark Learned
                            </button>
                            <a href="lesson.php?id=<?= urlencode($lId) ?>" class="btn-read-lesson">
                                <span>Read</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     QUICK ACCESS TOOLS
     ============================================================ -->
<section class="academy-section" style="padding-bottom: 60px;">
    <div class="container">

        <div class="section-header-wrap">
            <div>
                <div class="section-eyebrow">Interactive Features</div>
                <h2 class="section-heading">Master Chef Learning Tools</h2>
                <p class="section-subheading">
                    Explore interactive helpers designed to accelerate your culinary journey.
                </p>
            </div>
        </div>

        <div class="quick-tools-grid">

            <a href="what-can-i-cook.php" class="quick-tool-card">
                <div class="quick-tool-icon">🥕</div>
                <h3 class="quick-tool-title">What Can I Cook?</h3>
                <p class="quick-tool-desc">
                    Select ingredients in your pantry and instantly discover matching dishes you can make right now.
                </p>
            </a>

            <a href="challenges.php" class="quick-tool-card">
                <div class="quick-tool-icon">🏆</div>
                <h3 class="quick-tool-title">Cooking Challenges</h3>
                <p class="quick-tool-desc">
                    Put your skills to the test with 15 structured Easy, Medium, and Advanced cooking missions.
                </p>
            </a>

            <a href="knowledge-centre.php" class="quick-tool-card">
                <div class="quick-tool-icon">🔬</div>
                <h3 class="quick-tool-title">Knowledge Centre</h3>
                <p class="quick-tool-desc">
                    Explore cooking science, ingredient selection, and safe troubleshooting fixes.
                </p>
            </a>

            <a href="quiz.php" class="quick-tool-card">
                <div class="quick-tool-icon">✍️</div>
                <h3 class="quick-tool-title">Cooking Quizzes</h3>
                <p class="quick-tool-desc">
                    Test your culinary knowledge with instant feedback across all difficulty tiers.
                </p>
            </a>

            <a href="progress.php" class="quick-tool-card">
                <div class="quick-tool-icon">📊</div>
                <h3 class="quick-tool-title">Learning Dashboard</h3>
                <p class="quick-tool-desc">
                    Track completed lessons, export & import progress, and manage your culinary journey.
                </p>
            </a>

        </div>

    </div>
</section>

<!-- ============================================================
     PROGRESS PERSISTENCE SCRIPT
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const totalLessons = <?= $totalLessons ?>;
    const totalRecipes = <?= count($recipes) ?>;
    const totalChallenges = <?= $totalChallenges ?>;
    const allLessonsList = <?= json_encode(array_values($lessons), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

    function refreshAcademyStats() {
        if (!window.AmmaStorage) return;

        const learnedLessons = window.AmmaStorage.get('amma_learned_lessons', []);
        const masteredRecipes = window.AmmaStorage.get('amma_mastered_recipes', []);
        const finishedChallenges = window.AmmaStorage.get('amma_completed_challenges', []);

        const lCount = learnedLessons.length;
        const mCount = masteredRecipes.length;
        const cCount = finishedChallenges.length;

        document.getElementById('statLessonsCount').textContent = lCount + ' / ' + totalLessons;
        document.getElementById('statMasteredCount').textContent = mCount + ' / ' + totalRecipes;
        document.getElementById('statChallengesCount').textContent = cCount + ' / ' + totalChallenges;

        const lessonPct = totalLessons > 0 ? (lCount / totalLessons) * 40 : 0;
        const recipePct = totalRecipes > 0 ? (mCount / totalRecipes) * 40 : 0;
        const chalPct = totalChallenges > 0 ? (cCount / totalChallenges) * 20 : 0;
        const overallPct = Math.min(100, Math.round(lessonPct + recipePct + chalPct));

        document.getElementById('statOverallPct').textContent = overallPct + '%';
        document.getElementById('statProgressBar').style.width = overallPct + '%';

        let rank = 'Beginner';
        if (overallPct >= 75) rank = 'Restaurant Chef';
        else if (overallPct >= 50) rank = 'Advanced Cook';
        else if (overallPct >= 25) rank = 'Intermediate';
        document.getElementById('currentRankBadge').textContent = rank;

        document.querySelectorAll('[data-lesson-id]').forEach(function(card) {
            const lId = card.getAttribute('data-lesson-id');
            const btn = card.querySelector('[data-toggle-lesson]');
            if (learnedLessons.includes(lId)) {
                card.classList.add('is-learned');
                if (btn) {
                    btn.innerHTML = '✓ Learned';
                    btn.style.background = '#15803D';
                    btn.style.color = '#FFF';
                    btn.style.borderColor = '#15803D';
                }
            } else {
                card.classList.remove('is-learned');
                if (btn) {
                    btn.innerHTML = 'Mark Learned';
                    btn.style.background = '#FFFFFF';
                    btn.style.color = 'var(--text-muted)';
                    btn.style.borderColor = 'var(--border-warm)';
                }
            }
        });

        const nextLessonTitle = document.getElementById('continueLessonTitle');
        const nextLessonDesc = document.getElementById('continueLessonDesc');
        const nextLessonBtn = document.getElementById('continueLessonBtn');

        if (nextLessonTitle && allLessonsList.length > 0) {
            let nextLesson = null;
            for (let i = 0; i < allLessonsList.length; i++) {
                if (!learnedLessons.includes(allLessonsList[i].id)) {
                    nextLesson = allLessonsList[i];
                    break;
                }
            }

            if (nextLesson) {
                nextLessonTitle.textContent = nextLesson.title;
                nextLessonDesc.textContent = nextLesson.summary;
                nextLessonBtn.href = 'lesson.php?id=' + encodeURIComponent(nextLesson.id);
                nextLessonBtn.innerHTML = '<span>Start Lesson</span><span>→</span>';
            } else {
                nextLessonTitle.textContent = '🎉 All Academy Lessons Completed!';
                nextLessonDesc.textContent = 'Congratulations, Amma! You have studied every single lesson across all 4 levels.';
                nextLessonBtn.href = 'progress.php';
                nextLessonBtn.innerHTML = '<span>View Progress Dashboard</span><span>→</span>';
            }
        }
    }

    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[data-toggle-lesson]');
        if (!btn) return;

        e.preventDefault();
        const lId = btn.getAttribute('data-toggle-lesson');
        if (!lId || !window.AmmaStorage) return;

        let learned = window.AmmaStorage.get('amma_learned_lessons', []);
        const idx = learned.indexOf(lId);
        if (idx > -1) {
            learned.splice(idx, 1);
        } else {
            learned.push(lId);
        }
        window.AmmaStorage.set('amma_learned_lessons', learned);
        refreshAcademyStats();
    });

    refreshAcademyStats();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>