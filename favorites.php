<?php
// favorites.php - Saved Recipes Page (device-local via localStorage)
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "My Favorite Recipes — Amma's Recipe Book";
$current_page = 'favorites';

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     FAVORITES PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.fav-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 46px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.fav-hero::before {
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
.fav-hero::after {
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
.fav-hero-inner { position: relative; z-index: 2; }
.fav-breadcrumb {
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
.fav-breadcrumb a { color: var(--primary); font-weight: 600; }
.fav-breadcrumb a:hover { text-decoration: underline; }
.fav-breadcrumb .sep { color: #A8A29E; }
.fav-hero-row {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
}
.fav-hero-text { flex: 1; min-width: 280px; }
.fav-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 46px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 12px;
}
.fav-hero-title .accent { color: var(--primary); font-style: italic; }
.fav-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 640px;
}
.fav-hero-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: center;
}

.fav-clear-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 22px;
    border-radius: var(--radius-pill);
    background: #FFFFFF;
    border: 1.5px solid #FECACA;
    color: #B91C1C;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: 0.1px;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(220, 38, 38, 0.08);
    white-space: nowrap;
}
.fav-clear-btn:hover {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    border-color: #B91C1C;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(220, 38, 38, 0.32);
}

.fav-privacy-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid #FDE68A;
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    font-size: 13px;
    color: var(--earth-brown);
    font-weight: 600;
    backdrop-filter: blur(6px);
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.08);
}

/* ---------- MAIN ---------- */
.fav-main { padding: 44px 0 80px; }

/* ---------- LOADING ---------- */
.fav-loading {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 70px 20px;
    color: var(--text-muted);
    font-size: 15px;
    gap: 16px;
}
.fav-loading-spinner {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 3px solid #FED7AA;
    border-top-color: var(--primary);
    animation: favSpin 0.9s linear infinite;
}
@keyframes favSpin { to { transform: rotate(360deg); } }

/* ---------- EMPTY STATE ---------- */
.fav-empty {
    background: linear-gradient(135deg, #FFFDF9 0%, #FFF8EE 100%);
    border: 2px dashed #FED7AA;
    border-radius: 26px;
    padding: 70px 30px;
    text-align: center;
    max-width: 620px;
    margin: 40px auto;
    box-shadow:
        0 16px 40px -12px rgba(69, 26, 3, 0.08),
        0 4px 12px rgba(69, 26, 3, 0.04);
    position: relative;
    overflow: hidden;
}
.fav-empty::before {
    content: '';
    position: absolute;
    top: -90px;
    right: -90px;
    width: 240px;
    height: 240px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.35) 0%, transparent 70%);
    pointer-events: none;
}
.fav-empty::after {
    content: '';
    position: absolute;
    bottom: -90px;
    left: -90px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 186, 116, 0.25) 0%, transparent 70%);
    pointer-events: none;
}
.fav-empty-emoji {
    font-size: 72px;
    margin-bottom: 20px;
    display: inline-block;
    animation: favFloatBounce 3s ease-in-out infinite;
    position: relative;
    z-index: 1;
}
@keyframes favFloatBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.fav-empty-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 28px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 12px;
    letter-spacing: -0.5px;
    position: relative;
    z-index: 1;
}
.fav-empty-text {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.65;
    margin-bottom: 28px;
    max-width: 460px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 1;
}
.fav-empty-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
}
.fav-empty-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.1px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid transparent;
}
.fav-empty-btn--primary {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
}
.fav-empty-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFFFFF;
}
.fav-empty-btn--secondary {
    background: #FFFFFF;
    color: var(--earth-brown);
    border-color: var(--border-warm);
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.fav-empty-btn--secondary:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-2px);
}

/* ---------- GRID ---------- */
.fav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
}

/* ---------- FAVORITE RECIPE CARD ---------- */
.fav-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 22px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.35s ease,
                border-color 0.35s ease;
    box-shadow: 0 4px 20px -2px rgba(69, 26, 3, 0.07);
}
.fav-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 48px -12px rgba(194, 65, 12, 0.22),
                0 8px 20px -4px rgba(69, 26, 3, 0.08);
    border-color: #FDBA74;
}

/* Media wrapper */
.fav-card-media {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
}
.fav-card-media-link {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
}
.fav-card-media-link::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg,
        rgba(69, 26, 3, 0) 40%,
        rgba(69, 26, 3, 0.05) 65%,
        rgba(69, 26, 3, 0.6) 100%);
    pointer-events: none;
    z-index: 1;
    transition: opacity 0.3s ease;
}
.fav-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}
.fav-card:hover .fav-card-media img {
    transform: scale(1.1);
}

/* Placeholder fallback (if image fails) */
.fav-card-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 76px;
    filter: drop-shadow(0 6px 14px rgba(69, 26, 3, 0.18));
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.fav-card:hover .fav-card-placeholder {
    transform: scale(1.15) rotate(-4deg);
}

/* Badges */
.fav-card-badges {
    position: absolute;
    top: 14px;
    left: 14px;
    display: flex;
    gap: 6px;
    z-index: 3;
}
.fav-card-badge {
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
.fav-card-badge--veg {
    background: rgba(255, 255, 255, 0.95);
    color: #15803D;
    border: 1.5px solid #BBF7D0;
}
.fav-card-badge--veg::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #16A34A;
    box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.2);
}
.fav-card-badge--nonveg {
    background: rgba(255, 255, 255, 0.95);
    color: #B91C1C;
    border: 1.5px solid #FECACA;
}
.fav-card-badge--nonveg::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #DC2626;
    box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.2);
}

/* Difficulty badge */
.fav-card-diff {
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
.fav-card-diff--easy {
    background: rgba(220, 252, 231, 0.95);
    color: #047857;
    border: 1px solid #86EFAC;
}
.fav-card-diff--medium {
    background: rgba(254, 243, 199, 0.95);
    color: #B45309;
    border: 1px solid #FCD34D;
}
.fav-card-diff--hard {
    background: rgba(254, 226, 226, 0.95);
    color: #B91C1C;
    border: 1px solid #FCA5A5;
}

/* Time badge */
.fav-card-media .fav-card-time {
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

/* Heart button */
.fav-card-heart {
    position: absolute;
    top: 14px;
    right: 14px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 1.5px solid #FECACA;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #EF4444;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
    transition: all 0.25s ease;
    z-index: 4;
    line-height: 1;
    padding: 0;
}
.fav-card-heart:hover {
    transform: scale(1.15);
    background: #FEF2F2;
    box-shadow: 0 6px 16px rgba(220, 38, 38, 0.3);
}
.fav-card-heart svg {
    width: 18px;
    height: 18px;
    fill: #EF4444;
    stroke: #EF4444;
}

/* Card body */
.fav-card-body {
    padding: 18px 20px 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

/* Meta top row */
.fav-card-meta-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}
.fav-card-region {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 800;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: #FFF1EB;
    border: 1px solid #FED7AA;
    padding: 3px 10px;
    border-radius: var(--radius-pill);
}
.fav-card-meta-top .fav-card-time {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    font-weight: 700;
    color: var(--text-muted);
}

.fav-card-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.28;
    margin-bottom: 6px;
    letter-spacing: -0.35px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 51px;
}
.fav-card-title a {
    color: inherit;
    transition: color 0.22s ease;
}
.fav-card-title a:hover {
    color: var(--primary);
}

.fav-card-telugu {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 13px;
    font-style: italic;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 8px;
}

.fav-card-desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.55;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
    min-height: 40px;
}

.fav-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px dashed var(--border-warm);
    gap: 10px;
    flex-wrap: wrap;
}
.fav-card-servings {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12.5px;
    color: var(--text-muted);
    font-weight: 600;
}
.fav-card-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 800;
    font-family: 'Playfair Display', 'Georgia', serif;
    letter-spacing: 0.1px;
    color: var(--primary);
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #FFF1EB 0%, #FEE9D9 100%);
    border: 1px solid #FED7AA;
    transition: all 0.25s ease;
    text-decoration: none;
    white-space: nowrap;
}
.fav-card-cta:hover {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: translateX(3px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.3);
}
.fav-card-cta .arrow {
    transition: transform 0.25s ease;
}
.fav-card-cta:hover .arrow {
    transform: translateX(3px);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 780px) {
    .fav-hero-row { flex-direction: column; align-items: stretch; }
    .fav-hero-actions { width: 100%; }
    .fav-clear-btn { width: 100%; justify-content: center; }
}
@media (max-width: 640px) {
    .fav-hero { padding: 38px 0 40px; }
    .fav-hero-title { font-size: 30px; }
    .fav-hero-desc { font-size: 15px; }
    .fav-main { padding: 32px 0 60px; }
    .fav-grid { grid-template-columns: 1fr; gap: 22px; }
    .fav-card-media { height: 200px; }
    .fav-empty { padding: 50px 22px; }
    .fav-empty-emoji { font-size: 56px; }
    .fav-empty-title { font-size: 22px; }
}

/* ---------- CLEAR ALL CONFIRMATION MODAL ---------- */
.fav-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(43, 16, 5, 0.65);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.fav-modal-backdrop.is-open { opacity: 1; visibility: visible; }

.fav-modal-dialog {
    background: #FFFFFF;
    border-radius: 28px;
    max-width: 480px;
    width: 100%;
    padding: 36px 32px 30px;
    box-shadow:
        0 24px 60px -15px rgba(69, 26, 3, 0.35),
        0 0 0 1px rgba(234, 88, 12, 0.15),
        0 0 80px -20px rgba(249, 115, 22, 0.2);
    position: relative;
    overflow: hidden;
    text-align: center;
    transform: scale(0.92) translateY(20px);
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
    opacity: 0;
}
.fav-modal-backdrop.is-open .fav-modal-dialog {
    transform: scale(1) translateY(0);
    opacity: 1;
}
.fav-modal-dialog::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 215, 170, 0.45) 0%, transparent 70%);
    pointer-events: none;
}
.fav-modal-dialog::after {
    content: '';
    position: absolute;
    bottom: -80px;
    left: -80px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254, 202, 202, 0.35) 0%, transparent 70%);
    pointer-events: none;
}

.fav-modal-close-btn {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(243, 244, 246, 0.85);
    border: 1px solid rgba(0, 0, 0, 0.06);
    color: #6B7280;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    z-index: 5;
}
.fav-modal-close-btn:hover {
    background: #FEE2E2;
    color: #DC2626;
    transform: rotate(90deg);
}

.fav-modal-icon-wrap {
    position: relative;
    width: 86px;
    height: 86px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.fav-modal-icon-ring {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: rgba(239, 68, 68, 0.15);
    animation: modalRingPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
.fav-modal-icon-ring-2 {
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    background: rgba(239, 68, 68, 0.08);
    animation: modalRingPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite 0.4s;
}
@keyframes modalRingPulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 0.3; }
}
.fav-modal-icon-core {
    position: relative;
    z-index: 2;
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
    border: 2px solid #FCA5A5;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    box-shadow: 0 8px 24px -4px rgba(239, 68, 68, 0.3);
}

.fav-modal-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #FEF2F2;
    color: #DC2626;
    border: 1px solid #FECACA;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    padding: 4px 12px;
    border-radius: 9999px;
    margin-bottom: 12px;
}
.fav-modal-badge span.pulse-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #DC2626;
    box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.3);
}

.fav-modal-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 26px;
    font-weight: 800;
    color: var(--earth-brown);
    margin-bottom: 10px;
    line-height: 1.25;
}

.fav-modal-desc {
    font-size: 14.5px;
    line-height: 1.6;
    color: #64748B;
    margin-bottom: 22px;
    position: relative;
    z-index: 2;
}
.fav-modal-desc strong { color: var(--earth-brown); }

.fav-modal-pill {
    background: #FFF7ED;
    border: 1px dashed #FDBA74;
    border-radius: 14px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 26px;
    text-align: left;
    position: relative;
    z-index: 2;
}
.fav-modal-pill-icon { font-size: 22px; line-height: 1; flex-shrink: 0; }
.fav-modal-pill-text { font-size: 13px; line-height: 1.45; color: #7C2D12; }
.fav-modal-pill-text strong { font-weight: 700; color: #9A3412; }

.fav-modal-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    position: relative;
    z-index: 2;
}
.fav-modal-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 14.5px;
    font-weight: 700;
    padding: 14px 20px;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    border: none;
    outline: none;
}
.fav-modal-btn--cancel {
    background: #F1F5F9;
    color: #475569;
    border: 1.5px solid #CBD5E1;
}
.fav-modal-btn--cancel:hover {
    background: #E2E8F0;
    color: var(--earth-brown);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}
.fav-modal-btn--confirm {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    color: #FFFFFF;
    box-shadow: 0 6px 20px -3px rgba(220, 38, 38, 0.45);
    border: 1.5px solid rgba(185, 28, 28, 0.4);
}
.fav-modal-btn--confirm:hover {
    background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
    transform: translateY(-2px);
    box-shadow: 0 10px 24px -3px rgba(220, 38, 38, 0.55);
}
.fav-modal-btn:active { transform: translateY(0); }

/* Success toast */
.fav-toast {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%) translateY(40px);
    background: #1E293B;
    color: #FFFFFF;
    padding: 12px 24px;
    border-radius: 9999px;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.25);
    z-index: 100000;
    opacity: 0;
    pointer-events: none;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.35s ease;
}
.fav-toast.is-show {
    transform: translateX(-50%) translateY(0);
    opacity: 1;
}

@media (max-width: 500px) {
    .fav-modal-dialog { padding: 28px 20px 24px; border-radius: 22px; }
    .fav-modal-actions { grid-template-columns: 1fr; }
    .fav-modal-btn--confirm { order: 1; }
    .fav-modal-btn--cancel { order: 2; }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="fav-hero">
    <div class="container">
        <div class="fav-hero-inner">

            <nav class="fav-breadcrumb" aria-label="Breadcrumb">
                <a href="index.php">🏠 Home</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Saved Favorites</span>
            </nav>

            <div class="fav-hero-row">
                <div class="fav-hero-text">
                    <h1 class="fav-hero-title">
                        My Favorite <span class="accent">Recipes</span>
                    </h1>
                    <p class="fav-hero-desc">
                        Dishes you've saved on this device for quick, everyday cooking without needing to search again.
                    </p>
                </div>

                <div class="fav-hero-actions">
                    <button type="button" id="btnClearAllFavs" class="fav-clear-btn" style="display: none;">
                        <span>🗑️</span>
                        <span>Clear All Favorites</span>
                    </button>
                </div>
            </div>

            <div class="fav-privacy-pill">
                <span>🔒</span>
                <span>Saved locally on this device — full offline access, no account needed</span>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<div class="container fav-main">

    <!-- LOADING -->
    <div id="favsLoading" class="fav-loading">
        <div class="fav-loading-spinner"></div>
        <div>Loading your saved recipes…</div>
    </div>

    <!-- EMPTY STATE -->
    <div id="favsEmpty" class="fav-empty" style="display: none;">
        <div class="fav-empty-emoji">❤️📖</div>
        <h2 class="fav-empty-title">No Saved Recipes Yet</h2>
        <p class="fav-empty-text">
            You haven't added any dishes to your favorites yet. Click the heart icon (<span style="color:#EF4444; font-weight: 800;">♡</span>) on any recipe card to save it here for fast access!
        </p>
        <div class="fav-empty-actions">
            <a href="recipes.php" class="fav-empty-btn fav-empty-btn--primary">
                <span>📖</span>
                <span>Explore All Recipes</span>
            </a>
            <a href="categories.php" class="fav-empty-btn fav-empty-btn--secondary">
                <span>📂</span>
                <span>Browse Categories</span>
            </a>
        </div>
    </div>

    <!-- POPULATED GRID -->
    <div class="fav-grid" id="favsGrid" style="display: none;">
        <!-- Filled dynamically by JavaScript -->
    </div>

</div>

<!-- ============================================================
     CLEAR ALL FAVORITES CONFIRMATION MODAL
     ============================================================ -->
<div id="favModalBackdrop" class="fav-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="favModalTitle" aria-describedby="favModalDesc">
    <div class="fav-modal-dialog">
        <button type="button" class="fav-modal-close-btn" id="favModalClose" aria-label="Close dialog">✕</button>

        <div class="fav-modal-icon-wrap">
            <div class="fav-modal-icon-ring-2"></div>
            <div class="fav-modal-icon-ring"></div>
            <div class="fav-modal-icon-core">
                <span>💔</span>
            </div>
        </div>

        <div class="fav-modal-badge">
            <span class="pulse-dot"></span>
            <span>Irreversible Action</span>
        </div>

        <h3 id="favModalTitle" class="fav-modal-title">Clear All Favorites?</h3>
        <p id="favModalDesc" class="fav-modal-desc">
            Are you sure you want to remove all saved recipes from your collection? This will permanently delete your personalized offline list on this device.
        </p>

        <div class="fav-modal-pill">
            <span class="fav-modal-pill-icon">📋</span>
            <div class="fav-modal-pill-text">
                You currently have <strong id="favModalRecipeCount">0 recipes</strong> in your favorites. Once cleared, you'll need to rediscover and favorite them again.
            </div>
        </div>

        <div class="fav-modal-actions">
            <button type="button" id="favModalCancel" class="fav-modal-btn fav-modal-btn--cancel">
                <span>❤️ Keep Favorites</span>
            </button>
            <button type="button" id="favModalConfirm" class="fav-modal-btn fav-modal-btn--confirm">
                <span>🗑️ Yes, Clear All</span>
            </button>
        </div>
    </div>
</div>

<!-- Toast notification -->
<div id="favToast" class="fav-toast" role="status" aria-live="polite">
    <span>✨</span>
    <span id="favToastMsg">All favorites cleared successfully</span>
</div>

<!-- ============================================================
     JAVASCRIPT — FAVORITES RENDERER & MODAL LOGIC
     ============================================================ -->
<script>
(function() {
    const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const recipeMap = {};
    for (let i = 0; i < allRecipesData.length; i++) {
        const item = allRecipesData[i];
        if (item && item.id) recipeMap[item.id] = item;
    }

    function escapeHtml(str) {
        if (str === null || str === undefined) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function getValidFavorites() {
        let favIds = window.AmmaStorage ? window.AmmaStorage.get('amma_fav_recipes', null) : null;
        if (!favIds || !Array.isArray(favIds) || favIds.length === 0) {
            const legacyFavs = window.AmmaStorage ? window.AmmaStorage.get('amma_favorites', []) : [];
            if (Array.isArray(legacyFavs) && legacyFavs.length > 0) {
                favIds = legacyFavs;
                if (window.AmmaStorage) window.AmmaStorage.set('amma_fav_recipes', favIds);
            } else {
                favIds = favIds || [];
            }
        }
        return favIds.filter(function(id) { return !!recipeMap[id]; });
    }

    function initFavoritesPage() {
        const loading = document.getElementById('favsLoading');
        const emptyState = document.getElementById('favsEmpty');
        const grid = document.getElementById('favsGrid');
        const clearBtn = document.getElementById('btnClearAllFavs');

        const modalBackdrop = document.getElementById('favModalBackdrop');
        const modalCloseBtn = document.getElementById('favModalClose');
        const modalCancelBtn = document.getElementById('favModalCancel');
        const modalConfirmBtn = document.getElementById('favModalConfirm');
        const modalRecipeCount = document.getElementById('favModalRecipeCount');
        const toast = document.getElementById('favToast');
        const toastMsg = document.getElementById('favToastMsg');

        function showToast(message) {
            if (!toast) return;
            if (toastMsg) toastMsg.textContent = message;
            toast.classList.add('is-show');
            setTimeout(function() { toast.classList.remove('is-show'); }, 3000);
        }

        function openClearModal() {
            if (!modalBackdrop) return;
            const validFavs = getValidFavorites();
            const count = validFavs.length;
            if (modalRecipeCount) {
                modalRecipeCount.textContent = count + (count === 1 ? ' recipe' : ' recipes');
            }
            modalBackdrop.classList.add('is-open');
            document.body.style.overflow = 'hidden';
            if (modalCancelBtn) modalCancelBtn.focus();
        }

        function closeClearModal() {
            if (!modalBackdrop) return;
            modalBackdrop.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeClearModal);
        if (modalCancelBtn) modalCancelBtn.addEventListener('click', closeClearModal);

        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', function(e) {
                if (e.target === modalBackdrop) closeClearModal();
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalBackdrop && modalBackdrop.classList.contains('is-open')) {
                closeClearModal();
            }
        });

        if (modalConfirmBtn) {
            modalConfirmBtn.addEventListener('click', function() {
                modalConfirmBtn.innerHTML = '<span>⏳ Clearing…</span>';
                modalConfirmBtn.disabled = true;

                setTimeout(function() {
                    if (window.AmmaStorage) {
                        window.AmmaStorage.set('amma_fav_recipes', []);
                        window.AmmaStorage.set('amma_favorites', []);
                    }
                    closeClearModal();
                    modalConfirmBtn.innerHTML = '<span>🗑️ Yes, Clear All</span>';
                    modalConfirmBtn.disabled = false;

                    renderFavorites();
                    if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
                    showToast('All saved favorite recipes have been cleared.');
                }, 200);
            });
        }

        function renderFavorites() {
            const validFavs = getValidFavorites();

            if (loading) loading.style.display = 'none';

            if (validFavs.length === 0) {
                if (emptyState) emptyState.style.display = 'block';
                if (grid) { grid.style.display = 'none'; grid.innerHTML = ''; }
                if (clearBtn) clearBtn.style.display = 'none';
                return;
            }

            if (emptyState) emptyState.style.display = 'none';
            if (clearBtn) clearBtn.style.display = 'inline-flex';

            if (grid) {
                const fragment = document.createDocumentFragment();
                validFavs.forEach(function(id) {
                    const r = recipeMap[id];
                    const recipeTitle = r.name || r.title || 'Untitled Recipe';
                    const isVeg = (r.type || '').toLowerCase() === 'vegetarian';
                    const totalTime = (parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0);
                    const diff = (r.difficulty || 'Easy');
                    const diffClass = 'fav-card-diff--' + diff.toLowerCase();
                    const telugu = r.regional_name || '';
                    const region = r.cuisine || r.region || '';
                    const recipeUrl = 'recipe.php?id=' + encodeURIComponent(r.id);
                    const hasImage = !!r.image;

                    const mediaHtml = hasImage
                        ? `<a href="${recipeUrl}" class="fav-card-media-link" aria-label="View ${escapeHtml(recipeTitle)}">
                               <img src="${escapeHtml(r.image)}" alt="${escapeHtml(recipeTitle)}" loading="lazy"
                                   onerror="this.onerror=null; this.style.display='none'; this.parentElement.innerHTML='<div class=&quot;fav-card-placeholder&quot;>${r.icon || '🍲'}</div>';">
                           </a>`
                        : `<div class="fav-card-placeholder">${r.icon || '🍲'}</div>`;

                    const card = document.createElement('article');
                    card.className = 'fav-card';
                    card.setAttribute('data-recipe-id', r.id);
                    card.innerHTML = `
                        <div class="fav-card-media">
                            ${mediaHtml}
                            <div class="fav-card-badges">
                                <span class="fav-card-badge ${isVeg ? 'fav-card-badge--veg' : 'fav-card-badge--nonveg'}">
                                    ${isVeg ? 'Veg' : 'Non-Veg'}
                                </span>
                            </div>
                            <span class="fav-card-diff ${diffClass}">${escapeHtml(diff)}</span>
                            <span class="fav-card-time">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                ${totalTime > 0 ? totalTime + ' min' : '30 min'}
                            </span>
                            <button type="button" class="fav-card-heart" data-fav-id="${escapeHtml(r.id)}"
                                aria-label="Remove from favorites" title="Remove from favorites">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="fav-card-body">
                            <div class="fav-card-meta-top">
                                ${region
                                    ? `<span class="fav-card-region">📍 ${escapeHtml(region)}</span>`
                                    : `<span class="fav-card-region">🍽️ ${escapeHtml(r.category || 'Recipe')}</span>`}
                                <span class="fav-card-time">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    ${totalTime > 0 ? totalTime + ' mins' : '30 mins'}
                                </span>
                            </div>
                            <h3 class="fav-card-title">
                                <a href="${recipeUrl}">${escapeHtml(recipeTitle)}</a>
                            </h3>
                            ${telugu ? `<div class="fav-card-telugu">${escapeHtml(telugu)}</div>` : ''}
                            <p class="fav-card-desc">${escapeHtml(r.description || 'Authentic traditional recipe prepared with love.')}</p>
                            <div class="fav-card-footer">
                                <span class="fav-card-servings">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    ${escapeHtml(String(r.servings || 4))} servings
                                </span>
                                <a href="${recipeUrl}" class="fav-card-cta">
                                    <span>View Recipe</span>
                                    <span class="arrow">→</span>
                                </a>
                            </div>
                        </div>
                    `;
                    fragment.appendChild(card);
                });
                grid.innerHTML = '';
                grid.appendChild(fragment);
                grid.style.display = 'grid';
            }

            if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
        }

        renderFavorites();

        window.addEventListener('amma_favorites_updated', function() {
            renderFavorites();
        });

        if (clearBtn) {
            clearBtn.addEventListener('click', function(e) {
                e.preventDefault();
                openClearModal();
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFavoritesPage);
    } else {
        initFavoritesPage();
    }
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>