<?php
// academy.php - Master Chef Academy Portal & Curriculum Dashboard
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Master Chef Academy — Amma's Recipe Book";
$current_page = 'academy';

$levels = get_academy_levels();
$lessons = get_academy_lessons();
$challenges = get_cooking_challenges();
$quizzes = get_cooking_quizzes();

// Count total available lessons and challenges
$totalLessons = count($lessons);
$totalChallenges = 0;
foreach ($challenges as $cGroup) {
    $totalChallenges += count($cGroup['items']);
}

// Active tab filter: 'all', 'beginner', 'intermediate', 'advanced', 'restaurant'
$activeLevel = trim($_GET['level'] ?? 'all');
if (!in_array($activeLevel, ['all', 'beginner', 'intermediate', 'advanced', 'restaurant'], true)) {
    $activeLevel = 'all';
}

// Filter lessons if level selected
$displayedLessons = $lessons;
if ($activeLevel !== 'all') {
    $displayedLessons = array_filter($lessons, function($l) use ($activeLevel) {
        return ($l['level'] ?? '') === $activeLevel;
    });
}

// Curated daily practice dish
$dayOfYear = (int)date('z');
$practiceRecipe = $recipes[$dayOfYear % count($recipes)];

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED ACADEMY STYLES -->
<style>
    .academy-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 40%, #FEF3C7 100%);
        padding: 50px 0 45px;
        border-bottom: 1px solid var(--border-warm);
        position: relative;
        overflow: hidden;
    }
    .academy-hero::before {
        content: "";
        position: absolute;
        right: -80px;
        top: -80px;
        width: 380px;
        height: 380px;
        background: radial-gradient(circle, rgba(194, 65, 12, 0.12) 0%, rgba(254, 243, 199, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .academy-stats-bar {
        background: #FFFFFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 24px 30px;
        box-shadow: var(--shadow-card);
        margin-top: -30px;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 20px;
        align-items: center;
    }
    .stat-box {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .stat-icon-wrap {
        width: 52px;
        height: 52px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
    }
    .level-pill-nav {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        padding-bottom: 6px;
        scrollbar-width: thin;
        margin: 28px 0 20px;
    }
    .level-nav-btn {
        padding: 10px 22px;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 14.5px;
        border: 1.5px solid var(--border-color);
        background: #FFF;
        color: var(--text-muted);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: var(--transition);
        white-space: nowrap;
        text-decoration: none;
    }
    .level-nav-btn:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--primary-light);
    }
    .level-nav-btn.active {
        background: var(--primary);
        color: #FFF;
        border-color: var(--primary);
        box-shadow: var(--shadow-sm);
    }
    .level-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 48px;
    }
    .level-card {
        background: #FFF;
        border: 2px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 26px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }
    .level-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
    }
    .lesson-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 22px;
        margin-bottom: 48px;
    }
    .lesson-card {
        background: #FFF;
        border: 1.5px solid var(--border-warm);
        border-radius: var(--radius-lg);
        padding: 22px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }
    .lesson-card:hover {
        border-color: #FDBA74;
        box-shadow: var(--shadow-md);
    }
    .lesson-card.is-learned {
        border-color: #86EFAC;
        background: #F0FDF4;
    }
    .lesson-badge {
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 3px 10px;
        border-radius: var(--radius-pill);
        display: inline-block;
        margin-bottom: 12px;
    }
    .practice-recipe-card {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF 100%);
        border: 2px solid #FED7AA;
        border-radius: var(--radius-xl);
        padding: 28px;
        box-shadow: var(--shadow-card);
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 28px;
        align-items: center;
        margin-bottom: 48px;
    }
    .quick-tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 48px;
    }
    .quick-tool-card {
        background: #FFF;
        border: 1px solid var(--border-warm);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        text-align: center;
        text-decoration: none;
        color: inherit;
    }
    .quick-tool-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary);
    }
    @media (max-width: 768px) {
        .practice-recipe-card { grid-template-columns: 1fr; }
        .academy-stats-bar { grid-template-columns: 1fr; }
    }
</style>

<!-- ==================== ACADEMY HERO ==================== -->
<section class="academy-hero">
    <div class="container">
        <div style="max-width: 820px; margin: 0 auto; text-align: center;">
            
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.95); padding: 6px 20px; border-radius: var(--radius-pill); border: 1.5px solid #FDBA74; margin-bottom: 20px; box-shadow: var(--shadow-sm);">
                <span style="font-size: 20px;">🎓</span>
                <span style="color: var(--primary); font-weight: 800; font-size: 13.5px; text-transform: uppercase; letter-spacing: 0.8px;">
                    Amma's Recipe Book — Master Chef Academy
                </span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(32px, 5vw, 48px); font-weight: 700; color: var(--earth-brown); line-height: 1.2; margin-bottom: 16px;">
                From Your First Dish to Master Chef at Home
            </h1>

            <p style="font-size: clamp(16px, 2vw, 19px); color: var(--text-muted); line-height: 1.65; max-width: 680px; margin: 0 auto 28px;">
                Learn cooking step by step, master traditional recipes, understand culinary science, explore restaurant gravies, and build lifelong confidence in your kitchen.
            </p>

            <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
                <a href="#learningLevels" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px; border-radius: var(--radius-pill);">
                    Explore Curriculum Levels
                </a>
                <a href="quiz.php" class="btn btn-secondary" style="padding: 12px 26px; font-size: 15px; border-radius: var(--radius-pill);">
                    ✍️ Take Cooking Quiz
                </a>
                <a href="challenges.php" class="btn btn-secondary" style="padding: 12px 26px; font-size: 15px; border-radius: var(--radius-pill);">
                    🏆 Cooking Challenges
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ==================== REAL PROGRESS STATS BAR ==================== -->
<section style="padding: 0 0 40px;">
    <div class="container">
        <div class="academy-stats-bar">
            
            <!-- STAT 1: LESSONS COMPLETED -->
            <div class="stat-box">
                <div class="stat-icon-wrap" style="background: #ECFDF5; color: #059669; border: 1px solid #A7F3D0;">
                    📚
                </div>
                <div>
                    <div style="font-size: 24px; font-weight: 800; color: var(--earth-brown); line-height: 1.1;" id="statLessonsCount">
                        0 / <?= $totalLessons ?>
                    </div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Lessons Mastered</div>
                </div>
            </div>

            <!-- STAT 2: RECIPES PRACTICED / MASTERED -->
            <div class="stat-box">
                <div class="stat-icon-wrap" style="background: #FFF7ED; color: #EA580C; border: 1px solid #FED7AA;">
                    🍳
                </div>
                <div>
                    <div style="font-size: 24px; font-weight: 800; color: var(--earth-brown); line-height: 1.1;" id="statMasteredCount">
                        0 / <?= count($recipes) ?>
                    </div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Recipes Mastered</div>
                </div>
            </div>

            <!-- STAT 3: CHALLENGES COMPLETED -->
            <div class="stat-box">
                <div class="stat-icon-wrap" style="background: #EFF6FF; color: #2563EB; border: 1px solid #BFDBFE;">
                    🏆
                </div>
                <div>
                    <div style="font-size: 24px; font-weight: 800; color: var(--earth-brown); line-height: 1.1;" id="statChallengesCount">
                        0 / <?= $totalChallenges ?>
                    </div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Challenges Finished</div>
                </div>
            </div>

            <!-- STAT 4: OVERALL ACADEMY PROGRESS -->
            <div class="stat-box">
                <div class="stat-icon-wrap" style="background: #FDF4FF; color: #9333EA; border: 1px solid #F0ABFC;">
                    🌟
                </div>
                <div style="flex: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--earth-brown);" id="statOverallPct">0%</span>
                        <span style="font-size: 12px; font-weight: 700; color: #9333EA;" id="currentRankBadge">Beginner Cook</span>
                    </div>
                    <div style="width: 100%; height: 8px; background: #F3E8FF; border-radius: var(--radius-pill); overflow: hidden;">
                        <div id="statProgressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #9333EA, #C2410C); transition: width 0.4s ease;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==================== CONTINUE LEARNING CARD ==================== -->
<section style="padding: 10px 0 30px;" id="continueLearningSection">
    <div class="container">
        <div style="background: #FFF; border: 1.5px solid var(--border-warm); border-radius: var(--radius-xl); padding: 26px 30px; box-shadow: var(--shadow-sm); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
            <div style="display: flex; align-items: center; gap: 18px;">
                <div style="width: 56px; height: 56px; border-radius: 50%; background: #FFF8EE; border: 2px solid #FDBA74; display: flex; align-items: center; justify-content: center; font-size: 26px; flex-shrink: 0;">
                    📖
                </div>
                <div>
                    <div style="font-size: 12px; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 0.8px;">
                        Recommended Next Lesson
                    </div>
                    <h3 id="continueLessonTitle" style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: var(--earth-brown); margin: 2px 0;">
                        Understanding Teaspoons, Tablespoons, Cups & Kitchen Measurements
                    </h3>
                    <p id="continueLessonDesc" style="font-size: 13.5px; color: var(--text-muted);">
                        Start with precise measurement fundamentals to guarantee consistent cooking results.
                    </p>
                </div>
            </div>
            <a id="continueLessonBtn" href="lesson.php?id=beg-measurements" class="btn btn-primary" style="padding: 10px 24px; border-radius: var(--radius-pill); font-size: 14.5px; white-space: nowrap;">
                Start Lesson →
            </a>
        </div>
    </div>
</section>

<!-- ==================== 4 LEARNING LEVELS ==================== -->
<section style="padding: 30px 0 20px;" id="learningLevels">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Structured Curriculum</span>
                <h2 class="section-heading">4 Progressive Cooking Levels</h2>
                <p style="color: var(--text-muted); font-size: 15px; margin-top: 4px;">
                    Progress systematically from kitchen foundations to restaurant-quality home cooking.
                </p>
            </div>
        </div>

        <div class="level-card-grid">
            <?php foreach ($levels as $lKey => $lvl): ?>
                <div class="level-card" style="border-top: 4px solid <?= $lvl['color'] ?>;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                            <span class="lesson-badge" style="background: <?= $lvl['bg_light'] ?>; color: <?= $lvl['color'] ?>; border: 1px solid <?= $lvl['border_color'] ?>;">
                                <?= $lvl['badge'] ?>
                            </span>
                            <span style="font-size: 28px;"><?= $lvl['icon'] ?></span>
                        </div>
                        <h3 style="font-family: var(--font-serif); font-size: 22px; font-weight: 700; color: var(--earth-brown); margin-bottom: 6px;">
                            <?= h($lvl['title']) ?>
                        </h3>
                        <div style="font-size: 13px; font-weight: 600; color: <?= $lvl['color'] ?>; margin-bottom: 12px;">
                            <?= h($lvl['tagline']) ?>
                        </div>
                        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 18px;">
                            <?= h($lvl['description']) ?>
                        </p>
                    </div>

                    <div>
                        <div style="border-top: 1px dashed var(--border-color); padding-top: 14px; margin-bottom: 14px; font-size: 12.5px; color: var(--text-light);">
                            <strong>Target:</strong> <?= h($lvl['target_audience']) ?>
                        </div>
                        <a href="academy.php?level=<?= urlencode($lKey) ?>#lessonsDirectory" class="btn btn-secondary" style="width: 100%; justify-content: center; border-radius: var(--radius-pill); font-size: 14px; font-weight: 700;">
                            View Level Lessons →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ==================== PRACTICE TODAY'S RECIPE ==================== -->
<section style="padding: 10px 0 30px;">
    <div class="container">
        <div class="practice-recipe-card">
            <div style="position: relative; background: <?= $practiceRecipe['accent_color'] ?? '#FFF3E0' ?>; border-radius: var(--radius-lg); height: 240px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-warm); overflow: hidden;">
                <div style="font-size: 84px;"><?= $practiceRecipe['icon'] ?? '🍲' ?></div>
                <div style="position: absolute; top: 12px; left: 12px; background: #C2410C; color: #FFF; font-size: 11.5px; font-weight: 800; padding: 4px 12px; border-radius: var(--radius-pill); letter-spacing: 0.5px;">
                    🎯 PRACTICE TODAY'S RECIPE
                </div>
            </div>

            <div>
                <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 8px;">
                    <span style="background: #FFF; border: 1px solid var(--border-warm); padding: 4px 10px; border-radius: var(--radius-pill); font-size: 12px; font-weight: 700; color: var(--text-muted);">
                        ⏱️ <?= ($practiceRecipe['prep_time'] ?? 0) + ($practiceRecipe['cook_time'] ?? 0) ?> mins
                    </span>
                    <span style="background: #FFF; border: 1px solid var(--border-warm); padding: 4px 10px; border-radius: var(--radius-pill); font-size: 12px; font-weight: 700; color: var(--text-muted);">
                        👥 <?= $practiceRecipe['servings'] ?? 4 ?> Servings
                    </span>
                    <span style="background: #ECFDF5; border: 1px solid #A7F3D0; padding: 4px 10px; border-radius: var(--radius-pill); font-size: 12px; font-weight: 700; color: #047857;">
                        <?= h($practiceRecipe['difficulty'] ?? 'Easy') ?>
                    </span>
                </div>

                <h3 style="font-family: var(--font-serif); font-size: 26px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px;">
                    <?= h($practiceRecipe['name']) ?>
                </h3>

                <p style="font-size: 14.5px; color: var(--text-muted); line-height: 1.6; margin-bottom: 20px;">
                    <?= h($practiceRecipe['description'] ?? '') ?>
                </p>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="recipe.php?id=<?= urlencode($practiceRecipe['id']) ?>" class="btn btn-primary" style="padding: 10px 24px; border-radius: var(--radius-pill);">
                        View Recipe & Steps →
                    </a>
                    <a href="recipe.php?id=<?= urlencode($practiceRecipe['id']) ?>#cookingModeModal" onclick="localStorage.setItem('amma_trigger_cook_mode','1')" class="btn btn-secondary" style="padding: 10px 20px; border-radius: var(--radius-pill); background: #FFF;">
                        🧑‍🍳 Launch Cooking Mode
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== LESSONS DIRECTORY ==================== -->
<section style="padding: 20px 0 50px;" id="lessonsDirectory">
    <div class="container">
        
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Comprehensive Masterclass Lessons</span>
                <h2 class="section-heading">Cooking Lessons & Core Techniques</h2>
            </div>
        </div>

        <!-- LEVEL FILTER PILLS -->
        <div class="level-pill-nav">
            <a href="academy.php?level=all#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'all' ? 'active' : '' ?>">
                All Lessons (<?= count($lessons) ?>)
            </a>
            <a href="academy.php?level=beginner#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'beginner' ? 'active' : '' ?>">
                🌱 Level 1: Beginner Cook
            </a>
            <a href="academy.php?level=intermediate#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'intermediate' ? 'active' : '' ?>">
                🔥 Level 2: Intermediate
            </a>
            <a href="academy.php?level=advanced#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'advanced' ? 'active' : '' ?>">
                🌟 Level 3: Advanced
            </a>
            <a href="academy.php?level=restaurant#lessonsDirectory" class="level-nav-btn <?= $activeLevel === 'restaurant' ? 'active' : '' ?>">
                👑 Level 4: Restaurant Chef
            </a>
        </div>

        <!-- LESSONS CARDS -->
        <div class="lesson-grid">
            <?php foreach ($displayedLessons as $lId => $les): ?>
                <?php
                    $lvlInfo = $levels[$les['level']] ?? $levels['beginner'];
                ?>
                <article class="lesson-card" id="lesson-card-<?= $lId ?>" data-lesson-id="<?= $lId ?>">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span class="lesson-badge" style="background: <?= $lvlInfo['bg_light'] ?>; color: <?= $lvlInfo['color'] ?>; border: 1px solid <?= $lvlInfo['border_color'] ?>;">
                                <?= $lvlInfo['badge'] ?> • <?= h($les['category']) ?>
                            </span>
                            <span style="font-size: 24px;"><?= $les['icon'] ?></span>
                        </div>

                        <h3 style="font-family: var(--font-serif); font-size: 19px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px; line-height: 1.3;">
                            <a href="lesson.php?id=<?= urlencode($lId) ?>" style="color: inherit;">
                                <?= h($les['title']) ?>
                            </a>
                        </h3>

                        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 18px;">
                            <?= h($les['summary']) ?>
                        </p>
                    </div>

                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-warm); padding-top: 14px;">
                            <span style="font-size: 13px; color: var(--text-light); font-weight: 600;">
                                ⏱️ <?= $les['read_time'] ?? 8 ?> min study
                            </span>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <button type="button" class="btn-mark-lesson-learned" data-toggle-lesson="<?= $lId ?>" style="background: #FFF; border: 1.5px solid var(--border-color); border-radius: var(--radius-pill); padding: 5px 12px; font-size: 12.5px; font-weight: 700; cursor: pointer; transition: var(--transition);">
                                    Mark Learned
                                </button>
                                <a href="lesson.php?id=<?= urlencode($lId) ?>" class="btn btn-primary" style="padding: 6px 14px; border-radius: var(--radius-pill); font-size: 13px;">
                                    Read →
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ==================== QUICK ACCESS TOOLS ==================== -->
<section style="padding: 20px 0 60px;">
    <div class="container">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Interactive Academy Features</span>
                <h2 class="section-heading">Master Chef Learning Tools</h2>
            </div>
        </div>

        <div class="quick-tools-grid">
            
            <a href="what-can-i-cook.php" class="quick-tool-card">
                <div style="font-size: 40px; margin-bottom: 12px;">🥕</div>
                <h3 style="font-family: var(--font-serif); font-size: 19px; color: var(--earth-brown); margin-bottom: 6px;">
                    What Can I Cook?
                </h3>
                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5;">
                    Select ingredients in your pantry and instantly discover matching dishes.
                </p>
            </a>

            <a href="challenges.php" class="quick-tool-card">
                <div style="font-size: 40px; margin-bottom: 12px;">🏆</div>
                <h3 style="font-family: var(--font-serif); font-size: 19px; color: var(--earth-brown); margin-bottom: 6px;">
                    Cooking Challenges
                </h3>
                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5;">
                    Put your skills to the test with 15 structured Easy, Medium, and Advanced cooking missions.
                </p>
            </a>

            <a href="knowledge-centre.php" class="quick-tool-card">
                <div style="font-size: 40px; margin-bottom: 12px;">🔬</div>
                <h3 style="font-family: var(--font-serif); font-size: 19px; color: var(--earth-brown); margin-bottom: 6px;">
                    Knowledge Centre
                </h3>
                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5;">
                    Explore cooking science, ingredient selection, and safe troubleshooting fixes.
                </p>
            </a>

            <a href="quiz.php" class="quick-tool-card">
                <div style="font-size: 40px; margin-bottom: 12px;">✍️</div>
                <h3 style="font-family: var(--font-serif); font-size: 19px; color: var(--earth-brown); margin-bottom: 6px;">
                    Cooking Quizzes
                </h3>
                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5;">
                    Test your culinary knowledge with instant feedback across all difficulty tiers.
                </p>
            </a>

            <a href="progress.php" class="quick-tool-card">
                <div style="font-size: 40px; margin-bottom: 12px;">📊</div>
                <h3 style="font-family: var(--font-serif); font-size: 19px; color: var(--earth-brown); margin-bottom: 6px;">
                    Learning Dashboard
                </h3>
                <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5;">
                    Track completed lessons, export & import progress, and manage your culinary journey.
                </p>
            </a>

        </div>
    </div>
</section>

<!-- EMBEDDED JAVASCRIPT FOR ACADEMY PROGRESS PERSISTENCE -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const totalLessons = <?= $totalLessons ?>;
    const totalRecipes = <?= count($recipes) ?>;
    const totalChallenges = <?= $totalChallenges ?>;
    const allLessonsList = <?= json_encode(array_values($lessons), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

    function refreshAcademyStats() {
        if (!window.AmmaStorage) return;

        const learnedLessons = window.AmmaStorage.get('amma_learned_lessons', []);
        const masteredRecipes = window.AmmaStorage.get('amma_mastered_recipes', []);
        const finishedChallenges = window.AmmaStorage.get('amma_completed_challenges', []);

        // Update counts
        const lCount = learnedLessons.length;
        const mCount = masteredRecipes.length;
        const cCount = finishedChallenges.length;

        document.getElementById('statLessonsCount').textContent = lCount + ' / ' + totalLessons;
        document.getElementById('statMasteredCount').textContent = mCount + ' / ' + totalRecipes;
        document.getElementById('statChallengesCount').textContent = cCount + ' / ' + totalChallenges;

        // Calculate weighted overall progress percentage (40% lessons, 40% recipes, 20% challenges)
        const lessonPct = totalLessons > 0 ? (lCount / totalLessons) * 40 : 0;
        const recipePct = totalRecipes > 0 ? (mCount / totalRecipes) * 40 : 0;
        const chalPct = totalChallenges > 0 ? (cCount / totalChallenges) * 20 : 0;
        const overallPct = Math.min(100, Math.round(lessonPct + recipePct + chalPct));

        document.getElementById('statOverallPct').textContent = overallPct + '%';
        document.getElementById('statProgressBar').style.width = overallPct + '%';

        // Rank determination
        let rank = 'Beginner Cook 🌱';
        if (overallPct >= 75) rank = 'Restaurant Chef 👑';
        else if (overallPct >= 50) rank = 'Advanced Home Cook 🌟';
        else if (overallPct >= 25) rank = 'Intermediate Cook 🔥';
        document.getElementById('currentRankBadge').textContent = rank;

        // Update card styles
        document.querySelectorAll('[data-lesson-id]').forEach(function(card) {
            const lId = card.getAttribute('data-lesson-id');
            const btn = card.querySelector('[data-toggle-lesson]');
            if (learnedLessons.includes(lId)) {
                card.classList.add('is-learned');
                if (btn) {
                    btn.textContent = '✓ Learned';
                    btn.style.background = '#15803D';
                    btn.style.color = '#FFF';
                    btn.style.borderColor = '#15803D';
                }
            } else {
                card.classList.remove('is-learned');
                if (btn) {
                    btn.textContent = 'Mark Learned';
                    btn.style.background = '#FFF';
                    btn.style.color = 'inherit';
                    btn.style.borderColor = 'var(--border-color)';
                }
            }
        });

        // Dynamic Next Recommended Lesson
        const nextLessonTitle = document.getElementById('continueLessonTitle');
        const nextLessonDesc = document.getElementById('continueLessonDesc');
        const nextLessonBtn = document.getElementById('continueLessonBtn');

        if (nextLessonTitle && allLessonsList.length > 0) {
            let nextLesson = null;
            for (let i = 0; i < allLessonsList.length; i++) {
                if (!learnedLessons.includes(allLessonsList[i].id)) {
                    nextLesson = allLessonsList[i];
                    break;
                }
            }

            if (nextLesson) {
                nextLessonTitle.textContent = nextLesson.title;
                nextLessonDesc.textContent = nextLesson.summary;
                nextLessonBtn.href = 'lesson.php?id=' + encodeURIComponent(nextLesson.id);
                nextLessonBtn.textContent = 'Start Lesson →';
            } else {
                nextLessonTitle.textContent = '🎉 All Academy Lessons Completed!';
                nextLessonDesc.textContent = 'Congratulations, Amma! You have studied every single lesson across all 4 levels.';
                nextLessonBtn.href = 'progress.php';
                nextLessonBtn.textContent = 'View Progress Dashboard →';
            }
        }
    }

    // Toggle lesson status directly from card button
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[data-toggle-lesson]');
        if (!btn) return;
        
        e.preventDefault();
        const lId = btn.getAttribute('data-toggle-lesson');
        if (!lId || !window.AmmaStorage) return;

        let learned = window.AmmaStorage.get('amma_learned_lessons', []);
        const idx = learned.indexOf(lId);
        if (idx > -1) {
            learned.splice(idx, 1);
        } else {
            learned.push(lId);
        }
        window.AmmaStorage.set('amma_learned_lessons', learned);
        refreshAcademyStats();
    });

    refreshAcademyStats();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
