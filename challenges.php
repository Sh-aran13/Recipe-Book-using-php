<?php
// challenges.php - Master Chef Cooking Challenges
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';
require_once __DIR__ . '/includes/academy-data.php';

$page_title = "Cooking Challenges — Master Chef Academy";
$current_page = 'academy';

$allChallenges = get_cooking_challenges();

// Active tab filter: 'all', 'easy', 'intermediate', 'advanced'
$activeTab = trim($_GET['tier'] ?? 'all');
if (!in_array($activeTab, ['all', 'easy', 'intermediate', 'advanced'], true)) {
    $activeTab = 'all';
}

$displayedGroups = $allChallenges;
if ($activeTab !== 'all' && isset($allChallenges[$activeTab])) {
    $displayedGroups = [$activeTab => $allChallenges[$activeTab]];
}

include __DIR__ . '/includes/header.php';
?>

<!-- EMBEDDED CHALLENGE STYLES -->
<style>
    .challenge-hero {
        background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 50%, #FEF3C7 100%);
        padding: 40px 0 35px;
        border-bottom: 1px solid var(--border-warm);
    }
    .challenge-card {
        background: #FFF;
        border: 2px solid var(--border-warm);
        border-radius: var(--radius-xl);
        padding: 28px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 30px;
        transition: var(--transition);
    }
    .challenge-card:hover {
        box-shadow: var(--shadow-md);
        border-color: #FDBA74;
    }
    .challenge-card.is-completed {
        border-color: #86EFAC;
        background: #F0FDF4;
    }
    .criteria-checklist-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        background: var(--bg-warm);
        border: 1px solid var(--border-warm);
        border-radius: var(--radius-md);
        margin-bottom: 6px;
        font-size: 14px;
        color: var(--text-main);
    }
</style>

<!-- CHALLENGE HERO -->
<section class="challenge-hero">
    <div class="container">
        <div style="max-width: 820px;">
            <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
                <a href="academy.php" style="color: var(--primary);">Master Chef Academy</a>
                <span>›</span>
                <span style="font-weight: 600; color: var(--earth-brown);">Cooking Challenges</span>
            </div>

            <h1 style="font-family: var(--font-serif); font-size: clamp(28px, 4vw, 40px); font-weight: 700; color: var(--earth-brown); margin-bottom: 10px;">
                🏆 Practical Cooking Challenges
            </h1>
            <p style="font-size: 16px; color: var(--text-muted); line-height: 1.6; margin-bottom: 20px;">
                Put your kitchen skills to the test with structured culinary missions. Review clear objectives, follow exact steps, verify success criteria, and manually mark each challenge complete.
            </p>

            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="challenges.php?tier=all" class="btn btn-secondary <?= $activeTab === 'all' ? 'active' : '' ?>" style="border-radius: var(--radius-pill); font-size: 13.5px; <?= $activeTab === 'all' ? 'background:var(--primary); color:#FFF;' : '' ?>">
                    All Challenges (15)
                </a>
                <a href="challenges.php?tier=easy" class="btn btn-secondary <?= $activeTab === 'easy' ? 'active' : '' ?>" style="border-radius: var(--radius-pill); font-size: 13.5px; <?= $activeTab === 'easy' ? 'background:#15803D; color:#FFF;' : '' ?>">
                    🌱 Easy Challenges (5)
                </a>
                <a href="challenges.php?tier=intermediate" class="btn btn-secondary <?= $activeTab === 'intermediate' ? 'active' : '' ?>" style="border-radius: var(--radius-pill); font-size: 13.5px; <?= $activeTab === 'intermediate' ? 'background:#D97706; color:#FFF;' : '' ?>">
                    🔥 Intermediate (5)
                </a>
                <a href="challenges.php?tier=advanced" class="btn btn-secondary <?= $activeTab === 'advanced' ? 'active' : '' ?>" style="border-radius: var(--radius-pill); font-size: 13.5px; <?= $activeTab === 'advanced' ? 'background:#C2410C; color:#FFF;' : '' ?>">
                    🌟 Advanced (5)
                </a>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CHALLENGES LIST -->
<div class="container" style="padding: 40px 20px 80px;">
    
    <?php foreach ($displayedGroups as $grpKey => $grp): ?>
        <div style="margin-bottom: 48px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px; border-bottom: 2px solid <?= $grp['color'] ?>; padding-bottom: 8px;">
                <span style="font-size: 32px;"><?= $grp['icon'] ?></span>
                <div>
                    <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--earth-brown);">
                        <?= h($grp['level_name']) ?>
                    </h2>
                    <span style="font-size: 12.5px; color: <?= $grp['color'] ?>; font-weight: 700; text-transform: uppercase;">
                        <?= h($grp['badge']) ?> Cooking Missions
                    </span>
                </div>
            </div>

            <?php foreach ($grp['items'] as $ch): ?>
                <?php $chId = $ch['id']; ?>
                <article class="challenge-card" id="challenge-card-<?= $chId ?>" data-challenge-id="<?= $chId ?>">
                    
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 16px;">
                        <div>
                            <span style="background: <?= $grp['color'] ?>15; color: <?= $grp['color'] ?>; border: 1px solid <?= $grp['color'] ?>40; padding: 3px 12px; border-radius: var(--radius-pill); font-size: 12px; font-weight: 800; text-transform: uppercase; margin-bottom: 8px; display: inline-block;">
                                <?= h($ch['difficulty']) ?> Mission
                            </span>
                            <h3 style="font-family: var(--font-serif); font-size: 22px; color: var(--earth-brown); margin: 4px 0;">
                                <?= h($ch['title']) ?>
                            </h3>
                            <p style="font-size: 15px; color: var(--text-muted); font-weight: 500;">
                                <strong>Objective:</strong> <?= h($ch['objective']) ?>
                            </p>
                        </div>

                        <div>
                            <button type="button" class="btn btn-primary btn-toggle-challenge" data-challenge-btn="<?= $chId ?>" style="padding: 10px 22px; border-radius: var(--radius-pill); font-size: 14px;">
                                Mark Challenge Complete ✓
                            </button>
                        </div>
                    </div>

                    <!-- INGREDIENTS & UTENSILS -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px; margin-bottom: 20px;">
                        
                        <div style="background: var(--bg-warm); padding: 16px; border-radius: var(--radius-md); border: 1px solid var(--border-warm);">
                            <h4 style="font-size: 13.5px; font-weight: 800; color: var(--earth-brown); margin-bottom: 8px; text-transform: uppercase;">
                                🛒 Required Ingredients
                            </h4>
                            <ul style="padding-left: 18px; font-size: 13.5px; color: var(--text-muted); display: flex; flex-direction: column; gap: 4px;">
                                <?php foreach ($ch['required_ingredients'] as $ri): ?>
                                    <li><?= h($ri) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div style="background: var(--bg-warm); padding: 16px; border-radius: var(--radius-md); border: 1px solid var(--border-warm);">
                            <h4 style="font-size: 13.5px; font-weight: 800; color: var(--earth-brown); margin-bottom: 8px; text-transform: uppercase;">
                                🫕 Utensils & Equipment
                            </h4>
                            <ul style="padding-left: 18px; font-size: 13.5px; color: var(--text-muted); display: flex; flex-direction: column; gap: 4px;">
                                <?php foreach ($ch['utensils'] as $ut): ?>
                                    <li><?= h($ut) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                    <!-- PREPARATION STEPS -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="font-size: 15px; font-weight: 800; color: var(--earth-brown); margin-bottom: 10px;">
                            Execution Steps:
                        </h4>
                        <ol style="padding-left: 20px; font-size: 14.5px; color: var(--text-main); line-height: 1.65; display: flex; flex-direction: column; gap: 8px;">
                            <?php foreach ($ch['steps'] as $st): ?>
                                <li><?= h($st) ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <!-- SUCCESS CRITERIA CHECKLIST -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="font-size: 15px; font-weight: 800; color: #15803D; margin-bottom: 10px;">
                            Success Criteria Checklist (Self-Evaluation):
                        </h4>
                        <div>
                            <?php foreach ($ch['success_criteria'] as $critIdx => $crit): ?>
                                <label class="criteria-checklist-item">
                                    <input type="checkbox" class="challenge-subchk" data-ch-key="<?= $chId ?>_c<?= $critIdx ?>" style="width: 18px; height: 18px; accent-color: #15803D;">
                                    <span><?= h($crit) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- MISTAKES & SAFETY -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; font-size: 13.5px;">
                        <div style="background: #FEF2F2; border: 1px solid #FCA5A5; padding: 14px; border-radius: var(--radius-md); color: #991B1B;">
                            <strong>⚠️ Common Mistake:</strong> <?= h($ch['common_mistakes']) ?>
                        </div>
                        <div style="background: #FFFBEB; border: 1px solid #FDE68A; padding: 14px; border-radius: var(--radius-md); color: #92400E;">
                            <strong>🔒 Kitchen Safety:</strong> <?= h($ch['safety']) ?>
                        </div>
                    </div>

                </article>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

</div>

<!-- JAVASCRIPT FOR CHALLENGE LOCAL STORAGE PERSISTENCE -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    function refreshChallengesUI() {
        if (!window.AmmaStorage) return;
        const completed = window.AmmaStorage.get('amma_completed_challenges', []);

        document.querySelectorAll('[data-challenge-id]').forEach(function(card) {
            const chId = card.getAttribute('data-challenge-id');
            const btn = card.querySelector('[data-challenge-btn]');
            const isDone = completed.includes(chId);

            if (isDone) {
                card.classList.add('is-completed');
                if (btn) {
                    btn.textContent = '✓ Challenge Completed';
                    btn.style.background = '#15803D';
                    btn.style.borderColor = '#15803D';
                }
            } else {
                card.classList.remove('is-completed');
                if (btn) {
                    btn.textContent = 'Mark Challenge Complete ✓';
                    btn.style.background = '';
                    btn.style.borderColor = '';
                }
            }
        });

        // Load sub-checklists
        document.querySelectorAll('.challenge-subchk').forEach(function(cb) {
            const key = 'amma_ch_sub_' + cb.getAttribute('data-ch-key');
            cb.checked = (window.AmmaStorage.get(key, false) === true);
        });
    }

    // Toggle main challenge button
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[data-challenge-btn]');
        if (!btn) return;
        e.preventDefault();

        const chId = btn.getAttribute('data-challenge-btn');
        if (!chId || !window.AmmaStorage) return;

        let completed = window.AmmaStorage.get('amma_completed_challenges', []);
        const idx = completed.indexOf(chId);
        if (idx > -1) {
            completed.splice(idx, 1);
        } else {
            completed.push(chId);
        }
        window.AmmaStorage.set('amma_completed_challenges', completed);
        refreshChallengesUI();
    });

    // Save sub-checklist state
    document.addEventListener('change', function(e) {
        if (!e.target.classList.contains('challenge-subchk')) return;
        const cb = e.target;
        const key = 'amma_ch_sub_' + cb.getAttribute('data-ch-key');
        if (window.AmmaStorage) {
            window.AmmaStorage.set(key, cb.checked);
        }
    });

    refreshChallengesUI();
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
