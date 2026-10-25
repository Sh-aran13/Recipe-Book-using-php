<?php
// quiz.php - Interactive Cooking Knowledge Quizzes (Beginner, Intermediate, Advanced)
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Cooking Quizzes — Master Chef Academy";
$current_page = 'academy';

$allQuizzes = get_cooking_quizzes();
$activeTier = trim($_GET['tier'] ?? 'beginner');
if (!array_key_exists($activeTier, $allQuizzes)) {
    $activeTier = 'beginner';
}
$currentQuiz = $allQuizzes[$activeTier];

// Tier icons & labels
$tierMeta = [
    'beginner' => ['icon' => '🌱', 'label' => 'Beginner', 'gradient' => '#15803D'],
    'intermediate' => ['icon' => '🔥', 'label' => 'Intermediate', 'gradient' => '#D97706'],
    'advanced' => ['icon' => '👑', 'label' => 'Advanced', 'gradient' => '#B91C1C'],
];

include __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     QUIZ PAGE — ENHANCED STYLES
     ============================================================ -->
<style>
/* ---------- HERO ---------- */
.quiz-hero {
    position: relative;
    background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 35%, #FEF3C7 70%, #FDE68A 100%);
    padding: 52px 0 46px;
    border-bottom: 1px solid var(--border-warm);
    overflow: hidden;
}
.quiz-hero::before {
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
.quiz-hero::after {
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
.quiz-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 900px;
}
.quiz-breadcrumb {
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
.quiz-breadcrumb a { color: var(--primary); font-weight: 600; }
.quiz-breadcrumb a:hover { text-decoration: underline; }
.quiz-breadcrumb .sep { color: #A8A29E; }
.quiz-hero-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(32px, 4.5vw, 48px);
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1.1;
    letter-spacing: -1.2px;
    margin-bottom: 14px;
}
.quiz-hero-title .accent { color: var(--primary); font-style: italic; }
.quiz-hero-desc {
    font-size: 16px;
    color: var(--text-muted);
    line-height: 1.65;
    max-width: 720px;
    margin-bottom: 28px;
}

/* Tier tabs */
.quiz-tier-nav {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
}
.quiz-tier-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    border-radius: var(--radius-pill);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.1px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    color: var(--text-muted);
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}
.quiz-tier-btn:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFFDF9;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.quiz-tier-btn-icon {
    font-size: 16px;
    line-height: 1;
}
.quiz-tier-btn.active {
    color: #FFFFFF;
    border-color: transparent;
    box-shadow: 0 6px 18px rgba(194, 65, 12, 0.32);
}
.quiz-tier-btn.active:hover { color: #FFFFFF; transform: translateY(-1px); }
.quiz-tier-btn.active.quiz-tier-btn--beginner {
    background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
    box-shadow: 0 6px 18px rgba(22, 163, 74, 0.32);
}
.quiz-tier-btn.active.quiz-tier-btn--intermediate {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    box-shadow: 0 6px 18px rgba(217, 119, 6, 0.32);
}
.quiz-tier-btn.active.quiz-tier-btn--advanced {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    box-shadow: 0 6px 18px rgba(220, 38, 38, 0.32);
}

/* ---------- MAIN ---------- */
.quiz-main {
    padding: 44px 0 80px;
}

/* ---------- QUIZ CARD ---------- */
.quiz-card {
    position: relative;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    border-radius: 26px;
    padding: clamp(24px, 4vw, 40px);
    box-shadow:
        0 16px 40px -12px rgba(69, 26, 3, 0.1),
        0 4px 12px rgba(69, 26, 3, 0.04);
    max-width: 880px;
    margin: 0 auto;
    overflow: hidden;
}
.quiz-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 50%, #FCD34D 100%);
}
.quiz-card::after {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(253, 230, 138, 0.22) 0%, transparent 70%);
    pointer-events: none;
}

/* Quiz header row */
.quiz-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1.5px solid var(--border-warm);
    padding-bottom: 20px;
    margin-bottom: 26px;
    flex-wrap: wrap;
    gap: 14px;
    position: relative;
    z-index: 1;
}
.quiz-header-text {
    flex: 1;
    min-width: 240px;
}
.quiz-badge-label {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 12.5px;
    font-weight: 700;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 6px;
    background: #FFF1EB;
    border: 1px solid #FED7AA;
    padding: 4px 12px;
    border-radius: var(--radius-pill);
}
.quiz-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(22px, 2.6vw, 28px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.5px;
    line-height: 1.2;
}
.quiz-header-badges {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

/* Best score pill */
.quiz-best-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    padding: 8px 16px;
    border-radius: var(--radius-pill);
    font-size: 13px;
    color: #92400E;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(217, 119, 6, 0.12);
}
.quiz-best-pill strong {
    color: var(--primary);
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 15px;
}

/* Question counter pill */
.quiz-counter-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #FFFFFF;
    border: 1.5px solid var(--border-warm);
    padding: 8px 14px;
    border-radius: var(--radius-pill);
    font-size: 13px;
    font-weight: 700;
    color: var(--earth-brown);
    box-shadow: 0 2px 6px rgba(69, 26, 3, 0.05);
}

/* Progress bar */
.quiz-progress-wrap {
    width: 100%;
    height: 10px;
    background: linear-gradient(90deg, #FEF3C7 0%, #FED7AA 100%);
    border-radius: var(--radius-pill);
    overflow: hidden;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
    box-shadow: inset 0 2px 4px rgba(69, 26, 3, 0.06);
}
.quiz-progress-fill {
    width: 20%;
    height: 100%;
    background: linear-gradient(90deg, #EA580C 0%, #F59E0B 60%, #FCD34D 100%);
    border-radius: var(--radius-pill);
    transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 0 8px rgba(234, 88, 12, 0.4);
}

/* Question area */
.quiz-question-area { position: relative; z-index: 1; }
.quiz-question-text {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(19px, 3vw, 26px);
    color: var(--earth-brown);
    margin-bottom: 26px;
    line-height: 1.45;
    letter-spacing: -0.3px;
}

/* Option buttons */
.quiz-options-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.option-btn {
    width: 100%;
    text-align: left;
    background: #FFFDF9;
    border: 1.5px solid var(--border-warm);
    border-radius: 14px;
    padding: 16px 20px;
    font-size: 15.5px;
    color: var(--text-main);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 14px;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
    line-height: 1.5;
}
.option-btn:hover:not(:disabled) {
    border-color: #FDBA74;
    background: #FFF8EE;
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(194, 65, 12, 0.1);
}
.option-btn:disabled {
    cursor: default;
    opacity: 0.95;
}
.option-letter {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
    border: 1.5px solid #FCD34D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 800;
    font-size: 14.5px;
    color: #92400E;
    flex-shrink: 0;
    transition: all 0.25s ease;
}
.option-btn:hover:not(:disabled) .option-letter {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    border-color: var(--primary);
    transform: scale(1.08);
}

/* Correct state */
.option-btn.is-correct {
    background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%) !important;
    border-color: #10B981 !important;
    color: #065F46 !important;
    font-weight: 700;
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.18);
}
.option-btn.is-correct .option-letter {
    background: linear-gradient(135deg, #16A34A 0%, #15803D 100%) !important;
    color: #FFFFFF !important;
    border-color: #15803D !important;
}

/* Wrong state */
.option-btn.is-wrong {
    background: linear-gradient(135deg, #FEF2F2 0%, #FEE2E2 100%) !important;
    border-color: #EF4444 !important;
    color: #991B1B !important;
    box-shadow: 0 4px 16px rgba(239, 68, 68, 0.14);
}
.option-btn.is-wrong .option-letter {
    background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%) !important;
    color: #FFFFFF !important;
    border-color: #B91C1C !important;
}

/* Explanation card */
.explanation-card {
    display: none;
    padding: 18px 22px;
    border-radius: 14px;
    margin-top: 22px;
    font-size: 14.5px;
    line-height: 1.65;
    position: relative;
    overflow: hidden;
    animation: explSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes explSlideIn {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}
.explanation-card.success {
    background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
    border: 1.5px solid #86EFAC;
    color: #14532D;
}
.explanation-card.success strong {
    color: #15803D;
    font-family: 'Playfair Display', 'Georgia', serif;
}
.explanation-card.error {
    background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
    border: 1.5px solid #FDE68A;
    color: #92400E;
}
.explanation-card.error strong {
    color: #B45309;
    font-family: 'Playfair Display', 'Georgia', serif;
}

/* Action row */
.quiz-action-row {
    display: flex;
    justify-content: flex-end;
    margin-top: 28px;
    position: relative;
    z-index: 1;
}
.quiz-next-btn {
    display: none;
    align-items: center;
    gap: 8px;
    padding: 13px 32px;
    font-size: 15px;
    border-radius: var(--radius-pill);
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    font-family: 'Playfair Display', 'Georgia', serif;
    font-weight: 700;
    letter-spacing: 0.2px;
    border: none;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
}
.quiz-next-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    background: linear-gradient(135deg, #C2410C 0%, #9A3412 100%);
}

/* ---------- RESULT SCREEN ---------- */
.quiz-result-screen {
    display: none;
    text-align: center;
    padding: 20px 0;
    position: relative;
    z-index: 1;
}
.result-emoji {
    font-size: 80px;
    margin-bottom: 12px;
    display: inline-block;
    animation: resultBounce 1s ease-in-out infinite;
}
@keyframes resultBounce {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.05); }
}
.result-title {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: clamp(28px, 4vw, 36px);
    font-weight: 800;
    color: var(--earth-brown);
    letter-spacing: -0.8px;
    margin-bottom: 10px;
}
.result-subtext {
    color: var(--text-muted);
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 28px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Score card */
.result-score-card {
    background: linear-gradient(135deg, #FFF8EE 0%, #FEF3C7 100%);
    border: 2px solid #FCD34D;
    border-radius: 24px;
    padding: 32px;
    max-width: 400px;
    margin: 0 auto 28px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 12px 32px -10px rgba(217, 119, 6, 0.18);
}
.result-score-card::before {
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
.result-score-label {
    font-size: 13px;
    font-weight: 800;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}
.result-score-fraction {
    font-family: 'Playfair Display', 'Georgia', serif;
    font-size: 56px;
    font-weight: 800;
    color: var(--earth-brown);
    line-height: 1;
    letter-spacing: -2px;
    position: relative;
    z-index: 1;
}
.result-score-percent {
    font-size: 17px;
    font-weight: 800;
    margin-top: 10px;
    position: relative;
    z-index: 1;
    font-family: 'Playfair Display', 'Georgia', serif;
}
.result-score-percent.perfect { color: #15803D; }
.result-score-percent.good { color: #B45309; }
.result-score-percent.low { color: #B91C1C; }

/* Result note */
.result-note {
    font-size: 13.5px;
    color: var(--text-light);
    max-width: 480px;
    margin: 0 auto 26px;
    line-height: 1.6;
    font-style: italic;
    padding: 0 20px;
}

/* Result actions */
.result-actions {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
}
.result-btn {
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
    cursor: pointer;
}
.result-btn--primary {
    background: linear-gradient(135deg, #EA580C 0%, #C2410C 100%);
    color: #FFFFFF;
    box-shadow: 0 4px 14px rgba(194, 65, 12, 0.32);
    border: none;
}
.result-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(194, 65, 12, 0.42);
    color: #FFFFFF;
}
.result-btn--secondary {
    background: #FFFFFF;
    color: var(--earth-brown);
    border-color: var(--border-warm);
    box-shadow: 0 2px 8px rgba(69, 26, 3, 0.06);
}
.result-btn--secondary:hover {
    border-color: #FDBA74;
    color: var(--primary);
    background: #FFF8EE;
    transform: translateY(-2px);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 640px) {
    .quiz-hero { padding: 38px 0 40px; }
    .quiz-hero-title { font-size: 30px; }
    .quiz-hero-desc { font-size: 15px; }
    .quiz-tier-btn { padding: 10px 16px; font-size: 13px; }
    .quiz-main { padding: 32px 0 60px; }
    .quiz-card { padding: 22px 18px; border-radius: 20px; }
    .quiz-header-row { flex-direction: column; align-items: stretch; }
    .quiz-header-badges { width: 100%; justify-content: flex-start; }
    .option-btn { padding: 14px 16px; font-size: 14.5px; gap: 12px; }
    .option-letter { width: 30px; height: 30px; font-size: 13px; }
    .quiz-next-btn { width: 100%; justify-content: center; }
    .result-score-fraction { font-size: 44px; }
    .result-btn { width: 100%; justify-content: center; }
}
</style>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="quiz-hero">
    <div class="container">
        <div class="quiz-hero-inner">

            <nav class="quiz-breadcrumb" aria-label="Breadcrumb">
                <a href="academy.php">🎓 Master Chef Academy</a>
                <span class="sep">›</span>
                <span style="font-weight: 700; color: var(--earth-brown);">Cooking Quizzes</span>
            </nav>

            <h1 class="quiz-hero-title">
                Cooking <span class="accent">Knowledge</span> Quizzes
            </h1>
            <p class="quiz-hero-desc">
                Test and reinforce your understanding of flame control, kitchen measurements, batter science, and traditional cooking techniques. Instant feedback and clear explanations for every question.
            </p>

            <!-- Tier tabs -->
            <div class="quiz-tier-nav">
                <a href="quiz.php?tier=beginner" class="quiz-tier-btn quiz-tier-btn--beginner <?= $activeTier === 'beginner' ? 'active' : '' ?>">
                    <span class="quiz-tier-btn-icon">🌱</span>
                    <span>Beginner Skills</span>
                </a>
                <a href="quiz.php?tier=intermediate" class="quiz-tier-btn quiz-tier-btn--intermediate <?= $activeTier === 'intermediate' ? 'active' : '' ?>">
                    <span class="quiz-tier-btn-icon">🔥</span>
                    <span>Intermediate Cook</span>
                </a>
                <a href="quiz.php?tier=advanced" class="quiz-tier-btn quiz-tier-btn--advanced <?= $activeTier === 'advanced' ? 'active' : '' ?>">
                    <span class="quiz-tier-btn-icon">👑</span>
                    <span>Advanced & Restaurant</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     QUIZ CONTAINER
     ============================================================ -->
<div class="container quiz-main">

    <div class="quiz-card" id="quizPlayArea">

        <!-- Header row -->
        <div class="quiz-header-row">
            <div class="quiz-header-text">
                <div class="quiz-badge-label">
                    <span><?= $tierMeta[$activeTier]['icon'] ?? '🎯' ?></span>
                    <span><?= h($currentQuiz['badge']) ?></span>
                </div>
                <h2 class="quiz-title"><?= h($currentQuiz['title']) ?></h2>
            </div>

            <div class="quiz-header-badges">
                <span class="quiz-best-pill">
                    <span>⭐</span>
                    <span>Best:</span>
                    <strong id="bestScoreText">—</strong>
                </span>
                <span id="quizQuestionCounter" class="quiz-counter-pill">
                    <span>📝</span>
                    <span>Question 1 of <?= count($currentQuiz['questions']) ?></span>
                </span>
            </div>
        </div>

        <!-- Progress bar -->
        <div class="quiz-progress-wrap">
            <div id="quizProgressBar" class="quiz-progress-fill"></div>
        </div>

        <!-- Question area -->
        <div id="questionContainer" class="quiz-question-area">
            <h3 id="questionText" class="quiz-question-text">
                <!-- Populated dynamically -->
            </h3>

            <div id="optionsList" class="quiz-options-list">
                <!-- Populated dynamically -->
            </div>

            <div id="explanationBox" class="explanation-card">
                <!-- Populated dynamically -->
            </div>

            <div class="quiz-action-row">
                <button type="button" id="btnNextQuestion" class="quiz-next-btn">
                    <span>Next Question</span>
                    <span>→</span>
                </button>
            </div>
        </div>

        <!-- Results screen -->
        <div id="quizResultScreen" class="quiz-result-screen">
            <div id="resultEmoji" class="result-emoji">🎉</div>
            <h3 class="result-title">Quiz Completed!</h3>
            <p id="resultSubtext" class="result-subtext">
                Great effort! Here is your final score summary:
            </p>

            <div class="result-score-card">
                <div class="result-score-label">Your Score</div>
                <div id="resultScoreFraction" class="result-score-fraction">5 / 5</div>
                <div id="resultPercentText" class="result-score-percent perfect">100% Score</div>
            </div>

            <p class="result-note">
                💡 Note: This quiz tests cooking theory and kitchen awareness. Real culinary confidence comes from stepping into the kitchen and practicing the recipes!
            </p>

            <div class="result-actions">
                <button type="button" id="btnRetryQuiz" class="result-btn result-btn--primary">
                    <span>🔄</span>
                    <span>Retry This Quiz</span>
                </button>
                <a href="academy.php" class="result-btn result-btn--secondary">
                    <span>🎓</span>
                    <span>Academy Dashboard</span>
                </a>
            </div>
        </div>

    </div>

</div>

<!-- ============================================================
     QUIZ LOGIC
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quizData = <?= json_encode($currentQuiz, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const questions = quizData.questions || [];
    const quizId = quizData.id;
    const totalQuestions = questions.length;

    let currentIndex = 0;
    let currentScore = 0;
    let answered = false;

    const counterEl = document.getElementById('quizQuestionCounter');
    const progressBar = document.getElementById('quizProgressBar');
    const questionTextEl = document.getElementById('questionText');
    const optionsListEl = document.getElementById('optionsList');
    const explanationBox = document.getElementById('explanationBox');
    const nextBtn = document.getElementById('btnNextQuestion');
    const questionArea = document.getElementById('questionContainer');
    const resultScreen = document.getElementById('quizResultScreen');
    const bestScoreText = document.getElementById('bestScoreText');

    function refreshBestScore() {
        if (!window.AmmaStorage) return;
        const scores = window.AmmaStorage.get('amma_quiz_best_scores', {});
        const best = scores[quizId];
        if (best !== undefined && best !== null) {
            bestScoreText.textContent = best + '%';
        } else {
            bestScoreText.textContent = '—';
        }
    }

    function renderQuestion(index) {
        answered = false;
        nextBtn.style.display = 'none';
        explanationBox.style.display = 'none';
        explanationBox.className = 'explanation-card';

        const q = questions[index];
        counterEl.innerHTML = '<span>📝</span><span>Question ' + (index + 1) + ' of ' + totalQuestions + '</span>';
        progressBar.style.width = Math.round(((index + 1) / totalQuestions) * 100) + '%';
        questionTextEl.textContent = q.question;

        optionsListEl.innerHTML = '';
        const letters = ['A', 'B', 'C', 'D', 'E'];

        q.options.forEach(function(optText, optIdx) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'option-btn';
            btn.innerHTML = '<span class="option-letter">' + letters[optIdx] + '</span><span>' + optText + '</span>';
            btn.addEventListener('click', function() {
                handleOptionClick(optIdx);
            });
            optionsListEl.appendChild(btn);
        });
    }

    function handleOptionClick(selectedIdx) {
        if (answered) return;
        answered = true;

        const q = questions[currentIndex];
        const isCorrect = (selectedIdx === q.correct_index);
        const optionButtons = optionsListEl.querySelectorAll('.option-btn');

        optionButtons.forEach(function(btn, idx) {
            btn.disabled = true;
            if (idx === q.correct_index) {
                btn.classList.add('is-correct');
            } else if (idx === selectedIdx && !isCorrect) {
                btn.classList.add('is-wrong');
            }
        });

        if (isCorrect) {
            currentScore++;
            explanationBox.className = 'explanation-card success';
            explanationBox.innerHTML = '<strong>✓ Correct!</strong> ' + q.explanation;
        } else {
            explanationBox.className = 'explanation-card error';
            explanationBox.innerHTML = '<strong>✕ Not Quite:</strong> ' + q.explanation;
        }
        explanationBox.style.display = 'block';

        if (currentIndex === totalQuestions - 1) {
            nextBtn.innerHTML = '<span>View Final Results</span><span>🏆</span>';
        } else {
            nextBtn.innerHTML = '<span>Next Question</span><span>→</span>';
        }
        nextBtn.style.display = 'inline-flex';
    }

    nextBtn.addEventListener('click', function() {
        if (currentIndex < totalQuestions - 1) {
            currentIndex++;
            renderQuestion(currentIndex);
        } else {
            showFinalResults();
        }
    });

    function showFinalResults() {
        questionArea.style.display = 'none';
        resultScreen.style.display = 'block';

        const pct = Math.round((currentScore / totalQuestions) * 100);
        document.getElementById('resultScoreFraction').textContent = currentScore + ' / ' + totalQuestions;

        const percentEl = document.getElementById('resultPercentText');
        percentEl.textContent = pct + '% Score';
        percentEl.className = 'result-score-percent ' + (pct === 100 ? 'perfect' : pct >= 60 ? 'good' : 'low');

        const emojiEl = document.getElementById('resultEmoji');
        const subtextEl = document.getElementById('resultSubtext');

        if (pct === 100) {
            emojiEl.textContent = '🌟👑';
            subtextEl.textContent = 'Mastery achieved! You got every question right on your culinary theory.';
        } else if (pct >= 60) {
            emojiEl.textContent = '👏🍲';
            subtextEl.textContent = 'Good knowledge! You have a solid grasp of kitchen essentials.';
        } else {
            emojiEl.textContent = '🌱📖';
            subtextEl.textContent = 'Good attempt! Review the lessons in the academy and try again.';
        }

        if (window.AmmaStorage) {
            const scores = window.AmmaStorage.get('amma_quiz_best_scores', {});
            const oldBest = scores[quizId] || 0;
            if (pct > oldBest) {
                scores[quizId] = pct;
                window.AmmaStorage.set('amma_quiz_best_scores', scores);
            }
            refreshBestScore();
        }
    }

    document.getElementById('btnRetryQuiz').addEventListener('click', function() {
        currentIndex = 0;
        currentScore = 0;
        resultScreen.style.display = 'none';
        questionArea.style.display = 'block';
        renderQuestion(0);
    });

    refreshBestScore();
    renderQuestion(0);
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>