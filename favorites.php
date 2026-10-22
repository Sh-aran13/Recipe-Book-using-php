<?php
// favorites.php - Saved Recipes Page (device-local via localStorage)
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/recipe-data.php';

$page_title = "My Favorite Recipes — Amma's Recipe Book";
$current_page = 'favorites';

include __DIR__ . '/includes/header.php';
?>

<!-- FAVORITES HERO -->
<div style="background: linear-gradient(135deg, #FFF8EE 0%, #FFF1EB 100%); padding: 45px 0 35px; border-bottom: 1px solid var(--border-warm);">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 8px; font-size: 13.5px; color: var(--text-muted); margin-bottom: 12px;">
            <a href="index.php" style="color: var(--primary);">Home</a>
            <span>›</span>
            <span style="font-weight: 600; color: var(--earth-brown);">Saved Favorites</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 34px; font-weight: 700; color: var(--earth-brown); margin-bottom: 8px; display: flex; align-items: center; gap: 10px;">
                    <span>❤️</span> My Favorite Recipes
                </h1>
                <p style="color: var(--text-muted); font-size: 16px; max-width: 600px;">
                    Dishes you've saved on this device for quick, everyday cooking without needing to search again.
                </p>
            </div>

            <button type="button" id="btnClearAllFavs" class="btn btn-secondary" style="font-size: 13.5px; padding: 8px 16px; display: none;">
                Clear All Favorites
            </button>
        </div>

        <!-- Offline device storage distinction note -->
        <div style="margin-top: 18px; display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.85); border: 1px solid #FDE68A; padding: 6px 14px; border-radius: var(--radius-pill); font-size: 13px; color: var(--earth-brown);">
            <span>🔒</span>
            <span>These favorites are saved locally on this phone/computer for full offline access without an account.</span>
        </div>
    </div>
</div>

<!-- FAVORITES GRID / EMPTY STATE -->
<div class="container" style="padding: 50px 20px 80px;">
    
    <!-- LOADING STATE -->
    <div id="favsLoading" style="text-align: center; padding: 60px 0; color: var(--text-muted); font-size: 16px;">
        Loading your saved recipes...
    </div>

    <!-- EMPTY STATE -->
    <div id="favsEmpty" style="display: none; background: var(--bg-surface); border: 2px dashed #FED7AA; border-radius: var(--radius-xl); padding: 60px 20px; text-align: center; max-width: 540px; margin: 40px auto; box-shadow: var(--shadow-sm);">
        <div style="font-size: 64px; margin-bottom: 16px;">❤️📖</div>
        <h2 style="font-family: var(--font-serif); font-size: 26px; color: var(--earth-brown); margin-bottom: 10px;">
            No Saved Recipes Yet
        </h2>
        <p style="color: var(--text-muted); font-size: 15px; line-height: 1.6; margin-bottom: 24px;">
            You haven't added any dishes to your favorites yet. Click the heart icon (<span style="color:#EF4444;">♡</span>) on any recipe card to save it here for fast access!
        </p>
        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="recipes.php" class="btn btn-primary" style="padding: 12px 28px;">
                Explore All Recipes
            </a>
            <a href="categories.php" class="btn btn-secondary">
                Browse Categories
            </a>
        </div>
    </div>

    <!-- POPULATED GRID -->
    <div class="recipes-grid" id="favsGrid" style="display: none;">
        <!-- Filled dynamically by JavaScript -->
    </div>

</div>

<!-- CLIENT SIDE FAVORITES SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const allRecipesData = <?= json_encode($recipes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
        const recipeMap = {};
        allRecipesData.forEach(function(r) { recipeMap[r.id] = r; });

        const loading = document.getElementById('favsLoading');
        const emptyState = document.getElementById('favsEmpty');
        const grid = document.getElementById('favsGrid');
        const clearBtn = document.getElementById('btnClearAllFavs');

        function renderFavorites() {
            const favIds = window.AmmaStorage ? window.AmmaStorage.get('amma_fav_recipes', []) : [];
            const validFavs = favIds.filter(function(id) { return !!recipeMap[id]; });

            if (loading) loading.style.display = 'none';

            if (validFavs.length === 0) {
                if (emptyState) emptyState.style.display = 'block';
                if (grid) grid.style.display = 'none';
                if (clearBtn) clearBtn.style.display = 'none';
                return;
            }

            if (emptyState) emptyState.style.display = 'none';
            if (clearBtn) clearBtn.style.display = 'inline-flex';
            if (grid) {
                grid.innerHTML = '';
                validFavs.forEach(function(id) {
                    const r = recipeMap[id];
                    const isVeg = (r.type || '').toLowerCase() === 'vegetarian';
                    const totalTime = (parseInt(r.prep_time) || 0) + (parseInt(r.cook_time) || 0);

                    const card = document.createElement('article');
                    card.className = 'recipe-card';
                    card.setAttribute('data-recipe-id', r.id);
                    card.innerHTML = `
                        <a href="recipe.php?id=${encodeURIComponent(r.id)}" class="card-image-link" aria-label="View recipe for ${r.name}">
                            <div class="card-image-wrap">
                                <div class="card-placeholder-img" style="background: ${r.accent_color || '#FFF3E0'};">
                                    <span class="recipe-icon">${r.icon || '🍲'}</span>
                                    <span class="cuisine-pill">${r.cuisine || 'Indian'}</span>
                                </div>
                                <div class="card-badges">
                                    <span class="diet-badge ${isVeg ? 'veg' : 'non-veg'}">
                                        <span class="diet-dot"></span> ${isVeg ? 'Veg' : 'Non-Veg'}
                                    </span>
                                    <span class="diff-badge diff-${(r.difficulty || 'Easy').toLowerCase()}">${r.difficulty}</span>
                                </div>
                                <button type="button" class="btn-fav-card is-fav" data-fav-id="${r.id}" aria-label="Remove from favorites" title="Remove from favorites">
                                    <svg class="heart-icon" viewBox="0 0 24 24" width="20" height="20" fill="#EF4444" stroke="currentColor" stroke-width="2">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </button>
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="card-meta-top">
                                <span class="card-cat">${r.category}</span>
                                <span class="card-time">⏱️ ${totalTime} mins</span>
                            </div>
                            <h3 class="card-title">
                                <a href="recipe.php?id=${encodeURIComponent(r.id)}">${r.name}</a>
                            </h3>
                            ${r.regional_name ? `<p class="card-regional">${r.regional_name}</p>` : ''}
                            <p class="card-desc">${r.description || ''}</p>
                            <div class="card-footer">
                                <div class="card-servings">👥 ${r.servings || 4} Servings</div>
                                <a href="recipe.php?id=${encodeURIComponent(r.id)}" class="btn-view-recipe">
                                    View Recipe →
                                </a>
                            </div>
                        </div>
                    `;
                    grid.appendChild(card);
                });
                grid.style.display = 'grid';
            }

            // Sync badges
            if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
        }

        renderFavorites();

        // Listen for favorite changes
        window.addEventListener('amma_favorites_updated', function() {
            renderFavorites();
        });

        // Clear all handler
        if (clearBtn) {
            clearBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove all saved favorite recipes from this device?')) {
                    window.AmmaStorage.set('amma_fav_recipes', []);
                    renderFavorites();
                    if (window.updateAmmaFavBadges) window.updateAmmaFavBadges();
                }
            });
        }
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
