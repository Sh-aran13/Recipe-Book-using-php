<?php
// includes/recipe-data.php - Comprehensive recipe library (Part 1: Breakfast, Andhra, Rice, Dal)

$recipes_part1 = [
    // 1. Idli
    [
        'id' => 'soft-idli',
        'name' => 'Soft Mallige Idli',
        'regional_name' => 'మల్లెపూవు ఇడ్లీ (Mallepoovu Idli)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 12,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Steamed, pillowy-soft and fluffy rice and lentil cakes. A wholesome and gut-friendly breakfast classic.',
        'icon' => '⚪',
        'accent_color' => '#FFF8E1',
        'image' => 'assets/images/recipes/Soft Mallige Idli.jpg',
        'ingredients' => [      
            ['name' => 'Idli Rava or Parboiled Rice', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Rinse well and drain'],
            ['name' => 'Whole Urad Dal (Minapappu)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Skinless white whole lentils'],
            ['name' => 'Poha (Flattened rice)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Gives extra softness'],
            ['name' => 'Fenugreek seeds (Methi)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Aids natural fermentation'],
            ['name' => 'Salt (non-iodized rock salt preferred)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Adjust to taste'],
            ['name' => 'Water', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'For soaking and grinding'],
            ['name' => 'Oil or Ghee', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For greasing idli plates']
        ],
        'steps' => [
            'Soak urad dal with fenugreek seeds in plenty of water for 4 to 5 hours in a medium bowl.',
            'In a separate bowl, soak idli rava (or idli rice) for 4 hours. If using poha, rinse and soak with the urad dal 30 minutes before grinding.',
            'Grind urad dal in a wet grinder or blender with chilled water in small batches until it becomes silky smooth, light, and airy (like whipped cream).',
            'Squeeze excess water out of the soaked idli rava with your hands, and combine it thoroughly into the whipped urad batter.',
            'Mix the batter thoroughly with clean hands for 2 minutes—the warmth from your hands initiates natural fermentation.',
            'Cover the bowl with a loose lid and let it ferment in a warm, draft-free spot for 8 to 12 hours until the batter rises and turns bubbly and fragrant.',
            'After fermentation, gently fold in salt. Do not beat or over-mix the batter, as you want to preserve the airy bubbles.',
            'Add 1 to 2 cups of water to the idli steamer or cooker and bring it to a rolling boil over medium-high heat.',
            'Grease the idli plates lightly with oil or ghee, and pour a ladleful of batter into each cavity (filling about 3/4 full).',
            'Place the stand in the steamer, cover with the lid (without cooker weight/whistle), and steam on medium-high flame for 10 to 12 minutes.',
            'Turn off the flame and let it rest for 3 minutes. Wet a spoon with water and gently scoop out the hot, fluffy idlis.',
            'Serve piping hot with fresh coconut chutney, spicy tomato chutney, and warm drumstick sambar.'
        ],
        'tips' => [
            'Always use cold or ice-cold water while grinding urad dal to prevent the mixer motor from heating up the batter.',
            'Do not over-mix after fermentation; gentle folding keeps the idlis light and airy.',
            'If you live in a cold climate, place the batter inside an oven with just the oven light turned on for warmth.'
        ],
        'substitutions' => [
            'Idli rava can be replaced with 2 cups of idli rice or parboiled rice, ground slightly coarse.',
            'Poha can be replaced with 2 tablespoons of cooked white rice during grinding.'
        ],
        'storage' => 'Unfermented batter can be refrigerated for up to 2 days before fermenting. Fermented batter keeps well in an airtight box in the fridge for up to 4 days.'
    ],

    // 2. Plain Dosa
    [
        'id' => 'crispy-plain-dosa',
        'name' => 'Crispy Plain Dosa',
        'regional_name' => 'సాదా దోశ (Sada Dosa)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Golden-brown, crisp and paper-thin fermented crepes cooked on a flat tawa with a drizzle of pure ghee.',
        'icon' => '🥞',
        'accent_color' => '#FFF3E0',
        'image' => 'assets/images/recipes/Crispy Plain Dosa.jpg',
        'ingredients' => [
            ['name' => 'Raw Rice (Sona Masoori)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Rinsed clean'],
            ['name' => 'Idli / Parboiled Rice', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Adds crispness and body'],
            ['name' => 'Whole Urad Dal', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'High quality whole lentils'],
            ['name' => 'Chana Dal (Bengal gram)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Gives rich golden color'],
            ['name' => 'Fenugreek seeds (Methi)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Helps fermentation and aroma'],
            ['name' => 'Poha (Flattened rice)', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Rinsed before grinding'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Ghee or Sesame Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For roasting crispy dosas']
        ],
        'steps' => [
            'Rinse the rice varieties together in one bowl. In another bowl, rinse urad dal, chana dal, and fenugreek seeds.',
            'Soak both bowls in ample clean water for 5 to 6 hours. Soak poha 30 minutes before grinding.',
            'Grind the dal mixture first with cold water into a very smooth, frothy paste. Transfer to a large vessel.',
            'Grind the rice and poha with just enough water into a smooth batter with a microscopic grain texture.',
            'Combine both batters together, mix vigorously with clean hands for 3 minutes to incorporate air, and cover loosely.',
            'Allow the batter to ferment in a warm room for 8 to 10 hours until doubled in volume and pleasantly sour.',
            'Add salt and a little water if needed to bring it to a pourable, smooth ribbon consistency (like pancake batter).',
            'Heat a heavy cast-iron tawa or non-stick griddle over medium-high heat. Sprinkle a few drops of water—they should sizzle and evaporate instantly.',
            'Wipe the tawa with half a cut onion dipped lightly in oil to season the surface naturally.',
            'Pour a large ladleful of batter in the center and quickly spread it outward in concentric spiral circles with the back of the ladle.',
            'Drizzle half a teaspoon of ghee or oil along the edges and in the center. Cook on medium flame without flipping until the edges lift and the underside turns golden crisp.',
            'Roll into a neat cylinder and serve immediately while hot with ginger chutney and allam pachadi.'
        ],
        'tips' => [
            'Rubbing the tawa with a cut onion prevents the dosa from sticking and imparts an authentic restaurant aroma.',
            'Ensure the tawa is hot when pouring the batter, then reduce to medium flame so it cooks evenly without burning.'
        ],
        'substitutions' => [
            'Sesame oil (til oil) can be used instead of ghee for an authentic Tamil-style flavor.'
        ],
        'storage' => 'Fermented dosa batter stays fresh in the refrigerator for up to 5 days. Do not freeze.'
    ],

    // 3. Masala Dosa
    [
        'id' => 'masala-dosa',
        'name' => 'Hotel Style Masala Dosa',
        'regional_name' => 'మసాలా దోశ (Masala Dosa)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Crispy golden dosa smeared with red garlic-chilli chutney and stuffed with a fragrant spiced potato filling.',
        'icon' => '🌯',
        'accent_color' => '#FFE082',
        'image' => 'assets/images/recipes/Hotel Style Masala Dosa.jpg',
        'ingredients' => [
            ['name' => 'Fermented Dosa Batter', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Well-fermented'],
            ['name' => 'Potatoes (Aloo)', 'quantity' => 4, 'unit' => 'medium', 'notes' => 'Boiled, peeled, and gently mashed'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Thinly sliced lengthwise'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Ginger', 'quantity' => 1, 'unit' => 'inch piece', 'notes' => 'Finely minced'],
            ['name' => 'Mustard seeds', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For tempering'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh sprig'],
            ['name' => 'Turmeric powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'For color and warmth'],
            ['name' => 'Lemon juice', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly squeezed'],
            ['name' => 'Fresh Coriander', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Chopped'],
            ['name' => 'Cooking Oil & Butter/Ghee', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For roasting and bhaji']
        ],
        'steps' => [
            'Boil the potatoes in a pressure cooker with water for 3 whistles until completely tender. Peel and roughly mash by hand into small chunks.',
            'Heat 1.5 tablespoons oil in a pan over medium heat. Splutter mustard seeds, then add chopped green chillies, minced ginger, and curry leaves.',
            'Add sliced onions and sauté for 3 to 4 minutes until translucent and soft (do not brown the onions).',
            'Stir in turmeric powder and salt, followed by 3 tablespoons of water. Bring to a gentle simmer.',
            'Add the mashed potatoes and mix well so the yellow turmeric coats the mixture evenly. Simmer on low for 3 minutes.',
            'Turn off the heat, stir in fresh lemon juice and chopped coriander. The potato masala should be moist and spreadable, not dry.',
            'Heat your flat tawa over medium-high heat and smear lightly with oil using an onion slice.',
            'Pour a ladle of dosa batter and spread thinly in spirals. Drizzle ghee or butter generously around the edges.',
            'Cook on medium heat until the base turns deep golden and super crisp.',
            'Place 2 to 3 heaped tablespoons of the warm potato masala in the center.',
            'Fold both sides of the dosa over the filling to form a wrap, or roll it into a neat cylinder.',
            'Serve immediately with chilled coconut chutney and piping hot sambar.'
        ],
        'tips' => [
            'Keep the potato masala moist by adding 2 tablespoons of water while simmering; dry filling makes the dosa brittle.',
            'Smearing a teaspoon of butter on the dosa surface right before adding the potato masala gives hotel-style aroma.'
        ],
        'substitutions' => [
            'Boiled green peas can be added to the potato masala for extra texture and nutrition.'
        ],
        'storage' => 'Potato bhaji stays good in the fridge for 24 hours. Reheat on low flame with a splash of water before using.'
    ],

    // 4. Upma
    [
        'id' => 'rava-upma',
        'name' => 'Homestyle Rava Upma',
        'regional_name' => 'రవ్వ ఉప్మా (Rava Upma)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 3,
        'difficulty' => 'Easy',
        'description' => 'Savory roasted semolina porridge tempered with crunchy cashews, mustard seeds, curry leaves, and ginger.',
        'icon' => '🥣',
        'accent_color' => '#FFF9C4',
        'image' => 'assets/images/recipes/Homestyle Rava Upma.jpg',
        'ingredients' => [
            ['name' => 'Bombay Rava (Semolina/Suji)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Medium grain semolina'],
            ['name' => 'Water', 'quantity' => 2.5, 'unit' => 'cups', 'notes' => 'For soft texture (use 3 cups for extra soft)'],
            ['name' => 'Ghee or Peanut Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Ghee gives classic aroma'],
            ['name' => 'Mustard seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Tempering'],
            ['name' => 'Chana Dal & Urad Dal', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Adds wonderful crunch'],
            ['name' => 'Cashew nuts', 'quantity' => 10, 'unit' => 'whole', 'notes' => 'Split in half'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Ginger', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Finely minced'],
            ['name' => 'Curry leaves', 'quantity' => 8, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Coriander leaves', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Finely chopped']
        ],
        'steps' => [
            'Heat a heavy pan or kadai on low flame. Dry roast the semolina (rava) for 4 to 5 minutes, stirring continuously, until aromatic and warm to the touch. Do not brown it. Transfer to a plate.',
            'In the same kadai, heat 2 tablespoons of oil or ghee over medium flame.',
            'Add cashews and fry until light golden; remove a few for garnish if desired.',
            'Add mustard seeds and let them splutter. Then add chana dal and urad dal, sautéing until golden and aromatic.',
            'Add minced ginger, slit green chillies, curry leaves, and chopped onions. Sauté for 3 minutes until onions turn soft and transparent.',
            'Pour 2.5 cups of water into the pan and add 1 teaspoon of salt. Stir well and bring the water to a rolling boil.',
            'Reduce heat to low. While stirring the boiling water continuously with one hand using a whisk or spatula, slowly pour in the roasted rava in a steady thin stream with your other hand. This prevents any lump formation.',
            'Keep stirring vigorously for 1 minute until the rava absorbs the water evenly.',
            'Cover the pan with a tight lid, keep the flame at the absolute minimum, and let it cook in steam for 3 to 4 minutes.',
            'Open the lid, drizzle a spoonful of melted ghee on top, and gently fluff with a fork.',
            'Garnish with fresh coriander and roasted cashews.',
            'Serve hot with peanut chutney, tomato chutney, or sugar and lemon wedge.'
        ],
        'tips' => [
            'Roasting the rava properly is the key secret to non-sticky, separate-grained upma.',
            'Always pour the rava in a thin trickle while stirring vigorously to avoid forming dry lumps.'
        ],
        'substitutions' => [
            'Add diced carrots, green peas, and beans during onion sautéing for a wholesome vegetable upma.'
        ],
        'storage' => 'Best enjoyed fresh and hot. Leftovers can be refrigerated for 1 day; sprinkle with water and microwave or steam to reheat.'
    ],

    // 5. Pongal
    [
        'id' => 'ven-pongal',
        'name' => 'Comforting Ven Pongal',
        'regional_name' => 'కట్టె పొంగలి (Katte Pongali)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Creamy, melt-in-the-mouth rice and yellow moong dal porridge laced with ghee, crushed black pepper, cumin, and fried cashews.',
        'icon' => '🍲',
        'accent_color' => '#FFFDE7',
        'image' => 'assets/images/recipes/Comforting Ven Pongal.jpg',
        'ingredients' => [
            ['name' => 'Raw Rice (Sona Masoori)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed clean'],
            ['name' => 'Yellow Moong Dal (Pesara Pappu)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Lightly dry-roasted'],
            ['name' => 'Water', 'quantity' => 4.5, 'unit' => 'cups', 'notes' => 'For creamy, soft texture'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Essential for temple-style flavor'],
            ['name' => 'Whole Black Peppercorns', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Lightly crushed'],
            ['name' => 'Cumin seeds (Jeera)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Ginger', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Finely grated or julienned'],
            ['name' => 'Cashews', 'quantity' => 12, 'unit' => 'pieces', 'notes' => 'Split'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Aromatic gum'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Dry roast the moong dal in a small pan on medium-low flame for 3 minutes until warm and fragrant, without browning.',
            'Rinse the roasted dal together with the rice in a bowl until water runs clear.',
            'Transfer the rinsed rice and dal to a pressure cooker. Add 4.5 cups of water and 1.25 teaspoons of salt.',
            'Close the cooker lid with the whistle weight on. Cook on high flame for 4 whistles, then lower to medium flame for 2 whistles. Turn off heat and allow the pressure to release naturally.',
            'Open the cooker and gently mash the hot rice and dal mixture with the back of a ladle to achieve a creamy consistency.',
            'For the authentic temple tempering: Heat 3 tablespoons of pure ghee in a small pan over medium flame.',
            'Add the cashews and fry until they turn golden blonde. Add the whole cumin seeds, crushed black peppercorns, grated ginger, curry leaves, and asafoetida.',
            'Let the spices sizzle and release their aroma for 30 seconds, taking care not to burn the peppercorns.',
            'Immediately pour the aromatic sizzling ghee tempering into the mashed pongal.',
            'Stir well until the ghee is completely absorbed and the pongal turns glossy.',
            'Serve piping hot with authentic coconut chutney and hot rasam or sambar.'
        ],
        'tips' => [
            'Lightly crushing the black pepper releases its essential oils without making the dish uncomfortably biting.',
            'Pongal thickens as it cools; if serving later, stir in half a cup of hot boiling water with a dollop of ghee.'
        ],
        'substitutions' => [
            'Millets (foxtail or kodo millet) can replace raw rice 1:1 for a diabetic-friendly high-fiber option.'
        ],
        'storage' => 'Best served fresh. Leftovers can be refrigerated for 24 hours. Reheat by steaming or adding a little hot water.'
    ],

    // 6. Pesarattu
    [
        'id' => 'andhra-pesarattu',
        'name' => 'Andhra MLA Pesarattu',
        'regional_name' => 'పెసరట్టు (Pesarattu)',
        'category' => 'Andhra Specialities',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Nutritious whole green gram (moong) crepes spiced with ginger and green chillies, topped with finely chopped onions and served with upma.',
        'icon' => '🥞',
        'accent_color' => '#E8F5E9',
        'image' => 'assets/images/recipes/Andhra MLA Pesarattu.jpg',
        'ingredients' => [
            ['name' => 'Whole Green Gram (Pachhi Pesalu)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Soaked overnight (6-8 hours)'],
            ['name' => 'Raw Rice', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Soaked with pesalu (gives crispness)'],
            ['name' => 'Fresh Ginger', 'quantity' => 1.5, 'unit' => 'inch piece', 'notes' => 'Roughly chopped'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Spicy variety'],
            ['name' => 'Cumin seeds (Jeera)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'large', 'notes' => 'Finely chopped for topping'],
            ['name' => 'Oil or Ghee', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For roasting on tawa']
        ],
        'steps' => [
            'Wash whole green gram (pesalu) and rice thoroughly, and soak in sufficient water for 6 to 8 hours or overnight.',
            'Drain the soaked gram and transfer to a blender along with ginger, green chillies, cumin seeds, and salt.',
            'Grind with small amounts of water into a smooth, thick, spreadable batter. Unlike dosa batter, pesarattu does NOT require fermentation—it is ready to cook immediately.',
            'Finely chop the onion and keep it ready in a small bowl with a pinch of cumin and chopped coriander if desired.',
            'Heat a heavy iron tawa over medium-high heat. Drizzle a few drops of oil and wipe clean with a cloth or onion half.',
            'Pour a ladle of pesarattu batter in the center and spread it into a neat circle using outward spiral motions.',
            'Immediately scatter 2 tablespoons of finely chopped onions evenly over the wet batter, and press them down gently with a flat spatula so they stick.',
            'Drizzle a teaspoon of oil or ghee around the edges and over the onions.',
            'Cook on medium heat until the base turns golden and crisp (about 2 to 3 minutes).',
            'Flip gently and cook on the onion side for 30 seconds until the onions soften and lightly caramelize. Flip back to the crisp side.',
            'For authentic "MLA Pesarattu", place 2 tablespoons of hot rava upma inside and fold in half.',
            'Serve immediately with traditional spicy Allam Pachadi (Ginger Chutney).'
        ],
        'tips' => [
            'Adding 2 tablespoons of raw rice while soaking adds pleasant crispness to the otherwise soft moong crepes.',
            'Do not ferment this batter; cook immediately after grinding for the sweetest and freshest green gram aroma.'
        ],
        'substitutions' => [
            'Split yellow moong dal can be used if whole green gram is unavailable (soak for just 2 hours).'
        ],
        'storage' => 'Batter stays fresh in the refrigerator for 2 days. Stir well before making dosas.'
    ],

    // 7. Medu Vada
    [
        'id' => 'crispy-medu-vada',
        'name' => 'Crispy Medu Vada',
        'regional_name' => 'గారెలు / మేదు వడ (Garelu / Medu Vada)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Crispy on the outside, fluffy and airy on the inside, golden donut-shaped lentil fritters flavored with black pepper and curry leaves.',
        'icon' => '🍩',
        'accent_color' => '#FFF8E1',
        'image' => 'assets/images/recipes/Crispy Medu Vada.jpg',
        'ingredients' => [
            ['name' => 'Whole Urad Dal (Gundu Minapappu)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Soaked 3-4 hours only'],
            ['name' => 'Whole Black Peppercorns', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Lightly crushed'],
            ['name' => 'Cumin seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'inch', 'notes' => 'Finely minced'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Finely shredded'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'For digestion'],
            ['name' => 'Rice Flour', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For extra external crunch'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Oil for deep frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Peanut or sunflower oil']
        ],
        'steps' => [
            'Soak urad dal in water for strictly 3 to 4 hours. Do not over-soak, or the vadas will absorb excess oil.',
            'Drain water thoroughly using a colander. Transfer dal to a wet grinder or heavy-duty food processor.',
            'Grind with barely 2 to 3 tablespoons of ice-cold water, sprinkled a teaspoon at a time. The batter must be thick, fluffy, and firm.',
            'Test the batter: Drop a small ball of batter into a bowl of clean water. It must float on top like a cloud without dissolving.',
            'Transfer batter to a wide bowl. Whisk vigorously in one circular direction with your hand for 2 minutes to trap maximum air.',
            'Fold in crushed peppercorns, cumin seeds, ginger, green chillies, curry leaves, hing, rice flour, and salt.',
            'Heat oil in a deep kadai over medium heat (around 175°C / 350°F).',
            'Wet both hands thoroughly with cold water. Take a small lemon-sized ball of batter onto your wet fingers.',
            'Flatten gently into a patty and press your wet thumb into the center to form a distinct donut hole.',
            'Gently slide the shaped vada into the medium-hot oil by tilting your hand close to the oil surface.',
            'Fry 3 to 4 vadas at a time on medium flame, flipping occasionally with a slotted spoon, until evenly deep golden and crisp (about 4 to 5 minutes).',
            'Drain on paper towels and serve piping hot with spicy sambar and wet coconut chutney.'
        ],
        'tips' => [
            'Grinding with minimal ice-cold water is the number one secret to non-oily, crispy vadas.',
            'Always maintain oil at medium heat. If oil is too hot, the outside browns while the center remains raw dough.'
        ],
        'substitutions' => [
            'Finely chopped fresh coconut pieces (kopra pieces) can be added to the batter for traditional crunch.'
        ],
        'storage' => 'Best served fresh. Leftover vadas can be soaked in warm rasam to make delicious Rasam Vada.'
    ],

    // 8. Tomato Rice
    [
        'id' => 'tomato-rice',
        'name' => 'Tangy Tomato Rice (Thakkali Sadam)',
        'regional_name' => 'టమాటా రైస్ (Tomato Rice)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Fragrant, spiced rice tossed with ripe juicy tomatoes, caramelized onions, warm spices, and fresh mint.',
        'icon' => '🍅',
        'accent_color' => '#FFEBEE',
        'image' => 'assets/images/recipes/Tangy Tomato Rice(Thakkali Sadam).jpg',
        'ingredients' => [
            ['name' => 'Cooked Rice (Sona Masoori or Basmati)', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Cooled, grains separated'],
            ['name' => 'Ripe Red Tomatoes', 'quantity' => 4, 'unit' => 'large', 'notes' => 'Finely chopped or puréed'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'large', 'notes' => 'Thinly sliced'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Mustard seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'For tempering'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Bay leaf & Cinnamon stick', 'quantity' => 1, 'unit' => 'each', 'notes' => 'Whole spices'],
            ['name' => 'Turmeric & Kashmiri Red Chilli Powder', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'For rich red color'],
            ['name' => 'Garam Masala powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Warm spice finish'],
            ['name' => 'Fresh Mint & Coriander leaves', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Chopped'],
            ['name' => 'Cooking Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Peanut or sesame oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Cook rice ahead of time and spread it on a wide plate to cool completely. Warm, steaming rice will turn mushy when mixed.',
            'Heat 2 tablespoons oil in a wide pan or kadai over medium heat.',
            'Add the mustard seeds, bay leaf, and cinnamon stick. Let the mustard crackle and spices bloom.',
            'Add sliced onions, green chillies, and curry leaves. Sauté until the onions turn golden brown at the edges.',
            'Add ginger-garlic paste and sauté for 1 minute until the raw garlic aroma disappears.',
            'Add the chopped tomatoes, turmeric, red chilli powder, and salt. Stir well to combine.',
            'Cook the tomatoes on medium heat, stirring occasionally and mashing with your spoon, until they turn pulpy and oil begins to separate from the masala (about 6 to 8 minutes).',
            'Stir in garam masala and chopped mint leaves. Cook for 1 more minute.',
            'Turn flame to low. Add the cooled rice in 2 batches, gently tossing with the tomato masala using a wide flat spoon until every grain is coated in vibrant red.',
            'Cover with a lid and let it warm together on low flame for 2 minutes so flavors meld.',
            'Garnish with fresh coriander and serve hot with cooling cucumber-onion raita and crispy appadams.'
        ],
        'tips' => [
            'Use ripe, juicy red country (desi) tomatoes for the best natural sourness and deep color.',
            'Always cool the cooked rice completely before adding to the tomato masala to keep every grain intact.'
        ],
        'substitutions' => [
            'Add fried cashew nuts or boiled green peas during tempering for a party-style presentation.'
        ],
        'storage' => 'Tomato rice packs wonderfully into lunchboxes. Keeps well at room temperature for 10 hours or refrigerated for 2 days.'
    ],

    // 9. Lemon Rice
    [
        'id' => 'andhra-lemon-rice',
        'name' => 'Classic Andhra Lemon Rice (Chitrannam)',
        'regional_name' => 'నిమ్మకాయ పులిహోర / చిత్రాన్నం (Chitrannam)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 10,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Bright yellow, tangy tempered rice bursting with fresh lemon juice, crunchy roasted peanuts, mustard seeds, and ginger.',
        'icon' => '🍋',
        'accent_color' => '#FFFDE7',
        'image' => 'assets/images/recipes/Classic Andhra Lemon Rice (Chitrannam).jpg',
        'ingredients' => [
            ['name' => 'Cooked Rice (Sona Masoori)', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Cooled, separate grains'],
            ['name' => 'Fresh Lemon Juice', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'From 2 juicy lemons'],
            ['name' => 'Raw Peanuts (Groundnuts)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Adds signature crunch'],
            ['name' => 'Chana Dal & Urad Dal', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Tempering lentils'],
            ['name' => 'Mustard seeds', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Crackled'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'inch', 'notes' => 'Finely julienned or minced'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Dry Red Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Broken in half'],
            ['name' => 'Turmeric powder (Pasupu)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Gives brilliant sunny color'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Aromatic fragrance'],
            ['name' => 'Peanut or Sesame Oil', 'quantity' => 2.5, 'unit' => 'tablespoons', 'notes' => 'Traditional oils'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Spread the cooked rice onto a wide tray or plate. Drizzle 1 teaspoon of raw sesame oil and half of the turmeric powder over the rice while warm, then let it cool.',
            'Heat 2 tablespoons oil in a pan or kadai over medium flame.',
            'Add peanuts first and fry for 2 minutes until they become crunchy and turn light golden.',
            'Add mustard seeds, chana dal, and urad dal. Sauté on medium-low flame until the dals turn reddish-golden and mustard crackles completely.',
            'Add dry red chillies, slit green chillies, minced ginger, and fresh curry leaves. Fry for 30 seconds until curry leaves crisp up.',
            'Add remaining turmeric powder and asafoetida (hing). Turn off the heat immediately to avoid scorching the turmeric.',
            'Pour the hot tempering over the cooled rice along with salt.',
            'Let the mixture cool down for 2 minutes, then pour the fresh lemon juice over the rice. (Never add lemon juice to a boiling hot pan, or it will turn bitter).',
            'Gently toss and mix the rice with clean hands or a flat spoon until the golden color is uniformly distributed.',
            'Taste and adjust salt or lemon juice as desired.',
            'Let it rest for 20 minutes before serving so the grains fully absorb the lemon and ginger aromas.',
            'Serve with potato fry, crisps, or mango pickle.'
        ],
        'tips' => [
            'Never heat lemon juice on the stove; adding it off-heat preserves the fresh citrus flavor and prevents bitterness.',
            'Mixing chitrannam with your hands coats each grain far more evenly than a spoon.'
        ],
        'substitutions' => [
            'Raw mango (grated) can replace lemon juice during summer for authentic Mamidikaya Pulihora.'
        ],
        'storage' => 'Lemon rice stays fresh at room temperature for up to 16 hours. Excellent for journeys, picnics, and festive offerings.'
    ],

    // 10. Curd Rice
    [
        'id' => 'tempered-curd-rice',
        'name' => 'Tempered Curd Rice (Daddojanam)',
        'regional_name' => 'పెరుగన్నం / దద్దోజనం (Daddojanam)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 5,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Cooling and soothing mashed rice blended with fresh yogurt and milk, tempered with mustard, ginger, curry leaves, and pomegranate seeds.',
        'icon' => '🍚',
        'accent_color' => '#F1F8E9',
        'image' => 'assets/images/recipes/Tempered Curd Rice(Daddojanam).jpg',
        'ingredients' => [
            ['name' => 'Cooked White Rice', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Cooked slightly soft and warm'],
            ['name' => 'Fresh Yogurt (Curd)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Thick and not sour'],
            ['name' => 'Whole Milk', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Prevents rice from souring too quickly'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Finely grated'],
            ['name' => 'Green Chillies', 'quantity' => 1, 'unit' => '', 'notes' => 'De-seeded and finely minced'],
            ['name' => 'Mustard seeds', 'quantity' => 0.75, 'unit' => 'teaspoon', 'notes' => 'For tadka'],
            ['name' => 'Urad dal', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Crunch'],
            ['name' => 'Curry leaves', 'quantity' => 8, 'unit' => 'leaves', 'notes' => 'Finely torn'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'For digestion'],
            ['name' => 'Ghee or Cooking Oil', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For tempering'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Pomegranate pearls & grapes', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Optional festive garnish']
        ],
        'steps' => [
            'While the cooked rice is still warm, mash it well with a potato masher or the back of a ladle in a large bowl. Mashing warm makes it creamy.',
            'Allow the mashed rice to cool down to lukewarm room temperature.',
            'Stir in milk first, followed by the fresh yogurt and 1 teaspoon of salt. Mix thoroughly into a creamy porridge-like consistency.',
            'Heat 1 tablespoon ghee or oil in a small tempering tadka pan over medium heat.',
            'Add mustard seeds and urad dal. Let the mustard crackle and the dal turn pale golden.',
            'Add the minced green chillies, grated ginger, curry leaves, and a pinch of asafoetida. Sauté for 20 seconds until fragrant.',
            'Pour this hot aromatic tempering directly over the creamy curd rice.',
            'Fold in the tempering gently along with fresh coriander.',
            'Top with jewel-like red pomegranate arils and sliced grapes for temple-style prasadam presentation.',
            'Serve chilled or at room temperature alongside spicy mango pickle or fried papad.'
        ],
        'tips' => [
            'Adding milk along with curd ensures the curd rice stays fresh and sweet without turning sour if packed for lunch.',
            'Always mash the rice when it is warm; once rice cools down, it cannot be mashed smoothly.'
        ],
        'substitutions' => [
            'Add grated raw carrot or cucumber for extra crunch and freshness.'
        ],
        'storage' => 'Keeps well in the refrigerator for 24 hours. If it thickens, stir in 2-3 tablespoons of cold milk before serving.'
    ],

    // 11. Vegetable Pulao
    [
        'id' => 'vegetable-pulao',
        'name' => 'Fragrant Vegetable Pulao',
        'regional_name' => 'వెజిటబుల్ పలావ్ (Veg Pulao)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Long-grain basmati rice gently simmered with whole spices, tender garden vegetables, and aromatic mint leaves.',
        'icon' => '🥘',
        'accent_color' => '#F9FBE7',
        'image' => 'assets/images/recipes/Fragrant Vegetable Pulao.jpg',
        'ingredients' => [
            ['name' => 'Basmati Rice', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Rinsed and soaked for 20 minutes'],
            ['name' => 'Mixed Vegetables (Carrot, Beans, Peas, Potato)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Diced evenly'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'large', 'notes' => 'Thinly sliced'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly made'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Shahi Jeera (Caraway seeds)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Fragrant cumin'],
            ['name' => 'Whole Spices (Bay leaf, 3 Cloves, 2 Cardamoms, 1 Cinnamon)', 'quantity' => 1, 'unit' => 'set', 'notes' => 'Whole aromatics'],
            ['name' => 'Fresh Mint & Coriander leaves', 'quantity' => 0.25, 'unit' => 'cup each', 'notes' => 'Chopped'],
            ['name' => 'Ghee & Oil mixture', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For sautéing'],
            ['name' => 'Water', 'quantity' => 3, 'unit' => 'cups', 'notes' => '2:1 ratio for cooker'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Rinse basmati rice gently until water runs clear, and soak in water for 20 minutes. Drain thoroughly.',
            'Heat ghee and oil together in a pressure cooker or heavy-bottomed pot over medium heat.',
            'Add whole spices: shahi jeera, bay leaf, cloves, green cardamoms, and cinnamon stick. Sauté for 30 seconds until fragrant.',
            'Add sliced onions and green chillies. Sauté until onions are translucent and light golden (about 4 minutes).',
            'Add ginger-garlic paste and sauté for 1 minute until the raw smell dissipates.',
            'Add the chopped mixed vegetables (carrots, beans, potatoes, green peas) and chopped mint leaves. Sauté on medium flame for 2 to 3 minutes.',
            'Add the drained basmati rice and gently sauté for 1 minute so the grains are coated with the warm ghee and spices. Be gentle so rice grains do not break.',
            'Pour in 3 cups of water and add 1.25 teaspoons of salt. Stir gently and bring the water to a rolling boil.',
            'Taste the water—it should taste pleasantly salty (like sea water) for perfectly seasoned rice.',
            'Close the pressure cooker lid with weight. Cook on medium-high flame for 2 whistles (or in an open pot, simmer covered for 12 minutes on low).',
            'Allow the pressure to drop naturally. Open the lid, let the steam escape for 2 minutes, then fluff gently with a fork.',
            'Serve steaming hot with creamy onion-tomato raita or vegetable kurma.'
        ],
        'tips' => [
            'Soaking basmati rice for 20 minutes elongates the grains and prevents them from curling or breaking.',
            'Always fluff cooked pulao with a wide fork from the edges toward the center to avoid breaking tender grains.'
        ],
        'substitutions' => [
            'Add 1/2 cup of paneer cubes lightly pan-fried in ghee for a protein-rich Paneer Pulao.'
        ],
        'storage' => 'Cooled pulao keeps well in the fridge for up to 2 days. Reheat with 1 tablespoon of sprinkled water in a covered pan.'
    ],

    // 12. Chicken Biryani
    [
        'id' => 'andhra-chicken-biryani',
        'name' => 'Andhra Style Chicken Dum Biryani',
        'regional_name' => 'ఆంధ్రా చికెన్ దమ్ బిర్యానీ (Chicken Biryani)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'Andhra',
        'type' => 'Non-Vegetarian',
        'prep_time' => 30,
        'cook_time' => 40,
        'servings' => 5,
        'difficulty' => 'Medium',
        'description' => 'Royal layered biryani featuring succulent marinated chicken, saffron-infused long grain basmati rice, caramelized onions, and fiery Andhra spices.',
        'icon' => '🍗',
        'accent_color' => '#FFEBEE',
        'image' => 'assets/images/recipes/Andhra Style Chicken Dum Biryani.jpg',
        'ingredients' => [
            ['name' => 'Bone-in Chicken pieces', 'quantity' => 750, 'unit' => 'grams', 'notes' => 'Cleaned, curry-cut with slits on meat'],
            ['name' => 'Basmati Rice', 'quantity' => 2.5, 'unit' => 'cups', 'notes' => 'Aged long grain, soaked 30 mins'],
            ['name' => 'Thick Yogurt (Curd)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Whisked smooth'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Freshly pounded'],
            ['name' => 'Spicy Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Andhra style'],
            ['name' => 'Turmeric & Coriander powder', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Marinade spices'],
            ['name' => 'Garam Masala / Biryani Masala', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Freshly ground preferred'],
            ['name' => 'Fried Onions (Birista)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Deep golden and crispy'],
            ['name' => 'Fresh Mint & Coriander leaves', 'quantity' => 0.5, 'unit' => 'cup each', 'notes' => 'Finely chopped'],
            ['name' => 'Green Chillies', 'quantity' => 4, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Lemon juice', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'From 1 juicy lemon'],
            ['name' => 'Desi Ghee & Oil', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'Rich layering fat'],
            ['name' => 'Saffron strands in warm milk', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For color and fragrance'],
            ['name' => 'Salt', 'quantity' => 2, 'unit' => 'teaspoons', 'notes' => 'For chicken and rice']
        ],
        'steps' => [
            'In a large bowl, marinate chicken with yogurt, ginger-garlic paste, red chilli powder, turmeric, coriander powder, biryani masala, half of the fried onions, half of the mint and coriander, lemon juice, 1 tablespoon oil, and 1.25 teaspoons salt. Rub into slits and marinate for at least 45 minutes (or overnight in fridge).',
            'In a large deep pot, bring 8 cups of water to a rolling boil with 2 green cardamoms, 2 cloves, 1 bay leaf, 1 tablespoon oil, and 1 tablespoon salt.',
            'Add the soaked and drained basmati rice to the boiling water. Cook on high flame for exactly 5 to 6 minutes until the rice is 70% cooked (the grain should break into 3 pieces when pressed between fingers). Drain immediately in a colander.',
            'Heat 2 tablespoons ghee and oil in a heavy-bottomed biryani pot or handi. Add the marinated chicken along with all juices, spreading in an even bottom layer.',
            'Cook the chicken on medium flame for 5 minutes until it changes color from pink to white and begins releasing moisture.',
            'Layer the drained 70% cooked hot basmati rice evenly over the chicken.',
            'Top the rice with the remaining fried onions, chopped mint, chopped coriander, green chillies, saffron milk, and drizzle 2 tablespoons of melted ghee all around.',
            'Seal the pot tightly with aluminum foil or kneaded wheat flour dough, and press the heavy lid firmly on top to trap all steam.',
            'Dum Cooking: Cook on high flame for 5 minutes. Then place a heavy flat tawa underneath the biryani pot and cook on low flame for 20 minutes.',
            'Turn off the heat and let the sealed pot rest undisturbed for 15 minutes before opening.',
            'Gently open the seal and use a flat spatula to scoop from the bottom up, revealing tender chicken and dual-colored aromatic rice grains.',
            'Serve hot with creamy mirchi ka salan and cold onion-mint raita.'
        ],
        'tips' => [
            'Food Safety: Always ensure chicken is thoroughly cooked to an internal temperature of 74°C (165°F). Check that the meat pulls easily from the bone with no pinkness at the joints.',
            'Do not over-boil the rice before layering; 70% cooked rice finishes absorbing the savory chicken juices during the dum process.'
        ],
        'substitutions' => [
            'Can be made in a pressure cooker: Cook on low flame for 1 whistle after sealing.'
        ],
        'storage' => 'Refrigerate leftovers promptly within 2 hours in an airtight container. Consume within 2 days; reheat thoroughly until steaming hot.'
    ],

    // 13. Vegetable Biryani
    [
        'id' => 'vegetable-dum-biryani',
        'name' => 'Hyderabadi Vegetable Dum Biryani',
        'regional_name' => 'వెజ్ దమ్ బిర్యానీ (Veg Dum Biryani)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'Hyderabadi',
        'type' => 'Vegetarian',
        'prep_time' => 25,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'A royal layered rice delicacy slow-cooked on dum with spiced vegetables, saffron, aromatic mint, and crispy caramelized onions.',
        'icon' => '🍲',
        'accent_color' => '#FFF3E0',
        'image' => 'assets/images/recipes/Hyderabadi Vegetable Dum Biryani.jpg',
        'ingredients' => [
            ['name' => 'Basmati Rice', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Aged long grain, soaked 30 mins'],
            ['name' => 'Diced Vegetables (Carrots, Beans, Potatoes, Cauliflower)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Cut into bite-sized florets/cubes'],
            ['name' => 'Green Peas', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Fresh or frozen'],
            ['name' => 'Thick Curd (Yogurt)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Whisked smooth'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Biryani Masala powder', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Shahi blend'],
            ['name' => 'Red Chilli & Turmeric powder', 'quantity' => 1, 'unit' => 'teaspoon & 0.5 tsp', 'notes' => 'Spices'],
            ['name' => 'Crispy Fried Onions (Birista)', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Golden brown'],
            ['name' => 'Fresh Mint & Coriander leaves', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Finely chopped'],
            ['name' => 'Desi Ghee', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For authentic aroma'],
            ['name' => 'Warm Milk with Saffron', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For rich flavor and color'],
            ['name' => 'Salt', 'quantity' => 1.5, 'unit' => 'teaspoons', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a bowl, mix vegetables and green peas with curd, ginger-garlic paste, red chilli powder, turmeric, biryani masala, half the mint and coriander, half the fried onions, and 1 teaspoon salt. Let marinate for 20 minutes.',
            'Boil 7 cups of water with bay leaf, cardamoms, and 1 tablespoon salt. Add soaked basmati rice and cook for 5 minutes until 70% done. Drain well.',
            'In a heavy-bottomed handi or pot, heat 1.5 tablespoons ghee. Add the marinated vegetable mixture and cook on medium flame for 6 minutes until vegetables are half tender and aromatic.',
            'Spread the cooked vegetable gravy into a flat bottom layer.',
            'Spread the warm 70% cooked basmati rice evenly over the vegetables.',
            'Garnish the top with remaining fried onions, chopped mint, coriander, saffron milk, and drizzle remaining ghee all over.',
            'Cover tightly with foil, then place the heavy lid. Place the handi on a preheated tawa on low flame.',
            'Cook on gentle dum for 18 to 20 minutes so vegetables become tender and infuse the rice with flavor.',
            'Rest for 10 minutes, then fluff gently with a paddle spoon.',
            'Serve with boondi raita and spicy salan.'
        ],
        'tips' => [
            'Do not cut vegetables too small, otherwise they will overcook and turn mushy during the dum steaming process.'
        ],
        'substitutions' => [
            'Add 100g of paneer or soya chunks for extra protein.'
        ],
        'storage' => 'Keeps well in the refrigerator for up to 2 days.'
    ],

    // 14. Tomato Pappu
    [
        'id' => 'andhra-tomato-pappu',
        'name' => 'Andhra Style Tomato Pappu',
        'regional_name' => 'టమాటా పప్పు (Tomato Dal)',
        'category' => 'Dal and Sambar',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'The ultimate Andhra comfort food—toor dal cooked soft with juicy country tomatoes, tempered with crushed garlic, mustard, cumin, and ghee.',
        'icon' => '🥣',
        'accent_color' => '#FFF3E0',
        'image' => 'assets/images/recipes/Andhra Style Tomato Pappu.jpg',
        'ingredients' => [
            ['name' => 'Toor Dal (Kandi Pappu)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed clean'],
            ['name' => 'Country Tomatoes (Natu Tamata)', 'quantity' => 3, 'unit' => 'medium', 'notes' => 'Roughly chopped'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Turmeric powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Red Chilli Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Andhra spicy'],
            ['name' => 'Garlic cloves (Vellulli)', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Lightly crushed with skin on'],
            ['name' => 'Mustard seeds & Cumin seeds', 'quantity' => 0.75, 'unit' => 'teaspoon each', 'notes' => 'Tadka spices'],
            ['name' => 'Dry Red Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Broken in half'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'For digestion'],
            ['name' => 'Ghee or Peanut Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For the fragrant popu/tadka'],
            ['name' => 'Water', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'For cooking dal'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Rinse the toor dal thoroughly 2 to 3 times in a colander until water runs clear.',
            'In a pressure cooker, add the rinsed dal, chopped tomatoes, green chillies, turmeric powder, red chilli powder, and 3 cups of water.',
            'Close the cooker lid with the weight. Pressure cook on high flame for 4 whistles, then lower flame to medium for 2 whistles. Turn off and allow the steam pressure to drop naturally.',
            'Open the cooker. Add 1.25 teaspoons of salt. Using a traditional wooden masher (pappu gutti) or the back of a large ladle, mash the dal and tomatoes into a smooth, comforting consistency.',
            'Adjust consistency by adding 1/4 to 1/2 cup of hot water if the dal is too thick, and bring to a gentle simmer for 2 minutes.',
            'Prepare the famous Andhra Popu (Tempering): Heat 2 tablespoons of ghee or oil in a small pan over medium flame.',
            'Add crushed garlic cloves first and fry for 1 minute until fragrant and lightly golden.',
            'Add mustard seeds, cumin seeds, dry red chillies, and curry leaves. Let the mustard crackle and chillies turn dark red.',
            'Add asafoetida (hing) and immediately pour the sizzling popu into the hot mashed dal.',
            'Cover the pot immediately with a lid for 2 minutes to trap the heavenly garlic-ghee aroma inside the dal.',
            'Stir well and serve hot over steaming white rice with a dollop of pure ghee, accompanied by spicy avakaya (mango pickle) or crispy potato fry.'
        ],
        'tips' => [
            'Always mash the dal with salt only AFTER the pressure cooking is done; adding salt before boiling can make the lentils take longer to cook soft.',
            'Crushing the garlic cloves with their skin on releases the most authentic traditional Andhra flavor.'
        ],
        'substitutions' => [
            'Add a small piece of tamarind (marble sized) if the tomatoes are not naturally tangy.'
        ],
        'storage' => 'Refrigerate in an airtight container for up to 3 days. Reheat on the stove with 2 tablespoons of water.'
    ],

    // 15. Palakura Pappu
    [
        'id' => 'andhra-palakura-pappu',
        'name' => 'Andhra Spinach Dal (Palakura Pappu)',
        'regional_name' => 'పాలకూర పప్పు (Palakura Pappu)',
        'category' => 'Dal and Sambar',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Nutritious fresh spinach leaves cooked together with yellow lentils, tangy tamarind, green chillies, and aromatic garlic tempering.',
        'icon' => '🥬',
        'accent_color' => '#E8F5E9',
        'image' => 'assets/images/recipes/Andhra Spinach Dal.jpg',
        'ingredients' => [
            ['name' => 'Toor Dal (Kandi Pappu)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed clean'],
            ['name' => 'Fresh Spinach (Palakura)', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Washed thoroughly and finely chopped'],
            ['name' => 'Tamarind (Chintapandu)', 'quantity' => 1, 'unit' => 'small lemon size', 'notes' => 'Softened in 2 tbsp warm water'],
            ['name' => 'Green Chillies', 'quantity' => 4, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Turmeric powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Garlic cloves', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Crushed lightly'],
            ['name' => 'Mustard seeds & Cumin seeds', 'quantity' => 0.75, 'unit' => 'teaspoon each', 'notes' => 'Tempering'],
            ['name' => 'Dry Red Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Broken'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Ghee or Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For popu'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Wash the spinach leaves in plenty of water 2 to 3 times to remove all dirt and grit. Chop finely.',
            'In a pressure cooker, combine toor dal, chopped spinach, slit green chillies, turmeric powder, the softened tamarind, and 2.5 cups of water.',
            'Cook for 4 to 5 whistles on medium flame until dal is completely soft and tender.',
            'Allow the steam to release naturally. Open cooker, add salt, and mash the dal and spinach using a wooden masher until thick and homogeneous.',
            'Heat 2 tablespoons ghee or oil in a pan over medium heat.',
            'Add crushed garlic cloves and sauté until golden brown and intensely aromatic.',
            'Add mustard seeds, cumin seeds, dry red chillies, and curry leaves. Sauté until the mustard crackles.',
            'Pour the sizzling tempering into the spinach dal and cover immediately.',
            'Simmer for 2 minutes and serve hot with steamed rice and ghee.'
        ],
        'tips' => [
            'Adding a touch of tamarind perfectly balances the natural earthy, mineral taste of fresh spinach.',
            'Washing spinach thoroughly in salt water ensures no dirt particles enter the dal.'
        ],
        'substitutions' => [
            'Can substitute methi (fenugreek leaves) to make delicious Menthi Kura Pappu.'
        ],
        'storage' => 'Keeps well in refrigerator for up to 3 days.'
    ],

    // 16. Sambar
    [
        'id' => 'hotel-style-sambar',
        'name' => 'Authentic Hotel Style Drumstick Sambar',
        'regional_name' => 'సాంబారు (Munakkaya Sambar)',
        'category' => 'Dal and Sambar',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 5,
        'difficulty' => 'Medium',
        'description' => 'A hearty and tangy lentil stew loaded with drumsticks, shallots, carrots, tomatoes, and freshly roasted homemade sambar powder.',
        'icon' => '🥣',
        'accent_color' => '#FFF3E0',
        'image' => 'assets/images/recipes/Authentic Hotel Style Drumstick Sambar.jpg',
        'ingredients' => [
            ['name' => 'Toor Dal', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Cooked soft and mashed'],
            ['name' => 'Drumsticks (Munakkaya)', 'quantity' => 2, 'unit' => '', 'notes' => 'Cut into 2.5 inch finger lengths'],
            ['name' => 'Shallots (Small Sambar Onions)', 'quantity' => 10, 'unit' => 'whole', 'notes' => 'Peeled'],
            ['name' => 'Carrot & Bottle gourd (Sorakaya)', 'quantity' => 1, 'unit' => 'cup diced', 'notes' => 'Vegetables'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Chopped'],
            ['name' => 'Tamarind pulp', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Extracted from lemon-sized ball'],
            ['name' => 'Sambar Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Authentic South Indian blend'],
            ['name' => 'Turmeric & Kashmiri Red Chilli Powder', 'quantity' => 0.5, 'unit' => 'teaspoon each', 'notes' => 'For color'],
            ['name' => 'Jaggery (Gud/Bellam)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Balances sourness'],
            ['name' => 'Mustard seeds & Fenugreek seeds', 'quantity' => 1, 'unit' => 'tsp & 0.25 tsp', 'notes' => 'Tempering'],
            ['name' => 'Curry leaves & Fresh Coriander', 'quantity' => 12, 'unit' => 'leaves & 3 tbsp', 'notes' => 'Herbs'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Essential sambar aroma'],
            ['name' => 'Ghee or Sesame Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Tadka fat'],
            ['name' => 'Salt', 'quantity' => 1.5, 'unit' => 'teaspoons', 'notes' => 'To taste']
        ],
        'steps' => [
            'Cook toor dal in a pressure cooker with 3 cups water and pinch of turmeric for 4 whistles until completely mushy. Mash smooth and set aside.',
            'In a deep cooking vessel, add the drumsticks, peeled shallots, carrots, tomatoes, and 2 cups of water with 1/2 teaspoon salt and 1/4 teaspoon turmeric.',
            'Cook the vegetables on medium heat for 8 to 10 minutes until drumsticks are tender but not breaking.',
            'Pour in the extracted tamarind water and jaggery. Simmer for 5 minutes until raw tamarind taste disappears.',
            'Add the sambar powder and red chilli powder. Stir well to avoid any dry spice lumps.',
            'Pour the cooked, mashed toor dal into the boiling vegetable mixture. Add 1 cup of water to adjust to a pourable, soup-like consistency.',
            'Bring the entire sambar to a vigorous rolling boil on medium heat for 5 to 6 minutes, stirring occasionally so it does not settle at the bottom.',
            'For the crowning tadka: Heat ghee or oil in a small pan. Add mustard seeds and fenugreek seeds (methi). Let the mustard crackle and methi turn fragrant golden (do not blacken methi).',
            'Add 2 dry red chillies, curry leaves, and a generous pinch of asafoetida (hing). Fry for 20 seconds.',
            'Pour this hot tadka into the boiling sambar and immediately turn off the heat.',
            'Garnish generously with finely chopped fresh coriander leaves.',
            'Cover with a lid and let it rest for 10 minutes before serving with hot idlis, crispy dosas, or steamed rice.'
        ],
        'tips' => [
            'Using whole small sambar onions (shallots) provides the sweet, authentic taste that large red onions cannot match.',
            'A tiny pinch of jaggery does not make the sambar sweet; it rounds out the sour tamarind and spicy sambar powder harmoniously.'
        ],
        'substitutions' => [
            'Radish (mooli) or okra (bendakaya) can be added for wonderful regional variations.'
        ],
        'storage' => 'Sambar tastes even better the next day as the vegetables soak in the flavors. Keeps refrigerated for up to 4 days.'
    ],

    // 17. Tomato Rasam
    [
        'id' => 'andhra-tomato-rasam',
        'name' => 'Comforting Andhra Tomato Rasam (Charu)',
        'regional_name' => 'టమాటా చారు / రసం (Tomato Charu)',
        'category' => 'Rasam and Soups',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'A soothing, medicinal thin soup made with crushed ripe tomatoes, tamarind, crushed black pepper, cumin, garlic, and fresh coriander stems.',
        'icon' => '🍵',
        'accent_color' => '#FFEBEE',
        'image' => 'assets/images/recipes/Comforting Andhra Tomato Rasam.jpg',
        'ingredients' => [
            ['name' => 'Ripe Juicy Tomatoes', 'quantity' => 3, 'unit' => 'large', 'notes' => 'Crushed thoroughly by hand'],
            ['name' => 'Tamarind pulp', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Extracted in warm water'],
            ['name' => 'Water', 'quantity' => 3.5, 'unit' => 'cups', 'notes' => 'For light, drinkable broth'],
            ['name' => 'Black Peppercorns (Miriyalu)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Freshly crushed coarsely'],
            ['name' => 'Cumin seeds (Jeelakarra)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Freshly crushed coarsely'],
            ['name' => 'Garlic cloves (Vellulli)', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Crushed with skin'],
            ['name' => 'Turmeric powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Curry leaves & Fresh Coriander with stems', 'quantity' => 1, 'unit' => 'sprig & 3 tbsp', 'notes' => 'Bruised for aroma'],
            ['name' => 'Mustard seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Tempering'],
            ['name' => 'Ghee', 'quantity' => 1.5, 'unit' => 'tablespoon', 'notes' => 'For authentic aroma'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Digestive resin'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a vessel, add the chopped tomatoes and crush them completely with clean hands until they become pulpy and release all juice.',
            'Add 3.5 cups of water, tamarind extract, turmeric powder, and 1.25 teaspoons of salt.',
            'Coarsely pound the black peppercorns, cumin seeds, and garlic cloves using a mortar and pestle. (Do not grind to a fine powder—coarse texture is essential).',
            'Add the crushed pepper-cumin-garlic mixture along with bruised curry leaves and torn coriander stems to the tomato water.',
            'Place the vessel over medium flame and bring it to a gentle, slow simmer.',
            'IMPORTANT: Do not let rasam boil violently for a long time, as it will lose its fresh, delicate herbal fragrance. Let it simmer gently until a frothy yellow foam rises to the top (about 8 to 10 minutes).',
            'Prepare the ghee tadka: In a small pan, heat ghee. Add mustard seeds and let them splutter. Add dry red chilli, asafoetida (hing), and a sprig of curry leaves.',
            'Pour the hot sizzling tadka into the simmering rasam and turn off the heat immediately.',
            'Garnish with plenty of fresh coriander leaves and cover the pot with a plate for 5 minutes before serving.',
            'Drink warm in a glass like soup during colds, or pour over steaming hot rice and crushed papad.'
        ],
        'tips' => [
            'Never hard-boil rasam; turn off the heat as soon as it foams up to the rim to retain the medicinal essential oils.',
            'Crushing tomatoes with hands releases pectin and juices that make the broth naturally flavorful without needing thickeners.'
        ],
        'substitutions' => [
            'Add 2 tablespoons of cooked toor dal water for Paruppu Rasam style body.'
        ],
        'storage' => 'Refrigerate for up to 2 days; reheat gently on low flame without boiling.'
    ],

    // 18. Andhra Chicken Curry
    [
        'id' => 'andhra-chicken-curry',
        'name' => 'Spicy Andhra Kodi Kura',
        'regional_name' => 'ఆంధ్రా కోడికూర (Kodi Kura)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'Andhra',
        'type' => 'Non-Vegetarian',
        'prep_time' => 20,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Fiery and deeply flavorful country-style chicken curry infused with roasted poppy seeds, coconut, cinnamon, cloves, and spicy Guntur red chillies.',
        'icon' => '🍗',
        'accent_color' => '#FFEBEE',
        'image' => 'assets/images/recipes/Spicy Andhra Kodi Kura.jpg',
        'ingredients' => [
            ['name' => 'Chicken (Bone-in, curry cut)', 'quantity' => 700, 'unit' => 'grams', 'notes' => 'Thoroughly washed and drained'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'large', 'notes' => 'Finely chopped'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Andhra Spicy Red Chilli Powder', 'quantity' => 2, 'unit' => 'teaspoons', 'notes' => 'Guntur chilli'],
            ['name' => 'Turmeric & Coriander powder', 'quantity' => 1, 'unit' => 'tsp & 1.5 tbsp', 'notes' => 'Spices'],
            ['name' => 'Cinnamon & Cloves', 'quantity' => 2, 'unit' => 'pieces & 4 cloves', 'notes' => 'Whole spices'],
            ['name' => 'Poppy seeds (Gasagasalu) & Dry Coconut paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Ground together with 2 tbsp water'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Garam Masala powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Finish spice'],
            ['name' => 'Peanut or Sunflower Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Cooking oil'],
            ['name' => 'Salt', 'quantity' => 1.5, 'unit' => 'teaspoons', 'notes' => 'To taste']
        ],
        'steps' => [
            'Food Safety: Wash chicken carefully. Keep cutting boards and knives clean. Marinate chicken with 1/2 teaspoon turmeric, 1 teaspoon chilli powder, 1 teaspoon ginger-garlic paste, and 1/2 teaspoon salt for 20 minutes.',
            'Heat 3 tablespoons oil in a heavy-bottomed kadai or pressure pan over medium-high heat.',
            'Add the whole spices: cinnamon stick and cloves. Sauté for 20 seconds until aromatic.',
            'Add finely chopped onions, green chillies, and curry leaves. Sauté on medium flame for 6 to 8 minutes until onions turn deep golden brown (browning the onions provides the curry its rich deep color).',
            'Add the remaining ginger-garlic paste and sauté for 1 to 2 minutes until raw aroma is gone.',
            'Add the chopped tomatoes, coriander powder, remaining red chilli powder, and salt. Cook until tomatoes become soft and oil begins to separate from the masala.',
            'Add the marinated chicken pieces. Increase flame to high and sauté (bhunao) the chicken vigorously for 5 minutes so the juices are sealed inside.',
            'Add the poppy seed and dry coconut paste. Mix well to coat the chicken with the rich paste.',
            'Pour in 1.5 cups of warm water. Stir well and bring the gravy to a boil.',
            'Reduce heat to medium-low, cover with a tight lid, and simmer for 15 to 18 minutes (or pressure cook for 2 whistles) until chicken is fully tender and cooked through (internal temp 74°C/165°F with no pinkness at the bone).',
            'Remove lid, sprinkle garam masala and fresh coriander leaves. Simmer on low for 3 more minutes until a thin layer of red aromatic oil (tarri) floats on top.',
            'Serve piping hot with steamed rice, bagara rice, or crispy hot dosas.'
        ],
        'tips' => [
            'Browning the onions until deep golden is the secret to an authentic Andhra dark reddish-brown curry base.',
            'Poppy seed (khus khus) and dry coconut paste gives the gravy luxurious thickness without making it heavy like cream.'
        ],
        'substitutions' => [
            'Cashew nut paste (8 cashews soaked and ground) can replace poppy seeds if unavailable.'
        ],
        'storage' => 'Tastes even richer after a few hours. Store in the refrigerator for up to 2 days; reheat thoroughly until bubbling.'
    ],

    // 19. Gutti Vankaya Curry
    [
        'id' => 'gutti-vankaya-curry',
        'name' => 'Andhra Gutti Vankaya Koora (Stuffed Brinjal)',
        'regional_name' => 'గుత్తి వంకాయ కూర (Gutti Vankaya)',
        'category' => 'Andhra Specialities',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Tender small purple brinjals stuffed with a richly roasted peanut, sesame, coconut, and spice masala, slow-cooked in a tangy tamarind gravy.',
        'icon' => '🍆',
        'accent_color' => '#EDE7F6',
        'image' => 'assets/images/recipes/Andhra Gutti Vankaya Koora.jpg',
        'ingredients' => [
            ['name' => 'Small Purple Brinjals (Vankayalu)', 'quantity' => 8, 'unit' => 'small', 'notes' => 'Fresh, tender with stems attached'],
            ['name' => 'Roasted Peanuts (Pallilu)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For masala paste'],
            ['name' => 'White Sesame seeds (Nuvvulu)', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Toasted'],
            ['name' => 'Grated Dry Coconut (Kobbari)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Toasted'],
            ['name' => 'Coriander seeds & Cumin seeds', 'quantity' => 1, 'unit' => 'tbsp & 1 tsp', 'notes' => 'Roasted'],
            ['name' => 'Tamarind pulp', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Extracted'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => '1 ground with paste, 1 chopped'],
            ['name' => 'Ginger & Garlic cloves', 'quantity' => 1, 'unit' => 'inch & 5 cloves', 'notes' => 'Aromatics'],
            ['name' => 'Red Chilli Powder & Turmeric', 'quantity' => 1.5, 'unit' => 'tsp & 0.5 tsp', 'notes' => 'Spices'],
            ['name' => 'Cooking Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Peanut oil preferred'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Dry roast peanuts, sesame seeds, dry coconut, coriander seeds, and cumin seeds in a pan over low flame until fragrant. Let cool.',
            'Grind the roasted spices with ginger, garlic, 1 chopped onion, red chilli powder, turmeric, salt, and 3 tablespoons of water into a thick, aromatic stuffing paste.',
            'Slit each brinjal into a cross (plus sign shape) from the bottom toward the stem, keeping the stem intact so the brinjal holds together.',
            'Keep slit brinjals immersed in salted water to prevent them from turning black or bitter.',
            'Drain brinjals and stuff each one generously with the prepared masala paste. Reserve any leftover paste for the gravy.',
            'Heat 3 tablespoons oil in a wide, heavy-bottomed kadai over medium heat.',
            'Add mustard seeds, cumin seeds, and curry leaves. Let them sizzle.',
            'Add the remaining chopped onion and sauté for 3 minutes until translucent.',
            'Gently place the stuffed brinjals into the oil side by side in a single layer. Fry on medium-low heat for 5 minutes, turning gently with tongs so the skins blister evenly.',
            'Add the reserved masala paste, tamarind pulp, and 1.5 cups of warm water. Stir gently without breaking the brinjals.',
            'Cover with a tight lid, reduce flame to low, and slow-cook for 15 to 18 minutes until the brinjals become buttery soft and oil floats on the rich gravy.',
            'Serve with hot rice, jowar roti, or pulao.'
        ],
        'tips' => [
            'Keeping brinjals in salted water before stuffing removes any natural bitterness and keeps their color bright.',
            'Use small, fresh purple brinjals with minimal seeds for the melt-in-the-mouth texture.'
        ],
        'substitutions' => [
            'Can use baby potatoes or baby capsicums with the same stuffing recipe.'
        ],
        'storage' => 'Keeps well in the refrigerator for up to 3 days. The flavors deepen the following day.'
    ],

    // 20. Bendakaya Fry
    [
        'id' => 'andhra-bendakaya-fry',
        'name' => 'Crispy Andhra Bendakaya Fry (Okra Stir-Fry)',
        'regional_name' => 'బెండకాయ వేపుడు (Bendakaya Vepudu)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Crispy, non-slimy chopped okra tossed with roasted peanuts, garlic cloves, curry leaves, and spicy red chilli powder.',
        'icon' => '🥘',
        'accent_color' => '#E8F5E9',
        'image' => 'assets/images/recipes/Crispy Andhra Bendakaya Fry (Okra Stir-Fry).jpg',
        'ingredients' => [
            ['name' => 'Fresh Okra / Bhindi (Bendakayalu)', 'quantity' => 500, 'unit' => 'grams', 'notes' => 'Washed and completely wiped dry'],
            ['name' => 'Raw Peanuts', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Adds nutty crunch'],
            ['name' => 'Garlic cloves', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Crushed lightly with skin'],
            ['name' => 'Mustard seeds & Cumin seeds', 'quantity' => 0.5, 'unit' => 'teaspoon each', 'notes' => 'Tempering'],
            ['name' => 'Urad dal & Chana dal', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Crunchy lentils'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Turmeric powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Red Chilli Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Cooking Oil', 'quantity' => 2.5, 'unit' => 'tablespoons', 'notes' => 'Peanut or sunflower oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'WASH AND DRY: Wash the okra thoroughly, spread on a clean kitchen towel, and wipe every single piece until 100% dry. (Water causes okra to turn slimy).',
            'Trim the head and tail, and slice into 1/2-inch uniform round rings.',
            'Heat 2.5 tablespoons oil in a wide, non-stick or well-seasoned iron kadai over medium heat.',
            'Add peanuts first and fry for 2 minutes until light golden.',
            'Add mustard seeds, cumin seeds, urad dal, chana dal, crushed garlic cloves, and curry leaves. Sauté until lentils turn golden.',
            'Add the sliced okra and turmeric powder. Mix gently to coat in oil.',
            'IMPORTANT: Fry the okra on medium-high heat UNCOVERED for the first 8 to 10 minutes, stirring only occasionally every 2 minutes. Covering will trap steam and create slime.',
            'Once the okra turns firm and loses all mucilage (slime), reduce the flame to medium-low.',
            'Continue roasting for another 6 to 8 minutes until the edges turn golden and crisp.',
            'Turn off the heat. Sprinkle the red chilli powder and salt all over, and toss well. (Adding salt at the very end keeps okra wonderfully crisp).',
            'Serve hot as a side dish with steaming tomato pappu and rice, or with warm rasam.'
        ],
        'tips' => [
            'Always dry okra completely before chopping, and NEVER cover the pan while frying to ensure zero slime.',
            'Always add salt at the very end of cooking, as salt draws out moisture and softens vegetables prematurely.'
        ],
        'substitutions' => [
            'Sprinkle roasted peanut powder (palli karam) at the end for an extra-rich Andhra style coating.'
        ],
        'storage' => 'Best enjoyed fresh and crispy. Leftovers can be reheated on a dry tawa for 2 minutes.'
    ]
];
