<?php
// includes/recipe-data-part3.php - Expansion recipes for Master Chef Academy & World Cuisines
declare(strict_types=1);

$recipes_part3 = [
    // 43. South Indian Filter Coffee
    [
        'id' => 'south-indian-filter-coffee',
        'name' => 'South Indian Filter Coffee (Degree Kaapi)',
        'regional_name' => 'ఫిల్టర్ కాఫీ (Filter Kaapi)',
        'category' => 'Drinks and Juices',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 5,
        'servings' => 2,
        'difficulty' => 'Easy',
        'description' => 'Aromatic, frothy, authentic South Indian degree filter coffee brewed with freshly ground plantation coffee and chicory decoction, poured back and forth in a traditional brass dabarah and tumbler.',
        'icon' => '☕',
        'accent_color' => '#EFEBE9',
        'image' => 'assets/images/recipes/South Indian Filter Coffee.jpg',
        'utensils' => ['Traditional stainless steel or brass coffee filter with pressing disc', 'Dabarah and tumbler set', 'Milk boiling saucepan'],
        'ingredients' => [
            ['name' => 'Filter Coffee Powder (80:20 Coffee to Chicory)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Coarse ground plantation peaberry / arabica blend'],
            ['name' => 'Fresh Boiling Water', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'Rolling boiling hot'],
            ['name' => 'Full Cream Whole Milk (Fat rich)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Boiled hot without diluting with water'],
            ['name' => 'Sugar', 'quantity' => 2, 'unit' => 'teaspoons', 'notes' => 'Adjust to taste']
        ],
        'steps' => [
            'Assemble the traditional coffee filter. Add 3 tablespoons of coffee powder into the upper pierced compartment.',
            'Place the perforated pressing disc gently over the powder. Do not press too hard; just level the coffee bed.',
            'Pour 3/4 cup of rolling boiling water over the pressing disc in a circular motion. Cover immediately with the lid.',
            'Let the decoction brew and drip slowly into the lower chamber undisturbed for 10 to 12 minutes. The result is thick, fragrant "first decoction".',
            'In a saucepan, bring full-cream whole milk to a boil on medium flame. Keep it steaming hot.',
            'Add 1 teaspoon of sugar and 3 tablespoons of thick dark decoction into the tumbler.',
            'Pour boiling hot milk from a height of 6-8 inches into the tumbler, allowing the stream to aerate the milk.',
            'Pour the coffee back and forth between the dabarah and tumbler 3 to 4 times (the "pulling" motion) to dissolve sugar and build a rich, creamy, frothy head.',
            'Serve piping hot in the brass dabarah set alongside hot breakfast or evening tiffin.'
        ],
        'tips' => [
            'Never reheat brewed coffee on direct stove heat; it burns the aromatic oils and turns sour and bitter.',
            'The 80:20 ratio (coffee to chicory) gives the iconic South Indian hotel strength, thickness, and rich caramel aroma.'
        ],
        'substitutions' => ['Raw cane jaggery (nattu sakkarai) can replace white sugar for traditional rustic flavor.'],
        'storage' => 'Fresh decoction keeps well in a closed stainless steel flask or refrigerator for up to 24 hours.',
        'related_lessons' => ['beg-measurements', 'beg-flame-control']
    ],

    // 44. Steamed Plain Rice
    [
        'id' => 'steamed-plain-rice',
        'name' => 'Steamed Plain Rice (Annam)',
        'regional_name' => 'వేడి వేడి అన్నం (Vedi Vedi Annam)',
        'category' => 'Rice and Biryani',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 5,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'The cornerstone of every South Indian meal: perfectly steamed, fluffy, separate grains of white rice ready to pair with ghee, pappu, sambar, and curries.',
        'icon' => '🍚',
        'accent_color' => '#FFFDE7',
        'image' => 'assets/images/recipes/Steamed Plain Rice.jpg',
        'utensils' => ['Deep heavy-bottom saucepan or pressure cooker', 'Measuring cup', 'Fork or flat spatula'],
        'ingredients' => [
            ['name' => 'Sona Masoori or Raw Rice', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Aged medium grain rice'],
            ['name' => 'Fresh Clean Water', 'quantity' => 3, 'unit' => 'cups', 'notes' => '1:2 ratio for soft fluffy grains'],
            ['name' => 'Pure Desi Ghee', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Optional for gloss and aroma']
        ],
        'steps' => [
            'Place rice in a bowl. Gently swirl with cold water and rinse 2 to 3 times until the cloudy surface starch washes away and water runs relatively clear.',
            'Drain excess water completely. Soak rice in clean water for 15 minutes to allow grains to hydrate evenly.',
            'Open-pot method: Add 3 cups of water and rice to a saucepan. Bring to a rolling boil over medium-high flame with lid off.',
            'When water reduces to the level of rice and steam craters appear on the surface (about 7-8 minutes), lower flame to absolute minimum.',
            'Cover tightly with a lid and let steam cook for 8 to 10 minutes.',
            'Turn off the heat. Leave the pot undisturbed with lid sealed for 10 minutes so internal steam finishes equalizing moisture.',
            'Gently fluff grains from the edges using a fork. Serve steaming hot with a dollop of fresh cow ghee and Andhra tomato pappu.'
        ],
        'tips' => [
            'Never stir boiling rice vigorously; stirring breaks fragile expanding starch grains and turns rice into porridge.',
            'For pressure cooker: Cook for 3 whistles on medium flame, then let pressure drop completely on its own.'
        ],
        'substitutions' => ['Basmati rice can be used with 1:1.75 water ratio; Brown rice requires 1:2.75 ratio and 40 minutes cooking.'],
        'storage' => 'Cool completely before refrigerating in an airtight container for up to 3 days. Reheat with 1 tbsp sprinkled water.'
    ],

    // 45. Maharashtrian & South Indian Poha
    [
        'id' => 'kanda-batata-poha',
        'name' => 'Homestyle Vegetable Poha (Atukulu Upma)',
        'regional_name' => 'అటుకుల ఉప్మా / పోహా (Atukula Upma)',
        'category' => 'South Indian Breakfast',
        'cuisine' => 'Indian',
        'type' => 'Vegetarian',
        'prep_time' => 10,
        'cook_time' => 12,
        'servings' => 3,
        'difficulty' => 'Easy',
        'description' => 'Light, fluffy, and nourishing flattened rice tossed with crunchy peanuts, diced potatoes, green chillies, turmeric, and fresh coriander finished with a squeeze of lemon.',
        'icon' => '🥣',
        'accent_color' => '#FEF3C7',
        'image' => 'assets/images/recipes/Homestyle Vegetable Poha.jpg',
        'utensils' => ['Fine colander/mesh strainer', 'Wide kadai', 'Spatula'],
        'ingredients' => [
            ['name' => 'Thick Poha (Flattened rice)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Do not use thin nylon poha'],
            ['name' => 'Raw Peanuts (Groundnuts)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For nutty crunch'],
            ['name' => 'Potato (Aloo)', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Peeled and finely diced'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Finely chopped'],
            ['name' => 'Green Chillies', 'quantity' => 2, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Turmeric Powder (Haldi)', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'For sunny golden color'],
            ['name' => 'Mustard Seeds', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Curry Leaves', 'quantity' => 10, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Cooking Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Groundnut or sunflower oil'],
            ['name' => 'Fresh Lemon Juice', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Squeezed at the end'],
            ['name' => 'Salt and Sugar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Balanced pinch']
        ],
        'steps' => [
            'Place thick poha in a colander. Rinse gently under running tap water for 20 seconds so all flakes are moist. Drain immediately.',
            'Sprinkle 1/2 tsp salt, 1/2 tsp sugar, and turmeric over the rinsed poha in the colander. Gently toss with fingers and let rest for 5 minutes (it absorbs moisture and fluffs up).',
            'Heat 2 tbsp oil in a wide kadai on medium flame. Add raw peanuts and fry until golden and crisp (2 mins). Remove half for garnish if desired.',
            'In the same hot oil, add mustard seeds and let them crackle. Add curry leaves, slit green chillies, and minced ginger.',
            'Add finely diced potatoes and a pinch of salt. Cover with a lid and cook on medium-low flame for 5 minutes until potato cubes are tender when poked with a fork.',
            'Add chopped onions and sauté for 2-3 minutes until translucent (do not brown).',
            'Lower the flame to low. Add the seasoned, fluffed poha into the kadai.',
            'Gently toss using a flat spatula from bottom to top until the golden turmeric color is evenly distributed across every flake.',
            'Cover with a lid and steam on lowest flame for 2 minutes so poha absorbs the aromas.',
            'Turn off the flame. Drizzle fresh lemon juice and garnish generously with chopped coriander leaves and crisp roasted peanuts. Serve warm.'
        ],
        'tips' => [
            'Never soak poha submerged in a bowl of water; it turns into a soggy mushy clump. Always rinse in a colander and drain instantly.',
            'Diced potatoes must be cut small (1/4 inch) so they cook quickly and evenly with the onions.'
        ],
        'substitutions' => ['Green peas (matar) and diced carrots can be added alongside potatoes for extra color.'],
        'storage' => 'Best enjoyed freshly prepared. If reheating, sprinkle 1 tbsp of water and microwave covered for 45 seconds.'
    ],

    // 46. Simple Comfort Dal (Yellow Moong / Toor Dal)
    [
        'id' => 'simple-comfort-dal',
        'name' => 'Simple Everyday Comfort Dal (Jeera Garlic Tadka Dal)',
        'regional_name' => 'సాదా పప్పు (Sada Pappu / Dal Fry)',
        'category' => 'Dal and Sambar',
        'cuisine' => 'Indian',
        'type' => 'Vegetarian',
        'prep_time' => 5,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Gentle, comforting yellow lentils pressure-cooked until creamy and infused with sizzling ghee, crushed garlic cloves, cumin seeds, and a hint of asafoetida.',
        'icon' => '🥣',
        'accent_color' => '#FFF8E1',
        'image' => 'assets/images/recipes/Simple Everyday Comfort Dal.jpg',
        'utensils' => ['Pressure cooker', 'Tadka ladle', 'Wooden masher (Mathani)'],
        'ingredients' => [
            ['name' => 'Yellow Moong Dal or Toor Dal', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed well'],
            ['name' => 'Water', 'quantity' => 2.5, 'unit' => 'cups', 'notes' => 'For pressure cooking'],
            ['name' => 'Turmeric Powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Golden glow'],
            ['name' => 'Desi Ghee', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'For authentic aroma'],
            ['name' => 'Cumin Seeds (Jeera)', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Whole'],
            ['name' => 'Garlic Cloves (Vellulli)', 'quantity' => 5, 'unit' => 'cloves', 'notes' => 'Crushed coarsely'],
            ['name' => 'Green Chilli', 'quantity' => 1, 'unit' => '', 'notes' => 'Slit'],
            ['name' => 'Asafoetida (Hing)', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Digestive balance'],
            ['name' => 'Curry Leaves', 'quantity' => 8, 'unit' => 'leaves', 'notes' => 'Fresh'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'To taste']
        ],
        'steps' => [
            'Rinse lentils thoroughly in water. Add to pressure cooker with 2.5 cups water and 1/2 tsp turmeric.',
            'Cook on medium flame for 3 to 4 whistles. Turn off stove and let steam release naturally.',
            'Open cooker, add salt, and mash dal smoothly with a wooden masher or whisk. If dal is too thick, stir in 1/2 cup warm water to reach creamy pouring consistency.',
            'In a small tadka pan, heat 1.5 tablespoons of ghee on medium flame.',
            'Add cumin seeds and let them sizzle for 5 seconds until fragrant and golden.',
            'Add crushed garlic cloves and sauté until garlic edges turn crisp golden brown.',
            'Add slit green chilli, hing, and fresh curry leaves; let them crackle for 3 seconds.',
            'Pour the hot sizzling ghee tadka directly into the mashed dal. Immediately cover with a lid for 3 minutes to trap the garlic aroma.',
            'Garnish with fresh coriander leaves and serve steaming with hot rice, ghee, or phulkas.'
        ],
        'tips' => [
            'Crushing garlic cloves with their skin on produces an earthier, more authentic aroma in the ghee.',
            'Always use warm water if thinning dal after cooking; cold water causes starch separation.'
        ],
        'substitutions' => ['Can be made with 50% moong dal and 50% masoor dal (red lentils) for speedy 8-minute cooking.'],
        'storage' => 'Keeps well refrigerated in a sealed container for up to 3 days. Reheat on stove with 2 tbsp water.'
    ],

    // 47. Homestyle Vegetable Stir-Fry
    [
        'id' => 'homestyle-vegetable-stir-fry',
        'name' => 'Everyday Vegetable Stir-Fry (Gobi Matar Carrot Fry)',
        'regional_name' => 'కూరగాయల వేపుడు (Kooragayala Vepudu)',
        'category' => 'Vegetarian Curries',
        'cuisine' => 'South Indian',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Easy',
        'description' => 'Crisp-tender medley of seasonal vegetables sautéed with mustard, cumin, curry leaves, turmeric, and freshly roasted spice powder. Clean, colorful, and healthy.',
        'icon' => '🥕',
        'accent_color' => '#F0FDF4',
        'image' => 'assets/images/recipes/Everyday Vegetable Stir-Fry (Gobi Matar Carrot Fry).jpg',
        'utensils' => ['Wide heavy-bottom Kadai', 'Cutting board & knife', 'Spatula'],
        'ingredients' => [
            ['name' => 'Carrots', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Diced small'],
            ['name' => 'Green Beans', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Finely chopped'],
            ['name' => 'Green Peas (Fresh or frozen)', 'quantity' => 0.5, 'unit' => 'cup', 'notes' => 'Rinsed'],
            ['name' => 'Mustard Seeds & Cumin', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Equal mix'],
            ['name' => 'Urad Dal', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'For crunch'],
            ['name' => 'Curry Leaves & Hing', 'quantity' => 1, 'unit' => 'pinch', 'notes' => 'Aromatics'],
            ['name' => 'Red Chilli Powder', 'quantity' => 0.75, 'unit' => 'teaspoon', 'notes' => 'Mild heat'],
            ['name' => 'Coriander Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Ground'],
            ['name' => 'Cooking Oil', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Sesame or peanut oil'],
            ['name' => 'Fresh Grated Coconut', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Optional garnish']
        ],
        'steps' => [
            'Chop carrots and beans into uniform 1/4-inch pieces so they cook at an identical pace.',
            'Heat oil in a heavy kadai on medium heat. Add mustard seeds, cumin seeds, and urad dal; fry until dal is golden.',
            'Add curry leaves and a pinch of hing. Add chopped carrots, beans, and green peas.',
            'Sprinkle turmeric and salt. Toss well to coat every vegetable in oil.',
            'Cover kadai with lid, reduce flame to medium-low, and let vegetables cook in their own steam for 7 to 8 minutes, stirring every 2 minutes.',
            'Remove the lid. Test a carrot piece; it should be fork-tender yet pleasantly crisp (not mushy).',
            'Sprinkle red chilli powder and coriander powder. Sauté on medium flame without lid for 3 minutes to roast spices.',
            'Turn off flame, toss in fresh grated coconut, and serve alongside hot rasam rice or chapatis.'
        ],
        'tips' => [
            'Do not add cups of water to the pan; vegetables sweat enough natural moisture under a tight lid to cook tenderly.',
            'Cooking uncovered in the last 3 minutes evaporates any excess surface moisture and browns vegetable edges.'
        ],
        'substitutions' => ['Cabbage, cauliflower florets, or sweet corn can be added to the medley.'],
        'storage' => 'Best served fresh. Stores refrigerated for up to 2 days.'
    ],

    // 48. Punjabi Chole Masala
    [
        'id' => 'punjabi-chole-masala',
        'name' => 'Dhaba Style Amritsari Chole Masala',
        'regional_name' => 'ఛోలే మసాలా (Chole Masala)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Rich, dark, and tangy chickpea curry cooked with black tea infusion, roasted whole spices, anardana (pomegranate seed powder), and finished with ginger juliennes and hot bhature or poori.',
        'icon' => '🍲',
        'accent_color' => '#FFF7ED',
        'image' => 'assets/images/recipes/Dhaba Style Amritsari Chole Masala.jpg',
        'utensils' => ['Pressure cooker', 'Heavy kadai', 'Tea bag or spice potli cloth'],
        'ingredients' => [
            ['name' => 'White Kabuli Chana (Chickpeas)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Soaked overnight 8 hours'],
            ['name' => 'Black Tea Bags or CTC Tea in cloth', 'quantity' => 2, 'unit' => 'bags', 'notes' => 'For authentic dark color and tannins'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'large', 'notes' => 'Finely minced'],
            ['name' => 'Tomatoes', 'quantity' => 3, 'unit' => 'pureed', 'notes' => 'Ripe red'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Fresh'],
            ['name' => 'Chole Masala Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'With roasted cumin & black pepper'],
            ['name' => 'Amchur (Dry Mango Powder) or Anardana', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Tangy kick'],
            ['name' => 'Desi Ghee & Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Cooking fat'],
            ['name' => 'Baking Soda', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'For melt-in-mouth soft chickpeas'],
            ['name' => 'Whole Spices (Bay leaf, cinnamon, black cardamom)', 'quantity' => 1, 'unit' => 'each', 'notes' => 'Whole']
        ],
        'steps' => [
            'Drain soaked chickpeas. Add to pressure cooker with 4 cups fresh water, 2 tea bags, whole spices, 1/4 tsp baking soda, and 1 tsp salt.',
            'Pressure cook on medium flame for 6 to 7 whistles until chickpeas are completely soft and smash easily between two fingers. Discard tea bags.',
            'Heat ghee and oil in a kadai. Add bay leaf and finely minced onions. Sauté patiently on medium heat for 10-12 minutes until deep golden brown.',
            'Add ginger-garlic paste and slit green chillies; sauté 2 minutes until raw aroma disappears.',
            'Add tomato purée, chole masala, turmeric, red chilli powder, and coriander powder. Cook until oil separates around edges.',
            'Add the cooked chickpeas along with their dark cooking broth into the kadai.',
            'Take a ladleful of chickpeas and mash them against the side of the kadai—this natural starch thickens the gravy.',
            'Simmer on medium-low flame for 12-15 minutes until spices meld and gravy thickens.',
            'Finish with amchur powder, crushed kasuri methi, and fresh ginger juliennes.',
            'Serve piping hot with puffed bhature, pooris, or steamed Basmati rice with pickled onions.'
        ],
        'tips' => [
            'Baking soda softens chickpea skins so the spices penetrate right to the center.',
            'Mashing 10% of cooked chickpeas in the gravy creates dhaba-style thickness without needing cornstarch.'
        ],
        'substitutions' => ['Canned chickpeas can be used to skip the pressure cooking step (simmer for 15 minutes in gravy).'],
        'storage' => 'Tastes even better the next day as chickpeas absorb spice gravy. Refrigerate for up to 4 days.'
    ],

    // 49. Rajma Masala
    [
        'id' => 'punjabi-rajma-masala',
        'name' => 'Homestyle Punjabi Rajma Masala',
        'regional_name' => 'రాజ్మా మసాలా (Rajma Masala)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 35,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'Melt-in-mouth red kidney beans slow-cooked in a rich, velvety onion-tomato bhuna masala with roasted spices, garlic, and pure desi ghee. The ultimate soul food.',
        'icon' => '🍲',
        'accent_color' => '#FFF1EB',
        'image' => 'assets/images/recipes/Homestyle Punjabi Rajma Masala.jpg',
        'utensils' => ['Pressure cooker', 'Heavy kadai', 'Masher'],
        'ingredients' => [
            ['name' => 'Red Kidney Beans (Chitra or Kashmiri Rajma)', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Soaked overnight for 8-10 hours'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'large', 'notes' => 'Finely grated or chopped'],
            ['name' => 'Tomatoes', 'quantity' => 3, 'unit' => 'large', 'notes' => 'Pureed smooth'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Fresh'],
            ['name' => 'Coriander & Cumin Powder', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Roasted ground'],
            ['name' => 'Kashmiri Red Chilli Powder', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Deep color'],
            ['name' => 'Garam Masala & Kasuri Methi', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Finishing touch'],
            ['name' => 'Desi Ghee / Butter', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Flavor base'],
            ['name' => 'Salt', 'quantity' => 1.5, 'unit' => 'teaspoons', 'notes' => 'To taste']
        ],
        'steps' => [
            'Drain soaked rajma. Add to pressure cooker with 4.5 cups water, 1 tsp salt, 1 black cardamom, and 1 bay leaf.',
            'Cook on medium flame for 7 to 8 whistles until beans are butter-soft when pressed. Do not discard the cooking water.',
            'In a separate kadai, heat 2 tablespoons of ghee. Add cumin seeds and let them sizzle.',
            'Add finely chopped onions and cook on medium flame for 12 minutes until caramel brown.',
            'Stir in ginger-garlic paste and sauté for 2 minutes. Add pureed tomatoes, chilli powder, coriander powder, and turmeric.',
            'Cook the masala patiently until it turns dark mahogany and releases glistening oil droplets.',
            'Pour in the cooked rajma along with its nutrient-rich cooking broth. Stir well.',
            'Mash a ladleful of rajma beans with the back of a spoon to thicken the gravy.',
            'Cover and simmer on low-medium flame for 20 minutes, stirring occasionally, until gravy is creamy and thick.',
            'Finish with crushed kasuri methi, a pinch of garam masala, and 1 tbsp butter. Serve warm with steamed Basmati rice.'
        ],
        'tips' => [
            'Chitra Rajma (speckled kidney beans) cooks softer and creamier than dark red hard varieties.',
            'Slow simmering for 20 minutes after combining beans and gravy is essential for the flavor to penetrate bean interiors.'
        ],
        'substitutions' => ['Black beans or pinto beans can be cooked with the identical masala base.'],
        'storage' => 'Stores beautifully in the fridge for up to 4 days.'
    ],

    // 50. Restaurant Style Shahi Paneer
    [
        'id' => 'restaurant-shahi-paneer',
        'name' => 'Royal Shahi Paneer (Cashew Saffron Gravy)',
        'regional_name' => 'షాహీ పన్నీర్ (Shahi Paneer)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 25,
        'servings' => 4,
        'difficulty' => 'Medium',
        'description' => 'A royal Mughlai vegetarian delicacy: tender paneer cubes bathed in a golden, creamy cashew-onion and tomato gravy scented with cardamom, saffron, mace, and fresh cream.',
        'icon' => '🧀',
        'accent_color' => '#FFFBEB',
        'image' => 'assets/images/recipes/Royal Shahi Paneer.jpg',
        'utensils' => ['Blender', 'Fine strainer', 'Heavy saucier / Kadai'],
        'ingredients' => [
            ['name' => 'Fresh Malai Paneer', 'quantity' => 250, 'unit' => 'grams', 'notes' => 'Cut into triangles or cubes'],
            ['name' => 'Cashew Nuts (Kaju)', 'quantity' => 18, 'unit' => 'whole', 'notes' => 'Soaked in warm water for 20 mins'],
            ['name' => 'Onions', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Boiled with cashews'],
            ['name' => 'Tomatoes', 'quantity' => 2, 'unit' => 'medium', 'notes' => 'Pureed and strained'],
            ['name' => 'Fresh Cream (Malai)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For velvet finish'],
            ['name' => 'Saffron Strands (Kesar)', 'quantity' => 12, 'unit' => 'strands', 'notes' => 'Soaked in 2 tbsp warm milk'],
            ['name' => 'Cardamom & Mace (Javitri) Powder', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Royal aromatics'],
            ['name' => 'Butter and Desi Ghee', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Rich base'],
            ['name' => 'Sugar or Honey', 'quantity' => 0.5, 'unit' => 'teaspoon', 'notes' => 'Balances mild sweetness']
        ],
        'steps' => [
            'In a small pot, boil roughly sliced onions and cashews in 1 cup water for 10 minutes until soft. Drain water and blend into an ultra-smooth white paste.',
            'Heat butter and ghee in a kadai on medium heat. Add green cardamom pods and cinnamon.',
            'Add ginger-garlic paste and sauté for 1 minute on gentle heat (do not brown).',
            'Add the cashew-onion paste and cook on low heat for 5-6 minutes until bubbly and thickened.',
            'Add strained tomato purée, Kashmiri red chilli powder, turmeric, and salt. Cook until tiny butter beads separate.',
            'Pour in 3/4 cup warm milk and soaked saffron milk. Whisk gently into a silky smooth golden gravy.',
            'Slide in the soft paneer cubes. Simmer on gentle low flame for just 3 minutes.',
            'Turn off the flame. Stir in fresh cream, cardamom-mace powder, and crushed kasuri methi.',
            'Garnish with silver vark or saffron strands and serve with hot butter naan or vegetable pulao.'
        ],
        'tips' => [
            'Boiling onions before blending removes raw pungent sharpness and produces an authentic hotel white-yellow base.',
            'Do not overcook paneer in boiling gravy; 3 minutes on low heat is all it needs to stay soft and tender.'
        ],
        'substitutions' => ['Tofu can be substituted for a vegan variation with coconut cream.'],
        'storage' => 'Thickens as it cools; reheat gently on low flame with 2 tbsp of warm milk.'
    ],

    // 51. Restaurant Style Dal Makhani
    [
        'id' => 'restaurant-dal-makhani',
        'name' => 'Iconic Restaurant Style Dal Makhani',
        'regional_name' => 'దాల్ మఖానీ (Dal Makhani)',
        'category' => 'Dal and Sambar',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 20,
        'cook_time' => 60,
        'servings' => 5,
        'difficulty' => 'Advanced',
        'description' => 'Whole black urad dal and red kidney beans slow-simmered for hours with butter, cream, ripe tomato purée, and finished with the authentic smoky Dhungar charcoal method.',
        'icon' => '🥣',
        'accent_color' => '#EFEBE9',
        'image' => 'assets/images/recipes/Iconic Restaurant Style Dal Makhani.jpg',
        'utensils' => ['Pressure cooker', 'Heavy stockpot or Handi', 'Charcoal piece & metal cup for Dhungar'],
        'ingredients' => [
            ['name' => 'Whole Black Urad Dal (Sabut Urad)', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Rinsed and soaked overnight 8-10 hours'],
            ['name' => 'Red Kidney Beans (Rajma)', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Soaked along with urad dal'],
            ['name' => 'Fresh Tomato Purée', 'quantity' => 1.5, 'unit' => 'cups', 'notes' => 'Smooth strained ripe tomatoes'],
            ['name' => 'Salted Butter (Makhan)', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'Added in stages'],
            ['name' => 'Fresh Cream', 'quantity' => 4, 'unit' => 'tablespoons', 'notes' => 'For richness'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Smooth'],
            ['name' => 'Degi / Kashmiri Chilli Powder', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Vibrant red color'],
            ['name' => 'Kasuri Methi', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Roasted and crushed'],
            ['name' => 'Natural Charcoal Briquette', 'quantity' => 1, 'unit' => 'piece', 'notes' => 'For Dhungar smoking technique']
        ],
        'steps' => [
            'Drain soaked black dal and rajma. Add to pressure cooker with 4.5 cups water, 1 tsp salt, and 1 tbsp butter.',
            'Cook on medium flame for 8 to 9 whistles until lentils are completely softened. Mash lightly with a wooden spoon.',
            'In a heavy handi, melt 2 tablespoons of butter on medium-low flame. Add ginger-garlic paste and sauté for 1 minute.',
            'Add fresh tomato purée and Kashmiri chilli powder. Simmer for 8 minutes until oil glistens.',
            'Add the cooked dal and its rich cooking liquid into the handi. Stir thoroughly.',
            'Simmer on lowest heat for 35 to 45 minutes, stirring every 5 minutes to prevent sticking at the base. As it simmers, the starch breaks down into a creamy emulsion.',
            'Add remaining 2 tbsp butter, fresh cream, and crushed kasuri methi. Simmer for 5 more minutes.',
            'The Dhungar Smoke: Place a small stainless steel cup in the center of the dal. Heat a piece of charcoal on open flame until red hot. Place coal in the cup, pour 1/2 tsp ghee over the coal, and instantly cover with a tight lid for 5 minutes.',
            'Remove coal and cup. Swirl dal, garnish with cream and a knob of white butter, and serve with garlic naan.'
        ],
        'tips' => [
            'The secret to restaurant dal makhani is patience: slow simmering breaks the lentil starch into natural creaminess.',
            'Never skip the charcoal smoking step; it provides the signature rustic tandoor flavor.'
        ],
        'substitutions' => ['White butter (makkhan) gives the most authentic Punjabi taste.'],
        'storage' => 'Keeps well refrigerated for 4 days. Flavor improves overnight.'
    ],

    // 52. Restaurant Style Butter Chicken
    [
        'id' => 'restaurant-butter-chicken',
        'name' => 'Restaurant Style Murgh Makhani (Butter Chicken)',
        'regional_name' => 'బటర్ చికెన్ (Butter Chicken)',
        'category' => 'Non-Vegetarian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Non-Vegetarian',
        'prep_time' => 30,
        'cook_time' => 30,
        'servings' => 4,
        'difficulty' => 'Advanced',
        'description' => 'Succulent tandoori-spiced chicken pieces char-grilled and simmered in a velvet-smooth, buttery tomato and cashew makhani gravy infused with fenugreek and honey.',
        'icon' => '🍗',
        'accent_color' => '#FFF1EB',
        'image' => 'assets/images/recipes/Restaurant Style Murgh Makhani(Butter Chicken).jpg',
        'utensils' => ['Cast iron grill pan or tawa', 'Blender', 'Fine strainer', 'Heavy kadai'],
        'ingredients' => [
            ['name' => 'Boneless Chicken (Thigh pieces preferred)', 'quantity' => 500, 'unit' => 'grams', 'notes' => 'Cut into bite-sized chunks'],
            ['name' => 'Hung Curd (Greek yogurt)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Thick yogurt'],
            ['name' => 'Ginger-Garlic Paste', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Divided'],
            ['name' => 'Kashmiri Chilli Powder', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Vibrant natural red'],
            ['name' => 'Mustard Oil', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'For marinade bind'],
            ['name' => 'Ripe Tomatoes', 'quantity' => 5, 'unit' => 'medium', 'notes' => 'Boiled with cashews & strained'],
            ['name' => 'Cashew Nuts', 'quantity' => 15, 'unit' => 'nuts', 'notes' => 'Boiled and pureed'],
            ['name' => 'Salted Butter', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Makhani base'],
            ['name' => 'Fresh Cream', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Rich finish'],
            ['name' => 'Kasuri Methi', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Crushed dried fenugreek'],
            ['name' => 'Honey or Sugar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Balances tomato acidity']
        ],
        'steps' => [
            'Marinate chicken: Mix chicken with hung curd, 1 tbsp ginger-garlic paste, 1 tbsp Kashmiri chilli powder, mustard oil, garam masala, and 1 tsp salt. Marinate for at least 1 hour.',
            'Heat a heavy cast iron grill pan on medium-high flame. Sear marinated chicken chunks with 1 tsp butter for 8-10 minutes until edges develop dark charred spots. Set aside.',
            'Prepare makhani sauce: Boil tomatoes, cashews, cardamom, and cinnamon in 1 cup water for 12 minutes. Blend into a smooth puree and strain through a fine metal sieve to discard skins and seeds.',
            'In a clean kadai, melt 2 tablespoons of butter on medium heat. Sauté remaining ginger-garlic paste for 1 minute.',
            'Pour in the strained velvety tomato-cashew puree, remaining Kashmiri chilli powder, and salt. Simmer on low heat for 10 minutes until oil droplets form on top.',
            'Slide the char-grilled chicken chunks into the bubbling makhani gravy. Simmer for 6 to 8 minutes until chicken is cooked through and tender.',
            'Stir in honey, crushed kasuri methi, and fresh heavy cream. Simmer for 1 minute.',
            'Garnish with ginger juliennes, cream swirls, and serve with hot butter naan or tandoori roti.'
        ],
        'tips' => [
            'Always use chicken thigh meat instead of breast; thighs stay juicy, tender, and moist during grilling and simmering.',
            'Straining the tomato puree through a fine sieve is what creates the trademark velvet restaurant texture.'
        ],
        'substitutions' => ['Paneer cubes or roasted cauliflower can be used for a vegetarian version.'],
        'storage' => 'Refrigerate in a sealed container for up to 3 days.'
    ],

    // 53. Restaurant Style Garlic Butter Naan
    [
        'id' => 'restaurant-style-naan',
        'name' => 'Restaurant Style Garlic Butter Naan (Tawa Method)',
        'regional_name' => 'గార్లిక్ బటర్ నాన్ (Garlic Naan)',
        'category' => 'North Indian Dishes',
        'cuisine' => 'North Indian',
        'type' => 'Vegetarian',
        'prep_time' => 30,
        'cook_time' => 15,
        'servings' => 4,
        'difficulty' => 'Intermediate',
        'description' => 'Pillowy, chewy, blistered restaurant flatbread made without a tandoor oven using a standard iron tawa and open gas flame, brushed with garlic-infused melted butter.',
        'icon' => '🫓',
        'accent_color' => '#FFFBEB',
        'image' => 'assets/images/recipes/Restaurant Style Garlic Butter Naan.jpg',
        'utensils' => ['Heavy cast iron tawa with handle (NOT non-stick)', 'Rolling pin', 'Pastry brush', 'Tongs'],
        'ingredients' => [
            ['name' => 'All-Purpose Flour (Maida)', 'quantity' => 2, 'unit' => 'cups', 'notes' => 'Or 50:50 maida and whole wheat'],
            ['name' => 'Fresh Curd (Yogurt)', 'quantity' => 0.25, 'unit' => 'cup', 'notes' => 'Room temperature for soft crumb'],
            ['name' => 'Baking Powder', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Leavening'],
            ['name' => 'Baking Soda', 'quantity' => 0.25, 'unit' => 'teaspoon', 'notes' => 'Reacts with curd'],
            ['name' => 'Sugar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Aids caramel blistering'],
            ['name' => 'Warm Water or Milk', 'quantity' => 0.75, 'unit' => 'cup', 'notes' => 'For soft dough'],
            ['name' => 'Fresh Garlic', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Finely minced'],
            ['name' => 'Nigella Seeds (Kalonji) or Coriander', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Garnish'],
            ['name' => 'Butter', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'Melted for brushing']
        ],
        'steps' => [
            'In a large bowl, whisk flour, baking powder, baking soda, sugar, and 1 tsp salt.',
            'Add fresh curd and 1 tbsp oil. Gradually knead with warm water for 6-8 minutes into a very soft, smooth, elastic dough.',
            'Coat dough lightly with oil, cover with a damp cloth, and let rest in a warm corner for 45 minutes to 1 hour.',
            'Divide dough into 6 equal smooth balls. Roll each ball into an oval teardrop shape (1/4 inch thick).',
            'Sprinkle minced garlic and chopped coriander over the rolled naan; gently press with rolling pin to adhere.',
            'Flip naan over. Brush the entire underside generously with plain water (water acts as glue on the hot tawa).',
            'Heat a heavy cast iron tawa on medium-high until hot. Carefully lay the wet side of naan directly onto the hot tawa.',
            'In 30 seconds, large blisters and bubbles will puff up across the top surface.',
            'Lift the tawa by its handle, invert it upside down directly over the open gas burner flame (about 2-3 inches above flame).',
            'Rotate tawa gently over the fire to cook the top surface until leopard-spot dark brown chars form (about 45-60 seconds).',
            'Turn tawa right side up, scrape naan off with a metal spatula, brush generously with melted butter, and serve piping hot.'
        ],
        'tips' => [
            'NEVER use a non-stick Teflon pan for this recipe; non-stick coating prevents the wet dough from sticking, so it falls into the open fire when inverted!',
            'Water on the underside creates intense steam against the iron tawa, mimicking tandoor clay walls.'
        ],
        'substitutions' => ['Whole wheat flour (atta) can replace 50% or 100% of maida for a wholesome variation.'],
        'storage' => 'Best eaten immediately hot and crisp off the stove.'
    ],

    // 54. Restaurant Style Hakka Noodles
    [
        'id' => 'restaurant-hakka-noodles',
        'name' => 'Street Style Veg Hakka Noodles',
        'regional_name' => 'హక్కా నూడుల్స్ (Hakka Noodles)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Indo-Chinese',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 10,
        'servings' => 3,
        'difficulty' => 'Medium',
        'description' => 'Chewy, springy wheat noodles wok-tossed on high flame with shredded cabbage, carrots, bell peppers, spring onions, garlic, and savory soy-chilli seasoning with authentic wok hei.',
        'icon' => '🥢',
        'accent_color' => '#FFFBEB',
        'image' => 'assets/images/recipes/Street Style Veg Hakka Noodles.jpg',
        'utensils' => ['Carbon steel wok or wide kadai', 'Large pot for boiling noodles', 'Colander & tongs'],
        'ingredients' => [
            ['name' => 'Hakka Noodles (Dry)', 'quantity' => 200, 'unit' => 'grams', 'notes' => 'Eggless wheat noodles'],
            ['name' => 'Shredded Cabbage', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'Finely shredded'],
            ['name' => 'Carrot', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Cut into thin matchstick juliennes'],
            ['name' => 'Capsicum (Green Bell Pepper)', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Thinly sliced'],
            ['name' => 'Spring Onions', 'quantity' => 3, 'unit' => 'stalks', 'notes' => 'Whites and greens separated'],
            ['name' => 'Garlic', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Finely minced'],
            ['name' => 'Dark Soy Sauce', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Savory umami'],
            ['name' => 'Red Chilli Sauce or Green Chilli Sauce', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Heat'],
            ['name' => 'White Vinegar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Tangy kick'],
            ['name' => 'Crushed Black Pepper', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Freshly ground'],
            ['name' => 'Cooking Oil', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'High heat oil']
        ],
        'steps' => [
            'Bring 6 cups of water to a rolling boil with 1 tsp salt and 1 tsp oil in a large stockpot.',
            'Add noodles and boil for 4 to 5 minutes until "al dente" (90% cooked with a slight bite). Do not overcook.',
            'Drain immediately in a colander. Rinse under cold tap water to stop cooking. Toss with 1 tsp oil to prevent sticking.',
            'Heat 2 tablespoons of oil in a wok on maximum high flame until smoking hot.',
            'Add minced garlic and spring onion whites; toss vigorously for 20 seconds.',
            'Add carrots, cabbage, and capsicum. Stir-fry on highest flame for 2 minutes (vegetables must remain crunchy).',
            'Add the boiled, oiled noodles into the wok.',
            'Pour dark soy sauce, chilli sauce, vinegar, crushed black pepper, and 1/2 tsp salt along the edges of the smoking wok.',
            'Using two spatulas or cooking tongs, toss noodles vigorously on high heat for 2 minutes until evenly coated in sauce.',
            'Turn off flame, toss in chopped spring onion greens, and serve immediately with chilli paneer or Manchurian.'
        ],
        'tips' => [
            'Never overboil noodles; al dente noodles absorb wok sauces without turning into a mushy clump.',
            'High flame stir-frying keeps vegetables crunchy and caramelizes soy sauce against the wok walls for that smoky street-side aroma.'
        ],
        'substitutions' => ['Shredded chicken, scramble egg, or paneer can be tossed in for extra protein.'],
        'storage' => 'Best enjoyed immediately fresh from the wok.'
    ],

    // 55. Indo-Chinese Chilli Paneer
    [
        'id' => 'restaurant-chilli-paneer',
        'name' => 'Indo-Chinese Crispy Chilli Paneer',
        'regional_name' => 'చిల్లీ పన్నీర్ (Chilli Paneer)',
        'category' => 'Evening Snacks',
        'cuisine' => 'Indo-Chinese',
        'type' => 'Vegetarian',
        'prep_time' => 15,
        'cook_time' => 15,
        'servings' => 3,
        'difficulty' => 'Medium',
        'description' => 'Crispy batter-fried paneer cubes tossed in a spicy, tangy, glossy Indo-Chinese sauce with crunchy bell peppers, diced onions, green chillies, and toasted sesame.',
        'icon' => '🥢',
        'accent_color' => '#FFF1EB',
        'image' => 'assets/images/recipes/Indo-Chinese Crispy Chilli Paneer.jpg',
        'utensils' => ['Deep frying kadai', 'Wok', 'Perforated skimmer'],
        'ingredients' => [
            ['name' => 'Fresh Paneer', 'quantity' => 250, 'unit' => 'grams', 'notes' => 'Cut into bite-sized cubes'],
            ['name' => 'Cornflour (Cornstarch)', 'quantity' => 3, 'unit' => 'tablespoons', 'notes' => 'For crispy coating and slurry'],
            ['name' => 'All-Purpose Flour (Maida)', 'quantity' => 2, 'unit' => 'tablespoons', 'notes' => 'Crisp crust'],
            ['name' => 'Capsicum (Bell Pepper)', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Cut into square cubes'],
            ['name' => 'Onion', 'quantity' => 1, 'unit' => 'medium', 'notes' => 'Cut into petals'],
            ['name' => 'Green Chillies', 'quantity' => 3, 'unit' => '', 'notes' => 'Slit lengthwise'],
            ['name' => 'Garlic', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Finely chopped'],
            ['name' => 'Dark Soy Sauce & Red Chilli Sauce', 'quantity' => 1.5, 'unit' => 'tablespoons', 'notes' => 'Each'],
            ['name' => 'Tomato Ketchup', 'quantity' => 1, 'unit' => 'tablespoon', 'notes' => 'Sweet balance'],
            ['name' => 'Vinegar', 'quantity' => 1, 'unit' => 'teaspoon', 'notes' => 'Tangy kick'],
            ['name' => 'Oil for Deep Frying & Stir-Frying', 'quantity' => 1, 'unit' => 'cup', 'notes' => 'High smoke point']
        ],
        'steps' => [
            'In a bowl, mix 2 tbsp cornflour, 2 tbsp maida, 1/2 tsp pepper, 1/2 tsp salt, and 3-4 tbsp water to form a medium-thick batter.',
            'Coat paneer cubes in the batter. Deep fry in hot oil (175°C) for 3-4 minutes until light golden and crisp. Drain on paper towels.',
            'In a separate wok, heat 1.5 tablespoons of oil on high flame. Add chopped garlic, ginger, and slit green chillies; sauté 30 seconds.',
            'Add onion petals and capsicum cubes. Stir-fry on high flame for 90 seconds until glossy but still crunchy.',
            'Add soy sauce, red chilli sauce, tomato ketchup, vinegar, and 1/4 cup water.',
            'Mix 1 tsp cornflour in 2 tbsp cold water to make a slurry. Pour into the bubbling wok sauce; stir continuously for 30 seconds until the sauce turns clear, thick, and glossy.',
            'Add the crispy fried paneer cubes and toss vigorously for 45 seconds so each piece is glazed in sauce.',
            'Garnish with chopped spring onion greens and serve immediately while sizzling crisp.'
        ],
        'tips' => [
            'Toss paneer in the sauce immediately before serving; letting it sit makes the crispy coating soggy.',
            'Cornflour slurry must be mixed with cold water before adding to hot pan to prevent lumping.'
        ],
        'substitutions' => ['Cauliflower florets can replace paneer for crispy Gobi Manchurian.'],
        'storage' => 'Best eaten immediately.'
    ]
];
