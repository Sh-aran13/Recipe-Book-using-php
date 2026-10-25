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
        <div style="background: var(--bg-surface); border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 60px 20px; max-width: 580px; margin: 0 auto; box-shadow: var(--shadow-sm);">
            <div style="font-size: 72px; margin-bottom: 16px;">📚❓</div>
            <h1 style="font-family: var(--font-serif); font-size: 30px; color: var(--earth-brown); margin-bottom: 12px;">
                Lesson Not Found
            </h1>
            <p style="color: var(--text-muted); font-size: 16px; margin-bottom: 24px;">
                The cooking lesson you requested could not be located.
            </p>
            <a href="academy.php" class="btn btn-primary" style="padding: 12px 28px; border-radius: var(--radius-pill);">
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

// Find related recipes
$relatedRecipes = [];
if (!empty($lesson['related_recipes'])) {
    foreach ($lesson['related_recipes'] as $rId) {
        $found = find_recipe_by_id($rId);
        if ($found) $relatedRecipes[] = $found;
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED LESSON STYLES -->
<style>
    .lesson-header {
        background: linear-gradient(135deg, <?= $lvlInfo['bg_light'] ?> 0%, #FFF 100%);
        padding: 40px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .lesson-content-wrap {
        max-width: 920px;
        margin: 40px auto 60px;
    }
    .lesson-section-box {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: clamp(24px, 4vw, 36px);
        margin-bottom: 30px;
        box-shadow: var(--shadow-sm);
    }
    .concept-item {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        padding: 16px 0;
        border-bottom: 1px solid var(--border-warm);
    }
    .concept-item:last-child { border-bottom: none; }
    .concept-bullet {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: <?= $lvlInfo['bg_light'] ?>;
        color: <?= $lvlInfo['color'] ?>;
        border: 1.5px solid <?= $lvlInfo['border_color'] ?>;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 14px;
        flex-shrink: 0;
    }
    .alert-mistake {
        background: #FEF2F2;
        border: 1.5px solid #FCA5A5;
        border-radius: var(--radius-lg);
        padding: 20px;
        margin-bottom: 16px;
    }
    .alert-correction {
        background: #F0FDF4;
        border: 1.5px solid #86EFAC;
        border-radius: var(--radius-lg);
        padding: 20px;
        margin-bottom: 16px;
    }
</style>

<!-- LESSON HERO -->
<section class="lesson-header">
    <div class="container">
        
        <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 14px;">
            <a href="academy.php" style="color: var(--primary);">Master Chef Academy</a>
            <span>›</span>
            <a href="academy.php?level=<?= urlencode($lesson['level']) ?>"><?= h($lvlInfo['title']) ?></a>
            <span>›</span>
            <span style="font-weight: 600; color: var(--earth-brown);"><?= h($lesson['category']) ?></span>
        </div>

        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
            <span style="background: <?= $lvlInfo['bg_light'] ?>; color: <?= $lvlInfo['color'] ?>; border: 1.5px solid <?= $lvlInfo['border_color'] ?>; padding: 4px 14px; border-radius: var(--radius-pill); font-size: 12px; font-weight: 800; text-transform: uppercase;">
                <?= $lvlInfo['badge'] ?>
            </span>
            <span style="font-size: 14px; color: var(--text-muted); font-weight: 600;">
                ⏱️ <?= $lesson['read_time'] ?? 8 ?> mins read
            </span>
            <span style="font-size: 14px; color: var(--text-muted); font-weight: 600;">
                🍳 Type: <?= h($lesson['dish_type'] ?? 'Technique') ?>
            </span>
        </div>

        <h1 style="font-family: var(--font-serif); font-size: clamp(26px, 4vw, 38px); font-weight: 700; color: var(--earth-brown); line-height: 1.25; margin-bottom: 12px;">
            <?= $lesson['icon'] ?> <?= $title ?>
        </h1>

        <p style="font-size: clamp(15px, 2vw, 18px); color: var(--text-muted); max-width: 800px; line-height: 1.6;">
            <?= h($lesson['summary']) ?>
        </p>

    </div>
</section>

<!-- MAIN LESSON CONTENT -->
<div class="container">
    <div class="lesson-content-wrap">
        
        <!-- COMPLETION CONTROLLER CARD -->
        <div style="background: #FFF; border: 2px solid #FED7AA; border-radius: var(--radius-lg); padding: 20px 24px; margin-bottom: 30px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; box-shadow: var(--shadow-sm);">
            <div>
                <div style="font-size: 12px; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 0.8px;">
                    Progress Tracking
                </div>
                <div id="lessonStatusDisplay" style="font-size: 15px; font-weight: 700; color: var(--earth-brown);">
                    Status: Not yet marked as learned
                </div>
            </div>
            <button type="button" id="btnToggleLearned" class="btn btn-primary" style="padding: 10px 24px; border-radius: var(--radius-pill); font-size: 14.5px;">
                Mark as Learned ✓
            </button>
        </div>

        <!-- SECTION 1: REQUIRED UTENSILS & FLAME CONTROL -->
        <div class="lesson-section-box">
            <h2 style="font-family: var(--font-serif); font-size: 22px; color: var(--earth-brown); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                <span>🫕</span> Required Utensils & Temperature Guidance
            </h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
                <div style="background: var(--bg-warm); padding: 18px; border-radius: var(--radius-md); border: 1px solid var(--border-warm);">
                    <h3 style="font-size: 14.5px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
                        Kitchen Utensils Needed
                    </h3>
                    <ul style="padding-left: 20px; font-size: 14px; color: var(--text-muted); display: flex; flex-direction: column; gap: 6px;">
                        <?php foreach ($lesson['required_utensils'] as $ut): ?>
                            <li><?= h($ut) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div style="background: #FFF7ED; padding: 18px; border-radius: var(--radius-md); border: 1px solid #FED7AA;">
                    <h3 style="font-size: 14.5px; font-weight: 700; color: #C2410C; margin-bottom: 8px;">
                        Flame & Heat Management
                    </h3>
                    <p style="font-size: 14px; color: #7C2D12; line-height: 1.6;">
                        <?= h($lesson['flame_notes'] ?? 'Monitor flame to keep spices from scorching.') ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- SECTION 2: CORE CONCEPTS & TECHNIQUES -->
        <div class="lesson-section-box">
            <h2 style="font-family: var(--font-serif); font-size: 22px; color: var(--earth-brown); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                <span>💡</span> Essential Principles & Step-by-Step Technique
            </h2>

            <div>
                <?php foreach ($lesson['core_concepts'] as $cIdx => $concept): ?>
                    <div class="concept-item">
                        <div class="concept-bullet"><?= $cIdx + 1 ?></div>
                        <div style="font-size: 15px; color: var(--text-main); line-height: 1.65;">
                            <?= h($concept) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SECTION 3: VISUAL INDICATORS OF READINESS -->
        <?php if (!empty($lesson['visual_indicators'])): ?>
            <div class="lesson-section-box" style="background: #FFFBEB; border-color: #FDE68A;">
                <h2 style="font-family: var(--font-serif); font-size: 21px; color: #92400E; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                    <span>👁️</span> Visual & Sensory Indicators of Readiness
                </h2>
                <p style="font-size: 15px; color: #78350F; line-height: 1.7;">
                    <?= h($lesson['visual_indicators']) ?>
                </p>
            </div>
        <?php endif; ?>

        <!-- SECTION 4: COMMON MISTAKES & HOW TO CORRECT THEM -->
        <div class="lesson-section-box">
            <h2 style="font-family: var(--font-serif); font-size: 22px; color: var(--earth-brown); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                <span>⚠️</span> Common Mistakes & Pro Corrections
            </h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                <div class="alert-mistake">
                    <h3 style="font-size: 15px; font-weight: 700; color: #991B1B; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                        <span>❌</span> What Usually Goes Wrong
                    </h3>
                    <ul style="padding-left: 18px; font-size: 14px; color: #7F1D1D; line-height: 1.6; display: flex; flex-direction: column; gap: 6px;">
                        <?php foreach ((array)$lesson['common_mistakes'] as $cm): ?>
                            <li><?= h($cm) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="alert-correction">
                    <h3 style="font-size: 15px; font-weight: 700; color: #166534; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                        <span>✅</span> How Amma Corrects It
                    </h3>
                    <ul style="padding-left: 18px; font-size: 14px; color: #14532D; line-height: 1.6; display: flex; flex-direction: column; gap: 6px;">
                        <?php foreach ((array)$lesson['corrections'] as $cor): ?>
                            <li><?= h($cor) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- SECTION 5: RELATED PRACTICE RECIPES -->
        <?php if (!empty($relatedRecipes)): ?>
            <div style="margin-top: 40px;">
                <div class="section-header-wrap">
                    <div>
                        <span class="section-eyebrow">Put Knowledge Into Practice</span>
                        <h2 class="section-heading" style="font-size: 24px;">Recommended Practice Recipes</h2>
                    </div>
                </div>

                <div class="recipes-grid">
                    <?php foreach ($relatedRecipes as $rel): ?>
                        <?php render_recipe_card($rel); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- BACK TO ACADEMY NAVIGATION -->
        <div style="text-align: center; margin-top: 48px;">
            <a href="academy.php#lessonsDirectory" class="btn btn-secondary" style="padding: 12px 28px; border-radius: var(--radius-pill); font-size: 15px;">
                ← Back to Academy Lessons
            </a>
        </div>

    </div>
</div>

<!-- JAVASCRIPT FOR PERSISTING LESSON COMPLETION IN LOCALSTORAGE -->
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
            btn.textContent = '✓ Marked as Learned';
            btn.style.background = '#15803D';
            btn.style.borderColor = '#15803D';
            display.innerHTML = '<span style="color: #15803D;">✓ Completed & Stored in Local Progress</span>';
        } else {
            btn.textContent = 'Mark as Learned ✓';
            btn.style.background = '';
            btn.style.borderColor = '';
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
