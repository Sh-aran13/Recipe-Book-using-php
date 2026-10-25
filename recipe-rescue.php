<?php
// recipe-rescue.php - Amma's Recipe Rescue Assistant
// "Every Cooking Mistake Has a Solution!"
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';
require_once __DIR__ . '/includes/rescue-data.php';

$page_title = "Recipe Rescue Assistant — Every Cooking Mistake Has a Solution!";
$current_page = 'recipe_rescue';

$all_problems = get_rescue_entries();

$selected_id = trim($_GET['problem'] ?? '');
$active_problem = null;
if ($selected_id !== '') {
    $active_problem = find_rescue_by_id($selected_id);
}

$active_cat = trim($_GET['cat'] ?? 'all');
$search_query = trim($_GET['q'] ?? '');

$filtered_problems = $all_problems;
if ($active_cat !== 'all' && $active_cat !== '') {
    $filtered_problems = array_filter($all_problems, function($item) use ($active_cat) {
        return ($item['category'] ?? '') === $active_cat;
    });
}
if ($search_query !== '') {
    $sq = strtolower($search_query);
    $filtered_problems = array_filter($filtered_problems, function($item) use ($sq) {
        $text = strtolower($item['title'] . ' ' . implode(' ', $item['dish_names'] ?? []) . ' ' . implode(' ', $item['keywords'] ?? []) . ' ' . implode(' ', $item['symptoms'] ?? []));
        return str_contains($text, $sq);
    });
}

$popular_ids = [
    'curry-too-salty',
    'curry-too-spicy',
    'curry-too-watery',
    'rice-too-mushy',
    'rice-hard-undercooked',
    'chapati-too-hard',
    'dosa-batter-not-fermenting',
    'cake-dense-heavy',
    'curry-burnt-bottom',
    'sugar-syrup-crystallized'
];
$popular_problems = [];
foreach ($popular_ids as $pid) {
    if (isset($all_problems[$pid])) {
        $popular_problems[] = $all_problems[$pid];
    }
}

$wizard_dishes = [
    'Tomato Curry / Veg Curry' => ['cat' => 'Curries & Gravies', 'icon' => '🍲'],
    'Chicken / Mutton Curry' => ['cat' => 'Curries & Gravies', 'icon' => '🍗'],
    'Paneer Butter Masala / Gravy' => ['cat' => 'Curries & Gravies', 'icon' => '🧀'],
    'Plain Steamed Rice' => ['cat' => 'Rice & Biryani', 'icon' => '🍚'],
    'Biryani / Pulao' => ['cat' => 'Rice & Biryani', 'icon' => '🥘'],
    'Chapati / Roti / Paratha' => ['cat' => 'Roti, Chapati & Paratha', 'icon' => '🫓'],
    'Dosa / Crispy Crepe' => ['cat' => 'Dosa & Idli', 'icon' => '🥞'],
    'Idli / Steamed Cakes' => ['cat' => 'Dosa & Idli', 'icon' => '⚪'],
    'Sambar / Rasam / Dal' => ['cat' => 'Dal & Sambar', 'icon' => '🥣'],
    'Pakodi / Bajji / Fried Snacks' => ['cat' => 'Snacks & Frying', 'icon' => '🥟'],
    'Sponge Cake / Cupcake' => ['cat' => 'Baking', 'icon' => '🎂'],
    'Gulab Jamun / Sweets' => ['cat' => 'Sweets', 'icon' => '🍨'],
    'Other Dish' => ['cat' => 'General', 'icon' => '🍳']
];

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     RESCUE ASSISTANT — ENHANCED STYLES
     ============================================================ -->
<style>
:root {
    --rescue-red: #DC2626;
    --rescue-amber: #D97706;
    --rescue-green: #16A34A;
}

/* ---------- HERO ---------- */
.rescue-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF1F2 0%, #FFFBEB 50%, #FEF3C7 100%);
    padding: 56px 0 50px;
    border-bottom: 1.5px solid #FED7AA;
    overflow: hidden;
}
.rescue-hero::before {
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
.rescue-hero::after {
    content: '';
    position: absolute;
    bottom: -130px;
    left: -100px;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(239, 68, 68, 0.1) 0%, transparent 70%);
    pointer-events: none;
}
.rescue-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
}
.rescue-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #FFFFFF;
    border: 1.5px solid #FECACA;
    color: var(--rescue-red);
    padding: 8px 18px;
    border-radius: var(--radius-pill);
    font-size: 12.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.12);
    margin-bottom: 20px;
}
.rescue-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.rescue-hero-title .accent {
    color: var(--rescue-red);
    font-style: italic;
    background: linear-gradient(135deg, #DC2626 0%, #EA580C 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.rescue-hero-tagline {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 600;
    font-style: italic;
    color: #B45309;
    margin-bottom: 16px;
    letter-spacing: 0.2px;
}
.rescue-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 720px;
    margin-bottom: 28px;
}

.hero-cta-group {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.btn-fix-dish {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF !important;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.2px;
    border-radius: var(--radius-pill);
    box-shadow: 0 4px 14px rgba(220, 38, 38, 0.38);
    transition: all 0.25s ease;
    text-decoration: none;
    cursor: pointer;
    border: none;
    white-space: nowrap;
}
.btn-fix-dish:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(220, 38, 38, 0.5);
    background: linear-gradient(135deg, #EF4444 0%, #991B1B 100%);
}
.btn-fix-dish:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}
.btn-browse-problems {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 24px;
    background: #FFFFFF;
    color: var(--earth-brown);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 700;
    letter-spacing: 0.1px;
    border-radius: var(--radius-pill);
    border: 1.5px solid var(--border-warm);
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
    transition: all 0.25s ease;
    text-decoration: none;
    white-space: nowrap;
}
.btn-browse-problems:hover {
    background: var(--bg-warm);
    color: var(--primary);
    border-color: #FDBA74;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}

/* ---------- SEARCH BANNER ---------- */
.search-rescue-section {
    margin-top: -28px;
    position: relative;
    z-index: 10;
    margin-bottom: 44px;
}
.search-rescue-box {
    background: #FFFFFF;
    border-radius: 20px;
    padding: 14px 20px;
    box-shadow: 0 12px 32px -8px rgba(69, 26, 3, 0.14), 0 4px 12px rgba(69, 26, 3, 0.04);
    border: 1.5px solid #FED7AA;
    display: flex;
    align-items: center;
    gap: 14px;
}
.search-rescue-input {
    flex: 1;
    border: none;
    outline: none;
    font-size: 16px;
    color: var(--earth-brown);
    background: transparent;
    padding: 8px 0;
}
.search-rescue-input::placeholder {
    color: var(--text-light);
}
.search-tag-pills {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 16px;
    padding: 0 6px;
}
.search-tag-pill {
    font-size: 12.5px;
    padding: 5px 12px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    color: var(--text-muted);
    text-decoration: none;
    border: 1px solid var(--border-warm);
    font-weight: 600;
    transition: all 0.22s ease;
    cursor: pointer;
}
.search-tag-pill:hover {
    background: #FEF3C7;
    color: #92400E;
    border-color: #FDE68A;
    transform: translateY(-1px);
}

/* ---------- WIZARD CARD ---------- */
.wizard-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 26px;
    padding: clamp(24px, 4vw, 40px);
    box-shadow: 0 16px 40px -12px rgba(69, 26, 3, 0.1), 0 4px 12px rgba(69, 26, 3, 0.04);
    margin-bottom: 48px;
    overflow: hidden;
}
.wizard-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #EA580C 0%, #DC2626 50%, #B91C1C 100%);
}
.wizard-card::after {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 202, 202, 0.22) 0%, transparent 70%);
    pointer-events: none;
}

.wizard-step-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 26px;
    padding-bottom: 20px;
    border-bottom: 1.5px solid var(--border-warm);
    flex-wrap: wrap;
    gap: 16px;
    position: relative;
    z-index: 1;
}
.wizard-step-indicator {
    display: flex;
    align-items: center;
    gap: 14px;
}
.wizard-badge {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 20px;
    box-shadow: 0 6px 16px rgba(220, 38, 38, 0.35);
    flex-shrink: 0;
}
.wizard-eyebrow {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 700;
    font-style: italic;
    color: var(--rescue-red);
    letter-spacing: 0.4px;
    margin-bottom: 2px;
}
.wizard-step-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(20px, 2.6vw, 24px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.4px;
    line-height: 1.2;
    margin: 0;
}
.wizard-dots {
    display: flex;
    gap: 6px;
}
.wizard-dot {
    width: 28px;
    height: 6px;
    border-radius: 3px;
    background: #E2E8F0;
    transition: all 0.3s ease;
}
.wizard-dot.active {
    background: var(--rescue-red);
    width: 44px;
    box-shadow: 0 2px 6px rgba(220, 38, 38, 0.3);
}
.wizard-dot.done {
    background: var(--rescue-green);
}

/* ---------- DISH / PROBLEM OPTIONS GRID ---------- */
.dish-options-grid, .problem-options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 14px;
    margin-bottom: 26px;
    position: relative;
    z-index: 1;
}
.dish-option-btn, .problem-option-btn {
    background: #FFFDF9;
    border: 1.5px solid var(--border-warm);
    border-radius: 16px;
    padding: 16px 18px;
    text-align: left;
    cursor: pointer;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    align-items: center;
    gap: 14px;
    position: relative;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.04);
    user-select: none;
    font: inherit;
    color: inherit;
}
.dish-option-btn:hover, .problem-option-btn:hover {
    background: #FFF8EE;
    border-color: #FDBA74;
    transform: translateY(-3px);
    box-shadow: 0 10px 22px -6px rgba(194, 65, 12, 0.18);
}
.dish-option-btn.selected, .problem-option-btn.selected {
    background: linear-gradient(135deg, #FEF2F2 0%, #FFF1F2 100%);
    border-color: #DC2626 !important;
    box-shadow: 0 8px 24px -6px rgba(220, 38, 38, 0.3) !important;
    transform: translateY(-2px);
}
.dish-option-btn.selected::after, .problem-option-btn.selected::after {
    content: "✓";
    position: absolute;
    top: 10px;
    right: 12px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #DC2626;
    color: #FFFFFF;
    font-size: 13px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 8px rgba(220, 38, 38, 0.4);
    animation: checkPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}
@keyframes checkPop {
    0% { transform: scale(0); }
    100% { transform: scale(1); }
}
.option-icon {
    font-size: 30px;
    flex-shrink: 0;
    line-height: 1;
    transition: transform 0.28s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.dish-option-btn:hover .option-icon, .problem-option-btn:hover .option-icon {
    transform: scale(1.12) rotate(-5deg);
}
.option-info {
    flex: 1;
    overflow: hidden;
    pointer-events: none;
}
.option-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 15px;
    color: var(--earth-brown);
    line-height: 1.28;
    margin-bottom: 3px;
    letter-spacing: -0.2px;
}
.dish-option-btn.selected .option-title, .problem-option-btn.selected .option-title {
    color: #991B1B;
}
.option-sub {
    font-size: 12px;
    color: var(--text-light);
    font-weight: 600;
    letter-spacing: 0.1px;
}

/* Custom problem write-in */
.custom-problem-box {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px dashed #CBD5E1;
    border-radius: 14px;
    padding: 16px;
    margin-bottom: 24px;
    position: relative;
    z-index: 1;
}
.custom-problem-label {
    display: block;
    font-size: 12.5px;
    font-weight: 800;
    color: #475569;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}
.custom-problem-row {
    display: flex;
    gap: 10px;
}
.custom-problem-input {
    flex: 1;
    height: 42px;
    border-radius: 10px;
    border: 1.5px solid #CBD5E1;
    padding: 6px 14px;
    font-size: 14px;
    font-family: inherit;
    transition: all 0.22s ease;
    outline: none;
}
.custom-problem-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(194, 65, 12, 0.12);
}

/* Context questions (step 3) */
.context-question-box {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    padding: 20px;
    border-radius: 14px;
    border: 1.5px solid var(--border-warm);
    margin-bottom: 16px;
}
.context-question-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 15px;
    color: var(--earth-brown);
    margin-bottom: 12px;
    letter-spacing: -0.1px;
}
.context-options-row {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.context-option {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: var(--radius-pill);
    cursor: pointer;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--text-muted);
    transition: all 0.22s ease;
}
.context-option:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
}
.context-option input[type="radio"] {
    accent-color: var(--rescue-red);
    cursor: pointer;
    width: 16px;
    height: 16px;
}
.context-option:has(input:checked) {
    background: linear-gradient(135deg, #FEF2F2 0%, #FFF1F2 100%);
    border-color: #DC2626;
    color: #991B1B;
    font-weight: 700;
    box-shadow: 0 3px 10px rgba(220, 38, 38, 0.15);
}

/* Wizard action row */
.wizard-action-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
    padding-top: 12px;
}
.btn-action-outline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 20px;
    border-radius: var(--radius-pill);
    border: 1.5px solid var(--border-warm);
    background: #FFFFFF;
    color: var(--earth-brown);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13.5px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.22s ease;
    cursor: pointer;
    white-space: nowrap;
}
.btn-action-outline:hover {
    background: var(--bg-warm);
    border-color: #FDBA74;
    color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}

/* ---------- STORAGE PANEL ---------- */
.storage-panel {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    padding: 26px 28px;
    margin-bottom: 44px;
    box-shadow: 0 8px 24px -8px rgba(69, 26, 3, 0.08);
}
.storage-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
    flex-wrap: wrap;
    gap: 12px;
}
.storage-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    display: flex;
    align-items: center;
    gap: 10px;
    letter-spacing: -0.3px;
}
.clear-storage-btn {
    background: none;
    border: 1px solid transparent;
    color: #94A3B8;
    font-size: 12.5px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.22s ease;
    padding: 6px 12px;
    border-radius: var(--radius-pill);
    font-family: inherit;
}
.clear-storage-btn:hover {
    color: #EF4444;
    background: #FEF2F2;
    border-color: #FECACA;
}
.storage-row-label {
    font-size: 11.5px;
    font-weight: 800;
    color: #78716C;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.pills-scroll-row {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding-bottom: 6px;
    scrollbar-width: thin;
    flex-wrap: wrap;
}
.history-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    background: var(--bg-warm);
    border: 1px solid var(--border-warm);
    border-radius: var(--radius-pill);
    color: var(--earth-brown);
    font-weight: 600;
    font-size: 13px;
    white-space: nowrap;
    text-decoration: none;
    transition: all 0.22s ease;
}
.history-pill:hover {
    background: #FEF3C7;
    border-color: #FDE68A;
    color: #92400E;
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(217, 119, 6, 0.12);
}
.storage-empty-text {
    font-size: 13px;
    color: #94A3B8;
    font-style: italic;
    padding: 6px 4px;
}

/* ---------- SECTION HEADERS ---------- */
.section-header-wrap {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 20px;
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
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.6px;
    line-height: 1.15;
    margin-bottom: 8px;
}
.section-subheading {
    font-size: 14.5px;
    color: var(--text-muted);
    line-height: 1.6;
    max-width: 620px;
}

/* ---------- CATEGORY TABS ---------- */
.cat-tabs-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    overflow-x: auto;
    padding-bottom: 14px;
    margin-bottom: 30px;
    scrollbar-width: none;
}
.cat-tabs-wrap::-webkit-scrollbar {
    display: none;
}
.cat-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 18px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.1px;
    white-space: nowrap;
    text-decoration: none;
    transition: all 0.22s ease;
    cursor: pointer;
}
.cat-tab-btn:hover {
    background: var(--bg-warm);
    color: var(--earth-brown);
    border-color: #FDBA74;
    transform: translateY(-1px);
}
.cat-tab-btn.active {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    border-color: #B91C1C;
    box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
}

/* ---------- TROUBLESHOOTING CARDS ---------- */
.trouble-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
    gap: 22px;
    margin-bottom: 40px;
}
.trouble-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 20px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 4px 16px -6px rgba(69, 26, 3, 0.08);
    transition: all 0.32s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}
.trouble-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #EA580C 0%, #DC2626 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.trouble-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 44px -12px rgba(194, 65, 12, 0.18);
    border-color: #FDBA74;
}
.trouble-card:hover::before {
    opacity: 1;
}
.trouble-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
    gap: 8px;
}
.trouble-cat-badge {
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    color: #C2410C;
    letter-spacing: 0.6px;
}
.trouble-severity {
    font-size: 10.5px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}
.severity-minor {
    background: linear-gradient(135deg, #DCFCE7 0%, #BBF7D0 100%);
    color: #166534;
    border: 1px solid #86EFAC;
}
.severity-moderate {
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    color: #92400E;
    border: 1px solid #FCD34D;
}
.severity-serious {
    background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
    color: #991B1B;
    border: 1px solid #FCA5A5;
}
.trouble-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 19px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.3;
    margin-bottom: 10px;
    letter-spacing: -0.3px;
}
.trouble-card-desc {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.55;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.trouble-dishes-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 18px;
}
.dish-tag {
    font-size: 11px;
    padding: 4px 9px;
    border-radius: 6px;
    background: #FFF8EE;
    border: 1px solid #FED7AA;
    color: var(--text-muted);
    font-weight: 600;
}
.trouble-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px dashed var(--border-warm);
    gap: 8px;
}
.trouble-view-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--rescue-red);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 13.5px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.22s ease;
}
.trouble-view-btn:hover {
    color: #991B1B;
    transform: translateX(3px);
}
.trouble-fav-btn {
    background: #FFF8EE;
    border: 1.5px solid var(--border-warm);
    color: #9CA3AF;
    cursor: pointer;
    font-size: 16px;
    line-height: 1;
    padding: 6px 10px;
    border-radius: 50%;
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}
.trouble-fav-btn:hover {
    color: #DC2626;
    background: #FEF2F2;
    border-color: #FECACA;
    transform: scale(1.1);
}
.trouble-fav-btn.is-fav {
    color: #DC2626;
    background: #FEF2F2;
    border-color: #FECACA;
}

/* ---------- DETAIL VIEW CARD ---------- */
.detail-view-card {
    background: #FFFFFF;
    border-radius: 26px;
    border: 1.5px solid var(--border-warm);
    box-shadow: 0 16px 40px -12px rgba(69, 26, 3, 0.1), 0 4px 12px rgba(69, 26, 3, 0.04);
    overflow: hidden;
    margin-bottom: 48px;
}
.detail-view-header {
    background: linear-gradient(135deg, #FFF1F2 0%, #FFFBEB 100%);
    padding: 36px;
    border-bottom: 1.5px solid #FED7AA;
    position: relative;
    overflow: hidden;
}
.detail-view-header::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 202, 202, 0.3) 0%, transparent 70%);
    pointer-events: none;
}
.detail-header-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 12px;
    position: relative;
    z-index: 1;
}
.detail-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 900;
    color: var(--earth-brown);
    line-height: 1.2;
    letter-spacing: -0.6px;
    margin-bottom: 12px;
    position: relative;
    z-index: 1;
}
.detail-summary {
    font-size: 15.5px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 800px;
    position: relative;
    z-index: 1;
}

.detail-body {
    padding: 36px;
    display: flex;
    flex-direction: column;
    gap: 32px;
}
.rescue-section-heading {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    padding-bottom: 10px;
    border-bottom: 1.5px dashed var(--border-warm);
    letter-spacing: -0.3px;
}
.rescue-steps-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.rescue-step-item {
    display: flex;
    gap: 16px;
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    padding: 16px 18px;
    line-height: 1.6;
    font-size: 14.5px;
    color: var(--text-main);
    transition: all 0.25s ease;
}
.rescue-step-item:hover {
    border-color: #FDBA74;
    transform: translateX(3px);
    background: #FFFFFF;
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.rescue-step-number {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 14px;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(220, 38, 38, 0.3);
}

.alt-method-card {
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 16px;
    padding: 20px 22px;
    margin-bottom: 14px;
    box-shadow: 0 4px 14px -4px rgba(69, 26, 3, 0.06);
    transition: all 0.25s ease;
}
.alt-method-card:hover {
    border-color: #FDBA74;
    box-shadow: 0 8px 24px -8px rgba(194, 65, 12, 0.12);
}
.alt-method-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 16px;
    color: var(--earth-brown);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.alt-method-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
    font-size: 13.5px;
    line-height: 1.55;
    margin-top: 12px;
}
.alt-subbox {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid var(--border-warm);
}
.alt-subbox-title {
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    color: #92400E;
    margin-bottom: 4px;
    letter-spacing: 0.6px;
}

.items-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 16px;
}
.items-box {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    padding: 18px 20px;
}
.items-box-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.1px;
}

.not-to-do-box {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%);
    border: 1.5px solid #FECACA;
    border-radius: 18px;
    padding: 24px;
}
.not-to-do-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: #991B1B;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.not-to-do-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.not-to-do-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 14px;
    color: #7F1D1D;
    line-height: 1.55;
}

.science-card {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border: 1.5px solid #BBF7D0;
    border-radius: 18px;
    padding: 24px;
}
.science-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 18px;
    font-weight: 800;
    color: #14532D;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: -0.2px;
}
.science-content {
    font-size: 14.5px;
    color: #166534;
    line-height: 1.65;
}

.action-links-bar {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    padding-top: 20px;
    border-top: 1.5px dashed var(--border-warm);
}

/* ---------- NO RESULTS ---------- */
.no-results-box {
    display: none;
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border-radius: 24px;
    border: 2px dashed #FED7AA;
    margin: 20px 0;
}
.no-results-box .icon {
    font-size: 56px;
    margin-bottom: 14px;
    display: inline-block;
    animation: floatBounce 3s ease-in-out infinite;
}
@keyframes floatBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.no-results-box h3 {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 22px;
    color: var(--earth-brown);
    margin-bottom: 8px;
}
.no-results-box p {
    font-size: 14.5px;
    color: var(--text-muted);
    max-width: 500px;
    margin: 0 auto 20px;
    line-height: 1.6;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 780px) {
    .rescue-hero { padding: 40px 0 36px; }
    .rescue-hero-title { font-size: 32px; }
    .dish-options-grid, .problem-options-grid {
        grid-template-columns: 1fr;
    }
    .wizard-card { padding: 22px 18px; }
    .detail-body { padding: 24px 20px; }
    .detail-view-header { padding: 26px 22px; }
    .trouble-cards-grid {
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    }
}
@media (max-width: 640px) {
    .rescue-hero-title { font-size: 28px; }
    .rescue-hero-tagline { font-size: 16px; }
    .trouble-cards-grid { grid-template-columns: 1fr; }
    .wizard-action-row { flex-direction: column; align-items: stretch; }
    .wizard-action-row > * { width: 100%; justify-content: center; }
    .storage-panel { padding: 20px; }
    .detail-body { padding: 20px 18px; }
    .wizard-dots { display: none; }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="rescue-hero" role="region" aria-label="Rescue Assistant Hero">
    <div class="container">
        <div class="rescue-hero-inner">

            <div class="rescue-hero-badge">
                <span>🛟</span>
                <span>Instant Kitchen Emergency Assistant</span>
            </div>

            <h1 class="rescue-hero-title">
                Recipe Rescue <span class="accent">Assistant</span>
            </h1>
            <div class="rescue-hero-tagline">
                "Every Cooking Mistake Has a Solution!"
            </div>
            <p class="rescue-hero-desc">
                Something went wrong while cooking? Find the problem, discover practical solutions, save your dish when possible, and learn how to become a better cook with food science and Amma's tested kitchen wisdom.
            </p>

            <div class="hero-cta-group">
                <a href="#fixMyDishWizard" class="btn-fix-dish" id="btnScrollToWizard">
                    <span>⚡</span>
                    <span>Fix My Dish (Wizard)</span>
                </a>
                <a href="#browseProblems" class="btn-browse-problems">
                    <span>🔍</span>
                    <span>Browse 50+ Problems</span>
                </a>
                <a href="#savedSolutionsPanel" class="btn-browse-problems" style="border-color: #FCA5A5; color: #DC2626;">
                    <span>❤️</span>
                    <span>Saved Guides (<span id="savedCountHero">0</span>)</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="container" style="padding-top: 20px; padding-bottom: 60px;">

    <!-- SEARCH BANNER -->
    <div class="search-rescue-section">
        <div class="search-rescue-box">
            <span style="font-size: 22px; color: var(--rescue-red);">🔍</span>
            <input type="text" id="liveSearchInput" class="search-rescue-input" placeholder="Search a problem, such as 'salty curry', 'mushy rice', 'hard chapati', or 'cake dense'..." value="<?= h($search_query) ?>" aria-label="Search cooking problems">
            <button type="button" id="clearSearchBtn" style="background: none; border: none; color: #9CA3AF; cursor: pointer; font-size: 16px; display: none; padding: 6px;" aria-label="Clear Search">✕</button>
        </div>

        <div class="search-tag-pills">
            <span style="font-size: 12px; font-weight: 800; color: #78716C; text-transform: uppercase; letter-spacing: 0.5px;">Popular:</span>
            <span class="search-tag-pill" data-query="salty">Curry Too Salty</span>
            <span class="search-tag-pill" data-query="spicy">Food Too Spicy</span>
            <span class="search-tag-pill" data-query="watery">Watery Gravy</span>
            <span class="search-tag-pill" data-query="mushy">Mushy Rice</span>
            <span class="search-tag-pill" data-query="hard chapati">Hard Chapati</span>
            <span class="search-tag-pill" data-query="dosa sticking">Dosa Sticking</span>
            <span class="search-tag-pill" data-query="dense cake">Dense Cake</span>
            <span class="search-tag-pill" data-query="burnt">Burnt Bottom</span>
            <span class="search-tag-pill" data-query="curdled">Curdled Gravy</span>
        </div>
    </div>

    <!-- DETAIL VIEW FOR SELECTED PROBLEM -->
    <?php if ($active_problem): ?>
    <section id="problemDetailView" class="detail-view-card" role="region" aria-label="Troubleshooting Solution Details">
        <div class="detail-view-header">
            <div class="detail-header-top">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="recipe-rescue.php" class="btn-action-outline" style="padding: 7px 14px; font-size: 12.5px;">
                        ← Back to All Problems
                    </a>
                    <span class="trouble-cat-badge"><?= h($active_problem['category']) ?></span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <?php
                    $sev = strtolower($active_problem['severity'] ?? 'moderate');
                    $sevClass = 'severity-moderate';
                    if (str_contains($sev, 'minor')) $sevClass = 'severity-minor';
                    if (str_contains($sev, 'serious')) $sevClass = 'severity-serious';
                    ?>
                    <span class="trouble-severity <?= $sevClass ?>">
                        Severity: <?= h($active_problem['severity']) ?>
                    </span>
                    <button type="button" class="trouble-fav-btn" id="detailFavToggleBtn" data-problem-id="<?= h($active_problem['id']) ?>" title="Save to Favorites" aria-label="Save this rescue guide" style="width: 40px; height: 40px; font-size: 18px;">
                        ❤️
                    </button>
                </div>
            </div>

            <h2 class="detail-title"><?= h($active_problem['title'] ?? '') ?></h2>
            <p class="detail-summary"><?= h($active_problem['summary'] ?? ($active_problem['symptoms'] ?? '')) ?></p>

            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 16px; position: relative; z-index: 1;">
                <span style="font-size: 12px; font-weight: 800; color: #78716C; text-transform: uppercase; letter-spacing: 0.5px;">Applies to:</span>
                <?php
                $activeDishes = (array)($active_problem['dish_names'] ?? ($active_problem['dishes'] ?? []));
                foreach ($activeDishes as $dn):
                ?>
                    <span class="dish-tag" style="background: rgba(255,255,255,0.9);"><?= h($dn) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="detail-body">
            <div>
                <h3 class="rescue-section-heading"><span>🔍</span> <span>Common Causes</span></h3>
                <ul style="list-style: disc; padding-left: 22px; font-size: 14.5px; color: var(--text-main); line-height: 1.7;">
                    <?php foreach ($active_problem['causes'] as $cause): ?>
                        <li style="margin-bottom: 6px;"><?= h($cause) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h3 class="rescue-section-heading"><span>🚨</span> <span>Immediate Rescue Steps</span></h3>
                <ol class="rescue-steps-list">
                    <?php foreach ($active_problem['immediate_steps'] as $idx => $step): ?>
                        <li class="rescue-step-item">
                            <div class="rescue-step-number"><?= $idx + 1 ?></div>
                            <div style="flex: 1;"><?= h($step) ?></div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>

            <?php
            $alts = (array)($active_problem['alternative_methods'] ?? ($active_problem['alternatives'] ?? []));
            if (!empty($alts)):
            ?>
            <div>
                <h3 class="rescue-section-heading"><span>🔄</span> <span>Alternative Rescue Methods</span></h3>
                <?php foreach ($alts as $alt):
                    $altName = $alt['name'] ?? 'Alternative Method';
                    $altAction = $alt['action'] ?? ($alt['method'] ?? '');
                    $altWhy = $alt['why_it_works'] ?? ($alt['why'] ?? ($alt['suitability'] ?? 'Provides a tested kitchen recovery balance.'));
                    $altBest = $alt['best_for'] ?? ($alt['suitability'] ?? 'General home-style cooking');
                    $altLimits = $alt['limitations'] ?? ($alt['watch_out'] ?? 'Use in moderation to prevent overriding the main dish flavors.');
                ?>
                    <div class="alt-method-card">
                        <div class="alt-method-title">
                            <span>✨</span> <span><?= h($altName) ?></span>
                        </div>
                        <?php if ($altAction): ?>
                            <p style="font-size: 14px; color: var(--text-main); line-height: 1.6; margin: 0 0 4px 0;"><?= h($altAction) ?></p>
                        <?php endif; ?>
                        <div class="alt-method-grid">
                            <div class="alt-subbox">
                                <div class="alt-subbox-title">Why it works</div>
                                <div><?= h($altWhy) ?></div>
                            </div>
                            <div class="alt-subbox">
                                <div class="alt-subbox-title">Best for</div>
                                <div><?= h($altBest) ?></div>
                            </div>
                            <div class="alt-subbox">
                                <div class="alt-subbox-title">Watch out</div>
                                <div style="color: #B91C1C;"><?= h($altLimits) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div>
                <h3 class="rescue-section-heading"><span>🧰</span> <span>Ingredients & Equipment Needed</span></h3>
                <div class="items-grid">
                    <div class="items-box">
                        <div class="items-box-title"><span>✅</span> <span>Required Items</span></div>
                        <ul style="list-style: circle; padding-left: 20px; font-size: 13.5px; color: var(--text-main); line-height: 1.6;">
                            <?php foreach (($active_problem['items_needed']['required'] ?? []) as $req): ?>
                                <li style="margin-bottom: 4px;"><?= h($req) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php if (!empty($active_problem['items_needed']['optional'])): ?>
                    <div class="items-box">
                        <div class="items-box-title"><span>💡</span> <span>Optional Pantry Substitutes</span></div>
                        <ul style="list-style: circle; padding-left: 20px; font-size: 13.5px; color: var(--text-main); line-height: 1.6;">
                            <?php foreach ($active_problem['items_needed']['optional'] as $opt): ?>
                                <li style="margin-bottom: 4px;"><?= h($opt) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="not-to-do-box">
                <h3 class="not-to-do-title"><span>⚠️</span> <span>What NOT to Do (Avoid Worsening the Dish)</span></h3>
                <ul class="not-to-do-list">
                    <?php foreach (($active_problem['what_not_to_do'] ?? []) as $dont): ?>
                        <li class="not-to-do-item">
                            <span style="font-size: 14px;">❌</span>
                            <span><?= h($dont) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h3 class="rescue-section-heading"><span>🛡️</span> <span>Prevention Tips for Next Time</span></h3>
                <ul style="list-style: square; padding-left: 22px; font-size: 14.5px; color: var(--text-main); line-height: 1.7;">
                    <?php foreach (($active_problem['prevention_tips'] ?? ($active_problem['prevention'] ?? [])) as $prev): ?>
                        <li style="margin-bottom: 6px;"><?= h($prev) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="science-card">
                <div class="science-title">
                    <span>🔬</span>
                    <span>Cooking Science: Why This Happens</span>
                </div>
                <div class="science-content">
                    <?= h($active_problem['cooking_science'] ?? ($active_problem['science'] ?? '')) ?>
                </div>
            </div>

            <?php
            $relRecipes = (array)($active_problem['related_recipes'] ?? ($active_problem['related_recipe_ids'] ?? []));
            $relLessons = (array)($active_problem['related_lessons'] ?? ($active_problem['related_lesson_ids'] ?? []));
            if (!empty($relRecipes) || !empty($relLessons)):
            ?>
            <div>
                <h3 class="rescue-section-heading"><span>📚</span> <span>Connect with Academy & Practice Recipes</span></h3>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <?php foreach ($relRecipes as $rid):
                        $rc = find_recipe_by_id($rid);
                        if ($rc):
                            $rcTitle = $rc['name'] ?? ($rc['title'] ?? ucwords(str_replace('-', ' ', $rid)));
                    ?>
                        <a href="recipe.php?id=<?= urlencode($rc['id'] ?? $rid) ?>" class="btn-action-outline">
                            <span>📖</span>
                            <span>Practice: <?= h($rcTitle) ?></span>
                        </a>
                    <?php endif; endforeach; ?>

                    <?php foreach ($relLessons as $lid): ?>
                        <a href="lesson.php?id=<?= urlencode($lid) ?>" class="btn-action-outline" style="border-color: #FCD34D; background: #FFFBEB; color: #92400E;">
                            <span>🎓</span>
                            <span>Lesson: <?= h(ucwords(str_replace('-', ' ', $lid))) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="action-links-bar">
                <a href="#fixMyDishWizard" class="btn-fix-dish" style="padding: 11px 22px; font-size: 14px;">
                    <span>⚡</span>
                    <span>Troubleshoot Another Dish</span>
                </a>
                <a href="recipe-rescue.php" class="btn-action-outline">
                    <span>📋</span>
                    <span>Browse All 50+ Guides</span>
                </a>
                <a href="knowledge-centre.php" class="btn-action-outline">
                    <span>💡</span>
                    <span>Visit Knowledge Centre</span>
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ============================================================
         WIZARD
         ============================================================ -->
    <section id="fixMyDishWizard" class="wizard-card" role="region" aria-label="Fix My Dish Guided Wizard">
        <div class="wizard-step-header">
            <div class="wizard-step-indicator">
                <div class="wizard-badge" id="wizardBadgeNumber">1</div>
                <div>
                    <div class="wizard-eyebrow">Guided Problem Solver</div>
                    <h2 class="wizard-step-title" id="wizardStepTitle">
                        Step 1: What dish are you cooking?
                    </h2>
                </div>
            </div>
            <div class="wizard-dots">
                <div class="wizard-dot active" id="dotStep1"></div>
                <div class="wizard-dot" id="dotStep2"></div>
                <div class="wizard-dot" id="dotStep3"></div>
                <div class="wizard-dot" id="dotStep4"></div>
            </div>
        </div>

        <!-- STEP 1 -->
        <div id="wizardStep1Content">
            <p style="font-size: 14.5px; color: var(--text-muted); margin-bottom: 22px; line-height: 1.6;">
                Choose the dish you are currently preparing or select "Other Dish" to search for custom symptoms:
            </p>
            <div class="dish-options-grid">
                <?php foreach ($wizard_dishes as $dName => $dMeta): ?>
                    <button type="button" class="dish-option-btn" data-dish="<?= h($dName) ?>">
                        <span class="option-icon"><?= $dMeta['icon'] ?></span>
                        <div class="option-info">
                            <div class="option-title"><?= h($dName) ?></div>
                            <div class="option-sub"><?= h($dMeta['cat']) ?></div>
                        </div>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="wizard-action-row" style="justify-content: flex-end;">
                <button type="button" class="btn-fix-dish" id="wizardStep1NextBtn" disabled>
                    <span>Next: Choose the Problem</span>
                    <span>→</span>
                </button>
            </div>
        </div>

        <!-- STEP 2 -->
        <div id="wizardStep2Content" style="display: none;">
            <p style="font-size: 14.5px; color: var(--text-muted); margin-bottom: 22px; line-height: 1.6;">
                What symptom or mistake occurred with your <strong id="selectedDishLabel" style="color: var(--primary); font-family: 'Playfair Display', Georgia, serif;"></strong>?
            </p>

            <div class="problem-options-grid" id="wizardProblemOptionsList"></div>

            <div class="custom-problem-box">
                <label for="customProblemInput" class="custom-problem-label">
                    Other Problem not listed above?
                </label>
                <div class="custom-problem-row">
                    <input type="text" id="customProblemInput" class="custom-problem-input" placeholder="Describe the symptom (e.g. food smells smoky, sugar crystallized)...">
                    <button type="button" id="applyCustomProblemBtn" class="btn-action-outline">
                        <span>🔍</span>
                        <span>Find Solutions</span>
                    </button>
                </div>
            </div>

            <div class="wizard-action-row">
                <button type="button" class="btn-action-outline" id="wizardBackToStep1">
                    <span>←</span>
                    <span>Back to Dishes</span>
                </button>
                <button type="button" class="btn-fix-dish" id="wizardStep2NextBtn" disabled>
                    <span>Next: Quick Diagnostic</span>
                    <span>→</span>
                </button>
            </div>
        </div>

        <!-- STEP 3 -->
        <div id="wizardStep3Content" style="display: none;">
            <p style="font-size: 14.5px; color: var(--text-muted); margin-bottom: 22px; line-height: 1.6;">
                A few quick questions so we recommend the safest and most effective recovery method:
            </p>

            <div>
                <div class="context-question-box">
                    <div class="context-question-title">1. How severe is the issue?</div>
                    <div class="context-options-row">
                        <label class="context-option">
                            <input type="radio" name="severityLevel" value="mild" checked>
                            <span>Mild</span>
                        </label>
                        <label class="context-option">
                            <input type="radio" name="severityLevel" value="moderate">
                            <span>Moderate</span>
                        </label>
                        <label class="context-option">
                            <input type="radio" name="severityLevel" value="severe">
                            <span>Severe</span>
                        </label>
                    </div>
                </div>

                <div class="context-question-box">
                    <div class="context-question-title">2. Is the food still on the heat or already finished?</div>
                    <div class="context-options-row">
                        <label class="context-option">
                            <input type="radio" name="cookingStage" value="cooking" checked>
                            <span>Still on stove</span>
                        </label>
                        <label class="context-option">
                            <input type="radio" name="cookingStage" value="finished">
                            <span>Finished dish</span>
                        </label>
                    </div>
                </div>

                <div class="context-question-box">
                    <div class="context-question-title">3. Does the dish contain dairy or coconut milk?</div>
                    <div class="context-options-row">
                        <label class="context-option">
                            <input type="radio" name="hasDairy" value="no" checked>
                            <span>No dairy</span>
                        </label>
                        <label class="context-option">
                            <input type="radio" name="hasDairy" value="yes">
                            <span>Yes, dairy/coconut</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="wizard-action-row">
                <button type="button" class="btn-action-outline" id="wizardBackToStep2">
                    <span>←</span>
                    <span>Back to Problems</span>
                </button>
                <button type="button" class="btn-fix-dish" id="wizardGenerateResultBtn">
                    <span>⚡</span>
                    <span>Show Rescue Solution Now!</span>
                </button>
            </div>
        </div>

        <!-- STEP 4 -->
        <div id="wizardStep4Content" style="display: none;">
            <div id="wizardResultContainer"></div>
            <div class="wizard-action-row" style="margin-top: 24px;">
                <button type="button" class="btn-action-outline" id="wizardResetBtn">
                    <span>🔄</span>
                    <span>Start Over</span>
                </button>
                <a href="#browseProblems" class="btn-action-outline">
                    <span>📋</span>
                    <span>Browse All Problems</span>
                </a>
            </div>
        </div>
    </section>

    <!-- STORAGE PANEL -->
    <div class="storage-panel" id="savedSolutionsPanel">
        <div class="storage-header">
            <div class="storage-title">
                <span>❤️</span>
                <span>Saved Solutions & History</span>
            </div>
            <button type="button" class="clear-storage-btn" id="clearHistoryBtn">
                Clear Recent History
            </button>
        </div>

        <div style="margin-bottom: 18px;">
            <div class="storage-row-label">
                <span>📌</span>
                <span>Bookmarked Favorites</span>
            </div>
            <div class="pills-scroll-row" id="savedFavoritesRow">
                <span class="storage-empty-text">No saved solutions yet. Tap the heart icon ❤️ on any problem to save it for offline kitchen reference.</span>
            </div>
        </div>

        <div>
            <div class="storage-row-label">
                <span>🕒</span>
                <span>Recently Viewed</span>
            </div>
            <div class="pills-scroll-row" id="recentlyViewedRow">
                <span class="storage-empty-text">Your recently explored guides will appear here.</span>
            </div>
        </div>
    </div>

    <!-- POPULAR PROBLEMS -->
    <section style="margin-bottom: 48px;" role="region" aria-label="Popular Cooking Problems">
        <div class="section-header-wrap">
            <div>
                <div class="section-eyebrow">Quick Relief</div>
                <h2 class="section-heading">Popular Cooking Emergencies</h2>
                <p class="section-subheading">The most common kitchen hurdles encountered by home cooks, along with tested recovery steps.</p>
            </div>
        </div>

        <div class="trouble-cards-grid">
            <?php foreach ($popular_problems as $prob):
                $sev = strtolower($prob['severity'] ?? 'moderate');
                $sevClass = 'severity-moderate';
                if (str_contains($sev, 'minor')) $sevClass = 'severity-minor';
                if (str_contains($sev, 'serious')) $sevClass = 'severity-serious';
            ?>
            <div class="trouble-card" data-category="<?= h($prob['category']) ?>" data-id="<?= h($prob['id']) ?>">
                <div>
                    <div class="trouble-card-top">
                        <span class="trouble-cat-badge"><?= h($prob['category']) ?></span>
                        <span class="trouble-severity <?= $sevClass ?>"><?= h($prob['severity']) ?></span>
                    </div>
                    <h3 class="trouble-card-title"><?= h($prob['title'] ?? '') ?></h3>
                    <p class="trouble-card-desc"><?= h($prob['summary'] ?? ($prob['symptoms'] ?? '')) ?></p>

                    <div class="trouble-dishes-tags">
                        <?php
                        $dishesList = (array)($prob['dish_names'] ?? ($prob['dishes'] ?? []));
                        foreach (array_slice($dishesList, 0, 3) as $dn):
                        ?>
                            <span class="dish-tag"><?= h($dn) ?></span>
                        <?php endforeach; ?>
                        <?php if (count($dishesList) > 3): ?>
                            <span class="dish-tag">+<?= count($dishesList) - 3 ?> more</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="trouble-card-footer">
                    <a href="recipe-rescue.php?problem=<?= urlencode($prob['id']) ?>#problemDetailView" class="trouble-view-btn">
                        <span>Fix This</span>
                        <span>→</span>
                    </a>
                    <button type="button" class="trouble-fav-btn" data-problem-id="<?= h($prob['id']) ?>" title="Save to Favorites" aria-label="Save this solution">
                        ❤️
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- BROWSE ALL -->
    <section id="browseProblems" role="region" aria-label="Browse All Cooking Problems">
        <div class="section-header-wrap">
            <div>
                <div class="section-eyebrow">Knowledge Directory</div>
                <h2 class="section-heading">Browse All <?= count($all_problems) ?> Kitchen Solutions</h2>
                <p class="section-subheading">Select any culinary category to filter troubleshooting instructions.</p>
            </div>
            <div style="font-size: 13.5px; font-weight: 700; color: #78716C; background: #FFFFFF; border: 1px solid var(--border-warm); padding: 8px 16px; border-radius: var(--radius-pill);">
                Showing: <span id="categoryCountLabel" style="color: var(--primary); font-family: 'Playfair Display', Georgia, serif;"><?= count($filtered_problems) ?></span> Problems
            </div>
        </div>

        <div class="cat-tabs-wrap" id="categoryTabsContainer">
            <button type="button" class="cat-tab-btn <?= $active_cat === 'all' ? 'active' : '' ?>" data-cat="all">
                <span>🛟</span>
                <span>All (<?= count($all_problems) ?>)</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Curries and Gravies' ? 'active' : '' ?>" data-cat="Curries and Gravies">
                <span>🍲</span>
                <span>Curries & Gravies</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Rice and Biryani' ? 'active' : '' ?>" data-cat="Rice and Biryani">
                <span>🍚</span>
                <span>Rice & Biryani</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Roti, Chapati, and Paratha' ? 'active' : '' ?>" data-cat="Roti, Chapati, and Paratha">
                <span>🫓</span>
                <span>Roti & Chapati</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Dosa, Idli, and Fermented Foods' ? 'active' : '' ?>" data-cat="Dosa, Idli, and Fermented Foods">
                <span>🥞</span>
                <span>Dosa & Idli</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Cakes and Baking' ? 'active' : '' ?>" data-cat="Cakes and Baking">
                <span>🎂</span>
                <span>Cakes & Baking</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Indian Sweets and Desserts' ? 'active' : '' ?>" data-cat="Indian Sweets and Desserts">
                <span>🍨</span>
                <span>Sweets & Desserts</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Snacks and Fried Foods' ? 'active' : '' ?>" data-cat="Snacks and Fried Foods">
                <span>🥟</span>
                <span>Snacks & Frying</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Dal, Sambar, and Rasam' ? 'active' : '' ?>" data-cat="Dal, Sambar, and Rasam">
                <span>🥣</span>
                <span>Dal & Sambar</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Vegetables and Side Dishes' ? 'active' : '' ?>" data-cat="Vegetables and Side Dishes">
                <span>🥗</span>
                <span>Vegetables</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'Chutneys and Pickles' ? 'active' : '' ?>" data-cat="Chutneys and Pickles">
                <span>🫙</span>
                <span>Chutneys & Pickles</span>
            </button>
            <button type="button" class="cat-tab-btn <?= $active_cat === 'General Cooking Problems' ? 'active' : '' ?>" data-cat="General Cooking Problems">
                <span>🍳</span>
                <span>Kitchen & Safety</span>
            </button>
        </div>

        <div class="trouble-cards-grid" id="browseCardsGrid">
            <?php foreach ($all_problems as $prob):
                $sev = strtolower($prob['severity'] ?? 'moderate');
                $sevClass = 'severity-moderate';
                if (str_contains($sev, 'minor')) $sevClass = 'severity-minor';
                if (str_contains($sev, 'serious')) $sevClass = 'severity-serious';

                $dishes = (array)($prob['dish_names'] ?? ($prob['dishes'] ?? []));
                $keywords = (array)($prob['keywords'] ?? []);
                $symptoms = (array)($prob['symptoms'] ?? []);
                $searchCorpus = strtolower(($prob['title'] ?? '') . ' ' . implode(' ', $dishes) . ' ' . implode(' ', $keywords) . ' ' . implode(' ', $symptoms) . ' ' . ($prob['category'] ?? ''));
            ?>
            <div class="trouble-card browse-item" data-id="<?= h($prob['id'] ?? '') ?>" data-category="<?= h($prob['category'] ?? '') ?>" data-corpus="<?= h($searchCorpus) ?>">
                <div>
                    <div class="trouble-card-top">
                        <span class="trouble-cat-badge"><?= h($prob['category'] ?? '') ?></span>
                        <span class="trouble-severity <?= $sevClass ?>"><?= h($prob['severity'] ?? '') ?></span>
                    </div>
                    <h3 class="trouble-card-title"><?= h($prob['title'] ?? '') ?></h3>
                    <p class="trouble-card-desc"><?= h($prob['summary'] ?? ($prob['symptoms'] ?? '')) ?></p>

                    <div class="trouble-dishes-tags">
                        <?php foreach (array_slice($dishes, 0, 3) as $dn): ?>
                            <span class="dish-tag"><?= h($dn) ?></span>
                        <?php endforeach; ?>
                        <?php if (count($dishes) > 3): ?>
                            <span class="dish-tag">+<?= count($dishes) - 3 ?> more</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="trouble-card-footer">
                    <a href="recipe-rescue.php?problem=<?= urlencode($prob['id']) ?>#problemDetailView" class="trouble-view-btn">
                        <span>Fix This</span>
                        <span>→</span>
                    </a>
                    <button type="button" class="trouble-fav-btn" data-problem-id="<?= h($prob['id']) ?>" title="Save to Favorites" aria-label="Save this solution">
                        ❤️
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div id="noRescueResults" class="no-results-box">
            <div class="icon">🍳</div>
            <h3>No Matching Solutions Found</h3>
            <p>We couldn't find a recorded solution for that specific query. Try searching for symptoms like "salty", "hard", "sticky", or "burnt".</p>
            <button type="button" class="btn-action-outline" id="resetFiltersBtn">
                <span>🔄</span>
                <span>Reset Search & Show All</span>
            </button>
        </div>
    </section>

</div>

<!-- ============================================================
     KNOWLEDGE BASE JSON
     ============================================================ -->
<script>
    window.RESCUE_DATABASE = <?= json_encode($all_problems, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
</script>

<!-- ============================================================
     INTERACTIVITY SCRIPT
     ============================================================ -->
<script>
(function() {
    'use strict';

    const db = window.RESCUE_DATABASE || {};

    const storage = {
        get: function(key, fallback) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : fallback;
            } catch (e) { return fallback; }
        },
        set: function(key, val) {
            try { localStorage.setItem(key, JSON.stringify(val)); } catch (e) {}
        }
    };

    const FAV_KEY = 'amma_rescue_favorites';
    const RECENT_KEY = 'amma_rescue_recents';

    const urlParams = new URLSearchParams(window.location.search);
    const activeProblemId = urlParams.get('problem');
    if (activeProblemId && db[activeProblemId]) {
        addRecent(activeProblemId);
    }

    function addRecent(id) {
        let recents = storage.get(RECENT_KEY, []);
        recents = recents.filter(x => x !== id);
        recents.unshift(id);
        if (recents.length > 8) recents = recents.slice(0, 8);
        storage.set(RECENT_KEY, recents);
        renderRecents();
    }

    function toggleFav(id) {
        let favs = storage.get(FAV_KEY, []);
        const idx = favs.indexOf(id);
        if (idx >= 0) {
            favs.splice(idx, 1);
        } else {
            favs.push(id);
        }
        storage.set(FAV_KEY, favs);
        syncFavButtons();
        renderFavorites();
    }

    function syncFavButtons() {
        const favs = storage.get(FAV_KEY, []);
        document.querySelectorAll('.trouble-fav-btn').forEach(btn => {
            const pid = btn.getAttribute('data-problem-id');
            if (favs.includes(pid)) {
                btn.classList.add('is-fav');
            } else {
                btn.classList.remove('is-fav');
            }
        });
        const heroCount = document.getElementById('savedCountHero');
        if (heroCount) heroCount.textContent = favs.length;
    }

    function renderFavorites() {
        const row = document.getElementById('savedFavoritesRow');
        if (!row) return;
        const favs = storage.get(FAV_KEY, []);
        if (favs.length === 0) {
            row.innerHTML = '<span class="storage-empty-text">No saved solutions yet. Tap the heart icon ❤️ on any problem to save it for offline kitchen reference.</span>';
            return;
        }
        let html = '';
        favs.forEach(id => {
            const item = db[id];
            if (item) {
                html += `<a href="recipe-rescue.php?problem=${encodeURIComponent(id)}#problemDetailView" class="history-pill" style="border-color: #FECACA; background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%); color: #991B1B;">
                    <span>❤️</span> ${escapeHtml(item.title)}
                </a>`;
            }
        });
        row.innerHTML = html;
    }

    function renderRecents() {
        const row = document.getElementById('recentlyViewedRow');
        if (!row) return;
        const recents = storage.get(RECENT_KEY, []);
        if (recents.length === 0) {
            row.innerHTML = '<span class="storage-empty-text">Your recently explored guides will appear here.</span>';
            return;
        }
        let html = '';
        recents.forEach(id => {
            const item = db[id];
            if (item) {
                html += `<a href="recipe-rescue.php?problem=${encodeURIComponent(id)}#problemDetailView" class="history-pill">
                    <span>🕒</span> ${escapeHtml(item.title)}
                </a>`;
            }
        });
        row.innerHTML = html;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text || '';
        return div.innerHTML;
    }

    document.addEventListener('click', function(e) {
        const favBtn = e.target.closest('.trouble-fav-btn');
        if (favBtn) {
            e.preventDefault();
            const pid = favBtn.getAttribute('data-problem-id');
            if (pid) toggleFav(pid);
        }
    });

    const clearHistBtn = document.getElementById('clearHistoryBtn');
    if (clearHistBtn) {
        clearHistBtn.addEventListener('click', function() {
            storage.set(RECENT_KEY, []);
            renderRecents();
        });
    }

    // ---------- SEARCH & FILTER ----------
    const searchInput = document.getElementById('liveSearchInput');
    const clearSearchBtn = document.getElementById('clearSearchBtn');
    const browseCards = document.querySelectorAll('.browse-item');
    const noResults = document.getElementById('noRescueResults');
    const countLabel = document.getElementById('categoryCountLabel');
    const catButtons = document.querySelectorAll('.cat-tab-btn');
    let currentCategory = 'all';

    function filterCards() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        if (clearSearchBtn) {
            clearSearchBtn.style.display = query.length > 0 ? 'inline-block' : 'none';
        }

        let visibleCount = 0;
        browseCards.forEach(card => {
            const cat = card.getAttribute('data-category');
            const corpus = card.getAttribute('data-corpus') || '';
            const matchesCat = (currentCategory === 'all' || cat === currentCategory);
            const matchesQuery = query === '' || corpus.includes(query);

            if (matchesCat && matchesQuery) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countLabel) countLabel.textContent = visibleCount;
        if (noResults) {
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    }

    if (searchInput) searchInput.addEventListener('input', filterCards);
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            filterCards();
        });
    }

    document.querySelectorAll('.search-tag-pill').forEach(pill => {
        pill.addEventListener('click', function() {
            const q = this.getAttribute('data-query');
            if (searchInput && q) {
                searchInput.value = q;
                filterCards();
                searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });

    catButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            catButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentCategory = this.getAttribute('data-cat') || 'all';
            filterCards();
        });
    });

    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', function() {
            currentCategory = 'all';
            catButtons.forEach(b => b.classList.remove('active'));
            if (catButtons[0]) catButtons[0].classList.add('active');
            if (searchInput) searchInput.value = '';
            filterCards();
        });
    }

    // ---------- WIZARD ----------
    let wizardState = {
        dish: '',
        problemId: '',
        customProblem: '',
        severity: 'mild',
        cookingStage: 'cooking',
        hasDairy: 'no'
    };

    const dishProblemsMap = {
        'Tomato Curry / Veg Curry': [
            { id: 'curry-too-salty', title: 'Too Salty' },
            { id: 'curry-too-spicy', title: 'Too Spicy' },
            { id: 'curry-too-watery', title: 'Watery / Thin Gravy' },
            { id: 'curry-too-thick', title: 'Too Thick / Dry' },
            { id: 'curry-too-sour', title: 'Too Sour' },
            { id: 'curry-too-oily', title: 'Excess Oil Floating' },
            { id: 'curry-burnt-bottom', title: 'Burnt at Bottom' }
        ],
        'Chicken / Mutton Curry': [
            { id: 'curry-too-salty', title: 'Too Salty' },
            { id: 'curry-too-spicy', title: 'Too Spicy' },
            { id: 'meat-tough-chewy', title: 'Meat Tough / Chewy' },
            { id: 'curry-too-watery', title: 'Gravy Too Thin' },
            { id: 'curry-burnt-bottom', title: 'Scorched Bottom' },
            { id: 'curry-too-oily', title: 'Excess Oil' }
        ],
        'Paneer Butter Masala / Gravy': [
            { id: 'curry-curdled-dairy', title: 'Cream / Curd Curdled' },
            { id: 'paneer-rubbery-hard', title: 'Paneer Hard / Rubbery' },
            { id: 'curry-too-salty', title: 'Too Salty' },
            { id: 'curry-too-sour', title: 'Too Sour' },
            { id: 'curry-too-sweet', title: 'Too Sweet' }
        ],
        'Plain Steamed Rice': [
            { id: 'rice-too-mushy', title: 'Mushy & Clumpy' },
            { id: 'rice-hard-undercooked', title: 'Hard / Undercooked' },
            { id: 'rice-smells-burnt-stuck', title: 'Burnt & Smoky' },
            { id: 'rice-too-salty', title: 'Too Salty' }
        ],
        'Biryani / Pulao': [
            { id: 'biryani-dry-no-moisture', title: 'Too Dry / Chalky' },
            { id: 'rice-hard-undercooked', title: 'Under-cooked' },
            { id: 'biryani-burnt-bottom', title: 'Bottom Scorched' },
            { id: 'rice-too-mushy', title: 'Turned Mushy' },
            { id: 'biryani-too-salty', title: 'Too Salty' }
        ],
        'Chapati / Roti / Paratha': [
            { id: 'chapati-too-hard', title: 'Hard & Stiff' },
            { id: 'chapati-not-puffing', title: 'Fails to Puff' },
            { id: 'dough-too-sticky', title: 'Dough Too Sticky' }
        ],
        'Dosa / Crispy Crepe': [
            { id: 'dosa-sticking-to-pan', title: 'Sticking to Tawa' },
            { id: 'dosa-breaking-crumbly', title: 'Cracking & Breaking' },
            { id: 'dosa-batter-not-fermenting', title: 'Batter Not Fermented' },
            { id: 'batter-too-sour', title: 'Batter Too Sour' }
        ],
        'Idli / Steamed Cakes': [
            { id: 'idli-dense-hard', title: 'Dense & Hard' },
            { id: 'dosa-batter-not-fermenting', title: 'Batter Not Fermented' },
            { id: 'batter-too-sour', title: 'Batter Too Sour' }
        ],
        'Sambar / Rasam / Dal': [
            { id: 'sambar-too-sour-tamarind', title: 'Too Sour' },
            { id: 'rasam-flat-tasteless', title: 'Flat & Bland' },
            { id: 'undercooked-pulses-chana-rajma', title: 'Pulses Undercooked' },
            { id: 'dal-overflowed-cooker-mess', title: 'Dal Overflowed' },
            { id: 'curry-too-salty', title: 'Too Salty' }
        ],
        'Pakodi / Bajji / Fried Snacks': [
            { id: 'fried-snacks-absorbing-oil', title: 'Absorbing Oil' },
            { id: 'pakodi-hard-not-crispy', title: 'Hard Not Crispy' },
            { id: 'pan-sticking-fried-food', title: 'Sticking to Pan' }
        ],
        'Sponge Cake / Cupcake': [
            { id: 'cake-dense-heavy', title: 'Dense & Heavy' },
            { id: 'cake-sunk-middle', title: 'Sunk in Center' },
            { id: 'cake-burnt-outside-raw-inside', title: 'Burnt Outside, Raw' },
            { id: 'cake-dry-crumbly', title: 'Dry & Crumbly' },
            { id: 'cookies-spreading-too-much', title: 'Cookies Spread Flat' }
        ],
        'Gulab Jamun / Sweets': [
            { id: 'gulab-jamun-breaking', title: 'Cracking While Frying' },
            { id: 'gulab-jamun-raw-inside', title: 'Raw Inside' },
            { id: 'sugar-syrup-crystallized', title: 'Syrup Crystallized' },
            { id: 'sweet-mixture-too-hard', title: 'Turned Rock Hard' },
            { id: 'sweet-mixture-too-soft', title: "Won't Set" },
            { id: 'payasam-kheer-too-thick', title: 'Payasam Too Thick' }
        ],
        'Other Dish': [
            { id: 'curry-too-salty', title: 'Dish Too Salty' },
            { id: 'curry-too-spicy', title: 'Dish Too Spicy' },
            { id: 'curry-burnt-bottom', title: 'Food Scorched' },
            { id: 'pan-sticking-fried-food', title: 'Food Sticking' },
            { id: 'vegetables-overcooked-mushy', title: 'Veggies Mushy' },
            { id: 'oil-splattering-violent', title: 'Oil Splattering' }
        ]
    };

    const step1NextBtn = document.getElementById('wizardStep1NextBtn');

    document.addEventListener('click', function(e) {
        const dishBtn = e.target.closest('.dish-option-btn');
        if (dishBtn) {
            e.preventDefault();
            document.querySelectorAll('.dish-option-btn').forEach(b => b.classList.remove('selected'));
            dishBtn.classList.add('selected');
            wizardState.dish = dishBtn.getAttribute('data-dish');
            if (step1NextBtn) {
                step1NextBtn.disabled = false;
            }
            setTimeout(() => {
                if (wizardState.dish && document.getElementById('wizardStep1Content').style.display !== 'none') {
                    goToWizardStep(2);
                }
            }, 300);
        }
    });

    if (step1NextBtn) {
        step1NextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (!wizardState.dish) return;
            goToWizardStep(2);
        });
    }

    function goToWizardStep(step) {
        const badge = document.getElementById('wizardBadgeNumber');
        const title = document.getElementById('wizardStepTitle');
        if (badge) badge.textContent = step;

        const stepTitles = {
            1: "Step 1: What dish are you cooking?",
            2: `Step 2: What happened to your ${wizardState.dish || 'dish'}?`,
            3: "Step 3: Quick Diagnostic Questions",
            4: "Step 4: Your Tailored Recipe Rescue Solution"
        };
        if (title && stepTitles[step]) title.textContent = stepTitles[step];

        ['dotStep1', 'dotStep2', 'dotStep3', 'dotStep4'].forEach((dotId, idx) => {
            const dot = document.getElementById(dotId);
            if (dot) {
                dot.className = 'wizard-dot';
                if (idx + 1 === step) dot.classList.add('active');
                if (idx + 1 < step) dot.classList.add('done');
            }
        });

        const s1 = document.getElementById('wizardStep1Content');
        const s2 = document.getElementById('wizardStep2Content');
        const s3 = document.getElementById('wizardStep3Content');
        const s4 = document.getElementById('wizardStep4Content');

        if (s1) s1.style.display = step === 1 ? 'block' : 'none';
        if (s2) s2.style.display = step === 2 ? 'block' : 'none';
        if (s3) s3.style.display = step === 3 ? 'block' : 'none';
        if (s4) s4.style.display = step === 4 ? 'block' : 'none';

        if (step === 2) populateStep2Problems();

        const wizardCard = document.getElementById('fixMyDishWizard');
        if (wizardCard) wizardCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function populateStep2Problems() {
        const dishLabel = document.getElementById('selectedDishLabel');
        if (dishLabel) dishLabel.textContent = wizardState.dish;

        const container = document.getElementById('wizardProblemOptionsList');
        if (!container) return;

        const problems = dishProblemsMap[wizardState.dish] || dishProblemsMap['Other Dish'];
        let html = '';
        problems.forEach(p => {
            html += `<button type="button" class="problem-option-btn" data-problem-id="${escapeHtml(p.id)}">
                <span class="option-icon">⚠️</span>
                <div class="option-info">
                    <div class="option-title">${escapeHtml(p.title)}</div>
                    <div class="option-sub">Click to select</div>
                </div>
            </button>`;
        });
        container.innerHTML = html;

        const step2NextBtn = document.getElementById('wizardStep2NextBtn');
        if (step2NextBtn) step2NextBtn.disabled = true;
    }

    document.addEventListener('click', function(e) {
        const problemBtn = e.target.closest('.problem-option-btn');
        if (problemBtn) {
            e.preventDefault();
            document.querySelectorAll('.problem-option-btn').forEach(b => b.classList.remove('selected'));
            problemBtn.classList.add('selected');
            wizardState.problemId = problemBtn.getAttribute('data-problem-id');
            wizardState.customProblem = '';
            const step2NextBtn = document.getElementById('wizardStep2NextBtn');
            if (step2NextBtn) step2NextBtn.disabled = false;
            setTimeout(() => {
                if (wizardState.problemId && document.getElementById('wizardStep2Content').style.display !== 'none') {
                    goToWizardStep(3);
                }
            }, 300);
        }
    });

    const backTo1 = document.getElementById('wizardBackToStep1');
    if (backTo1) backTo1.addEventListener('click', () => goToWizardStep(1));

    const step2Next = document.getElementById('wizardStep2NextBtn');
    if (step2Next) {
        step2Next.addEventListener('click', function() {
            if (wizardState.problemId) goToWizardStep(3);
        });
    }

    const applyCustomBtn = document.getElementById('applyCustomProblemBtn');
    const customInput = document.getElementById('customProblemInput');
    if (applyCustomBtn && customInput) {
        applyCustomBtn.addEventListener('click', function() {
            const txt = customInput.value.trim().toLowerCase();
            if (!txt) return;
            let matchedId = null;
            for (let id in db) {
                const item = db[id];
                const corpus = (item.title + ' ' + (item.keywords || []).join(' ') + ' ' + (item.symptoms || []).join(' ')).toLowerCase();
                if (corpus.includes(txt)) { matchedId = id; break; }
            }
            if (!matchedId) matchedId = 'curry-too-salty';
            wizardState.problemId = matchedId;
            wizardState.customProblem = txt;
            goToWizardStep(3);
        });
    }

    const backTo2 = document.getElementById('wizardBackToStep2');
    if (backTo2) backTo2.addEventListener('click', () => goToWizardStep(2));

    const genBtn = document.getElementById('wizardGenerateResultBtn');
    if (genBtn) {
        genBtn.addEventListener('click', function() {
            const sevEl = document.querySelector('input[name="severityLevel"]:checked');
            const stageEl = document.querySelector('input[name="cookingStage"]:checked');
            const dairyEl = document.querySelector('input[name="hasDairy"]:checked');
            wizardState.severity = sevEl ? sevEl.value : 'mild';
            wizardState.cookingStage = stageEl ? stageEl.value : 'cooking';
            wizardState.hasDairy = dairyEl ? dairyEl.value : 'no';
            renderWizardResult();
            goToWizardStep(4);
        });
    }

    function renderWizardResult() {
        const resContainer = document.getElementById('wizardResultContainer');
        if (!resContainer) return;

        const item = db[wizardState.problemId];
        if (!item) {
            resContainer.innerHTML = `<div style="text-align:center; padding:30px;">
                <div style="font-size:40px;">⚠️</div>
                <h3 style="font-family: 'Playfair Display', Georgia, serif; color: var(--earth-brown);">No Direct Match</h3>
                <p>Please consult the full directory below.</p>
            </div>`;
            return;
        }

        addRecent(item.id);

        let stepsHtml = '';
        (item.immediate_steps || []).forEach((st, idx) => {
            stepsHtml += `<li class="rescue-step-item">
                <div class="rescue-step-number">${idx + 1}</div>
                <div style="flex:1;">${escapeHtml(st)}</div>
            </li>`;
        });

        let dontHtml = '';
        (item.what_not_to_do || []).forEach(d => {
            dontHtml += `<li class="not-to-do-item"><span>❌</span> <span>${escapeHtml(d)}</span></li>`;
        });

        let tailoredNote = '';
        if (wizardState.hasDairy === 'yes' && wizardState.problemId.includes('salty')) {
            tailoredNote = `<div style="background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%); border: 1.5px solid #BFDBFE; border-radius: 12px; padding: 14px 18px; margin-bottom: 18px; font-size: 14px; color: #1E40AF; line-height: 1.6;">
                🥛 <strong>Dairy-Specific Adjustment:</strong> Since your dish contains dairy or coconut milk, stir in 2-3 tbsp of unsweetened fresh cream, milk, or fresh coconut milk to dilute the salt while maintaining the silky texture!
            </div>`;
        } else if (wizardState.cookingStage === 'finished' && wizardState.problemId.includes('salty')) {
            tailoredNote = `<div style="background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%); border: 1.5px solid #FDE68A; border-radius: 12px; padding: 14px 18px; margin-bottom: 18px; font-size: 14px; color: #92400E; line-height: 1.6;">
                ⏱️ <strong>Finished Dish Tip:</strong> The stove is already off. Do not boil vigorously; gently stir in warm unsalted liquid or a squeeze of lemon off-heat so delicate spices don't turn bitter.
            </div>`;
        }

        resContainer.innerHTML = `
            <div style="background: linear-gradient(135deg, #FFF1F2 0%, #FEF3C7 100%); padding: 24px; border-radius: 18px; border: 1.5px solid #FED7AA; margin-bottom: 24px; position: relative; overflow: hidden;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 8px;">
                    <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #DC2626; letter-spacing: 0.6px;">Solution for: ${escapeHtml(wizardState.dish)}</span>
                    <span class="trouble-severity severity-moderate">Assessed: ${escapeHtml(wizardState.severity.toUpperCase())}</span>
                </div>
                <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: clamp(22px, 3vw, 26px); font-weight: 900; color: var(--earth-brown); margin: 0 0 10px; letter-spacing: -0.4px; line-height: 1.2;">
                    ${escapeHtml(item.title)}
                </h3>
                <p style="font-size: 14.5px; color: var(--text-muted); margin: 0; line-height: 1.6;">${escapeHtml(item.summary)}</p>
            </div>

            ${tailoredNote}

            <div style="margin-bottom: 24px;">
                <h4 style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; font-weight: 800; color: var(--earth-brown); margin-bottom: 14px; display:flex; align-items:center; gap:8px; letter-spacing: -0.2px;">
                    <span>🚨</span> <span>Immediate Action Steps</span>
                </h4>
                <ol class="rescue-steps-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    ${stepsHtml}
                </ol>
            </div>

            <div class="not-to-do-box" style="margin-bottom: 24px;">
                <h4 class="not-to-do-title" style="margin: 0 0 12px; font-size: 17px;">
                    <span>⚠️</span> <span>Mistakes to Avoid</span>
                </h4>
                <ul class="not-to-do-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    ${dontHtml}
                </ul>
            </div>

            <div class="science-card">
                <div class="science-title"><span>🔬</span> <span>Why This Happened</span></div>
                <div class="science-content">${escapeHtml(item.cooking_science)}</div>
            </div>

            <div style="margin-top: 20px;">
                <a href="recipe-rescue.php?problem=${encodeURIComponent(item.id)}#problemDetailView" class="btn-action-outline" style="border-color: #DC2626; color: #DC2626; padding: 11px 20px;">
                    <span>📖</span>
                    <span>View Full Comprehensive Guide</span>
                </a>
            </div>
        `;
    }

    const resetBtn = document.getElementById('wizardResetBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            wizardState = {
                dish: '',
                problemId: '',
                customProblem: '',
                severity: 'mild',
                cookingStage: 'cooking',
                hasDairy: 'no'
            };
            document.querySelectorAll('.dish-option-btn, .problem-option-btn').forEach(b => b.classList.remove('selected'));
            if (step1NextBtn) step1NextBtn.disabled = true;
            goToWizardStep(1);
        });
    }

    syncFavButtons();
    renderFavorites();
    renderRecents();

})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>