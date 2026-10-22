    </main>

    <!-- FOOTER -->
    <footer class="site-footer" role="contentinfo" style="background-color: #292524; color: #E7E5E4; padding: 60px 0 30px; margin-top: 80px; border-top: 4px solid var(--primary);">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 40px; margin-bottom: 40px;">
                
                <!-- BRAND BIO -->
                <div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                        <div style="width: 44px; height: 44px; background: #FFFBEB; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <img src="assets/images/logo/amma-logo.svg" alt="Amma's Recipe Book" width="36" height="36">
                        </div>
                        <div style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: #FFF;">
                            Amma's <span style="color: #FB923C;">Recipe Book</span>
                        </div>
                    </div>
                    <p style="font-size: 14px; line-height: 1.7; color: #A8A29E; margin-bottom: 16px;">
                        Crafted with love for Amma. Bringing the timeless taste of home-cooked meals, sacred Andhra traditions, and authentic Indian comfort food straight to your everyday kitchen.
                    </p>
                    <div style="font-size: 13.5px; color: #FDBA74; font-weight: 600;">
                        ❤️ "Food tastes best when made with patience and love."
                    </div>
                </div>

                <!-- QUICK NAVIGATION -->
                <div>
                    <h3 style="font-family: var(--font-serif); font-size: 17px; color: #FFF; margin-bottom: 16px; border-bottom: 2px solid #C2410C; display: inline-block; padding-bottom: 4px;">
                        Explore Amma's Kitchen
                    </h3>
                    <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
                        <li><a href="index.php" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">🏠 Home Page</a></li>
                        <li><a href="recipes.php" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">📖 Browse All 42 Recipes</a></li>
                        <li><a href="categories.php" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">📂 Recipe Categories (15)</a></li>
                        <li><a href="favorites.php" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">❤️ My Saved Favorites</a></li>
                        <li><a href="recipes.php?filter=quick" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">⏱️ Quick Meals (Under 30 mins)</a></li>
                        <li><a href="recipes.php?cat=Andhra+Specialities" style="color: #D6D3D1; transition: var(--transition);" onmouseover="this.style.color='#FB923C'" onmouseout="this.style.color='#D6D3D1'">🌶️ Authentic Andhra Specialities</a></li>
                    </ul>
                </div>

                <!-- KITCHEN SAFETY & TIPS -->
                <div>
                    <h3 style="font-family: var(--font-serif); font-size: 17px; color: #FFF; margin-bottom: 16px; border-bottom: 2px solid #C2410C; display: inline-block; padding-bottom: 4px;">
                        Amma's Golden Kitchen Tips
                    </h3>
                    <div style="font-size: 13.5px; line-height: 1.6; color: #A8A29E; display: flex; flex-direction: column; gap: 10px;">
                        <p>🔒 <strong>Pressure Cooker Safety:</strong> Always inspect the rubber gasket and safety valve before lighting the burner. Never force open a hot cooker; let steam release naturally.</p>
                        <p>🍗 <strong>Poultry & Meat Hygiene:</strong> Always wash cutting boards thoroughly with hot soap water after handling raw chicken or eggs.</p>
                        <p>🌿 <strong>Tempering Aroma:</strong> Keep a lid ready to cover dal immediately after adding hot popu (tadka) to trap the rich ghee-garlic aroma.</p>
                    </div>
                </div>

            </div>

            <!-- COPYRIGHT & OFFLINE NOTE -->
            <div style="border-top: 1px solid #44403C; padding-top: 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; font-size: 13px; color: #78716C;">
                <div>
                    © <?= date('Y') ?> Amma's Recipe Book. Dedicated with love to home cooks everywhere.
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="display: inline-flex; align-items: center; gap: 6px; background: #3B3836; padding: 4px 10px; border-radius: var(--radius-pill); color: #86EFAC;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #22C55E;"></span>
                        100% Offline Compatible Local PHP App
                    </span>
                    <a href="#mainContent" style="color: #D6D3D1;" title="Back to top">↑ Back to Top</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- SHARED GLOBAL CLIENT-SIDE JAVASCRIPT FOR FAVORITES, RECENTS & UI -->
    <script>
        (function() {
            'use strict';

            // Safe localStorage helper
            const storage = {
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
                    } catch (e) {
                        // gracefully handle quota / disabled localStorage
                    }
                }
            };

            // Mobile menu toggle
            const menuBtn = document.getElementById('mobileMenuToggle');
            const drawer = document.getElementById('mobileDrawer');
            if (menuBtn && drawer) {
                menuBtn.addEventListener('click', function() {
                    const isOpen = drawer.classList.toggle('open');
                    menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                });
            }

            // Sync favorites count & card buttons
            function updateFavBadges() {
                const favs = storage.get('amma_fav_recipes', []);
                const count = favs.length;
                
                const headerBadge = document.getElementById('headerFavBadge');
                const mobileBadge = document.getElementById('mobileFavBadge');

                if (headerBadge) {
                    if (count > 0) {
                        headerBadge.textContent = count;
                        headerBadge.style.display = 'inline-block';
                    } else {
                        headerBadge.style.display = 'none';
                    }
                }
                if (mobileBadge) {
                    if (count > 0) {
                        mobileBadge.textContent = count;
                        mobileBadge.style.display = 'inline-block';
                    } else {
                        mobileBadge.style.display = 'none';
                    }
                }

                // Update any favorite buttons on the page
                document.querySelectorAll('[data-fav-id]').forEach(function(btn) {
                    const id = btn.getAttribute('data-fav-id');
                    if (favs.includes(id)) {
                        btn.classList.add('is-fav');
                        btn.setAttribute('aria-label', 'Remove from favorites');
                        btn.setAttribute('title', 'Remove from favorites');
                    } else {
                        btn.classList.remove('is-fav');
                        btn.setAttribute('aria-label', 'Save to favorites');
                        btn.setAttribute('title', 'Save to favorites');
                    }
                });
            }

            // Attach global toggle handler for card favorite buttons
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('[data-fav-id]');
                if (!btn) return;
                
                e.preventDefault();
                e.stopPropagation();

                const id = btn.getAttribute('data-fav-id');
                if (!id) return;

                let favs = storage.get('amma_fav_recipes', []);
                const idx = favs.indexOf(id);

                if (idx > -1) {
                    favs.splice(idx, 1);
                } else {
                    favs.push(id);
                }

                storage.set('amma_fav_recipes', favs);
                updateFavBadges();

                // Trigger custom event if favorites page is active
                window.dispatchEvent(new CustomEvent('amma_favorites_updated', { detail: { favorites: favs } }));
            });

            // Initialize on DOM ready
            updateFavBadges();

            // Expose helper globally
            window.AmmaStorage = storage;
            window.updateAmmaFavBadges = updateFavBadges;
        })();
    </script>
</body>
</html>
