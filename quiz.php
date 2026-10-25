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

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED QUIZ STYLES -->
<style>
    .quiz-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
        padding: 45px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .quiz-tier-nav {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    .quiz-tier-btn {
        padding: 10px 22px;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 14.5px;
        border: 1.5px solid var(--border-color);
        background: #FFF;
        color: var(--text-muted);
        text-decoration: none;
        transition: var(--transition);
    }
    .quiz-tier-btn:hover {
        border-color: var(--primary);
        color: var(--primary);
    }
    .quiz-tier-btn.active {
        background: var(--primary);
        color: #FFF;
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(194, 65, 12, 0.25);
    }
    .quiz-card {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: clamp(24px, 4vw, 36px);
        box-shadow: var(--shadow-card);
        max-width: 840px;
        margin: 0 auto;
    }
    .option-btn {
        width: 100%;
        text-align: left;
        background: #FFFDF9;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-md);
        padding: 16px 20px;
        font-size: 15.5px;
        color: var(--text-main);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: var(--transition);
        margin-bottom: 12px;
    }
    .option-btn:hover:not(:disabled) {
        border-color: var(--primary);
        background: var(--primary-light);
        transform: translateX(4px);
    }
    .option-btn.is-correct {
        background: #ECFDF5 !important;
        border-color: #10B981 !important;
        color: #065F46 !important;
        font-weight: 700;
    }
    .option-btn.is-wrong {
        background: #FEF2F2 !important;
        border-color: #EF4444 !important;
        color: #991B1B !important;
    }
    .option-letter {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--bg-warm);
        border: 1px solid var(--border-warm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        flex-shrink: 0;
    }
    .explanation-card {
        display: none;
        padding: 18px 20px;
        border-radius: var(--radius-md);
        margin-top: 18px;
        font-size: 14.5px;
        line-height: 1.65;
    }
    .explanation-card.success {
        background: #F0FDF4;
        border: 1.5px solid #86EFAC;
        color: #14532D;
    }
    .explanation-card.error {
        background: #FFFBEB;
        border: 1.5px solid #FDE68A;
        color: #92400E;
    }
</style>

<!-- QUIZ HERO -->
<section class="quiz-hero">
    <div class="container">
        <div style="max-width: 840px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
                <a href="academy.php" style="color: var(--primary);">Master Chef Academy</a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);">Cooking Quizzes</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(28px, 4vw, 42px); font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                ✍️ Cooking Knowledge Quizzes
            </h1>
            <p style="font-size: 16px; color: var(--text-muted); line-height: 1.65;">
                Test and reinforce your understanding of flame control, kitchen measurements, batter science, and traditional cooking techniques. Instant feedback and clear explanations for every question.
            </p>

            <!-- TIER BUTTONS -->
            <div class="quiz-tier-nav">
                <a href="quiz.php?tier=beginner" class="quiz-tier-btn <?= $activeTier === 'beginner' ? 'active' : '' ?>">
                    🌱 Beginner Skills Quiz
                </a>
                <a href="quiz.php?tier=intermediate" class="quiz-tier-btn <?= $activeTier === 'intermediate' ? 'active' : '' ?>">
                    🔥 Intermediate Cook Quiz
                </a>
                <a href="quiz.php?tier=advanced" class="quiz-tier-btn <?= $activeTier === 'advanced' ? 'active' : '' ?>">
                    👑 Advanced & Restaurant Quiz
                </a>
            </div>
        </div>
    </div>
</section>

<!-- QUIZ CONTAINER -->
<div class="container" style="padding: 40px 20px 80px;">
    
    <div class="quiz-card" id="quizPlayArea">
        
        <!-- HEADER WITH BEST SCORE BADGE -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1.5px solid var(--border-warm); padding-bottom: 18px; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
            <div>
                <span style="font-size: 12px; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 0.8px;">
                    <?= h($currentQuiz['badge']) ?>
                </span>
                <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown);">
                    <?= h($currentQuiz['title']) ?>
                </h2>
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="font-size: 13.5px; color: var(--text-muted); font-weight: 600;">
                    ⭐ Best Score: <strong id="bestScoreText" style="color: var(--primary);">0%</strong>
                </span>
                <span id="quizQuestionCounter" style="background: var(--bg-warm); border: 1px solid var(--border-warm); padding: 4px 12px; border-radius: var(--radius-pill); font-size: 13px; font-weight: 700; color: var(--earth-brown);">
                    Question 1 of <?= count($currentQuiz['questions']) ?>
                </span>
            </div>
        </div>

        <!-- PROGRESS BAR -->
        <div style="width: 100%; height: 8px; background: #FED7AA; border-radius: var(--radius-pill); overflow: hidden; margin-bottom: 28px;">
            <div id="quizProgressBar" style="width: 20%; height: 100%; background: linear-gradient(90deg, #EA580C, #C2410C); transition: width 0.3s ease;"></div>
        </div>

        <!-- ACTIVE QUESTION -->
        <div id="questionContainer">
            <h3 id="questionText" style="font-family: var(--font-serif); font-size: clamp(19px, 3vw, 24px); color: var(--earth-brown); margin-bottom: 24px; line-height: 1.45;">
                <!-- Populated dynamically -->
            </h3>

            <!-- OPTIONS LIST -->
            <div id="optionsList">
                <!-- Populated dynamically -->
            </div>

            <!-- EXPLANATION CARD -->
            <div id="explanationBox" class="explanation-card">
                <!-- Populated dynamically -->
            </div>

            <!-- ACTION CONTROLS -->
            <div style="display: flex; justify-content: flex-end; margin-top: 28px;">
                <button type="button" id="btnNextQuestion" class="btn btn-primary" style="padding: 12px 30px; font-size: 15px; border-radius: var(--radius-pill); display: none;">
                    Next Question →
                </button>
            </div>
        </div>

        <!-- RESULTS / SUMMARY SCREEN (HIDDEN INITIALLY) -->
        <div id="quizResultScreen" style="display: none; text-align: center; padding: 20px 0;">
            <div id="resultEmoji" style="font-size: 72px; margin-bottom: 12px;">🎉</div>
            <h3 style="font-family: var(--font-serif); font-size: 32px; color: var(--earth-brown); margin-bottom: 8px;">
                Quiz Completed!
            </h3>
            <p id="resultSubtext" style="color: var(--text-muted); font-size: 16px; margin-bottom: 24px;">
                Great effort! Here is your final score summary:
            </p>

            <div style="background: var(--bg-warm); border: 2px solid var(--border-warm); border-radius: var(--radius-xl); padding: 30px; max-width: 380px; margin: 0 auto 30px;">
                <div style="font-size: 14px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 6px;">
                    Your Score
                </div>
                <div id="resultScoreFraction" style="font-family: var(--font-serif); font-size: 48px; font-weight: 700; color: var(--primary); line-height: 1;">
                    5 / 5
                </div>
                <div id="resultPercentText" style="font-size: 16px; font-weight: 700; color: #15803D; margin-top: 8px;">
                    100% Score
                </div>
            </div>

            <p style="font-size: 13.5px; color: var(--text-light); max-width: 480px; margin: 0 auto 24px; line-height: 1.6;">
                Note: This quiz tests cooking theory and kitchen awareness. Real culinary confidence comes from stepping into the kitchen and practicing the recipes!
            </p>

            <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
                <button type="button" id="btnRetryQuiz" class="btn btn-primary" style="padding: 12px 28px; border-radius: var(--radius-pill);">
                    🔄 Retry This Quiz
                </button>
                <a href="academy.php" class="btn btn-secondary" style="padding: 12px 28px; border-radius: var(--radius-pill);">
                    Academy Dashboard
                </a>
            </div>
        </div>

    </div>

</div>

<!-- JAVASCRIPT FOR QUIZ LOGIC, SCORING, BEST SCORE PERSISTENCE -->
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

    // Retrieve and display best score from localStorage
    function refreshBestScore() {
        if (!window.AmmaStorage) return;
        const scores = window.AmmaStorage.get('amma_quiz_best_scores', {});
        const best = scores[quizId];
        if (best !== undefined) {
            bestScoreText.textContent = best + '%';
        } else {
            bestScoreText.textContent = 'None yet';
        }
    }

    function renderQuestion(index) {
        answered = false;
        nextBtn.style.display = 'none';
        explanationBox.style.display = 'none';
        explanationBox.className = 'explanation-card';

        const q = questions[index];
        counterEl.textContent = 'Question ' + (index + 1) + ' of ' + totalQuestions;
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
            nextBtn.textContent = 'View Final Results 🏆';
        } else {
            nextBtn.textContent = 'Next Question →';
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
        document.getElementById('resultPercentText').textContent = pct + '% Score';

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

        // Save best score to localStorage
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
