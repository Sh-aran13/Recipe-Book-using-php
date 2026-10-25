<?php
// includes/recipe-data-part4.php - Further expansion recipes for Master Chef Academy (Tandoori, Regional Curries, Indo-Chinese, Baking & Sweets)
declare(strict_types=1);

$recipes_part4 = [
    // 56. Palak Paneer
    [
        'id' => 'palak-paneer',
        'name' => 'Homestyle Palak Paneer',
        'regional_name' => 'పాలక్ పన్నీర్ (Palak Paneer)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Nutritious vibrant green spinach gravy simmered with delicate cubes of fresh paneer, tempered with garlic, cumin, and finished with a touch of fresh cream.',
        'icon' => '🥬',
        'accent_color' => '#E8F5E9',
        'utensils' => ['Blanching saucepan', 'Ice water bath bowl', 'Blender', 'Kadai'],
        'ingredients' => [
            ['name' => 'Fresh Spinach (Palak)', 'quantity' => 2, 'unit' => 'bunches', 'notes' => 'Tender leaves washed clean (~350g)'],
            ['name' => 'Fresh Paneer', 'quantity' => 200, 'unit' => 'grams', 'notes' => 'Cubed, soaked in warm water'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Tomato', 'quantity' => 1, 'unit' => 'small', 'notes' => 'Pureed'],
            ['name' => 'Garlic Cloves', 'quantity' => 6, 'unit' => '', 'notes' => 'Finely minced'],
            ['name' => 'Ginger', 'quantity' => 1, 'unit' => 'inch', 'notes' => 'Minced'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Adjust to heat preference'],
            ['name' => 'Kasuri Methi', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Crushed between palms'],
            ['name' => 'Garam Masala', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Fragrant finishing'],
            ['name' => 'Fresh Cream', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For velvety finish'],
            ['name' => 'Pure Desi Ghee or Butter', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For cooking']
        ],
        'steps' => [
            'Bring 4 cups of water to rolling boil in a pot. Drop clean spinach leaves and blanch for precisely 2 minutes.',
            'Immediately transfer blanched leaves using tongs into a bowl of ice-cold water. This thermal shock halts cooking and locks in brilliant emerald green chlorophyll.',
            'Drain spinach and blend with green chillies into a smooth puree without adding excess water.',
            'Heat ghee in a kadai. Add cumin seeds and minced garlic; saute on medium-low flame until garlic turns aromatic golden.',
            'Add finely chopped onions and ginger; saute until translucent and golden brown (5-6 minutes).',
            'Add pureed tomato, turmeric, coriander powder, and salt. Cook until moisture reduces and oil glistens along edges.',
            'Pour in the emerald spinach puree. Simmer gently on low-medium flame for 4 to 5 minutes, stirring occasionally (do not over-boil or cover completely to preserve color).',
            'Gently slide in drained soft paneer cubes. Simmer for 2 minutes to let paneer absorb spinach flavors.',
            'Sprinkle crushed kasuri methi, garam masala, and swirl fresh cream. Stir once gently and remove from heat.',
            'Serve warm with hot phulkas, jeera rice, or garlic naan.'
        ],
        'tips' => [
            'Never skip the ice bath for spinach; leaving it hot causes enzymatic oxidation that turns bright green into dull military olive brown.',
            'Soaking paneer in warm salted water for 10 minutes keeps it cloud-soft without pan-frying.'
        ],
        'substitutions' => ['Tofu can be used in place of paneer for a 100% plant-based vegan version.'],
        'storage' => 'Best served fresh. Keeps refrigerated in an airtight glass container for up to 2 days.',
        'related_lessons' => ['int-onion-tomato-masala', 'beg-flame-control']
    ],

    // 57. Vegetable Kurma
    [
        'id' => 'vegetable-kurma',
        'name' => 'Hotel Style Vegetable Kurma',
        'regional_name' => 'వెజిటబుల్ కుర్మా (Veg Kurma)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Fragrant, mildly spiced South Indian hotel-style vegetable stew simmered in a silky ground coconut, cashew, fennel, and poppy seed paste. Perfect companion for parotta, chapati, and poori.',
        'icon' => '🍲',
        'accent_color' => '#FFF8E1',
        'utensils' => ['Mixer grinder', 'Pressure cooker or heavy kadai'],
        'ingredients' => [
            ['name' => 'Mixed Vegetables (Carrot, Beans, Peas, Potato)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Diced evenly'],
            ['name' => 'Fresh Grated Coconut', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'For kurma paste'],
            ['name' => 'Cashew Nuts', 'quantity' => 8, 'unit' => '', 'notes' => 'Soaked in warm water for 15 mins'],
            ['name' => 'Fennel Seeds (Saunf)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Signature kurma aroma'],
            ['name' => 'Poppy Seeds (Khus Khus)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Optional for richness'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'large', 'notes' => 'Finely chopped'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Chopped'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Whole Spices (Cinnamon, Cloves, Cardamom, Bay Leaf)', 'quantity' => 1, 'unit' => 'set', 'notes' => 'For tempering'],
            ['name' => 'Mint & Coriander Leaves', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Freshly chopped'],
            ['name' => 'Coconut Oil or Ghee', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Traditional medium']
        ],
        'steps' => [
            'In a small mixer jar, blend fresh grated coconut, soaked cashews, fennel seeds, poppy seeds, and green chillies with 1/2 cup warm water into an ultra-smooth, creamy white paste.',
            'Heat oil/ghee in a pressure cooker or kadai. Add cinnamon, cardamom, cloves, and bay leaf; bloom for 20 seconds.',
            'Add finely chopped onions and sauté until translucent. Add ginger-garlic paste and fresh mint leaves; sauté 1 minute until fragrant.',
            'Add chopped tomatoes and salt. Cook until tomatoes turn mushy and soften.',
            'Toss in diced carrots, beans, potatoes, and green peas. Add 1/2 tsp turmeric, 1 tsp coriander powder, and 1/2 tsp chilli powder. Stir-fry for 2 minutes.',
            'Pour in the ground coconut-cashew paste and 1.5 cups of water. Mix well to create a pale aromatic gravy.',
            'If using a pressure cooker, close the lid and cook for 2 whistles on medium flame. If using a pot, cover and simmer for 15 minutes until vegetables are tender.',
            'Let steam release naturally. Open, stir gently, and simmer for 2 minutes to achieve rich pouring consistency.',
            'Garnish with fresh chopped coriander and a squeeze of fresh lemon juice.',
            'Serve piping hot with flaky Malabar parottas, soft chapatis, or idiyappam.'
        ],
        'tips' => [
            'Fennel seeds (saunf) are the essential soul of South Indian hotel kurma; do not omit them from the coconut paste.',
            'Simmer coconut paste on low to medium flame; boiling vigorously on high flame can cause coconut oil to separate prematurely.'
        ],
        'substitutions' => ['White poppy seeds can be replaced with 4 extra soaked cashews or melon seeds (magaz).'],
        'storage' => 'Stores well in the refrigerator for up to 24 hours. Reheat gently with 2 tablespoons of warm water.',
        'related_lessons' => ['int-curry-bases', 'beg-flame-control']
    ],

    // 58. Kadai Paneer
    [
        'id' => 'kadai-paneer',
        'name' => 'Restaurant Style Kadai Paneer',
        'regional_name' => 'కడాయి పన్నీర్ (Kadai Paneer)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Succulent paneer cubes and crunchy bell pepper petals tossed in a spicy, semi-dry tomato gravy infused with freshly roasted, coarsely pounded Kadai Masala.',
        'icon' => '🥘',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Heavy cast iron kadai', 'Spice mortar pestle or spice grinder'],
        'ingredients' => [
            ['name' => 'Fresh Paneer', 'quantity' => 250, 'unit' => 'grams', 'notes' => 'Cubed into bite-sized pieces'],
            ['name' => 'Capsicum (Green Bell Pepper)', 'quantity' => 1, 'unit' => 'large', 'notes' => 'Cut into 1-inch squares'],
            ['name' => 'Onion', 'quantity' => 2, 'unit' => 'medium', 'notes' => '1 finely chopped, 1 cut into petals'],
            ['name' => 'Ripe Tomatoes', 'quantity' => 3, 'unit' => 'medium', 'notes' => 'Pureed fresh'],
            ['name' => 'Whole Coriander Seeds', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'For fresh Kadai Masala'],
            ['name' => 'Cumin Seeds', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For fresh Kadai Masala'],
            ['name' => 'Whole Black Peppercorns', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For fresh Kadai Masala'],
            ['name' => 'Dry Kashmiri Red Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'For fresh Kadai Masala'],
            ['name' => 'Ginger Juliennes', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For crunchy bite'],
            ['name' => 'Kasuri Methi', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Crushed'],
            ['name' => 'Pure Desi Ghee & Butter', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For authentic taste']
        ],
        'steps' => [
            'Make Fresh Kadai Masala: In a small pan, dry roast whole coriander seeds, cumin, black peppercorns, and dry red chillies on low heat for 2-3 minutes until fragrant. Coarsely crush in a mortar or spice grinder (leave slightly coarse, not fine powder).',
            'In a wide kadai, heat 1 tbsp ghee. Toss capsicum squares and onion petals on high flame for 2 minutes until blistered yet crunchy. Transfer to a bowl.',
            'In the same kadai, add another tablespoon of ghee/oil. Add finely chopped onions and saute until golden brown.',
            'Add ginger-garlic paste and slit green chillies; saute for 1 minute until raw aroma dissipates.',
            'Pour in fresh tomato puree, 1/2 tsp turmeric, 1 tsp Kashmiri red chilli powder, and salt. Cook on medium flame until oil separates along the edges.',
            'Add 1.5 tablespoons of the freshly pounded Kadai Masala. Stir for 1 minute to release rich roasted aromas.',
            'Add 1/4 cup of warm water to loosen the masala into a clinging, glossy sauce.',
            'Add soft paneer cubes, blistered capsicum squares, and onion petals. Toss gently on medium flame for 2 to 3 minutes to coat in sauce.',
            'Finish with fresh ginger juliennes, crushed kasuri methi, and a dollop of butter.',
            'Serve piping hot directly from the kadai with tandoori roti or naan.'
        ],
        'tips' => [
            'Never grind Kadai Masala into a fine flour; coarse texture gives that signature rustic crunch on the palate.',
            'Stir-fry capsicum and onion petals on maximum heat so they stay crisp and don’t turn limp in the curry.'
        ],
        'substitutions' => ['Button mushrooms or baby corn can be added alongside paneer for a Kadai Veg variation.'],
        'storage' => 'Best served fresh. Keeps refrigerated for up to 2 days.',
        'related_lessons' => ['int-curry-bases', 'rest-mother-gravies']
    ],

    // 59. Chicken Pulao
    [
        'id' => 'chicken-pulao',
        'name' => 'One-Pot Homestyle Chicken Pulao',
        'regional_name' => 'చికెన్ పలావ్ (Chicken Pulao)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'South Indian',
        'type' => 'Non-Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Tender bone-in chicken pieces and fragrant Basmati rice cooked together in one pot with whole spices, mint, coriander, and caramelized onions for a light, comforting feast.',
        'icon' => '🍗',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Heavy bottom saucepan or pressure cooker with tight lid'],
        'ingredients' => [
            ['name' => 'Chicken (Bone-in, Curry cut)', 'quantity' => 500, 'unit' => 'grams', 'notes' => 'Juicy thigh and drumstick pieces'],
            ['name' => 'Aged Basmati Rice', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Rinsed and soaked 20 mins'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'large', 'notes' => 'Thinly sliced'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Sliced'],
            ['name' => 'Fresh Curd (Yogurt)', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Whisked smooth'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Fresh Mint & Coriander Leaves', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Finely chopped'],
            ['name' => 'Whole Spices (Star Anise, Mace, Cloves, Cardamom, Bay Leaf)', 'quantity' => 1, 'unit' => 'set', 'notes' => 'Whole aromatics'],
            ['name' => 'Green Chillies', 'quantity' => 4, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Pure Desi Ghee & Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Rich aroma'],
            ['name' => 'Warm Water / Chicken Broth', 'quantity' => 3.5, 'unit' => 'cups', 'notes' => 'For 1:1.75 rice cooking ratio']
        ],
        'steps' => [
            'Rinse Basmati rice gently until water runs clear; soak in clean water for 20 minutes, then drain completely.',
            'In a heavy-bottom pot or pressure cooker, heat oil and ghee. Add whole spices (bay leaf, cloves, cardamom, star anise, cinnamon); bloom for 30 seconds.',
            'Add thinly sliced onions and green chillies. Sauté on medium flame until onions turn rich golden brown (7-8 minutes).',
            'Add ginger-garlic paste and fresh mint leaves; sauté for 1 minute until fragrant.',
            'Add chopped tomatoes, turmeric, chilli powder, and salt. Cook until tomatoes soften into the masala.',
            'Add chicken pieces and whisked curd. Sauté chicken on medium-high heat for 6-8 minutes until meat sears and turns white on the outside.',
            'Pour 3.5 cups of warm water into the pot. Bring to a rolling boil, then taste broth—it should taste pleasantly salty like sea water.',
            'Add the drained soaked Basmati rice and chopped coriander. Gently stir once from bottom to distribute.',
            'If using a pressure cooker: close lid and cook for 1 whistle on high flame, then 5 minutes on lowest simmer; turn off heat. If using a pot: cover tightly, simmer on lowest heat for 12 minutes.',
            'Allow steam to subside completely for 10 minutes without opening lid.',
            'Open lid and gently fluff long rice grains with a wide fork from the sides.',
            'Serve piping hot with cool onion-cucumber raita and lemon wedges.'
        ],
        'tips' => [
            'Searing chicken on medium-high heat in the onion masala locks in juices before water is added.',
            'Resting cooked pulao for 10 minutes off heat allows trapped steam to firm the outer grain walls, preventing mushiness when fluffing.'
        ],
        'substitutions' => ['Mutton (goat meat) can be used, requiring 4 pressure whistles before adding rice.'],
        'storage' => 'Refrigerate in an airtight container for up to 2 days. Reheat with 1 tablespoon of water sprinkled on top.',
        'related_lessons' => ['int-rice-perfection', 'adv-maillard-meat']
    ],

    // 60. Andhra Mutton Curry (Mamsam Kura)
    [
        'id' => 'andhra-mutton-curry',
        'name' => 'Spicy Andhra Mutton Curry (Mamsam Kura)',
        'regional_name' => 'ఆంధ్రా మటన్ కూర (Mamsam Kura)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'Andhra Specialities',
        'type' => 'Non-Vegetarian',
        'prep_time' => 25,
        'cook_time' => 45,
        'servings' => 4,
        'difficulty' => 'Hard',
        'description' => 'Succulent tender bone-in goat mutton slow-cooked in a fiery, aromatic Telugu homestyle gravy laced with poppy seeds, roasted coriander, cloves, black pepper, and curry leaves.',
        'icon' => '🥩',
        'accent_color' => '#FBE9E7',
        'utensils' => ['Pressure cooker', 'Heavy bottom kadai', 'Spice grinder'],
        'ingredients' => [
            ['name' => 'Mutton (Goat Meat, Bone-in Curry Cut)', 'quantity' => 600, 'unit' => 'grams', 'notes' => 'Tender shoulder & ribs piece'],
            ['name' => 'Onions', 'quantity' => 3, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Guntur Red Chilli Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Vibrant red Andhra heat'],
            ['name' => 'Coriander Seeds & Cumin', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Dry roasted and ground'],
            ['name' => 'Black Peppercorns & Cloves', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Pungent warmth'],
            ['name' => 'Poppy Seeds (Gasa Gasalu)', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Soaked and ground to smooth paste'],
            ['name' => 'Fresh Curry Leaves', 'quantity' => 2, 'unit' => 'sprigs', 'notes' => 'Essential Telugu flavor'],
            ['name' => 'Cold-Pressed Groundnut Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Authentic cooking fat']
        ],
        'steps' => [
            'Marinate washed mutton with 1/2 tsp turmeric, 1 tbsp ginger-garlic paste, 1 tbsp red chilli powder, 1 tsp salt, and 1 tbsp oil for 30 minutes.',
            'Heat oil in a pressure cooker. Add whole spices (cloves, cardamom, cinnamon) and fresh curry leaves; let crackle.',
            'Add finely chopped onions and slit green chillies; sauté patiently on medium flame until deep golden brown (10 minutes).',
            'Add remaining ginger-garlic paste; sauté 1 minute until fragrant.',
            'Add chopped tomatoes and cook until soft and oil separates.',
            'Add the marinated mutton pieces. Sauté (Bhunao) on high flame for 8-10 minutes, stirring continuously as mutton sears, releases its juices, and browns.',
            'Add ground coriander-cumin powder, black pepper, and the smooth poppy seed paste. Sauté for 2 minutes.',
            'Pour in 1.5 cups of boiling hot water. Close pressure cooker lid securely.',
            'Cook on high flame for 3 whistles, then lower flame to minimum and cook for 15 minutes (or 5-6 total whistles depending on meat tenderness).',
            'Let pressure drop naturally. Open lid; simmer uncovered for 5 minutes until gravy achieves rich, clinging, glistening consistency.',
            'Sprinkle fresh coriander leaves and garam masala.',
            'Serve steaming hot with steamed rice (Annam), ragi sangati, or crispy dosas.'
        ],
        'tips' => [
            'Always add hot boiling water to searing meat; cold water tightens goat muscle fibers, making mutton chewy and tough.',
            'Poppy seed paste (gasa gasalu) thickens the spicy gravy and provides a velvety, nutty mouthfeel that tames extreme chilli heat.'
        ],
        'substitutions' => ['Lamb can be used instead of goat mutton, reducing cooking time by 5 minutes.'],
        'storage' => 'Tastes even better the next day as spices penetrate deeper into the bone marrow. Stores refrigerated for 3 days.',
        'related_lessons' => ['adv-maillard-meat', 'beg-flame-control']
    ],

    // 61. Gongura Chicken Curry
    [
        'id' => 'gongura-chicken',
        'name' => 'Authentic Andhra Gongura Chicken',
        'regional_name' => 'గోంగూర చికెన్ (Gongura Chicken)',
        'category' => 'Andhra Specialities',
        'cuisine' => 'Andhra Specialities',
        'type' => 'Non-Vegetarian',
        'prep_time' => 20,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'The crown jewel of Telugu cuisine: succulent chicken cooked in a tangy, sour sorrel leaf (Gongura) paste with caramelized onions, roasted garlic, and fiery Guntur chillies.',
        'icon' => '🌿',
        'accent_color' => '#F1F8E9',
        'utensils' => ['Wide kadai', 'Blender / Mortar', 'Lid'],
        'ingredients' => [
            ['name' => 'Chicken (Curry Cut, bone-in)', 'quantity' => 500, 'unit' => 'grams', 'notes' => 'Bite-sized pieces'],
            ['name' => 'Fresh Red Stem Gongura Leaves (Sorrel)', 'quantity' => 2, 'unit' => 'bunches', 'notes' => 'Plucked, washed, dried completely (~250g)'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Green Chillies', 'quantity' => 5, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Guntur Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Balances sourness'],
            ['name' => 'Coriander Powder & Cumin Powder', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Roasted ground'],
            ['name' => 'Garlic Cloves', 'quantity' => 8, 'unit' => '', 'notes' => 'Crushed lightly with peel'],
            ['name' => 'Sesame (Til) Oil or Groundnut Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Traditional oil']
        ],
        'steps' => [
            'Cook Gongura: In a pan, heat 1 tsp oil. Add cleaned gongura leaves and 2 green chillies. Sauté on medium flame for 4-5 minutes until leaves wilt, turn dark moss green, and soften. Let cool, then coarsely pulse in a blender without water.',
            'Marinate chicken with 1/2 tsp turmeric, 1 tsp chilli powder, and 1/2 tsp salt for 15 minutes.',
            'In a wide kadai, heat 2.5 tablespoons of oil. Add crushed garlic cloves and slit green chillies; saute 30 seconds.',
            'Add finely chopped onions and curry leaves. Sauté on medium flame until onions turn deep golden brown.',
            'Add ginger-garlic paste; cook 1 minute until fragrant.',
            'Add marinated chicken. Sauté on medium-high heat for 6-8 minutes until chicken turns white and releases natural juices.',
            'Add red chilli powder, coriander powder, cumin powder, and 1/2 cup hot water. Cover and simmer on low heat for 12-15 minutes until chicken is tender.',
            'Add the cooked gongura paste to the chicken. Stir thoroughly to incorporate the tangy leaves into the spicy chicken gravy.',
            'Simmer on gentle low flame for 5 minutes so chicken absorbs the sour gongura tang and oil separates along edges.',
            'Serve hot with steaming hot rice and a generous dollop of pure desi ghee.'
        ],
        'tips' => [
            'Red stem gongura (Erra Gongura) is traditionally preferred over green stem for its pronounced authentic sour tang.',
            'Gongura requires generous oil and chilli powder to create the perfect harmony of sour and fiery heat.'
        ],
        'substitutions' => ['Mutton can also be cooked with gongura (Gongura Mamsam) following the same method.'],
        'storage' => 'Sour gongura naturally preserves the dish. Keeps refrigerated for up to 4 days.',
        'related_lessons' => ['int-tempering-mastery', 'beg-flavor-balancing']
    ],

    // 62. Traditional Mysore Pak
    [
        'id' => 'traditional-mysore-pak',
        'name' => 'Traditional Soft Ghee Mysore Pak',
        'regional_name' => 'మైసూర్ పాక్ (Mysore Pak)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 25,
        'servings' => 8,
        'difficulty' => 'Hard',
        'description' => 'Royal melt-in-the-mouth sweet crafted from golden roasted besan (gram flour), pure fragrant desi ghee, and one-string sugar syrup. A festive heritage confectionery classic.',
        'icon' => '🧈',
        'accent_color' => '#FFFDE7',
        'utensils' => ['Heavy bottom Kadai or Uruli', 'Small saucepan for keeping ghee hot', 'Square greased tray or tin', 'Flat wooden spatula'],
        'ingredients' => [
            ['name' => 'Besan (Gram Flour)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Fine quality, sifted twice without lumps'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Warm, melted'],
            ['name' => 'Sugar', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Standard white granulated'],
            ['name' => 'Clean Water', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'For sugar syrup'],
            ['name' => 'Cardamom Powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Optional aroma']
        ],
        'steps' => [
            'Sift besan twice into a bowl. Whisk 1/2 cup of warm melted ghee into the besan until it forms a smooth, lump-free liquid paste. Set aside.',
            'Grease a square stainless steel tray with ghee and keep ready.',
            'In a small saucepan on a side burner, keep the remaining 1 cup of ghee warm on the lowest flame.',
            'In a heavy kadai, combine sugar and 1/2 cup water. Bring to a boil on medium flame, stirring until sugar dissolves.',
            'Cook syrup until it reaches "One-String Consistency" (Ek Taar / Okka Theega, ~110°C). When tested between thumb and forefinger, a single continuous thread forms without snapping.',
            'Lower the flame to absolute minimum. Slowly pour the besan-ghee paste into the boiling syrup while stirring continuously with a spatula.',
            'Cook on low-medium flame, stirring non-stop to prevent sticking to the bottom.',
            'Begin adding the hot ghee from the side saucepan, 2 tablespoons at a time. The mixture will froth and absorb the hot ghee eagerly.',
            'Continue stirring and adding hot ghee until all ghee is incorporated. The mixture turns porous, honeycombed, and starts leaving the sides of the pan cleanly.',
            'Immediately pour the frothy hot mixture into the greased tray without pressing or smoothing down (smoothing destroys the airy pores).',
            'Let set for 15-20 minutes until warm. Slice into diamond or rectangular bars with a sharp greased knife. Let cool completely before separating.'
        ],
        'tips' => [
            'The ghee added in batches MUST be hot; cold ghee drops the cooking temperature and makes Mysore Pak dense and rubbery.',
            'Do not press the top of Mysore Pak with a bowl; gentle settling creates the coveted honeycomb texture.'
        ],
        'substitutions' => ['Half ghee and half refined oil can be used for everyday home consumption, though pure ghee offers unmatched royal taste.'],
        'storage' => 'Stores in an airtight container at room temperature for up to 3 weeks.',
        'related_lessons' => ['adv-sugar-syrup-science', 'beg-flame-control']
    ],

    // 63. Rasmalai
    [
        'id' => 'rasmalai',
        'name' => 'Royal Saffron Rasmalai',
        'regional_name' => 'రసమలై (Rasmalai)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 30,
        'cook_time' => 35,
        'servings' => 6,
        'difficulty' => 'Hard',
        'description' => 'Spongy, delicate cottage cheese (chenna) discs soaked in fragrant, creamy, saffron-cardamom flavored thickened milk (rabdi) topped with pistachios and almonds.',
        'icon' => '🥛',
        'accent_color' => '#FFF9C4',
        'utensils' => ['Heavy milk saucepan', 'Wide pot for sugar boiling', 'Cheesecloth / Muslin cloth', 'Tongs or slotted spoon'],
        'ingredients' => [
            ['name' => 'Cow Milk (Full Cream)', 'quantity' => 1, 'unit' => 'litre', 'notes' => 'For fresh soft chenna discs'],
            ['name' => 'Full Fat Milk (For Rabdi)', 'quantity' => 1, 'unit' => 'litre', 'notes' => 'For thickened saffron milk'],
            ['name' => 'Lemon Juice or Vinegar', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Diluted in 2 tbsp water to curdle milk'],
            ['name' => 'Sugar (For Rabdi)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Adjust sweetness'],
            ['name' => 'Sugar (For Cooking Chenna Discs)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'In 4 cups water'],
            ['name' => 'Saffron Strands (Kesar)', 'quantity' => 15, 'unit' => 'strands', 'notes' => 'Soaked in 2 tbsp warm milk'],
            ['name' => 'Cardamom Powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Freshly pounded'],
            ['name' => 'Pistachios & Almonds', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Finely slivered']
        ],
        'steps' => [
            'Prepare Rabdi: Boil 1 litre milk in a wide saucepan on medium flame. Simmer and reduce to half volume (approx 500ml), stirring frequently. Add 1/2 cup sugar, cardamom powder, and soaked saffron milk. Remove from heat and chill in the fridge.',
            'Make Chenna: Boil 1 litre cow milk. Turn off heat, rest 2 minutes. Gradually add diluted lemon juice, stirring gently until greenish whey separates completely.',
            'Strain curdled chenna immediately through a muslin cloth. Rinse with cold running water to remove sour lemon taste. Squeeze excess water gently and hang for 30 minutes.',
            'Knead Chenna: Place drained chenna on a wide plate. Knead with the heel of your palm for 6-8 minutes until it becomes smooth, soft, and non-sticky. Divide into 10 small balls and flatten gently into discs (do not crack).',
            'Cook Discs: In a wide saucepan, boil 1 cup sugar and 4 cups water. Slide flattened chenna discs into the rolling boiling syrup. Cover with lid and boil on high heat for 10-12 minutes. Discs will double in size and become spongy.',
            'Take discs out and drop into a bowl of warm drinking water for 5 minutes. Gently press between palms to squeeze out excess syrup without breaking.',
            'Transfer squeezed discs directly into the chilled saffron rabdi.',
            'Garnish with slivered pistachios and almonds. Chill in refrigerator for at least 3 hours before serving so discs soak in creamy rabdi.'
        ],
        'tips' => [
            'Use pure cow milk for chenna; buffalo milk has excess fat that makes chenna discs rubbery and hard.',
            'Never over-boil or over-reduce rabdi; thick rabdi cannot penetrate into the porous chenna sponge.'
        ],
        'substitutions' => ['Store-bought rasgullas can be squeezed and soaked in homemade saffron rabdi for a quick shortcut.'],
        'storage' => 'Keep refrigerated at all times. Consumed within 3 days for peak freshness.',
        'related_lessons' => ['adv-sugar-syrup-science', 'beg-measurements']
    ],

    // 64. Traditional Ariselu
    [
        'id' => 'ariselu',
        'name' => 'Traditional Andhra Ariselu / Adhirasam',
        'regional_name' => 'అరిసెలు (Ariselu / Nethi Ariselu)',
        'category' => 'Festival Special Recipes',
        'cuisine' => 'Andhra Specialities',
        'type' => 'Vegetarian',
        'prep_time' => 60,
        'cook_time' => 30,
        'servings' => 10,
        'difficulty' => 'Hard',
        'description' => 'Auspicious Sankranti festival delicacy made from freshly pounded moist rice flour and golden jaggery syrup (Pakam), fried in pure desi ghee to golden, chewy perfection, sprinkled with toasted sesame.',
        'icon' => '🪔',
        'accent_color' => '#FFF8E1',
        'utensils' => ['Wet rice flour sieve', 'Heavy jaggery pot', 'Deep frying kadai', 'Ariselu wooden press (Arisela chekka)'],
        'ingredients' => [
            ['name' => 'Raw Rice (Biyyam)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Soaked 24 hrs, drained and ground wet into damp flour'],
            ['name' => 'Organic Jaggery (Bellam)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Crushed dark jaggery'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'For authentic deep frying'],
            ['name' => 'White Sesame Seeds (Nuvvulu)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For coating'],
            ['name' => 'Cardamom Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Aromatic fragrance']
        ],
        'steps' => [
            'Rice Prep: Soak raw rice in water for 24 hours (change water twice). Drain on a cotton cloth for 20 minutes until moist (not dry). Grind in a mixer to a fine flour and sieve immediately. Keep the damp flour covered with a moist cloth so it stays hydrated.',
            'Jaggery Syrup: In a heavy pan, melt crushed jaggery with 1/2 cup water. Strain to remove impurities.',
            'Boil jaggery syrup on medium flame until it reaches "Soft Ball Consistency" (Unda Pakam). Test by dropping syrup into cold water: it should form a soft, pliable, non-sticky round ball.',
            'Lower flame completely. Add cardamom powder. Gradually add the moist rice flour in small batches, stirring vigorously with a wooden ladle to prevent lumps until a soft dough forms. Add 2 tbsp warm ghee; turn off flame.',
            'Let dough cool slightly until warm to touch. Divide into small lemon-sized balls.',
            'Grease a plastic sheet with ghee. Place a ball, sprinkle sesame seeds, and gently flatten into a 3-inch round disc.',
            'Heat ghee in a kadai on medium heat. Gently slide the disc into hot ghee. It will puff up to the surface in seconds.',
            'Flip and fry for 30-40 seconds until golden brown (do not over-fry or it turns brittle).',
            'Remove immediately using a slotted spoon, place between the traditional wooden ariselu press (or flat bottoms of two ladles), and press firmly to expel excess ghee.',
            'Cool on parchment paper; texture turns delightfully chewy on the outside and soft inside.'
        ],
        'tips' => [
            'The moisture in the freshly milled rice flour (Tadi Pindi) is mandatory; store-bought dry rice flour will ruin Ariselu texture.',
            'Pressing hot ariselu immediately after frying expels excess ghee and keeps them from becoming greasy.'
        ],
        'substitutions' => ['Refined cooking oil can be used instead of ghee, though festival tradition honors Nethi Ariselu (ghee).'],
        'storage' => 'Stores at room temperature in a clean brass or steel tin for up to 3 weeks.',
        'related_lessons' => ['adv-sugar-syrup-science', 'beg-flavor-balancing']
    ],

    // 65. Bobbatlu / Puran Poli
    [
        'id' => 'bobbatlu',
        'name' => 'Traditional Andhra Bobbatlu (Puran Poli)',
        'regional_name' => 'బొబ్బట్లు / పోలెలు (Bobbatlu)',
        'category' => 'Festival Special Recipes',
        'cuisine' => 'Andhra Specialities',
        'type' => 'Vegetarian',
        'prep_time' => 30,
        'cook_time' => 30,
        'servings' => 8,
        'difficulty' => 'Medium',
        'description' => 'Golden paper-thin flatbread stuffed with a sweet, aromatic filling of boiled chana dal, jaggery, cardamom, and nutmeg, roasted with abundant pure desi ghee.',
        'icon' => '🥞',
        'accent_color' => '#FFFDE7',
        'utensils' => ['Pressure cooker', 'Tawa', 'Rolling pin or banana leaf / parchment paper'],
        'ingredients' => [
            ['name' => 'Chana Dal (Bengal Gram)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed and cooked soft'],
            ['name' => 'Jaggery (Bellam)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Grated dark jaggery'],
            ['name' => 'All-Purpose Flour (Maida) or Fine Atta', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'For outer elastic dough'],
            ['name' => 'Turmeric Powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'For golden color'],
            ['name' => 'Cardamom & Nutmeg Powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Warm festive aromatics'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'For dough soaking and tawa roasting']
        ],
        'steps' => [
            'Prepare Dough: In a bowl, knead maida, pinch salt, turmeric, and water into a very soft, loose, pliable dough. Pour 3 tablespoons of ghee or oil over the dough, cover, and let it soak and rest for at least 1 hour (this develops elasticity).',
            'Prepare Purnam (Stuffing): Pressure cook chana dal with 2 cups water for 3-4 whistles until soft but not mushy. Drain water completely.',
            'In a pan, cook the boiled dal and grated jaggery together on medium flame until jaggery melts, thickens, and clumps into a ball. Add cardamom and nutmeg powder.',
            'Let cool, then grind in a mixer or mash smoothly with a gutti. Divide into round stuffing balls (Purnam).',
            'Assemble: Grease a sheet of parchment paper or banana leaf with ghee. Take a lemon-sized piece of dough, flatten on your palm, place a larger ball of purnam in the center, and gather edges to seal completely.',
            'Flatten the stuffed ball gently with ghee-greased fingertips or rolling pin into a thin, even 7-inch disc.',
            'Heat a tawa on medium flame. Flip the bobbatlu onto the tawa, peeling off the parchment paper.',
            'Cook with generous ghee on both sides until golden brown spots appear and flatbread puffs gently.',
            'Serve warm with a pool of hot melted ghee on top.'
        ],
        'tips' => [
            'The outer dough must be softer than chapati dough; soaking in oil/ghee relaxes gluten so it stretches paper-thin without breaking.',
            'The purnam filling ball should be slightly larger than the dough ball for the most generous, decadent sweet bite.'
        ],
        'substitutions' => ['Half whole wheat atta and half maida can be used for a slightly healthier outer wrapper.'],
        'storage' => 'Keeps well at room temperature for 3 to 4 days in an airtight container.',
        'related_lessons' => ['int-dough-science', 'adv-sugar-syrup-science']
    ],

    // 66. Restaurant Paneer Tikka
    [
        'id' => 'restaurant-paneer-tikka',
        'name' => 'Tandoori Paneer Tikka (Stovetop Dhungar)',
        'regional_name' => 'పన్నీర్ టిక్కా (Paneer Tikka)',
        'category' => 'Evening Snacks',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 30,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Char-grilled cubes of fresh paneer, crisp capsicum, and onions marinated in hung curd, mustard oil, roasted besan, and tandoori spices, smoked with natural charcoal Dhungar.',
        'icon' => '🍢',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Cast iron grill pan or tawa', 'Wooden skewers (soaked)', 'Natural charcoal piece & tongs'],
        'ingredients' => [
            ['name' => 'Fresh Firm Paneer', 'quantity' => 300, 'unit' => 'grams', 'notes' => 'Cut into 1.5-inch thick square cubes'],
            ['name' => 'Capsicum & Onions', 'quantity' => 1, 'unit' => 'each', 'notes' => 'Cut into 1.5-inch squares'],
            ['name' => 'Thick Hung Curd (Greek Yogurt)', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Whey drained completely'],
            ['name' => 'Roasted Gram Flour (Besan)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Binds marinade to paneer'],
            ['name' => 'Cold-Pressed Mustard Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Whisked with chilli for color'],
            ['name' => 'Kashmiri Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Vibrant natural red hue'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Kasuri Methi & Chaat Masala', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Each, for authentic dhaba aroma'],
            ['name' => 'Lemon Juice', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Tangy balance']
        ],
        'steps' => [
            'In a bowl, whisk mustard oil and Kashmiri chilli powder vigorously for 30 seconds; this blooms a brilliant natural crimson red color without artificial dyes.',
            'Add thick hung curd, roasted besan, ginger-garlic paste, kasuri methi, garam masala, chaat masala, lemon juice, and salt. Whisk into a thick clinging marinade.',
            'Add paneer cubes, capsicum, and onion squares. Gently toss so every piece is generously coated. Marinate for at least 30 minutes in the fridge.',
            'Thread paneer, capsicum, and onions alternately onto soaked wooden skewers.',
            'Heat a cast iron grill pan on medium-high heat with 1 tablespoon of butter or oil.',
            'Place skewers and grill for 3-4 minutes per side until charred brown blister marks appear on all sides.',
            'Hold skewers directly over the open blue gas flame for 20 seconds to achieve authentic rustic leopard-spot charring.',
            'Dhungar Smoke (Optional): Place tikkas in a closed pot with a red-hot charcoal piece in a small steel cup; drizzle 1/2 tsp ghee over the coal and seal with lid for 5 minutes.',
            'Sprinkle generous chaat masala and lemon juice; serve hot with mint-coriander chutney and onion rings.'
        ],
        'tips' => [
            'Do not use runny regular yogurt; watery marinade slides off in the pan instead of adhering as a crisp crust.',
            'Roasting besan in a dry pan before adding to marinade eliminates raw flour taste and binds spices securely to paneer.'
        ],
        'substitutions' => ['Firm tofu or boiled baby potatoes can replace paneer.'],
        'storage' => 'Best served sizzling hot immediately from the grill pan.',
        'related_lessons' => ['rest-tandoor-at-home', 'beg-flame-control']
    ],

    // 67. Chicken Tikka
    [
        'id' => 'chicken-tikka',
        'name' => 'Restaurant Style Chicken Tikka',
        'regional_name' => 'చికెన్ టిక్కా (Chicken Tikka)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Non-Vegetarian',
        'prep_time' => 30,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Juicy boneless chicken breast/thigh chunks steeped in a two-stage tandoori yogurt marinade, pan-seared to smoky, blistered perfection.',
        'icon' => '🍗',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Heavy cast iron grill tawa', 'Wooden skewers', 'Charcoal cup for Dhungar'],
        'ingredients' => [
            ['name' => 'Boneless Chicken (Thigh or Breast)', 'quantity' => 500, 'unit' => 'grams', 'notes' => 'Cut into 1.5-inch cubes'],
            ['name' => 'Thick Hung Curd', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Drained completely'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Fresh'],
            ['name' => 'Cold-Pressed Mustard Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For smoky pungency'],
            ['name' => 'Kashmiri Red Chilli Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Rich color'],
            ['name' => 'Roasted Besan', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Binds marinade'],
            ['name' => 'Chaat Masala, Kasuri Methi, Garam Masala', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Each'],
            ['name' => 'Lemon Juice & Butter', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Basting']
        ],
        'steps' => [
            'First Marinade: Rub chicken cubes with 1 tbsp lemon juice, 1 tsp chilli powder, 1 tsp ginger-garlic paste, and 1/2 tsp salt. Rest 20 minutes (allows acid to penetrate and tenderize meat).',
            'Second Marinade: In a bowl, whisk hot mustard oil with Kashmiri chilli powder, hung curd, roasted besan, kasuri methi, garam masala, and chaat masala.',
            'Add marinated chicken into the yogurt marinade; coat evenly and refrigerate for at least 1 hour.',
            'Thread chicken pieces onto skewers.',
            'Heat cast iron grill pan on medium-high heat with 1 tbsp butter. Cook skewers for 10-12 minutes, turning every 3 minutes, basting with melted butter until cooked through and lightly charred.',
            'Flash char over open gas burner for 20 seconds for authentic tandoor smokiness.',
            'Sprinkle chaat masala, lemon juice, and serve with sliced onion rings and spicy green chutney.'
        ],
        'tips' => [
            'Chicken thigh meat remains much juicier and more forgiving than chicken breast under high grill heat.',
            'Basting with melted butter while grilling prevents lean meat from drying out.'
        ],
        'substitutions' => ['Can be used directly as the protein foundation for Chicken Tikka Masala curry.'],
        'storage' => 'Cooked tikkas can be stored in an airtight container in the fridge for up to 3 days.',
        'related_lessons' => ['rest-tandoor-at-home', 'adv-maillard-meat']
    ],

    // 68. Homemade Pizza Base & Margherita
    [
        'id' => 'homemade-pizza-base',
        'name' => 'Homemade Artisanal Pizza Margherita',
        'regional_name' => 'హోమ్‌మేడ్ పిజ్జా (Homemade Pizza)',
        'category' => 'Quick Meals',
        'cuisine' => 'Italian / World',
        'type' => 'Vegetarian',
        'prep_time' => 30,
        'cook_time' => 15,
        'servings' => 3,
        'difficulty' => 'Medium',
        'description' => 'Crisp on the outside, chewy on the inside homemade yeast-fermented pizza dough topped with crushed tomato-herb sauce, melted mozzarella, and fresh basil.',
        'icon' => '🍕',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Baking sheet or cast iron pan', 'Oven preheated to maximum (220-240°C)', 'Rolling pin or hands'],
        'ingredients' => [
            ['name' => 'All-Purpose Flour (Maida) or Bread Flour', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'High protein'],
            ['name' => 'Active Dry Yeast', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Fresh batch'],
            ['name' => 'Warm Water (approx 38°C)', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Lukewarm to activate yeast'],
            ['name' => 'Sugar & Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Each'],
            ['name' => 'Extra Virgin Olive Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For dough and crust'],
            ['name' => 'Crushed Canned or Desi Tomatoes', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Simmered with garlic and oregano'],
            ['name' => 'Mozzarella Cheese', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Grated'],
            ['name' => 'Fresh Basil Leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fragrant finishing']
        ],
        'steps' => [
            'Activate Yeast: In a bowl, combine warm water, sugar, and yeast. Let stand for 5-7 minutes until frothy and bubbly (if it doesn’t froth, yeast is expired; discard and start over).',
            'In a wide bowl, mix flour and salt. Add activated yeast water and 1 tbsp olive oil. Knead for 8-10 minutes until smooth and elastic (passes the windowpane test).',
            'Grease a bowl with olive oil, place dough ball, cover with a damp cloth, and let rise in a warm spot for 1 hour until doubled in size.',
            'Punch dough down gently. Divide into 2 balls for two 10-inch pizzas.',
            'Stretch dough gently with fingers on parchment paper, pushing air from center toward outer crust rim to form a raised edge (cornicione).',
            'Spread 3 tablespoons of seasoned tomato sauce, leaving 1/2 inch border.',
            'Scatter grated mozzarella cheese evenly.',
            'Stovetop + Oven Technique: If using an oven, bake on preheated tray at 230°C for 10-12 minutes until crust is golden and cheese blisters. (Or sear bottom on a smoking hot cast iron tawa for 2 minutes, then broil under oven top element for 4 minutes).',
            'Scatter fresh basil leaves and a drizzle of olive oil before slicing.'
        ],
        'tips' => [
            'Never use boiling hot water to activate yeast; anything above 45°C kills the living yeast organism.',
            'High oven temperature is the secret to a blistered, non-soggy pizza crust.'
        ],
        'substitutions' => ['Top with sliced onions, capsicum, sweet corn, or paneer cubes for Indian fusion pizza.'],
        'storage' => 'Unbaked dough balls can be refrigerated in oiled bags for up to 3 days (slow fermentation improves flavor).',
        'related_lessons' => ['adv-yeast-baking', 'beg-measurements']
    ],

    // 69. Artisanal Bread Loaf
    [
        'id' => 'artisanal-bread-loaf',
        'name' => 'Rustic Crusty Artisanal Bread Loaf',
        'regional_name' => 'ఆర్టిసానల్ బ్రెడ్ (Artisan Bread)',
        'category' => 'Quick Meals',
        'cuisine' => 'International',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 35,
        'servings' => 6,
        'difficulty' => 'Hard',
        'description' => 'Crispy, crackling golden-brown crust with a light, open, airy crumb structure. Simple 4-ingredient European-style hearth bread baked in a home oven or Dutch oven.',
        'icon' => '🍞',
        'accent_color' => '#FFF8E1',
        'utensils' => ['Cast iron Dutch oven or heavy ovenproof pot with lid', 'Parchment paper', 'Razor blade (lame) for scoring'],
        'ingredients' => [
            ['name' => 'All-Purpose Flour or Bread Flour', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Unbleached (~380g)'],
            ['name' => 'Instant or Active Dry Yeast', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Standard yeast'],
            ['name' => 'Sea Salt', 'quantity' => 1.5, 'unit' => 'teaspoons', 'notes' => 'Flavor and gluten tightening'],
            ['name' => 'Lukewarm Water', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Approx 70% hydration']
        ],
        'steps' => [
            'In a large bowl, whisk flour, salt, and yeast together.',
            'Add lukewarm water. Stir with a wooden spoon or spatula for 1 minute until a shaggy, wet, sticky dough forms (no dry flour remaining).',
            'Cover bowl tightly with plastic wrap and let it ferment at room temperature for 12 to 18 hours (overnight). The dough will expand, become bubbly, and develop rich fermented aromas.',
            'Scrape dough onto a well-floured surface. Fold edges into the center 3-4 times to form a round ball (boule). Place seam-side down on parchment paper, cover with a towel, and rest 45 minutes.',
            'Preheat oven with your cast iron Dutch oven (and lid) inside at 230°C (450°F) for 30 minutes until blazing hot.',
            'Score the top of the bread dough with a sharp razor blade (1/2-inch deep slash to guide expansion).',
            'Carefully remove hot Dutch oven, lift dough using parchment corners, and lower inside. Cover with the lid immediately.',
            'Bake at 230°C covered for 25 minutes (trapped steam keeps crust soft, allowing maximum oven spring).',
            'Remove the lid and bake uncovered for 10-12 minutes until the crust turns deep golden brown and crackles.',
            'Transfer to a wire rack. Let cool completely for at least 1 hour before slicing (cutting hot bread collapses the crumb).'
        ],
        'tips' => [
            'The closed Dutch oven mimics commercial steam-injected bakery ovens, giving that blistered, shatteringly crisp crust.',
            'Patience in cooling: Cutting into hot bread lets trapped steam escape abruptly, turning the interior gummy.'
        ],
        'substitutions' => ['Substitute 1 cup of flour with whole wheat atta for an earthy rustic loaf.'],
        'storage' => 'Keep cut loaf cut-side down on a wooden cutting board for 2 days, or slice and freeze for 1 month.',
        'related_lessons' => ['adv-yeast-baking', 'int-dough-science']
    ],

    // 70. Rich Chocolate Brownies
    [
        'id' => 'chocolate-brownies',
        'name' => 'Fudgy Dark Chocolate Brownies',
        'regional_name' => 'చాక్లెట్ బ్రౌనీస్ (Chocolate Brownies)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'International',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 25,
        'servings' => 9,
        'difficulty' => 'Medium',
        'description' => 'Ultra-fudgy, decadent dark chocolate brownies with a signature shiny crackly tissue-paper top, rich cocoa center, and toasted walnuts.',
        'icon' => '🍫',
        'accent_color' => '#EFEBE9',
        'utensils' => ['8x8 inch square baking tin', 'Parchment paper', 'Heatproof glass bowl for double boiler', 'Whisk'],
        'ingredients' => [
            ['name' => 'Dark Chocolate (55% or 70% Cocoa)', 'quantity' => 150, 'unit' => 'grams', 'notes' => 'Coarsely chopped'],
            ['name' => 'Unsalted Butter', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => '1 stick (~115g)'],
            ['name' => 'Granulated Sugar', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Whisked for shiny crust'],
            ['name' => 'All-Purpose Flour (Maida)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Minimal flour for fudgy texture'],
            ['name' => 'Unsweetened Cocoa Powder', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Dutch processed or natural'],
            ['name' => 'Condensed Milk or Yogurt (Eggless binder)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'For rich fudgy moisture'],
            ['name' => 'Vanilla Extract & Pinch Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Enhances chocolate depth'],
            ['name' => 'Walnuts or Chocolate Chunks', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Toasted and chopped']
        ],
        'steps' => [
            'Preheat oven to 175°C (350°F). Grease an 8x8 inch tin and line with parchment paper with overhang on two sides for easy lifting.',
            'Melt chopped dark chocolate and butter together in a heatproof bowl set over a saucepan of gently simmering water (double boiler), stirring until silky smooth. Remove from heat.',
            'Whisk sugar and condensed milk (or whisked eggs if non-veg) into the warm chocolate mixture for 2 full minutes until glossy and slightly pale (this dissolve process creates the shiny crackly top).',
            'Stir in vanilla extract and a pinch of salt.',
            'Sift in flour and cocoa powder. Gently fold with a spatula just until dry flour disappears (do NOT overmix or brownies turn cakey).',
            'Fold in half the chopped toasted walnuts and chocolate chunks.',
            'Spread batter evenly into the prepared tin. Scatter remaining walnuts on top.',
            'Bake at 175°C for 22 to 25 minutes. A toothpick inserted in center should come out with moist fudgy crumbs, not wet raw batter and not completely dry.',
            'Let cool completely in the tin on a wire rack for 1 hour before using parchment handles to lift and slice into 9 neat squares.'
        ],
        'tips' => [
            'Never overbake brownies; they finish setting from residual heat as they cool in the tin.',
            'Chilling sliced brownies in the fridge for 30 minutes gives clean, sharp, professional bakery slice edges.'
        ],
        'substitutions' => ['Serve warm with a scoop of vanilla bean ice cream and hot chocolate fudge sauce.'],
        'storage' => 'Stores in an airtight container for 4 days at room temperature, or 1 week refrigerated.',
        'related_lessons' => ['adv-yeast-baking', 'beg-measurements']
    ],

    // 71. Classic Tomato Basil Pasta
    [
        'id' => 'classic-tomato-basil-pasta',
        'name' => 'Classic Italian Tomato Basil Pasta (Penne all\'Arrabbiata)',
        'regional_name' => 'పాస్తా (Tomato Basil Pasta)',
        'category' => 'Quick Meals',
        'cuisine' => 'Italian / World',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 3,
        'difficulty' => 'Easy',
        'description' => 'Al dente Penne pasta tossed in a fiery, garlicky Italian tomato sauce infused with extra virgin olive oil, crushed red pepper flakes, fresh sweet basil, and parmesan.',
        'icon' => '🍝',
        'accent_color' => '#FFEBEE',
        'utensils' => ['Deep pasta boiling pot', 'Colander', 'Wide saute skillet'],
        'ingredients' => [
            ['name' => 'Penne or Rigatoni Pasta', 'quantity' => 250, 'unit' => 'grams', 'notes' => '100% durum wheat semolina'],
            ['name' => 'Ripe Tomatoes or Italian Peeled Tomatoes', 'quantity' => 4, 'unit' => 'large', 'notes' => 'Blanched and crushed or pureed (~400g)'],
            ['name' => 'Garlic Cloves', 'quantity' => 5, 'unit' => '', 'notes' => 'Thinly sliced'],
            ['name' => 'Extra Virgin Olive Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Good quality cold pressed'],
            ['name' => 'Red Chilli Flakes', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For spicy Arrabbiata kick'],
            ['name' => 'Fresh Sweet Basil Leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Torn by hand'],
            ['name' => 'Reserved Starchy Pasta Cooking Water', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Liquid gold to emulsify sauce'],
            ['name' => 'Parmesan Cheese or Processed Cheese', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Freshly grated']
        ],
        'steps' => [
            'Boil 8 cups of water with 1 tablespoon of salt in a large stockpot until rolling boil. Add penne pasta and cook for 9-10 minutes until "al dente" (firm to the bite).',
            'Scoop out and reserve 1/2 cup of the cloudy starchy pasta water before draining pasta in a colander (do not rinse with tap water!).',
            'In a wide skillet, heat extra virgin olive oil over medium flame. Add sliced garlic and red chilli flakes; sizzle for 45 seconds until garlic turns pale golden (do not burn).',
            'Add crushed tomatoes and 1/2 tsp salt. Simmer on medium-low flame for 8-10 minutes until tomatoes reduce, sweeten, and sauce thickens.',
            'Pour in 3-4 tablespoons of the reserved starchy pasta water into the sauce; swirl vigorously to create a glossy emulsion.',
            'Add the hot drained penne directly into the sauce. Toss continuously on medium heat for 1 minute so pasta absorbs sauce into its ridges.',
            'Turn off flame. Stir in hand-torn fresh basil leaves and a drizzle of raw olive oil.',
            'Plate immediately, finish with freshly grated cheese and black pepper.'
        ],
        'tips' => [
            'Never rinse cooked pasta with water; the surface starch is essential for sauce to cling rather than slide off to the bottom of the plate.',
            'Starchy pasta water + olive oil = the culinary secret to silky restaurant pasta sauce without needing cornflour or thickeners.'
        ],
        'substitutions' => ['Sautéed mushrooms, olives, or grilled chicken can be tossed in for variation.'],
        'storage' => 'Best enjoyed immediately. Reheat with 2 tablespoons of water over low stove flame.',
        'related_lessons' => ['int-rice-perfection', 'beg-flame-control']
    ],

    // 72. Chicken Tikka Masala
    [
        'id' => 'chicken-tikka-masala',
        'name' => 'Restaurant Style Chicken Tikka Masala',
        'regional_name' => 'చికెన్ టిక్కా మసాలా (Chicken Tikka Masala)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Non-Vegetarian',
        'prep_time' => 25,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Char-grilled tandoori chicken tikka chunks simmered in a luscious, mildly spiced, creamy tomato-onion gravy scented with crushed kasuri methi and butter.',
        'icon' => '🥘',
        'accent_color' => '#FFF3E0',
        'utensils' => ['Grill pan for chicken', 'Wide kadai', 'Blender'],
        'ingredients' => [
            ['name' => 'Boneless Chicken Tikka (pre-grilled)', 'quantity' => 400, 'unit' => 'grams', 'notes' => 'Cubed, lightly charred'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Tomatoes', 'quantity' => 4, 'unit' => 'ripe', 'notes' => 'Pureed smooth'],
            ['name' => 'Cashew Paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => '10 cashews blended with water'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Freshly ground'],
            ['name' => 'Kashmiri Chilli & Coriander Powder', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Each'],
            ['name' => 'Kasuri Methi', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Crushed'],
            ['name' => 'Fresh Cream & Butter', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Each, for royal finish']
        ],
        'steps' => [
            'Prepare Chicken Tikka: Toss chicken in hung curd, lemon, and tandoori spices; pan-grill for 8-10 minutes until charred; set aside.',
            'In a kadai, heat 1.5 tbsp butter and 1 tbsp oil. Add finely chopped onions and sauté until golden amber (7 minutes).',
            'Add ginger-garlic paste; cook 1 minute until fragrant.',
            'Add tomato puree, Kashmiri chilli powder, coriander powder, cumin powder, and salt. Cook on medium heat until oil separates along the pan edges.',
            'Stir in cashew paste and 1/2 cup warm water. Simmer for 3 minutes into a velvety, creamy gravy.',
            'Slide in the grilled chicken tikka chunks (along with any resting pan juices). Simmer gently on low flame for 4 minutes so chicken absorbs gravy flavor.',
            'Finish with crushed kasuri methi, a splash of fresh cream, and garam masala.',
            'Serve piping hot with garlic butter naan, tandoori rotis, or jeera rice.'
        ],
        'tips' => [
            'Pre-grilling the chicken to get char marks before simmering gives the signature tandoor flavor that boiling chicken in curry never replicates.',
            'Cashew paste emulsifies the tomato acid, creating that luxurious velvet restaurant mouthfeel.'
        ],
        'substitutions' => ['Paneer cubes can replace chicken for Paneer Tikka Masala.'],
        'storage' => 'Stores in refrigerator for up to 3 days. Reheat gently on low heat.'
    ],

    // 73. Andhra Chicken 65
    [
        'id' => 'andhra-chicken-65',
        'name' => 'Crispy Andhra Restaurant Chicken 65',
        'regional_name' => 'చికెన్ 65 (Andhra Chicken 65)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Andhra Specialities',
        'type' => 'Non-Vegetarian',
        'prep_time' => 20,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Iconic spicy, tangy starter: crispy bite-sized battered chicken pieces deep-fried to perfection, then flash-tempered in a sizzling wok with garlic, green chillies, curry leaves, and curd.',
        'icon' => '🍗',
        'accent_color' => '#FFEBEE',
        'utensils' => ['Deep frying kadai', 'Wok for tempering', 'Perforated skimmer'],
        'ingredients' => [
            ['name' => 'Boneless Chicken', 'quantity' => 400, 'unit' => 'grams', 'notes' => 'Cut into bite-sized 1-inch pieces'],
            ['name' => 'Cornflour & Rice Flour', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Each, for extra crispness'],
            ['name' => 'Egg', 'quantity' => 1, 'unit' => '', 'notes' => 'Beaten (binds coating)'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Guntur Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Vibrant red color and heat'],
            ['name' => 'Curd (Yogurt)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For tempering sauce'],
            ['name' => 'Curry Leaves', 'quantity' => 3, 'unit' => 'sprigs', 'notes' => 'Crisp aromatics'],
            ['name' => 'Green Chillies & Garlic', 'quantity' => 4, 'unit' => 'each', 'notes' => 'Slit chillies and chopped garlic'],
            ['name' => 'Oil for Deep Frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Clean frying medium']
        ],
        'steps' => [
            'Marinate chicken with egg, cornflour, rice flour, ginger-garlic paste, 1 tbsp chilli powder, pepper, and salt for 20 minutes.',
            'Heat oil in a kadai to 175°C. Drop chicken pieces one by one into hot oil.',
            'Deep fry on medium-high heat for 5-6 minutes until deep golden, crisp, and cooked through. Drain on paper towels.',
            'Tempering (The Andhra Hotel Finish): In a separate wok, heat 1.5 tablespoons of oil on high flame.',
            'Add chopped garlic, slit green chillies, and fresh curry leaves; toss vigorously for 30 seconds until garlic is fragrant and leaves crackle.',
            'Whisk curd with 1/2 tsp red chilli powder and a pinch of salt; pour into the sizzling wok and toss rapidly until curd bubbles and reduces into a glaze.',
            'Add the crispy fried chicken pieces and toss vigorously for 45 seconds on high flame until each piece is coated in the spicy garlic-curd glaze.',
            'Serve immediately while piping hot and crispy with onion rings and lemon wedges.'
        ],
        'tips' => [
            'Rice flour combined with cornflour gives a crispier, longer-lasting crust than cornflour alone.',
            'Toss chicken in the tempering wok right before serving; do not let it sit or it loses its crisp bite.'
        ],
        'substitutions' => ['Cauliflower (Gobi 65) or Paneer (Paneer 65) can be made using the identical batter and tempering.'],
        'storage' => 'Best enjoyed immediately hot from the wok.'
    ],

    // 74. Chicken Lollipop
    [
        'id' => 'chicken-lollipop',
        'name' => 'Crispy Indo-Chinese Chicken Lollipop',
        'regional_name' => 'చికెన్ లాలీపాప్ (Chicken Lollipop)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Indo-Chinese',
        'type' => 'Non-Vegetarian',
        'prep_time' => 25,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Frenched chicken winglets shaped into meat lollipops, coated in a spicy red Indo-Chinese batter, deep-fried to a glass-shattering crisp crust, served with fiery Schezwan dipping sauce.',
        'icon' => '🍗',
        'accent_color' => '#FFEBEE',
        'utensils' => ['Deep frying kadai', 'Skimmer', 'Kitchen foil for bone wrapping'],
        'ingredients' => [
            ['name' => 'Chicken Wings (Frenched into Lollipops)', 'quantity' => 8, 'unit' => 'pieces', 'notes' => 'Meat pushed down to bone base'],
            ['name' => 'Cornflour', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Crisp shell'],
            ['name' => 'All-Purpose Flour (Maida)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Structure'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Pungent aroma'],
            ['name' => 'Soy Sauce & Red Chilli Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Each, for deep marinade flavor'],
            ['name' => 'Crushed Black Pepper & Salt', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Seasoning'],
            ['name' => 'Oil for Deep Frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'High heat']
        ],
        'steps' => [
            'Marinate frenched chicken lollipops with ginger-garlic paste, soy sauce, chilli paste, pepper, and salt for 20 minutes.',
            'In a bowl, mix cornflour, maida, 1 beaten egg (or 3 tbsp cold water), and salt to make a thick, glossy dipping batter.',
            'Hold the exposed bone and dip the meat bulb into the batter, coating it generously.',
            'Heat oil in a kadai to 170°C. Lower lollipops carefully into hot oil.',
            'Deep fry on medium flame for 7 to 8 minutes until the outer crust turns deep reddish-golden and chicken is cooked to the bone.',
            'Remove and drain on paper towels.',
            'Wrap the clean exposed bone tips with small pieces of aluminum foil for clean finger handling.',
            'Serve sizzling hot with spicy homemade Schezwan sauce or sweet chilli sauce.'
        ],
        'tips' => [
            'Do not fry on scorching high flame or the exterior batter browns before the meat near the bone cooks through.',
            'Wrapping bone tips in foil makes dining mess-free and gives restaurant presentation.'
        ],
        'substitutions' => ['Can be tossed in sweet and spicy Schezwan gravy for "Chicken Lollipop Gravy".'],
        'storage' => 'Best served fresh from the fryer.'
    ],

    // 75. Crispy Gobi Manchurian
    [
        'id' => 'crispy-gobi-manchurian',
        'name' => 'Street Style Crispy Gobi Manchurian',
        'regional_name' => 'గోబీ మంచూరియా (Gobi Manchurian)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Indo-Chinese',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Crunchy batter-fried cauliflower florets tossed in a sizzling high-heat wok with minced garlic, spring onions, dark soy sauce, chilli sauce, and freshly cracked black pepper.',
        'icon' => '🥦',
        'accent_color' => '#F1F8E9',
        'utensils' => ['Blanching saucepan', 'Deep frying kadai', 'High-heat wok'],
        'ingredients' => [
            ['name' => 'Cauliflower (Gobi)', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Cut into bite-sized florets (~350g)'],
            ['name' => 'Cornflour', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'Crisp coating and slurry'],
            ['name' => 'All-Purpose Flour (Maida)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Batter base'],
            ['name' => 'Garlic', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Finely minced'],
            ['name' => 'Ginger', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Finely minced'],
            ['name' => 'Spring Onions', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Whites and greens separated'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Dark Soy Sauce', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Savory umami'],
            ['name' => 'Red Chilli Sauce & Tomato Ketchup', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Each'],
            ['name' => 'Vinegar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Tangy kick'],
            ['name' => 'Oil for Deep Frying & Wok Tossing', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'High heat']
        ],
        'steps' => [
            'Blanch cauliflower florets in boiling salted water for 2 minutes. Drain completely and spread on a towel so moisture evaporates.',
            'In a bowl, mix 3 tbsp cornflour, 3 tbsp maida, 1/2 tsp pepper, 1/2 tsp salt, and water to make a semi-thick batter.',
            'Coat cauliflower florets in batter. Deep fry in hot oil (175°C) for 4 minutes until light golden and crisp. Drain.',
            'Pro Double Fry: Just before serving, flash-fry all florets a second time in super-hot oil for 60 seconds; this expels surface moisture and guarantees an ultra-crispy crust.',
            'In a smoking hot wok, heat 1.5 tbsp oil. Sizzle minced garlic, ginger, green chillies, and spring onion whites for 30 seconds on high flame.',
            'Add soy sauce, red chilli sauce, tomato ketchup, vinegar, and 2 tablespoons of water.',
            'Add 1 tsp cornflour dissolved in 2 tbsp water; stir for 20 seconds until sauce clears and thickens into a glossy glaze.',
            'Add the double-fried crispy gobi and toss vigorously for 30 seconds until evenly coated.',
            'Garnish with spring onion greens and serve immediately while sizzling crisp.'
        ],
        'tips' => [
            'Double frying is the authentic street-vendor secret: the second flash-fry creates an impervious glass-like crunch that won\'t get soggy in the sauce.',
            'Toss with sauce at the very last second before plating.'
        ],
        'substitutions' => ['Baby corn, button mushrooms, or paneer can be prepared identically.'],
        'storage' => 'Eat immediately; Indo-Chinese appetizers cannot be stored once tossed in sauce.'
    ]
];
