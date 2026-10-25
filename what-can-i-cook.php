<?php
// what-can-i-cook.php - Transparent Ingredient-Based Recipe Discovery Engine
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "What Can I Cook? — Amma's Pantry Discovery Engine";
$current_page = 'what_can_i_cook';

// Comprehensive catalog of common household ingredients
$pantryCategories = [
    'Staples & Grains' => [
        'Rice', 'Basmati Rice', 'Poha (Flattened rice)', 'Rava / Sooji', 'Whole Wheat Flour (Atta)',
        'All-Purpose Flour (Maida)', 'Vermicelli (Semiya)', 'Bread'
    ],
    'Lentils & Pulses' => [
        'Toor Dal', 'Moong Dal', 'Urad Dal', 'Chana Dal', 'Chickpeas (Chana)', 'Rajma (Kidney beans)'
    ],
    'Vegetables' => [
        'Onions', 'Tomatoes', 'Potatoes', 'Green Chillies', 'Ginger', 'Garlic', 'Carrots',
        'Green Beans', 'Green Peas', 'Capsicum (Bell Pepper)', 'Brinjal (Eggplant)', 'Okra (Ladyfinger)',
        'Spinach (Palak)', 'Cabbage', 'Cauliflower', 'Curry Leaves', 'Coriander Leaves'
    ],
    'Dairy & Proteins' => [
        'Milk', 'Curd / Yogurt', 'Paneer', 'Butter', 'Desi Ghee', 'Chicken', 'Eggs', 'Fresh Coconut'
    ],
    'Spices & Pantry' => [
        'Mustard Seeds', 'Cumin Seeds', 'Turmeric Powder', 'Red Chilli Powder', 'Coriander Powder',
        'Garam Masala', 'Asafoetida (Hing)', 'Tamarind', 'Lemon', 'Kasuri Methi', 'Peanuts', 'Cashews'
    ]
];

// Category icons
$categoryIcons = [
    'Staples & Grains' => '🌾',
    'Lentils & Pulses' => '🫘',
    'Vegetables' => '🥬',
    'Dairy & Proteins' => '🥛',
    'Spices & Pantry' => '🌶️',
];

// Capture submitted ingredients from GET
$selectedIngredients = $_GET['ingredients'] ?? [];
if (!is_array($selectedIngredients)) {
    $selectedIngredients = array_filter(array_map('trim', explode(',', (string)$selectedIngredients)));
}
$selectedIngredients = array_map('trim', $selectedIngredients);
$selectedIngredients = array_filter($selectedIngredients);

// Filters
$typeFilter = trim($_GET['type'] ?? 'all');
$maxTime = (int)($_GET['time'] ?? 0);
$diffFilter = trim($_GET['diff'] ?? 'all');

/**
 * Transparent match calculation
 */
$matches = [];
if (!empty($selectedIngredients)) {
    $selectedNorm = array_map('strtolower', $selectedIngredients);

    foreach ($recipes as $r) {
        if ($typeFilter !== 'all' && strcasecmp($r['type'] ?? '', $typeFilter) !== 0) {
            continue;
        }
        $totalTime = ($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0);
        if ($maxTime > 0 && $totalTime > $maxTime) {
            continue;
        }
        if ($diffFilter !== 'all' && strcasecmp($r['difficulty'] ?? '', $diffFilter) !== 0) {
            continue;
        }

        $ingList = $r['ingredients'] ?? [];
        if (empty($ingList)) continue;

        $totalRequired = 0;
        $matchedCount = 0;
        $availableList = [];
        $missingList = [];

        foreach ($ingList as $ing) {
            $rawName = $ing['name'] ?? '';
            if (empty($rawName)) continue;

            $low = strtolower($rawName);
            if (str_contains($low, 'water') || $low === 'salt' || str_contains($low, 'salt (')) {
                continue;
            }

            $totalRequired++;
            $foundMatch = false;

            foreach ($selectedNorm as $sel) {
                if (str_contains($low, $sel) || str_contains($sel, $low)) {
                    $foundMatch = true;
                    break;
                }
            }

            if ($foundMatch) {
                $matchedCount++;
                $availableList[] = $rawName;
            } else {
                $missingList[] = $rawName;
            }
        }

        if ($totalRequired === 0) continue;

        $matchPct = (int)round(($matchedCount / $totalRequired) * 100);

        if ($matchPct >= 15) {
            $matches[] = [
                'recipe' => $r,
                'match_pct' => $matchPct,
                'matched_count' => $matchedCount,
                'total_required' => $totalRequired,
                'available' => $availableList,
                'missing' => $missingList
            ];
        }
    }

    usort($matches, function($a, $b) {
        if ($b['match_pct'] !== $a['match_pct']) {
            return $b['match_pct'] <=> $a['match_pct'];
        }
        $tA = ($a['recipe']['prep_time'] ?? 0) + ($a['recipe']['cook_time'] ?? 0);
        $tB = ($b['recipe']['prep_time'] ?? 0) + ($b['recipe']['cook_time'] ?? 0);
        return $tA <=> $tB;
    });
}

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     PANTRY DISCOVERY — REDESIGNED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.pantry-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 50px 0 60px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.pantry-hero::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 340px;
    height: 340px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 146, 60, 0.2) 0%, transparent 70%);
    pointer-events: none;
}
.pantry-hero::after {
    content: '';
    position: absolute;
    bottom: -120px;
    left: -100px;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(194, 65, 12, 0.1) 0%, transparent 70%);
    pointer-events: none;
}
.pantry-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 820px;
}
.pantry-breadcrumb {
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
.pantry-breadcrumb a {
    color: var(--primary);
    font-weight: 600;
}
.pantry-breadcrumb a:hover {
    text-decoration: underline;
}
.pantry-breadcrumb .sep {
    color: #A8A29E;
}
.pantry-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(30px, 4.5vw, 46px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.12;
    letter-spacing: -1px;
    margin-bottom: 14px;
}
.pantry-hero-title .accent {
    color: var(--primary);
    font-style: italic;
}
.pantry-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 660px;
}

/* ---------- MAIN LAYOUT ---------- */
.pantry-layout {
    display: grid;
    grid-template-columns: 360px 1fr;
    gap: 32px;
    align-items: start;
    margin: 40px 0 60px;
}

/* ---------- SIDEBAR ---------- */
.pantry-sidebar {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 0;
    box-shadow:
        0 12px 32px -10px rgba(69, 26, 3, 0.1),
        0 4px 12px rgba(69, 26, 3, 0.04);
    position: sticky;
    top: 100px;
    max-height: calc(100vh - 120px);
    overflow-y: auto;
    overflow-x: hidden;
}
.pantry-sidebar::-webkit-scrollbar {
    width: 6px;
}
.pantry-sidebar::-webkit-scrollbar-thumb {
    background: #FED7AA;
    border-radius: 10px;
}

/* Sidebar header with gradient */
.pantry-sidebar-header {
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border-bottom: 1.5px solid #FDE68A;
    padding: 20px 22px;
    position: sticky;
    top: 0;
    z-index: 5;
}
.pantry-sidebar-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--earth-brown);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    letter-spacing: -0.3px;
}
.pantry-reset-btn {
    background: #FFFFFF;
    border: 1px solid #FCD34D;
    color: var(--primary);
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    cursor: pointer;
    transition: all 0.22s ease;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}
.pantry-reset-btn:hover {
    background: var(--primary);
    color: #FFF;
    border-color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(194, 65, 12, 0.28);
}

.pantry-sidebar-body {
    padding: 20px 22px;
}

/* Quick shortcut buttons */
.pantry-quick-row {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    margin-bottom: 18px;
}
.pantry-quick-btn {
    background: #FFF8EE;
    border: 1px solid #FDE68A;
    color: #B45309;
    font-size: 11.5px;
    font-weight: 700;
    padding: 6px 12px;
    border-radius: var(--radius-pill);
    cursor: pointer;
    transition: all 0.22s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.pantry-quick-btn:hover {
    background: #FEF3C7;
    border-color: #FCD34D;
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(217, 119, 6, 0.15);
}

/* Filter block */
.pantry-filter-block {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    padding: 14px;
    margin-bottom: 20px;
}
.pantry-filter-label {
    font-size: 11px;
    font-weight: 800;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}
.pantry-select {
    width: 100%;
    height: 38px;
    border: 1.5px solid var(--border-color);
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-main);
    background: #FFFFFF;
    padding: 0 32px 0 12px;
    cursor: pointer;
    transition: all 0.22s ease;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23C2410C' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    margin-bottom: 8px;
}
.pantry-select:last-child {
    margin-bottom: 0;
}
.pantry-select:hover {
    border-color: #FDBA74;
}
.pantry-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(194, 65, 12, 0.12);
    outline: none;
}

/* Ingredient groups */
.pantry-group {
    margin-bottom: 18px;
    border-bottom: 1px dashed var(--border-warm);
    padding-bottom: 14px;
}
.pantry-group:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
.pantry-group-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.1px;
}
.pantry-group-title .g-title-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    border-radius: 8px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1px solid #FCD34D;
    font-size: 12px;
}

/* Ingredient chips */
.ingredient-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #FFFDF9;
    border: 1.5px solid var(--border-warm);
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    font-size: 12.5px;
    font-weight: 600;
    color: var(--text-muted);
    cursor: pointer;
    user-select: none;
    transition: all 0.22s ease;
    margin: 3px;
    line-height: 1.2;
}
.ingredient-chip:hover {
    border-color: #FDBA74;
    background: #FFF8EE;
    color: var(--primary);
    transform: translateY(-1px);
}
.ingredient-chip.selected {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: #C2410C;
    font-weight: 700;
    box-shadow: 0 3px 10px rgba(194, 65, 12, 0.28);
}
.ingredient-chip.selected:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(194, 65, 12, 0.35);
}
.ingredient-chip .chip-indicator {
    font-size: 10px;
    font-weight: 800;
    opacity: 0.85;
}

/* Submit button */
.pantry-submit-btn {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 700;
    letter-spacing: 0.2px;
    padding: 13px 20px;
    border-radius: var(--radius-pill);
    border: none;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    margin-top: 12px;
}
.pantry-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}

/* ---------- RESULTS ---------- */

/* Empty state */
.pantry-empty-state {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 2px dashed #FED7AA;
    border-radius: 24px;
    padding: 60px 30px;
    text-align: center;
    box-shadow: 0 8px 28px -8px rgba(69, 26, 3, 0.08);
    position: relative;
    overflow: hidden;
}
.pantry-empty-state::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.35) 0%, transparent 70%);
    pointer-events: none;
}
.pantry-empty-emoji {
    font-size: 72px;
    margin-bottom: 18px;
    display: inline-block;
    animation: floatBounce 3s ease-in-out infinite;
}
@keyframes floatBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.pantry-empty-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 26px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 12px;
    letter-spacing: -0.4px;
}
.pantry-empty-text {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.65;
    max-width: 520px;
    margin: 0 auto 26px;
}
.pantry-empty-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 26px;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    transition: all 0.25s ease;
}
.pantry-empty-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFF;
}

/* Results header */
.pantry-results-header {
    margin-bottom: 24px;
    padding-bottom: 20px;
    border-bottom: 2px dashed var(--border-warm);
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    flex-wrap: wrap;
    gap: 16px;
}
.pantry-results-eyebrow {
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
.pantry-results-eyebrow::before {
    content: '';
    width: 32px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary) 0%, #FDBA74 100%);
    border-radius: 2px;
}
.pantry-results-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.6px;
    line-height: 1.15;
    margin-bottom: 6px;
}
.pantry-results-title .count-pill {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    color: #92400E;
    font-size: 0.65em;
    padding: 4px 14px;
    border-radius: var(--radius-pill);
    margin-left: 8px;
    letter-spacing: 0;
    vertical-align: middle;
    box-shadow: 0 2px 6px rgba(217, 119, 6, 0.12);
}
.pantry-results-subtitle {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.5;
}
.pantry-formula-badge {
    font-size: 12px;
    color: var(--text-muted);
    background: #FFFFFF;
    border: 1px solid var(--border-warm);
    padding: 8px 14px;
    border-radius: var(--radius-pill);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
    font-weight: 500;
}
.pantry-formula-badge strong {
    color: var(--primary);
    font-weight: 800;
    font-family: 'Playfair Display', 'Georgia', serif;
}

/* ---------- MATCH CARD (REDESIGNED) ---------- */
.match-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 22px;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    margin-bottom: 20px;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    display: grid;
    grid-template-columns: 96px 1fr;
    gap: 20px;
    align-items: flex-start;
    overflow: hidden;
}
.match-card::before {
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
.match-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 16px 36px -10px rgba(194, 65, 12, 0.18);
    transform: translateY(-4px);
}
.match-card:hover::before {
    opacity: 1;
}

/* Left column: match gauge + image */
.match-card-left {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

/* Match gauge — circular progress */
.match-gauge {
    position: relative;
    width: 84px;
    height: 84px;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    line-height: 1;
    flex-shrink: 0;
    font-family: 'Playfair Display', 'Georgia', serif;
}
.match-gauge-inner {
    position: absolute;
    inset: 5px;
    border-radius: 50%;
    background: #FFFFFF;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1px;
}
.match-gauge-pct {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.5px;
}
.match-gauge-label {
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    opacity: 0.75;
}
.match-gauge--full {
    background: conic-gradient(#16A34A 0deg, #86EFAC 360deg);
}
.match-gauge--full .match-gauge-pct { color: #15803D; }
.match-gauge--high {
    background: conic-gradient(#F59E0B 0deg, #FCD34D 360deg);
}
.match-gauge--high .match-gauge-pct { color: #B45309; }
.match-gauge--mid {
    background: conic-gradient(#EA580C 0deg, #FDBA74 360deg);
}
.match-gauge--mid .match-gauge-pct { color: #C2410C; }
.match-gauge--low {
    background: conic-gradient(#94A3B8 0deg, #CBD5E1 360deg);
}
.match-gauge--low .match-gauge-pct { color: #475569; }

/* Card image */
.match-card-image {
    width: 84px;
    height: 84px;
    border-radius: 16px;
    overflow: hidden;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid var(--border-warm);
    box-shadow: 0 4px 12px -2px rgba(69, 26, 3, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.35s ease;
    position: relative;
}
.match-card:hover .match-card-image {
    transform: scale(1.04) rotate(-2deg);
}
.match-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.match-card-image .emoji {
    font-size: 44px;
    filter: drop-shadow(0 4px 8px rgba(69, 26, 3, 0.15));
}

/* Right column */
.match-card-right {
    min-width: 0;
}

.match-card-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 8px;
    font-size: 12px;
    color: var(--text-muted);
}
.match-card-cat {
    font-size: 11px;
    font-weight: 800;
    color: var(--saffron);
    text-transform: uppercase;
    letter-spacing: 0.7px;
}
.match-card-meta-sep {
    color: var(--border-color);
}
.match-card-meta-pill {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-weight: 700;
    color: var(--text-muted);
}

/* Title */
.match-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 21px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.25;
    letter-spacing: -0.3px;
    margin-bottom: 6px;
}
.match-card-title a {
    color: inherit;
    transition: color 0.2s ease;
}
.match-card-title a:hover {
    color: var(--primary);
}

/* Telugu name */
.match-card-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-style: italic;
    font-size: 13px;
    color: var(--primary);
    margin-bottom: 8px;
    font-weight: 600;
    letter-spacing: 0.1px;
}

/* Description */
.match-card-desc {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.55;
    margin-bottom: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Ingredients breakdown */
.match-ingredients-block {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1px solid var(--border-warm);
    border-radius: 12px;
    padding: 12px 14px;
    margin-bottom: 14px;
    font-size: 12.5px;
    line-height: 1.7;
}
.match-ingredients-block .ing-row {
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    gap: 6px;
    margin-bottom: 6px;
}
.match-ingredients-block .ing-row:last-child {
    margin-bottom: 0;
}
.ing-row-label {
    font-weight: 800;
    font-size: 11.5px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    flex-shrink: 0;
    min-width: 90px;
}
.ing-row-label--available { color: #15803D; }
.ing-row-label--missing { color: #B91C1C; }
.ing-tag-pill {
    display: inline-block;
    font-size: 11.5px;
    padding: 3px 9px;
    border-radius: var(--radius-pill);
    font-weight: 600;
    line-height: 1.3;
}
.ing-tag-pill--available {
    background: #DCFCE7;
    color: #166534;
    border: 1px solid #BBF7D0;
}
.ing-tag-pill--missing {
    background: #FEE2E2;
    color: #991B1B;
    border: 1px solid #FECACA;
}
.ing-more-count {
    font-size: 11px;
    color: var(--text-light);
    font-style: italic;
}

/* Card footer with CTA */
.match-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 14px;
    border-top: 1px dashed var(--border-warm);
    flex-wrap: wrap;
}
.match-card-servings {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12.5px;
    color: var(--text-muted);
    font-weight: 600;
}
.match-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 18px;
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFF;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 3px 10px rgba(194, 65, 12, 0.28);
    white-space: nowrap;
}
.match-card-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(194, 65, 12, 0.38);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
    color: #FFF;
}
.match-card-cta .arrow {
    transition: transform 0.22s ease;
}
.match-card-cta:hover .arrow {
    transform: translateX(3px);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 960px) {
    .pantry-layout {
        grid-template-columns: 320px 1fr;
        gap: 24px;
    }
    .match-card {
        grid-template-columns: 80px 1fr;
        gap: 16px;
        padding: 18px;
    }
    .match-gauge {
        width: 72px;
        height: 72px;
    }
    .match-gauge-pct { font-size: 18px; }
    .match-card-image {
        width: 72px;
        height: 72px;
    }
}
@media (max-width: 780px) {
    .pantry-layout {
        grid-template-columns: 1fr;
    }
    .pantry-sidebar {
        position: static;
        max-height: none;
    }
}
@media (max-width: 640px) {
    .pantry-hero {
        padding: 36px 0 44px;
    }
    .pantry-hero-title {
        font-size: 30px;
    }
    .match-card {
        grid-template-columns: 1fr;
        padding: 18px;
    }
    .match-card-left {
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        gap: 14px;
    }
    .match-gauge {
        width: 68px;
        height: 68px;
    }
    .match-gauge-pct { font-size: 16px; }
    .match-card-image {
        width: 68px;
        height: 68px;
    }
    .match-card-title {
        font-size: 18px;
    }
    .pantry-results-title {
        font-size: 24px;
    }
    .ing-row-label {
        min-width: 0;
    }
}
</style>

<!-- ============================================================
     PANTRY HERO
     ============================================================ -->
<section class="pantry-hero">
    <div class="container">
        <div class="pantry-hero-inner">

            <nav class="pantry-breadcrumb" aria-label="Breadcrumb">
                <a href="index.php">🏠 Home</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">What Can I Cook?</span>
            </nav>

            <h1 class="pantry-hero-title">
                What Can I <span class="accent">Cook</span> Today?
            </h1>
            <p class="pantry-hero-desc">
                Check off the ingredients you currently have in your kitchen. Our local smart matching engine instantly reveals delicious homestyle recipes you can make right now.
            </p>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN DISCOVERY WORKSPACE
     ============================================================ -->
<div class="container">
    <div class="pantry-layout">

        <!-- ==================== SIDEBAR ==================== -->
        <aside class="pantry-sidebar">

            <!-- Sticky header -->
            <div class="pantry-sidebar-header">
                <div class="pantry-sidebar-title">
                    <span>🛒 Your Pantry</span>
                    <button type="button" id="btnClearPantry" class="pantry-reset-btn">
                        Reset All
                    </button>
                </div>
            </div>

            <form action="what-can-i-cook.php" method="GET" id="pantryForm" class="pantry-sidebar-body">

                <!-- Quick shortcuts -->
                <div class="pantry-quick-row">
                    <button type="button" class="pantry-quick-btn" id="btnQuickSouthIndian">
                        <span>🍚</span> + South Indian
                    </button>
                    <button type="button" class="pantry-quick-btn" id="btnQuickVeggies">
                        <span>🥬</span> + Basic Veggies
                    </button>
                </div>

                <!-- Filters -->
                <div class="pantry-filter-block">
                    <div class="pantry-filter-label">
                        <span>🎯</span> Filter Dishes
                    </div>

                    <select name="type" onchange="this.form.submit()" class="pantry-select">
                        <option value="all" <?= $typeFilter === 'all' ? 'selected' : '' ?>>All Diet Types</option>
                        <option value="Vegetarian" <?= $typeFilter === 'Vegetarian' ? 'selected' : '' ?>>🌱 Vegetarian Only</option>
                        <option value="Non-Vegetarian" <?= $typeFilter === 'Non-Vegetarian' ? 'selected' : '' ?>>🍗 Non-Vegetarian</option>
                    </select>

                    <select name="time" onchange="this.form.submit()" class="pantry-select">
                        <option value="0" <?= $maxTime === 0 ? 'selected' : '' ?>>⏱️ Any Cooking Time</option>
                        <option value="30" <?= $maxTime === 30 ? 'selected' : '' ?>>⚡ Quick (Under 30 mins)</option>
                        <option value="45" <?= $maxTime === 45 ? 'selected' : '' ?>>Under 45 mins</option>
                        <option value="60" <?= $maxTime === 60 ? 'selected' : '' ?>>Under 60 mins</option>
                    </select>

                    <select name="diff" onchange="this.form.submit()" class="pantry-select">
                        <option value="all" <?= $diffFilter === 'all' ? 'selected' : '' ?>>All Difficulties</option>
                        <option value="Easy" <?= $diffFilter === 'Easy' ? 'selected' : '' ?>>Easy Only</option>
                        <option value="Medium" <?= $diffFilter === 'Medium' ? 'selected' : '' ?>>Medium</option>
                        <option value="Hard" <?= $diffFilter === 'Hard' ? 'selected' : '' ?>>Hard</option>
                    </select>
                </div>

                <!-- Categorized chips -->
                <?php foreach ($pantryCategories as $grpName => $grpItems): ?>
                    <div class="pantry-group">
                        <div class="pantry-group-title">
                            <span class="g-title-icon"><?= $categoryIcons[$grpName] ?? '🥄' ?></span>
                            <span><?= h($grpName) ?></span>
                        </div>
                        <div style="display: flex; flex-wrap: wrap;">
                            <?php foreach ($grpItems as $item): ?>
                                <?php $isSelected = in_array($item, $selectedIngredients, true); ?>
                                <label class="ingredient-chip <?= $isSelected ? 'selected' : '' ?>">
                                    <input type="checkbox" name="ingredients[]" value="<?= h($item) ?>" <?= $isSelected ? 'checked' : '' ?> style="display: none;" onchange="document.getElementById('pantryForm').submit()">
                                    <span class="chip-indicator"><?= $isSelected ? '✓' : '+' ?></span>
                                    <span><?= h($item) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="pantry-submit-btn">
                    <span>🔍</span>
                    <span>Find Matching Recipes</span>
                </button>

            </form>
        </aside>

        <!-- ==================== RESULTS ==================== -->
        <main>

            <?php if (empty($selectedIngredients)): ?>
                <!-- EMPTY STATE -->
                <div class="pantry-empty-state">
                    <div class="pantry-empty-emoji">🧺🍳</div>
                    <h2 class="pantry-empty-title">Select What You Have in Your Kitchen</h2>
                    <p class="pantry-empty-text">
                        Check off items like <strong>Rice, Tomatoes, Onions, Toor Dal, or Potatoes</strong> on the left panel to discover authentic homestyle recipes ready to cook with zero guesswork.
                    </p>
                    <a href="what-can-i-cook.php?ingredients[]=Rice&ingredients[]=Tomatoes&ingredients[]=Onions&ingredients[]=Toor+Dal&ingredients[]=Green+Chillies" class="pantry-empty-cta">
                        <span>✨</span>
                        <span>Try Example: Rice + Dal + Tomatoes</span>
                    </a>
                </div>

            <?php elseif (empty($matches)): ?>
                <!-- NO MATCHES -->
                <div class="pantry-empty-state">
                    <div class="pantry-empty-emoji">🔍🍲</div>
                    <h2 class="pantry-empty-title">No Exact Recipes Found</h2>
                    <p class="pantry-empty-text">
                        Try selecting a few more staple items like onions, tomatoes, or rice, or clear diet/time filters.
                    </p>
                    <a href="what-can-i-cook.php" class="pantry-empty-cta">
                        <span>🔄</span>
                        <span>Clear Ingredients Selection</span>
                    </a>
                </div>

            <?php else: ?>
                <!-- RESULTS HEADER -->
                <div class="pantry-results-header">
                    <div>
                        <div class="pantry-results-eyebrow">Your Pantry Matches</div>
                        <h2 class="pantry-results-title">
                            Matching Recipes
                            <span class="count-pill"><?= count($matches) ?> found</span>
                        </h2>
                        <p class="pantry-results-subtitle">
                            Sorted by highest match percentage based on <strong><?= count($selectedIngredients) ?></strong> selected ingredient<?= count($selectedIngredients) > 1 ? 's' : '' ?>.
                        </p>
                    </div>
                    <div class="pantry-formula-badge">
                        <strong>Match %</strong> = Available ÷ Total Required × 100
                    </div>
                </div>

                <!-- MATCH RESULTS -->
                <div>
                    <?php foreach ($matches as $m): ?>
                        <?php
                            $r = $m['recipe'];
                            $pct = $m['match_pct'];
                            $totalTime = ($r['prep_time'] ?? 0) + ($r['cook_time'] ?? 0);
                            $relImage = !empty($r['image']) ? $r['image'] : '';
                            $relImageExists = $relImage && file_exists(__DIR__ . '/' . ltrim($relImage, '/'));
                            $relEmoji = $r['icon'] ?? '🍲';
                            $relTelugu = $r['regional_name'] ?? '';

                            // Gauge class based on match %
                            if ($pct >= 85) {
                                $gaugeClass = 'match-gauge--full';
                            } elseif ($pct >= 50) {
                                $gaugeClass = 'match-gauge--high';
                            } elseif ($pct >= 30) {
                                $gaugeClass = 'match-gauge--mid';
                            } else {
                                $gaugeClass = 'match-gauge--low';
                            }
                        ?>
                        <article class="match-card">

                            <!-- LEFT: gauge + image -->
                            <div class="match-card-left">
                                <div class="match-gauge <?= $gaugeClass ?>">
                                    <div class="match-gauge-inner">
                                        <span class="match-gauge-pct"><?= $pct ?>%</span>
                                        <span class="match-gauge-label">Match</span>
                                    </div>
                                </div>

                                <div class="match-card-image">
                                    <?php if ($relImageExists): ?>
                                        <img src="<?= h($relImage) ?>" alt="<?= h($r['name']) ?>" loading="lazy">
                                    <?php else: ?>
                                        <span class="emoji"><?= $relEmoji ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- RIGHT: details -->
                            <div class="match-card-right">

                                <div class="match-card-meta">
                                    <span class="match-card-cat"><?= h($r['category'] ?? '') ?></span>
                                    <span class="match-card-meta-sep">•</span>
                                    <span class="match-card-meta-pill">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <?= $totalTime ?> min
                                    </span>
                                    <span class="match-card-meta-sep">•</span>
                                    <span class="match-card-meta-pill">📊 <?= h($r['difficulty'] ?? 'Easy') ?></span>
                                    <span class="match-card-meta-sep">•</span>
                                    <span class="match-card-meta-pill">
                                        <?php if (strcasecmp($r['type'] ?? '', 'Vegetarian') === 0): ?>
                                            🌱 Veg
                                        <?php else: ?>
                                            🍗 Non-Veg
                                        <?php endif; ?>
                                    </span>
                                </div>

                                <h3 class="match-card-title">
                                    <a href="recipe.php?id=<?= urlencode($r['id']) ?>"><?= h($r['name']) ?></a>
                                </h3>

                                <?php if ($relTelugu): ?>
                                    <div class="match-card-telugu"><?= h($relTelugu) ?></div>
                                <?php endif; ?>

                                <p class="match-card-desc">
                                    <?= h($r['description'] ?? '') ?>
                                </p>

                                <!-- Ingredients breakdown -->
                                <div class="match-ingredients-block">
                                    <?php if (!empty($m['available'])): ?>
                                        <div class="ing-row">
                                            <span class="ing-row-label ing-row-label--available">✓ Available</span>
                                            <?php foreach (array_slice($m['available'], 0, 6) as $av): ?>
                                                <span class="ing-tag-pill ing-tag-pill--available"><?= h($av) ?></span>
                                            <?php endforeach; ?>
                                            <?php if (count($m['available']) > 6): ?>
                                                <span class="ing-more-count">+<?= count($m['available']) - 6 ?> more</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($m['missing'])): ?>
                                        <div class="ing-row">
                                            <span class="ing-row-label ing-row-label--missing">✕ Missing</span>
                                            <?php foreach (array_slice($m['missing'], 0, 4) as $ms): ?>
                                                <span class="ing-tag-pill ing-tag-pill--missing"><?= h($ms) ?></span>
                                            <?php endforeach; ?>
                                            <?php if (count($m['missing']) > 4): ?>
                                                <span class="ing-more-count">+<?= count($m['missing']) - 4 ?> more</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="ing-row">
                                            <span class="ing-row-label ing-row-label--available">🎉 Complete</span>
                                            <span style="color: #15803D; font-weight: 700; font-size: 12.5px;">You have all required ingredients!</span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Footer -->
                                <div class="match-card-footer">
                                    <span class="match-card-servings">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                        </svg>
                                        <?= h((string)($r['servings'] ?? 2)) ?> servings
                                    </span>
                                    <a href="recipe.php?id=<?= urlencode($r['id']) ?>" class="match-card-cta">
                                        <span>View Recipe</span>
                                        <span class="arrow">→</span>
                                    </a>
                                </div>

                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </main>

    </div>
</div>

<!-- ============================================================
     SHORTCUTS JAVASCRIPT
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const clearBtn = document.getElementById('btnClearPantry');
    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php';
        });
    }

    const southIndianBtn = document.getElementById('btnQuickSouthIndian');
    if (southIndianBtn) {
        southIndianBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php?ingredients[]=Rice&ingredients[]=Toor+Dal&ingredients[]=Urad+Dal&ingredients[]=Mustard+Seeds&ingredients[]=Cumin+Seeds&ingredients[]=Turmeric+Powder&ingredients[]=Curry+Leaves&ingredients[]=Desi+Ghee';
        });
    }

    const veggiesBtn = document.getElementById('btnQuickVeggies');
    if (veggiesBtn) {
        veggiesBtn.addEventListener('click', function() {
            window.location.href = 'what-can-i-cook.php?ingredients[]=Onions&ingredients[]=Tomatoes&ingredients[]=Potatoes&ingredients[]=Green+Chillies&ingredients[]=Ginger&ingredients[]=Garlic';
        });
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>