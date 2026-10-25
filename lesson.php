<?php
// lesson.php - Detailed Cooking Lesson & Practical Technique View
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$id = trim($_GET['id'] ?? '');
$lessons = get_academy_lessons();
$levels = get_academy_levels();

$lesson = $lessons[$id] ?? null;

if (!$lesson) {
    http_response_code(404);
    $page_title = "Lesson Not Found — Master Chef Academy";
    $current_page = 'academy';
    include __DIR__ . '/includes/header.php';
    ?>
    <div class="container" style="padding: 80px 20px; text-align: center;">
        <div style="background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%); border: 2px dashed #FED7AA; border-radius: 26px; padding: 60px 20px; max-width: 580px; margin: 0 auto; box-shadow: 0 8px 24px -8px rgba(69, 26, 3, 0.08);">
            <div style="font-size: 72px; margin-bottom: 18px;">📚❓</div>
            <h1 style="font-family: 'Playfair Display', var(--font-serif); font-size: 30px; font-weight: 800; color: var(--earth-brown); margin-bottom: 12px; letter-spacing: -0.5px;">
                Lesson Not Found
            </h1>
            <p style="color: var(--text-muted); font-size: 15.5px; line-height: 1.6; margin-bottom: 26px;">
                The cooking lesson you requested could not be located.
            </p>
            <a href="academy.php" class="btn btn-primary" style="padding: 12px 28px; border-radius: var(--radius-pill); font-family: 'Playfair Display', var(--font-serif); font-weight: 700;">
                Back to Academy Dashboard
            </a>
        </div>
    </div>
    <?php
    include __DIR__ . '/includes/footer.php';
    exit;
}

$lvlInfo = $levels[$lesson['level']] ?? $levels['beginner'];
$title = h($lesson['title']);
$page_title = "{$title} — Master Chef Academy";
$current_page = 'academy';

$relatedRecipes = [];
if (!empty($lesson['related_recipes'])) {
    foreach ($lesson['related_recipes'] as $rId) {
        $found = find_recipe_by_id($rId);
        if ($found) $relatedRecipes[] = $found;
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     LESSON PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.lesson-hero {
    position: relative;
    background: linear-gradient(135deg, <?= $lvlInfo['bg_light'] ?> 0%, #FFF8EE 40%, #FEF3C7 70%, #FDE68A 100%);
    padding: 46px 0 52px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.lesson-hero::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 360px;
    height: 360px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.18) 0%, transparent 70%);
    pointer-events: none;
}
.lesson-hero::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -100px;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(194, 65, 12, 0.08) 0%, transparent 70%);
    pointer-events: none;
}
.lesson-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 940px;
}
.lesson-breadcrumb {
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
    flex-wrap: wrap;
}
.lesson-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.lesson-breadcrumb a:hover {
    text-decoration: underline;
}
.lesson-breadcrumb .sep {
    color: #A8A29E;
}
.lesson-hero-badges {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    flex-wrap: wrap;
}
.lesson-level-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: <?= $lvlInfo['bg_light'] ?>;
    color: <?= $lvlInfo['color'] ?>;
    border: 1.5px solid <?= $lvlInfo['border_color'] ?>;
    padding: 6px 16px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.lesson-hero-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid var(--border-warm);
    padding: 6px 14px;
    border-radius: var(--radius-pill);
    font-size: 12.5px;
    font-weight: 700;
    color: var(--text-muted);
    backdrop-filter: blur(6px);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.lesson-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(28px, 4.2vw, 44px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.15;
    letter-spacing: -1px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.lesson-hero-title .lesson-hero-icon {
    font-size: 0.85em;
    filter: drop-shadow(0 4px 8px rgba(69, 26, 3, 0.15));
}
.lesson-hero-desc {
    font-size: clamp(15px, 1.8vw, 17px);
    color: var(--text-muted);
    max-width: 800px;
    line-height: 1.65;
}

/* ---------- MAIN ---------- */
.lesson-main {
    padding: 44px 0 80px;
}
.lesson-content-wrap {
    max-width: 940px;
    margin: 0 auto;
}

/* ---------- COMPLETION CONTROLLER ---------- */
.lesson-progress-card {
    background: linear-gradient(135deg, #FFFFFF 0%, #FFFDF9 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    padding: 22px 26px;
    margin-bottom: 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 18px;
    box-shadow: 0 8px 24px -8px rgba(69, 26, 3, 0.08);
    position: relative;
    overflow: hidden;
}
.lesson-progress-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #EA580C 0%, #F59E0B 100%);
}
.lesson-progress-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12px;
    font-weight: 700;
    font-style: italic;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 4px;
}
.lesson-progress-status {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 16px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.2px;
}
.btn-toggle-learned {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 26px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14.5px;
    letter-spacing: 0.2px;
    border: none;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    white-space: nowrap;
}
.btn-toggle-learned:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}

/* ---------- SECTION BOXES ---------- */
.lesson-section-box {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 24px;
    padding: clamp(24px, 4vw, 36px);
    margin-bottom: 28px;
    box-shadow: 0 8px 24px -10px rgba(69, 26, 3, 0.08);
    overflow: hidden;
}
.lesson-section-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, #FCD34D 100%);
    opacity: 0.9;
}
.lesson-section-heading {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(20px, 2.4vw, 24px);
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 22px;
    letter-spacing: -0.4px;
    display: flex;
    align-items: center;
    gap: 12px;
    line-height: 1.25;
}
.lesson-section-heading .heading-emoji {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    font-size: 20px;
    flex-shrink: 0;
    box-shadow: 0 4px 10px -2px rgba(217, 119, 6, 0.15);
}

/* Dual grid: utensils & flame */
.lesson-dual-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 18px;
}
.lesson-info-tile {
    border-radius: 16px;
    padding: 20px;
    position: relative;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.lesson-info-tile:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 24px -8px rgba(194, 65, 12, 0.14);
}
.lesson-info-tile--warm {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px solid var(--border-warm);
}
.lesson-info-tile--amber {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
}
.lesson-info-tile-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.lesson-info-tile-title--warm { color: var(--earth-brown); }
.lesson-info-tile-title--amber { color: #92400E; }

.lesson-utensil-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.lesson-utensil-list li {
    font-size: 13.5px;
    color: var(--text-main);
    line-height: 1.5;
    padding-left: 24px;
    position: relative;
}
.lesson-utensil-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    top: 1px;
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
.lesson-flame-text {
    font-size: 14px;
    color: #7C2D12;
    line-height: 1.65;
}

/* Concepts */
.lesson-concepts-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.concept-item {
    display: flex;
    gap: 16px;
    align-items: flex-start;
    padding: 16px 18px;
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    transition: all 0.25s ease;
}
.concept-item:hover {
    border-color: #FDBA74;
    transform: translateX(3px);
    background: #FFFFFF;
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.08);
}
.concept-bullet {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, <?= $lvlInfo['color'] ?>22 0%, <?= $lvlInfo['color'] ?>44 100%);
    color: <?= $lvlInfo['color'] ?>;
    border: 1.5px solid <?= $lvlInfo['border_color'] ?>;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 15px;
    flex-shrink: 0;
    box-shadow: 0 3px 8px rgba(69, 26, 3, 0.08);
}
.concept-text {
    font-size: 14.5px;
    color: var(--text-main);
    line-height: 1.65;
    flex: 1;
    padding-top: 4px;
}

/* Visual card */
.lesson-visual-card {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    position: relative;
    overflow: hidden;
}
.lesson-visual-card::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.5) 0%, transparent 70%);
    pointer-events: none;
}
.lesson-visual-card .lesson-section-heading {
    color: #92400E;
    position: relative;
    z-index: 1;
}
.lesson-visual-card .lesson-section-heading .heading-emoji {
    background: #FFFFFF;
    border-color: #FCD34D;
}
.lesson-visual-text {
    font-size: 14.5px;
    color: #78350F;
    line-height: 1.7;
    position: relative;
    z-index: 1;
}

/* Mistakes & corrections */
.lesson-mistakes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 18px;
}
.lesson-mistake-card {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%);
    border: 1.5px solid #FCA5A5;
    border-radius: 16px;
    padding: 22px;
    position: relative;
    overflow: hidden;
}
.lesson-mistake-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: #DC2626;
}
.lesson-correction-card {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border: 1.5px solid #86EFAC;
    border-radius: 16px;
    padding: 22px;
    position: relative;
    overflow: hidden;
}
.lesson-correction-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: #16A34A;
}
.lesson-mistake-card-title,
.lesson-correction-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.lesson-mistake-card-title { color: #991B1B; }
.lesson-correction-card-title { color: #166534; }
.lesson-tip-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.lesson-tip-list li {
    font-size: 13.5px;
    line-height: 1.55;
    padding-left: 24px;
    position: relative;
}
.lesson-mistake-card .lesson-tip-list li { color: #7F1D1D; }
.lesson-correction-card .lesson-tip-list li { color: #14532D; }
.lesson-mistake-card .lesson-tip-list li::before {
    content: '✕';
    position: absolute;
    left: 0;
    top: 1px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: rgba(220, 38, 38, 0.15);
    color: #DC2626;
    font-size: 9px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}
.lesson-correction-card .lesson-tip-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    top: 1px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: rgba(22, 163, 74, 0.15);
    color: #16A34A;
    font-size: 9px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

/* ============================================================
   PRACTICE RECIPES SECTION — COMPACT & ELEGANT
   ============================================================ */
.lesson-practice-section {
    margin-top: 48px;
    padding: 40px 32px 34px;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    border-radius: 28px;
    position: relative;
    overflow: hidden;
    box-shadow:
        0 16px 40px -12px rgba(194, 65, 12, 0.14),
        0 6px 16px -4px rgba(69, 26, 3, 0.06);
}
.lesson-practice-section::before {
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
.lesson-practice-section::after {
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
.lesson-practice-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 28px;
    position: relative;
    z-index: 2;
}
.lesson-practice-header-text { flex: 1; min-width: 260px; }
.lesson-practice-eyebrow {
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
.lesson-practice-eyebrow::before {
    content: '';
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.lesson-practice-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(24px, 3vw, 30px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.6px;
    line-height: 1.15;
    position: relative;
    padding-bottom: 14px;
}
.lesson-practice-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 56px;
    height: 3px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 3px;
}
.lesson-practice-browse-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid #FCD34D;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.1);
    white-space: nowrap;
}
.lesson-practice-browse-btn:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.28);
}

/* Compact practice recipe grid */
.lesson-practice-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 18px;
    position: relative;
    z-index: 2;
}

/* Compact practice card */
.pair-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.3s ease,
                border-color 0.3s ease;
    box-shadow: 0 3px 12px -3px rgba(69, 26, 3, 0.08);
    position: relative;
    text-decoration: none;
    color: inherit;
}
.pair-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 32px -8px rgba(194, 65, 12, 0.2);
    border-color: #FDBA74;
}
.pair-card-image {
    position: relative;
    width: 100%;
    height: 140px;
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
    transition: transform 0.55s cubic-bezier(0.16, 1, 0.3, 1);
}
.pair-card:hover .pair-card-img {
    transform: scale(1.08);
}
.pair-card-emoji {
    font-size: 56px;
    filter: drop-shadow(0 5px 12px rgba(69, 26, 3, 0.18));
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.pair-card:hover .pair-card-emoji {
    transform: scale(1.12) rotate(-5deg);
}
.pair-card-diet {
    position: absolute;
    top: 10px;
    left: 10px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10px;
    font-weight: 800;
    padding: 3px 9px;
    border-radius: var(--radius-pill);
    backdrop-filter: blur(8px);
    text-transform: uppercase;
    letter-spacing: 0.3px;
    z-index: 3;
}
.pair-card-diet--veg {
    background: rgba(255, 255, 255, 0.95);
    color: #15803D;
    border: 1px solid #BBF7D0;
}
.pair-card-diet--veg::before {
    content: '';
    width: 5px;
    height: 5px;
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
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #DC2626;
}
.pair-card-time {
    position: absolute;
    bottom: 10px;
    right: 10px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10.5px;
    font-weight: 800;
    color: #FFF;
    padding: 3px 9px;
    border-radius: var(--radius-pill);
    background: rgba(69, 26, 3, 0.82);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
}
.pair-card-body {
    padding: 14px 16px 16px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.pair-card-cat {
    font-size: 10px;
    font-weight: 800;
    color: var(--saffron);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 5px;
}
.pair-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15.5px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.3;
    margin-bottom: 4px;
    letter-spacing: -0.2px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 40px;
}
.pair-card:hover .pair-card-title {
    color: var(--primary);
}
.pair-card-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 11.5px;
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
    padding-top: 10px;
    border-top: 1px dashed var(--border-warm);
    margin-top: auto;
}
.pair-card-servings {
    font-size: 11px;
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
    font-size: 11.5px;
    font-weight: 800;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.1px;
    transition: gap 0.22s ease;
}
.pair-card:hover .pair-card-cta {
    gap: 8px;
}

/* Back to academy */
.lesson-back-wrap {
    text-align: center;
    margin-top: 48px;
}
.lesson-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--earth-brown);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.lesson-back-btn:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.15);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 900px) {
    .lesson-hero { padding: 38px 0 44px; }
    .lesson-main { padding: 32px 0 60px; }
    .lesson-practice-section { padding: 30px 22px 26px; }
    .lesson-practice-grid { grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 14px; }
}
@media (max-width: 640px) {
    .lesson-hero { padding: 32px 0 40px; }
    .lesson-hero-title { font-size: 26px; gap: 8px; }
    .lesson-hero-desc { font-size: 14.5px; }
    .lesson-progress-card { padding: 18px 20px; }
    .btn-toggle-learned { width: 100%; justify-content: center; }
    .lesson-section-box { padding: 22px 20px; border-radius: 20px; }
    .lesson-section-heading { font-size: 19px; }
    .lesson-section-heading .heading-emoji { width: 36px; height: 36px; font-size: 17px; }
    .lesson-mistake-card, .lesson-correction-card { padding: 18px; }
    .lesson-practice-section { padding: 24px 18px 20px; border-radius: 22px; }
    .lesson-practice-header { flex-direction: column; align-items: stretch; }
    .lesson-practice-browse-btn { width: 100%; justify-content: center; }
    .lesson-practice-grid { grid-template-columns: 1fr; gap: 14px; }
    .pair-card-image { height: 160px; }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="lesson-hero">
    <div class="container">
        <div class="lesson-hero-inner">

            <nav class="lesson-breadcrumb" aria-label="Breadcrumb">
                <a href="academy.php">🎓 Master Chef Academy</a>
                <span class="sep">›</span>
                <a href="academy.php?level=<?= urlencode($lesson['level']) ?>"><?= h($lvlInfo['title']) ?></a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);"><?= h($lesson['category']) ?></span>
            </nav>

            <div class="lesson-hero-badges">
                <span class="lesson-level-badge">
                    <?= $lvlInfo['badge'] ?>
                </span>
                <span class="lesson-hero-meta-pill">
                    <span>⏱️</span>
                    <span><?= $lesson['read_time'] ?? 8 ?> min read</span>
                </span>
                <span class="lesson-hero-meta-pill">
                    <span>🍳</span>
                    <span><?= h($lesson['dish_type'] ?? 'Technique') ?></span>
                </span>
            </div>

            <h1 class="lesson-hero-title">
                <span class="lesson-hero-icon"><?= $lesson['icon'] ?></span>
                <span><?= $title ?></span>
            </h1>

            <p class="lesson-hero-desc"><?= h($lesson['summary']) ?></p>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="container lesson-main">
    <div class="lesson-content-wrap">

        <!-- COMPLETION CONTROLLER -->
        <div class="lesson-progress-card">
            <div>
                <div class="lesson-progress-eyebrow">
                    <span>📊</span>
                    <span>Progress Tracking</span>
                </div>
                <div class="lesson-progress-status" id="lessonStatusDisplay">
                    Status: Not yet marked as learned
                </div>
            </div>
            <button type="button" id="btnToggleLearned" class="btn-toggle-learned">
                <span>Mark as Learned</span>
                <span>✓</span>
            </button>
        </div>

        <!-- SECTION 1: UTENSILS & FLAME -->
        <div class="lesson-section-box">
            <h2 class="lesson-section-heading">
                <span class="heading-emoji">🫕</span>
                <span>Required Utensils & Temperature Guidance</span>
            </h2>

            <div class="lesson-dual-grid">
                <div class="lesson-info-tile lesson-info-tile--warm">
                    <div class="lesson-info-tile-title lesson-info-tile-title--warm">
                        <span>🍳</span>
                        <span>Kitchen Utensils Needed</span>
                    </div>
                    <ul class="lesson-utensil-list">
                        <?php foreach ($lesson['required_utensils'] as $ut): ?>
                            <li><?= h($ut) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="lesson-info-tile lesson-info-tile--amber">
                    <div class="lesson-info-tile-title lesson-info-tile-title--amber">
                        <span>🔥</span>
                        <span>Flame & Heat Management</span>
                    </div>
                    <p class="lesson-flame-text">
                        <?= h($lesson['flame_notes'] ?? 'Monitor flame to keep spices from scorching.') ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- SECTION 2: CORE CONCEPTS -->
        <div class="lesson-section-box">
            <h2 class="lesson-section-heading">
                <span class="heading-emoji">💡</span>
                <span>Essential Principles & Technique</span>
            </h2>

            <div class="lesson-concepts-list">
                <?php foreach ($lesson['core_concepts'] as $cIdx => $concept): ?>
                    <div class="concept-item">
                        <div class="concept-bullet"><?= $cIdx + 1 ?></div>
                        <div class="concept-text"><?= h($concept) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SECTION 3: VISUAL INDICATORS -->
        <?php if (!empty($lesson['visual_indicators'])): ?>
            <div class="lesson-section-box lesson-visual-card">
                <h2 class="lesson-section-heading">
                    <span class="heading-emoji">👁️</span>
                    <span>Visual & Sensory Indicators of Readiness</span>
                </h2>
                <p class="lesson-visual-text"><?= h($lesson['visual_indicators']) ?></p>
            </div>
        <?php endif; ?>

        <!-- SECTION 4: MISTAKES & CORRECTIONS -->
        <div class="lesson-section-box">
            <h2 class="lesson-section-heading">
                <span class="heading-emoji">⚠️</span>
                <span>Common Mistakes & Pro Corrections</span>
            </h2>

            <div class="lesson-mistakes-grid">
                <div class="lesson-mistake-card">
                    <div class="lesson-mistake-card-title">
                        <span>❌</span>
                        <span>What Usually Goes Wrong</span>
                    </div>
                    <ul class="lesson-tip-list">
                        <?php foreach ((array)$lesson['common_mistakes'] as $cm): ?>
                            <li><?= h($cm) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="lesson-correction-card">
                    <div class="lesson-correction-card-title">
                        <span>✅</span>
                        <span>How Amma Corrects It</span>
                    </div>
                    <ul class="lesson-tip-list">
                        <?php foreach ((array)$lesson['corrections'] as $cor): ?>
                            <li><?= h($cor) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- SECTION 5: PRACTICE RECIPES (COMPACT) -->
        <?php if (!empty($relatedRecipes)): ?>
            <section class="lesson-practice-section">
                <div class="lesson-practice-header">
                    <div class="lesson-practice-header-text">
                        <div class="lesson-practice-eyebrow">Put Knowledge Into Practice</div>
                        <h2 class="lesson-practice-title">Recommended Practice Recipes</h2>
                    </div>
                    <a href="recipes.php" class="lesson-practice-browse-btn">
                        <span>Browse All Recipes</span>
                        <span>→</span>
                    </a>
                </div>

                <div class="lesson-practice-grid">
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
            </section>
        <?php endif; ?>

        <!-- BACK TO ACADEMY -->
        <div class="lesson-back-wrap">
            <a href="academy.php#lessonsDirectory" class="lesson-back-btn">
                <span>←</span>
                <span>Back to Academy Lessons</span>
            </a>
        </div>

    </div>
</div>

<!-- ============================================================
     PERSISTENCE SCRIPT
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lessonId = <?= json_encode($lesson['id']) ?>;
    const btn = document.getElementById('btnToggleLearned');
    const display = document.getElementById('lessonStatusDisplay');

    function updateLessonUI() {
        if (!window.AmmaStorage) return;
        const learned = window.AmmaStorage.get('amma_learned_lessons', []);
        const isLearned = learned.includes(lessonId);

        if (isLearned) {
            btn.innerHTML = '<span>Marked as Learned</span><span>✓</span>';
            btn.style.background = 'linear-gradient(135deg, #16A34A 0%, #15803D 100%)';
            btn.style.borderColor = '#15803D';
            btn.style.boxShadow = '0 4px 14px rgba(22, 163, 74, 0.32)';
            display.innerHTML = '<span style="color: #15803D; display: inline-flex; align-items: center; gap: 6px;"><span>✓</span> Completed & Stored in Local Progress</span>';
        } else {
            btn.innerHTML = '<span>Mark as Learned</span><span>✓</span>';
            btn.style.background = 'linear-gradient(135deg, #EA580C 0%, #C2410C 100%)';
            btn.style.borderColor = '';
            btn.style.boxShadow = '0 4px 14px rgba(194, 65, 12, 0.32)';
            display.textContent = 'Status: Not yet marked as learned';
        }
    }

    btn.addEventListener('click', function() {
        if (!window.AmmaStorage) return;
        let learned = window.AmmaStorage.get('amma_learned_lessons', []);
        const idx = learned.indexOf(lessonId);
        if (idx > -1) {
            learned.splice(idx, 1);
        } else {
            learned.push(lessonId);
        }
        window.AmmaStorage.set('amma_learned_lessons', learned);
        updateLessonUI();
    });

    updateLessonUI();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>