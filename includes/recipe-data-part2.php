<?php
// includes/recipe-data-part2.php - Comprehensive recipe library (Part 2: 21 to 42 - Curries, Chutneys, Breads, Snacks, Sweets, Drinks)

$recipes_part2 = [
    // 21. Potato Fry
    [
        'id' => 'andhra-potato-fry',
        'name' => 'Crispy Andhra Potato Fry (Aloo Vepudu)',
        'regional_name' => 'బంగాళాదుంప వేపుడు (Bangaladumpa Vepudu)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Golden, crusty cubed potatoes sautéed with crushed garlic, cumin, curry leaves, and spicy homemade karam podi.',
        'icon' => '🥔',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Potatoes (Bangaladumpa)', 'quantity' => 4, 'unit' => 'medium', 'notes' => 'Peeled and cut into 1/2 inch cubes'],
            ['name' => 'Garlic cloves', 'quantity' => 8, 'unit' => 'cloves', 'notes' => 'Coarsely crushed with skin'],
            ['name' => 'Mustard seeds & Cumin seeds', 'quantity' => 0.5, 'unit' => 'teaspoon each', 'notes' => 'Tadka'],
            ['name' => 'Urad dal & Chana dal', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Crunchy lentils'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Turmeric powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Andhra Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Or Vellulli Karam'],
            ['name' => 'Cooking Oil', 'quantity' => 2.5, 'unit' => 'tablespoons', 'notes' => 'Peanut or sunflower oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Peel the potatoes and cut them into uniform 1/2-inch cubes. Rinse in cold water to wash off surface starch, then drain well in a colander.',
            'Heat 2.5 tablespoons oil in a wide, heavy-bottomed kadai or non-stick pan over medium heat.',
            'Add mustard seeds, cumin seeds, urad dal, and chana dal. Sauté until the dals turn golden brown.',
            'Add crushed garlic cloves and fresh curry leaves. Fry for 30 seconds until garlic is golden and fragrant.',
            'Add the drained potato cubes and turmeric powder. Toss well to coat all pieces in the aromatic oil.',
            'Cook uncovered on medium flame for 10 minutes, stirring every 2 minutes so all sides develop a crispy golden-brown crust.',
            'Lower the flame, cover the pan with a lid for 3 to 4 minutes to allow the interior of the potatoes to cook through until fork-tender.',
            'Remove the lid, increase heat slightly, and roast for another 3 minutes for maximum crispness.',
            'Sprinkle the red chilli powder and salt. Toss vigorously so the spices coat the crispy potato crust evenly.',
            'Turn off the heat immediately so the chilli powder does not burn.',
            'Serve hot alongside comforting Sambar, Dal, or Rasam with steamed rice.'
        ],
        'tips' => [
            'Rinsing and drying potato cubes removes excess surface starch, preventing them from sticking together into a mash.',
            'Crushed garlic with its skin yields an unforgettable village-style Andhra aroma.'
        ],
        'substitutions' => [
            'Can use boiled baby potatoes pressed lightly flat for a party-style Aloo Tuk variation.'
        ],
        'storage' => 'Best served fresh and crispy. Leftovers can be reheated on a dry hot tawa.'
    ],

    // 22. Beans Poriyal
    [
        'id' => 'beans-poriyal',
        'name' => 'South Indian Beans Poriyal (Stir-Fry)',
        'regional_name' => 'బీన్స్ తాలింపు (Beans Talimpu)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 12,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Crisp-tender French beans gently steamed and tossed with crunchy lentils, green chillies, and freshly grated coconut.',
        'icon' => '🥬',
        'accent_color' => '#E8F5E9',
        'ingredients' => [
            ['name' => 'French Green Beans', 'quantity' => 300, 'unit' => 'grams', 'notes' => 'Trimmed and finely chopped'],
            ['name' => 'Freshly Grated Coconut', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Sweet fresh coconut'],
            ['name' => 'Mustard seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Tempering'],
            ['name' => 'Urad dal & Chana dal', 'quantity' => 1, 'unit' => 'teaspoon each', 'notes' => 'Crunch'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Curry leaves', 'quantity' => 8, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Aroma'],
            ['name' => 'Turmeric powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Coconut Oil or Peanut Oil', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Cooking oil'],
            ['name' => 'Water', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For steam-cooking'],
            ['name' => 'Salt', 'quantity' => 0.75, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Wash green beans, snap off the ends, and chop finely into small 1/4-inch pieces.',
            'Heat 1 tablespoon oil in a pan over medium flame. Add mustard seeds and let them splutter.',
            'Add urad dal, chana dal, chopped green chillies, curry leaves, and a pinch of asafoetida. Sauté until the lentils are light golden.',
            'Add the chopped beans, turmeric powder, and salt. Mix well to combine with the tempering.',
            'Sprinkle 3 tablespoons of water over the beans, cover with a lid, and cook on low-medium flame for 6 to 7 minutes.',
            'Remove the lid; the beans should be tender yet retain their vibrant green color and a pleasant bite (al dente).',
            'Cook for 1 minute uncovered if any residual water remains until dry.',
            'Turn off the heat. Scatter freshly grated coconut on top and gently fold into the warm beans.',
            'Serve as a healthy, colorful vegetable side dish with rasam or mor kuzhambu (buttermilk curry).'
        ],
        'tips' => [
            'Do not overcook the beans until brown or mushy; gentle steaming keeps their crunchy texture and vitamins intact.',
            'Always add the grated coconut off the heat to preserve its natural sweetness and moisture.'
        ],
        'substitutions' => [
            'Can substitute carrots, cabbage, or beetroot using the exact same poriyal technique.'
        ],
        'storage' => 'Refrigerate in an airtight box for up to 2 days.'
    ],

    // 23. Coconut Chutney
    [
        'id' => 'hotel-coconut-chutney',
        'name' => 'Hotel Style White Coconut Chutney',
        'regional_name' => 'కొబ్బరి చట్నీ (Kobbari Chutney)',
        'category' => 'Chutneys and Pickles',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 3,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Creamy, silky fresh coconut ground with roasted gram, ginger, green chillies, and finished with a fragrant mustard-curry leaf tadka.',
        'icon' => '🥥',
        'accent_color' => '#F5F5F5',
        'ingredients' => [
            ['name' => 'Fresh Grated Coconut', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'White portion only (no brown skin)'],
            ['name' => 'Roasted Gram (Dalia / Putnala Pappu)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Gives body and creaminess'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Adjust to spice preference'],
            ['name' => 'Fresh Ginger', 'quantity' => 0.5, 'unit' => 'inch', 'notes' => 'Peeled'],
            ['name' => 'Mustard seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Tadka'],
            ['name' => 'Urad dal', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Crunch'],
            ['name' => 'Dry Red Chilli', 'quantity' => 1, 'unit' => '', 'notes' => 'Broken in half'],
            ['name' => 'Curry leaves', 'quantity' => 6, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Tadka aroma'],
            ['name' => 'Coconut Oil or Ghee', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For tempering'],
            ['name' => 'Water', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'For smooth grinding'],
            ['name' => 'Salt', 'quantity' => 0.75, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a blender jar, combine fresh grated coconut, roasted gram (putnala pappu), green chillies, ginger, salt, and 1/4 cup of water.',
            'Grind until smooth and creamy. Add another 2 to 3 tablespoons of water to achieve your desired chutney thickness.',
            'Transfer the ground chutney to a serving bowl.',
            'Heat 1 tablespoon coconut oil or ghee in a small tadka pan over medium heat.',
            'Add mustard seeds, urad dal, and dry red chilli. Let the mustard pop and urad dal turn golden.',
            'Add curry leaves and a pinch of hing. Let the leaves sizzle for 10 seconds.',
            'Pour the hot fragrant tadka immediately over the coconut chutney.',
            'Gently stir the tadka into the chutney and serve immediately with hot idlis, crispy dosas, or golden vadas.'
        ],
        'tips' => [
            'Grate only the pure white coconut flesh without scraping the dark brown outer shell to keep the chutney snow-white.',
            'Using coconut oil for the tadka gives authentic South Indian temple-style aroma.'
        ],
        'substitutions' => [
            'Add 2 sprigs of fresh coriander or mint leaves for a vibrant green coconut chutney variant.'
        ],
        'storage' => 'Because fresh coconut spoils quickly, consume within 12 hours or refrigerate immediately for up to 24 hours.'
    ],

    // 24. Peanut Chutney
    [
        'id' => 'andhra-peanut-chutney',
        'name' => 'Andhra Palli Chutney (Peanut Chutney)',
        'regional_name' => 'పల్లి చట్నీ (Palli Pachadi)',
        'category' => 'Chutneys and Pickles',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 5,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Rich, nutty, and mildly tangy Andhra breakfast chutney made with roasted peanuts, sautéed green chillies, garlic, and tamarind.',
        'icon' => '🥜',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Raw Peanuts (Pallilu)', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Good quality'],
            ['name' => 'Green Chillies', 'quantity' => 4, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Garlic cloves', 'quantity' => 4, 'unit' => 'cloves', 'notes' => 'Peeled'],
            ['name' => 'Tamarind', 'quantity' => 1, 'unit' => 'small marble size', 'notes' => 'Softened in 1 tbsp warm water'],
            ['name' => 'Cumin seeds', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Added while grinding'],
            ['name' => 'Mustard seeds & Urad dal', 'quantity' => 0.5, 'unit' => 'teaspoon each', 'notes' => 'Tempering'],
            ['name' => 'Curry leaves & Dry Red Chilli', 'quantity' => 1, 'unit' => 'sprig & 1 piece', 'notes' => 'Tadka'],
            ['name' => 'Cooking Oil', 'quantity' => 1.5, 'unit' => 'tablespoon', 'notes' => 'For roasting and tadka'],
            ['name' => 'Water', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'For grinding'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Heat 1 teaspoon of oil in a pan over medium-low flame. Add peanuts and roast slowly for 4 to 5 minutes, stirring continuously, until they turn aromatic and light golden. Do not scorch.',
            'Add the slit green chillies and garlic cloves to the pan. Sauté for 1 minute until chillies develop white blisters.',
            'Transfer the roasted peanuts, chillies, and garlic to a plate and let cool completely.',
            'Add the cooled mixture to a blender jar along with tamarind, cumin seeds, salt, and 1/2 cup water.',
            'Grind to a smooth, creamy paste. Add 2 to 3 tablespoons more water to adjust consistency (it should be pourable like pancake batter).',
            'Pour chutney into a serving bowl.',
            'Prepare tempering: Heat remaining oil in a tadka pan. Add mustard seeds, urad dal, broken dry red chilli, and curry leaves. Let crackle.',
            'Pour the hot sizzling tempering over the chutney and stir gently.',
            'Serve with hot Mysore bondas, punugulu, upma, or idlis.'
        ],
        'tips' => [
            'Roasting peanuts on low flame is crucial; high flame burns the skin while leaving the inside raw and tasting bitter.',
            'Peanut chutney thickens as it sits; dilute with a splash of warm water and salt if serving later.'
        ],
        'substitutions' => [
            'Can add 2 tablespoons of roasted chana dal (dalia) along with peanuts for a lighter texture.'
        ],
        'storage' => 'Keeps well in the refrigerator for up to 3 days.'
    ],

    // 25. Tomato Chutney
    [
        'id' => 'andhra-tomato-chutney',
        'name' => 'Spicy Andhra Tomato Chutney (Tomato Pachadi)',
        'regional_name' => 'టమాటా పచ్చడి (Tomato Pachadi)',
        'category' => 'Chutneys and Pickles',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'A fiery and tangy rustic chutney made with ripe tomatoes, roasted red chillies, coriander seeds, garlic, and tamarind.',
        'icon' => '🍅',
        'accent_color' => '#FFEBEE',
        'ingredients' => [
            ['name' => 'Country Ripe Tomatoes', 'quantity' => 4, 'unit' => 'medium', 'notes' => 'Roughly chopped'],
            ['name' => 'Dry Red Chillies', 'quantity' => 6, 'unit' => '', 'notes' => 'Guntur variety for heat'],
            ['name' => 'Coriander seeds (Dhaniyalu)', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Roasted'],
            ['name' => 'Cumin seeds & Fenugreek seeds', 'quantity' => 1, 'unit' => 'tsp & 0.25 tsp', 'notes' => 'Spices'],
            ['name' => 'Garlic cloves', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Crushed'],
            ['name' => 'Tamarind', 'quantity' => 1, 'unit' => 'small piece', 'notes' => 'Small marble size'],
            ['name' => 'Turmeric powder', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Mustard seeds & Curry leaves', 'quantity' => 0.5, 'unit' => 'tsp & 10 leaves', 'notes' => 'Popu / Tadka'],
            ['name' => 'Peanut or Sesame Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Cooking fat'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Heat 1 tablespoon oil in a pan over medium heat. Add coriander seeds, cumin seeds, fenugreek seeds, and dry red chillies.',
            'Roast on low heat for 2 minutes until spices are deeply fragrant. Transfer to a blender jar and let cool.',
            'In the same pan, add chopped tomatoes, turmeric powder, and tamarind. Cook on medium flame for 6 to 8 minutes until tomatoes become soft, mushy, and all excess moisture evaporates.',
            'Let the cooked tomatoes cool down to room temperature.',
            'First pulse the roasted dry spices and red chillies with salt into a coarse powder in the blender.',
            'Add the cooked tomatoes and peeled garlic cloves. Pulse 3 to 4 times into a coarse, rustic chutney. (Do not grind into a baby food puree; coarse texture is authentic).',
            'Transfer to a glass bowl.',
            'Heat 1 tablespoon oil in a tadka pan. Add mustard seeds, broken red chilli, and curry leaves. Let crackle.',
            'Pour the hot tempering over the tomato pachadi.',
            'Serve with hot rice and ghee, or with crispy dosas and rotis.'
        ],
        'tips' => [
            'Do not grind this chutney into a silky puree; pulsing it coarse gives the true traditional stone-ground (roti pachadi) mouthfeel.',
            'Cooking off the tomato moisture completely extends the shelf life of this chutney.'
        ],
        'substitutions' => [
            'Green chillies can replace dry red chillies for Pachhi Mirapakaya Tomato Pachadi.'
        ],
        'storage' => 'Keeps well in an airtight glass container in the refrigerator for up to 5 days.'
    ],

    // 26. Gongura Pachadi
    [
        'id' => 'andhra-gongura-pachadi',
        'name' => 'Royal Andhra Gongura Pachadi',
        'regional_name' => 'గోంగూర పచ్చడి (Gongura Pickle)',
        'category' => 'Chutneys and Pickles',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 15,
        'servings' => 5,
        'difficulty' => 'Medium',
        'description' => 'The crown jewel of Andhra cuisine—tangy sorrel (gongura) leaves slow-cooked with roasted spices, garlic, and fiery red chillies.',
        'icon' => '🌿',
        'accent_color' => '#E8F5E9',
        'ingredients' => [
            ['name' => 'Red Stem Sorrel Leaves (Gongura)', 'quantity' => 4, 'unit' => 'tightly packed cups', 'notes' => 'Plucked, washed, and dried completely'],
            ['name' => 'Dry Red Chillies', 'quantity' => 10, 'unit' => '', 'notes' => 'Spicy Andhra variety'],
            ['name' => 'Coriander seeds (Dhaniyalu)', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Roasted'],
            ['name' => 'Fenugreek seeds (Mentulu)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Gives traditional aroma'],
            ['name' => 'Cumin seeds (Jeelakarra)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Spices'],
            ['name' => 'Garlic cloves (Vellulli)', 'quantity' => 10, 'unit' => 'cloves', 'notes' => 'Crushed lightly'],
            ['name' => 'Sesame Oil or Peanut Oil', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'Preserves the pickle'],
            ['name' => 'Mustard seeds & Asafoetida', 'quantity' => 1, 'unit' => 'tsp & 0.25 tsp', 'notes' => 'Tempering'],
            ['name' => 'Salt', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Pluck gongura leaves from stalks. Wash thoroughly in plenty of water, spread over a dry cotton cloth, and air-dry until completely moisture-free. (Any water droplet will spoil the pachadi).',
            'Heat 1 tablespoon oil in a pan. Dry roast coriander seeds, fenugreek seeds, cumin seeds, and dry red chillies on low flame until aromatic and chillies puff up. Cool and grind into a fine powder.',
            'In the same pan, heat 1 tablespoon oil. Add the dried gongura leaves. Sauté on medium flame for 5 to 6 minutes.',
            'The gongura leaves will quickly wilt, change color from bright green to dark olive green, and turn into a soft paste. Turn off heat and let cool.',
            'Add the sautéed gongura leaves, the ground spice powder, salt, and 5 crushed garlic cloves to the blender jar.',
            'Pulse gently 3 to 4 times to combine. Do not over-grind; it should be coarse and rustic.',
            'Heat remaining 2 tablespoons oil in a small pan over medium flame. Add mustard seeds, remaining crushed garlic cloves, and hing. Sauté until garlic turns golden.',
            'Pour this hot garlic oil over the gongura pachadi and mix well.',
            'The heavenly Andhra classic is ready! Serve warm with hot steamed rice, a generous dollop of pure ghee, and raw sliced onions.'
        ],
        'tips' => [
            'Red-stem gongura (Erra Gongura) has the most authentic sour punch and is preferred over white-stem sorrel.',
            'Always ensure leaves are completely dry before cooking to ensure it keeps without spoiling.'
        ],
        'substitutions' => [
            'Add 1/2 cup of finely diced raw onions right before serving for extra crunch.'
        ],
        'storage' => 'Can be stored in a dry, sterile glass jar in the refrigerator for up to 3 weeks.'
    ],

    // 27. Chapati
    [
        'id' => 'soft-phulka-chapati',
        'name' => 'Pillowy Soft Roti / Chapati',
        'regional_name' => 'చపాతీ / రోటీ (Chapati / Phulka)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Everyday whole wheat Indian flatbreads that puff up like balloons on an open flame, brushed with pure ghee.',
        'icon' => '🫓',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Whole Wheat Flour (Atta)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Chakki fresh atta'],
            ['name' => 'Lukewarm Water', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Add gradually as needed'],
            ['name' => 'Cooking Oil or Ghee', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For kneading'],
            ['name' => 'Salt', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Optional'],
            ['name' => 'Extra Atta for dusting', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'For rolling'],
            ['name' => 'Pure Ghee for brushing', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Warm desi ghee']
        ],
        'steps' => [
            'In a wide mixing bowl (parat), add whole wheat flour and salt. Mix well.',
            'Add lukewarm water in 3 separate additions, bringing the flour together with your fingers into a cohesive mass.',
            'Add 1 teaspoon of oil and knead vigorously with the knuckles and heels of your hands for 5 full minutes until the dough becomes silky smooth, elastic, and soft (like an earlobe).',
            'Cover the dough with a damp cloth and let it rest undisturbed for 20 minutes (resting relaxes gluten and guarantees ultra-soft rotis).',
            'Divide the rested dough into 8 to 10 equal lemon-sized balls. Roll them smooth between your palms.',
            'Dust a dough ball lightly in dry atta and place on a rolling board (chakla).',
            'Roll gently and evenly with a rolling pin (belan) from the center outward into a 6 to 7 inch round disc of uniform thickness.',
            'Heat a heavy iron tawa over medium-high heat. Place the rolled roti onto the hot tawa.',
            'Cook for 30 seconds until tiny bubbles start appearing on the top surface. Flip the roti.',
            'Cook the second side on medium flame for 40 seconds until light brown spots appear.',
            'Using tongs, lift the roti and place it directly over an open medium flame (or press gently with a clean folded cloth on the tawa). Watch it puff up into a complete balloon!',
            'Remove immediately, place in an insulated roti box (casserole), and brush the top lightly with melted ghee.'
        ],
        'tips' => [
            'Kneading for 5 minutes and resting the dough for 20 minutes is the foolproof secret to melt-in-the-mouth soft chapatis.',
            'Always roll with gentle, even pressure so the borders and center have the same thickness, allowing steam to fill the roti evenly.'
        ],
        'substitutions' => [
            'Can fold with a drop of oil into a triangle to make multi-layered flaky parathas.'
        ],
        'storage' => 'Wrap in a clean cotton napkin inside a casserole. Stays soft for up to 12 hours.'
    ],

    // 28. Poori
    [
        'id' => 'puffed-poori',
        'name' => 'Golden Puffed Poori',
        'regional_name' => 'పూరీ (Poori)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Crispy, deep-fried puffed golden breads made with whole wheat flour and semolina, paired classically with potato masala (poori bhaji).',
        'icon' => '🫓',
        'accent_color' => '#FFE082',
        'ingredients' => [
            ['name' => 'Whole Wheat Flour (Atta)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Fine chakki atta'],
            ['name' => 'Semolina (Bombay Rava / Suji)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Keeps pooris puffed and crispy longer'],
            ['name' => 'Water', 'quantity' => 0.65, 'unit' => 'cup', 'notes' => 'For a stiff, firm dough'],
            ['name' => 'Cooking Oil', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Added to dough'],
            ['name' => 'Salt', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Oil for deep frying', 'quantity' => 2.5, 'unit' => 'cups', 'notes' => 'Sunflower or peanut oil']
        ],
        'steps' => [
            'In a bowl, mix whole wheat flour, semolina (rava), salt, and 1 tablespoon oil.',
            'Add water gradually in small splashes and knead into a FIRM, tight dough. (Poori dough must be stiffer than roti dough—a soft dough absorbs excess oil).',
            'Do NOT rest poori dough for long; rest for just 5 minutes covered so the semolina softens.',
            'Divide into small lime-sized balls. Smear a drop of oil on the dough ball (do NOT use dry flour for dusting, as dry flour burns in hot oil and clouds the oil).',
            'Roll into 4 to 5 inch uniform circles. The rolled poori should be slightly thicker than a chapati.',
            'Heat oil in a deep kadai over medium-high heat until hot (drop a tiny pinch of dough; it should rise to the surface instantly without browning immediately).',
            'Carefully slide one rolled poori into the hot oil.',
            'Immediately press down very gently on the top surface of the poori with the back of a slotted spoon. This immersion encourages steam to build and instantly puffs the poori into a full round ball.',
            'Quickly flip the poori to the other side and fry for 20 seconds until both sides turn beautiful light golden.',
            'Remove with the slotted spoon, draining excess oil, and transfer to a basket lined with paper towels.',
            'Serve immediately with hot Potato Bombay Curry (Poori Masala).'
        ],
        'tips' => [
            'Adding 2 tablespoons of rava (semolina) ensures the pooris stay delightfully puffed up for 15 minutes instead of deflating instantly.',
            'Always roll using a drop of oil rather than dry flour to keep your frying oil crystal clear.'
        ],
        'substitutions' => [
            'Can use all-purpose flour (maida) for classic restaurant-style Bhature.'
        ],
        'storage' => 'Best enjoyed hot immediately out of the frying kadai.'
    ],

    // 29. Aloo Paratha
    [
        'id' => 'punjabi-aloo-paratha',
        'name' => 'Dhaba Style Stuffed Aloo Paratha',
        'regional_name' => 'ఆలూ పరాఠా (Aloo Paratha)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Crispy, golden whole wheat flatbreads stuffed with a spicy mashed potato filling seasoned with amchur, cumin, and fresh herbs, served with white butter.',
        'icon' => '🫓',
        'accent_color' => '#FFE082',
        'ingredients' => [
            ['name' => 'Whole Wheat Flour (Atta)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Kneaded into soft dough'],
            ['name' => 'Potatoes (Aloo)', 'quantity' => 4, 'unit' => 'medium', 'notes' => 'Boiled, peeled, and mashed lump-free'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Very finely minced'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Grated fine'],
            ['name' => 'Dry Mango powder (Amchur)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For signature tanginess'],
            ['name' => 'Garam Masala powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Warm spice'],
            ['name' => 'Roasted Cumin powder (Jeera)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Aroma'],
            ['name' => 'Fresh Coriander leaves', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Finely chopped'],
            ['name' => 'Desi Ghee or Butter', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'For roasting crispy crust'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Boil potatoes in pressure cooker for 3 whistles until tender. Cool completely, peel, and mash with a fork until 100% lump-free. (Any potato chunk will tear the paratha during rolling).',
            'Add minced green chillies, grated ginger, amchur powder, cumin powder, garam masala, chopped coriander, and salt. Mix into a firm, spiced stuffing ball.',
            'Knead whole wheat flour with water into a soft, pliable dough (slightly softer than regular roti dough).',
            'Divide dough into 6 equal portions, and divide the potato filling into 6 equal balls.',
            'Roll a dough ball into a small 4-inch circle. Place a potato filling ball right in the center.',
            'Gather the edges of the dough circle toward the top like a dumpling (potli), pinch the pleats firmly together at the apex, and flatten gently with your palm.',
            'Dust with dry flour. Roll gently with a light hand from the center outwards into a 7-8 inch paratha. If an air pocket forms, gently press it down.',
            'Heat a heavy tawa over medium heat. Place the paratha on the tawa.',
            'Cook for 1 minute until small bubbles appear. Flip over.',
            'Spread 1 teaspoon of ghee or butter over the top. Flip again and spread ghee on the other side.',
            'Press the edges gently with a flat spatula. Cook on medium flame until both sides are speckled with crispy golden-brown spots.',
            'Serve piping hot with a dollop of white butter, fresh chilled curd, and spicy mango pickle.'
        ],
        'tips' => [
            'Always cool boiled potatoes completely before mashing; warm potatoes turn sticky and tear through the dough.',
            'The dough and the stuffing must have the same soft consistency so they roll out together harmoniously without bursting.'
        ],
        'substitutions' => [
            'Add 1/2 cup grated paneer to the potato filling for rich Aloo-Paneer Parathas.'
        ],
        'storage' => 'Best served fresh. Leftovers can be reheated on a buttered tawa.'
    ],

    // 30. Paneer Butter Masala
    [
        'id' => 'restaurant-paneer-butter-masala',
        'name' => 'Restaurant Style Paneer Butter Masala',
        'regional_name' => 'పన్నీర్ బటర్ మసాలా (Paneer Butter Masala)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Soft succulent cottage cheese cubes simmered in a velvety, rich, mildly sweet tomato-butter gravy scented with kasuri methi.',
        'icon' => '🧀',
        'accent_color' => '#FFF3E0',
        'ingredients' => [
            ['name' => 'Fresh Paneer cubes', 'quantity' => 250, 'unit' => 'grams', 'notes' => 'Soaked in warm water for softness'],
            ['name' => 'Ripe Red Tomatoes', 'quantity' => 5, 'unit' => 'medium', 'notes' => 'Chopped'],
            ['name' => 'Cashew nuts (Kaju)', 'quantity' => 12, 'unit' => 'whole', 'notes' => 'Soaked in warm water'],
            ['name' => 'Butter (Makhan)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Salted butter'],
            ['name' => 'Cooking Oil', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Prevents butter from burning'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Fresh'],
            ['name' => 'Kashmiri Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Vibrant red color without extreme heat'],
            ['name' => 'Garam Masala powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Aromatics'],
            ['name' => 'Kasuri Methi (Dried Fenugreek leaves)', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Crushed between palms'],
            ['name' => 'Fresh Cream (Malai)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Whisked'],
            ['name' => 'Sugar or Honey', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Balances tomato acidity'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a pot, boil chopped tomatoes, cashews, 1 cup of water, 1 green cardamom, and 2 cloves for 10 minutes until tomatoes are soft. Cool completely and blend into a silk-smooth puree. Strain through a sieve for velvety restaurant texture.',
            'Cut paneer into bite-sized cubes and soak in a bowl of warm water with a pinch of salt to keep them pillow-soft.',
            'Heat 1 tablespoon oil and 2 tablespoons butter in a wide pan over medium flame.',
            'Add ginger-garlic paste and sauté for 1 minute until fragrant.',
            'Add Kashmiri red chilli powder and immediately pour in the strained tomato-cashew puree to prevent the chilli from burning.',
            'Cook the gravy on medium heat for 6 to 8 minutes, stirring frequently, until the gravy thickens and droplets of butter begin to gloss on the surface.',
            'Add 1/2 cup water, salt, garam masala, and sugar. Simmer for 2 minutes.',
            'Drain the soft paneer cubes and gently slide them into the simmering velvety gravy.',
            'Simmer gently on low flame for strictly 3 minutes. (Do not overcook paneer or it will turn rubbery).',
            'Crush kasuri methi between your palms to release fragrance and sprinkle over the curry.',
            'Stir in fresh cream and 1 remaining tablespoon of butter. Swirl gently and turn off the heat.',
            'Serve warm with naan, rotis, or jeera rice.'
        ],
        'tips' => [
            'Soaking paneer cubes in warm salted water for 15 minutes before adding to the gravy keeps them extraordinarily tender.',
            'Straining the tomato-cashew puree through a soup strainer removes seeds and skins, producing an authentic makhani silkiness.'
        ],
        'substitutions' => [
            'Tofu or cooked chicken tikka pieces can be substituted in this versatile makhani gravy.'
        ],
        'storage' => 'Refrigerate in an airtight container for up to 3 days. Reheat on low flame with 2 tablespoons of warm milk.'
    ],

    // 31. Vegetable Fried Rice
    [
        'id' => 'indo-chinese-veg-fried-rice',
        'name' => 'Indo-Chinese Vegetable Fried Rice',
        'regional_name' => 'వెజ్ ఫ్రైడ్ రైస్ (Veg Fried Rice)',
        'category' => 'Quick Meals',
        'cuisine' => 'Indo-Chinese',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 10,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Fluffy, separate grains of cooked rice wok-tossed on high flame with crunchy carrots, cabbage, spring onions, and a dash of soy sauce.',
        'icon' => '🥢',
        'accent_color' => '#FFFDE7',
        'ingredients' => [
            ['name' => 'Cooked Long Grain Basmati Rice', 'quantity' => 3, 'unit' => 'cups', 'notes' => 'Chilled in fridge, grains separated'],
            ['name' => 'Garlic cloves', 'quantity' => 6, 'unit' => 'cloves', 'notes' => 'Finely minced'],
            ['name' => 'Carrot & French Beans', 'quantity' => 0.5, 'unit' => 'cup each', 'notes' => 'Finely diced'],
            ['name' => 'Cabbage', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Finely shredded'],
            ['name' => 'Capsicum (Bell Pepper)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Diced'],
            ['name' => 'Spring Onion (Scallions)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Whites and greens separated'],
            ['name' => 'Dark Soy Sauce', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For savory umami'],
            ['name' => 'White Vinegar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For mild tang'],
            ['name' => 'Crushed Black Pepper', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Freshly ground'],
            ['name' => 'Cooking Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Sunflower or sesame oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Cook the rice ahead of time and chill in the refrigerator for at least 1 hour. Cold rice doesn\'t break or turn mushy during high-flame wok tossing.',
            'Heat 2 tablespoons oil in a large wok or wide kadai on MAXIMUM high flame until lightly smoking.',
            'Add minced garlic and spring onion whites. Stir-fry vigorously for 30 seconds until aromatic.',
            'Add chopped carrots and French beans. Toss on high flame for 1.5 minutes.',
            'Add shredded cabbage and capsicum. Stir-fry for another 1 minute. The vegetables must remain vibrant, crisp, and crunchy.',
            'Spread the vegetables to the sides of the wok, creating a small well in the center.',
            'Pour soy sauce and vinegar into the center; let them sizzle for 5 seconds to intensify their flavor.',
            'Add the cold cooked rice, crushed black pepper, and salt.',
            'Toss and stir everything together using two wide spatulas on high flame for 2 to 3 minutes until every grain is hot, glossy, and evenly seasoned.',
            'Turn off the heat. Scatter fresh chopped spring onion greens on top.',
            'Serve piping hot with Chilli Paneer, Gobi Manchurian, or spicy Schezwan sauce.'
        ],
        'tips' => [
            'Using day-old cold rice straight from the fridge is the ultimate culinary secret to restaurant-style separated grains.',
            'Always cook on the highest possible heat to get the smoky wok-hei flavor without making vegetables soggy.'
        ],
        'substitutions' => [
            'Add scrambled eggs or shredded cooked chicken for Non-Veg Fried Rice.'
        ],
        'storage' => 'Refrigerate leftovers within 2 hours. Keeps well for 24 hours; reheat in a screaming-hot wok.'
    ],

    // 32. Egg Curry
    [
        'id' => 'andhra-egg-curry',
        'name' => 'Spicy Andhra Guddu Pulusu (Egg Curry)',
        'regional_name' => 'గుడ్డు పులుసు / కూర (Guddu Pulusu)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'Andhra',
        'type' => 'Non-Vegetarian',
        'prep_time' => 15,
        'cook_time' => 20,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Golden pan-blistered boiled eggs simmered in a tangy, spicy onion-tomato tamarind sauce with aromatic garlic and curry leaves.',
        'icon' => '🥚',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Hard Boiled Eggs', 'quantity' => 4, 'unit' => 'whole', 'notes' => 'Peeled and lightly pricked with fork'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Tamarind pulp', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Extracted in warm water'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Mustard seeds & Fenugreek seeds', 'quantity' => 0.5, 'unit' => 'tsp & 0.25 tsp', 'notes' => 'Tadka'],
            ['name' => 'Curry leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Red Chilli Powder & Turmeric', 'quantity' => 1.5, 'unit' => 'tsp & 0.5 tsp', 'notes' => 'Spices'],
            ['name' => 'Coriander powder & Garam Masala', 'quantity' => 1, 'unit' => 'tsp & 0.5 tsp', 'notes' => 'Spices'],
            ['name' => 'Cooking Oil', 'quantity' => 2.5, 'unit' => 'tablespoons', 'notes' => 'Peanut or sunflower oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Boil eggs in salted water for 10 minutes until hard boiled. Cool in cold water, peel, and make 3 shallow vertical slits on each egg.',
            'Heat 1 tablespoon oil in a pan with a pinch of turmeric and chilli powder. Fry the boiled eggs on medium flame for 2 minutes until their white skins turn golden and blistered. Remove to a plate.',
            'In the same pan, add remaining 1.5 tablespoons oil. Splutter mustard seeds, fenugreek seeds, and curry leaves.',
            'Add finely chopped onions and green chillies. Sauté on medium flame for 5 minutes until onions turn reddish-brown.',
            'Add ginger-garlic paste and sauté for 1 minute.',
            'Add chopped tomatoes, red chilli powder, turmeric, coriander powder, and salt. Cook until tomatoes turn completely soft and oil separates.',
            'Add tamarind pulp and 1 cup of warm water. Bring the gravy to a gentle boil.',
            'Gently slip the fried eggs into the boiling gravy.',
            'Cover with a lid and simmer on low-medium flame for 8 to 10 minutes so the eggs absorb all the tangy, spicy gravy.',
            'Sprinkle garam masala and fresh coriander leaves.',
            'Serve hot with steamed white rice, dosas, or chapati.'
        ],
        'tips' => [
            'Pricking and frying the boiled eggs gives them a delicious chewy blistered crust that traps gravy in every bite.',
            'Food Safety: Ensure boiled eggs are thoroughly cooked until the yolks are firm.'
        ],
        'substitutions' => [
            'Boiled baby potatoes can be added along with the eggs.'
        ],
        'storage' => 'Refrigerate in a covered container for up to 2 days.'
    ],

    // 33. Chicken Fry
    [
        'id' => 'andhra-chicken-fry',
        'name' => 'Crispy Andhra Chicken Vepudu (Chicken Fry)',
        'regional_name' => 'ఆంధ్రా చికెన్ వేపుడు (Chicken Vepudu)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'Andhra',
        'type' => 'Non-Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Dry roasted tender chicken pieces coated in a fiery, dark, aromatic masala paste made with black pepper, roasted spices, and fresh curry leaves.',
        'icon' => '🍗',
        'accent_color' => '#FFEBEE',
        'ingredients' => [
            ['name' => 'Bone-in Chicken pieces', 'quantity' => 600, 'unit' => 'grams', 'notes' => 'Small curry pieces, washed clean'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Freshly pounded'],
            ['name' => 'Black Peppercorns', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Coarsely crushed'],
            ['name' => 'Andhra Red Chilli Powder', 'quantity' => 1.5, 'unit' => 'teaspoon', 'notes' => 'Spicy'],
            ['name' => 'Coriander powder & Cumin powder', 'quantity' => 1, 'unit' => 'tsp each', 'notes' => 'Spices'],
            ['name' => 'Turmeric powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Pasupu'],
            ['name' => 'Curry leaves', 'quantity' => 15, 'unit' => 'leaves', 'notes' => 'Generous sprig'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Lemon juice', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Fresh'],
            ['name' => 'Cooking Oil', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Peanut oil preferred'],
            ['name' => 'Salt', 'quantity' => 1.25, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Food Safety: Handle raw chicken cleanly. In a bowl, marinate chicken with 1/2 tsp turmeric, 1 tsp chilli powder, 1 tsp ginger-garlic paste, 1 tbsp lemon juice, and 1/2 tsp salt for 20 minutes.',
            'Heat 3 tablespoons oil in a wide, heavy-bottomed kadai or cast-iron pan over medium flame.',
            'Add slit green chillies and plenty of fresh curry leaves. Let them crackle.',
            'Add finely chopped onions and sauté on medium heat for 6 to 7 minutes until they turn deep golden brown.',
            'Add remaining ginger-garlic paste and sauté for 1 minute until fragrant.',
            'Add the marinated chicken pieces. Increase flame to high and sear the chicken, stirring continuously, for 5 minutes until meat turns opaque and juices begin to release.',
            'Add coriander powder, cumin powder, remaining red chilli powder, and salt. Stir to coat every piece.',
            'Lower the flame, cover with a tight lid, and let the chicken cook in its own released steam and juices for 12 to 14 minutes. Stir occasionally. (Do not add extra water).',
            'Remove the lid. Check doneness: Meat should be tender and thoroughly cooked with no pinkness at the bone (internal temp 74°C/165°F).',
            'Increase flame to medium-high to roast off any residual pan moisture.',
            'Sprinkle the crushed black peppercorns and extra curry leaves. Roast and toss continuously for 4 to 5 minutes until the masala turns dark brown and clings dry to every chicken piece.',
            'Serve piping hot as a premier starter, or paired with steaming tomato pappu and rice.'
        ],
        'tips' => [
            'Cooking the chicken in its own natural juices without adding extra water concentrates the chicken flavor and yields the crispiest coating.',
            'Crushed black pepper added at the very end gives the iconic Andhra military hotel kick.'
        ],
        'substitutions' => [
            'Boneless chicken thigh pieces cut into 1-inch cubes can be used for an appetizer version.'
        ],
        'storage' => 'Refrigerate promptly within 2 hours. Keeps well for up to 2 days; reheat in a hot dry pan.'
    ],

    // 34. Pakodi
    [
        'id' => 'crispy-onion-pakodi',
        'name' => 'Street Style Crispy Onion Pakodi',
        'regional_name' => 'ఉల్లిపాయ పకోడీ (Ullipaya Pakodi)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 12,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Irresistibly crunchy, tea-time fritters made with thinly sliced onions, gram flour, rice flour, crushed ginger, and curry leaves.',
        'icon' => '🧅',
        'accent_color' => '#FFE082',
        'ingredients' => [
            ['name' => 'Onions', 'quantity' => 3, 'unit' => 'large', 'notes' => 'Thinly sliced lengthwise'],
            ['name' => 'Besan (Gram Flour / Senagapindi)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Sifted'],
            ['name' => 'Rice Flour (Biyyampindi)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Crucial for lasting crispness'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Finely grated'],
            ['name' => 'Curry leaves', 'quantity' => 12, 'unit' => 'leaves', 'notes' => 'Roughly torn'],
            ['name' => 'Carom seeds (Ajwain / Vamu)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Crushed for digestion'],
            ['name' => 'Hot Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Poured into flour for lightness'],
            ['name' => 'Red Chilli Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste'],
            ['name' => 'Oil for deep frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Peanut or sunflower oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a wide bowl, add the thinly sliced onions, green chillies, ginger, curry leaves, ajwain, red chilli powder, and 1 teaspoon of salt.',
            'Using your fingers, squeeze and rub the onions firmly for 1 to 2 minutes. This separates the onion petals and causes them to release natural water.',
            'Add the besan (gram flour) and rice flour over the onions.',
            'Carefully pour 2 tablespoons of sizzling hot oil (from the frying kadai) over the flour mixture—it will sizzle. This technique (mohan) gives extraordinary crunch.',
            'Mix everything together using your hands. DO NOT ADD WATER. The natural moisture released by the squeezed onions is completely sufficient to bind the flour into a dry, sticky coating.',
            'Heat oil in a deep kadai over medium-high heat.',
            'Take small, uneven clumps of the onion-flour mixture and scatter them loosely into the hot oil with your fingers (do not form balls).',
            'Fry on medium flame for 4 to 5 minutes, turning occasionally with a slotted ladle, until the pakodis turn deep golden brown and crunchy.',
            'Drain on paper towels.',
            'Throw a few whole curry leaves into the hot oil for 10 seconds, drain, and garnish over the hot pakodis.',
            'Serve immediately with hot ginger masala chai.'
        ],
        'tips' => [
            'NEVER add water to onion pakodi mixture; relying purely on onion sweat creates thin, crispy street-vendor pakodis instead of soft bajjis.',
            'Pouring hot oil into the dry flour creates micro-air pockets that keep pakodis crunchy for hours.'
        ],
        'substitutions' => [
            'Add roasted cashew pieces for royal Cashew Pakodi (Kaju Pakodi).'
        ],
        'storage' => 'Best enjoyed hot. If stored, cool completely and keep in an airtight tin for up to 2 days.'
    ],

    // 35. Punugulu
    [
        'id' => 'andhra-punugulu',
        'name' => 'Crispy Andhra Street Punugulu',
        'regional_name' => 'పునుగులు (Punugulu)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Crisp golden bite-sized fritters made from fermented idli or dosa batter mixed with onions, green chillies, and cumin, served with ginger chutney.',
        'icon' => '🥟',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Fermented Dosa or Idli Batter', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Slightly sour batter works best'],
            ['name' => 'Maida (All Purpose Flour) or Rice Flour', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'To adjust thick consistency'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Finely chopped'],
            ['name' => 'Fresh Ginger', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Minced'],
            ['name' => 'Cumin seeds (Jeera)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Curry leaves', 'quantity' => 8, 'unit' => 'leaves', 'notes' => 'Finely chopped'],
            ['name' => 'Cooking Oil for deep frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Peanut or sunflower oil'],
            ['name' => 'Salt', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Adjust as batter already has salt']
        ],
        'steps' => [
            'In a bowl, take the fermented dosa batter. (Slightly sour 2-3 day old batter yields the tastiest punugulu).',
            'Add rice flour or maida to bring the batter to a thick dropping consistency (it should hold its shape when dropped from a spoon).',
            'Fold in the chopped onion, green chillies, minced ginger, cumin seeds, chopped curry leaves, and a pinch of salt.',
            'Whisk the batter well with your fingers for 1 minute to incorporate air.',
            'Heat oil in a kadai over medium-high heat.',
            'Dip your fingers in water, pinch a small marble-sized ball of batter, and gently drop it into the hot oil. Drop 10 to 12 small balls per batch.',
            'Fry on medium flame, stirring continuously with a slotted spoon, until they puff up round and turn evenly golden brown and crispy (about 3 to 4 minutes).',
            'Remove with the slotted spoon and drain on paper towels.',
            'Serve piping hot with Andhra Allam Chutney (Ginger Chutney) or peanut chutney and a sprinkle of spicy podi.'
        ],
        'tips' => [
            'Slightly sour leftover idli/dosa batter makes the crispiest, tangiest punugulu.',
            'The batter must be thick; if too runny, it will absorb oil, so add a spoon of rice flour to firm it up.'
        ],
        'substitutions' => [
            'Can use maida and sour curd batter for Andhra street style Bonda Punugulu.'
        ],
        'storage' => 'Best eaten hot and fresh immediately.'
    ],

    // 36. Onion Bajji
    [
        'id' => 'andhra-onion-bajji',
        'name' => 'Mirchi & Onion Bajji (Pakora)',
        'regional_name' => 'ఉల్లిపాయ బజ్జి (Ullipaya Bajji)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Andhra',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 12,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Thick round onion rings coated in a fluffy, spiced besan batter, fried to golden perfection and sprinkled with chaat masala.',
        'icon' => '🧅',
        'accent_color' => '#FFE082',
        'ingredients' => [
            ['name' => 'Onions', 'quantity' => 3, 'unit' => 'large', 'notes' => 'Peeled and sliced into thick 1/3 inch round rings'],
            ['name' => 'Besan (Gram Flour)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Sifted'],
            ['name' => 'Rice Flour', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For crunch'],
            ['name' => 'Ajwain (Vamu)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Crushed'],
            ['name' => 'Turmeric & Red Chilli Powder', 'quantity' => 0.5, 'unit' => 'tsp & 1 tsp', 'notes' => 'Spices'],
            ['name' => 'Baking Soda', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Makes bajjis light and airy'],
            ['name' => 'Water', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'For thick batter'],
            ['name' => 'Chaat Masala', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For sprinkling'],
            ['name' => 'Oil for deep frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Frying oil'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Slice onions into thick 1/3-inch round rings. Separate into individual rings.',
            'In a bowl, whisk besan, rice flour, ajwain, turmeric, red chilli powder, salt, and a pinch of baking soda.',
            'Add water gradually, whisking into a smooth, lump-free batter with a thick coatable consistency (thick enough to cling to the onion rings without running off).',
            'Heat oil in a kadai over medium heat.',
            'Dip an onion ring into the batter, coating it completely on all sides.',
            'Gently slide the batter-coated onion ring into the medium-hot oil. Drop 4 to 5 rings at a time.',
            'Fry on medium flame for 3 to 4 minutes, flipping halfway, until puffy and deep golden.',
            'Drain on paper towels.',
            'Dust with tangy chaat masala while still hot.',
            'Serve with mint chutney or sweet tamarind sauce.'
        ],
        'tips' => [
            'A pinch of baking soda combined with hot oil makes the bajji batter puff up light like clouds.',
            'Cut the onion rings thick so they stay juicy inside the crispy batter.'
        ],
        'substitutions' => [
            'Can use large Bhavnagri green chillies with the same batter to make Mirchi Bajji.'
        ],
        'storage' => 'Serve hot immediately.'
    ],

    // 37. Vegetable Cutlet
    [
        'id' => 'crispy-vegetable-cutlet',
        'name' => 'Crispy Railway Style Vegetable Cutlet',
        'regional_name' => 'వెజ్ కట్లెట్ (Veg Cutlet)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Heart-shaped or oval vegetable patties made with beetroot, potatoes, carrots, and peas, coated in breadcrumbs and shallow fried until extra crispy.',
        'icon' => '🧆',
        'accent_color' => '#FFEBEE',
        'ingredients' => [
            ['name' => 'Potatoes (Boiled & Mashed)', 'quantity' => 3, 'unit' => 'medium', 'notes' => 'Base binder'],
            ['name' => 'Beetroot (Grated or Boiled)', 'quantity' => 1, 'unit' => 'small', 'notes' => 'Gives stunning ruby red color'],
            ['name' => 'Carrot & Green Peas', 'quantity' => 0.5, 'unit' => 'cup each', 'notes' => 'Steamed and finely chopped/mashed'],
            ['name' => 'Ginger-Green Chilli paste', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Freshly ground'],
            ['name' => 'Garam Masala & Chaat Masala', 'quantity' => 0.5, 'unit' => 'teaspoon each', 'notes' => 'Spices'],
            ['name' => 'Fresh Coriander', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Chopped'],
            ['name' => 'Cornflour / Cornstarch', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Whisked with 4 tbsp water for slurry'],
            ['name' => 'Breadcrumbs', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'For super crisp outer crust'],
            ['name' => 'Cooking Oil for shallow frying', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'Shallow frying'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'In a mixing bowl, combine the mashed potatoes, grated beetroot, steamed carrots, mashed green peas, ginger-chilli paste, garam masala, chaat masala, chopped coriander, and salt.',
            'Knead into a firm, non-sticky red vegetable dough.',
            'Divide into 8 equal portions. Shape each portion into an oval patty or classic railway cutlet heart shape (about 1/2 inch thick).',
            'In a shallow bowl, mix cornflour with water to form a smooth thin slurry. Place breadcrumbs on a flat plate.',
            'Dip each cutlet patty into the cornflour slurry, let excess drip off, then immediately roll in the breadcrumbs, pressing lightly so crumbs coat every side.',
            'Chill the breaded cutlets in the refrigerator for 15 minutes (this sets the coating and prevents breaking during frying).',
            'Heat 3 tablespoons oil in a wide non-stick pan over medium heat.',
            'Place cutlets in the pan and shallow-fry for 3 to 4 minutes on medium flame until the bottom is dark golden and super crunchy.',
            'Flip carefully and fry the other side for another 3 minutes.',
            'Drain on paper towels and serve hot with tomato ketchup and onion salad.'
        ],
        'tips' => [
            'Adding beetroot provides the iconic Indian Railway deep magenta-red interior color and earthy sweetness.',
            'Chilling the breaded patties for 15 minutes before frying prevents crumbs from falling off in the pan.'
        ],
        'substitutions' => [
            'Can be baked at 200°C (400°F) for 20 minutes, brushing with oil for a low-fat option.'
        ],
        'storage' => 'Unfried patties can be frozen for up to 2 weeks. Cooked cutlets keep refrigerated for 1 day.'
    ],

    // 38. Payasam
    [
        'id' => 'traditional-rice-payasam',
        'name' => 'Traditional Rice Payasam (Ksheerannam)',
        'regional_name' => 'పరమాన్నం / పాయసం (Paramannam / Payasam)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'A sacred festive dessert made by slow-simmering fragrant rice in full-cream milk, sweetened with golden jaggery or sugar, and laced with cardamom and ghee-roasted nuts.',
        'icon' => '🍨',
        'accent_color' => '#FFFDE7',
        'ingredients' => [
            ['name' => 'Raw Rice (Sona Masoori or Gobindobhog)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Rinsed clean'],
            ['name' => 'Full Cream Whole Milk', 'quantity' => 4, 'unit' => 'cups', 'notes' => 'Rich buffalo or cow milk'],
            ['name' => 'Organic Jaggery (Bellam) or Sugar', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Grated jaggery'],
            ['name' => 'Water', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'For initial rice boiling'],
            ['name' => 'Green Cardamom powder (Elaichi)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Freshly ground'],
            ['name' => 'Cashew nuts & Golden Raisins (Kishmish)', 'quantity' => 10, 'unit' => 'pieces each', 'notes' => 'Fried in ghee'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For roasting nuts and aroma'],
            ['name' => 'Pachha Karpooram (Edible Camphor)', 'quantity' => 1, 'unit' => 'micro pinch', 'notes' => 'Temple-style sacred aroma (optional)']
        ],
        'steps' => [
            'In a heavy-bottomed pot, bring 1 cup water and 2 cups milk to a gentle boil.',
            'Add the rinsed rice and cook on medium-low flame for 15 minutes, stirring occasionally, until the rice grains are thoroughly cooked, soft, and easily mashable between fingers.',
            'Pour in the remaining 2 cups of milk and continue to simmer on low flame for another 10 to 12 minutes until the milk reduces and turns thick, creamy, and creamy-pale.',
            'Gently mash a few rice grains with the back of a spoon to thicken the pudding naturally.',
            'If using jaggery: Melt the grated jaggery with 3 tablespoons of water in a separate small saucepan on low heat until completely dissolved. Strain to remove impurities and let cool slightly.',
            'CRITICAL STEP FOR JAGGERY: Turn off the flame of the payasam pot and let it cool down for 3 minutes. Slowly stir in the melted warm jaggery syrup. (Adding jaggery to boiling milk can curdle the milk). If using sugar, you can add it directly while simmering.',
            'Stir in fresh cardamom powder and a tiny pinch of edible camphor.',
            'Heat 2 tablespoons ghee in a small pan. Fry cashews until golden, then add raisins and fry until they plump up like balloons.',
            'Pour the hot ghee, cashews, and plump raisins directly over the fragrant payasam.',
            'Serve warm or chilled as festive prasadam or family dessert.'
        ],
        'tips' => [
            'Never boil jaggery directly in hot milk; adding warm jaggery syrup to slightly cooled milk guarantees zero curdling.',
            'Using full-fat milk gives the richest, authentic temple-style creaminess without needing condensed milk.'
        ],
        'substitutions' => [
            'Can use raw cane sugar or palm jaggery instead of regular jaggery.'
        ],
        'storage' => 'Refrigerate in an airtight bowl for up to 3 days. Delicious served chilled.'
    ],

    // 39. Semiya Payasam
    [
        'id' => 'semiya-payasam-kheer',
        'name' => 'Quick Semiya Payasam (Vermicelli Kheer)',
        'regional_name' => 'సేమియా పాయసం (Semiya Payasam)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 5,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'A quick and delightful dessert of roasted vermicelli simmered in sweet cardamom milk, loaded with crunchy golden cashews and plump raisins.',
        'icon' => '🍨',
        'accent_color' => '#FFF8E1',
        'ingredients' => [
            ['name' => 'Vermicelli (Semiya)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Roasted in ghee until golden'],
            ['name' => 'Whole Milk', 'quantity' => 4, 'unit' => 'cups', 'notes' => 'Warm'],
            ['name' => 'Sugar', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Adjust to sweet preference'],
            ['name' => 'Green Cardamom powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Freshly ground'],
            ['name' => 'Cashew nuts & Raisins', 'quantity' => 12, 'unit' => 'each', 'notes' => 'Garnish'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'For roasting'],
            ['name' => 'Saffron strands (Kesar)', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Soaked in 1 tbsp warm milk']
        ],
        'steps' => [
            'Heat 2 tablespoons of ghee in a heavy-bottomed pan over medium flame.',
            'Add the cashews and fry until light golden; add raisins and fry until puffed. Remove nuts and raisins to a plate.',
            'In the same remaining ghee, add the vermicelli (semiya). Roast on low-medium flame for 3 to 4 minutes, stirring continuously, until it turns an even rich golden brown. (Do not let it burn).',
            'Carefully pour 4 cups of warm milk into the roasted vermicelli. Stir well to prevent sticking.',
            'Cook on medium heat for 6 to 8 minutes until the vermicelli becomes soft and translucent.',
            'Add sugar and saffron milk. Stir well until the sugar dissolves completely and let it simmer for 2 more minutes.',
            'Stir in the freshly ground cardamom powder and the fried cashews and raisins.',
            'Turn off the heat. The payasam will thicken slightly as it cools.',
            'Serve warm or chilled.'
        ],
        'tips' => [
            'Roasting the vermicelli until golden brown in ghee prevents it from turning mushy or slimy in milk.',
            'Vermicelli absorbs milk as it sits; if it gets too thick later, stir in 1/2 cup of warm milk and stir.'
        ],
        'substitutions' => [
            'Replace half the milk with evaporated milk or sweetened condensed milk for a richer dessert.'
        ],
        'storage' => 'Keeps well in refrigerator for up to 3 days.'
    ],

    // 40. Rava Kesari
    [
        'id' => 'south-indian-rava-kesari',
        'name' => 'Traditional Melt-in-Mouth Rava Kesari',
        'regional_name' => 'రవ్వ కేసరి (Rava Kesari)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 5,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Glossy, vibrant saffron-tinted semolina halwa enriched with generous desi ghee, fragrant cardamom, and golden roasted cashews.',
        'icon' => '🍮',
        'accent_color' => '#FFF3E0',
        'ingredients' => [
            ['name' => 'Bombay Rava (Semolina / Suji)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Roasted in ghee'],
            ['name' => 'Sugar', 'quantity' => 1.25, 'unit' => 'cups', 'notes' => 'Traditional sweetness ratio'],
            ['name' => 'Water', 'quantity' => 2.75, 'unit' => 'cups', 'notes' => 'Brought to rolling boil'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Divided in 3 additions for gloss'],
            ['name' => 'Cardamom powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Elaichi'],
            ['name' => 'Saffron strands or natural yellow extract', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Dissolved in 1 tbsp warm water'],
            ['name' => 'Cashew nuts & Golden Raisins', 'quantity' => 12, 'unit' => 'pieces each', 'notes' => 'Fried in ghee']
        ],
        'steps' => [
            'Heat 2 tablespoons of ghee in a pan over medium heat. Fry the cashews until golden, add raisins until puffed, and set aside.',
            'In the same pan, add another tablespoon of ghee and the rava. Roast on medium-low flame for 4 to 5 minutes until warm and fragrant (do not let it brown). Transfer to a plate.',
            'In a separate pot, bring 2.75 cups of water to a rolling boil with the saffron strands.',
            'Reduce heat to low. While stirring the boiling water continuously with a whisk or ladle with one hand, slowly pour in the roasted rava with the other hand in a steady stream. This prevents any lump formation.',
            'Cook on low flame, stirring continuously for 2 minutes, until the rava completely absorbs the water and turns soft and cooked through.',
            'CRITICAL STEP: Only AFTER the rava is 100% cooked, add the sugar. (If you add sugar before rava cooks, the rava will remain raw and grain-hard).',
            'Once sugar is added, the mixture will melt and loosen into a liquid. Stir continuously on low flame until it thickens again.',
            'Add the cardamom powder and pour in the remaining ghee in 2 batches, stirring continuously.',
            'Keep stirring until the kesari leaves the sides of the pan without sticking and turns glossy and translucent.',
            'Fold in the fried cashews and raisins.',
            'Serve warm, spooned straight onto plates or set in a greased mould and sliced.'
        ],
        'tips' => [
            'Golden Rule: Always cook the rava completely in water BEFORE adding the sugar. Sugar locks the grain and prevents it from cooking further.',
            'Adding ghee in small batches toward the end gives kesari its irresistible, non-sticky glossy sheen.'
        ],
        'substitutions' => [
            'Add 1/2 cup of fresh pineapple chunks cooked in sugar to create famous Pineapple Kesari.'
        ],
        'storage' => 'Stays soft at room temperature for 24 hours or refrigerated for up to 4 days. Reheat on low flame with a spoonful of warm water.'
    ],

    // 41. Gulab Jamun
    [
        'id' => 'classic-gulab-jamun',
        'name' => 'Classic Melt-in-Mouth Gulab Jamun',
        'regional_name' => 'గులాబ్ జామూన్ (Gulab Jamun)',
        'category' => 'Sweets and Desserts',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 20,
        'servings' => 5,
        'difficulty' => 'Medium',
        'description' => 'Soft, spongy golden milk-solid dumplings slow-fried in ghee and soaked in warm, fragrant rose-cardamom sugar syrup.',
        'icon' => '🟤',
        'accent_color' => '#EFEBE9',
        'ingredients' => [
            ['name' => 'Mawa / Khoya (or Milk Powder)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Grated fine, room temperature'],
            ['name' => 'All Purpose Flour (Maida)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Binder'],
            ['name' => 'Baking Soda', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Tiny pinch only'],
            ['name' => 'Milk', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Warm milk for kneading'],
            ['name' => 'Sugar', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'For syrup'],
            ['name' => 'Water', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'For syrup'],
            ['name' => 'Green Cardamom pods', 'quantity' => 4, 'unit' => '', 'notes' => 'Crushed lightly'],
            ['name' => 'Rose Water', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For signature royal aroma'],
            ['name' => 'Ghee or Cooking Oil for frying', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Frying fat']
        ],
        'steps' => [
            'Prepare Sugar Syrup: In a wide pot, combine sugar, water, and crushed cardamom pods. Bring to a boil on medium heat for 6 to 8 minutes until it reaches a sticky, half-string consistency (it should feel sticky between thumb and index finger, like warm honey). Turn off heat, stir in rose water, and keep warm.',
            'In a bowl, crumble and knead the khoya (or milk powder mixed with 2 tbsp ghee) until smooth and lump-free.',
            'Add maida and a tiny pinch of baking soda. Mix with fingers.',
            'Sprinkle warm milk 1 teaspoon at a time and gather into a very soft, smooth, non-sticky dough. DO NOT OVER-KNEAD (excess kneading develops gluten and makes jamuns hard inside).',
            'Divide dough into small marble-sized balls (about 15 to 18 balls). Roll each ball between your palms with gentle pressure until completely smooth with ZERO CRACKS. (Any crack will cause the jamun to split during frying).',
            'Heat ghee or oil in a deep kadai over LOW heat. Test temperature: Drop a tiny piece of dough—it should sit at the bottom for 3 seconds and then slowly float up without changing color.',
            'Slide the shaped balls into the warm oil. Do not touch the delicate jamuns with your ladle; instead, gently swirl the oil around them in circular motions.',
            'Fry on strict low flame for 10 to 12 minutes, turning continuously, until they expand and turn an even, rich golden-brown all over.',
            'Remove with a slotted spoon, drain for 30 seconds, and slide the hot fried jamuns directly into the WARM sugar syrup.',
            'Let the gulab jamuns soak in the syrup for at least 2 hours so they plump up and absorb sweetness all the way to their tender center.',
            'Serve warm or at room temperature with vanilla ice cream or silver vark.'
        ],
        'tips' => [
            'Frying on strict low flame is the golden secret; high heat browns the outside instantly while the center remains raw dough.',
            'Roll balls with completely smooth, crack-free surfaces to prevent them from splitting apart in oil.'
        ],
        'substitutions' => [
            'Ready-made gulab jamun mix can be substituted using the exact same low-flame frying technique.'
        ],
        'storage' => 'Keeps well in sugar syrup in the refrigerator for up to 10 days. Warm slightly before serving.'
    ],

    // 42. Masala Chai
    [
        'id' => 'kadak-masala-chai',
        'name' => 'Royal Kadak Masala Chai',
        'regional_name' => 'మసాలా టీ (Masala Tea)',
        'category' => 'Drinks and Juices',
        'cuisine' => 'Indian',
        'type' => 'Vegetarian',
        'prep_time' => 5,
        'cook_time' => 8,
        'servings' => 3,
        'difficulty' => 'Easy',
        'description' => 'Rich, invigorating Indian spiced milk tea brewed with crushed fresh ginger, cardamom, cinnamon, cloves, and premium CTC tea leaves.',
        'icon' => '☕',
        'accent_color' => '#EFEBE9',
        'ingredients' => [
            ['name' => 'Fresh Water', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'For boiling spices'],
            ['name' => 'Full Cream Whole Milk', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Rich creamy milk'],
            ['name' => 'CTC Black Tea Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Strong Assam or Nilgiri tea'],
            ['name' => 'Fresh Ginger (Allam)', 'quantity' => 1, 'unit' => 'inch piece', 'notes' => 'Crushed in mortar & pestle'],
            ['name' => 'Green Cardamom pods (Elaichi)', 'quantity' => 3, 'unit' => '', 'notes' => 'Crushed coarsely'],
            ['name' => 'Cloves (Lavangam)', 'quantity' => 2, 'unit' => '', 'notes' => 'Whole'],
            ['name' => 'Cinnamon stick (Dalchini)', 'quantity' => 0.5, 'unit' => 'inch', 'notes' => 'Whole'],
            ['name' => 'Black Peppercorns (Miriyalu)', 'quantity' => 2, 'unit' => '', 'notes' => 'Crushed (optional, for throat relief)'],
            ['name' => 'Sugar', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Adjust to taste']
        ],
        'steps' => [
            'In a saucepan, bring 1.5 cups of fresh water to a boil over medium flame.',
            'Coarsely crush fresh ginger, cardamom pods, cloves, cinnamon, and black pepper using a mortar and pestle.',
            'Add the crushed spices to the boiling water. Simmer on medium-low heat for 2 to 3 minutes until the water turns golden and fragrant with essential oils.',
            'Add the CTC tea leaves and sugar. Let the tea boil vigorously for 2 minutes to extract the rich malty tea flavor.',
            'Pour in 1.5 cups of whole milk. Bring the tea to a rolling boil over medium-high flame.',
            'Watch carefully as the milk foams and rises to the rim of the saucepan. Lower the flame to prevent overflowing.',
            'Simmer on low-medium flame for 2 to 3 minutes, raising and lowering the flame twice (the "pulling" technique) to infuse milk fats with spice and tea.',
            'Turn off the flame. Strain the hot aromatic chai through a fine mesh tea strainer into cups or traditional clay kulhads.',
            'Serve piping hot with crispy onion pakodis, biscuits, or hot punugulu.'
        ],
        'tips' => [
            'Always boil spices in water first before adding milk; milk prevents spices from releasing their full medicinal aroma.',
            'Fresh crushed ginger and cardamom yield an infinitely superior flavor compared to dry spice powders.'
        ],
        'substitutions' => [
            'Oat milk or soy milk can be used for a dairy-free vegan version.'
        ],
        'storage' => 'Best brewed and enjoyed fresh and steaming hot.'
    ]
];
