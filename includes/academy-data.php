<?php
// includes/academy-data.php - Comprehensive Lessons, Levels, Skills & Modules for Master Chef Academy
declare(strict_types=1);

/**
 * Returns all Academy Levels and their metadata
 */
function get_academy_levels(): array {
    return [
        'beginner' => [
            'id' => 'beginner',
            'level_number' => 1,
            'title' => 'Beginner Cook',
            'tagline' => 'Kitchen Fundamentals & Everyday Essentials',
            'badge' => '🌱 Level 1',
            'icon' => '🍳',
            'color' => '#15803D', // Herb Green
            'bg_light' => '#F0FDF4',
            'border_color' => '#86EFAC',
            'description' => 'Perfect for anyone starting out in the kitchen. Master essential knife safety, flame management, accurate measurements, fundamental tadka, and daily comfort staples like rice, idli, upma, and dal.',
            'target_audience' => 'First-time cooks, beginners wanting structured fundamentals.',
            'modules' => ['basic-skills', 'everyday-staples', 'breakfast-foundations', 'dal-and-veggies']
        ],
        'intermediate' => [
            'id' => 'intermediate',
            'level_number' => 2,
            'title' => 'Intermediate Home Cook',
            'tagline' => 'Flavor Architecture, Gravies & Coordinated Family Meals',
            'badge' => '🔥 Level 2',
            'icon' => '🍲',
            'color' => '#D97706', // Saffron Gold
            'bg_light' => '#FFFBEB',
            'border_color' => '#FDE68A',
            'description' => 'Progress beyond simple recipes. Learn to build onion-tomato gravy bases, balance acidity and spices, master flatbread doughs, perfect rice texture, and coordinate complete multi-dish family meals.',
            'target_audience' => 'Home cooks ready to cook whole balanced meals effortlessly.',
            'modules' => ['gravy-foundations', 'dough-and-breads', 'pulses-and-legumes', 'meal-orchestration']
        ],
        'advanced' => [
            'id' => 'advanced',
            'level_number' => 3,
            'title' => 'Advanced Home Cook',
            'tagline' => 'Biryani Dum Science, Festival Sweets & World Cooking',
            'badge' => '🌟 Level 3',
            'icon' => '🥘',
            'color' => '#C2410C', // Warm Terracotta
            'bg_light' => '#FFF7ED',
            'border_color' => '#FDBA74',
            'description' => 'Introduce culinary precision: dum steam management, blooming whole spices, meat browning, sugar syrup stages (kambi pakam) for sweets, yeast fermentation, and artisanal dough handling.',
            'target_audience' => 'Experienced cooks tackling special occasions, festivals, and world cuisines.',
            'modules' => ['dum-science', 'confectionery-science', 'baking-and-doughs', 'advanced-curries']
        ],
        'restaurant' => [
            'id' => 'restaurant',
            'level_number' => 4,
            'title' => 'Restaurant Chef at Home',
            'tagline' => 'Mother Gravies, Smoky Tandoor Flavors & Professional Mise en Place',
            'badge' => '👑 Level 4',
            'icon' => '👨‍🍳',
            'color' => '#7C2D12', // Deep Burgundy / Chef Maroon
            'bg_light' => '#FDF4FF',
            'border_color' => '#F0ABFC',
            'description' => 'Create restaurant-quality gravies, silk-smooth sauces, tandoori marinades, and high-heat Indo-Chinese favorites right in your home kitchen using ordinary stove equipment without commercial machinery.',
            'target_audience' => 'Enthusiasts wanting authentic dhaba, hotel, and restaurant taste at home.',
            'modules' => ['mother-gravies', 'tandoori-and-starters', 'professional-workflow', 'indo-chinese-mastery']
        ]
    ];
}

/**
 * Returns comprehensive structured cooking lessons
 */
function get_academy_lessons(): array {
    return [
        // ================= LEVEL 1: BEGINNER LESSONS =================
        'beg-measurements' => [
            'id' => 'beg-measurements',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Understanding Teaspoons, Tablespoons, Cups, Grams & Millilitres',
            'icon' => '⚖️',
            'read_time' => 8,
            'summary' => 'Master measuring dry and liquid ingredients with precision to guarantee consistent recipe results every time.',
            'dish_type' => 'Kitchen Skill',
            'required_utensils' => ['Standard measuring spoons (1 tbsp, 1 tsp, 1/2 tsp, 1/4 tsp)', 'Measuring cups (1 cup, 1/2 cup, 1/3 cup, 1/4 cup)', 'Kitchen measuring glass with ml markings'],
            'core_concepts' => [
                'Level vs. Heaped: Always level dry spices across the top edge with a flat butter knife unless a recipe explicitly calls for a "heaped" spoon.',
                'The Volume Hierarchy: 1 tablespoon (tbsp) = exactly 3 teaspoons (tsp) = 15 ml. 1 standard Indian cooking cup = 240 ml to 250 ml.',
                'Dry vs. Liquid Measuring: Liquid ingredients have surface tension (the meniscus curve). Read liquid volume at eye level from the bottom of the curve.',
                'Flour & Powder Density: Never pack flour or besan tightly into a cup; fluff it with a fork first, scoop gently, and sweep the top flat.'
            ],
            'visual_indicators' => 'A leveled spoon holds a uniform flat powder surface. Liquids should touch the exact graduated line when the cup rests on a flat table.',
            'common_mistakes' => [
                'Using domestic dining spoons for measuring spices: Dining soup spoons vary wildly between 8 ml and 22 ml, throwing off salt and chilli balances.',
                'Scooping flour by slamming the cup into a tight container: This packs 30% extra flour into the cup, making doughs tough and cakes rubbery.'
            ],
            'corrections' => [
                'Keep an inexpensive set of color-coded standard measuring spoons dedicated solely to your spice box.',
                'Sift or fluff flours before measuring, or weigh ingredients with a simple digital scale for absolute consistency.'
            ],
            'related_recipes' => ['soft-idli', 'rava-upma', 'classic-gulab-jamun'],
            'flame_notes' => 'N/A (Preparation technique)'
        ],

        'beg-veg-prep' => [
            'id' => 'beg-veg-prep',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Washing, Peeling, Chopping & Basic Knife Safety',
            'icon' => '🔪',
            'read_time' => 10,
            'summary' => 'Learn the "claw grip", safe cutting board stabilization, and how to prep vegetables cleanly without kitchen accidents.',
            'dish_type' => 'Kitchen Skill',
            'required_utensils' => ['Chef knife (7-8 inch) or Santoku knife', 'Sturdy wooden or BPA-free cutting board', 'Damp kitchen cloth for base stabilization', 'Vegetable peeler'],
            'core_concepts' => [
                'The Damp Cloth Rule: Always place a damp cloth or wet paper towel underneath your cutting board. This completely prevents board slippage on granite countertops.',
                'The "Bear Claw" Grip: Curl the fingertips of your non-knife guide hand inward like a bear claw, resting the flat side of the knife blade against your knuckles. Never expose fingertips.',
                'The Rocking Motion: Keep the tip of the chef knife in gentle contact with the board and rock smoothly down and forward through the food.',
                'Washing Order: Wash leafy greens and root vegetables thoroughly in cold water BEFORE cutting to retain natural vitamins and prevent dirt from entering cut surfaces.'
            ],
            'visual_indicators' => 'Evenly sliced vegetable batons or dices that cook at identical speeds in the pot.',
            'common_mistakes' => [
                'Using a dull knife: Dull knives require excessive downward pressure and slip sideways, causing more severe cuts than sharp knives.',
                'Washing mushrooms or cut okra under high-pressure running water: Okra becomes extremely slimy when washed after slicing; always wash whole and wipe completely dry.'
            ],
            'corrections' => [
                'Hone your knife weekly with a honing steel or pull-through sharpener.',
                'Wash whole ladyfingers/okra, spread them on a clean cotton towel to dry 100%, and only then trim and chop.'
            ],
            'related_recipes' => ['andhra-bendakaya-fry', 'beans-poriyal', 'andhra-potato-fry'],
            'flame_notes' => 'N/A (Preparation technique)'
        ],

        'beg-flame-control' => [
            'id' => 'beg-flame-control',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Mastering Low, Medium, High Flame & Pan Temperatures',
            'icon' => '🔥',
            'read_time' => 9,
            'summary' => 'Discover how flame regulation controls caramelization, prevents burnt spices, and develops tender curries.',
            'dish_type' => 'Core Technique',
            'required_utensils' => ['Heavy-bottomed kadai or stainless steel saucepan', 'Lid with steam vent'],
            'core_concepts' => [
                'Low Flame (Simmer / Dum): The flame circle is small; liquid barely trembles with intermittent slow bubbles. Essential for melting ghee, blooming delicate spices (hing, jeera), braising dals, and dough steaming.',
                'Medium Flame (Everyday Cooking): The flame envelops the pan bottom without climbing the outer sides. Ideal for sweating onions, sautéing ginger-garlic paste, cooking vegetables, and pan-frying.',
                'High Flame (Boiling & Searing): Flame covers the full base. Used for bringing water or gravies to a rolling boil, searing meats, and rapid Chinese wok stir-frying. Never add dry spices directly on high heat!'
            ],
            'visual_indicators' => 'Medium heat sizzles food gently upon contact. High heat causes immediate smoking or oil spitting. Low heat maintains gentle, fragrant warmth.',
            'common_mistakes' => [
                'Adding mustard seeds or ground chilli powder to scorching high-heat oil: Spices burn in 3 seconds, turning black, acrid, and bitter.',
                'Attempting to speed up slow cooking by blasting high flame: Dries up gravy while leaving inside vegetables or meat raw.'
            ],
            'corrections' => [
                'Always lower heat to minimum when adding red chilli powder, turmeric, or coriander powder to oil, or mix them with 1 tbsp of water into a paste first.',
                'Trust the cooking clock: gentle medium-low simmering allows spice oils to emulsify with onions and tomatoes.'
            ],
            'related_recipes' => ['andhra-tomato-pappu', 'hotel-style-sambar', 'kadak-masala-chai'],
            'flame_notes' => 'Low: gentle simmer (90-95°C) | Medium: sautéing (130-160°C) | High: rolling boil (100°C) / searing (180°C+)'
        ],

        'beg-utensils-guide' => [
            'id' => 'beg-utensils-guide',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Understanding Essential Indian Cooking Utensils',
            'icon' => '🫕',
            'read_time' => 8,
            'summary' => 'A guide to kadais, pressure cookers, tawa, tadka pans, steamers, and spatulas for homestyle efficiency.',
            'dish_type' => 'Kitchen Equipment',
            'required_utensils' => ['Heavy cast iron tawa', 'Hard anodized or stainless steel Kadai', 'Pressure cooker with whistle', 'Small tadka ladle'],
            'core_concepts' => [
                'Cast Iron Tawa: Retains heavy thermal mass, ensuring even heat distribution for crisp dosas and soft rotis without hot spots.',
                'Heavy-Bottom Kadai: Slanted sides allow rapid evaporation for curries and deep enough volume for safe oil frying.',
                'Tadka Pan (Popu Gitte): Small concentrated base that heats 1-2 tbsp of oil/ghee quickly to bloom mustard and cumin seeds efficiently without wasting oil.',
                'Pressure Cooker: Uses steam pressure (15 psi) to raise boiling point of water to 121°C, cooking toor dal in 10 minutes instead of 45 minutes.'
            ],
            'visual_indicators' => 'Cast iron tawa smokes lightly when properly seasoned and ready for batter; pressure cooker releases a steady rhythmic plume of steam.',
            'common_mistakes' => [
                'Washing hot cast iron pans with harsh detergent soap or cold water immediately after cooking: Destroys polymer seasoning and causes thermal warping.',
                'Opening pressure cooker while the safety indicator pin is still elevated.'
            ],
            'corrections' => [
                'Wipe cast iron with a damp cloth or warm water only, dry thoroughly on a warm stove, and rub with 2 drops of sesame oil.',
                'Always wait for steam pressure to drop naturally (or lift whistle gently with a fork to test resistance before twisting the lid).'
            ],
            'related_recipes' => ['crispy-plain-dosa', 'soft-phulka-chapati', 'andhra-tomato-pappu'],
            'flame_notes' => 'Match pan diameter to the burner ring to prevent flame licking up handles.'
        ],

        'beg-ginger-garlic-paste' => [
            'id' => 'beg-ginger-garlic-paste',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Preparing Fresh Homemade Ginger-Garlic Paste (Allam Vellulli Mudda)',
            'icon' => '🧄',
            'read_time' => 7,
            'summary' => 'Ditch preservative-heavy store packets. Learn the golden 60:40 ratio, oil emulsion, and airtight storage for 3 weeks.',
            'dish_type' => 'Foundation Paste',
            'required_utensils' => ['Small dry mixer jar / chutney grinder', 'Peeler or edge of stainless steel spoon', 'Airtight glass container'],
            'core_concepts' => [
                'The Golden Ratio: 60% garlic to 40% ginger (or 1:1 by weight). Ginger has more fiber and pungent sharpness, while garlic brings savory sweetness.',
                'Moisture is the Enemy: Wash both ginger and garlic first, then let them dry 100% on a kitchen towel. Adding raw water during grinding causes paste to spoil within 3 days.',
                'Natural Preservation: Blend with 1 teaspoon of non-iodized salt and 1 tablespoon of neutral oil (or sesame oil). Oil seals out oxygen, maintaining creamy color without turning green or brown.'
            ],
            'visual_indicators' => 'Silky, aromatic, pale golden-ivory paste without stringy coarse fibers.',
            'common_mistakes' => [
                'Adding tap water to make it grind faster: Causes bacteria growth, foul fermented odor, and green discoloration in the fridge.',
                'Frying ginger-garlic paste on high flame in hot oil: Garlic burns quickly and becomes bitter. Always sauté on medium-low flame until raw aroma disappears.'
            ],
            'corrections' => [
                'Use the oil in the blender to aid blending instead of water.',
                'Store in an airtight glass jar in the coldest part of your refrigerator for up to 3 weeks, or freeze in an ice cube tray for 3 months.'
            ],
            'related_recipes' => ['andhra-chicken-curry', 'restaurant-paneer-butter-masala', 'vegetable-pulao'],
            'flame_notes' => 'Sauté on medium-low flame (1-2 mins) until fragrant.'
        ],

        'beg-spice-identification' => [
            'id' => 'beg-spice-identification',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Basic Spice Identification & The Sacred Spice Box (Annam Para Brahma)',
            'icon' => '🌶️',
            'read_time' => 9,
            'summary' => 'Decode Mustard, Cumin, Fenugreek, Urad, Chana Dal, Turmeric, Asafoetida (Hing), and Curry Leaves.',
            'dish_type' => 'Spice Mastery',
            'required_utensils' => ['Traditional 7-compartment Anjarai Petti / Masala Dabba', 'Small spice spoon'],
            'core_concepts' => [
                'Mustard Seeds (Avalu/Rai): Pungent, round black seeds. Must splutter in hot oil to crack their outer shell and release nutty sulfur compounds.',
                'Cumin Seeds (Jeera/Jilakara): Earthy, warm, elongated seeds. Add immediately after mustard splutters; sizzles in 5 seconds without burning.',
                'Fenugreek Seeds (Menthulu): Square amber pebbles. Extremely bitter if burnt; use sparingly (1/4 tsp) to enhance sambar and pickles with maple-like aromatics.',
                'Asafoetida (Hing/Inguva): Dried plant resin powder. Replaces onion/garlic notes with intense savory umami. Always bloom in warm oil for 3 seconds.',
                'Fresh Curry Leaves (Karivepaku): Releases citrusy herbal essential oils when sizzled in hot oil. Dry with a towel to prevent violent oil splattering.'
            ],
            'visual_indicators' => 'Mustard seeds pop and jump; cumin seeds turn golden brown and swell; hing blooms into an intoxicating savory fragrance.',
            'common_mistakes' => [
                'Dumping all spices simultaneously into the oil: Mustard takes 15 seconds to pop, while cumin burns in 6 seconds.',
                'Burning hing: Overheated hing turns grey and produces a scorched rubber odor.'
            ],
            'corrections' => [
                'Follow the strict traditional sequence: 1) Mustard seeds -> 2) Dals (Urad/Chana) -> 3) Cumin seeds -> 4) Dry red chillies -> 5) Hing & Curry leaves.',
                'If you burn your tadka, discard it and start fresh with a clean pan. Burnt tadka spoils the entire pot of dal.'
            ],
            'related_recipes' => ['andhra-tomato-pappu', 'hotel-style-sambar', 'andhra-lemon-rice'],
            'flame_notes' => 'Medium heat for mustard; lower to gentle heat for cumin, hing, and chillies.'
        ],

        'beg-flavor-balancing' => [
            'id' => 'beg-flavor-balancing',
            'level' => 'beginner',
            'category' => 'Basic Kitchen Skills',
            'title' => 'Mastering Salt, Sweetness, Sourness, Heat & Umami',
            'icon' => '👅',
            'read_time' => 8,
            'summary' => 'Learn how salt magnifies aromas, how tamarind/lemon counteracts heat, and how jaggery rounds sharp spices.',
            'dish_type' => 'Sensory Skills',
            'required_utensils' => ['Tasting spoon', 'Small bowl of drinking water to cleanse palate'],
            'core_concepts' => [
                'Salt is an Enhancer, Not Just a Taste: Salt suppresses bitterness, heightens natural aromas, and draws out vegetable sweetness.',
                'The Sour Anchor (Pulusu/Khatte): Tamarind, tomatoes, amchur, and lemon cut through grease and provide appetite-stimulating brightness.',
                'The Sweet Balance: A thumbnail-sized pebble of jaggery (gud) in tomato rasam, sambar, or spicy curries does not make the dish sweet; it rounds harsh acid edges.',
                'Fat Carries Flavor: Spices are lipid-soluble (dissolve in fat, not water). A teaspoon of fresh ghee at the end binds aromas and coats the tongue pleasantly.'
            ],
            'visual_indicators' => 'A balanced dish smells well-rounded before tasting; no single taste punches you aggressively.',
            'common_mistakes' => [
                'Salting only at the very end of cooking: Vegetables remain bland inside while gravy tastes salty on the exterior.',
                'Adding lemon juice directly into a boiling pot: High heat destroys vitamin C and makes citrus juice taste bitter and metallic.'
            ],
            'corrections' => [
                'Salt in stages: half when sweating onions/vegetables to draw water out, half at the simmer stage.',
                'Always turn off the flame and let the dish cool for 1 minute before squeezing fresh lemon juice.'
            ],
            'related_recipes' => ['andhra-tomato-rasam', 'andhra-lemon-rice', 'andhra-gongura-pachadi'],
            'flame_notes' => 'Taste hot dishes when they cool slightly on your spoon; scorching heat numbs your taste buds.'
        ],

        // ================= LEVEL 2: INTERMEDIATE LESSONS =================
        'int-onion-tomato-masala' => [
            'id' => 'int-onion-tomato-masala',
            'level' => 'intermediate',
            'category' => 'Flavor Architecture & Gravies',
            'title' => 'The Universal Onion-Tomato Bhuna Masala Base',
            'icon' => '🧅',
            'read_time' => 11,
            'summary' => 'The cornerstone of North Indian curries. Master the Maillard reaction, moisture reduction, and oil separation.',
            'dish_type' => 'Mother Base Technique',
            'required_utensils' => ['Wide heavy-bottom kadai', 'Flat wooden spatula'],
            'core_concepts' => [
                'Fine Dicing vs. Puréeing: Finely hand-diced onions brown deeper and caramelize better than watery onion purée.',
                'Sweating vs. Caramelizing: First sweat onions with a pinch of salt until translucent; then sauté patiently over medium flame until rich golden brown (10-12 mins).',
                'Cooking Tomatoes to Oil Release (Roghan/Tel Chhodna): Add puréed tomatoes and spice powders. Cook until the moisture completely evaporates and small shimmering droplets of oil separate along the pan perimeter.',
                'De-glazing with Splash of Water: When spices stick to the bottom, add 2 tablespoons of warm water to lift rich browned fond without burning.'
            ],
            'visual_indicators' => 'The masala changes from bright red to deep mahogany-red, clumps together in a glossy ball, and leaves oil streaks on the spatula.',
            'common_mistakes' => [
                'Adding tomatoes while onions are still raw white: The acid in tomatoes halts onion cell breakdown, leaving an unpleasant crunch and raw onion taste.',
                'Rushing on high flame: Scorch marks appear while onion interiors remain raw.'
            ],
            'corrections' => [
                'Never add tomatoes until onions reach a deep amber-golden color.',
                'Batch prepare 4 cups of this bhuna masala, cool, and freeze into portions for 15-minute weekday dinners.'
            ],
            'related_recipes' => ['restaurant-paneer-butter-masala', 'punjabi-chole-masala', 'rajma-masala'],
            'flame_notes' => 'Medium flame for onions; lower to medium-low once spice powders and tomato purée are introduced.'
        ],

        'int-tempering-mastery' => [
            'id' => 'int-tempering-mastery',
            'level' => 'intermediate',
            'category' => 'Flavor Architecture & Gravies',
            'title' => 'Advanced Tempering Science (Tadka / Popu / Chaunk / Baghar)',
            'icon' => '✨',
            'read_time' => 10,
            'summary' => 'Understand fat choice (ghee vs. sesame vs. mustard oil), volatile oil extraction, and aroma trapping.',
            'dish_type' => 'Flavor Infusion',
            'required_utensils' => ['Heavy cast iron or brass tadka pan', 'Tight-fitting pot lid'],
            'core_concepts' => [
                'Fat Selection Dictates Regional Soul: Pure desi cow ghee for dals and pongal; cold-pressed unrefined sesame oil (Til) for Andhra pachadis; mustard oil for Bengali and Punjabi dishes.',
                'Lipid-Soluble Extraction: The essential oils in cumin (cuminaldehyde), mustard (allyl isothiocyanate), and curry leaves only bloom and dissolve in hot lipid fats, not in water.',
                'The Immediate Lid Trap: Pouring sizzling tadka into dal creates an intense smoke cloud. Instantly cover with a tight lid for 5 minutes without stirring to force aromatic steam back into the lentils.'
            ],
            'visual_indicators' => 'Crisp golden urad dal with a crunchy bite; crackling whole red chillies turning glistening glossy burgundy.',
            'common_mistakes' => [
                'Letting tadka stand in the hot pan for minutes before pouring: Residual pan heat burns the spices in 20 seconds.',
                'Stirring immediately after adding tadka: Aromatics escape into kitchen air instead of infusing the stew.'
            ],
            'corrections' => [
                'Have your cooked dal or chutney sitting ready right next to the stove before lighting the tadka flame.',
                'Pour hot tadka directly into the pot and slap the lid on immediately.'
            ],
            'related_recipes' => ['andhra-tomato-pappu', 'hotel-style-sambar', 'tempered-curd-rice'],
            'flame_notes' => 'High heat to reach 170°C; turn off heat right as curry leaves crackle.'
        ],

        'int-curry-bases' => [
            'id' => 'int-curry-bases',
            'level' => 'intermediate',
            'category' => 'Flavor Architecture & Gravies',
            'title' => 'Preparing Regional Curry Bases: Korma, Kadai, Chettinad & Makhani',
            'icon' => '🍲',
            'read_time' => 12,
            'summary' => 'Master the structural differences between nut-based, yogurt-based, coconut-based, and roasted-spice curries.',
            'dish_type' => 'Sauce Architecture',
            'required_utensils' => ['Blender / Wet Grinder', 'Heavy bottom casserole / Kadai'],
            'core_concepts' => [
                'Makhani Base: Boiled ripe tomatoes, whole spices (mace, cardamom), cashew nuts, butter, and cream, strained through a fine sieve for velvet smoothness.',
                'Korma / Kurma Base: Cashew-poppy seed (khus khus) or coconut-fennel paste that provides a fragrant, pale, mildly sweet and rich body.',
                'Chettinad Base: Dry roasted coriander seeds, black peppercorns, kalpasi (stone flower), star anise, and fresh coconut ground into a deep dark roasted paste.',
                'Acidity Modulation: If yogurt curdles when added to curry, whisk with 1 tsp gram flour (besan) and temper with 2 spoons of warm curry before stirring.'
            ],
            'visual_indicators' => 'Uniform emulsion with no fat separation or curdled dairy specks; velvety coating consistency on the back of a spoon.',
            'common_mistakes' => [
                'Adding cold straight-from-fridge yogurt to boiling gravy: Thermal shock breaks the milk emulsion, leaving ugly white curdled clumps.',
                'Skipping straining for restaurant gravies: Leaving tomato skins and cardamom fiber destroys the silky restaurant texture.'
            ],
            'corrections' => [
                'Whisk room-temperature yogurt thoroughly, lower stove flame to low, and stir continuously in one direction.',
                'Strain boiled tomato-cashew bases through a metal mesh sieve before simmering with butter.'
            ],
            'related_recipes' => ['restaurant-paneer-butter-masala', 'vegetable-kurma', 'kadai-paneer'],
            'flame_notes' => 'Low simmer (85-90°C) when incorporating dairy and cashew pastes to prevent scorching.'
        ],

        'int-dough-science' => [
            'id' => 'int-dough-science',
            'level' => 'intermediate',
            'category' => 'Flatbreads & Baking',
            'title' => 'Dough Hydration, Gluten Relaxation & Fluffy Rotis / Parathas',
            'icon' => '🫓',
            'read_time' => 11,
            'summary' => 'Why water temperature, kneading time, and the mandatory 30-minute rest transform dry flatbreads into cloud-soft phulkas.',
            'dish_type' => 'Dough Science',
            'required_utensils' => ['Wide mixing parat / bowl', 'Heavy rolling pin (belan)', 'Chakla (rolling board)'],
            'core_concepts' => [
                'Hydration Ratio: Good whole wheat atta requires roughly 60% to 65% water by weight (1 cup atta to ~1/2 to 2/3 cup warm water).',
                'Warm Water Advantage: Warm water relaxes wheat starch, speeding gluten chain development without excessive muscular kneading.',
                'The 30-Minute Rest (Autolysis): Resting allows wheat proteins (glutenin and gliadin) to hydrate completely and relax elastic tension. Rolling becomes effortless without the dough snapping back.',
                'The Three-Layer Roti Steam Mechanism: Rolling evenly without creases creates two thin outer cooked skins. When placed on flame, trapped internal water vapor expands into steam, ballooning the roti into a round football.'
            ],
            'visual_indicators' => 'A finger pressed into rested dough leaves an indent that gently bounces back halfway; dough feels soft as an earlobe.',
            'common_mistakes' => [
                'Rolling unevenly with heavy downward wrist pressure: Pins the layers together so steam cannot separate and puff the roti.',
                'Dusting excessive dry flour (palethan/dry atta) during rolling: Burns on the hot tawa, leaving bitter grey ash on the roti surface.'
            ],
            'corrections' => [
                'Apply gentle, angled rolling pressure along the roti edges; the round disc will spin automatically on the board.',
                'Dust dry flour only once at the beginning; shake off excess flour before placing roti on the tawa.'
            ],
            'related_recipes' => ['soft-phulka-chapati', 'punjabi-aloo-paratha', 'puffed-poori'],
            'flame_notes' => 'Tawa must be hot (medium-high). A cold tawa dries out rotis into cardboard biscuits.'
        ],

        'int-fermentation' => [
            'id' => 'int-fermentation',
            'level' => 'intermediate',
            'category' => 'Fermentation & Batter Science',
            'title' => 'The Science of Dosa & Idli Batter Fermentation',
            'icon' => '🫧',
            'read_time' => 10,
            'summary' => 'How wild lactic acid bacteria (Leuconostoc mesenteroides) and natural yeasts create light, airy, and tangy breakfast batters.',
            'dish_type' => 'Fermentation Science',
            'required_utensils' => ['Wet grinder or heavy blender', 'Deep stainless steel container (double volume of batter)', 'Loose lid'],
            'core_concepts' => [
                'Microbial Symphony: Urad dal carries natural lactic acid bacteria; soaking activates them. They digest carbohydrates, releasing carbon dioxide bubbles and lactic acid.',
                'The Aeration Trap: Grinding urad dal until silky and fluffy traps millions of microscopic air pockets that serve as incubation chambers for gas expansion.',
                'Temperature Sweet Spot: Ideal fermentation occurs between 28°C and 32°C. Cold environments (<20°C) cause sluggish fermentation; hot environments (>40°C) make batter sour and pungent.',
                'Salt Timing: Salt slows fermentation. In summer, add salt immediately to prevent over-fermentation. In winter, hold salt until after fermentation is complete.'
            ],
            'visual_indicators' => 'Batter volume increases by 50-80%, texture becomes frothy and spongy like honeycomb, and aroma is pleasantly mildly sour (not foul).',
            'common_mistakes' => [
                'Vigorously beating fermented batter with a ladle: Pops all carbon dioxide bubbles, resulting in flat, rock-hard idlis.',
                'Filling container to the top: Batter expands overnight and overflows all over kitchen counters.'
            ],
            'corrections' => [
                'Always leave at least 40% empty headroom in your batter container.',
                'Fold fermented batter gently in one direction with a curved ladle only 2-3 times before pouring into idli plates.'
            ],
            'related_recipes' => ['soft-idli', 'crispy-plain-dosa', 'masala-dosa'],
            'flame_notes' => 'Steam idlis on continuous medium-high heat with rolling steam.'
        ],

        'int-rice-perfection' => [
            'id' => 'int-rice-perfection',
            'level' => 'intermediate',
            'category' => 'Rice & Grains Mastery',
            'title' => 'Fluffy Separate Grains: Water Ratios & Absorption vs. Straining',
            'icon' => '🍚',
            'read_time' => 9,
            'summary' => 'Eliminate sticky, gummy, or mushy rice. Master Basmati, Sona Masoori, and Parboiled water dynamics.',
            'dish_type' => 'Grain Mastery',
            'required_utensils' => ['Heavy saucepan or traditional Kalchatti', 'Tight lid with seal'],
            'core_concepts' => [
                'Washing Starch Off: Swirl rice in cold water 3-4 times until rinse water runs clear. Removing loose surface amylose prevents sticky grain clumping.',
                'The Soaking Window: Soak aged Basmati for 30 minutes; it hydrates the core, enabling grains to expand 2.5x in length without breaking.',
                'Water Ratios by Rice Variety: Aged Basmati (Absorption) = 1 : 1.75 | Sona Masoori = 1 : 2 to 2.25 | Brown Rice = 1 : 2.75.',
                'The 10-Minute Rest: When water evaporates, turn off flame and NEVER touch rice for 10 minutes. The trapped residual steam redistributes moisture evenly; then fluff gently with a fork.'
            ],
            'visual_indicators' => 'Grains stand straight, distinct, and tender without water pooled at the bottom of the pot.',
            'common_mistakes' => [
                'Stirring rice vigorously while boiling in the pot: Snaps elongated starch grains and turns the dish into sticky paste.',
                'Digging a metal serving spoon into freshly cooked hot rice immediately after turning off the stove.'
            ],
            'corrections' => [
                'Stir only once gently right when the pot reaches a rolling boil, then lower flame and cover.',
                'Rest 10 minutes off heat, then use a wide flat paddle or silicone fork to gently lift and separate grains from the sides.'
            ],
            'related_recipes' => ['vegetable-pulao', 'indo-chinese-veg-fried-rice', 'andhra-lemon-rice'],
            'flame_notes' => 'High flame until water boils; immediately drop to lowest simmer and seal.'
        ],

        'int-meal-coordination' => [
            'id' => 'int-meal-coordination',
            'level' => 'intermediate',
            'category' => 'Kitchen Management',
            'title' => 'Kitchen Workflow: Orchestrating a 3-Course South Indian Meal in 45 Minutes',
            'icon' => '⏱️',
            'read_time' => 11,
            'summary' => 'How to cook Rice, Dal, Vegetable Fry, and Rasam simultaneously on a 3-burner stove without stress.',
            'dish_type' => 'Professional Home Workflow',
            'required_utensils' => ['3-burner gas stove', 'Pressure cooker', 'Saucepan', 'Kadai'],
            'core_concepts' => [
                'Burner Sequencing Matrix: Burner 1 = Passive slow cooking (Rice / Dal pressure cooker); Burner 2 = Simmering pot (Rasam / Sambar); Burner 3 = Active attention (Potato fry / Tadka).',
                'Parallel Prep: While dal cooks under pressure, chop tomatoes and peel potatoes. Never start burner 3 until all vegetables are chopped.',
                'Shared Ingredients: Chop double the onions, ginger, green chillies, and coriander leaves in one single cutting board session; distribute to dishes in pinch bowls.',
                'The Warm Holding Order: Dal and rasam stay piping hot inside closed pots for 45 minutes; fry crisp potatoes and flatbreads last so they remain crispy when served.'
            ],
            'visual_indicators' => 'All dishes reach serving temperature within 5 minutes of each other with a clean kitchen counter.',
            'common_mistakes' => [
                'Cooking one single dish start-to-finish before even opening the fridge for the next dish: Multiplies kitchen time to 2.5 hours.',
                'Frying crispy vegetables first: By the time rice is cooked, the potatoes have turned soggy and limp.'
            ],
            'corrections' => [
                'Follow the "Staggered Start" rule: Longest cooking dishes go on the flame first (dal/rice), fast sautés go on last.',
                'Clean cutting boards and knife while the pressure cooker completes its whistles.'
            ],
            'related_recipes' => ['andhra-tomato-pappu', 'andhra-potato-fry', 'andhra-tomato-rasam'],
            'flame_notes' => 'Coordinate burner heat to avoid needing your hands on two fast-burning pans at the same second.'
        ],

        // ================= LEVEL 3: ADVANCED LESSONS =================
        'adv-dum-science' => [
            'id' => 'adv-dum-science',
            'level' => 'advanced',
            'category' => 'Biryani & Meat Science',
            'title' => 'The Physics of Dum Cooking: Moisture, Sealing & Pressure Steam Layering',
            'icon' => '👑',
            'read_time' => 14,
            'summary' => 'How sealed convection currents circulate flavor molecules between spiced marinade and parboiled Basmati rice.',
            'dish_type' => 'Royal Heritage Technique',
            'required_utensils' => ['Heavy cast iron / aluminum Biryani Handi (deg)', 'Flat heavy tawa for heat diffusion', 'Wheat dough seal or double heavy aluminum foil'],
            'core_concepts' => [
                'The 70-80% Rice Parboil Rule: Rice added over marinated meat must only be 70% cooked (grain shows a hard white core when pinched). It finishes cooking purely on rising aromatic meat steam.',
                'The Convection Cycle: As the base heats, moisture from yogurt and meat marinades vaporizes, rises through rice layers carrying saffron and mint volatiles, condenses against the cool sealed lid, and trickles down the pot walls in continuous circulation.',
                'The Tawa Shield (Indirect Heat): Placing the heavy biryani pot directly on a raw flame will scorch meat at the base. Always place the pot on a preheated heavy cast iron tawa to diffuse heat gently.',
                'Layering Hierarchy: Bottom = Raw marinated meat (Kacchi) or simmered masala (Pakki) -> Middle = 70% parboiled rice with brown onions (birista), mint, coriander -> Top = Saffron milk, rose water, and pure desi ghee.'
            ],
            'visual_indicators' => 'A plume of fragrant white steam shoots up when breaking the dough seal; rice grains stand vertically like needles without sticking.',
            'common_mistakes' => [
                'Overcooking rice during initial boiling: Overboiled 95% rice turns into a soggy, indistinguishable mash under sealed dum steam.',
                'Lifting the lid halfway through dum to "take a peek": Voids all accumulated steam pressure and dries out the meat.'
            ],
            'corrections' => [
                'Drain rice precisely at the 4 to 5 minute mark in rolling water; hold a raw grain between thumb and forefinger to check for the distinct raw white needle center.',
                'Keep the dum seal intact: 10 mins on medium-high (on tawa) followed by 20-25 mins on lowest flame, followed by 15 mins resting off heat.'
            ],
            'related_recipes' => ['andhra-chicken-biryani', 'hyderabadi-dum-biryani', 'vegetable-dum-biryani'],
            'flame_notes' => 'Tawa intermediate heat buffer prevents hot spots.'
        ],

        'adv-maillard-meat' => [
            'id' => 'adv-maillard-meat',
            'level' => 'advanced',
            'category' => 'Biryani & Meat Science',
            'title' => 'Spice Blooming, Meat Browning (Maillard Reaction) & Deep Flavor',
            'icon' => '🍗',
            'read_time' => 12,
            'summary' => 'Transform pale, boiled-tasting chicken or mutton curries into rich, dark, flavorful masterpieces through amino-sugar browning.',
            'dish_type' => 'Culinary Chemistry',
            'required_utensils' => ['Heavy bottom iron or copper-bottom handi', 'Slotted spoon'],
            'core_concepts' => [
                'The Maillard Reaction (140°C-165°C): Occurs when amino acids in meat protein react with reducing sugars under high heat, creating hundreds of complex savory flavor compounds.',
                'Dry the Meat Surface: Wet, dripping meat boils in its own juices and turns rubbery grey instead of browning. Pat chicken dry with paper towels before searing.',
                'Browning (Bhunao) the Masala: Sauté marinated meat in the caramelized onion paste on high flame for 6-8 minutes until meat sears, juices release, evaporate, and brown on the bottom.',
                'De-glaze the Fond: The brown glaze stuck to the pan bottom is pure concentrated flavor. Deglaze with bone broth or hot water to produce a deep mahogany gravy.'
            ],
            'visual_indicators' => 'Meat edges show golden-brown crusting; gravy darkens from orange to rich royal deep red-brown.',
            'common_mistakes' => [
                'Crowding the pan: Adding 1 kg of cold meat to a small pan drops oil temperature instantly, causing meat to stew in watery juices instead of browning.',
                'Adding cold water from the fridge to simmer meat: Tightens protein fibers, making mutton tough as shoe leather.'
            ],
            'corrections' => [
                'Sear meat in two batches if your kadai is small.',
                'Always add boiling or steaming hot water to curries to maintain consistent cooking temperature.'
            ],
            'related_recipes' => ['andhra-chicken-fry', 'andhra-chicken-curry', 'andhra-mutton-curry'],
            'flame_notes' => 'High flame for searing (160°C); gentle simmer once liquid is introduced.'
        ],

        'adv-sugar-syrup-science' => [
            'id' => 'adv-sugar-syrup-science',
            'level' => 'advanced',
            'category' => 'Confectionery & Sweets',
            'title' => 'Sugar Syrup Consistency (Kambi Pakam) & Traditional Sweets',
            'icon' => '🍯',
            'read_time' => 13,
            'summary' => 'Decode half-string, 1-string (Ek Taar), 2-string, and soft-ball stages for Mysore Pak, Gulab Jamun, and Ariselu.',
            'dish_type' => 'Confectionery Science',
            'required_utensils' => ['Heavy stainless steel saucier / Kadai', 'Bowl of cold water for drop testing', 'Candy thermometer (optional)'],
            'core_concepts' => [
                'Sugar Concentration Physics: Boiling water evaporates, increasing sugar concentration and raising the boiling point above 100°C.',
                'Half-String (Chipchipa / Sticky): Temperature ~104°C. Feels sticky like warm cooking oil between thumb and forefinger; no thread forms. Crucial for Gulab Jamun so syrup penetrates the mawa core without crystalizing.',
                'One-String (Ek Taar / Okka Theega): Temperature ~110-112°C. Pulling fingers apart draws a single continuous translucent thread without snapping. Used for Mysore Pak, Kaju Katli, and Boondi Ladoo.',
                'Two-String (Do Taar): Temperature ~118°C. Two strong parallel threads form. Used for hard sugar-coated sweets (Shakarpara).',
                'Preventing Recrystallization: Add 1/2 teaspoon of fresh lemon juice or a pinch of citric acid to the syrup. Acid hydrolyzes sucrose into glucose and fructose (invert sugar), stopping crystallization.'
            ],
            'visual_indicators' => 'Syrup bubbles change from thin water frothing to thick, slow-bursting, glossy, lava-like bubbles.',
            'common_mistakes' => [
                'Testing boiling syrup with dry fingers: Boiling sugar syrup adheres to skin and causes severe burns.',
                'Over-boiling Gulab Jamun syrup to one-string: Thick syrup cannot soak into deep-fried jamuns, leaving centers dry and hard.'
            ],
            'corrections' => [
                'Always dip fingertips in cold ice water first, take a drop of warm syrup, and gently separate fingers.',
                'Keep Gulab Jamun syrup warm, thin, and scented with cardamom and saffron.'
            ],
            'related_recipes' => ['classic-gulab-jamun', 'south-indian-rava-kesari', 'traditional-mysore-pak'],
            'flame_notes' => 'Medium flame while sugar dissolves; lower flame when testing string consistency.'
        ],

        'adv-yeast-baking' => [
            'id' => 'adv-yeast-baking',
            'level' => 'advanced',
            'category' => 'Baking & International',
            'title' => 'Yeast Fermentation, Dough Hydration & Artisanal Bread / Pizza',
            'icon' => '🍕',
            'read_time' => 12,
            'summary' => 'Understand Saccharomyces cerevisiae, water hydration percentages, oven spring, and homemade pizza dough.',
            'dish_type' => 'Baking Science',
            'required_utensils' => ['Baking sheet or pizza stone', 'Oven preheated to maximum (230-250°C)', 'Bench scraper'],
            'core_concepts' => [
                'Yeast Activation & Temperature: Active dry yeast requires warm water (38°C-41°C). Water above 50°C kills yeast instantly; cold water leaves it dormant.',
                'Gluten Windowpane Test: Knead dough until a small piece can be gently stretched paper-thin until light passes through without tearing.',
                'High-Heat Pizza Physics: Home ovens lack the 450°C intensity of commercial wood-fired ovens. Preheat a heavy cast iron pan on your stovetop until smoking hot, lay pizza base on it for 90 seconds to char the bottom crust, then transfer immediately to top oven broiler to blister cheese.',
                'Hydration Calculations: 65% to 70% hydration dough produces light, airy ciabatta and bubbly Neapolitan pizza cornicione.'
            ],
            'visual_indicators' => 'Dough doubles in volume; finger poke springs back slowly and leaves a shallow dimple.',
            'common_mistakes' => [
                'Adding boiling water to yeast: Kills the living organism; dough never rises and remains dense as a rock.',
                'Baking pizza in a lukewarm oven (180°C): Produces dry, cardboard-like crust with rubbery cheese.'
            ],
            'corrections' => [
                'Test water on your wrist; it should feel comfortably lukewarm, like baby bathwater.',
                'Bake pizza at the absolute highest temperature your home oven can reach.'
            ],
            'related_recipes' => ['homemade-pizza-base', 'artisanal-bread-loaf'],
            'flame_notes' => 'Maximum oven heat (220°C-250°C) with preheated baking stone/pan.'
        ],

        // ================= LEVEL 4: RESTAURANT CHEF LESSONS =================
        'rest-mother-gravies' => [
            'id' => 'rest-mother-gravies',
            'level' => 'restaurant',
            'category' => 'Restaurant Gravies & Sauces',
            'title' => 'The 5 Restaurant "Mother Gravies": Yellow, Makhani, White, Kadai & Chettinad',
            'icon' => '🥫',
            'read_time' => 15,
            'summary' => 'How commercial Indian hotel kitchens prepare 50 curries in 10 minutes using standardized pre-cooked mother sauces.',
            'dish_type' => 'Professional Gravy Architecture',
            'required_utensils' => ['High-power commercial blender', 'Fine mesh chinois / soup strainer', 'Deep stockpot'],
            'core_concepts' => [
                'Yellow Base (Onion-Cashew Gravy): Boiled onions, melon seeds (magaz), cashews, and turmeric ground and simmered. Provides body and mild sweetness for Shahi paneer and kormas.',
                'Red Base (Makhani Gravy): Ripe Roma/desi tomatoes slow-cooked with ginger, green cardamom, mace, butter, and cashew paste, then strained silky smooth. Used for Butter Chicken and Paneer Makhani.',
                'White Base (Kaju-Mawa / Safed Gravy): Boiled white onions, soaked cashews, cream, and khoya scented with white pepper and green cardamom. Used for Malai Kofta and Navratan Korma.',
                'Brown Base (Bhoona / Chop Masala): Coarsely chopped onions, tomatoes, and ground spices browned to intense reduction. Used for Kadai dishes, Rogan Josh, and Bhuna gosht.',
                'The Rapid Pick-up Pan Technique: In a smoking hot pan, restaurant chefs melt butter/oil, flash sizzle ginger juliennes and crushed kasuri methi, ladle in the appropriate pre-cooked mother gravies, toss in paneer or chicken, splash cream, and plate in 4 minutes.'
            ],
            'visual_indicators' => 'Velvety sheen on gravies; rich vibrant colors with no particulate grit when swirled in a bowl.',
            'common_mistakes' => [
                'Browning onions for Makhani gravy: Makhani demands pure tomato sweetness and dairy richness; browned onions ruin the bright orange color and velvet mouthfeel.',
                'Skipping Kasuri Methi (crushed dried fenugreek leaves): It is the non-negotiable signature scent of North Indian restaurant dishes.'
            ],
            'corrections' => [
                'Boil tomatoes whole with whole spices; blend and pass through a sieve for true restaurant texture.',
                'Always rub kasuri methi vigorously between palms to powder it before sprinkling over hot butter right before serving.'
            ],
            'related_recipes' => ['restaurant-paneer-butter-masala', 'restaurant-butter-chicken', 'dal-makhani'],
            'flame_notes' => 'High heat pickup on wok; low heat holding for base gravies.'
        ],

        'rest-tandoor-at-home' => [
            'id' => 'rest-tandoor-at-home',
            'level' => 'restaurant',
            'category' => 'Tandoor & Starters',
            'title' => 'Tandoori-Style Cooking at Home Without a Clay Tandoor Oven (Dhungar Method)',
            'icon' => '🍢',
            'read_time' => 13,
            'summary' => 'Achieve authentic charred smoky barbecue aroma using a direct cast iron grill tawa and a red-hot natural charcoal briquette.',
            'dish_type' => 'Smoky Infusion Technique',
            'required_utensils' => ['Cast iron grill pan or tawa', 'Small stainless steel katori (cup)', 'Natural lump charcoal piece', 'Cooking tongs'],
            'core_concepts' => [
                'The Two-Stage Marinade: First marinade (lemon juice, Kashmiri chilli powder, salt, ginger-garlic) penetrates meat fibers for 30 mins. Second marinade (hung curd, mustard oil, roasted besan, kasuri methi, garam masala) forms a thick clinging crust that will not slide off under heat.',
                'Raw Mustard Oil Punch: Authentic tandoori tikka requires cold-pressed mustard oil whisked directly into Kashmiri red chilli powder. This creates the vibrant natural crimson hue without artificial toxic synthetic food dyes.',
                'The Dhungar Smoking Technique: Place cooked tikkas or biryani in a pot. Set a small metal katori in the center. Heat a lump of natural charcoal over an open flame until red hot. Place the glowing coal in the katori, pour 1/2 teaspoon of ghee over the coal, and instantly cover with a tight lid for 5-8 minutes. The ghee vaporizes into authentic clay-oven tandoor smoke.',
                'High Direct Flame Charring: Finish cooked paneer or chicken skewered directly over the open blue gas flame for 20 seconds to achieve blistered dark leopard spots.'
            ],
            'visual_indicators' => 'Appetizing rustic char spots on tikka edges; intoxicating smoky aroma reminiscent of Punjabi dhabas.',
            'common_mistakes' => [
                'Using thin, watery regular curd for marinade: Liquid curd separates in heat, pooling liquid at the bottom and washing off all spices.',
                'Leaving glowing charcoal covered for more than 10 minutes: Over-smoking makes food taste acrid and bitter like an ashtray.'
            ],
            'corrections' => [
                'Hang yogurt in a muslin cheesecloth for 3 hours to remove whey, producing thick Greek-style hung curd (chakka).',
                'Smoke for 5-7 minutes maximum; lift lid and discard the coal.'
            ],
            'related_recipes' => ['restaurant-paneer-tikka', 'chicken-tikka-masala', 'restaurant-style-naan'],
            'flame_notes' => 'Direct open burner flame for 20-30 seconds to achieve authentic char.'
        ],

        'rest-mise-en-place' => [
            'id' => 'rest-mise-en-place',
            'level' => 'restaurant',
            'category' => 'Professional Kitchen Skills',
            'title' => 'Professional Mise en Place, Station Organization & Portion Scaling',
            'icon' => '📋',
            'read_time' => 11,
            'summary' => 'The professional culinary discipline of organizing every knife, ingredient, liquid, and garnish before turning on the burner.',
            'dish_type' => 'Professional Practice',
            'required_utensils' => ['Set of 6-8 small stainless steel prep bowls (katoris)', 'Clean kitchen side towel (torchon)', 'Dedicated scrap bowl'],
            'core_concepts' => [
                'Everything in Its Place: French "Mise en place" means total readiness. Never chop an onion while garlic is already frying in the pan.',
                'The Scrap Bowl Discipline: Keep a dedicated bowl on your counter for vegetable peels, garlic skins, and chilli stems. Your cutting board stays 100% clean and uncluttered.',
                'Linear Station Workflow: Arrange your workspace in a strict left-to-right flow: Raw prepped ingredients -> Cutting Board -> Stove -> Plating / Resting Counter.',
                'Recipe Scaling Arithmetic: When doubling a recipe for 8 people, double meats, vegetables, and broths (2x). However, scale salt, chilli, and pungent whole spices only by 1.5x to 1.7x, as volatile extraction increases non-linearly.'
            ],
            'visual_indicators' => 'Calm, effortless kitchen rhythm with zero frantic searching for missing spices while oil smokes.',
            'common_mistakes' => [
                'Chopping vegetables directly over the cooking pot with the flame on: Leads to uneven cooking, steam burns on hands, and dropped vegetable scraps.',
                'Doubling salt and cloves literally 2x when cooking for large party gatherings: Results in unpleasantly salty and medicine-flavored gravies.'
            ],
            'corrections' => [
                'Organize all chopped aromatics and spices into small bowls before heating the kadai.',
                'Taste and adjust salt at the finish stage when scaling up large recipes.'
            ],
            'related_recipes' => ['hyderabadi-dum-biryani', 'indo-chinese-veg-fried-rice', 'restaurant-hakka-noodles'],
            'flame_notes' => 'N/A (Organization and prep discipline)'
        ],

        'rest-indo-chinese' => [
            'id' => 'rest-indo-chinese',
            'level' => 'restaurant',
            'category' => 'High-Heat Wok Cooking',
            'title' => 'Indo-Chinese Wok Mastery: Wok Hei, Sauces & Crisp Manchurian Textures',
            'icon' => '🥢',
            'read_time' => 12,
            'summary' => 'Achieve authentic street-style Hakka noodles and Manchurian: smoking wok temperatures, starch slurry science, and crispy batters.',
            'dish_type' => 'High Heat Mastery',
            'required_utensils' => ['Carbon steel or thin cast iron wok', 'Wok spatula (chan)', 'Deep frying skimmer'],
            'core_concepts' => [
                'Breath of the Wok (Wok Hei): The unmistakable smoky flavor produced when microscopic aerosolized oil droplets catch vapor in a superheated wok (over 250°C).',
                'Cold Rice for Fried Rice: Never use freshly cooked hot rice; it turns mushy. Use day-old refrigerated rice. Cold temperatures recrystallize starch (retrogradation), keeping individual grains firm and chewy.',
                'The Cornstarch Slurry Rule: When thickening gravies (Chilli Chicken, Veg Manchurian), always mix cornflour with cold water in a small cup first. Stir into the boiling sauce over medium heat; it clears and thickens in 30 seconds.',
                'Double Frying for Manchurian / Chilli Paneer: Fry battered cauliflower (Gobi) or chicken once at 160°C to cook the interior. Rest 5 minutes. Flash-fry a second time at 190°C for 60 seconds. The double fry guarantees a glass-like crisp crust that stays crunchy even when tossed in hot sauce.'
            ],
            'visual_indicators' => 'Shimmering glossy vegetable glaze; vibrant green bell peppers that maintain audible crunch; no soggy sauce pooling at plate bottom.',
            'common_mistakes' => [
                'Pouring dry cornflour directly into a hot bubbling pan: Instantly forms gelatinous gummy white lumps that never dissolve.',
                'Tossing crispy fried florets in sauce 20 minutes before serving: Steam turns the crisp batter into soggy mush.'
            ],
            'corrections' => [
                'Always dissolve cornstarch in 2 tbsp cold water first.',
                'Keep sauce and fried items separate; toss them together in the flaming wok 30 seconds before carrying to the dining table.'
            ],
            'related_recipes' => ['indo-chinese-veg-fried-rice', 'restaurant-hakka-noodles', 'restaurant-chilli-paneer'],
            'flame_notes' => 'Maximum burner flame throughout wok tossing.'
        ]
    ];
}

/**
 * Returns cooking challenges by difficulty level
 */
function get_cooking_challenges(): array {
    return [
        'easy' => [
            'level_name' => 'Easy Challenges',
            'badge' => 'Beginner',
            'color' => '#15803D',
            'icon' => '🌱',
            'items' => [
                [
                    'id' => 'chal-perfect-rice',
                    'title' => 'Prepare Perfect Plain Rice',
                    'objective' => 'Cook fluffy, distinct grains of rice without stickiness, mushiness, or burning at the bottom.',
                    'difficulty' => 'Easy',
                    'required_ingredients' => ['1 cup Sona Masoori or Basmati rice', '2 cups fresh water', '1 pinch salt (optional)'],
                    'utensils' => ['Deep heavy-bottom saucepan with snug lid', 'Fine mesh strainer', 'Fork for fluffing'],
                    'steps' => [
                        'Rinse rice in a bowl with cold water 3 times until water runs mostly clear. Drain completely.',
                        'Soak aged rice for 20 minutes in clean water.',
                        'Add measured water (1:2 ratio) and bring to a rolling boil on medium-high flame with lid off.',
                        'As water reduces to level of rice with steam holes appearing, lower flame to absolute minimum, cover with lid tightly, and cook for 10 minutes.',
                        'Turn off heat. Keep lid on and rest undisturbed for 10 minutes.',
                        'Gently fluff with a fork from edge to center.'
                    ],
                    'success_criteria' => [
                        'Every grain is separate and intact',
                        'Rice core is tender with no chalky hardness',
                        'Zero water pooled at the bottom of the pot',
                        'No burnt layer on pan base'
                    ],
                    'common_mistakes' => 'Stirring frequently while cooking breaks starch chains and causes porridge-like mush.',
                    'safety' => 'Hot steam can scald; lift lid angled away from your face.'
                ],
                [
                    'id' => 'chal-vegetable-upma',
                    'title' => 'Make a Simple Vegetable Upma',
                    'objective' => 'Prepare non-sticky, lump-free roasted rava upma with balanced ginger and green chilli heat.',
                    'difficulty' => 'Easy',
                    'required_ingredients' => ['1 cup Bombay rava (semolina)', '2.5 cups water', '1 onion chopped', '1 green chilli slit', '1 inch ginger minced', 'Mustard seeds, urad dal, chana dal, curry leaves, ghee'],
                    'utensils' => ['Wide kadai', 'Whisk or wooden spatula', 'Saucepan for boiling water'],
                    'steps' => [
                        'Dry roast rava on medium-low flame for 4-5 minutes until warm and fragrant (do not brown). Set aside on a plate.',
                        'In the kadai, heat oil/ghee, splutter mustard seeds, urad and chana dal, ginger, chillies, and curry leaves.',
                        'Sauté onions until translucent. Pour in 2.5 cups water and salt; bring to a rolling boil.',
                        'Lower flame to minimum. Slowly pour roasted rava with one hand in a steady thin stream while stirring continuously with the other hand to prevent lumps.',
                        'Cover with a lid and cook on low heat for 3 minutes until steam builds up.',
                        'Drizzle 1 tsp ghee, turn off flame, and rest 5 minutes.'
                    ],
                    'success_criteria' => [
                        'Zero lumps of dry rava inside the upma',
                        'Soft, melt-in-mouth texture without oily or dry consistency',
                        'Crunchy golden dal bites throughout'
                    ],
                    'common_mistakes' => 'Dumping rava all at once into boiling water without whisking causes instant hard dry lumps.',
                    'safety' => 'Bubbling upma can spit hot semolina; lower flame before adding rava.'
                ],
                [
                    'id' => 'chal-coconut-chutney',
                    'title' => 'Prepare Authentic Coconut Chutney',
                    'objective' => 'Blend a thick, fresh coconut chutney with hotel-style vibrant tempering.',
                    'difficulty' => 'Easy',
                    'required_ingredients' => ['1 cup fresh grated coconut', '2 tbsp roasted gram (chutney dal)', '2 green chillies', '1 small piece ginger', 'Salt', 'Tadka: mustard, urad dal, curry leaves, hing'],
                    'utensils' => ['Small chutney mixer jar', 'Tadka pan'],
                    'steps' => [
                        'Blend coconut, roasted gram, chillies, ginger, salt with 1/3 cup cold water to a semi-coarse paste.',
                        'Transfer to a ceramic or glass bowl (do not heat chutney).',
                        'Heat oil in a small tadka pan, pop mustard seeds, urad dal, dry red chilli, hing, and fresh curry leaves.',
                        'Pour sizzling tadka over chutney. Stir gently before serving.'
                    ],
                    'success_criteria' => [
                        'Pleasant nutty, coconutty taste with creamy thickness',
                        'Aromatic crunchy tadka distributed on top',
                        'Bright white/pale green color'
                    ],
                    'common_mistakes' => 'Using hot water while blending extracts heavy coconut oil and turns chutney grey and greasy.',
                    'safety' => 'Curry leaves splutter hot oil; dry them on a towel before dropping into tadka.'
                ],
                [
                    'id' => 'chal-dal-consistency',
                    'title' => 'Cook Dal with the Correct Consistency',
                    'objective' => 'Pressure cook toor dal to a creamy smooth texture with golden garlic tadka.',
                    'difficulty' => 'Easy',
                    'required_ingredients' => ['1/2 cup Toor dal', '1.5 cups water', '1/4 tsp turmeric', 'Tadka: Ghee, mustard, cumin, crushed garlic, hing, curry leaves'],
                    'utensils' => ['Pressure cooker', 'Tadka ladle', 'Wooden dal masher (Pappu gutti)'],
                    'steps' => [
                        'Wash toor dal twice and soak for 15 minutes. Add to pressure cooker with water and turmeric.',
                        'Cook for 4 whistles on medium flame. Let steam subside completely on its own.',
                        'Open cooker and mash dal smoothly with a wooden masher or whisk with salt and warm water to reach creamy pouring consistency.',
                        'Prepare hot ghee tadka with crushed garlic cloves and cumin; pour over dal and cover immediately.'
                    ],
                    'success_criteria' => [
                        'Uniform creamy body without watery separation on top and settled dal at the bottom',
                        'Invigorating aroma of browned garlic and pure ghee',
                        'Balanced salt and comforting warmth'
                    ],
                    'common_mistakes' => 'Adding cold water after cooking dal prevents proper blending. Always use warm water to thin dal.',
                    'safety' => 'Never pull pressure cooker weight off violently; wait for natural depressurization.'
                ],
                [
                    'id' => 'chal-basic-dosa',
                    'title' => 'Make a Golden Crispy Dosa',
                    'objective' => 'Spread fermented batter smoothly on a tawa and cook to golden, paper-crisp perfection.',
                    'difficulty' => 'Easy',
                    'required_ingredients' => ['Fermented dosa batter', 'Sesame oil or ghee', 'Water to season pan'],
                    'utensils' => ['Cast iron tawa or non-stick tawa', 'Flat-bottomed ladle', 'Thin steel spatula (dosa thirupi)'],
                    'steps' => [
                        'Heat tawa until hot. Sprinkle droplets of water—they should sizzle and evaporate instantly. Wipe with a cloth.',
                        'Pour a ladle of batter in the dead center of the tawa.',
                        'Starting from center, gently spiral outward in smooth concentric circles using the base of the ladle.',
                        'Drizzle 1 tsp oil/ghee around the perimeter and over the center.',
                        'Cook undisturbed on medium flame until edges curl up golden and release naturally from the tawa.',
                        'Fold in half and slide onto a warm plate.'
                    ],
                    'success_criteria' => [
                        'Even golden brown color across the bottom surface',
                        'Crisp, lace-like edges that shatter delicately',
                        'No sticky unbaked dough in the center'
                    ],
                    'common_mistakes' => 'Pouring batter on a cold tawa prevents spreading; pouring on a scorching hot tawa tears the batter into balls.',
                    'safety' => 'Cast iron tawa handle becomes extremely hot; always use a dry cloth or silicone sleeve.'
                ]
            ]
        ],

        'intermediate' => [
            'level_name' => 'Intermediate Challenges',
            'badge' => 'Intermediate',
            'color' => '#D97706',
            'icon' => '🔥',
            'items' => [
                [
                    'id' => 'chal-paneer-curry',
                    'title' => 'Prepare Restaurant-Style Paneer Curry',
                    'objective' => 'Cook a silky, rich makhani gravy with soft paneer cubes that soak in flavor without turning rubbery.',
                    'difficulty' => 'Intermediate',
                    'required_ingredients' => ['200g fresh paneer', '4 ripe tomatoes', '12 cashew nuts', '1 onion', 'Ginger-garlic paste', 'Kasuri methi, butter, cream, Kashmiri chilli powder'],
                    'utensils' => ['Blender', 'Fine strainer', 'Heavy kadai'],
                    'steps' => [
                        'Boil tomatoes, cashews, cardamom, and ginger in 1 cup water for 10 minutes until soft. Blend and strain silky smooth.',
                        'Sauté finely chopped onion in butter until translucent. Add ginger-garlic paste and spices on low heat.',
                        'Add tomato-cashew puree and cook on medium-low until oil separates around edges.',
                        'Cut paneer into cubes and soak in warm salted water for 10 minutes (keeps it soft).',
                        'Slide paneer into simmered gravy. Finish with crushed kasuri methi, butter, and fresh cream. Simmer for 2 minutes only.'
                    ],
                    'success_criteria' => [
                        'Velvety, glossy restaurant gravy texture with no rough seeds or skins',
                        'Melt-in-mouth soft paneer cubes',
                        'Balanced sweet, tangy, and butter-scented aroma'
                    ],
                    'common_mistakes' => 'Boiling paneer for 15 minutes makes milk proteins contract and turn into tough rubber eraser texture.',
                    'safety' => 'Pureed tomato-cashew gravies bubble vigorously and spit; keep pot partially covered.'
                ],
                [
                    'id' => 'chal-balanced-pulao',
                    'title' => 'Make a Fragrant Balanced Vegetable Pulao',
                    'objective' => 'Cook long-grain Basmati pulao where carrots, beans, and peas stay crisp and rice remains non-mushy.',
                    'difficulty' => 'Intermediate',
                    'required_ingredients' => ['1.5 cups aged Basmati rice', 'Mixed vegetables (carrots, beans, peas, potatoes)', 'Whole spices (bay leaf, cloves, cinnamon, cardamom, star anise)', 'Ghee, mint, green chillies'],
                    'utensils' => ['Heavy saucepan or pressure cooker with gasket'],
                    'steps' => [
                        'Rinse and soak Basmati rice for 30 minutes. Drain completely.',
                        'Heat ghee/oil, bloom whole spices until aromatic (30 seconds).',
                        'Sauté sliced onions until golden; add ginger-garlic paste and mint leaves.',
                        'Add vegetables and sauté 2 minutes. Add drained rice and gently sauté for 1 minute to coat grains in ghee.',
                        'Pour 2.75 cups boiling water and salt. Bring to rolling boil.',
                        'Cover with lid, drop flame to lowest, and cook for 10 minutes. Rest 10 minutes before opening and fluffing.'
                    ],
                    'success_criteria' => [
                        'Every Basmati grain is elongated, separate, and fragrant',
                        'Vegetables are cooked through yet retain vibrant color and pleasant bite',
                        'Even distribution of whole spices and mint'
                    ],
                    'common_mistakes' => 'Pouring cold water drops cooking temperature and makes rice grains break.',
                    'safety' => 'Whole cardamom pods can pop in hot oil; make a tiny slit in them before dropping in pan.'
                ],
                [
                    'id' => 'chal-south-breakfast',
                    'title' => 'Prepare a Complete South Indian Breakfast Spread',
                    'objective' => 'Coordinate steaming hot idlis, crispy medu vada, fresh coconut chutney, and piping sambar simultaneously.',
                    'difficulty' => 'Intermediate',
                    'required_ingredients' => ['Idli batter', 'Urad dal batter for vada', 'Sambar vegetables & toor dal', 'Coconut chutney ingredients'],
                    'utensils' => ['Idli steamer', 'Deep frying kadai', 'Sambar saucepan', 'Chutney blender'],
                    'steps' => [
                        'Set toor dal and sambar vegetables to boil on stove burner 1.',
                        'Blend fresh coconut chutney and finish its tempering.',
                        'Load idli plates into preheated steamer on burner 2; set timer for 10 minutes.',
                        'Finish sambar seasoning with fresh tamarind and ground coriander-sambar powder.',
                        'Heat oil on burner 3; shape aerated vada batter with wet hands, make center hole, and deep fry to golden crisp.',
                        'Plate piping hot idlis and vadas together with steaming sambar and fresh chutney.'
                    ],
                    'success_criteria' => [
                        'All four items arrive on the table hot and fresh at the exact same moment',
                        'Vadas are crisp outside and airy inside; idlis are soft as jasmine flowers',
                        'Sambar has the authentic aroma of asafoetida and roasted coriander'
                    ],
                    'common_mistakes' => 'Frying vadas first: by the time idlis finish steaming, vadas turn soggy and lose crunch.',
                    'safety' => 'Deep frying requires high focus; maintain stable oil temperature at 175°C.'
                ],
                [
                    'id' => 'chal-soft-chapatis',
                    'title' => 'Make Cloud-Soft Phulka Chapatis',
                    'objective' => 'Knead, rest, roll, and cook 4 three-layered phulkas that balloon completely on the flame.',
                    'difficulty' => 'Intermediate',
                    'required_ingredients' => ['2 cups whole wheat chakki atta', 'Warm water', '1 tsp oil', 'Pinch salt'],
                    'utensils' => ['Chakla and belan', 'Flat tawa', 'Stainless steel tongs'],
                    'steps' => [
                        'Knead atta with warm water into soft, pliable dough. Cover with a damp cloth and rest for 30 minutes.',
                        'Divide into smooth, crack-free golf ball sized pedas.',
                        'Roll gently with light wrist pressure into even 6-inch circles, dusting minimal dry flour.',
                        'Place on hot tawa. When tiny blisters appear (20 secs), flip.',
                        'Cook second side for 35 secs until brown speckles show. Lift with tongs and place first side directly over open flame.',
                        'Watch it puff into a round ball. Remove immediately and brush with pure ghee.'
                    ],
                    'success_criteria' => [
                        'Chapati puffs up 100% into a full sphere on the flame',
                        'Remains soft and foldable even 3 hours after cooling',
                        'No burnt black patches or raw dough rings'
                    ],
                    'common_mistakes' => 'Rolling with excessive downward force seals dough edges together, preventing steam expansion.',
                    'safety' => 'Use sturdy tongs when transferring flatbread over open flame.'
                ],
                [
                    'id' => 'chal-andhra-pappu',
                    'title' => 'Prepare Flavorful Andhra Tomato Pappu',
                    'objective' => 'Cook authentic Andhra style toor dal with tomatoes, sour tamarind, green chillies, and mustard-garlic popu.',
                    'difficulty' => 'Intermediate',
                    'required_ingredients' => ['1 cup Toor dal', '3 ripe country tomatoes', '5 green chillies slit', '1 small onion', 'Small lemon-sized tamarind', 'Garlic cloves, mustard, cumin, curry leaves, ghee, hing'],
                    'utensils' => ['Pressure cooker', 'Traditional wooden pappu gutti masher', 'Tadka pan'],
                    'steps' => [
                        'In cooker, place toor dal, chopped tomatoes, onions, green chillies, turmeric, tamarind, and 2 cups water.',
                        'Pressure cook for 4 whistles on medium flame. Allow natural pressure drop.',
                        'Add rock salt and mash thoroughly with wooden gutti until tomatoes blend seamlessly into lentils.',
                        'Heat ghee and oil in tadka pan; add mustard seeds, cumin, crushed garlic cloves with skin, dry red chillies, and fresh curry leaves.',
                        'Pour sizzling tadka into the mashed dal and seal with lid immediately for 5 minutes.'
                    ],
                    'success_criteria' => [
                        'Tangy, spicy, and savory flavor balance with garlic warmth',
                        'Thick comforting dal consistency (not watery)',
                        'Tomatoes are completely broken down into the lentils'
                    ],
                    'common_mistakes' => 'Adding salt before cooking can slow down lentil softening in hard water regions.',
                    'safety' => 'Mash carefully with gutti; hot dal can splatter if pressed too aggressively.'
                ]
            ]
        ],

        'advanced' => [
            'level_name' => 'Advanced Challenges',
            'badge' => 'Advanced',
            'color' => '#C2410C',
            'icon' => '🌟',
            'items' => [
                [
                    'id' => 'chal-dum-biryani',
                    'title' => 'Prepare Layered Hyderabadi Dum Biryani',
                    'objective' => 'Execute authentic dum cooking: 70% parboiled Basmati layered over spiced marinade with sealed steam convection.',
                    'difficulty' => 'Advanced',
                    'required_ingredients' => ['500g Chicken or vegetables', '2 cups aged long-grain Basmati rice', 'Fried onions (Birista)', 'Mint, coriander, saffron milk, desi ghee', 'Biryani masala & whole spices'],
                    'utensils' => ['Heavy bottom biryani handi', 'Flat cast iron tawa', 'Foil or atta dough for sealing'],
                    'steps' => [
                        'Marinate chicken in yogurt, ginger-garlic, fried onions, mint, green chillies, and biryani spices for 2 hours.',
                        'Parboil soaked Basmati rice in salted water infused with whole spices until 70% cooked (firm center). Drain immediately.',
                        'Layer marinated meat at handi base. Spread parboiled rice evenly on top.',
                        'Garnish with saffron-infused warm milk, ghee, fried onions, and chopped mint.',
                        'Seal rim with aluminum foil and lid tightly. Place handi on preheated tawa.',
                        'Cook on high heat for 10 minutes, drop to lowest heat for 20 minutes, then rest off heat for 15 minutes undisturbed.',
                        'Open seal and gently scoop from the bottom corner to reveal colored layers.'
                    ],
                    'success_criteria' => [
                        'Rice grains stand straight like needles, completely separate',
                        'Meat is tender, juicy, and falls off the bone',
                        'Intoxicating saffron and cardamom aroma upon breaking the seal',
                        'Zero scorching at the pot bottom'
                    ],
                    'common_mistakes' => 'Opening the lid during dum cooking allows essential aromatic steam pressure to escape.',
                    'safety' => 'Massive burst of pressurized hot steam when breaking the seal; keep face back.'
                ],
                [
                    'id' => 'chal-indian-sweet',
                    'title' => 'Make Classic Melt-in-Mouth Gulab Jamun',
                    'objective' => 'Fry smooth, crack-free mawa/milk dough balls and soak them in cardamom-rose sugar syrup.',
                    'difficulty' => 'Advanced',
                    'required_ingredients' => ['1 cup milk powder or mawa', '3 tbsp all-purpose flour (maida)', '1/2 tsp baking powder', 'Warm milk to bind', 'Ghee for deep frying', 'Sugar, water, rose water, cardamom for syrup'],
                    'utensils' => ['Deep kadai with round base', 'Wide pan for sugar syrup', 'Perforated skimmer'],
                    'steps' => [
                        'Prepare syrup: boil equal parts sugar and water with crushed cardamom for 6 minutes until sticky (half-string). Keep warm.',
                        'Mix milk powder, maida, and baking powder. Add warm milk teaspoon by teaspoon, gently gathering into soft dough without kneading.',
                        'Roll into smooth, completely crack-free miniature marbles between palms greased with ghee.',
                        'Heat ghee to low-medium (130°C). Slide jamuns in; they should stay at the bottom for 30 seconds before floating.',
                        'Gently swirl ghee around balls without touching them directly. Fry on gentle low heat for 10-12 minutes until even deep golden mahogany.',
                        'Drain and drop hot jamuns directly into warm sugar syrup. Soak for 2 hours minimum.'
                    ],
                    'success_criteria' => [
                        'Zero cracks or fissures on the surface of the jamuns',
                        'Even deep golden brown hue without dark burn patches',
                        'Syrup penetrates 100% to the core; jamuns double in size and melt on the tongue'
                    ],
                    'common_mistakes' => 'Frying on high heat cooks only the outer crust, leaving a raw, hard, pasty dough center that never absorbs syrup.',
                    'safety' => 'Ghee temperature must be controlled carefully to prevent smoke.'
                ],
                [
                    'id' => 'chal-restaurant-meal',
                    'title' => 'Prepare a Complete Restaurant-Style Feast',
                    'objective' => 'Cook Restaurant Butter Naan, Paneer Butter Masala, and Dal Makhani from scratch for a family dinner.',
                    'difficulty' => 'Advanced',
                    'required_ingredients' => ['Whole black urad dal & rajma (soaked overnight)', 'Paneer cubes', 'Maida, yogurt, baking soda for naan', 'Butter, cream, cashew paste, tomatoes, kasuri methi'],
                    'utensils' => ['Pressure cooker', 'Cast iron tawa for naan', 'Deep gravy kadai', 'Blender'],
                    'steps' => [
                        'Slow cook soaked black dal and rajma with butter and tomato puree for 1 hour until creamy (Dal Makhani).',
                        'Prepare velvet strained tomato-cashew makhani gravy; simmer with soft paneer cubes, butter, and kasuri methi.',
                        'Knead soft fermented naan dough with flour, yogurt, and baking powder; rest 2 hours.',
                        'Roll naan teardrop shape; brush one side with water and stick onto hot cast iron tawa.',
                        'Flip tawa upside down directly over gas flame to roast naan until blistered and charred.',
                        'Brush hot naan with garlic butter and serve immediately with piping gravies.'
                    ],
                    'success_criteria' => [
                        'Naan has authentic tandoor-style blisters and chewiness',
                        'Dal Makhani is dark, creamy, and velvety with butter emulsion',
                        'Paneer butter masala has authentic restaurant richness and sweetness'
                    ],
                    'common_mistakes' => 'Using non-stick pan for naan: the wet dough slides off when inverted over the flame instead of sticking.',
                    'safety' => 'Flipping tawa over flame requires firm grip with oven mitts.'
                ],
                [
                    'id' => 'chal-bake-cake',
                    'title' => 'Bake a Sponge Cake with the Correct Crumb Texture',
                    'objective' => 'Bake an evenly risen, moist, golden sponge cake without a sunken center or rubbery crumb.',
                    'difficulty' => 'Advanced',
                    'required_ingredients' => ['1.5 cups all-purpose flour', '1 tsp baking powder', '1/2 tsp baking soda', '1/2 cup butter or oil', '3/4 cup sugar', '1 cup milk/yogurt', 'Vanilla extract'],
                    'utensils' => ['8-inch cake tin', 'Parchment paper', 'Whisk / Spatula', 'Preheated oven or heavy cooker with sand/salt'],
                    'steps' => [
                        'Preheat oven to 175°C (350°F). Grease cake tin and line base with parchment paper.',
                        'Sift dry flour, baking powder, and baking soda together twice (aerates flour).',
                        'In a separate bowl, whisk butter and sugar until pale and fluffy. Add vanilla and milk.',
                        'Gently fold dry ingredients into wet using cut-and-fold method. Do not overmix.',
                        'Pour into cake tin, tap on counter twice to release trapped air pockets.',
                        'Bake at 175°C for 30-35 minutes until a toothpick inserted in center comes out clean.'
                    ],
                    'success_criteria' => [
                        'Cake rises with a flat, even top without cracking or peaking',
                        'Springy crumb that bounces back when lightly pressed',
                        'Moist, tender texture throughout without gummy dense streaks'
                    ],
                    'common_mistakes' => 'Opening the oven door in the first 20 minutes causes sudden temperature drop and collapses the rising cake center.',
                    'safety' => 'Use dry oven gloves; hot baking tins retain heat for 20 minutes.'
                ],
                [
                    'id' => 'chal-coordinated-dinner',
                    'title' => 'Prepare Three Coordinated Dishes for a Family Dinner',
                    'objective' => 'Execute Chicken Curry, Vegetable Pulao, and Cucumber Onion Raita within 60 minutes with zero kitchen chaos.',
                    'difficulty' => 'Advanced',
                    'required_ingredients' => ['Chicken curry ingredients', 'Basmati rice and pulao vegetables', 'Fresh thick curd, cucumber, onion, roasted cumin'],
                    'utensils' => ['Pressure cooker / Handi', 'Wide chicken kadai', 'Mixing bowl'],
                    'steps' => [
                        'Mise en place: chop all onions, tomatoes, and chillies for both dishes simultaneously.',
                        'Start chicken curry: sear chicken in onion-masala base; bring to gentle simmer on burner 1.',
                        'Start vegetable pulao: bloom spices, sauté vegetables and rice; seal on burner 2.',
                        'While both pots simmer passively, whisk chilled yogurt with grated cucumber, onions, green chillies, and roasted cumin powder for raita.',
                        'Garnish all dishes with fresh coriander; serve together at the dining table.'
                    ],
                    'success_criteria' => [
                        'All three dishes are ready to serve within 60 minutes',
                        'Rich spicy curry is perfectly balanced by cooling raita and fragrant pulao',
                        'Stove and countertops are wiped clean before sitting down to eat'
                    ],
                    'common_mistakes' => 'Starting to chop vegetables for raita while chicken is burning on high flame.',
                    'safety' => 'Wash hands and knife with soap immediately after trimming raw poultry before touching salad or raita.'
                ]
            ]
        ]
    ];
}

/**
 * Returns Knowledge Centre content: Ingredients, Cooking Science & Troubleshooting
 */
function get_knowledge_centre_data(): array {
    return [
        'ingredients' => [
            'title' => 'Ingredient Knowledge Library',
            'desc' => 'Understand the role, selection, and behavior of essential cooking staples.',
            'items' => [
                [
                    'title' => 'Whole Spices vs. Ground Spices',
                    'icon' => '🌿',
                    'content' => 'Whole spices (cinnamon, cloves, cardamom, cumin) contain volatile flavor oils trapped inside intact cell structures that release gradually when bloomed in hot oil. Ground spices have exposed surface areas that oxidize rapidly; they must be stored in airtight containers away from sunlight and added on gentle heat to prevent burning.'
                ],
                [
                    'title' => 'Lentils & Pulses (Dals) Comparison',
                    'icon' => '🥣',
                    'content' => 'Toor Dal (Pigeon pea) is earthy, robust, and the backbone of South Indian sambar and pappu. Moong Dal (Yellow split) is light, sweet, and the easiest on digestion, perfect for khichdi and pongal. Urad Dal (Black gram) is high in protein and mucilage, which creates the frothy structure needed for idli/dosa fermentation and crispy medu vadas. Chana Dal retains its firm nutty bite even after prolonged cooking.'
                ],
                [
                    'title' => 'Rice Varieties & Cooking Properties',
                    'icon' => '🌾',
                    'content' => 'Aged Basmati has high amylose content, which prevents stickiness and causes grains to expand lengthwise when soaked and steamed. Sona Masoori is a medium-grain aromatic rice popular for everyday meals and sambar rice. Parboiled Rice (Idli Rice) undergoes gelatinization in its husk, locking in B-vitamins and producing superior porous fermented idlis.'
                ],
                [
                    'title' => 'Flours & Grains (Atta, Maida, Besan, Rava)',
                    'icon' => '🌾',
                    'content' => 'Chakki Atta is whole-wheat flour retaining the bran and germ, high in fiber and gluten-forming proteins for flexible rotis. Maida is refined wheat flour without bran, elastic and stretchy, ideal for flaky parottas and bakery cakes. Besan (Gram flour) is gluten-free, dense, and binds pakodas and gravies. Sooji/Rava (Semolina) is coarse durum wheat that absorbs water to create granular upma and halwa.'
                ],
                [
                    'title' => 'Cooking Oils & Fats (Ghee, Mustard, Sesame, Peanut)',
                    'icon' => '🫙',
                    'content' => 'Desi Ghee has a high smoke point (250°C) and contains butyric acid, providing royal rich aroma and smooth mouthfeel. Mustard Oil provides a pungent wasabi-like kick when heated to smoking point, essential for Bengali and North Indian curries. Cold-pressed Sesame (Til) Oil is the traditional Telugu cooking medium, bringing nutty warmth and natural antioxidant preservation to spicy pachadis.'
                ],
                [
                    'title' => 'Dairy (Curd, Paneer, Milk, Malai)',
                    'icon' => '🥛',
                    'content' => 'Curd/Yogurt contains lactic acid that tenderizes meat protein in biryani marinades and cuts through rich spices. Paneer is non-melting acid-set farmer cheese; it absorbs flavors through simmered gravies without disintegrating. Fresh Cream (Malai) emulsifies tomato acids and tempers extreme capsaicin heat in restaurant gravies.'
                ]
            ]
        ],

        'science' => [
            'title' => 'The Science of Cooking',
            'desc' => 'Understand the biological and chemical reactions that make food delicious.',
            'items' => [
                [
                    'title' => 'Why Onions Brown & Sweeten (Caramelization & Maillard)',
                    'icon' => '🧅',
                    'content' => 'Raw onions are pungent and sharp due to volatile sulfur compounds (syn-propanethial-S-oxide). When slowly heated in oil, sulfur compounds break down and natural complex sugars (fructans) convert into simple sweet fructose and glucose. As temperature crosses 140°C, the Maillard reaction creates hundreds of deep, savory, nutty flavor compounds that form the backbone of Indian gravies.'
                ],
                [
                    'title' => 'Why Rice Becomes Sticky vs. Fluffy (Amylose vs. Amylopectin)',
                    'icon' => '🍚',
                    'content' => 'Starch in rice consists of two molecules: Amylose (straight chains) and Amylopectin (branched chains). High-amylose rice (like aged Basmati) holds its shape, expands lengthwise, and stays separate. Short-grain rice contains high amylopectin, which bursts during cooking and creates sticky, creamy textures desirable in risotto and curd rice. Rinsing rice washes away loose surface starch that otherwise forms sticky glue in the pot.'
                ],
                [
                    'title' => 'How Fermentation Transforms Batter',
                    'icon' => '🫧',
                    'content' => 'During idli and dosa batter fermentation, wild lactic acid bacteria (Leuconostoc mesenteroides) ferment glucose and maltose into lactic acid (producing the pleasant sour tang) and carbon dioxide gas. The CO2 bubbles become trapped within the whipped urad dal protein foam, causing the batter to expand. When steamed, trapped gas expands further, resulting in pillowy-soft idlis.'
                ],
                [
                    'title' => 'Baking Soda vs. Baking Powder: The Essential Difference',
                    'icon' => '🧪',
                    'content' => 'Baking Soda (Sodium Bicarbonate) is a pure alkaline base. It requires an acidic ingredient (curd, buttermilk, lemon juice, or jaggery) to react and release carbon dioxide bubbles. Baking Powder contains sodium bicarbonate PLUS an internal powdered acid (cream of tartar). It activates simply upon contact with moisture and heat, making it suitable for neutral cakes and biscuits.'
                ],
                [
                    'title' => 'How Acid & Salt Tenderize and Balance Food',
                    'icon' => '🍋',
                    'content' => 'Acids (yogurt, lemon juice, vinegar) weaken muscle protein fibers in meats, allowing marinades to penetrate deeply and locking in moisture during cooking. Salt draws out surface moisture via osmosis when sweating onions, helps protein coagulation, and suppresses human tongue perception of bitter compounds while accentuating sweetness.'
                ],
                [
                    'title' => 'Starch Gelatinization: How Flour & Cornstarch Thicken Curries',
                    'icon' => '🥣',
                    'content' => 'Starch granules are tightly packed microscopic spheres. In cold water, they remain suspended. As the liquid reaches 60°C-80°C, water penetrates the starch granules, causing them to swell and burst, releasing amylose polymers into the surrounding liquid. This forms a tangled microscopic mesh that traps free water molecules, transforming thin broth into a rich, glossy, clinging sauce.'
                ]
            ]
        ],

        'troubleshooting' => [
            'title' => 'Kitchen Troubleshooting & Practical Fixes',
            'desc' => 'Safe, proven solutions for everyday cooking mishaps without wasting food.',
            'items' => [
                [
                    'problem' => 'How to Fix an Overly Salty Curry or Dal',
                    'icon' => '🧂',
                    'cause' => 'Accidental heavy-handed salting or excessive reduction of simmering gravy.',
                    'solution' => 'Add 2-3 peeled, raw potato chunks to the simmering curry for 10 minutes—potatoes absorb salt and water via osmosis (discard or eat potatoes later). Alternatively, stir in 2-3 tablespoons of fresh thick cream, whisked curd, coconut milk, or cashew paste to dilute salt intensity. For dal, add boiled unsalted lentils or a squeeze of fresh lemon juice with a pinch of jaggery to rebalance your palate.'
                ],
                [
                    'problem' => 'How to Fix an Overly Sour Dish (Excess Tomato or Tamarind)',
                    'icon' => '🍋',
                    'cause' => 'Using sour country tomatoes or excessive tamarind pulp.',
                    'solution' => 'Add a small thumbnail-sized piece of jaggery or 1/2 teaspoon of sugar; sweetness balances sour perception. Stir in a splash of heavy cream, coconut milk, or milk. You can also add 1/4 teaspoon of baking soda—it gently neutralizes excess acidity (producing a mild temporary fizz) and restores a balanced pH.'
                ],
                [
                    'problem' => 'What to Do When a Curry is Watery and Thin',
                    'icon' => '🍲',
                    'cause' => 'Adding too much water or under-reducing tomato base.',
                    'solution' => 'Simmer the pot uncovered on medium-high heat for 6-8 minutes to evaporate excess water. Alternatively, whisk 1 tablespoon of roasted gram flour (besan) or cashew paste with 2 tablespoons of warm curry liquid and stir back in; simmer for 2 minutes to thicken into a luxurious gravy.'
                ],
                [
                    'problem' => 'How to Fix an Overly Thick Gravy',
                    'icon' => '🥣',
                    'cause' => 'Over-reduction or starch absorption as the dish cools.',
                    'solution' => 'Never add cold tap water directly to a finished curry; it dilutes spice flavor and separates the oil. Always stir in boiling water or hot milk in small increments (2 tablespoons at a time), stirring over gentle heat until desired consistency is achieved. Taste and adjust salt if needed.'
                ],
                [
                    'problem' => 'Why Dosa Batter Fails to Ferment',
                    'icon' => '🥞',
                    'cause' => 'Cold ambient kitchen temperature (<22°C) or over-salting before fermentation.',
                    'solution' => 'Place the batter bowl inside your kitchen oven with only the oven lightbulb turned on (creates a gentle 28°C-30°C micro-climate). You can also place the bowl inside an insulated casserole or next to a warm instant pot/warm water bath. Adding 1/4 teaspoon of sugar or a pinch of baking yeast jump-starts sluggish bacteria in winter.'
                ],
                [
                    'problem' => 'Why Chapatis Become Hard and Chewy Like Leather',
                    'icon' => '🫓',
                    'cause' => 'Dough was too dry, not rested enough, rolled with excessive dry flour, or cooked on a lukewarm tawa.',
                    'solution' => 'Ensure your dough is soft and pliable (hydrate with warm water). Rest dough for at least 25 minutes. Heat tawa until genuinely hot; cooking chapatis slowly on a low-heat tawa bakes out all internal moisture, turning them into dry crackers. Store cooked hot chapatis in an insulated container lined with a cotton towel.'
                ],
                [
                    'problem' => 'Why Biryani Rice Becomes Mushy and Sticky',
                    'icon' => '🍚',
                    'cause' => 'Parboiling rice past 75% or adding excess liquid to the dum pot.',
                    'solution' => 'Spread the mushy biryani over wide baking trays immediately to stop residual cooking and allow excess steam to evaporate into the air. In future batches, pull rice out of boiling water when the center still has a distinct white chalky bite (around 4-5 minutes of boiling).'
                ],
                [
                    'problem' => 'Why Gulab Jamuns Crack or Collapse in Oil',
                    'icon' => '🍯',
                    'cause' => 'Dough was too dry or contained excess baking soda; or oil was too hot.',
                    'solution' => 'If dough feels stiff, add 1-2 teaspoons of warm milk and rest 5 minutes before rolling. Fry in warm ghee on gentle low heat; if ghee is hot, the exterior crust cooks in 10 seconds while the interior expands violently, splitting the jamun open.'
                ],
                [
                    'problem' => 'Why Fried Snacks (Pakodi, Vada) Absorb Too Much Oil',
                    'icon' => '🥟',
                    'cause' => 'Oil temperature was too low (<150°C) or batter was overly watery.',
                    'solution' => 'Test oil with a tiny drop of batter: it must rise to the surface in 2 seconds with active bubbling. Frying in lukewarm oil allows oil to seep into the pores of the food before a protective outer crust can seal.'
                ]
            ]
        ]
    ];
}

/**
 * Returns cooking quizzes organized by difficulty level
 */
function get_cooking_quizzes(): array {
    return [
        'beginner' => [
            'id' => 'quiz-beginner',
            'title' => 'Beginner Kitchen Skills Quiz',
            'badge' => 'Level 1',
            'description' => 'Test your understanding of basic measurements, knife safety, flame control, and spice identification.',
            'questions' => [
                [
                    'id' => 'q-b1',
                    'question' => 'How many teaspoons (tsp) make up 1 standard tablespoon (tbsp)?',
                    'options' => ['2 teaspoons', '3 teaspoons', '4 teaspoons', '5 teaspoons'],
                    'correct_index' => 1,
                    'explanation' => 'Exactly 3 teaspoons equal 1 tablespoon (1 tbsp = 15 ml, 1 tsp = 5 ml). Remembering this prevents over-salting recipes!'
                ],
                [
                    'id' => 'q-b2',
                    'question' => 'What is the "claw grip" used for when chopping vegetables?',
                    'options' => [
                        'To grip the knife handle firmly with both hands',
                        'To curl non-knife guide fingers inward to protect fingertips from cuts',
                        'To crush garlic cloves with knuckles',
                        'To squeeze excess water out of vegetables'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'The claw grip curls your guide fingers inward like a bear claw, resting the flat knife blade against your knuckles, keeping fingertips safe.'
                ],
                [
                    'id' => 'q-b3',
                    'question' => 'Why must mustard seeds splutter in hot oil before other spices are added?',
                    'options' => [
                        'To burn off extra fat',
                        'To crack their outer husk and release natural nutty volatile oils',
                        'To change oil color to yellow',
                        'To reduce oil temperature'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Mustard seeds have a hard outer shell containing sulfur compounds. Spluttering in hot oil breaks the shell and releases nutty aromatics without bitterness.'
                ],
                [
                    'id' => 'q-b4',
                    'question' => 'What should you do if your pressure cooker has finished its whistles?',
                    'options' => [
                        'Pry the lid open immediately with a knife',
                        'Run freezing cold water over the lid while shaking it',
                        'Turn off the flame and let the steam pressure subside naturally before opening',
                        'Unscrew the safety valve with a wrench'
                    ],
                    'correct_index' => 2,
                    'explanation' => 'Always wait for pressure to drop naturally. Forcing open a pressurized cooker can cause hot steam and liquid to explode outward.'
                ],
                [
                    'id' => 'q-b5',
                    'question' => 'Why should you NOT add tap water when blending ginger-garlic paste for long storage?',
                    'options' => [
                        'Water makes the blender motor stop',
                        'Water introduces moisture that causes rapid bacterial spoilage and odor within days',
                        'Water turns garlic bright red',
                        'Water makes the paste sweet'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Moisture promotes bacterial growth. Blending with a little salt and oil acts as a natural preservative, keeping paste fresh for weeks.'
                ]
            ]
        ],

        'intermediate' => [
            'id' => 'quiz-intermediate',
            'title' => 'Intermediate Home Cook Quiz',
            'badge' => 'Level 2',
            'description' => 'Challenge your knowledge of onion-tomato gravies, batter fermentation, dough resting, and rice ratios.',
            'questions' => [
                [
                    'id' => 'q-i1',
                    'question' => 'What is the visual indicator that an onion-tomato masala base is fully cooked?',
                    'options' => [
                        'It starts bubbling like boiling water',
                        'The mixture turns pale white and watery',
                        'Oil separates around the edges and the masala clumps into a glossy mass',
                        'The tomatoes turn green'
                    ],
                    'correct_index' => 2,
                    'explanation' => 'When all tomato moisture evaporates, oil separates and shimmers along the edges (tel chhodna), signaling that raw acid is gone and flavor is concentrated.'
                ],
                [
                    'id' => 'q-i2',
                    'question' => 'Why is whole wheat atta dough rested for 25-30 minutes after kneading?',
                    'options' => [
                        'To cool down from hand heat',
                        'To allow wheat proteins to fully hydrate and gluten tension to relax, making rolling effortless',
                        'To dry out the dough so it does not stick',
                        'To ferment like bread dough'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Autolysis and gluten relaxation during the rest period make dough elastic and soft, allowing rotis to roll thinly and puff up on flame.'
                ],
                [
                    'id' => 'q-i3',
                    'question' => 'What is the ideal ambient temperature range for fermenting idli/dosa batter?',
                    'options' => [
                        '10°C to 15°C (refrigerator cool)',
                        '28°C to 32°C (warm tropical room temperature)',
                        '55°C to 65°C (hot water bath)',
                        '100°C (boiling steam)'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Lactic acid bacteria thrive between 28°C and 32°C. Below 20°C fermentation is sluggish; above 40°C the batter turns harshly sour.'
                ],
                [
                    'id' => 'q-i4',
                    'question' => 'How can you prevent cold yogurt from curdling when stirring it into a hot curry?',
                    'options' => [
                        'Add ice cubes to the curry first',
                        'Whisk room-temperature yogurt with 1 tsp gram flour (besan) and lower flame before stirring',
                        'Boil yogurt vigorously before adding',
                        'Add vinegar to the yogurt'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Gram flour (besan) coats dairy proteins and stabilizes the emulsion, preventing milk solids from clumping into white curds under heat.'
                ],
                [
                    'id' => 'q-i5',
                    'question' => 'Why should cooked rice rest for 10 minutes off the heat with the lid closed before fluffing?',
                    'options' => [
                        'To cool down completely',
                        'To allow trapped steam to redistribute moisture evenly so grains do not break when touched',
                        'To let the pan cool for washing',
                        'To absorb air from outside'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Hot freshly cooked grains are fragile. Resting redistributes steam and firms the outer grain shell, letting you fluff with a fork without mushiness.'
                ]
            ]
        ],

        'advanced' => [
            'id' => 'quiz-advanced',
            'title' => 'Advanced & Restaurant Chef Quiz',
            'badge' => 'Level 3 & 4',
            'description' => 'Test your mastery of dum cooking physics, sugar syrup stages, tandoor smoke techniques, and wok hei.',
            'questions' => [
                [
                    'id' => 'q-a1',
                    'question' => 'At what percentage of doneness should Basmati rice be drained before layering in a Hyderabadi Dum Biryani?',
                    'options' => [
                        '30% cooked (crunchy hard)',
                        '70% to 75% cooked (tender outer with a firm white core needle)',
                        '95% cooked (almost soft)',
                        '100% fully soft and ready to eat'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Parboiling rice to 70-75% leaves room for the grain to absorb rising meat steam during sealed dum cooking without turning into mush.'
                ],
                [
                    'id' => 'q-a2',
                    'question' => 'What is the Dhungar method in Indian cooking?',
                    'options' => [
                        'Grinding spices using a granite stone mortat',
                        'Infusing dishes with authentic tandoor smoke using a glowing piece of charcoal and ghee',
                        'Cooking dal in an open clay pot under direct sunlight',
                        'Deep frying paneer in boiling mustard oil'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Dhungar places glowing charcoal in a small metal cup inside the pot; drizzling ghee produces rich aromatic smoke sealed under a lid.'
                ],
                [
                    'id' => 'q-a3',
                    'question' => 'What sugar syrup consistency is required for soft, syrup-soaked Gulab Jamuns?',
                    'options' => [
                        'Sticky / Half-String (Chipchipa, ~104°C)',
                        'Two-string hard consistency (~118°C)',
                        'Hard ball stage (~125°C)',
                        'Burnt caramel syrup'
                    ],
                    'correct_index' => 0,
                    'explanation' => 'Gulab Jamuns require thin, warm, sticky half-string syrup. Thick one- or two-string syrup cannot penetrate into the fried mawa core.'
                ],
                [
                    'id' => 'q-a4',
                    'question' => 'What causes the authentic "Wok Hei" flavor in high-heat Indo-Chinese stir-fries?',
                    'options' => [
                        'Adding dark soy sauce and MSG',
                        'Aerosolized oil droplets vaporizing and catching flame in an ultra-hot seasoned wok (>250°C)',
                        'Boiling noodles in salt water',
                        'Covering the wok with a heavy wooden lid'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'Wok Hei ("breath of the wok") occurs when micro-droplets of cooking oil vaporize under intense heat and caramelize against superheated wok surfaces.'
                ],
                [
                    'id' => 'q-a5',
                    'question' => 'Why is double-frying used for crispy starters like Gobi Manchurian and Chilli Paneer?',
                    'options' => [
                        'To absorb more cooking oil',
                        'First fry cooks the interior; second flash-fry at higher heat expels surface moisture for a long-lasting crisp crust',
                        'To change the shape of the batter',
                        'Because one fry is not safe'
                    ],
                    'correct_index' => 1,
                    'explanation' => 'The first fry cooks the vegetable/meat through. Resting allows moisture to migrate to the crust; the second high-heat fry flashes off that water, creating a glass-crisp shell.'
                ]
            ]
        ]
    ];
}
