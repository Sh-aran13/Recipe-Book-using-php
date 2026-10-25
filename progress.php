<?php
// progress.php - Learning Progress Dashboard & Personal Cookbook (Local Device Storage)
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "My Culinary Progress & Personal Cookbook — Master Chef Academy";
$current_page = 'academy';

$allLessons = get_academy_lessons();
$allChallenges = get_cooking_challenges();
$allQuizzes = get_cooking_quizzes();
$totalLessons = count($allLessons);
$totalRecipes = count($recipes);

$totalChallenges = 0;
foreach ($allChallenges as $cGroup) {
    $totalChallenges += count($cGroup['items']);
}

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED PROGRESS DASHBOARD STYLES -->
<style>
    .progress-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
        padding: 45px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .progress-summary-card {
        background: #FFF;
        border: 2px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 30px;
        box-shadow: var(--shadow-card);
        margin-bottom: 36px;
    }
    .metric-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 24px;
    }
    .metric-box {
        background: var(--bg-warm);
        border: 1px solid var(--border-warm);
        border-radius: var(--radius-lg);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .metric-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }
    .progress-section {
        margin-bottom: 40px;
    }
    .item-list-card {
        background: #FFF;
        border: 1px solid var(--border-warm);
        border-radius: var(--radius-lg);
        padding: 20px 24px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }
    .empty-note {
        text-align: center;
        padding: 36px 20px;
        color: var(--text-muted);
        font-size: 15px;
        background: var(--bg-warm);
        border: 1.5px dashed var(--border-warm);
        border-radius: var(--radius-lg);
    }
    .action-btn {
        padding: 8px 18px;
        border-radius: var(--radius-pill);
        font-size: 13.5px;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        border: 1.5px solid transparent;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
</style>

<!-- HERO -->
<section class="progress-hero">
    <div class="container">
        <div style="max-width: 860px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
                <a href="academy.php" style="color: var(--primary);">Master Chef Academy</a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);">Learning Progress & Personal Cookbook</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(28px, 4vw, 40px); font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                📊 Learning Progress & Personal Cookbook
            </h1>
            <p style="font-size: 16px; color: var(--text-muted); line-height: 1.65; margin-bottom: 16px;">
                Track completed kitchen lessons, recipes marked as mastered, challenge badges, and quiz scores. Your culinary milestones are safely saved locally on this device.
            </p>

            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.9); border: 1px solid #FED7AA; padding: 6px 14px; border-radius: var(--radius-pill); font-size: 13px; color: var(--earth-brown);">
                <span>🔒</span>
                <span>Private & Offline: Progress data stays on this device without tracking or accounts.</span>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTAINER -->
<div class="container" style="padding: 40px 20px 80px;">
    
    <!-- OVERALL SUMMARY CARD -->
    <div class="progress-summary-card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px;">
            <div>
                <span style="font-size: 12px; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 0.8px;">
                    Current Culinary Rank
                </span>
                <h2 id="overallRankTitle" style="font-family: var(--font-serif); font-size: 28px; color: var(--earth-brown); margin: 4px 0;">
                    Beginner Cook 🌱
                </h2>
                <p id="rankNextStepDesc" style="font-size: 14.5px; color: var(--text-muted);">
                    Complete lessons and mark dishes as practiced to level up toward Intermediate Cook.
                </p>
            </div>

            <div style="text-align: right;">
                <div style="font-size: 36px; font-family: var(--font-serif); font-weight: 800; color: var(--primary);" id="overallPctNumber">
                    0%
                </div>
                <div style="font-size: 13px; font-weight: 700; color: var(--text-muted);">Master Chef Progress</div>
            </div>
        </div>

        <div style="width: 100%; height: 12px; background: #FED7AA; border-radius: var(--radius-pill); overflow: hidden; margin: 20px 0;">
            <div id="overallMainProgressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #EA580C, #C2410C); transition: width 0.4s ease;"></div>
        </div>

        <!-- METRIC GRID -->
        <div class="metric-grid">
            <div class="metric-box">
                <div class="metric-icon" style="background: #ECFDF5; border: 1px solid #A7F3D0; color: #059669;">📚</div>
                <div>
                    <div style="font-size: 22px; font-weight: 800; color: var(--earth-brown);" id="metricLessons">0 / <?= $totalLessons ?></div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Lessons Completed</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon" style="background: #FFF7ED; border: 1px solid #FED7AA; color: #EA580C;">👑</div>
                <div>
                    <div style="font-size: 22px; font-weight: 800; color: var(--earth-brown);" id="metricMastered">0 / <?= $totalRecipes ?></div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Recipes Mastered</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon" style="background: #EFF6FF; border: 1px solid #BFDBFE; color: #2563EB;">🏆</div>
                <div>
                    <div style="font-size: 22px; font-weight: 800; color: var(--earth-brown);" id="metricChallenges">0 / <?= $totalChallenges ?></div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Challenges Finished</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon" style="background: #FDF4FF; border: 1px solid #F0ABFC; color: #9333EA;">⭐</div>
                <div>
                    <div style="font-size: 22px; font-weight: 800; color: var(--earth-brown);" id="metricQuizzes">0 / 3</div>
                    <div style="font-size: 13px; color: var(--text-muted); font-weight: 600;">Quizzes Attempted</div>
                </div>
            </div>
        </div>

        <!-- BACKUP / EXPORT / IMPORT CONTROLS (Requirement 13) -->
        <div style="border-top: 1.5px dashed var(--border-warm); margin-top: 28px; padding-top: 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
            <div style="font-size: 14px; color: var(--text-muted); font-weight: 600;">
                💾 Data Management (Export & Import Backup):
            </div>
            
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <button type="button" id="btnExportProgress" class="action-btn" style="background: var(--bg-warm); border-color: var(--border-warm); color: var(--earth-brown);">
                    ⬇️ Export Progress JSON
                </button>
                <label class="action-btn" style="background: var(--bg-warm); border-color: var(--border-warm); color: var(--earth-brown); cursor: pointer;">
                    ⬆️ Import Progress JSON
                    <input type="file" id="importFileInput" accept=".json,application/json" style="display: none;">
                </label>
                <button type="button" id="btnResetProgress" class="action-btn" style="background: #FEF2F2; border-color: #FCA5A5; color: #991B1B;">
                    🗑️ Reset Progress
                </button>
            </div>
        </div>
        <div id="importExportNotice" style="display: none; margin-top: 12px; font-size: 13.5px; font-weight: 700; padding: 10px 14px; border-radius: var(--radius-sm);"></div>
    </div>

    <!-- SECTION 1: MASTERED RECIPES (PERSONAL COOKBOOK) -->
    <section class="progress-section">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Personal Cookbook</span>
                <h3 class="section-heading" style="font-size: 24px;">Dishes You Have Mastered</h3>
            </div>
            <a href="recipes.php" style="font-size: 14px; font-weight: 700; color: var(--primary);">Browse All Recipes →</a>
        </div>

        <div id="masteredRecipesContainer">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- SECTION 2: COMPLETED ACADEMY LESSONS -->
    <section class="progress-section">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Curriculum Milestones</span>
                <h3 class="section-heading" style="font-size: 24px;">Completed Cooking Lessons</h3>
            </div>
            <a href="academy.php#lessonsDirectory" style="font-size: 14px; font-weight: 700; color: var(--primary);">View Academy Directory →</a>
        </div>

        <div id="completedLessonsContainer">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- SECTION 3: RECENTLY VIEWED RECIPES -->
    <section class="progress-section">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Quick Resume</span>
                <h3 class="section-heading" style="font-size: 24px;">Recently Viewed Recipes</h3>
            </div>
        </div>

        <div id="recentRecipesContainer">
            <!-- Filled dynamically -->
        </div>
    </section>

    <!-- SECTION 4: FAVORITES SHORTCUT -->
    <section class="progress-section">
        <div class="section-header-wrap">
            <div>
                <span class="section-eyebrow">Saved For Later</span>
                <h3 class="section-heading" style="font-size: 24px;">Favorite Recipes Shortcut</h3>
            </div>
            <a href="favorites.php" style="font-size: 14px; font-weight: 700; color: var(--primary);">Open Favorites Page →</a>
        </div>

        <div id="favoritesListContainer">
            <!-- Filled dynamically -->
        </div>
    </section>

</div>

<!-- JAVASCRIPT FOR PROGRESS CALCULATIONS, EXPORT, IMPORT & RESET -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const allLessonsData = <?= json_encode($allLessons, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

    const recipeMap = {};
    allRecipesData.forEach(function(r) { recipeMap[r.id] = r; });

    const totalLessons = <?= $totalLessons ?>;
    const totalRecipes = <?= $totalRecipes ?>;
    const totalChallenges = <?= $totalChallenges ?>;

    function renderProgressDashboard() {
        if (!window.AmmaStorage) return;

        const learnedLessons = window.AmmaStorage.get('amma_learned_lessons', []);
        const masteredRecipes = window.AmmaStorage.get('amma_mastered_recipes', []);
        const completedChallenges = window.AmmaStorage.get('amma_completed_challenges', []);
        const quizScores = window.AmmaStorage.get('amma_quiz_best_scores', {});
        const recentRecipeIds = window.AmmaStorage.get('amma_recent_recipes', []);
        const favoriteIds = window.AmmaStorage.get('amma_fav_recipes', []);

        // Update metric counts
        document.getElementById('metricLessons').textContent = learnedLessons.length + ' / ' + totalLessons;
        document.getElementById('metricMastered').textContent = masteredRecipes.length + ' / ' + totalRecipes;
        document.getElementById('metricChallenges').textContent = completedChallenges.length + ' / ' + totalChallenges;
        document.getElementById('metricQuizzes').textContent = Object.keys(quizScores).length + ' / 3';

        // Weighted Overall Score: 40% lessons, 40% recipes, 20% challenges
        const lPct = totalLessons > 0 ? (learnedLessons.length / totalLessons) * 40 : 0;
        const rPct = totalRecipes > 0 ? (masteredRecipes.length / totalRecipes) * 40 : 0;
        const cPct = totalChallenges > 0 ? (completedChallenges.length / totalChallenges) * 20 : 0;
        const overall = Math.min(100, Math.round(lPct + rPct + cPct));

        document.getElementById('overallPctNumber').textContent = overall + '%';
        document.getElementById('overallMainProgressBar').style.width = overall + '%';

        let rank = 'Beginner Cook 🌱';
        let desc = 'Complete your foundational lessons on knife skills and everyday staples.';
        if (overall >= 75) {
            rank = 'Restaurant Chef at Home 👑';
            desc = 'Outstanding mastery! You have conquered advanced technique and complex culinary recipes.';
        } else if (overall >= 50) {
            rank = 'Advanced Home Cook 🌟';
            desc = 'You have mastered core bases and multi-course meals. Tackle dum biryanis and sweets!';
        } else if (overall >= 25) {
            rank = 'Intermediate Cook 🔥';
            desc = 'Great progress! Practice onion-tomato gravies, flatbreads, and restaurant curries.';
        }
        document.getElementById('overallRankTitle').textContent = rank;
        document.getElementById('rankNextStepDesc').textContent = desc;

        // 1. Render Mastered Recipes
        const mContainer = document.getElementById('masteredRecipesContainer');
        if (masteredRecipes.length === 0) {
            mContainer.innerHTML = '<div class="empty-note">🍳 No dishes marked as mastered yet. Open any recipe, complete the checklist, and set status to "Mastered".</div>';
        } else {
            let mHtml = '';
            masteredRecipes.forEach(function(rId) {
                const r = recipeMap[rId];
                if (!r) return;
                mHtml += '<div class="item-list-card">' +
                    '<div style="display: flex; align-items: center; gap: 14px;">' +
                        '<span style="font-size: 28px;">' + (r.icon || '🍲') + '</span>' +
                        '<div>' +
                            '<div style="font-size: 11.5px; font-weight: 700; color: #15803D; text-transform: uppercase;">👑 Mastered Recipe</div>' +
                            '<h4 style="font-family: var(--font-serif); font-size: 17px; color: var(--earth-brown); margin: 2px 0;">' + r.name + '</h4>' +
                            '<span style="font-size: 13px; color: var(--text-muted);">' + r.category + ' • ' + (r.prep_time + r.cook_time) + ' mins</span>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="btn btn-secondary" style="font-size: 13px; padding: 6px 14px; border-radius: var(--radius-pill);">View Recipe →</a>' +
                '</div>';
            });
            mContainer.innerHTML = mHtml;
        }

        // 2. Render Completed Lessons
        const lContainer = document.getElementById('completedLessonsContainer');
        if (learnedLessons.length === 0) {
            lContainer.innerHTML = '<div class="empty-note">📚 No lessons completed yet. Visit the Master Chef Academy and click "Mark as Learned" on lessons you finish.</div>';
        } else {
            let lHtml = '';
            learnedLessons.forEach(function(lId) {
                const l = allLessonsData[lId];
                if (!l) return;
                lHtml += '<div class="item-list-card">' +
                    '<div style="display: flex; align-items: center; gap: 14px;">' +
                        '<span style="font-size: 26px;">' + (l.icon || '📖') + '</span>' +
                        '<div>' +
                            '<div style="font-size: 11px; font-weight: 700; color: var(--primary); text-transform: uppercase;">' + l.category + '</div>' +
                            '<h4 style="font-family: var(--font-serif); font-size: 16.5px; color: var(--earth-brown); margin: 2px 0;">' + l.title + '</h4>' +
                        '</div>' +
                    '</div>' +
                    '<a href="lesson.php?id=' + encodeURIComponent(l.id) + '" class="btn btn-secondary" style="font-size: 13px; padding: 6px 14px; border-radius: var(--radius-pill);">Review Lesson →</a>' +
                '</div>';
            });
            lContainer.innerHTML = lHtml;
        }

        // 3. Render Recently Viewed
        const rContainer = document.getElementById('recentRecipesContainer');
        const validRecents = recentRecipeIds.filter(function(id) { return !!recipeMap[id]; }).slice(0, 5);
        if (validRecents.length === 0) {
            rContainer.innerHTML = '<div class="empty-note">No recently viewed recipes yet. Explore recipes across the site!</div>';
        } else {
            let rHtml = '';
            validRecents.forEach(function(rId) {
                const r = recipeMap[rId];
                rHtml += '<div class="item-list-card">' +
                    '<div style="display: flex; align-items: center; gap: 14px;">' +
                        '<span style="font-size: 26px;">' + (r.icon || '🍲') + '</span>' +
                        '<div>' +
                            '<h4 style="font-family: var(--font-serif); font-size: 16.5px; color: var(--earth-brown); margin: 2px 0;">' + r.name + '</h4>' +
                            '<span style="font-size: 13px; color: var(--text-muted);">' + r.category + '</span>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="btn btn-secondary" style="font-size: 13px; padding: 6px 14px; border-radius: var(--radius-pill);">Cook This →</a>' +
                '</div>';
            });
            rContainer.innerHTML = rHtml;
        }

        // 4. Render Favorites
        const fContainer = document.getElementById('favoritesListContainer');
        const validFavs = favoriteIds.filter(function(id) { return !!recipeMap[id]; }).slice(0, 5);
        if (validFavs.length === 0) {
            fContainer.innerHTML = '<div class="empty-note">❤️ No favorite recipes saved yet. Click the heart icon on any recipe card to save it here.</div>';
        } else {
            let fHtml = '';
            validFavs.forEach(function(rId) {
                const r = recipeMap[rId];
                fHtml += '<div class="item-list-card">' +
                    '<div style="display: flex; align-items: center; gap: 14px;">' +
                        '<span style="font-size: 26px;">❤️</span>' +
                        '<div>' +
                            '<h4 style="font-family: var(--font-serif); font-size: 16.5px; color: var(--earth-brown); margin: 2px 0;">' + r.name + '</h4>' +
                            '<span style="font-size: 13px; color: var(--text-muted);">' + r.category + '</span>' +
                        '</div>' +
                    '</div>' +
                    '<a href="recipe.php?id=' + encodeURIComponent(r.id) + '" class="btn btn-secondary" style="font-size: 13px; padding: 6px 14px; border-radius: var(--radius-pill);">View Recipe →</a>' +
                '</div>';
            });
            fContainer.innerHTML = fHtml;
        }
    }

    // EXPORT PROGRESS AS JSON (Requirement 13)
    document.getElementById('btnExportProgress').addEventListener('click', function() {
        if (!window.AmmaStorage) return;
        const backupData = {
            export_version: "1.0",
            app: "Amma's Recipe Book — Master Chef Academy",
            exported_at: new Date().toISOString(),
            amma_learned_lessons: window.AmmaStorage.get('amma_learned_lessons', []),
            amma_mastered_recipes: window.AmmaStorage.get('amma_mastered_recipes', []),
            amma_practiced_recipes: window.AmmaStorage.get('amma_practiced_recipes', []),
            amma_completed_challenges: window.AmmaStorage.get('amma_completed_challenges', []),
            amma_quiz_best_scores: window.AmmaStorage.get('amma_quiz_best_scores', {}),
            amma_fav_recipes: window.AmmaStorage.get('amma_fav_recipes', [])
        };

        const jsonStr = JSON.stringify(backupData, null, 2);
        const blob = new Blob([jsonStr], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'ammas_recipe_book_progress_backup.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotice('✓ Progress exported successfully as JSON file!', '#F0FDF4', '#15803D');
    });

    // IMPORT PROGRESS FROM JSON (With Safe Field Validation) (Requirement 13)
    document.getElementById('importFileInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(evt) {
            try {
                const parsed = JSON.parse(evt.target.result);
                if (typeof parsed !== 'object' || parsed === null) {
                    throw new Error('Invalid JSON structure');
                }

                // Strict whitelist validation of expected progress fields
                if (Array.isArray(parsed.amma_learned_lessons)) {
                    window.AmmaStorage.set('amma_learned_lessons', parsed.amma_learned_lessons.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_mastered_recipes)) {
                    window.AmmaStorage.set('amma_mastered_recipes', parsed.amma_mastered_recipes.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_practiced_recipes)) {
                    window.AmmaStorage.set('amma_practiced_recipes', parsed.amma_practiced_recipes.filter(function(x) { return typeof x === 'string'; }));
                }
                if (Array.isArray(parsed.amma_completed_challenges)) {
                    window.AmmaStorage.set('amma_completed_challenges', parsed.amma_completed_challenges.filter(function(x) { return typeof x === 'string'; }));
                }
                if (typeof parsed.amma_quiz_best_scores === 'object' && parsed.amma_quiz_best_scores !== null) {
                    window.AmmaStorage.set('amma_quiz_best_scores', parsed.amma_quiz_best_scores);
                }
                if (Array.isArray(parsed.amma_fav_recipes)) {
                    window.AmmaStorage.set('amma_fav_recipes', parsed.amma_fav_recipes.filter(function(x) { return typeof x === 'string'; }));
                }

                renderProgressDashboard();
                if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
                showNotice('✓ Backup imported and validated successfully!', '#F0FDF4', '#15803D');
            } catch (err) {
                showNotice('✕ Failed to import: Invalid JSON backup file.', '#FEF2F2', '#DC2626');
            }
        };
        reader.readAsText(file);
        this.value = ''; // reset input
    });

    // RESET PROGRESS WITH CONFIRMATION DIALOG (Requirement 13)
    document.getElementById('btnResetProgress').addEventListener('click', function() {
        const confirmed = window.confirm('Are you sure you want to reset all your cooking progress, completed lessons, challenges, and quiz scores on this device? This cannot be undone.');
        if (!confirmed) return;

        if (window.AmmaStorage) {
            window.AmmaStorage.set('amma_learned_lessons', []);
            window.AmmaStorage.set('amma_mastered_recipes', []);
            window.AmmaStorage.set('amma_practiced_recipes', []);
            window.AmmaStorage.set('amma_completed_challenges', []);
            window.AmmaStorage.set('amma_quiz_best_scores', {});
            // Clear cook steps
            for (let i = 0; i < localStorage.length; i++) {
                const k = localStorage.key(i);
                if (k && (k.startsWith('amma_cook_step_') || k.startsWith('amma_mastery_'))) {
                    localStorage.removeItem(k);
                }
            }
        }
        renderProgressDashboard();
        showNotice('All local progress has been reset.', '#FFFBEB', '#B45309');
    });

    function showNotice(text, bg, color) {
        const notice = document.getElementById('importExportNotice');
        notice.textContent = text;
        notice.style.background = bg;
        notice.style.color = color;
        notice.style.display = 'block';
        setTimeout(function() { notice.style.display = 'none'; }, 4000);
    }

    renderProgressDashboard();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
