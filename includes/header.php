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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#C2410C">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="Amma's Recipe Book is a loving, easy-to-use digital cooking companion designed for mothers and home cooks. Simple ingredients, clear steps, and delicious authentic Indian homemade food.">
    
    <!-- Early Client Storage Helper -->
    <script>
        (function() {
            window.AmmaStorage = window.AmmaStorage || {
                get: function(key, defaultVal) {
                    try {
                        const val = localStorage.getItem(key);
                        return val ? JSON.parse(val) : defaultVal;
                    } catch (e) {
                        return defaultVal;
                    }
                },
                set: function(key, val) {
                    try {
                        localStorage.setItem(key, JSON.stringify(val));
                    } catch (e) {}
                }
            };
        })();
    </script>

    <!-- Design & Styling System (Embedded for standalone offline execution) -->
    <style>
        /* CSS RESET & CUSTOM PROPERTIES */
        :root {
            --bg-body: #FFFDF9;
            --bg-surface: #FFFFFF;
            --bg-warm: #FFF8EE;
            --bg-accent-light: #FEF3C7;
            --bg-terracotta-light: #FBEBE6;
            
            --primary: #C2410C;
            --primary-hover: #9A3412;
            --primary-light: #FFF1EB;
            --primary-soft: #FEE9D9;
            
            --saffron: #D97706;
            --saffron-light: #FEF3C7;
            
            --herb-green: #15803D;
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

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ============================================================
           NEW TOP ANNOUNCEMENT BAR
           ============================================================ */
        .brand-topbar {
            background: linear-gradient(90deg, #7C2D12 0%, #9A3412 40%, #C2410C 100%);
            color: #FEF3C7;
            font-size: 13px;
            padding: 7px 0;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.4px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }
        .brand-topbar span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* ============================================================
           NEW HEADER LAYOUT — Clean, Clear, All Links Visible
           ============================================================ */
        .site-header {
            background-color: var(--bg-surface);
            border-bottom: 2px solid var(--border-warm);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 12px rgba(69, 26, 3, 0.06);
        }

        /* --- ROW 1: Brand Bar (Logo + Search + Favorites) --- */
        .header-brand-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 0;
            border-bottom: 1px solid var(--border-warm);
        }

        .logo-group {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            flex-shrink: 0;
        }
        .logo-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            background: linear-gradient(145deg, #FFFBEB 0%, #FEF3C7 100%);
            border: 1px solid #FDE68A;
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .logo-group:hover .logo-icon-wrap {
            transform: rotate(-6deg) scale(1.08);
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
            font-size: 24px;
            font-weight: 800;
            color: var(--earth-brown);
            line-height: 1.1;
            letter-spacing: -0.4px;
        }
        .site-title span {
            color: var(--primary);
        }
        .site-tagline {
            font-size: 11.5px;
            color: var(--saffron);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            margin-top: 3px;
        }

        /* Brand bar right side: search + favorites */
        .header-brand-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        /* Big, clear search box */
        .header-search {
            position: relative;
            width: 320px;
        }
        .header-search-input {
            width: 100%;
            height: 46px;
            padding: 10px 48px 10px 18px;
            background-color: var(--bg-warm);
            border: 1.5px solid var(--border-warm);
            border-radius: var(--radius-pill);
            font-size: 14.5px;
            color: var(--text-main);
            transition: var(--transition);
        }
        .header-search-input::placeholder {
            color: var(--text-light);
        }
        .header-search-input:focus {
            background-color: #FFF;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(194, 65, 12, 0.12);
            outline: none;
        }
        .header-search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
            color: #FFF;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            box-shadow: 0 2px 6px rgba(194, 65, 12, 0.3);
        }
        .header-search-btn:hover {
            background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
            transform: translateY(-50%) scale(1.08);
        }

        /* Favorites icon button */
        .fav-quick-btn {
            position: relative;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--bg-warm);
            border: 1.5px solid var(--border-warm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #DC2626;
            font-size: 20px;
            transition: var(--transition);
            text-decoration: none;
            flex-shrink: 0;
        }
        .fav-quick-btn:hover {
            background: #FEE2E2;
            border-color: #FCA5A5;
            transform: scale(1.08);
        }
        .fav-count-pill {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            color: #FFF;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: var(--radius-pill);
            font-weight: 800;
            box-shadow: 0 2px 6px rgba(220, 38, 38, 0.4);
            letter-spacing: 0.3px;
        }

        /* Sidebar toggle button (now in brand bar) */
        .sidebar-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
            border: 1.5px solid #FDE68A;
            padding: 10px 16px;
            color: var(--earth-brown);
            cursor: pointer;
            border-radius: var(--radius-pill);
            font-size: 14px;
            font-weight: 700;
            transition: var(--transition);
            box-shadow: 0 2px 6px rgba(217, 119, 6, 0.12);
            flex-shrink: 0;
        }
        .sidebar-toggle-btn:hover {
            background: linear-gradient(135deg, #FEF3C7 0%, #FCD34D 100%);
            color: #7C2D12;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.22);
        }
        .sidebar-toggle-btn svg {
            flex-shrink: 0;
            color: var(--primary);
        }

        /* ============================================================
           ROW 2: PRIMARY NAVIGATION — All Links Fully Visible
           ============================================================ */
        .header-primary-nav {
            background: linear-gradient(180deg, #FFFDF9 0%, #FFF8EE 100%);
            border-top: 1px solid var(--border-warm);
        }
        .header-primary-nav-inner {
            display: flex;
            align-items: stretch;
            justify-content: center;
            gap: 4px;
            padding: 6px 0;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .header-primary-nav-inner::-webkit-scrollbar {
            display: none;
        }

        .primary-nav-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: var(--text-muted);
            font-weight: 700;
            font-size: 14.5px;
            text-decoration: none;
            border-radius: var(--radius-md);
            transition: var(--transition);
            white-space: nowrap;
            position: relative;
            border: 1.5px solid transparent;
        }
        .primary-nav-link .nav-emoji {
            font-size: 18px;
            line-height: 1;
            transition: transform 0.25s ease;
        }
        .primary-nav-link:hover {
            color: var(--primary);
            background: #FFFFFF;
            border-color: #FDE68A;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(194, 65, 12, 0.1);
        }
        .primary-nav-link:hover .nav-emoji {
            transform: scale(1.15);
        }
        .primary-nav-link.active {
            color: #FFFFFF;
            background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
            border-color: #C2410C;
            box-shadow: 0 4px 14px rgba(194, 65, 12, 0.35);
        }
        .primary-nav-link.active .nav-emoji {
            transform: scale(1.1);
        }

        /* Special accent styles for Rescue & Academy */
        .primary-nav-link--rescue {
            color: #991B1B;
        }
        .primary-nav-link--rescue .nav-emoji {
            filter: drop-shadow(0 0 2px rgba(220, 38, 38, 0.4));
        }
        .primary-nav-link--rescue:hover {
            background: #FEE2E2;
            border-color: #FECACA;
            color: #7F1D1D;
        }
        .primary-nav-link--rescue.active {
            background: linear-gradient(135deg, #DC2626 0%, #991B1B 100%) !important;
            border-color: #991B1B;
            color: #FFFFFF !important;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35);
        }

        .primary-nav-link--academy {
            color: #92400E;
        }
        .primary-nav-link--academy:hover {
            background: #FEF3C7;
            border-color: #FDE68A;
        }
        .primary-nav-link--academy.active {
            background: linear-gradient(135deg, #D97706 0%, #B45309 100%) !important;
            border-color: #B45309;
            color: #FFFFFF !important;
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.35);
        }

        /* Small badge on nav links */
        .nav-count-badge {
            font-size: 11px;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: var(--radius-pill);
            background: rgba(194, 65, 12, 0.12);
            color: var(--primary);
            margin-left: 2px;
        }
        .primary-nav-link.active .nav-count-badge {
            background: rgba(255, 255, 255, 0.28);
            color: #FFFFFF;
        }
        .primary-nav-link--rescue .nav-count-badge {
            background: #FEE2E2;
            color: #DC2626;
        }
        .primary-nav-link--rescue.active .nav-count-badge {
            background: rgba(255, 255, 255, 0.28);
            color: #FFFFFF;
        }

        /* ============================================================
           SIDEBAR OVERLAY & APP SIDEBAR (unchanged functionality)
           ============================================================ */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(41, 37, 36, 0.65);
            backdrop-filter: blur(4px);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .app-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 320px;
            max-width: 88vw;
            height: 100vh;
            background: #FFFFFF;
            z-index: 1000;
            box-shadow: 6px 0 30px rgba(41, 37, 36, 0.25);
            transform: translateX(-100%);
            transition: transform 0.32s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .app-sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 22px 20px 18px;
            background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
            border-bottom: 1.5px solid #FDE68A;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .sidebar-brand-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #FFFFFF;
            border: 1px solid #FDE68A;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
        }
        .sidebar-brand-title {
            font-family: var(--font-serif);
            font-size: 18px;
            font-weight: 800;
            color: var(--earth-brown);
            line-height: 1.1;
        }
        .sidebar-brand-sub {
            font-size: 11px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }
        .sidebar-close-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(120, 53, 15, 0.2);
            background: rgba(255, 255, 255, 0.8);
            color: var(--earth-brown);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }
        .sidebar-close-btn:hover {
            background: #EF4444;
            color: #FFFFFF;
            border-color: #EF4444;
            transform: rotate(90deg);
        }

        .sidebar-body {
            flex: 1;
            overflow-y: auto;
            padding: 18px 16px 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            scrollbar-width: thin;
            scrollbar-color: #FED7AA transparent;
        }
        .sidebar-body::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-body::-webkit-scrollbar-thumb {
            background: #FED7AA;
            border-radius: 10px;
        }

        .sidebar-section-title {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            padding: 0 10px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-nav-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin: 0;
            padding: 0;
        }

        .sidebar-nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 12px;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 14.5px;
            text-decoration: none;
            transition: var(--transition);
            position: relative;
        }
        .sidebar-nav-item a:hover {
            background: var(--primary-light);
            color: var(--primary);
            transform: translateX(3px);
        }
        .sidebar-nav-item a.active {
            background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
            color: #FFFFFF;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(194, 65, 12, 0.28);
        }
        .sidebar-nav-item a.active:hover {
            color: #FFFFFF;
            transform: none;
        }
        .sidebar-icon {
            font-size: 19px;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
        }
        .sidebar-badge {
            margin-left: auto;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: var(--radius-pill);
            font-weight: 700;
        }
        .sidebar-badge-academy {
            background: #FEF3C7;
            color: #92400E;
            border: 1px solid #FDE68A;
        }
        .sidebar-badge-rescue {
            background: #FEE2E2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }
        .sidebar-nav-item a.active .sidebar-badge {
            background: rgba(255, 255, 255, 0.25);
            color: #FFFFFF;
            border-color: rgba(255, 255, 255, 0.4);
        }

        .sidebar-feature-card {
            background: linear-gradient(135deg, #FFF1F2 0%, #FFE4E6 100%);
            border: 1.5px solid #FECDD3;
            border-radius: 14px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .sidebar-feature-card h4 {
            font-family: var(--font-serif);
            font-size: 15px;
            font-weight: 800;
            color: #9F1239;
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
        }
        .sidebar-feature-card p {
            font-size: 12px;
            line-height: 1.45;
            color: #881337;
            margin: 0;
        }
        .sidebar-feature-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            background: #E11D48;
            color: #FFF !important;
            font-weight: 700;
            font-size: 12px;
            border-radius: var(--radius-pill);
            text-decoration: none;
            transition: var(--transition);
            margin-top: 4px;
        }
        .sidebar-feature-btn:hover {
            background: #BE123C;
            transform: translateY(-1px);
        }

        /* ============================================================
           RESPONSIVE BREAKPOINTS
           ============================================================ */
        @media (max-width: 1024px) {
            .header-search {
                width: 240px;
            }
            .primary-nav-link {
                padding: 11px 14px;
                font-size: 13.5px;
            }
            .primary-nav-link .nav-emoji {
                font-size: 16px;
            }
        }

        @media (max-width: 860px) {
            .header-brand-bar {
                flex-wrap: wrap;
                padding: 12px 0;
            }
            .header-brand-actions {
                width: 100%;
                justify-content: space-between;
            }
            .header-search {
                flex: 1;
                width: auto;
            }
            .header-primary-nav-inner {
                justify-content: flex-start;
                padding-left: 4px;
                padding-right: 4px;
            }
            .site-title {
                font-size: 20px;
            }
            .site-tagline {
                font-size: 10px;
            }
        }

        /* ANDROID & MOBILE OPTIMIZATIONS (<= 768px) */
        @media (max-width: 768px) {
            body {
                /* Padding bottom so content is never hidden behind Android bottom navigation bar */
                padding-bottom: calc(66px + env(safe-area-inset-bottom, 0px));
                -webkit-tap-highlight-color: rgba(194, 65, 12, 0.1);
            }
            input, select, textarea {
                /* Prevents automatic zoom on mobile devices */
                font-size: 16px !important;
            }

            /* HIDE TOP NAV LINKS & SIDEBAR ON MOBILE (as bottom nav links are present) */
            .header-primary-nav {
                display: none !important;
            }
            .sidebar-toggle-btn {
                display: none !important;
            }
            .app-sidebar,
            .sidebar-overlay {
                display: none !important;
            }

            /* Clean mobile brand bar */
            .header-brand-bar {
                padding: 10px 0;
            }
            .header-brand-actions {
                gap: 8px;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 0 14px;
            }
            .brand-topbar {
                font-size: 11.5px;
                padding: 5px 8px;
                line-height: 1.35;
            }
            .header-brand-bar {
                padding: 8px 0;
                gap: 10px;
            }
            .logo-icon-wrap {
                width: 40px;
                height: 40px;
                border-radius: 10px;
            }
            .logo-icon-wrap img, .logo-icon-wrap svg {
                width: 28px;
                height: 28px;
            }
            .site-title {
                font-size: 17px;
            }
            .site-tagline {
                font-size: 9.5px;
                letter-spacing: 0.8px;
            }
            .header-search {
                width: 100%;
            }
            .header-search-input {
                height: 40px;
                font-size: 14px !important;
                padding: 6px 42px 6px 14px;
            }
            .header-search-btn {
                width: 32px;
                height: 32px;
            }
            .fav-quick-btn {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }

        /* PRINT STYLES */
        @media print {
            .brand-topbar, .site-header, .app-sidebar, .sidebar-overlay, .no-print {
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

    <!-- ============================================================
         SITE HEADER — NEW TWO-ROW LAYOUT
         Row 1: Brand + Search + Favorites + Menu Button
         Row 2: Full-Width Primary Navigation
         ============================================================ -->
    <header class="site-header" role="banner">

        <!-- ROW 1: BRAND BAR -->
        <div class="header-brand-bar">
            <div class="container" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">

                <!-- LEFT: Menu button + Logo -->
                <div style="display: flex; align-items: center; gap: 14px;">
                    <button type="button" class="sidebar-toggle-btn" id="sidebarOpenBtn" aria-label="Open Navigation Sidebar" aria-haspopup="true" title="Open Full Menu Sidebar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                        <span>Menu</span>
                    </button>

                    <a href="index.php" class="logo-group" aria-label="Amma's Recipe Book - Home">
                        <div class="logo-icon-wrap">
                            <img src="assets/images/logo/amma-logo.svg" alt="Cooking Pot Logo" width="40" height="40">
                        </div>
                        <div class="logo-text-wrap">
                            <div class="site-title">Amma's <span>Recipe Book</span></div>
                            <div class="site-tagline">Master Chef Academy</div>
                        </div>
                    </a>
                </div>

                <!-- RIGHT: Search + Favorites -->
                <div class="header-brand-actions">
                    <form action="recipes.php" method="GET" class="header-search" role="search">
                        <input type="text" name="q" class="header-search-input" placeholder="Search recipes, ingredients..." aria-label="Search recipes">
                        <button type="submit" class="header-search-btn" aria-label="Submit Search">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </form>

                    <a href="favorites.php" class="fav-quick-btn" title="Saved Favorites" aria-label="Saved Favorites">
                        ❤️
                        <span class="fav-count-pill" id="headerFavBadge" style="display:none;">0</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- ROW 2: PRIMARY NAVIGATION — ALL LINKS FULLY VISIBLE -->
        <nav class="header-primary-nav" role="navigation" aria-label="Primary Navigation">
            <div class="container">
                <div class="header-primary-nav-inner">
                    <a href="index.php" class="primary-nav-link <?= ($current_page ?? '') === 'home' ? 'active' : '' ?>">
                        <span class="nav-emoji">🏠</span>
                        <span>Home</span>
                    </a>
                    <a href="academy.php" class="primary-nav-link primary-nav-link--academy <?= ($current_page ?? '') === 'academy' ? 'active' : '' ?>">
                        <span class="nav-emoji">🎓</span>
                        <span>Academy</span>
                    </a>
                    <a href="recipe-rescue.php" class="primary-nav-link primary-nav-link--rescue <?= ($current_page ?? '') === 'recipe_rescue' ? 'active' : '' ?>">
                        <span class="nav-emoji">🛟</span>
                        <span>Recipe Rescue</span>
                    </a>
                    <a href="what-can-i-cook.php" class="primary-nav-link <?= ($current_page ?? '') === 'what_can_i_cook' ? 'active' : '' ?>">
                        <span class="nav-emoji">🥕</span>
                        <span>Pantry</span>
                    </a>
                    <a href="recipes.php" class="primary-nav-link <?= ($current_page ?? '') === 'recipes' ? 'active' : '' ?>">
                        <span class="nav-emoji">📖</span>
                        <span>Recipes</span>
                        <span class="nav-count-badge">75</span>
                    </a>
                    <a href="categories.php" class="primary-nav-link <?= ($current_page ?? '') === 'categories' ? 'active' : '' ?>">
                        <span class="nav-emoji">📂</span>
                        <span>Categories</span>
                    </a>
                    <a href="knowledge-centre.php" class="primary-nav-link <?= ($current_page ?? '') === 'knowledge_centre' ? 'active' : '' ?>">
                        <span class="nav-emoji">💡</span>
                        <span>Science</span>
                    </a>
                    <a href="challenges.php" class="primary-nav-link <?= ($current_page ?? '') === 'challenges' ? 'active' : '' ?>">
                        <span class="nav-emoji">🏆</span>
                        <span>Challenges</span>
                    </a>
                    <a href="progress.php" class="primary-nav-link <?= ($current_page ?? '') === 'progress' ? 'active' : '' ?>">
                        <span class="nav-emoji">📊</span>
                        <span>Progress</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay" aria-hidden="true"></div>

    <!-- MODERN APP SIDEBAR (unchanged functionality) -->
    <aside class="app-sidebar" id="appSidebar" role="navigation" aria-label="Site Sidebar Navigation">
        <div class="sidebar-header">
            <a href="index.php" class="sidebar-brand">
                <div class="sidebar-brand-icon">
                    <img src="assets/images/logo/amma-logo.svg" alt="Amma Logo" width="32" height="32">
                </div>
                <div>
                    <div class="sidebar-brand-title">Amma's Kitchen</div>
                    <div class="sidebar-brand-sub">Master Chef Academy</div>
                </div>
            </a>
            <button type="button" class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close Navigation Sidebar">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <div class="sidebar-body">
            <div class="sidebar-feature-card">
                <h4><span>🛟</span> Recipe Rescue Assistant</h4>
                <p>Curry too salty? Rice mushy? Chapati hard? Get instant recovery steps & kitchen science.</p>
                <a href="recipe-rescue.php" class="sidebar-feature-btn">
                    <span>⚡</span> Fix My Cooking Mistake
                </a>
            </div>

            <div>
                <div class="sidebar-section-title">Main Navigation</div>
                <ul class="sidebar-nav-list">
                    <li class="sidebar-nav-item">
                        <a href="index.php" class="<?= $current_page === 'home' ? 'active' : '' ?>">
                            <span class="sidebar-icon">🏠</span>
                            <span>Home Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="academy.php" class="<?= $current_page === 'academy' ? 'active' : '' ?>">
                            <span class="sidebar-icon">🎓</span>
                            <span>Master Chef Academy</span>
                            <span class="sidebar-badge sidebar-badge-academy">Learn</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="recipe-rescue.php" class="<?= $current_page === 'recipe_rescue' ? 'active' : '' ?>">
                            <span class="sidebar-icon">🛟</span>
                            <span style="font-weight: 700;">Recipe Rescue Assistant</span>
                            <span class="sidebar-badge sidebar-badge-rescue">New</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="what-can-i-cook.php" class="<?= $current_page === 'what_can_i_cook' ? 'active' : '' ?>">
                            <span class="sidebar-icon">🥕</span>
                            <span>What Can I Cook? (Pantry)</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <div class="sidebar-section-title">Recipes & Cooking</div>
                <ul class="sidebar-nav-list">
                    <li class="sidebar-nav-item">
                        <a href="recipes.php" class="<?= $current_page === 'recipes' ? 'active' : '' ?>">
                            <span class="sidebar-icon">📖</span>
                            <span>All Recipes</span>
                            <span class="sidebar-badge" style="background:#E2E8F0; color:#475569;">75</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="categories.php" class="<?= $current_page === 'categories' ? 'active' : '' ?>">
                            <span class="sidebar-icon">📂</span>
                            <span>Recipe Categories</span>
                            <span class="sidebar-badge" style="background:#E2E8F0; color:#475569;">15</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="favorites.php" class="<?= $current_page === 'favorites' ? 'active' : '' ?>">
                            <span class="sidebar-icon">❤️</span>
                            <span>Saved Favorites</span>
                            <span class="sidebar-badge" id="sidebarFavBadge" style="background:#FEE2E2; color:#DC2626; display:none;">0</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <div class="sidebar-section-title">Knowledge & Learning</div>
                <ul class="sidebar-nav-list">
                    <li class="sidebar-nav-item">
                        <a href="knowledge-centre.php" class="<?= $current_page === 'knowledge_centre' ? 'active' : '' ?>">
                            <span class="sidebar-icon">💡</span>
                            <span>Cooking Knowledge Centre</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="challenges.php" class="<?= $current_page === 'challenges' ? 'active' : '' ?>">
                            <span class="sidebar-icon">🏆</span>
                            <span>Weekly Challenges</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="quiz.php" class="<?= $current_page === 'quiz' ? 'active' : '' ?>">
                            <span class="sidebar-icon">❓</span>
                            <span>Culinary Quiz</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="progress.php" class="<?= $current_page === 'progress' ? 'active' : '' ?>">
                            <span class="sidebar-icon">📊</span>
                            <span>My Progress & Cookbook</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div style="padding: 10px; background: #F8FAFC; border-radius: 12px; border: 1px solid #E2E8F0;">
                <form action="recipes.php" method="GET">
                    <label for="sidebarSearchInput" style="display:block; font-size: 11px; font-weight: 700; color: #64748B; margin-bottom: 6px; text-transform: uppercase;">Quick Search</label>
                    <div style="position: relative;">
                        <input type="text" id="sidebarSearchInput" name="q" placeholder="Type a recipe or ingredient..." style="width: 100%; height: 38px; border-radius: 8px; border: 1px solid #CBD5E1; padding: 6px 12px; font-size: 13px;">
                    </div>
                </form>
            </div>
        </div>
    </aside>

    <main id="mainContent" style="flex: 1;">