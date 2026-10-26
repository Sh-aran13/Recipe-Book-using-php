<?php
// index.php - Homepage for Amma's Recipe Book
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "Amma's Recipe Book — Homestyle Cooking Companion";
$current_page = 'home';

// Get categories with counts
$categories = get_categories_with_meta();

// Feature 1: Today's Special (deterministic daily rotation)
$dayOfYear = (int)date('z');
$specialIndex = $dayOfYear % count($recipes);
$todaysSpecial = $recipes[$specialIndex];

// Feature 2: Popular Recipes (curated)
$popularIds = ['andhra-tomato-pappu', 'soft-idli', 'masala-dosa', 'andhra-chicken-curry', 'hotel-style-sambar', 'punjabi-aloo-paratha'];
$popularRecipes = [];
foreach ($popularIds as $pid) {
    $found = find_recipe_by_id($pid);
    if ($found) $popularRecipes[] = $found;
}

// Feature 3: Quick & Easy Recipes
$quickRecipes = array_filter($recipes, function($r) {
    return (($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0)) <= 30 && ($r['difficulty'] ?? 'Easy') === 'Easy';
});
$quickRecipes = array_slice($quickRecipes, 0, 4);

// Feature 4: Traditional Andhra Specialities
$andhraRecipes = array_filter($recipes, function($r) {
    return ($r['cuisine'] ?? '') === 'Andhra' || ($r['category'] ?? '') === 'Andhra Specialities';
});
$andhraRecipes = array_slice($andhraRecipes, 0, 4);

// Stats for hero
$totalRecipes = count($recipes);
$vegCount = count(array_filter($recipes, fn($r) => ($r['type'] ?? '') === 'Vegetarian'));
$quickCount = count(array_filter($recipes, fn($r) => ((int)($r['prep_time'] ?? 0) + (int)($r['cook_time'] ?? 0)) <= 30));

include __DIR__ . '/includes/header.php';
?>

<style>
/* ============================================================
   HOMEPAGE — ENHANCED STYLES + REFINED TYPOGRAPHY
   ============================================================ */

/* ---------- TYPOGRAPHY SYSTEM ---------- */
.home-serif {
    font-family: 'Playfair Display', 'Georgia', 'Cambria', 'Times New Roman', serif;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    letter-spacing: 0.3px;
    text-transform: none;
    margin-bottom: 10px;
}
.section-eyebrow::before {
    content: '';
    display: inline-block;
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}

.section-heading {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(28px, 3.5vw, 40px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.18;
    letter-spacing: -0.8px;
    margin-bottom: 12px;
    position: relative;
    padding-bottom: 18px;
}
.section-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 64px;
    height: 4px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, transparent 100%);
    border-radius: 3px;
}

.section-subheading {
    color: var(--text-muted);
    font-size: 15.5px;
    line-height: 1.65;
    margin-top: 4px;
    max-width: 620px;
    font-weight: 400;
}

.section-header-wrap {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 36px;
    flex-wrap: wrap;
    gap: 20px;
}

.btn-cta-serif {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 1.5px solid #FCD34D;
    border-radius: var(--radius-pill);
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 700;
    letter-spacing: 0.2px;
    text-decoration: none;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.12);
    white-space: nowrap;
    position: relative;
    overflow: hidden;
}
.btn-cta-serif::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 0;
}
.btn-cta-serif > * {
    position: relative;
    z-index: 1;
}
.btn-cta-serif:hover {
    color: #FFF;
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(194, 65, 12, 0.3);
}
.btn-cta-serif:hover::before {
    opacity: 1;
}
.btn-cta-serif .arrow {
    transition: transform 0.3s ease;
}
.btn-cta-serif:hover .arrow {
    transform: translateX(4px);
}

/* ---------- HOME HERO ---------- */
.home-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 40%, #FEF3C7 70%, #FDE68A 100%);
    padding: 64px 0 76px;
    overflow: hidden;
    border-bottom: 1px solid var(--border-warm);
}
.home-hero::before {
    content: '';
    position: absolute;
    top: -120px;
    right: -120px;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.22) 0%, rgba(254, 243, 199, 0) 70%);
    pointer-events: none;
}
.home-hero::after {
    content: '';
    position: absolute;
    bottom: -140px;
    left: -100px;
    width: 440px;
    height: 440px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(194, 65, 12, 0.14) 0%, rgba(254, 243, 199, 0) 70%);
    pointer-events: none;
}
.hero-dots {
    position: absolute;
    inset: 0;
    background-image:
        radial-gradient(circle at 15% 25%, rgba(217, 119, 6, 0.1) 1.5px, transparent 1.5px),
        radial-gradient(circle at 85% 65%, rgba(194, 65, 12, 0.08) 1.5px, transparent 1.5px);
    background-size: 44px 44px, 64px 64px;
    pointer-events: none;
}
.home-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 860px;
    margin: 0 auto;
    text-align: center;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.92);
    padding: 8px 20px;
    border-radius: var(--radius-pill);
    border: 1.5px solid #FDBA74;
    margin-bottom: 22px;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.1);
    backdrop-filter: blur(8px);
}
.hero-badge-text {
    color: var(--primary);
    font-weight: 800;
    font-size: 12.5px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-heading {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(38px, 5.8vw, 62px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.08;
    margin-bottom: 20px;
    letter-spacing: -1.8px;
}
.hero-heading .accent {
    color: var(--primary);
    font-style: italic;
    font-weight: 700;
    position: relative;
    display: inline-block;
    padding: 0 4px;
}
.hero-heading .accent::after {
    content: '';
    position: absolute;
    bottom: 6px;
    left: 0;
    right: 0;
    height: 10px;
    background: linear-gradient(90deg, rgba(253, 186, 116, 0.6) 0%, rgba(251, 146, 60, 0.35) 100%);
    border-radius: 5px;
    z-index: -1;
}

.hero-lead {
    font-family: var(--font-sans);
    font-size: clamp(15.5px, 1.8vw, 18px);
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 34px;
    max-width: 660px;
    margin-left: auto;
    margin-right: auto;
    font-weight: 400;
}

.hero-search-form {
    max-width: 680px;
    margin: 0 auto 26px;
}
.hero-search-inner {
    display: flex;
    align-items: center;
    background: #FFFFFF;
    border: 2.5px solid var(--primary);
    border-radius: var(--radius-pill);
    padding: 6px 8px 6px 22px;
    box-shadow: 0 12px 32px -8px rgba(194, 65, 12, 0.25);
    transition: box-shadow 0.3s ease;
}
.hero-search-inner:focus-within {
    box-shadow: 0 16px 40px -8px rgba(194, 65, 12, 0.35);
}
.hero-search-input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 16px;
    color: var(--text-main);
    background: transparent;
    padding: 8px 4px;
}
.hero-search-input::placeholder {
    color: var(--text-light);
}
.hero-search-btn {
    padding: 12px 28px;
    font-size: 15px;
    border-radius: var(--radius-pill);
    flex-shrink: 0;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    font-weight: 800;
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.3px;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.3);
}
.hero-search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(194, 65, 12, 0.4);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}

.popular-tags {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    font-size: 13.5px;
    color: var(--text-muted);
    margin-bottom: 30px;
}
.popular-tag {
    background: rgba(255, 255, 255, 0.85);
    padding: 6px 14px;
    border-radius: var(--radius-pill);
    border: 1px solid var(--border-color);
    color: var(--earth-brown);
    font-weight: 600;
    transition: var(--transition);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.popular-tag:hover {
    background: #FFF;
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.12);
}

.hero-stats-row {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-top: 12px;
}
.hero-stat-pill {
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
.hero-stat-pill-emoji { font-size: 22px; }
.hero-stat-pill-text { display: flex; flex-direction: column; line-height: 1.15; text-align: left; }
.hero-stat-pill-num {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.3px;
}
.hero-stat-pill-label {
    font-size: 10.5px;
    font-weight: 700;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

/* ---------- SECTION WRAPPER ---------- */
.home-section { padding: 64px 0; }
.home-section--warm {
    background: linear-gradient(180deg, var(--bg-warm) 0%, #FFFDF9 100%);
    border-top: 1px solid var(--border-warm);
    border-bottom: 1px solid var(--border-warm);
}
.home-section--white {
    background: #FFF;
    border-top: 1px solid var(--border-warm);
}

/* ============================================================
   TODAY'S SPECIAL — NEXT-LEVEL REDESIGN
   ============================================================ */
.special-section-wrapper {
    position: relative;
    padding: 30px 0 40px;
}
.special-banner {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFFFFF 45%, #FFF1EB 75%, #FEF3C7 100%);
    border: 2px solid #FED7AA;
    border-radius: 32px;
    padding: 36px;
    box-shadow:
        0 24px 60px -16px rgba(194, 65, 12, 0.18),
        0 8px 24px -6px rgba(69, 26, 3, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    display: grid;
    grid-template-columns: 1fr 1.15fr;
    gap: 40px;
    align-items: center;
    overflow: hidden;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;
}
.special-banner:hover {
    box-shadow:
        0 32px 72px -16px rgba(194, 65, 12, 0.22),
        0 12px 32px -8px rgba(69, 26, 3, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}
.special-banner::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 320px;
    height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.35) 0%, transparent 70%);
    pointer-events: none;
    animation: floatSlow 12s ease-in-out infinite;
}
.special-banner::after {
    content: '';
    position: absolute;
    bottom: -80px;
    left: -80px;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.2) 0%, transparent 70%);
    pointer-events: none;
    animation: floatSlow 12s ease-in-out infinite reverse;
}
@keyframes floatSlow {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(15px, -15px) scale(1.05); }
}

/* Visual (image/emoji) */
.special-visual {
    position: relative;
    border-radius: 22px;
    height: 360px;
    overflow: hidden;
    border: 3px solid #FFFFFF;
    background: var(--bg-warm);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow:
        0 20px 40px -12px rgba(69, 26, 3, 0.18),
        0 8px 16px -4px rgba(69, 26, 3, 0.08);
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}
.special-banner:hover .special-visual {
    transform: translateY(-4px) scale(1.015);
}
.special-visual-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.special-banner:hover .special-visual-img {
    transform: scale(1.08);
}
.special-visual-emoji {
    font-size: 130px;
    filter: drop-shadow(0 10px 24px rgba(0,0,0,0.18));
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.special-banner:hover .special-visual-emoji {
    transform: scale(1.12) rotate(-5deg);
}
.special-visual::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 35%, transparent 55%, rgba(0,0,0,0.5) 100%);
    pointer-events: none;
    z-index: 1;
}

/* Animated Today's Special badge */
.special-badge-tl {
    position: absolute;
    top: 16px;
    left: 16px;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFF;
    font-size: 11px;
    font-weight: 800;
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    box-shadow:
        0 6px 20px rgba(220, 38, 38, 0.45),
        0 0 0 3px rgba(255, 255, 255, 0.35);
    display: flex;
    align-items: center;
    gap: 7px;
    z-index: 3;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    animation: badgePulse 2.5s ease-in-out infinite;
}
@keyframes badgePulse {
    0%, 100% {
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.45), 0 0 0 3px rgba(255, 255, 255, 0.35);
    }
    50% {
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.65), 0 0 0 5px rgba(255, 255, 255, 0.15);
    }
}
.special-badge-tl span:first-child {
    animation: starTwinkle 2s ease-in-out infinite;
    display: inline-block;
}
@keyframes starTwinkle {
    0%, 100% { transform: scale(1) rotate(0deg); opacity: 1; }
    50% { transform: scale(1.15) rotate(15deg); opacity: 0.9; }
}

/* Category badge bottom-right */
.special-badge-br {
    position: absolute;
    bottom: 16px;
    right: 16px;
    background: rgba(255, 255, 255, 0.98);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 800;
    padding: 7px 16px;
    border-radius: var(--radius-pill);
    color: var(--earth-brown);
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    backdrop-filter: blur(8px);
    z-index: 3;
    letter-spacing: -0.1px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.special-badge-br::before {
    content: '📍';
    font-size: 10px;
}

/* Details */
.special-details {
    position: relative;
    z-index: 2;
}
.special-details-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14px;
    font-weight: 700;
    font-style: italic;
    letter-spacing: 0.4px;
    margin-bottom: 14px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    padding: 7px 16px 7px 14px;
    border-radius: var(--radius-pill);
    border: 1px solid #FCD34D;
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.12);
}
.special-details-eyebrow::before {
    content: '✨';
    font-size: 14px;
    animation: sparkle 2s ease-in-out infinite;
    display: inline-block;
}
@keyframes sparkle {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.2); opacity: 0.8; }
}

/* Next-level title */
.special-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(30px, 3.4vw, 42px);
    font-weight: 800;
    line-height: 1.12;
    margin-bottom: 10px;
    letter-spacing: -1.2px;
    background: linear-gradient(135deg, #451A03 0%, #7C2D12 50%, #C2410C 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
}
.special-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 16px;
    font-style: italic;
    letter-spacing: 0.2px;
    color: var(--primary);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.special-telugu::before {
    content: '';
    width: 22px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.special-desc {
    color: var(--text-muted);
    font-size: 15.5px;
    line-height: 1.75;
    margin-bottom: 24px;
    max-width: 560px;
}

/* Enhanced meta pills */
.special-meta-row {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 28px;
}
.special-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12.5px;
    font-weight: 700;
    color: var(--earth-brown);
    background: #FFFFFF;
    padding: 8px 14px;
    border-radius: var(--radius-pill);
    border: 1.5px solid #FED7AA;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.06);
    transition: all 0.22s ease;
    white-space: nowrap;
}
.special-meta-pill:hover {
    border-color: #FCD34D;
    background: #FFFDF9;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(217, 119, 6, 0.12);
}

/* Diet badge */
.diet-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11.5px;
    font-weight: 800;
    padding: 8px 14px;
    border-radius: var(--radius-pill);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1.5px solid;
    white-space: nowrap;
}
.diet-badge.veg {
    background: #F0FDF4;
    color: #15803D;
    border-color: #BBF7D0;
}
.diet-badge.veg .diet-dot {
    background: #16A34A;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
}
.diet-badge.non-veg {
    background: #FEF2F2;
    color: #B91C1C;
    border-color: #FECACA;
}
.diet-badge.non-veg .diet-dot {
    background: #DC2626;
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
}
.diet-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
}

/* ============================================================
   NEXT-LEVEL CTA BUTTONS
   ============================================================ */
.special-cta-row {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    align-items: center;
}

/* PRIMARY: "Cook Today's Special" */
.btn-special-primary {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 30px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 55%, #9A3412 100%);
    color: #FFFFFF !important;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 15px;
    letter-spacing: 0.3px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    box-shadow:
        0 8px 24px -4px rgba(194, 65, 12, 0.45),
        0 3px 10px -2px rgba(194, 65, 12, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
    isolation: isolate;
}
.btn-special-primary::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #F97316 0%, #EA580C 55%, #C2410C 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}
.btn-special-primary::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.35) 50%, transparent 100%);
    transition: left 0.6s ease;
    z-index: 1;
    pointer-events: none;
}
.btn-special-primary:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow:
        0 14px 32px -6px rgba(194, 65, 12, 0.55),
        0 6px 16px -3px rgba(194, 65, 12, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    color: #FFFFFF !important;
}
.btn-special-primary:hover::before {
    opacity: 1;
}
.btn-special-primary:hover::after {
    left: 100%;
}
.btn-special-primary .btn-icon {
    font-size: 17px;
    line-height: 1;
    transition: transform 0.3s ease;
}
.btn-special-primary:hover .btn-icon {
    transform: scale(1.15) rotate(-8deg);
}
.btn-special-primary .btn-arrow {
    display: inline-block;
    transition: transform 0.3s ease;
    font-size: 16px;
}
.btn-special-primary:hover .btn-arrow {
    transform: translateX(5px);
}

/* SECONDARY: "Browse Full Menu" */
.btn-special-secondary {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 14px 26px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    color: var(--earth-brown) !important;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14.5px;
    letter-spacing: 0.2px;
    text-decoration: none;
    border: 1.5px solid #FCD34D;
    box-shadow: 0 3px 10px rgba(217, 119, 6, 0.12);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
    isolation: isolate;
}
.btn-special-secondary::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    z-index: -1;
    transition: opacity 0.3s ease;
}
.btn-special-secondary:hover {
    border-color: var(--primary);
    color: var(--primary) !important;
    transform: translateY(-3px);
    box-shadow: 0 10px 24px -4px rgba(194, 65, 12, 0.25);
}
.btn-special-secondary:hover::before {
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
}
.btn-special-secondary .btn-icon {
    font-size: 15px;
    line-height: 1;
    transition: transform 0.3s ease;
}
.btn-special-secondary:hover .btn-icon {
    transform: rotate(-12deg) scale(1.1);
}
.btn-special-secondary .btn-arrow {
    display: inline-block;
    transition: transform 0.3s ease;
    font-size: 14px;
    opacity: 0.85;
}
.btn-special-secondary:hover .btn-arrow {
    transform: translateX(4px);
    opacity: 1;
}

/* ---------- RESCUE BANNER ---------- */
.rescue-banner {
    background: linear-gradient(135deg, #FFF1F2 0%, #FFFBEB 55%, #FEF3C7 100%);
    border: 2px solid #FECDD3;
    border-radius: 24px;
    padding: 34px;
    box-shadow: 0 14px 36px -10px rgba(220, 38, 38, 0.12), 0 4px 12px rgba(220, 38, 38, 0.05);
    display: grid;
    grid-template-columns: 1.25fr 1fr;
    gap: 36px;
    align-items: center;
    position: relative;
    overflow: hidden;
}
.rescue-banner::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 205, 211, 0.35) 0%, transparent 70%);
    pointer-events: none;
}
.rescue-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #FFF;
    border: 1px solid #FECACA;
    color: #DC2626;
    padding: 5px 14px;
    border-radius: var(--radius-pill);
    font-size: 11.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 14px;
    box-shadow: 0 2px 8px rgba(220, 38, 38, 0.1);
}
.rescue-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(28px, 3vw, 38px);
    font-weight: 900;
    color: var(--earth-brown);
    margin-bottom: 8px;
    line-height: 1.15;
    letter-spacing: -0.8px;
}
.rescue-title .red {
    color: #DC2626;
    font-style: italic;
    font-weight: 800;
}
.rescue-tagline {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 17px;
    font-weight: 600;
    color: #B45309;
    margin-bottom: 12px;
    font-style: italic;
    letter-spacing: 0.2px;
}
.rescue-desc {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 22px;
}
.rescue-tiles-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    position: relative;
    z-index: 2;
}
.rescue-tile {
    background: #FFF;
    border: 1.5px solid #FED7AA;
    border-radius: 14px;
    padding: 14px;
    text-decoration: none;
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    gap: 5px;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.04);
}
.rescue-tile:hover {
    transform: translateY(-4px);
    border-color: #FDBA74;
    box-shadow: 0 8px 20px rgba(194, 65, 12, 0.15);
}
.rescue-tile-emoji { font-size: 26px; line-height: 1; }
.rescue-tile-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.2px;
}
.rescue-tile-sub {
    font-size: 11.5px;
    color: var(--text-light);
    line-height: 1.3;
}

/* ---------- CATEGORY GRID ---------- */
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
    gap: 18px;
}
.category-tile {
    background: var(--bg-surface);
    border: 1.5px solid var(--border-warm);
    border-radius: 18px;
    padding: 22px 16px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.04);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    text-decoration: none;
    position: relative;
    overflow: hidden;
}
.category-tile::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FCD34D 0%, #FB923C 50%, #C2410C 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.35s ease;
}
.category-tile:hover {
    transform: translateY(-6px);
    border-color: #FDBA74;
    box-shadow: 0 12px 28px -6px rgba(194, 65, 12, 0.18);
}
.category-tile:hover::before {
    transform: scaleX(1);
}
.category-tile-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin-bottom: 14px;
    border: 2px solid #FCD34D;
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.15);
    transition: transform 0.35s ease;
}
.category-tile:hover .category-tile-icon {
    transform: scale(1.12) rotate(-5deg);
}
.category-tile-name {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15.5px;
    font-weight: 700;
    color: var(--earth-brown);
    margin-bottom: 4px;
    line-height: 1.3;
    letter-spacing: -0.2px;
}
.category-tile-count {
    font-size: 12px;
    color: var(--primary);
    font-weight: 700;
}

/* ---------- RECIPE CARDS ---------- */
.recipes-enhanced-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 28px;
}

.rcard {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.35s ease,
                border-color 0.35s ease;
    box-shadow: 0 4px 20px -2px rgba(69, 26, 3, 0.07);
}
.rcard:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 48px -12px rgba(194, 65, 12, 0.22),
                0 8px 20px -4px rgba(69, 26, 3, 0.08);
    border-color: #FDBA74;
}
.rcard-image {
    position: relative;
    width: 100%;
    height: 205px;
    overflow: hidden;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
.rcard-image::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(69,26,3,0) 45%, rgba(69,26,3,0.05) 70%, rgba(69,26,3,0.55) 100%);
    pointer-events: none;
    z-index: 1;
}
.rcard-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}
.rcard:hover .rcard-img { transform: scale(1.1); }
.rcard-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 72px;
    filter: drop-shadow(0 6px 12px rgba(69, 26, 3, 0.15));
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.rcard:hover .rcard-placeholder { transform: scale(1.15) rotate(-4deg); }
.rcard-badges-top {
    position: absolute;
    top: 14px;
    left: 14px;
    display: flex;
    gap: 6px;
    z-index: 3;
}
.rcard-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 800;
    padding: 5px 10px;
    border-radius: var(--radius-pill);
    backdrop-filter: blur(8px);
    letter-spacing: 0.3px;
    text-transform: uppercase;
}
.rcard-badge-veg {
    background: rgba(255, 255, 255, 0.95);
    color: #15803D;
    border: 1.5px solid #BBF7D0;
}
.rcard-badge-veg::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #16A34A;
    box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.2);
}
.rcard-badge-nonveg {
    background: rgba(255, 255, 255, 0.95);
    color: #B91C1C;
    border: 1.5px solid #FECACA;
}
.rcard-badge-nonveg::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #DC2626;
    box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.2);
}
.rcard-diff {
    position: absolute;
    bottom: 14px;
    left: 14px;
    z-index: 3;
    font-size: 11px;
    font-weight: 800;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    backdrop-filter: blur(8px);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.rcard-diff--easy { background: rgba(220, 252, 231, 0.95); color: #047857; border: 1px solid #86EFAC; }
.rcard-diff--medium { background: rgba(254, 243, 199, 0.95); color: #B45309; border: 1px solid #FCD34D; }
.rcard-diff--hard { background: rgba(254, 226, 226, 0.95); color: #B91C1C; border: 1px solid #FCA5A5; }
.rcard-time {
    position: absolute;
    bottom: 14px;
    right: 14px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    font-weight: 800;
    color: #FFF;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    background: rgba(69, 26, 3, 0.85);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
}
.rcard-fav {
    position: absolute;
    top: 14px;
    right: 14px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9CA3AF;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: var(--transition);
    z-index: 4;
    font-size: 18px;
    line-height: 1;
}
.rcard-fav:hover {
    transform: scale(1.15);
    color: #EF4444;
    background: #FFF;
    border-color: #FECACA;
}
.rcard-fav.is-fav {
    color: #EF4444;
    background: #FFF;
    border-color: #FECACA;
    animation: heartPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}
@keyframes heartPop {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); }
    100% { transform: scale(1); }
}
.rcard-body {
    padding: 18px 20px 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.rcard-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 8px;
}
.rcard-cat {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 800;
    color: var(--saffron);
    text-transform: uppercase;
    letter-spacing: 0.7px;
}
.rcard-region {
    font-size: 11.5px;
    color: var(--text-light);
    font-weight: 600;
}
.rcard-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.25;
    margin-bottom: 6px;
    letter-spacing: -0.4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 50px;
}
.rcard-title a {
    color: inherit;
    transition: var(--transition);
}
.rcard-title a:hover { color: var(--primary); }
.rcard-telugu {
    font-size: 13px;
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 600;
    font-style: italic;
    margin-bottom: 8px;
    letter-spacing: 0.1px;
}
.rcard-desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.55;
    margin-bottom: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
    min-height: 40px;
}
.rcard-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px dashed var(--border-warm);
}
.rcard-servings {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12.5px;
    color: var(--text-muted);
    font-weight: 600;
}
.rcard-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 800;
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.2px;
    color: var(--primary);
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border: 1px solid #FED7AA;
    transition: var(--transition);
    text-decoration: none;
}
.rcard-cta:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    border-color: var(--primary);
    transform: translateX(3px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 900px) {
    .special-banner { grid-template-columns: 1fr; padding: 28px; gap: 28px; }
    .special-visual { height: 280px; }
    .special-title { font-size: 28px; }
    .rescue-banner { grid-template-columns: 1fr; padding: 26px; }
    .rescue-title { font-size: 26px; }
    .recipes-enhanced-grid { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 22px; }
    .section-heading { font-size: 30px; }
}
@media (max-width: 640px) {
    .home-hero { padding: 36px 0 46px; }
    .hero-badge { font-size: 11.5px; padding: 6px 14px; margin-bottom: 14px; }
    .hero-heading { font-size: 30px; letter-spacing: -0.6px; margin-bottom: 12px; }
    .hero-lead { font-size: 14.5px; line-height: 1.55; margin-bottom: 22px; }
    
    .hero-search-inner { 
        flex-direction: column; 
        padding: 10px; 
        border-radius: 18px; 
        gap: 8px; 
    }
    .hero-search-inner svg { display: none; }
    .hero-search-input { 
        height: 44px; 
        font-size: 15px !important; 
        padding: 0 12px; 
        width: 100%; 
        border: 1px solid #FED7AA;
        border-radius: 12px;
        background: #FFF;
    }
    .hero-search-btn { 
        width: 100%; 
        padding: 12px; 
        font-size: 14px; 
        border-radius: 12px; 
        justify-content: center; 
    }
    
    .popular-tags { justify-content: center; gap: 6px; margin-top: 14px; }
    .popular-tag { font-size: 12px; padding: 5px 10px; }
    
    .hero-stats-row { gap: 8px; margin-top: 20px; justify-content: center; }
    .hero-stat-pill { padding: 6px 12px; }
    .hero-stat-pill-emoji { font-size: 16px; }
    .hero-stat-pill-num { font-size: 15px; }
    .hero-stat-pill-label { font-size: 9px; }
    
    /* Today's Special Mobile */
    .special-section-wrapper { padding: 20px 0 30px; }
    .special-banner { padding: 20px; border-radius: 24px; gap: 20px; }
    .special-visual { height: 220px; border-radius: 16px; border-width: 2px; }
    .special-visual-emoji { font-size: 84px; }
    .special-title { font-size: 24px; letter-spacing: -0.8px; }
    .special-telugu { font-size: 15px; margin-bottom: 12px; }
    .special-desc { font-size: 13.5px; line-height: 1.6; margin-bottom: 16px; }
    .special-details-eyebrow { font-size: 12px; padding: 5px 12px; margin-bottom: 10px; }
    .special-meta-row { gap: 6px; margin-bottom: 18px; }
    .special-meta-pill { font-size: 11.5px; padding: 6px 11px; }
    .diet-badge { font-size: 10.5px; padding: 6px 11px; }
    
    /* Next-level CTA buttons mobile */
    .special-cta-row { flex-direction: column; align-items: stretch; gap: 10px; }
    .btn-special-primary,
    .btn-special-secondary {
        width: 100%;
        justify-content: center;
        padding: 13px 22px;
        font-size: 14px;
    }
    .btn-special-primary { font-size: 14.5px; }
    
    .rescue-banner { padding: 20px 18px; border-radius: 18px; }
    .rescue-title { font-size: 22px; }
    
    .category-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .category-tile { padding: 16px 10px; border-radius: 14px; }
    .category-tile-icon { width: 48px; height: 48px; font-size: 24px; margin-bottom: 10px; }
    .category-tile-name { font-size: 13.5px; }
    
    .recipes-enhanced-grid { grid-template-columns: 1fr; gap: 18px; }
    .rcard { border-radius: 16px; }
    .rcard-image { height: 190px; }
    .rcard-body { padding: 14px 16px 16px; }
    .rcard-title { font-size: 18px; min-height: unset; margin-bottom: 4px; }
    .rcard-desc { font-size: 12.5px; min-height: unset; margin-bottom: 10px; }
    .rcard-fav { width: 44px; height: 44px; font-size: 20px; }
    .rcard-cta { padding: 8px 14px; font-size: 12px; }
    
    .rescue-tiles-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
    .section-header-wrap { margin-bottom: 22px; }
    .section-heading { font-size: 24px; padding-bottom: 14px; }
    .section-heading::after { width: 44px; height: 3px; }
    .btn-cta-serif { padding: 9px 16px; font-size: 13px; }
}
@media (max-width: 380px) {
    .hero-heading { font-size: 25px; }
    .category-grid { grid-template-columns: 1fr; }
    .rescue-tiles-grid { grid-template-columns: 1fr; }
    .special-visual { height: 180px; }
    .special-title { font-size: 22px; }
}
</style>

<!-- Load Playfair Display from Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800&display=swap" rel="stylesheet">

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="home-hero" aria-label="Welcome section">
    <div class="hero-dots"></div>
    <div class="container">
        <div class="home-hero-inner">

            <div class="hero-badge">
                <span style="font-size: 18px;">👵</span>
                <span class="hero-badge-text">Amma's Personal Digital Kitchen</span>
            </div>

            <h1 class="hero-heading">
                What shall we <span class="accent">cook</span> today?
            </h1>

            <p class="hero-lead">
                Simple ingredients. Easy steps. Delicious homemade food. Designed specially for you to cook everyday family favorites with confidence.
            </p>

            <form action="recipes.php" method="GET" class="hero-search-form" role="search">
                <div class="hero-search-inner">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C2410C" stroke-width="2.5" style="margin-right: 12px; flex-shrink: 0;">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input
                        type="text"
                        name="q"
                        class="hero-search-input"
                        placeholder="Search for a dish, ingredient, or recipe (e.g. Idli, Tomato Pappu, Chicken)..."
                        aria-label="Search recipes"
                    >
                    <button type="submit" class="hero-search-btn">
                        Find Recipe
                    </button>
                </div>
            </form>

            <div class="popular-tags">
                <span style="font-weight: 700;">Popular:</span>
                <a href="recipes.php?q=Dosa" class="popular-tag">🥞 Dosa</a>
                <a href="recipes.php?q=Pappu" class="popular-tag">🥣 Andhra Pappu</a>
                <a href="recipes.php?q=Biryani" class="popular-tag">🍗 Dum Biryani</a>
                <a href="recipes.php?q=Chutney" class="popular-tag">🥥 Chutneys</a>
                <a href="recipes.php?q=Payasam" class="popular-tag">🍨 Payasam</a>
            </div>

            <div class="hero-stats-row">
                <div class="hero-stat-pill">
                    <span class="hero-stat-pill-emoji">📖</span>
                    <div class="hero-stat-pill-text">
                        <span class="hero-stat-pill-num"><?= $totalRecipes ?></span>
                        <span class="hero-stat-pill-label">Recipes</span>
                    </div>
                </div>
                <div class="hero-stat-pill">
                    <span class="hero-stat-pill-emoji">🌱</span>
                    <div class="hero-stat-pill-text">
                        <span class="hero-stat-pill-num"><?= $vegCount ?></span>
                        <span class="hero-stat-pill-label">Vegetarian</span>
                    </div>
                </div>
                <div class="hero-stat-pill">
                    <span class="hero-stat-pill-emoji">⚡</span>
                    <div class="hero-stat-pill-text">
                        <span class="hero-stat-pill-num"><?= $quickCount ?></span>
                        <span class="hero-stat-pill-label">Under 30 Mins</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 1: TODAY'S SPECIAL (NEXT-LEVEL DESIGN)
     ============================================================ -->
<section class="home-section special-section-wrapper" style="padding-top: 30px; padding-bottom: 30px;" aria-label="Today's special">
    <div class="container">
        <div class="special-banner">

            <!-- Visual -->
            <div class="special-visual">
                <?php if (!empty($todaysSpecial['image']) && file_exists(__DIR__ . '/' . ltrim($todaysSpecial['image'], '/'))): ?>
                    <img src="<?= h($todaysSpecial['image']) ?>" alt="<?= h($todaysSpecial['name']) ?>" class="special-visual-img">
                <?php else: ?>
                    <span class="special-visual-emoji"><?= $todaysSpecial['icon'] ?? '🍲' ?></span>
                <?php endif; ?>

                <div class="special-badge-tl">
                    <span>⭐</span> Today's Special
                </div>
                <span class="special-badge-br"><?= h($todaysSpecial['category'] ?? '') ?></span>
            </div>

            <!-- Details -->
            <div class="special-details">
                <div class="special-details-eyebrow">Fresh Daily Pick</div>
                <h2 class="special-title"><?= h($todaysSpecial['name']) ?></h2>
                <?php if (!empty($todaysSpecial['regional_name'])): ?>
                    <p class="special-telugu"><?= h($todaysSpecial['regional_name']) ?></p>
                <?php endif; ?>
                <p class="special-desc"><?= h($todaysSpecial['description']) ?></p>

                <div class="special-meta-row">
                    <span class="special-meta-pill">
                        ⏱️ <?= (int)$todaysSpecial['prep_time'] + (int)$todaysSpecial['cook_time'] ?> mins
                    </span>
                    <span class="special-meta-pill">
                        👥 <?= (int)$todaysSpecial['servings'] ?> Servings
                    </span>
                    <span class="special-meta-pill">
                        📊 <?= h($todaysSpecial['difficulty']) ?>
                    </span>
                    <span class="diet-badge <?= strtolower($todaysSpecial['type'] ?? '') === 'vegetarian' ? 'veg' : 'non-veg' ?>">
                        <span class="diet-dot"></span> <?= h($todaysSpecial['type']) ?>
                    </span>
                </div>

                <div class="special-cta-row">
                    <a href="recipe.php?id=<?= urlencode($todaysSpecial['id']) ?>" class="btn-special-primary">
                        <span class="btn-icon">🍳</span>
                        <span>Cook Today's Special</span>
                        <span class="btn-arrow">→</span>
                    </a>
                    <a href="recipes.php" class="btn-special-secondary">
                        <span class="btn-icon">📖</span>
                        <span>Browse Full Menu</span>
                        <span class="btn-arrow">→</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 1B: RECIPE RESCUE BANNER
     ============================================================ -->
<section class="home-section" style="padding: 20px 0 40px;" aria-label="Recipe rescue assistant">
    <div class="container">
        <div class="rescue-banner">
            <div>
                <div class="rescue-eyebrow"><span>🛟</span> New Feature</div>
                <h2 class="rescue-title">Recipe Rescue <span class="red">Assistant</span></h2>
                <div class="rescue-tagline">"Every Cooking Mistake Has a Solution!"</div>
                <p class="rescue-desc">
                    Something went wrong while cooking? Whether your curry is too salty, rice came out mushy, chapatis turned hard, or dosa is sticking to the pan — get instant recovery steps and learn the cooking science.
                </p>
                <div class="special-cta-row">
                    <a href="recipe-rescue.php" class="btn" style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%); color: #FFF; font-weight: 800; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); padding: 12px 26px;">
                        <span>⚡</span> Fix My Dish Now
                    </a>
                    <a href="recipe-rescue.php#browseProblems" class="btn btn-secondary" style="border-color: #FECACA; color: #991B1B;">
                        <span>📋</span> Browse 50+ Solutions
                    </a>
                </div>
            </div>

            <div class="rescue-tiles-grid">
                <a href="recipe-rescue.php?problem=curry-too-salty#problemDetailView" class="rescue-tile">
                    <span class="rescue-tile-emoji">🧂</span>
                    <strong class="rescue-tile-title">Too Salty?</strong>
                    <span class="rescue-tile-sub">How to dilute & balance</span>
                </a>
                <a href="recipe-rescue.php?problem=rice-too-mushy#problemDetailView" class="rescue-tile">
                    <span class="rescue-tile-emoji">🍚</span>
                    <strong class="rescue-tile-title">Mushy Rice?</strong>
                    <span class="rescue-tile-sub">Baking sheet steam-off</span>
                </a>
                <a href="recipe-rescue.php?problem=chapati-too-hard#problemDetailView" class="rescue-tile">
                    <span class="rescue-tile-emoji">🫓</span>
                    <strong class="rescue-tile-title">Hard Chapati?</strong>
                    <span class="rescue-tile-sub">Damp cloth & hydration</span>
                </a>
                <a href="recipe-rescue.php?problem=dosa-sticking-to-pan#problemDetailView" class="rescue-tile">
                    <span class="rescue-tile-emoji">🥞</span>
                    <strong class="rescue-tile-title">Dosa Sticking?</strong>
                    <span class="rescue-tile-sub">Onion seasoning trick</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 2: CATEGORIES
     ============================================================ -->
<section class="home-section home-section--warm" aria-label="Recipe categories">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Explore By Category</span>
                <h2 class="section-heading">Browse Recipes by Course & Cuisine</h2>
                <p class="section-subheading">From morning tiffins to Andhra feasts and festive sweets, find exactly what Amma wants to make.</p>
            </div>
            <a href="categories.php" class="btn-cta-serif">
                <span>View All 15 Categories</span>
                <span class="arrow">→</span>
            </a>
        </div>

        <div class="category-grid">
            <?php foreach (array_slice($categories, 0, 10) as $cat): ?>
                <a href="recipes.php?cat=<?= urlencode($cat['name']) ?>" class="category-tile">
                    <div class="category-tile-icon"><?= $cat['icon'] ?></div>
                    <h3 class="category-tile-name"><?= h($cat['name']) ?></h3>
                    <span class="category-tile-count"><?= $cat['count'] ?> recipes</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 3: POPULAR RECIPES
     ============================================================ -->
<section class="home-section" aria-label="Popular recipes">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">All-Time Comforts</span>
                <h2 class="section-heading">Most Popular Recipes</h2>
                <p class="section-subheading">Timeless homestyle dishes that make every meal feel like a warm hug.</p>
            </div>
            <a href="recipes.php" class="btn-cta-serif">
                <span>View All Recipes (<?= $totalRecipes ?>)</span>
                <span class="arrow">→</span>
            </a>
        </div>

        <div class="recipes-enhanced-grid">
            <?php foreach ($popularRecipes as $r): ?>
                <?php render_enhanced_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 4: ANDHRA SPECIALITIES
     ============================================================ -->
<section class="home-section home-section--warm" aria-label="Andhra specialities">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Homeland Flavors</span>
                <h2 class="section-heading">Traditional Andhra Specialities</h2>
                <p class="section-subheading">Authentic Telugu recipes made with rich roasted spices, tangy tamarind, garlic, and pure desi ghee.</p>
            </div>
            <a href="recipes.php?cat=Andhra+Specialities" class="btn-cta-serif">
                <span>Explore Andhra Dishes</span>
                <span class="arrow">→</span>
            </a>
        </div>

        <div class="recipes-enhanced-grid">
            <?php foreach ($andhraRecipes as $r): ?>
                <?php render_enhanced_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 5: QUICK & EASY
     ============================================================ -->
<section class="home-section home-section--white" aria-label="Quick and easy recipes">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Busy Weekdays</span>
                <h2 class="section-heading">Quick & Easy (Under 30 Mins)</h2>
                <p class="section-subheading">Speedy, fuss-free meals when you want something fresh, hot, and delicious in a jiffy.</p>
            </div>
            <a href="recipes.php?filter=quick" class="btn-cta-serif">
                <span>See All Quick Recipes</span>
                <span class="arrow">→</span>
            </a>
        </div>

        <div class="recipes-enhanced-grid">
            <?php foreach ($quickRecipes as $r): ?>
                <?php render_enhanced_recipe_card($r); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 6: RECENTLY VIEWED
     ============================================================ -->
<section id="recentRecipesSection" class="home-section home-section--warm" style="display: none;" aria-label="Recently viewed recipes">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Your Cooking History</span>
                <h2 class="section-heading">Recently Viewed Recipes</h2>
                <p class="section-subheading">Pick up right where you left off on this device.</p>
            </div>
            <button type="button" id="btnClearRecents" class="btn-cta-serif" style="cursor: pointer;">
                <span>Clear History</span>
                <span class="arrow">✕</span>
            </button>
        </div>

        <div class="recipes-enhanced-grid" id="recentRecipesGrid"></div>
    </div>
</section>

<?php
/**
 * Helper renderer for enhanced recipe cards on homepage.
 */
function render_enhanced_recipe_card(array $r): void {
    $isVeg = strtolower($r['type'] ?? 'Vegetarian') === 'vegetarian';
    $diff = $r['difficulty'] ?? 'Easy';
    $diffClass = 'rcard-diff--' . strtolower($diff);
    $totalTime = (int)($r['prep_time'] ?? 0) + (int)($r['cook_time'] ?? 0);
    $category = $r['category'] ?? '';
    $region = $r['cuisine'] ?? ($r['region'] ?? '');
    $telugu = $r['regional_name'] ?? ($r['telugu_name'] ?? '');
    $desc = $r['description'] ?? '';
    $servings = $r['servings'] ?? 2;
    $recipeId = $r['id'] ?? '';
    $emoji = $r['icon'] ?? ($r['emoji'] ?? '🍲');
    $image = $r['image'] ?? '';
    $imageExists = !empty($image) && file_exists(__DIR__ . '/' . ltrim($image, '/'));
    ?>
    <article class="rcard">
        <div class="rcard-image">
            <?php if ($imageExists): ?>
                <img src="<?= h($image) ?>" alt="<?= h($r['name'] ?? 'Recipe') ?>" class="rcard-img" loading="lazy">
            <?php else: ?>
                <div class="rcard-placeholder"><?= $emoji ?></div>
            <?php endif; ?>

            <div class="rcard-badges-top">
                <span class="rcard-badge <?= $isVeg ? 'rcard-badge-veg' : 'rcard-badge-nonveg' ?>">
                    <?= $isVeg ? 'Veg' : 'Non-Veg' ?>
                </span>
            </div>

            <button type="button" class="rcard-fav js-fav-btn" data-recipe-id="<?= h((string)$recipeId) ?>" aria-label="Save to favorites" title="Save to favorites">♡</button>

            <span class="rcard-diff <?= $diffClass ?>"><?= h($diff) ?></span>

            <span class="rcard-time">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <?= $totalTime ?> min
            </span>
        </div>

        <div class="rcard-body">
            <div class="rcard-meta">
                <span class="rcard-cat">🍽️ <?= h($category) ?></span>
                <?php if ($region): ?>
                    <span class="rcard-region"><?= h($region) ?></span>
                <?php endif; ?>
            </div>

            <h3 class="rcard-title">
                <a href="recipe.php?id=<?= h((string)$recipeId) ?>"><?= h($r['name'] ?? 'Untitled') ?></a>
            </h3>

            <?php if ($telugu): ?>
                <div class="rcard-telugu"><?= h($telugu) ?></div>
            <?php endif; ?>

            <?php if ($desc): ?>
                <p class="rcard-desc"><?= h($desc) ?></p>
            <?php endif; ?>

            <div class="rcard-footer">
                <span class="rcard-servings">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <?= h((string)$servings) ?> servings
                </span>
                <a href="recipe.php?id=<?= h((string)$recipeId) ?>" class="rcard-cta">
                    View Recipe
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </article>
    <?php
}
?>

<!-- ============================================================
     RECENTLY VIEWED + FAVORITES SCRIPT
     ============================================================ -->
<script>
(function() {
    'use strict';
    const PRIMARY_KEY = 'amma_fav_recipes';
    const LEGACY_KEY = 'amma_favorites';
    const RECENT_KEY = 'amma_recent_recipes';

    function getFavs() {
        if (window.AmmaStorage) {
            let favs = window.AmmaStorage.get(PRIMARY_KEY, null);
            if (!favs || !Array.isArray(favs)) {
                favs = window.AmmaStorage.get(LEGACY_KEY, []);
                if (favs.length > 0) {
                    window.AmmaStorage.set(PRIMARY_KEY, favs);
                }
            }
            return favs.map(String);
        }
        try {
            const raw = localStorage.getItem(PRIMARY_KEY) || localStorage.getItem(LEGACY_KEY);
            return raw ? JSON.parse(raw).map(String) : [];
        } catch (e) { return []; }
    }
    function saveFavs(arr) {
        const unique = Array.from(new Set(arr.map(String)));
        if (window.AmmaStorage) {
            window.AmmaStorage.set(PRIMARY_KEY, unique);
            window.AmmaStorage.set(LEGACY_KEY, unique);
        } else {
            try {
                localStorage.setItem(PRIMARY_KEY, JSON.stringify(unique));
                localStorage.setItem(LEGACY_KEY, JSON.stringify(unique));
            } catch (e) {}
        }
        window.dispatchEvent(new CustomEvent('amma_favorites_updated', { detail: { favorites: unique } }));
    }
    function updateBadges() {
        if (typeof window.updateAmmaFavBadges === 'function') {
            window.updateAmmaFavBadges();
            return;
        }
        const count = getFavs().length;
        ['headerFavBadge', 'sidebarFavBadge'].forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            if (count > 0) { el.textContent = count; el.style.display = 'inline-flex'; }
            else { el.style.display = 'none'; }
        });
    }
    function syncFavButtons(root) {
        if (typeof window.updateAmmaFavBadges === 'function') {
            window.updateAmmaFavBadges();
            return;
        }
        const favs = getFavs().map(String);
        (root || document).querySelectorAll('.js-fav-btn, [data-fav-id]').forEach(btn => {
            const id = String(btn.dataset.recipeId || btn.getAttribute('data-fav-id') || '');
            if (favs.includes(id)) {
                btn.classList.add('is-fav');
                btn.innerHTML = '♥';
                btn.setAttribute('aria-label', 'Remove from favorites');
            } else {
                btn.classList.remove('is-fav');
                btn.innerHTML = '♡';
                btn.setAttribute('aria-label', 'Save to favorites');
            }
        });
    }

    function renderRecents() {
        const storage = window.AmmaStorage;
        const recents = storage ? storage.get(RECENT_KEY, []) : [];
        const grid = document.getElementById('recentRecipesGrid');
        const section = document.getElementById('recentRecipesSection');
        if (!grid || !section) return;

        if (!recents || recents.length === 0) {
            section.style.display = 'none';
            return;
        }

        const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
        const recipeMap = {};
        allRecipesData.forEach(r => { recipeMap[r.id] = r; });

        const validRecents = recents.filter(id => !!recipeMap[id]).slice(0, 4);
        if (validRecents.length === 0) {
            section.style.display = 'none';
            return;
        }

        grid.innerHTML = '';
        validRecents.forEach(id => {
            const r = recipeMap[id];
            const isVeg = (r.type || '').toLowerCase() === 'vegetarian';
            const totalTime = (parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0);
            const diff = (r.difficulty || 'Easy');
            const diffClass = 'rcard-diff--' + diff.toLowerCase();
            const telugu = r.regional_name || r.telugu_name || '';
            const region = r.cuisine || r.region || '';
            const hasImg = !!r.image;

            const imgHtml = hasImg
                ? `<img src="${r.image}" alt="${r.name}" class="rcard-img" loading="lazy">`
                : `<div class="rcard-placeholder">${r.icon || '🍲'}</div>`;

            const card = document.createElement('article');
            card.className = 'rcard';
            card.innerHTML = `
                <div class="rcard-image">
                    ${imgHtml}
                    <div class="rcard-badges-top">
                        <span class="rcard-badge ${isVeg ? 'rcard-badge-veg' : 'rcard-badge-nonveg'}">${isVeg ? 'Veg' : 'Non-Veg'}</span>
                    </div>
                    <button type="button" class="rcard-fav js-fav-btn" data-recipe-id="${r.id}" aria-label="Save to favorites">♡</button>
                    <span class="rcard-diff ${diffClass}">${diff}</span>
                    <span class="rcard-time">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        ${totalTime} min
                    </span>
                </div>
                <div class="rcard-body">
                    <div class="rcard-meta">
                        <span class="rcard-cat">🍽️ ${r.category || ''}</span>
                        ${region ? `<span class="rcard-region">${region}</span>` : ''}
                    </div>
                    <h3 class="rcard-title">
                        <a href="recipe.php?id=${encodeURIComponent(r.id)}">${r.name}</a>
                    </h3>
                    ${telugu ? `<div class="rcard-telugu">${telugu}</div>` : ''}
                    ${r.description ? `<p class="rcard-desc">${r.description}</p>` : ''}
                    <div class="rcard-footer">
                        <span class="rcard-servings">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                            </svg>
                            ${r.servings || 4} servings
                        </span>
                        <a href="recipe.php?id=${encodeURIComponent(r.id)}" class="rcard-cta">
                            View Recipe
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            `;
            grid.appendChild(card);
        });

        section.style.display = 'block';
        syncFavButtons(grid);

        const clearBtn = document.getElementById('btnClearRecents');
        if (clearBtn) {
            clearBtn.onclick = function() {
                if (window.AmmaStorage) window.AmmaStorage.set(RECENT_KEY, []);
                section.style.display = 'none';
            };
        }
    }

    function init() {
        syncFavButtons();
        updateBadges();
        renderRecents();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    window.addEventListener('load', renderRecents);
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>