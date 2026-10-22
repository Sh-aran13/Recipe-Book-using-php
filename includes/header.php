<?php
// includes/header.php - Global Header for Amma's Recipe Book
declare(strict_types=1);

if (!isset($page_title)) {
    $page_title = "Amma's Recipe Book — Homestyle Cooking Companion";
}
if (!isset($current_page)) {
    $current_page = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="Amma's Recipe Book is a loving, easy-to-use digital cooking companion designed for mothers and home cooks. Simple ingredients, clear steps, and delicious authentic Indian homemade food.">
    
    <!-- Design & Styling System (Embedded for standalone offline execution) -->
    <style>
        /* CSS RESET & CUSTOM PROPERTIES */
        :root {
            --bg-body: #FFFDF9;
            --bg-surface: #FFFFFF;
            --bg-warm: #FFF8EE;
            --bg-accent-light: #FEF3C7;
            --bg-terracotta-light: #FBEBE6;
            
            --primary: #C2410C; /* Warm Terracotta */
            --primary-hover: #9A3412;
            --primary-light: #FFF1EB;
            
            --saffron: #D97706; /* Saffron gold */
            --saffron-light: #FEF3C7;
            
            --herb-green: #15803D; /* Fresh curry leaf green */
            --herb-green-light: #DCFCE7;
            
            --earth-brown: #451A03;
            --text-main: #292524;
            --text-muted: #57534E;
            --text-light: #78716C;
            
            --border-color: #E7E5E4;
            --border-warm: #F2E8DC;
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(69, 26, 3, 0.08), 0 2px 4px -2px rgba(69, 26, 3, 0.05);
            --shadow-lg: 0 10px 15px -3px rgba(69, 26, 3, 0.08), 0 4px 6px -4px rgba(69, 26, 3, 0.04);
            --shadow-card: 0 4px 20px -2px rgba(69, 26, 3, 0.07);
            --shadow-hover: 0 12px 28px -4px rgba(194, 65, 12, 0.16);
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-xl: 24px;
            --radius-pill: 9999px;
            
            --font-serif: 'Georgia', 'Cambria', 'Times New Roman', serif;
            --font-sans: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            
            --transition: all 0.25s ease-in-out;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            font-size: 16px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ACCESSIBLE FOCUS */
        :focus-visible {
            outline: 3px solid var(--primary);
            outline-offset: 3px;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        button, input, select, textarea {
            font: inherit;
        }

        /* CONTAINER */
        .container {
            width: 100%;
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* TOP BANNER / BRAND BAR */
        .brand-topbar {
            background: linear-gradient(90deg, #7C2D12 0%, #9A3412 50%, #C2410C 100%);
            color: #FEF3C7;
            font-size: 13.5px;
            padding: 6px 0;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.3px;
        }
        .brand-topbar span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* HEADER & NAVBAR */
        .site-header {
            background-color: var(--bg-surface);
            border-bottom: 1px solid var(--border-warm);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(69, 26, 3, 0.04);
        }
        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 76px;
            gap: 20px;
        }

        /* LOGO */
        .logo-group {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            flex-shrink: 0;
        }
        .logo-icon-wrap {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            background: #FFFBEB;
            border: 1px solid #FDE68A;
            transition: transform 0.3s ease;
        }
        .logo-group:hover .logo-icon-wrap {
            transform: rotate(-5deg) scale(1.05);
        }
        .logo-icon-wrap img, .logo-icon-wrap svg {
            width: 40px;
            height: 40px;
        }
        .logo-text-wrap {
            display: flex;
            flex-direction: column;
        }
        .site-title {
            font-family: var(--font-serif);
            font-size: 22px;
            font-weight: 700;
            color: var(--earth-brown);
            line-height: 1.1;
            letter-spacing: -0.3px;
        }
        .site-title span {
            color: var(--primary);
        }
        .site-tagline {
            font-size: 12px;
            color: var(--saffron);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-top: 2px;
        }

        /* NAVIGATION LINKS */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-link {
            padding: 8px 16px;
            border-radius: var(--radius-pill);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }
        .nav-link:hover {
            color: var(--primary);
            background-color: var(--primary-light);
        }
        .nav-link.active {
            color: var(--primary);
            background-color: var(--primary-light);
            font-weight: 700;
        }
        .fav-count-pill {
            background-color: var(--primary);
            color: #FFF;
            font-size: 11px;
            padding: 1px 7px;
            border-radius: var(--radius-pill);
            font-weight: 700;
        }

        /* HEADER SEARCH QUICK BAR */
        .header-search {
            position: relative;
            width: 280px;
            flex-shrink: 1;
        }
        .header-search-input {
            width: 100%;
            height: 42px;
            padding: 8px 40px 8px 16px;
            background-color: var(--bg-warm);
            border: 1.5px solid var(--border-warm);
            border-radius: var(--radius-pill);
            font-size: 14px;
            color: var(--text-main);
            transition: var(--transition);
        }
        .header-search-input:focus {
            background-color: #FFF;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(194, 65, 12, 0.12);
            outline: none;
        }
        .header-search-btn {
            position: absolute;
            right: 4px;
            top: 50%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: none;
            background: var(--primary);
            color: #FFF;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        .header-search-btn:hover {
            background: var(--primary-hover);
        }

        /* MOBILE MENU TOGGLE */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            padding: 8px;
            color: var(--earth-brown);
            cursor: pointer;
            border-radius: var(--radius-sm);
        }

        /* MOBILE DRAWER */
        .mobile-nav-drawer {
            display: none;
            background-color: var(--bg-surface);
            border-bottom: 1px solid var(--border-warm);
            padding: 16px 20px;
            flex-direction: column;
            gap: 12px;
            box-shadow: var(--shadow-md);
        }
        .mobile-nav-drawer.open {
            display: flex;
        }
        .mobile-nav-link {
            padding: 10px 14px;
            font-weight: 600;
            color: var(--text-muted);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .mobile-nav-link.active, .mobile-nav-link:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        /* TYPOGRAPHY UTILITIES */
        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--primary);
            font-size: 13.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .section-heading {
            font-family: var(--font-serif);
            font-size: 32px;
            font-weight: 700;
            color: var(--earth-brown);
            line-height: 1.2;
            letter-spacing: -0.5px;
        }
        .section-subheading {
            color: var(--text-muted);
            font-size: 16px;
            margin-top: 6px;
            max-width: 600px;
        }
        .section-header-wrap {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* RECIPE CARDS GRID */
        .recipes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }

        /* RECIPE CARD COMPONENT */
        .recipe-card {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-warm);
            border-radius: var(--radius-lg);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-card);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            position: relative;
        }
        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: #FDBA74;
        }
        .card-image-wrap {
            position: relative;
            width: 100%;
            height: 180px;
            background-color: var(--bg-warm);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .recipe-card:hover .card-img {
            transform: scale(1.06);
        }
        .card-placeholder-img {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .recipe-icon {
            font-size: 56px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }
        .recipe-card:hover .recipe-icon {
            transform: scale(1.15) rotate(-4deg);
        }
        .cuisine-pill {
            position: absolute;
            bottom: 12px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--earth-brown);
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: var(--radius-pill);
            box-shadow: var(--shadow-sm);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-badges {
            position: absolute;
            top: 12px;
            left: 12px;
            display: flex;
            gap: 6px;
            z-index: 2;
        }
        .diet-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: var(--radius-pill);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(4px);
            box-shadow: var(--shadow-sm);
        }
        .diet-badge.veg {
            color: #15803D;
            border: 1px solid #BBF7D0;
        }
        .diet-badge.veg .diet-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #16A34A;
        }
        .diet-badge.non-veg {
            color: #B91C1C;
            border: 1px solid #FECACA;
        }
        .diet-badge.non-veg .diet-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #DC2626;
        }

        .diff-badge {
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: var(--radius-pill);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow-sm);
        }
        .diff-easy { color: #047857; }
        .diff-medium { color: #B45309; }
        .diff-hard { color: #B91C1C; }

        .btn-fav-card {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            z-index: 2;
        }
        .btn-fav-card:hover {
            transform: scale(1.15);
            color: #EF4444;
            background: #FFF;
        }
        .btn-fav-card.is-fav {
            color: #EF4444;
            background: #FFF;
        }
        .btn-fav-card.is-fav .heart-icon {
            fill: #EF4444;
        }

        .card-body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .card-meta-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-light);
            margin-bottom: 8px;
        }
        .card-cat {
            color: var(--saffron);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 11.5px;
        }
        .card-time {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            color: var(--text-muted);
        }
        .card-title {
            font-family: var(--font-serif);
            font-size: 19px;
            font-weight: 700;
            color: var(--earth-brown);
            line-height: 1.3;
            margin-bottom: 4px;
        }
        .card-title a:hover {
            color: var(--primary);
        }
        .card-regional {
            font-size: 13px;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 8px;
        }
        .card-desc {
            font-size: 13.5px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px dashed var(--border-warm);
        }
        .card-servings {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .btn-view-recipe {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--primary);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            background-color: var(--primary-light);
            transition: var(--transition);
        }
        .btn-view-recipe:hover {
            background-color: var(--primary);
            color: #FFF;
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 22px;
            font-size: 15px;
            font-weight: 600;
            border-radius: var(--radius-pill);
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
            color: #FFF;
            box-shadow: 0 4px 12px rgba(194, 65, 12, 0.25);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
            box-shadow: 0 6px 16px rgba(194, 65, 12, 0.35);
            transform: translateY(-2px);
            color: #FFF;
        }
        .btn-secondary {
            background: var(--bg-surface);
            color: var(--earth-brown);
            border-color: var(--border-color);
        }
        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
        }

        /* ACCESSIBILITY & RESPONSIVE BREAKPOINTS */
        @media (max-width: 900px) {
            .header-search { display: none; }
            .main-nav { display: none; }
            .mobile-menu-btn { display: block; }
            .section-heading { font-size: 26px; }
        }
        @media (max-width: 600px) {
            .container { padding: 0 16px; }
            .recipes-grid { grid-template-columns: 1fr; }
            .section-header-wrap { flex-direction: column; align-items: flex-start; }
            .site-title { font-size: 19px; }
        }

        /* PRINT STYLES */
        @media print {
            .brand-topbar, .site-header, .mobile-nav-drawer, .site-footer, .no-print {
                display: none !important;
            }
            body {
                background: #FFF !important;
                color: #000 !important;
            }
        }
    </style>
</head>
<body>

    <!-- BRAND TOP BAR -->
    <div class="brand-topbar" role="region" aria-label="Announcement">
        <div class="container">
            <span>✨ Welcome to Amma's Kitchen — Authentic Homestyle Telugu & Indian Recipes Made Simple</span>
        </div>
    </div>

    <!-- SITE HEADER -->
    <header class="site-header" role="banner">
        <div class="container header-inner">
            <!-- LOGO -->
            <a href="index.php" class="logo-group" aria-label="Amma's Recipe Book - Home">
                <div class="logo-icon-wrap">
                    <img src="assets/images/logo/amma-logo.svg" alt="Cooking Pot Logo" width="40" height="40">
                </div>
                <div class="logo-text-wrap">
                    <div class="site-title">Amma's <span>Recipe Book</span></div>
                    <div class="site-tagline">Homestyle Digital Companion</div>
                </div>
            </a>

            <!-- DESKTOP NAVIGATION -->
            <nav class="main-nav" role="navigation" aria-label="Main Navigation">
                <a href="index.php" class="nav-link <?= $current_page === 'home' ? 'active' : '' ?>">Home</a>
                <a href="recipes.php" class="nav-link <?= $current_page === 'recipes' ? 'active' : '' ?>">All Recipes</a>
                <a href="categories.php" class="nav-link <?= $current_page === 'categories' ? 'active' : '' ?>">Categories</a>
                <a href="favorites.php" class="nav-link <?= $current_page === 'favorites' ? 'active' : '' ?>">
                    <span>Favorites</span>
                    <span class="fav-count-pill" id="headerFavBadge" style="display:none;">0</span>
                </a>
            </nav>

            <!-- HEADER SEARCH -->
            <form action="recipes.php" method="GET" class="header-search" role="search">
                <label for="headerSearchInput" class="visually-hidden" style="position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0,0,0,0);">Search recipes</label>
                <input type="text" id="headerSearchInput" name="q" class="header-search-input" placeholder="Search dish, dal, spices..." aria-label="Search recipes">
                <button type="submit" class="header-search-btn" aria-label="Submit search">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>

            <!-- MOBILE MENU BUTTON -->
            <button type="button" class="mobile-menu-btn" id="mobileMenuToggle" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobileDrawer">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- MOBILE DRAWER -->
        <div class="mobile-nav-drawer" id="mobileDrawer" role="region" aria-label="Mobile Navigation">
            <form action="recipes.php" method="GET" style="margin-bottom: 8px;">
                <input type="text" name="q" class="header-search-input" placeholder="Search recipes or ingredients..." style="width: 100%; border-radius: var(--radius-md);">
            </form>
            <a href="index.php" class="mobile-nav-link <?= $current_page === 'home' ? 'active' : '' ?>">🏠 Home</a>
            <a href="recipes.php" class="mobile-nav-link <?= $current_page === 'recipes' ? 'active' : '' ?>">📖 All Recipes (42)</a>
            <a href="categories.php" class="mobile-nav-link <?= $current_page === 'categories' ? 'active' : '' ?>">📂 Categories</a>
            <a href="favorites.php" class="mobile-nav-link <?= $current_page === 'favorites' ? 'active' : '' ?>">
                <span>❤️ My Saved Favorites</span>
                <span class="fav-count-pill" id="mobileFavBadge" style="display:none;">0</span>
            </a>
        </div>
    </header>

    <main id="mainContent" style="flex: 1;">
