<?php
// recipes.php - All Recipes Directory with Comprehensive Search, Filters & Sorting
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "All Recipes — Amma's Recipe Book";
$current_page = 'recipes';

// Capture and sanitize query parameters
$query = trim($_GET['q'] ?? '');
$category = trim($_GET['cat'] ?? '');
$type = trim($_GET['type'] ?? '');
$time_filter = trim($_GET['time'] ?? '');
$difficulty = trim($_GET['diff'] ?? '');
$sort = trim($_GET['sort'] ?? 'name_asc');

$filter_param = trim($_GET['filter'] ?? '');
if ($filter_param === 'quick' && $time_filter === '') {
    $time_filter = 'under30';
}

$filteredRecipes = search_and_filter_recipes(
    $recipes,
    $query,
    $category,
    $type,
    $time_filter,
    $difficulty,
    $sort
);

$allCategories = get_categories_with_meta();

include __DIR__ . '/includes/header.php';
?>

<style>
/* ============================================================
   RECIPES PAGE — ENHANCED STYLES
   ============================================================ */

/* ---------- HERO SECTION ---------- */
.recipes-hero {
    position: relative;
    background: linear-gradient(135deg, #7C2D12 0%, #9A3412 35%, #C2410C 70%, #EA580C 100%);
    padding: 56px 0 60px;
    overflow: hidden;
    border-bottom: 4px solid #FDE68A;
}
.recipes-hero::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 320px;
    height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.18) 0%, transparent 70%);
    pointer-events: none;
}
.recipes-hero::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -60px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 243, 199, 0.14) 0%, transparent 70%);
    pointer-events: none;
}

.hero-pattern {
    position: absolute;
    inset: 0;
    background-image:
        radial-gradient(circle at 20% 30%, rgba(253, 230, 138, 0.08) 1px, transparent 1px),
        radial-gradient(circle at 80% 70%, rgba(253, 230, 138, 0.06) 1px, transparent 1px);
    background-size: 40px 40px, 60px 60px;
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: rgba(254, 243, 199, 0.9);
    margin-bottom: 16px;
    padding: 6px 14px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(253, 230, 138, 0.3);
    border-radius: var(--radius-pill);
    backdrop-filter: blur(6px);
}
.hero-breadcrumb a {
    color: #FDE68A;
    font-weight: 600;
}
.hero-breadcrumb a:hover {
    color: #FFF;
    text-decoration: underline;
}
.hero-breadcrumb .sep {
    color: rgba(254, 243, 199, 0.5);
}

.hero-title {
    font-family: var(--font-serif);
    font-size: 42px;
    font-weight: 800;
    color: #FFFBEB;
    line-height: 1.15;
    letter-spacing: -0.8px;
    margin-bottom: 12px;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
}
.hero-title .accent {
    color: #FDE68A;
    font-style: italic;
}

.hero-subtitle {
    color: rgba(254, 243, 199, 0.92);
    font-size: 17px;
    max-width: 680px;
    line-height: 1.6;
    margin-bottom: 8px;
}

.hero-stats {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 22px;
}
.hero-stat {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 18px;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(253, 230, 138, 0.25);
    border-radius: var(--radius-pill);
    backdrop-filter: blur(8px);
}
.hero-stat-emoji {
    font-size: 20px;
}
.hero-stat-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
}
.hero-stat-num {
    font-size: 18px;
    font-weight: 800;
    color: #FFFBEB;
}
.hero-stat-label {
    font-size: 11px;
    color: rgba(254, 243, 199, 0.85);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
}

/* ---------- FILTER PANEL (Lifted into hero overlap) ---------- */
.filter-panel-wrap {
    position: relative;
    z-index: 5;
    margin-top: -38px;
    margin-bottom: 40px;
}
.filter-panel {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: var(--radius-xl);
    box-shadow: 0 16px 40px -8px rgba(69, 26, 3, 0.14), 0 4px 12px rgba(69, 26, 3, 0.05);
    padding: 22px 24px;
    transition: box-shadow 0.3s ease;
}
.filter-panel:focus-within {
    box-shadow: 0 20px 48px -8px rgba(194, 65, 12, 0.18), 0 6px 16px rgba(194, 65, 12, 0.08);
}

.filter-search-row {
    display: flex;
    gap: 12px;
    margin-bottom: 18px;
    flex-wrap: wrap;
    align-items: stretch;
}
.filter-search-wrap {
    flex: 1;
    min-width: 240px;
    position: relative;
}
.filter-search-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    pointer-events: none;
}
.filter-search-input {
    width: 100%;
    height: 50px;
    padding: 10px 16px 10px 46px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 15px;
    color: var(--text-main);
    background: var(--bg-warm);
    outline: none;
    transition: var(--transition);
}
.filter-search-input:focus {
    border-color: var(--primary);
    background: #FFF;
    box-shadow: 0 0 0 4px rgba(194, 65, 12, 0.1);
}
.filter-search-input::placeholder {
    color: var(--text-light);
}
.btn-search-main {
    height: 50px;
    padding: 0 26px;
    border-radius: var(--radius-md);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    font-weight: 700;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.28);
    white-space: nowrap;
}
.btn-search-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(194, 65, 12, 0.38);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}
.btn-reset-main {
    height: 50px;
    padding: 0 20px;
    border-radius: var(--radius-md);
    background: #FFF;
    border: 1.5px solid #FECACA;
    color: #DC2626;
    font-weight: 700;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    white-space: nowrap;
}
.btn-reset-main:hover {
    background: #FEE2E2;
    color: #991B1B;
    transform: translateY(-1px);
}

/* Filter chips row */
.filter-chips-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 12px;
}
.filter-chip-group label {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 11.5px;
    font-weight: 800;
    color: var(--text-muted);
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.7px;
}
.filter-chip-group label::before {
    content: '';
    width: 4px;
    height: 12px;
    background: linear-gradient(180deg, #FBBF24 0%, #F59E0B 100%);
    border-radius: 2px;
}
.filter-select {
    width: 100%;
    height: 42px;
    padding: 0 34px 0 12px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 13.5px;
    font-weight: 600;
    background: #FFF;
    color: var(--text-main);
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23C2410C' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    transition: var(--transition);
}
.filter-select:hover {
    border-color: #FDBA74;
    background-color: #FFFDF9;
}
.filter-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(194, 65, 12, 0.12);
    outline: none;
}

/* ---------- RESULTS HEADER ---------- */
.results-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 16px;
    padding-bottom: 18px;
    border-bottom: 2px dashed var(--border-warm);
}
.results-count {
    display: flex;
    align-items: center;
    gap: 12px;
}
.results-count-num {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 12px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    border-radius: var(--radius-md);
    font-size: 18px;
    font-weight: 800;
    color: #92400E;
    box-shadow: var(--shadow-sm);
}
.results-count-text {
    font-size: 15px;
    color: var(--text-muted);
    font-weight: 500;
}
.results-count-text strong {
    color: var(--earth-brown);
    font-weight: 800;
}

.active-filters {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.filter-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border: 1px solid #FDBA74;
    color: var(--primary);
    font-size: 12px;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    font-weight: 700;
}
.filter-tag-clear {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: rgba(194, 65, 12, 0.15);
    color: var(--primary);
    font-size: 11px;
    font-weight: 800;
    margin-left: 2px;
    transition: var(--transition);
}
.filter-tag-clear:hover {
    background: var(--primary);
    color: #FFF;
}
.clear-all-link {
    font-size: 12.5px;
    color: var(--primary);
    text-decoration: underline;
    font-weight: 700;
    margin-left: 4px;
}
.clear-all-link:hover {
    color: var(--primary-hover);
}

/* ---------- RECIPES GRID ---------- */
.recipes-page-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    gap: 30px;
}

/* ---------- ENHANCED RECIPE CARD ---------- */
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

/* Image area */
.rcard-image {
    position: relative;
    width: 100%;
    height: 210px;
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
    background: linear-gradient(180deg,
        rgba(69, 26, 3, 0) 45%,
        rgba(69, 26, 3, 0.05) 70%,
        rgba(69, 26, 3, 0.55) 100%);
    pointer-events: none;
    z-index: 1;
}
.rcard-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}
.rcard:hover .rcard-img {
    transform: scale(1.1);
}
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
.rcard:hover .rcard-placeholder {
    transform: scale(1.15) rotate(-4deg);
}

/* Badges on image */
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

/* Difficulty badge bottom-left */
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
.rcard-diff--easy {
    background: rgba(220, 252, 231, 0.95);
    color: #047857;
    border: 1px solid #86EFAC;
}
.rcard-diff--medium {
    background: rgba(254, 243, 199, 0.95);
    color: #B45309;
    border: 1px solid #FCD34D;
}
.rcard-diff--hard {
    background: rgba(254, 226, 226, 0.95);
    color: #B91C1C;
    border: 1px solid #FCA5A5;
}

/* Time badge bottom-right */
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

/* Favorite heart */
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

/* Card body */
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
    font-family: var(--font-serif);
    font-size: 19px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.28;
    margin-bottom: 6px;
    letter-spacing: -0.3px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 49px;
}
.rcard-title a {
    color: inherit;
    transition: var(--transition);
}
.rcard-title a:hover {
    color: var(--primary);
}
.rcard-telugu {
    font-size: 13px;
    color: var(--primary);
    font-weight: 700;
    margin-bottom: 8px;
    font-style: italic;
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
.rcard-cta svg {
    transition: transform 0.3s ease;
}
.rcard-cta:hover svg {
    transform: translateX(3px);
}

/* ---------- EMPTY STATE ---------- */
.empty-state {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 2px dashed #FED7AA;
    border-radius: var(--radius-xl);
    padding: 70px 24px;
    text-align: center;
    max-width: 620px;
    margin: 40px auto;
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
}
.empty-state::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.25) 0%, transparent 70%);
}
.empty-emoji {
    font-size: 72px;
    margin-bottom: 20px;
    display: inline-block;
    animation: floatBounce 3s ease-in-out infinite;
}
@keyframes floatBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.empty-title {
    font-family: var(--font-serif);
    font-size: 28px;
    color: var(--earth-brown);
    margin-bottom: 12px;
    font-weight: 800;
}
.empty-text {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.65;
    margin-bottom: 26px;
    max-width: 460px;
    margin-left: auto;
    margin-right: auto;
}
.empty-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 900px) {
    .hero-title { font-size: 34px; }
    .hero-subtitle { font-size: 15px; }
    .recipes-page-grid { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px; }
    .filter-panel { padding: 18px; }
}
@media (max-width: 640px) {
    .recipes-hero { padding: 32px 0 42px; }
    .hero-breadcrumb { font-size: 12px; padding: 4px 10px; margin-bottom: 12px; }
    .hero-title { font-size: 26px; letter-spacing: -0.4px; }
    .hero-subtitle { font-size: 14px; line-height: 1.5; }
    .hero-stats { gap: 8px; margin-top: 16px; }
    .hero-stat { padding: 6px 12px; }
    .hero-stat-emoji { font-size: 16px; }
    .hero-stat-num { font-size: 15px; }
    .hero-stat-label { font-size: 9px; }
    
    .filter-panel-wrap { margin-top: -24px; margin-bottom: 24px; }
    .filter-panel { padding: 16px 14px; border-radius: 16px; }
    .filter-search-row { flex-direction: column; gap: 8px; margin-bottom: 12px; }
    .filter-search-wrap { min-width: 100%; }
    .filter-search-input { height: 44px; font-size: 15px !important; }
    .btn-search-main, .btn-reset-main { width: 100%; height: 44px; justify-content: center; }
    .filter-chips-row { grid-template-columns: 1fr 1fr; gap: 10px; }
    .filter-select { height: 40px; font-size: 13px !important; }

    .results-header { flex-direction: column; align-items: flex-start; gap: 12px; margin-bottom: 20px; }
    .results-count { width: 100%; }
    .results-count-num { min-width: 38px; height: 38px; font-size: 16px; }
    .results-count-text { font-size: 13.5px; }

    .recipes-page-grid { grid-template-columns: 1fr; gap: 18px; }
    .rcard { border-radius: 16px; }
    .rcard-image { height: 190px; }
    .rcard-body { padding: 14px 16px 16px; }
    .rcard-title { font-size: 18px; min-height: unset; margin-bottom: 4px; }
    .rcard-desc { font-size: 12.5px; min-height: unset; margin-bottom: 10px; }
    .rcard-fav { width: 44px; height: 44px; font-size: 20px; } /* 44px touch target */
    .rcard-cta { padding: 8px 14px; font-size: 12px; }
}
@media (max-width: 380px) {
    .filter-chips-row { grid-template-columns: 1fr; }
    .hero-title { font-size: 23px; }
}
</style>

<!-- ============================================================
     HERO SECTION — RICH GRADIENT WITH DECORATIVE ELEMENTS
     ============================================================ -->
<section class="recipes-hero" aria-label="Recipes page header">
    <div class="hero-pattern"></div>
    <div class="container hero-content">

        <!-- Breadcrumb -->
        <nav class="hero-breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">🏠 Home</a>
            <span class="sep">›</span>
            <span style="color: #FFFBEB; font-weight: 700;">All Recipes</span>
            <?php if ($category): ?>
                <span class="sep">›</span>
                <span style="color: #FDE68A; font-weight: 700;"><?= h($category) ?></span>
            <?php endif; ?>
        </nav>

        <!-- Title -->
        <h1 class="hero-title">
            <?php if ($category): ?>
                <?= h($category) ?> <span class="accent">Recipes</span>
            <?php else: ?>
                Discover <span class="accent">Amma's</span> Recipes
            <?php endif; ?>
        </h1>

        <!-- Subtitle -->
        <p class="hero-subtitle">
            <?php if ($category): ?>
                Authentic, homestyle dishes from the <?= h($category) ?> collection — made simple, step-by-step.
            <?php else: ?>
                Browse through <?= count($recipes) ?> complete, easy-to-follow recipes — from everyday staples to festive favourites.
            <?php endif; ?>
        </p>

        <!-- Stats -->
        <div class="hero-stats">
            <div class="hero-stat">
                <span class="hero-stat-emoji">📖</span>
                <div class="hero-stat-text">
                    <span class="hero-stat-num"><?= count($recipes) ?></span>
                    <span class="hero-stat-label">Total Recipes</span>
                </div>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-emoji">🌱</span>
                <div class="hero-stat-text">
                    <span class="hero-stat-num"><?= count(array_filter($recipes, fn($r) => strcasecmp($r['type'] ?? ($r['diet'] ?? ''), 'Vegetarian') === 0)) ?></span>
                    <span class="hero-stat-label">Vegetarian</span>
                </div>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-emoji">⚡</span>
                <div class="hero-stat-text">
                    <span class="hero-stat-num"><?= count(array_filter($recipes, function($r) {
                        $mins = isset($r['time_minutes']) ? (int)$r['time_minutes'] : ((int)($r['prep_time'] ?? 0) + (int)($r['cook_time'] ?? 0));
                        return $mins > 0 && $mins <= 30;
                    })) ?></span>
                    <span class="hero-stat-label">Under 30 Mins</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FILTER PANEL — OVERLAPPING HERO WITH CARD STYLE
     ============================================================ -->
<div class="container filter-panel-wrap">
    <form action="recipes.php" method="GET" id="recipeFilterForm" class="filter-panel" role="search">

        <!-- Search row -->
        <div class="filter-search-row">
            <div class="filter-search-wrap">
                <span class="filter-search-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </span>
                <input
                    type="text"
                    id="filterQuery"
                    name="q"
                    value="<?= h($query) ?>"
                    placeholder="Search by dish name, Telugu name, or ingredient (e.g. Pappu, Ghee, Peanuts)..."
                    class="filter-search-input"
                    aria-label="Search recipes"
                >
            </div>
            <button type="submit" class="btn-search-main">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                Search
            </button>
            <?php if ($query || $category || $type || $time_filter || $difficulty || $sort !== 'name_asc'): ?>
                <a href="recipes.php" class="btn-reset-main" title="Clear all active filters">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Reset
                </a>
            <?php endif; ?>
        </div>

        <!-- Filter chips row -->
        <div class="filter-chips-row">

            <div class="filter-chip-group">
                <label for="selectCat">Category</label>
                <select name="cat" id="selectCat" onchange="this.form.submit()" class="filter-select">
                    <option value="">All Categories (15)</option>
                    <?php foreach ($allCategories as $c): ?>
                        <option value="<?= h($c['name']) ?>" <?= $category === $c['name'] ? 'selected' : '' ?>>
                            <?= $c['icon'] ?> <?= h($c['name']) ?> (<?= $c['count'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-chip-group">
                <label for="selectType">Food Type</label>
                <select name="type" id="selectType" onchange="this.form.submit()" class="filter-select">
                    <option value="">All Diet Types</option>
                    <option value="Vegetarian" <?= $type === 'Vegetarian' ? 'selected' : '' ?>>🌱 Vegetarian Only</option>
                    <option value="Non-Vegetarian" <?= $type === 'Non-Vegetarian' ? 'selected' : '' ?>>🍗 Non-Vegetarian Only</option>
                </select>
            </div>

            <div class="filter-chip-group">
                <label for="selectTime">Cooking Time</label>
                <select name="time" id="selectTime" onchange="this.form.submit()" class="filter-select">
                    <option value="">Any Total Time</option>
                    <option value="under30" <?= $time_filter === 'under30' ? 'selected' : '' ?>>⚡ Under 30 Mins</option>
                    <option value="under45" <?= $time_filter === 'under45' ? 'selected' : '' ?>>⏱️ Under 45 Mins</option>
                </select>
            </div>

            <div class="filter-chip-group">
                <label for="selectDiff">Difficulty</label>
                <select name="diff" id="selectDiff" onchange="this.form.submit()" class="filter-select">
                    <option value="">Any Difficulty</option>
                    <option value="Easy" <?= $difficulty === 'Easy' ? 'selected' : '' ?>>Easy (Beginner)</option>
                    <option value="Medium" <?= $difficulty === 'Medium' ? 'selected' : '' ?>>Medium (Intermediate)</option>
                </select>
            </div>

            <div class="filter-chip-group">
                <label for="selectSort">Sort By</label>
                <select name="sort" id="selectSort" onchange="this.form.submit()" class="filter-select">
                    <option value="name_asc" <?= $sort === 'name_asc' ? 'selected' : '' ?>>Alphabetical (A–Z)</option>
                    <option value="time_asc" <?= $sort === 'time_asc' ? 'selected' : '' ?>>Shortest Cooking Time</option>
                    <option value="difficulty_asc" <?= $sort === 'difficulty_asc' ? 'selected' : '' ?>>Easiest First</option>
                </select>
            </div>

        </div>
    </form>
</div>

<!-- ============================================================
     RESULTS SECTION
     ============================================================ -->
<div class="container" style="padding: 0 24px 70px;">

    <!-- Results Header -->
    <div class="results-header">
        <div class="results-count">
            <span class="results-count-num"><?= count($filteredRecipes) ?></span>
            <div class="results-count-text">
                <?= count($filteredRecipes) === 1 ? 'recipe' : 'recipes' ?> found
                <?php if ($query): ?>
                    for "<strong><?= h($query) ?></strong>"
                <?php endif; ?>
            </div>
        </div>

        <?php if ($query || $category || $type || $time_filter || $difficulty): ?>
            <div class="active-filters">
                <?php if ($category): ?>
                    <span class="filter-tag">
                        📂 <?= h($category) ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['cat' => ''])) ?>" class="filter-tag-clear" title="Remove category filter">✕</a>
                    </span>
                <?php endif; ?>
                <?php if ($type): ?>
                    <span class="filter-tag">
                        <?= $type === 'Vegetarian' ? '🌱' : '🍗' ?> <?= h($type) ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['type' => ''])) ?>" class="filter-tag-clear" title="Remove diet filter">✕</a>
                    </span>
                <?php endif; ?>
                <?php if ($time_filter === 'under30'): ?>
                    <span class="filter-tag">
                        ⚡ Under 30 mins
                        <a href="?<?= http_build_query(array_merge($_GET, ['time' => ''])) ?>" class="filter-tag-clear" title="Remove time filter">✕</a>
                    </span>
                <?php elseif ($time_filter === 'under45'): ?>
                    <span class="filter-tag">
                        ⏱️ Under 45 mins
                        <a href="?<?= http_build_query(array_merge($_GET, ['time' => ''])) ?>" class="filter-tag-clear" title="Remove time filter">✕</a>
                    </span>
                <?php endif; ?>
                <?php if ($difficulty): ?>
                    <span class="filter-tag">
                        🎯 <?= h($difficulty) ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['diff' => ''])) ?>" class="filter-tag-clear" title="Remove difficulty filter">✕</a>
                    </span>
                <?php endif; ?>
                <a href="recipes.php" class="clear-all-link">Clear all</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Recipe Grid -->
    <?php if (!empty($filteredRecipes)): ?>
        <div class="recipes-page-grid">
            <?php foreach ($filteredRecipes as $r):
                $diet = $r['type'] ?? ($r['diet'] ?? 'Vegetarian');
                $isVeg = strcasecmp($diet, 'Vegetarian') === 0;
                $diff = $r['difficulty'] ?? 'Easy';
                $diffClass = 'rcard-diff--' . strtolower($diff);
                $totalCalcTime = (int)($r['prep_time'] ?? 0) + (int)($r['cook_time'] ?? 0);
                $timeMin = isset($r['time_minutes']) ? (int)$r['time_minutes'] : $totalCalcTime;
                $timeDisplay = $timeMin > 0 ? $timeMin . ' min' : '—';
                $category = $r['category'] ?? '';
                $region = $r['cuisine'] ?? ($r['region'] ?? '');
                $telugu = $r['regional_name'] ?? ($r['telugu_name'] ?? '');
                $desc = $r['description'] ?? '';
                $servings = $r['servings'] ?? '';
                $recipeId = $r['id'] ?? '';
                $emoji = $r['icon'] ?? ($r['emoji'] ?? '🍲');
                $image = $r['image'] ?? '';
            ?>
            <article class="rcard">

                <!-- IMAGE AREA -->
                <div class="rcard-image">
                    <?php if (!empty($image) && file_exists(__DIR__ . '/' . $image)): ?>
                        <img src="<?= h($image) ?>" alt="<?= h($r['name'] ?? 'Recipe') ?>" class="rcard-img" loading="lazy">
                    <?php else: ?>
                        <div class="rcard-placeholder"><?= $emoji ?></div>
                    <?php endif; ?>

                    <!-- Top badges -->
                    <div class="rcard-badges-top">
                        <span class="rcard-badge <?= $isVeg ? 'rcard-badge-veg' : 'rcard-badge-nonveg' ?>">
                            <?= $isVeg ? 'Veg' : 'Non-Veg' ?>
                        </span>
                    </div>

                    <!-- Favorite button -->
                    <button
                        type="button"
                        class="rcard-fav js-fav-btn"
                        data-recipe-id="<?= h((string)$recipeId) ?>"
                        data-fav-id="<?= h((string)$recipeId) ?>"
                        aria-label="Save to favorites"
                        title="Save to favorites"
                    >♡</button>

                    <!-- Difficulty (bottom-left) -->
                    <span class="rcard-diff <?= $diffClass ?>"><?= h($diff) ?></span>

                    <!-- Time (bottom-right) -->
                    <span class="rcard-time">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <?= h($timeDisplay) ?>
                    </span>
                </div>

                <!-- BODY -->
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
                            <?= h((string)($servings ?: '2')) ?> servings
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
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- ATTRACTIVE EMPTY STATE -->
        <div class="empty-state">
            <div class="empty-emoji">🔍🍲</div>
            <h2 class="empty-title">No Recipes Found</h2>
            <p class="empty-text">
                We couldn't find any dishes matching your current search or filter criteria. Try searching for common terms like "<strong>pappu</strong>", "<strong>chutney</strong>", "<strong>idli</strong>", or reset the filters below.
            </p>
            <div class="empty-actions">
                <a href="recipes.php" class="btn btn-primary" style="padding: 13px 30px;">
                    🔄 Reset All Filters
                </a>
                <a href="categories.php" class="btn btn-secondary" style="padding: 13px 28px;">
                    📂 Browse Categories
                </a>
            </div>
        </div>
    <?php endif; ?>

</div>

<!-- ============================================================
     FAVORITES SYNC SCRIPT
     ============================================================ -->
<script>
(function() {
    'use strict';
    function syncRecipePageFavs() {
        if (typeof window.updateAmmaFavBadges === 'function') {
            window.updateAmmaFavBadges();
        }
    }
    document.addEventListener('DOMContentLoaded', syncRecipePageFavs);
    window.addEventListener('amma_favorites_updated', syncRecipePageFavs);
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>