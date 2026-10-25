<?php
// includes/rescue-data.php - Comprehensive Cooking Problem Knowledge Base (50+ Entries)
declare(strict_types=1);

/**
 * Returns complete database of 50+ cooking troubleshooting guides
 */
function get_rescue_knowledge_base(): array {
    return [
        // ==========================================
        // 1. CURRIES AND GRAVIES
        // ==========================================
        'curry-too-salty' => [
            'id' => 'curry-too-salty',
            'title' => 'Curry or Gravy is Too Salty',
            'category' => 'Curries and Gravies',
            'dishes' => ['Tomato Curry', 'Chicken Curry', 'Paneer Butter Masala', 'Vegetable Kurma', 'Dal Makhani', 'General Curry'],
            'keywords' => ['salty', 'excess salt', 'uppu ekkuva', 'namak zyada', 'over salted', 'briny', 'saline'],
            'symptoms' => 'Harsh, stinging salt taste overpowering the aromatic spices, vegetables, or meat.',
            'severity' => 'Moderate', // Minor, Moderate, Serious
            'causes' => [
                'Accidental heavy salting during cooking.',
                'Boiling and reducing a curry down too much, concentrating the salt.',
                'Using salted butter, salted stock, or salted canned purees without adjusting table salt.'
            ],
            'immediate_steps' => [
                'Immediately stop adding any salt, soy sauce, chaat masala, or salty seasoning.',
                'Taste a small spoonful of gravy to gauge if it is slightly over-salted (mild) or intensely brine-like (severe).',
                'Dilution via unsalted liquid: Add 3-4 tablespoons of unsalted hot water or unsalted stock, simmer for 3 minutes, and re-taste.',
                'Stir in dairy or plant cream: Add 2-3 tablespoons of fresh heavy cream, whisked unsweetened yogurt (curd), or thick coconut milk. The fat molecules coat the tongue and mellow sodium perception.',
                'Starch addition: Drop 3-4 large peeled raw potato wedges into the simmering curry for 10-12 minutes. Potatoes absorb liquid and sodium equally (osmosis), allowing you to safely replenish with unsalted hot water. Discard or enjoy the potatoes later.'
            ],
            'alternatives' => [
                [
                    'name' => 'Kneaded Flour Dough Balls',
                    'suitability' => 'Liquid curries, rasam, and thin dals.',
                    'action' => 'Drop 2 golf-ball-sized lumps of raw wheat flour dough (atta) into the boiling curry for 8 minutes, then remove and discard. They absorb salty broth effectively.',
                    'limitations' => 'Can impart slight raw starch aroma if left too long or if dough dissolves.'
                ],
                [
                    'name' => 'Boiled Unsalted Tomato or Onion Puree',
                    'suitability' => 'North Indian gravies and tomato-based curries.',
                    'action' => 'Sauté 1 pureed tomato or boiled onion paste in a separate pan with 1/2 tsp ghee until cooked, then fold into the salty curry to increase total gravy volume.',
                    'limitations' => 'Requires 5 extra minutes of cooking.'
                ],
                [
                    'name' => 'Acid & Sweet Counter-Balance',
                    'suitability' => 'Mildly over-salted gravies.',
                    'action' => 'Add 1/2 teaspoon lemon juice plus 1/4 teaspoon jaggery or sugar. This masks minor sodium sharpness on taste buds.',
                    'limitations' => 'Does not physically remove sodium; only balances sensory perception.'
                ]
            ],
            'items_needed' => [
                'required' => ['Pot or pan on stove', 'Tasting spoon'],
                'optional' => ['Raw potatoes', 'Fresh cream / whisked curd', 'Coconut milk', 'Whole wheat dough', 'Lemon juice']
            ],
            'what_not_to_do' => [
                'Do not dump a huge mug of cold water directly into hot gravy; it breaks the emulsion, curdles spices, and makes gravy taste bland and washed out.',
                'Do not add sugar excessively—you will end up with sweet salty curry.',
                'Do not believe myths that potatoes magically pull out 100% of salt without dilution.'
            ],
            'prevention' => [
                'Always salt in two stages: half while sautéing onions/tomatoes, and the remaining half after gravy has fully reduced.',
                'Remember that simmering evaporates water, making saltier gravy as time passes.',
                'Taste before serving, preferably off the heat, as boiling liquids dull human taste sensitivity.'
            ],
            'science' => 'Taste receptors on the human tongue perceive saltiness via epithelial sodium channels (ENaC). Fat droplets from cream or ghee physically coat these receptor sites, dulling sodium impact. Increasing unsalted volume reduces sodium ion concentration per milliliter.',
            'related_recipe_ids' => ['restaurant-paneer-butter-masala', 'andhra-chicken-curry', 'vegetable-kurma'],
            'related_lesson_ids' => ['lesson-101', 'lesson-201']
        ],

        'curry-too-spicy' => [
            'id' => 'curry-too-spicy',
            'title' => 'Curry or Dish is Too Spicy (Chilli Heat)',
            'category' => 'Curries and Gravies',
            'dishes' => ['Andhra Chicken Curry', 'Egg Curry', 'Chole Masala', 'Tomato Pappu', 'General Curry'],
            'keywords' => ['spicy', 'too hot', 'mirchi ekkuva', 'teekha', 'chilli heat', 'burning tongue'],
            'symptoms' => 'Overpowering burning sensation in the mouth and throat from excess green chillies, red chilli powder, or black pepper.',
            'severity' => 'Moderate',
            'causes' => [
                'Accidental excess addition of pungent dry red chilli powder or fiery green chillies.',
                'Chilli powder was fresher or hotter than anticipated (e.g. Guntur chillies).',
                'Simmering with whole split chillies left in the pot too long.'
            ],
            'immediate_steps' => [
                'Fish out and discard any visible floating green chillies, whole dried red chillies, or peppercorns.',
                'Stir in dairy fats: Add 2-3 tablespoons of fresh malai, heavy cream, whisked curd, or a generous dollop of unsalted butter/ghee.',
                'Add coconut milk or cashew paste: For South Indian, Coastal, or Thai dishes, 1/4 cup thick coconut milk instantly tames heat.',
                'Add acid and sweetness: Squeeze 1 teaspoon fresh lemon juice and add 1/2 teaspoon honey or jaggery. Acid breaks capsaicin binding.',
                'Serve accompanied by cooling sides: Plain curd rice, cucumber raita, or mild steamed rice.'
            ],
            'alternatives' => [
                [
                    'name' => 'Nut Paste Emulsion',
                    'suitability' => 'Mughlai or restaurant-style curries.',
                    'action' => 'Blend 8-10 soaked cashews or blanched almonds with 2 tbsp warm milk into a paste, and stir into the simmering curry.',
                    'limitations' => 'Thickens the curry considerably.'
                ],
                [
                    'name' => 'Dilution with Pre-Cooked Veggies or Pulses',
                    'suitability' => 'Dals, vegetable kurmas, and gravies.',
                    'action' => 'Mix in boiled mashed potatoes, boiled green peas, or unsalted boiled lentils.',
                    'limitations' => 'Increases portion size.'
                ]
            ],
            'items_needed' => [
                'required' => ['Tasting spoon', 'Ladle to fish out chillies'],
                'optional' => ['Dairy cream or curd', 'Desi ghee or butter', 'Coconut milk', 'Cashews', 'Lemon & jaggery']
            ],
            'what_not_to_do' => [
                'Do not drink or add cold tap water—capsaicin is an oil-soluble chemical and water merely spreads the fiery molecules across your tongue.',
                'Do not attempt to cook off chilli heat by boiling longer; capsaicin is heat-stable and will not evaporate.'
            ],
            'prevention' => [
                'Taste your raw chilli powder batch beforehand to gauge its Scoville pungency.',
                'De-seed green chillies before chopping if you or family members prefer mild heat.',
                'Use Kashmiri red chilli powder for rich red color with gentle warmth rather than spicy cayenne.'
            ],
            'science' => 'Capsaicin is a hydrophobic chemical compound that triggers TRPV1 pain receptors. Casein (a protein in dairy) binds to capsaicin molecules, washing them away from sensory nerve endings just like detergent cuts through grease.',
            'related_recipe_ids' => ['andhra-chicken-curry', 'punjabi-chole-masala', 'andhra-egg-curry'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'curry-too-watery' => [
            'id' => 'curry-too-watery',
            'title' => 'Gravy or Curry is Too Watery and Thin',
            'category' => 'Curries and Gravies',
            'dishes' => ['Paneer Butter Masala', 'Chicken Curry', 'Vegetable Kurma', 'Egg Curry', 'Sambar'],
            'keywords' => ['watery', 'thin gravy', 'runny curry', 'dilute', 'not thick', 'neellaga undi'],
            'symptoms' => 'Liquid separates from the spices and solids, pooling like flavored water on the plate.',
            'severity' => 'Minor',
            'causes' => [
                'Pouring too much water into the pan too early.',
                'Vegetables or thawed chicken releasing excess natural juices during simmering.',
                'Not reducing the onion-tomato base before adding liquid.'
            ],
            'immediate_steps' => [
                'Uncover the pot: Remove the lid completely and increase heat to medium-high. Allow rapid steam evaporation for 6 to 8 minutes.',
                'Fish out delicate protein (like soft paneer or fish fillets) temporarily so they do not overcook while the sauce boils down.',
                'Mash cooked vegetables: Use the back of a wooden ladle to mash 3-4 pieces of cooked potatoes, dal, or boiled onions against the pot wall.',
                'Add roasted gram flour slurry: Whisk 1 tablespoon roasted besan (chana flour) or cashew paste with 3 tablespoons warm gravy in a cup, then whisk back into the pot and boil for 2 minutes.',
                'Finish with butter or cream: Emulsify with 1 tbsp cold butter or 2 tbsp heavy cream over gentle heat.'
            ],
            'alternatives' => [
                [
                    'name' => 'Cornstarch / Rice Flour Slurry',
                    'suitability' => 'Indo-Chinese gravies, clear curries, or stews.',
                    'action' => 'Dissolve 1 tsp cornflour or rice flour in 2 tbsp cold water, pour into boiling curry, stir continuously until glossy.',
                    'limitations' => 'Avoid using in traditional dals as it gives a glossy, artificial texture.'
                ],
                [
                    'name' => 'Cashew or Poppy Seed Paste',
                    'suitability' => 'Kurma, korma, and rich North Indian gravies.',
                    'action' => 'Grind 8 cashews or 1 tbsp poppy seeds into a milky paste; stir in and simmer 3 minutes.',
                    'limitations' => 'Adds richness and calories.'
                ]
            ],
            'items_needed' => [
                'required' => ['Stovetop with lid removed', 'Stirring ladle'],
                'optional' => ['Roasted gram flour (besan)', 'Cashews', 'Cornstarch', 'Cold butter']
            ],
            'what_not_to_do' => [
                'Do not dump dry raw flour directly into hot gravy—it will form stubborn, gluey lumps that ruin the sauce.',
                'Do not boil fish or paneer aggressively for 10 minutes to reduce water; they will disintegrate or become rubbery.'
            ],
            'prevention' => [
                'Always add liquid in conservative splashes. You can always add water later, but removing it takes time.',
                'Cook onion-tomato masala until oil separates around the edges before pouring in water.'
            ],
            'science' => 'Gravy viscosity relies on suspended solids and starches absorbing water molecules (starch gelatinization). Free boiling water evaporates when the lid is removed, while starch slurries bind free moisture into a stable suspension.',
            'related_recipe_ids' => ['restaurant-paneer-butter-masala', 'vegetable-kurma', 'restaurant-shahi-paneer'],
            'related_lesson_ids' => ['lesson-201', 'lesson-401']
        ],

        'curry-too-thick' => [
            'id' => 'curry-too-thick',
            'title' => 'Gravy or Curry is Overly Thick, Paste-Like or Gloopy',
            'category' => 'Curries and Gravies',
            'dishes' => ['Dal Makhani', 'Shahi Paneer', 'Chole Masala', 'Kurma', 'Rajma'],
            'keywords' => ['too thick', 'paste like', 'gloopy', 'thick gravy', 'stiff dal', 'gelatinous'],
            'symptoms' => 'Gravy resembles a heavy paste, sticks stubbornly to the bottom, and loses fluid appeal.',
            'severity' => 'Minor',
            'causes' => [
                'Over-reducing the pot on high flame.',
                'Starches in pulses (dal, chole, rajma) absorbing water as the dish cools.',
                'Adding excessive cashew paste, cream, or cornstarch.'
            ],
            'immediate_steps' => [
                'Turn flame down to gentle low immediately to prevent scorching at the base.',
                'Heat water or broth separately in an electric kettle or small saucepan until piping hot.',
                'Gradually stir hot boiling water in small increments (2 to 3 tablespoons at a time) into the curry.',
                'Simmer for 2 minutes to allow the fresh liquid to homogenize with the spices and oils.',
                'Taste and re-adjust salt or garam masala, as adding significant water slightly dilutes flavor.'
            ],
            'alternatives' => [
                [
                    'name' => 'Hot Milk or Cream Thinning',
                    'suitability' => 'Makhani, Dal Makhani, Paneer Butter Masala.',
                    'action' => 'Stir in warm full-fat milk rather than water to maintain luxurious creaminess.',
                    'limitations' => 'Keep flame gentle so milk does not boil rapidly and scorch.'
                ],
                [
                    'name' => 'Hot Vegetable / Bone Broth',
                    'suitability' => 'Meat curries, sambar, and vegetable gravies.',
                    'action' => 'Thin with warm unsalted broth instead of plain water for deeper savoriness.',
                    'limitations' => 'Requires prepared broth on hand.'
                ]
            ],
            'items_needed' => [
                'required' => ['Separate kettle/saucepan to heat water', 'Ladle'],
                'optional' => ['Warm milk', 'Broth']
            ],
            'what_not_to_do' => [
                'Never pour cold tap water directly into hot thickened gravy; it causes temperature shock, breaks the oil emulsion, and leaves a raw watery taste.',
                'Do not crank up the flame without stirring—thick gravy burns in seconds at the base.'
            ],
            'prevention' => [
                'Anticipate starch thickening: Dals, chole, and cashew gravies naturally thicken by 30% after sitting for 20 minutes.',
                'Turn off flame when the sauce is slightly looser than your desired final table consistency.'
            ],
            'science' => 'Amylose and amylopectin starches in beans and potatoes continue retrograding (binding water into a rigid gel matrix) as temperature drops below 70°C. Adding hot liquid rehydrates the matrix without thermal shock.',
            'related_recipe_ids' => ['restaurant-dal-makhani', 'punjabi-chole-masala', 'punjabi-rajma-masala'],
            'related_lesson_ids' => ['lesson-201', 'lesson-202']
        ],

        'curry-too-sour' => [
            'id' => 'curry-too-sour',
            'title' => 'Curry or Dal is Overly Sour or Acidic',
            'category' => 'Curries and Gravies',
            'dishes' => ['Tomato Pappu', 'Andhra Tomato Curry', 'Fish Curry', 'Sambar', 'Rasam'],
            'keywords' => ['sour', 'too tart', 'acidic', 'pulla ga undi', 'khatta', 'excess tamarind', 'sour tomato'],
            'symptoms' => 'Sharp, mouth-puckering tartness from excess tamarind, unripe tomatoes, amchur, or yogurt.',
            'severity' => 'Minor',
            'causes' => [
                'Using overly acidic country tomatoes (desi tamatar) without sweet balancing.',
                'Pouring thick tamarind pulp without tasting its concentration.',
                'Over-fermented sour curd added to gravies like Kadhi or Kurma.'
            ],
            'immediate_steps' => [
                'Add natural sweetness: Stir in 1/2 to 1 teaspoon of grated jaggery (gud) or brown sugar. Sweetness counteracts sour receptors.',
                'Add fat/dairy: Stir in 2-3 tablespoons of fresh cream, malai, or coconut cream. Fat buffers acidity on the palate.',
                'Neutralize with culinary pinch of baking soda: Add 1/8 to 1/4 teaspoon baking soda. It will gently foam and directly neutralize excess citric and tartaric acids.',
                'Simmer for 2-3 minutes until foaming subsides and re-taste.'
            ],
            'alternatives' => [
                [
                    'name' => 'Boiled Potato or Sweet Potato Chunks',
                    'suitability' => 'Sambar, fish curry, vegetable stews.',
                    'action' => 'Add boiled sweet potato or yellow potato to absorb acid and add gentle sweetness.',
                    'limitations' => 'Adds extra solid ingredients to the dish.'
                ],
                [
                    'name' => 'Dilution with Plain Boiled Dal',
                    'suitability' => 'Tomato Pappu, Sambar, and lentil curries.',
                    'action' => 'Stir in 1/2 cup of unsalted, un-soured cooked yellow toor dal or moong dal.',
                    'limitations' => 'Requires cooked dal ready.'
                ]
            ],
            'items_needed' => [
                'required' => ['Stovetop', 'Spoon'],
                'optional' => ['Jaggery or sugar', 'Baking soda (edible sodium bicarbonate)', 'Fresh cream / coconut milk']
            ],
            'what_not_to_do' => [
                'Do not dump a tablespoon of baking soda—too much imparts an unpleasant soapy, metallic taste.',
                'Do not mask sourness by adding huge amounts of salt or chilli powder.'
            ],
            'prevention' => [
                'Taste tamarind water before adding it into dal or curries.',
                'If using tart desi tomatoes, pair with 1/4 teaspoon jaggery right during the tempering stage.'
            ],
            'science' => 'Edible sodium bicarbonate ($NaHCO_3$) is an alkaline base that reacts with acidic hydrogen ions ($H^+$) in tomatoes (citric acid) and tamarind (tartaric acid), creating water, trace neutral salts, and carbon dioxide bubbles, physically raising the pH toward neutral.',
            'related_recipe_ids' => ['andhra-tomato-pappu', 'hotel-style-sambar', 'andhra-tomato-rasam'],
            'related_lesson_ids' => ['lesson-101', 'lesson-201']
        ],

        'curry-too-oily' => [
            'id' => 'curry-too-oily',
            'title' => 'Excess Oil or Ghee Floating on Top (Roghan Overload)',
            'category' => 'Curries and Gravies',
            'dishes' => ['Chicken Curry', 'Paneer Butter Masala', 'Mutton Curry', 'Biryani Gravy', 'Egg Curry'],
            'keywords' => ['oily', 'greasy', 'too much ghee', 'excess oil', 'telu ekkuva', 'floating oil'],
            'symptoms' => 'Heavy layer of red grease floating on the surface, making each bite feel heavy on the palate.',
            'severity' => 'Minor',
            'causes' => [
                'Adding excessive oil during tempering or sautéing spices.',
                'Meat releasing high amounts of rendered animal fat during simmering.'
            ],
            'immediate_steps' => [
                'The Ice Cube Ladle Trick: Place 2-3 large ice cubes into the bowl of a metal soup ladle. Hover the chilled bottom of the ladle over the hot curry surface. Floating oil instantly solidifies onto the cold metal; wipe with a paper towel and repeat 3-4 times.',
                'Spoon skim method: Turn off flame and let pot rest undisturbed for 5 minutes. Oil floats to the top; tilt the pot slightly and gently ladle the clear top oil into a clean glass jar (save for tomorrow’s tadka!).',
                'Paper towel dab: Lightly drag a clean, food-safe paper towel across the surface to absorb excess surface oil in seconds.'
            ],
            'alternatives' => [
                [
                    'name' => 'Chilling in Refrigerator (For Make-Ahead Stews)',
                    'suitability' => 'Mutton curry, rich meat broths, and chicken gravies.',
                    'action' => 'Refrigerate the pot for 1 hour; saturated fats solidify into a firm white disk on top that easily lifts off with a fork.',
                    'limitations' => 'Requires waiting time.'
                ]
            ],
            'items_needed' => [
                'required' => ['Metal ladle', 'Small bowl to collect oil'],
                'optional' => ['Ice cubes', 'Food-safe paper towel']
            ],
            'what_not_to_do' => [
                'Do not drop raw ice cubes directly into the hot curry; melting water dilutes the gravy and splashes hot grease.',
                'Do not stir aggressively while trying to skim—let the oil separate at rest first.'
            ],
            'prevention' => [
                'Measure cooking oil with tablespoons instead of pouring freehand directly from the heavy oil jar.',
                'Trim excess skin and visible fat pads from chicken or mutton before cooking.'
            ],
            'science' => 'Cooking oils and rendered lipids have lower density ($\approx 0.92\text{ g/cm}^3$) than water ($\approx 1.0\text{ g/cm}^3$), causing them to float. Saturated fat components solidify rapidly when exposed to temperatures below 15°C.',
            'related_recipe_ids' => ['andhra-chicken-curry', 'andhra-mutton-curry', 'restaurant-butter-chicken'],
            'related_lesson_ids' => ['lesson-201', 'lesson-401']
        ],

        'curry-burnt-bottom' => [
            'id' => 'curry-burnt-bottom',
            'title' => 'Curry Scorched or Burnt at the Bottom of the Pot',
            'category' => 'Curries and Gravies',
            'dishes' => ['Tomato Dal', 'Chicken Curry', 'Paneer Gravy', 'Korma', 'Biryani'],
            'keywords' => ['burnt bottom', 'scorched', 'maadaipoindi', 'burnt smell', 'burnt taste', 'charred'],
            'symptoms' => 'Blackened layer stuck to base with sharp smoky, acrid smell beginning to permeate the gravy.',
            'severity' => 'Serious',
            'causes' => [
                'Cooking on excessively high heat without adequate liquid.',
                'Using a thin-bottomed pot that creates severe hot spots.',
                'Leaving thick starch or dairy bases unattended without regular stirring.'
            ],
            'immediate_steps' => [
                'DO NOT SCRAPE: Remove the pot from the burner immediately. Never scrape the bottom with a spoon, or you will mix bitter black charcoal particles into the good food.',
                'Transfer gently: Very carefully ladle out only the top and middle unburnt food into a fresh, clean pot, leaving the bottom 1-inch layer behind.',
                'Assess smell and taste: Taste a clean spoonful from the new pot. If smoke is mild, continue rescue; if food tastes like bitter charcoal, it cannot be salvaged.',
                'Add aromatic neutralizers: Stir 2 tablespoons fresh yogurt, cream, or a pinch of sugar with freshly ground roasted cumin powder into the new pot.',
                'Infuse with fresh tadka: Prepare a quick fragrant tadka of ghee, cumin, and fresh curry leaves; pour over the top to mask faint smokiness.'
            ],
            'alternatives' => [
                [
                    'name' => 'Smoky Gravy Rebranding (Dhungar Style)',
                    'suitability' => 'Paneer Tikka Masala, Butter Chicken, Dal Makhani.',
                    'action' => 'If the flavor is mildly smoky and pleasant (not bitter carbon), embrace it as "charcoal dhungar" flavor by adding extra butter and kasuri methi.',
                    'limitations' => 'Only works if not acrid or bitter.'
                ]
            ],
            'items_needed' => [
                'required' => ['Clean secondary pot', 'Ladle to transfer top layer'],
                'optional' => ['Fresh ghee', 'Roasted cumin powder', 'Fresh cream or curd']
            ],
            'what_not_to_do' => [
                'NEVER scrape the bottom with a steel ladle hoping to save "every drop"—you will ruin the entire pot.',
                'Do not pour water into the burnt pot and stir; this releases all charred compounds into the broth.',
                'Do not consume food with heavily blackened carbon chunks (carcinogenic and bitter).'
            ],
            'prevention' => [
                'Use heavy-gauge tri-ply stainless steel, cast iron, or thick clay pots that distribute heat evenly.',
                'Always lower burner flame to medium-low once thick gravy begins to simmer.',
                'Stir thoroughly every 3-4 minutes, scraping the flat bottom with a wooden spatula.'
            ],
            'science' => 'Pyrolysis occurs when organic sugars and proteins overheat above 200°C without moisture, converting into bitter acrid carbon polycyclic compounds. Because these compounds are insoluble initially at the crust, transferring only unburnt top layers prevents dispersion.',
            'related_recipe_ids' => ['andhra-tomato-pappu', 'simple-comfort-dal', 'restaurant-dal-makhani'],
            'related_lesson_ids' => ['lesson-101', 'lesson-201']
        ],

        'curry-curdled-dairy' => [
            'id' => 'curry-curdled-dairy',
            'title' => 'Curd or Cream Curdled/Split in the Gravy',
            'category' => 'Curries and Gravies',
            'dishes' => ['Shahi Paneer', 'Kadhi', 'Kurma', 'Butter Chicken', 'Biryani Marinade'],
            'keywords' => ['curdled', 'split curd', 'separated', 'grainy gravy', 'split cream', 'dahi phat gaya'],
            'symptoms' => 'Gravy appears grainy with tiny white curds floating in watery, separated oil instead of a smooth velvet sauce.',
            'severity' => 'Moderate',
            'causes' => [
                'Adding cold refrigerator curd directly into boiling hot gravy.',
                'Adding high-acid ingredients (tomato, lemon) simultaneously with un-whisked low-fat yogurt.',
                'Boiling vigorously immediately after adding cream or curd.'
            ],
            'immediate_steps' => [
                'Lower heat immediately: Move pan off the high flame or switch to the lowest simmer.',
                'Whisk vigorously: Use a small wire whisk or fork to briskly whisk the gravy for 60 seconds to re-emulsify fat and protein particles.',
                'Stir in starch stabilizer: Whisk 1 teaspoon of cornstarch or roasted besan into 2 tbsp warm milk, pour in, and whisk continuously over gentle heat for 2 minutes.',
                'Immersion blender blitz: If the dish has no whole meat or paneer chunks, a 5-second pulse with an immersion blender creates an ultra-velvety restaurant texture.'
            ],
            'alternatives' => [
                [
                    'name' => 'Straining & Re-emulsifying',
                    'suitability' => 'Restaurant gravies like Shahi Paneer or Makhani.',
                    'action' => 'Pour the gravy through a fine wire mesh strainer, press solids through with a spoon, and re-whisk with 1 tbsp fresh cream.',
                    'limitations' => 'Takes 3 extra minutes.'
                ]
            ],
            'items_needed' => [
                'required' => ['Wire whisk or fork'],
                'optional' => ['Cornstarch / roasted besan', 'Warm milk', 'Immersion hand blender']
            ],
            'what_not_to_do' => [
                'Do not boil curd at rolling boiling temperatures—casein proteins coagulate permanently at boiling heat in acidic environments.',
                'Do not throw the curry away—curdled dairy tastes fine and is safe, it is only a cosmetic texture issue.'
            ],
            'prevention' => [
                'Always bring curd or cream to room temperature before adding to the pan.',
                'Whisk 1 tsp besan (gram flour) into the raw curd before pouring into hot pans—besan starch coats dairy proteins and prevents curdling entirely.',
                'Turn off the flame before folding in yogurt, stirring until thoroughly incorporated.'
            ],
            'science' => 'Casein milk proteins exist as negative-charge micelles that repel each other in neutral pH. Acid from tomatoes and rapid boiling heat neutralize this charge, causing casein to clump together into visible curds (syneresis).',
            'related_recipe_ids' => ['restaurant-shahi-paneer', 'vegetable-kurma', 'restaurant-butter-chicken'],
            'related_lesson_ids' => ['lesson-201', 'lesson-401']
        ],

        // ==========================================
        // 2. RICE AND BIRYANI
        // ==========================================
        'rice-too-mushy' => [
            'id' => 'rice-too-mushy',
            'title' => 'Rice is Mushy, Overcooked, or Clumpy',
            'category' => 'Rice and Biryani',
            'dishes' => ['Plain Rice', 'Tomato Rice', 'Lemon Rice', 'Pulao', 'Biryani'],
            'keywords' => ['mushy rice', 'sticky rice', 'metthaga aipoindi', 'halwa rice', 'soggy rice', 'clumpy'],
            'symptoms' => 'Rice grains have burst, clumped together, and lost separate grain integrity.',
            'severity' => 'Moderate',
            'causes' => [
                'Adding too much cooking water.',
                'Over-cooking on high pressure for too many cooker whistles.',
                'Stirring hot rice immediately with a spoon while still steaming.'
            ],
            'immediate_steps' => [
                'STOP STIRRING: Immediately cease stirring with spoons—hot mushy grains burst when disturbed.',
                'Spread onto flat trays: Gently turn the rice out onto wide metal baking sheets or plates in a thin single layer.',
                'Evaporate moisture under a fan: Place the trays under a ceiling fan or in a draft for 8-10 minutes. The hot steam flashes off, and the grains firm up as they cool.',
                'Oven drying method: Spread on baking sheet and place in a preheated warm oven (100°C / 200°F) for 5-8 minutes to dehydrate surface moisture without burning.',
                'Repurpose if severely overcooked: If grains are completely mashed, convert into delicious Tempered Curd Rice (Daddojanam) or savory Pongal where soft texture is prized!'
            ],
            'alternatives' => [
                [
                    'name' => 'Convert to Andhra Curd Rice (Daddojanam)',
                    'suitability' => 'Plain rice that is completely mushy.',
                    'action' => 'Mash lightly with warm milk, fresh curd, grated ginger, and green chillies, topped with mustard-curry leaf tadka. Delicious and celebrated comfort food.',
                    'limitations' => 'Cannot be used as plain separate-grain rice.'
                ],
                [
                    'name' => 'Crispy Rice Cutlets / Tikkis',
                    'suitability' => 'Overcooked vegetable pulao or plain rice.',
                    'action' => 'Mix mushy rice with boiled potato, spices, and breadcrumbs; shallow fry into golden crispy patties.',
                    'limitations' => 'Transforms the dish into a tea-time snack.'
                ]
            ],
            'items_needed' => [
                'required' => ['Wide baking sheet or large stainless steel thali'],
                'optional' => ['Oven / ceiling fan', 'Fresh curd & tempering spices (for repurposing)']
            ],
            'what_not_to_do' => [
                'Do not stir or fluff hot mushy rice with a flat spoon—you will mash it into baby food paste.',
                'Do not add more water or keep heating in the cooker hoping it will "dry out".'
            ],
            'prevention' => [
                'Use standard 1:2 water ratio for Sona Masoori, and 1:1.5 for aged Basmati rice.',
                'Always rinse rice until rinse water runs clear to wash away excess surface amylose starch.',
                'Let cooker pressure drop naturally, then rest rice uncovered for 5 minutes before fluffing with a fork.'
            ],
            'science' => 'Starch gelatinization occurs when rice starches absorb water above 65°C and swell. Excessive water ruptures grain cell walls, leaking sticky amylopectin gel. Cooling allows gelatinized starches to undergo retrogradation, firming grain exteriors.',
            'related_recipe_ids' => ['steamed-plain-rice', 'tempered-curd-rice', 'vegetable-pulao'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'rice-hard-undercooked' => [
            'id' => 'rice-hard-undercooked',
            'title' => 'Rice or Biryani is Hard, Grainy, or Undercooked',
            'category' => 'Rice and Biryani',
            'dishes' => ['Plain Rice', 'Chicken Biryani', 'Veg Biryani', 'Pulao', 'Tomato Rice'],
            'keywords' => ['hard rice', 'undercooked', 'kachha chawal', 'gaddalaga undi', 'crunchy grains', 'dry center'],
            'symptoms' => 'Rice grain centers have a white, chalky, crunchy un-cooked bite when chewed.',
            'severity' => 'Minor',
            'causes' => [
                'Water evaporated before the grain starches fully hydrated and gelatinized.',
                'Flame was too high, boiling off water prematurely.',
                'Under-soaking aged basmati or brown rice.'
            ],
            'immediate_steps' => [
                'Do not dump cold water into the pot.',
                'Boil 1/3 to 1/2 cup of water separately.',
                'Sprinkle hot water: Using your clean fingers or a spoon, evenly sprinkle 4 to 6 tablespoons of boiling water or warm milk over the surface of the rice.',
                'Seal for Dum: Cover the pot with a clean damp kitchen towel, press the lid tightly down, and place a heavy object (mortar or water pot) on top.',
                'Simmer on tawa: Place the sealed pot on a preheated heavy flat tawa over low heat for 10-12 minutes. The trapped steam will hydrate and cook the hard core gently.'
            ],
            'alternatives' => [
                [
                    'name' => 'Microwave Steam Revival',
                    'suitability' => 'Small portions or bowl of undercooked rice.',
                    'action' => 'Transfer rice to microwave-safe bowl, sprinkle 2 tbsp warm water, cover with damp paper towel, and microwave on high for 90 seconds. Rest 2 minutes.',
                    'limitations' => 'Best for 1-2 servings.'
                ]
            ],
            'items_needed' => [
                'required' => ['Boiling water', 'Tight lid with seal or damp cloth', 'Heavy tawa for low heat dum'],
                'optional' => ['Warm milk / saffron water']
            ],
            'what_not_to_do' => [
                'Do not turn burner to high heat—you will burn the bottom layer while the top remains raw and crunchy.',
                'Do not stir aggressively while grains are still dry in the center.'
            ],
            'prevention' => [
                'Always soak aged Basmati rice for 30 minutes before cooking—this ensures moisture penetrates to the core.',
                'Ensure the lid fits securely so steam cannot escape during absorption phase.'
            ],
            'science' => 'Rice grains require both heat ($\ge 65^\circ\text{C}$) and internal hydration to complete starch gelatinization. When liquid runs out, starches freeze in their crystalline raw state. Trapped pressurized steam rehydrates the crystalline core without drowning the grain exterior.',
            'related_recipe_ids' => ['steamed-plain-rice', 'andhra-chicken-biryani', 'vegetable-dum-biryani'],
            'related_lesson_ids' => ['lesson-101', 'lesson-301']
        ],

        'biryani-dry-no-moisture' => [
            'id' => 'biryani-dry-no-moisture',
            'title' => 'Biryani or Pulao is Too Dry and Chalky',
            'category' => 'Rice and Biryani',
            'dishes' => ['Hyderabadi Biryani', 'Chicken Dum Biryani', 'Veg Biryani', 'Pulao'],
            'keywords' => ['dry biryani', 'dry pulao', 'chavva ga undi', 'no moisture', 'rough rice'],
            'symptoms' => 'Rice grains feel dry and rough in the mouth; masala lacks juicy moisture and coating.',
            'severity' => 'Minor',
            'causes' => [
                'Dum cooking was extended too long without adequate gravy at the base.',
                'Insufficient ghee or oil in the marinade and layering.',
                'Steam escaped from a loose lid during dum cooking.'
            ],
            'immediate_steps' => [
                'Prepare rich aromatic liquid: Warm 1/4 cup full-fat milk with 2 tablespoons desi ghee and a pinch of saffron or cardamom powder.',
                'Drizzle across top: Drizzle the warm saffron ghee milk evenly over the rice using a spoon.',
                'Cover and steam: Cover tightly with foil or damp towel, put lid on, and place on low tawa heat for 6-8 minutes.',
                'Rest before opening: Turn off heat and let sit for 5 minutes. The ghee coats individual grains, restoring luscious gloss and fragrance.',
                'Serve with moist accompaniments: Pair with rich Mirchi ka Salan or creamy vegetable raita.'
            ],
            'alternatives' => [
                [
                    'name' => 'Chicken / Mutton Stock Drizzle',
                    'suitability' => 'Meat biryanis.',
                    'action' => 'Drizzle 1/4 cup warm strained chicken broth with melted butter over the top and steam 5 minutes.',
                    'limitations' => 'Requires prepared broth.'
                ]
            ],
            'items_needed' => [
                'required' => ['Warm milk', 'Desi ghee', 'Foil or tight lid'],
                'optional' => ['Saffron strands', 'Rose water / kewra water']
            ],
            'what_not_to_do' => [
                'Do not splash plain cold water—it ruins the saffron aroma and makes biryani taste washed out.',
                'Do not mix or stir roughly while dry; dry grains snap in half easily.'
            ],
            'prevention' => [
                'Ensure the meat marinade has sufficient yogurt, oil, and liquid before layering 70% parboiled rice.',
                'Always seal the rim with wheat dough (dum pukht) or aluminum foil to trap every drop of aromatic steam.'
            ],
            'science' => 'In dum cooking, moisture circulates in a closed convective cycle (vapor rises, hits cool lid, condenses, and falls back). Ghee lipids create a hydrophobic seal around individual starch grains, locking in internal vapor.',
            'related_recipe_ids' => ['andhra-chicken-biryani', 'vegetable-dum-biryani', 'chicken-pulao'],
            'related_lesson_ids' => ['lesson-301']
        ],

        'biryani-burnt-bottom' => [
            'id' => 'biryani-burnt-bottom',
            'title' => 'Biryani Burnt or Scorched at the Bottom (Tahdig Charred)',
            'category' => 'Rice and Biryani',
            'dishes' => ['Hyderabadi Dum Biryani', 'Chicken Biryani', 'Veg Biryani'],
            'keywords' => ['burnt biryani', 'burnt bottom', 'charred masala', 'dum burnt', 'acrid smell'],
            'symptoms' => 'Blackened crust at base of handi; burning smell threatening to penetrate top rice layers.',
            'severity' => 'Serious',
            'causes' => [
                'Placing the handi directly over high gas flame instead of using a buffer tawa.',
                'Insufficient moisture in the bottom marinade layer.',
                'Cooking on dum for 40+ minutes without flame management.'
            ],
            'immediate_steps' => [
                'ACT QUICKLY: Take the handi off heat immediately. Place on a cold tile or wet cloth to instantly halt bottom cooking.',
                'NEVER SCRAPE: Do not insert your ladle to the bottom of the pot. Never stir.',
                'Remove top and middle fragrant rice: Gently skim the aromatic top layers and tender meat pieces into a serving casserole, leaving the bottom 1.5 inches untouched.',
                'Mask subtle smoke in salvaged rice: Place a fresh slice of white bread on top of the salvaged rice in the casserole for 5 minutes (bread absorbs volatile smoke compounds), then discard the bread.',
                'Drizzle 1 tbsp melted ghee and fresh coriander leaves over the salvaged biryani.'
            ],
            'alternatives' => [
                [
                    'name' => 'Persian Tahdig Distinction',
                    'suitability' => 'If bottom is deep golden and crisp rather than black carbon.',
                    'action' => 'If bottom is merely caramelized crunchy rice (tahdig/kanchi), it is delicious! Taste a tiny piece; if crunchy and savory, serve as prized crunchy bits.',
                    'limitations' => 'Only applies if golden-brown, not black charcoal.'
                ]
            ],
            'items_needed' => [
                'required' => ['Clean casserole / serving dish', 'Wide flat spatula'],
                'optional' => ['White bread slice', 'Desi ghee']
            ],
            'what_not_to_do' => [
                'Do not scrape the bottom or mix the pot—burnt carbon will blacken the pristine yellow and white biryani grains.',
                'Do not eat blackened carbon layers (bitter and unhealthy).'
            ],
            'prevention' => [
                'Always use the Tawa Method: Cook first 5 minutes on direct medium heat, then ALWAYS place a heavy flat iron tawa under the handi for remaining 25 minutes of dum.',
                'Layer sliced potatoes or tomato rounds at the very base of the pot as a sacrificial moisture shield.'
            ],
            'science' => 'Direct conductive heat without liquid quickly surpasses 250°C, causing rapid thermal decomposition of proteins and sugars. Using an iron tawa diffuses concentrated heat spikes into soft infrared radiant heat.',
            'related_recipe_ids' => ['andhra-chicken-biryani', 'vegetable-dum-biryani'],
            'related_lesson_ids' => ['lesson-301']
        ],

        // ==========================================
        // 3. ROTI, CHAPATI, AND BREADS
        // ==========================================
        'chapati-too-hard' => [
            'id' => 'chapati-too-hard',
            'title' => 'Chapatis / Rotis Turn Hard, Stiff, and Leather-Like',
            'category' => 'Roti, Chapati, and Paratha',
            'dishes' => ['Soft Phulka / Chapati', 'Roti', 'Aloo Paratha', 'Poori'],
            'keywords' => ['hard chapati', 'stiff roti', 'chewy chapati', 'leather roti', 'raallaga undi', 'dry chapati'],
            'symptoms' => 'Chapatis become brittle, stiff, dry, or chewy like cardboard within minutes of coming off the tawa.',
            'severity' => 'Minor',
            'causes' => [
                'Dough was kneaded too dry with insufficient water.',
                'Dough was not rested (gluten failed to relax and hydrate).',
                'Cooking on a lukewarm tawa over low heat—baking out all internal moisture like a biscuit.',
                'Rolling with excessive dry flour (sukha atta) which burns on the tawa.'
            ],
            'immediate_steps' => [
                'Rescue already hard cooked chapatis: Stack them, sprinkle with a few drops of water, wrap in a damp cotton cloth or foil, and warm in a preheated oven or microwave for 20 seconds. Steam softens them instantly.',
                'Fix remaining raw dough: Add 1-2 tablespoons of lukewarm water and 1 teaspoon oil/ghee to the remaining dough; knead vigorously for 3 minutes until baby-soft.',
                'Rest the dough: Cover with a damp cloth and let rest for a full 20 minutes before rolling your next chapati.',
                'Crank up the tawa: Heat tawa until genuinely medium-hot. A drop of water flicked on it should dance and vaporize in 2 seconds.',
                'Cook fast: 20 seconds on first side, 40 seconds on second side, press lightly or place on open flame for 5 seconds to puff. Quick cooking retains internal steam.'
            ],
            'alternatives' => [
                [
                    'name' => 'Ghee / Butter Brush in Hot Casserole',
                    'suitability' => 'Freshly cooked chapatis.',
                    'action' => 'Brush a light coat of homemade ghee on one side immediately off the flame and stack in a closed insulated roti container lined with a cotton napkin.',
                    'limitations' => 'Adds minor fat/calories.'
                ]
            ],
            'items_needed' => [
                'required' => ['Heavy iron/cast-iron tawa', 'Lukewarm water', 'Damp kitchen cloth'],
                'optional' => ['Desi ghee', 'Insulated casserole (hot case)']
            ],
            'what_not_to_do' => [
                'Do not cook chapatis on low flame for 2-3 minutes—slow cooking turns dough into hard baked crackers.',
                'Do not press down aggressively with a heavy wooden masher while raw—it compresses the layers and prevents puffing.'
            ],
            'prevention' => [
                'Golden dough ratio: 2 cups atta needs approx. 3/4 to 1 cup water. Dough must feel as soft as an earlobe.',
                'Dust off excess dry flour before putting the rolled disc on the tawa.'
            ],
            'science' => 'Chapati tenderness relies on water trapped inside starch gelatinizing and expanding rapidly into steam to separate the top and bottom layers into a balloon. Slow cooking on low heat allows moisture to evaporate before it can expand into steam.',
            'related_recipe_ids' => ['soft-phulka-chapati', 'punjabi-aloo-paratha', 'puffed-poori'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'chapati-not-puffing' => [
            'id' => 'chapati-not-puffing',
            'title' => 'Chapatis Fail to Puff Up into a Balloon',
            'category' => 'Roti, Chapati, and Paratha',
            'dishes' => ['Phulka', 'Chapati', 'Poori'],
            'keywords' => ['not puffing', 'phulka not rising', 'flat chapati', 'pongaledu', 'chapati flat'],
            'symptoms' => 'Chapati stays flat on the tawa with no steam pocket forming between layers.',
            'severity' => 'Minor',
            'causes' => [
                'Uneven rolling (thick edges and paper-thin centers, or tears on edges).',
                'Tawa was not hot enough when the disc was placed.',
                'First side was overcooked before flipping.'
            ],
            'immediate_steps' => [
                'Flip timing is critical: Cook side 1 for only 15-20 seconds until tiny faint bubbles form; DO NOT wait for brown spots.',
                'Flip to side 2 and cook for 35-45 seconds until prominent golden blister spots appear.',
                'Flame puff: Transfer directly onto open gas flame with side 1 facing down. It should inflate like a balloon within 3 seconds.',
                'Tawa puff alternative: If using an induction or electric cooktop, press the edges gently with a folded clean kitchen napkin—this forces trapped steam into the center, puffing the roti.'
            ],
            'alternatives' => [
                [
                    'name' => 'Tear Seal Technique',
                    'suitability' => 'Chapati with a tiny edge hole leaking steam.',
                    'action' => 'Gently press a folded kitchen cloth directly over the hole where steam is escaping. Trapped steam forces the rest of the chapati to balloon.',
                    'limitations' => 'Requires quick reflexes.'
                ]
            ],
            'items_needed' => [
                'required' => ['Tongs (chimta)', 'Clean folded cotton cloth', 'Hot tawa'],
                'optional' => ['Gas burner grid']
            ],
            'what_not_to_do' => [
                'Do not flip the chapati 5 times back and forth—flip ONLY twice in total.',
                'Do not roll with sharp pressure on the edges that creates deep creases or pinholes.'
            ],
            'prevention' => [
                'Roll with light, even pressure, rotating the circle naturally 45 degrees after each stroke.',
                'Rest dough for 20 minutes so gluten relaxes and stretches without tearing.'
            ],
            'science' => 'Puffing is caused by superheated steam expanding between two sealed cooked surfaces. Side 1 seals micro-pores; side 2 cooks through. When high heat hits, moisture turns to steam and inflates the pocket like a hot air balloon.',
            'related_recipe_ids' => ['soft-phulka-chapati', 'puffed-poori'],
            'related_lesson_ids' => ['lesson-202']
        ],

        'dough-too-sticky' => [
            'id' => 'dough-too-sticky',
            'title' => 'Roti / Paratha / Bread Dough is Excessively Sticky',
            'category' => 'Roti, Chapati, and Paratha',
            'dishes' => ['Chapati', 'Paratha', 'Naan', 'Artisanal Bread', 'Pizza Dough'],
            'keywords' => ['sticky dough', 'too wet', 'atanukuntundi', 'watery dough', 'cannot roll'],
            'symptoms' => 'Dough clings to fingers, rolling pin, and work surface, making rolling impossible.',
            'severity' => 'Minor',
            'causes' => [
                'Adding too much water too quickly.',
                'Warm humid weather increasing ambient dough hydration.',
                'Flour having low protein/absorption capacity.'
            ],
            'immediate_steps' => [
                'Do not panic and dump huge cups of dry flour at once.',
                'Sprinkle dry flour gradually: Add 1 tablespoon dry flour over the dough and knead with the heel of your palm for 1 minute.',
                'Apply oil/ghee to hands: Rub 1/2 teaspoon oil or ghee onto your palms. Fat coats hands and prevents sticking immediately.',
                'Rest in the refrigerator: Place the sticky dough in a covered bowl inside the fridge for 15 minutes. Chilling firms up fats and allows flour starches to fully hydrate and bind free water.'
            ],
            'alternatives' => [
                [
                    'name' => 'Bench Scraper Kneading (French Slap & Fold)',
                    'suitability' => 'High hydration pizza, naan, or artisanal bread dough.',
                    'action' => 'Use a metal bench scraper to fold sticky dough over itself for 5 minutes rather than adding more flour; developing gluten naturally absorbs stickiness.',
                    'limitations' => 'Requires bench scraper tool.'
                ]
            ],
            'items_needed' => [
                'required' => ['Dry flour', '1 tsp cooking oil'],
                'optional' => ['Refrigerator', 'Bench scraper']
            ],
            'what_not_to_do' => [
                'Do not add half a cup of dry flour in frustration—you will end up with stiff, dry, unmanageable dough.',
                'Do not wash sticky hands over the sink drain without scraping first (dough can clog plumbing).'
            ],
            'prevention' => [
                'Pour water gradually in 3 batches while kneading, holding back the last 2 tablespoons until you assess dough consistency.'
            ],
            'science' => 'Wheat proteins gliadin and glutenin require time to form a cross-linked gluten mesh. Unbound free surface water causes stickiness. Rest time allows starch granules to absorb surface moisture through capillary action.',
            'related_recipe_ids' => ['soft-phulka-chapati', 'restaurant-style-naan', 'homemade-pizza-base'],
            'related_lesson_ids' => ['lesson-202', 'lesson-302']
        ],

        // ==========================================
        // 4. DOSA, IDLI, AND FERMENTATION
        // ==========================================
        'dosa-batter-not-fermenting' => [
            'id' => 'dosa-batter-not-fermenting',
            'title' => 'Idli / Dosa Batter Fails to Ferment and Rise',
            'category' => 'Dosa, Idli, and Fermented Foods',
            'dishes' => ['Soft Mallige Idli', 'Crispy Plain Dosa', 'Masala Dosa', 'Pesarattu'],
            'keywords' => ['not fermenting', 'batter flat', 'puliyaledu', 'cold weather', 'dense batter', 'no bubbles'],
            'symptoms' => 'Batter has not risen after 12 hours, lacks airy bubbles, and smells flat instead of pleasant and mildly tangy.',
            'severity' => 'Moderate',
            'causes' => [
                'Cold ambient room temperature (< 22°C / 72°F) slowing lactic acid bacteria.',
                'Over-salting the batter before fermentation (excess salt inhibits microbial growth).',
                'Urad dal was under-ground or overheated by blender motor.'
            ],
            'immediate_steps' => [
                'The Oven Light Technique: Place the batter bowl inside your home kitchen oven with ONLY the interior oven lightbulb turned on. The small bulb generates a steady, draft-free micro-climate of 28°C-30°C (82°F-86°F). Let sit for 4-6 hours.',
                'Warm Water Bath: Place the batter vessel inside a larger vessel filled with lukewarm water (approx 35°C). Replenish warm water every 2 hours.',
                'Instant Pot / Multi-Cooker: Place inner pot on "Yogurt" mode on LOW for 6-8 hours with a glass lid.',
                'Emergency Starter: If completely dormant, stir in 1/4 teaspoon sugar and 1/4 teaspoon active dry yeast, or 1 tablespoon of previously fermented sour batter.'
            ],
            'alternatives' => [
                [
                    'name' => 'Baking Soda Booster (Quick Fix)',
                    'suitability' => 'Dosa batter that is flat and needed for dinner in 10 minutes.',
                    'action' => 'Whisk in 1/4 tsp baking soda (eating soda) and 1 tsp sour curd. Cook dosas immediately. Produces golden crispy dosas with good browning.',
                    'limitations' => 'Does not replace natural fermentation health benefits, but saves the meal.'
                ]
            ],
            'items_needed' => [
                'required' => ['Warm spot (oven with light, or warm water vessel)'],
                'optional' => ['Instant pot (yogurt mode)', 'Baking soda & sour curd', 'Baking yeast']
            ],
            'what_not_to_do' => [
                'Do not place batter over a hot burner or pour boiling water in—you will cook the starches and kill the live probiotic bacteria.',
                'Do not add iodized salt before fermentation in winter; non-iodized rock salt or sea salt is gentler on microbes.'
            ],
            'prevention' => [
                'Always whip urad dal with ice-cold water into a light, airy foam before mixing with rava/rice.',
                'Mix the batter thoroughly with clean bare hands for 2 minutes—natural body warmth and benign skin microbes kickstart fermentation.'
            ],
            'science' => 'Fermentation is driven by wild lactic acid bacteria (*Leuconostoc mesenteroides*) and yeasts. Optimal metabolic activity occurs strictly between 28°C and 32°C. Below 20°C, enzyme kinetics drop exponentially.',
            'related_recipe_ids' => ['soft-idli', 'crispy-plain-dosa', 'masala-dosa'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'dosa-sticking-to-pan' => [
            'id' => 'dosa-sticking-to-pan',
            'title' => 'Dosa Sticks to Tawa and Tears While Spreading',
            'category' => 'Dosa, Idli, and Fermented Foods',
            'dishes' => ['Crispy Plain Dosa', 'Masala Dosa', 'Pesarattu'],
            'keywords' => ['dosa sticking', 'sticking to pan', 'tearing', 'dosa athukuntundi', 'cast iron sticking'],
            'symptoms' => 'Ladle drags batter into clumps, batter welds stubbornly to the tawa surface, and tearing occurs.',
            'severity' => 'Minor',
            'causes' => [
                'Tawa was too hot when pouring the batter (batter cooks immediately upon touching, grabbing the ladle).',
                'Cast iron tawa was not properly seasoned or was washed with soap.',
                'Batter is too cold directly from the refrigerator.'
            ],
            'immediate_steps' => [
                'Temperature control with water splash: Splash a few drops of water onto the hot tawa. It should sizzle vigorously. Wipe completely dry with a clean cotton cloth or folded paper towel.',
                'Onion rubbing trick: Cut an onion in half, dip cut face into sesame/peanut oil, and rub firmly all over the tawa surface. Natural onion sulfur compounds create a slick non-stick patina on hot iron.',
                'Check batter temperature: If batter is chilled from the fridge, allow a portion to sit on the counter for 15 minutes before pouring.',
                'Adjust flame sequence: Lower heat to medium-low while spreading with light spiral motion from center outward. Once spread, increase flame to medium-high and drizzle oil/ghee around circumference.'
            ],
            'alternatives' => [
                [
                    'name' => 'Batter Consistency Check',
                    'suitability' => 'If batter is too thick and heavy.',
                    'action' => 'Whisk in 2-3 tablespoons of room temperature water. Dosa batter should have pourable, ribbon-like consistency.',
                    'limitations' => 'Do not make it overly watery.'
                ]
            ],
            'items_needed' => [
                'required' => ['Clean cotton cloth/paper towel', 'Half an onion', 'Cooking oil'],
                'optional' => ['Cast iron dosa tawa', 'Flat metal spatula (dosa thirupi)']
            ],
            'what_not_to_do' => [
                'Never wash a seasoned cast-iron dosa tawa with harsh dish soap or abrasive steel scrubbers.',
                'Do not attempt to spread batter while the tawa is smoking red hot.'
            ],
            'prevention' => [
                'Reserve one dedicated tawa solely for dosas; do not make rotis or fry eggs on your primary dosa tawa.',
                'Always perform the water sizzle and onion rub routine before your first dosa.'
            ],
            'science' => 'The Leidenfrost effect explains that water droplets vaporize and glide on a vapor cushion when surface temperature is optimal ($\approx 190^\circ\text{C}$). Rubbing onion creates a microscopic polymerized lipid layer that prevents batter proteins from bonding to iron atoms.',
            'related_recipe_ids' => ['crispy-plain-dosa', 'masala-dosa', 'andhra-pesarattu'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'idli-dense-hard' => [
            'id' => 'idli-dense-hard',
            'title' => 'Idlis Turn Dense, Hard, and Heavy Like Stones',
            'category' => 'Dosa, Idli, and Fermented Foods',
            'dishes' => ['Soft Mallige Idli'],
            'keywords' => ['hard idli', 'dense idli', 'heavy idli', 'gundrallaga undi', 'not soft', 'rubber idli'],
            'symptoms' => 'Idlis come out flat, dense, gummy, or hard instead of light, airy, and pillowy soft.',
            'severity' => 'Moderate',
            'causes' => [
                'Urad dal was not ground into a fluffy cloud-like foam.',
                'Over-mixing the fermented batter, deflating all natural carbon dioxide air pockets.',
                'Steaming on low heat, or over-steaming for 25+ minutes.'
            ],
            'immediate_steps' => [
                'Rescue already made hard idlis: Transform them into delicious Idli Upma (Podimas) or Crispy Fried Idli Bites tossed with ghee and podi (gunpowder).',
                'Fix remaining batter: Gently fold in 1/4 teaspoon baking soda or 1 teaspoon Eno fruit salt with 1 tablespoon water. DO NOT beat—gently fold with a spoon.',
                'Check the steamer water: Ensure water is at a rolling boil and producing vigorous steam BEFORE placing the idli stand inside.',
                'Steam timing: Steam on medium-high flame for strictly 10 to 12 minutes. Turn off heat and let rest for 3 minutes before unmolding with a wet spoon.'
            ],
            'alternatives' => [
                [
                    'name' => 'Convert to Crispy Dosas or Punugulu',
                    'suitability' => 'Dense idli batter.',
                    'action' => 'Thin the dense batter with water and make crispy dosas, or add chopped onions, green chillies, and cumin to deep fry into golden crispy Punugulu.',
                    'limitations' => 'Changes the breakfast dish.'
                ]
            ],
            'items_needed' => [
                'required' => ['Idli steamer with rolling boiling water', 'Wet spoon'],
                'optional' => ['Baking soda / Eno fruit salt', 'Ghee & idli podi']
            ],
            'what_not_to_do' => [
                'Do not vigorously stir fermented batter with a hand whisk—you will knock out all the precious carbon dioxide micro-bubbles.',
                'Do not over-steam for 20-30 minutes; it cooks all moisture out of the idlis, leaving them rubbery.'
            ],
            'prevention' => [
                'Add 2 tablespoons of soaked poha (flattened rice) while grinding urad dal for guaranteed pillowy softness.',
                'Grind urad dal with chilled ice water until it floats when dropped into a cup of water.'
            ],
            'science' => 'Idli rise depends on aeration: whipped urad dal creates a protein emulsion matrix that traps $CO_2$ from fermentation. During steaming, steam rapidly expands these gas cells while starch and protein set around them (foam-to-sponge transition).',
            'related_recipe_ids' => ['soft-idli', 'andhra-punugulu'],
            'related_lesson_ids' => ['lesson-101']
        ],

        // ==========================================
        // 5. CAKES AND BAKING
        // ==========================================
        'cake-sunk-middle' => [
            'id' => 'cake-sunk-middle',
            'title' => 'Cake Sunk or Collapsed in the Middle',
            'category' => 'Cakes and Baking',
            'dishes' => ['Chocolate Brownies', 'Vanilla Sponge Cake', 'Tea Cake'],
            'keywords' => ['cake sunk', 'collapsed middle', 'sunken center', 'cake crater', 'dip in cake'],
            'symptoms' => 'Cake rises in the oven but collapses into a sad concave crater in the center upon cooling.',
            'severity' => 'Moderate',
            'causes' => [
                'Opening the oven door too early in the first 20 minutes (temperature shock).',
                'Excess baking powder or baking soda causing batter to rise too fast before gluten sets.',
                'Undercooking: Center was not fully set when pulled out of oven.'
            ],
            'immediate_steps' => [
                'If still in oven: If cake just sank and center is raw/wet, lower oven heat by 15°C (25°F), tent the top with aluminum foil (to prevent burning), and bake for an extra 10-15 minutes.',
                'If already cooled: You cannot un-sink a baked cake, but you can turn it into an intentional showstopper dessert!',
                'Fill the crater: Fill the sunken cavity with chocolate ganache, fresh whipped cream, strawberry compote, or fresh fruits. Dust with powdered sugar.',
                'Repurpose into Cake Pops or Trifle: Crumble the baked cake, mix with buttercream or condensed milk, roll into balls, and dip into melted dark chocolate.'
            ],
            'alternatives' => [
                [
                    'name' => 'Layer Cake Leveling',
                    'suitability' => 'Multi-layer cakes.',
                    'action' => 'Use a serrated bread knife to slice the top level, flip the cake upside down so the flat bottom becomes the top, and frost with icing.',
                    'limitations' => 'Reduces cake height.'
                ]
            ],
            'items_needed' => [
                'required' => ['Oven / timer', 'Toothpick / skewer to test center'],
                'optional' => ['Whipped cream / chocolate ganache', 'Aluminum foil']
            ],
            'what_not_to_do' => [
                'Never open the oven door during the first 20 minutes of baking.',
                'Do not guess baking powder quantities—always level your measuring spoons with a knife edge.'
            ],
            'prevention' => [
                'Test doneness before removing: Insert a toothpick into the dead center—it must come out clean or with a few dry crumbs, never wet batter.',
                'Ensure oven is fully preheated for 15 minutes before inserting baking pan.'
            ],
            'science' => 'Baking is a race between gas expansion ($CO_2$ from leaveners + steam) and structural coagulation (egg protein coagulation at 75°C and starch gelatinization at 85°C). If gas expands faster than the crumb structure solidifies, the cells rupture and collapse under atmospheric pressure.',
            'related_recipe_ids' => ['chocolate-brownies'],
            'related_lesson_ids' => ['lesson-302']
        ],

        'cake-dense-heavy' => [
            'id' => 'cake-dense-heavy',
            'title' => 'Cake is Dense, Heavy, and Rubber-Like',
            'category' => 'Cakes and Baking',
            'dishes' => ['Sponge Cake', 'Brownies', 'Tea Cake', 'Muffins'],
            'keywords' => ['dense cake', 'heavy cake', 'rubbery cake', 'biscuit cake', 'not spongy'],
            'symptoms' => 'Cake feels heavy, flat, and chewy like rubber instead of tender, light, and crumbly.',
            'severity' => 'Moderate',
            'causes' => [
                'Over-mixing the batter after adding flour (developed excessive gluten).',
                'Expired or inactive baking powder/soda.',
                'Butter and sugar were not creamed properly to incorporate air.'
            ],
            'immediate_steps' => [
                'Transform into Rum / Sugar Syrup Soaked Cake: Prick holes all over the warm cake with a skewer. Pour warm flavored sugar syrup (with vanilla, orange zest, or coffee) over it. The dense crumb absorbs the syrup and becomes rich, moist, and luxurious (like a Tres Leches or Rum Cake).',
                'Slice and toast: Slice into fingers and toast in oven into crispy tea-time biscotti or cake rusks.',
                'Check leavening agents: Test your baking powder by dropping 1/2 tsp into warm water—it should bubble furiously. If not, discard the tin.'
            ],
            'alternatives' => [
                [
                    'name' => 'Convert to Chocolate Cake Truffles',
                    'suitability' => 'Dense chocolate cake.',
                    'action' => 'Crumble, mix with 2 tbsp melted chocolate and condensed milk, roll into truffles, and coat with cocoa powder.',
                    'limitations' => 'Changes the presentation.'
                ]
            ],
            'items_needed' => [
                'required' => ['Skewer / toothpick', 'Sugar syrup ingredients'],
                'optional' => ['Melted chocolate & cocoa powder']
            ],
            'what_not_to_do' => [
                'Do not beat cake batter vigorously with an electric hand mixer after dry flour is added—use the gentle "cut and fold" technique with a spatula.',
                'Do not use baking powder that has been sitting open in a humid cupboard for 2 years.'
            ],
            'prevention' => [
                'Cream room-temperature butter and sugar for 4-5 minutes until pale and fluffy before adding eggs.',
                'Sift flour and baking powder together twice to aerate and distribute evenly.'
            ],
            'science' => 'Over-mixing mechanical action hydrates gliadin and glutenin proteins into strong elastic gluten polymers. In bread, this elasticity is desirable; in cakes, it traps batter in a tight rubbery network that resists expansion.',
            'related_recipe_ids' => ['chocolate-brownies'],
            'related_lesson_ids' => ['lesson-302']
        ],

        'cookies-spreading-too-much' => [
            'id' => 'cookies-spreading-too-much',
            'title' => 'Cookies Spreading Too Much into One Flat Giant Puddle',
            'category' => 'Cakes and Baking',
            'dishes' => ['Cookies', 'Biscuits', 'Shortbread'],
            'keywords' => ['cookies spreading', 'flat cookies', 'giant puddle', 'greasy cookies', 'thin cookies'],
            'symptoms' => 'Individual cookie dough balls melt and merge into a single flat, greasy sheet across the baking tray.',
            'severity' => 'Minor',
            'causes' => [
                'Cookie dough was warm when placed into the oven (butter melted before flour structure set).',
                'Using melted hot butter instead of chilled or softened butter.',
                'Greasing the baking sheet too heavily or placing dough on a hot baking tray from round 1.'
            ],
            'immediate_steps' => [
                'If still baking in oven: Immediately take a round metal cookie cutter or glass cup larger than the cookies. Swirl it around each hot, soft cookie on the tray in a circular motion—this gathers the spread edges back into a neat, round, thick puck.',
                'For remaining unbaked dough: Place the bowl of cookie dough in the freezer for 15 minutes or fridge for 30 minutes until cold and firm to touch.',
                'Let baking sheets cool: Never place cold dough onto a warm baking tray freshly out of the oven. Use parchment paper instead of greasing trays with butter.'
            ],
            'alternatives' => [
                [
                    'name' => 'Cookie Crumble Ice Cream Topping',
                    'suitability' => 'Already baked flat cookies.',
                    'action' => 'Break the crispy thin sheet into shards and use as crunchy topping over vanilla ice cream or pudding.',
                    'limitations' => 'Repurposes the dessert.'
                ]
            ],
            'items_needed' => [
                'required' => ['Round cookie cutter or drinking glass', 'Refrigerator/freezer'],
                'optional' => ['Parchment paper']
            ],
            'what_not_to_do' => [
                'Do not butter non-stick cookie sheets; the extra fat lubricates dough, encouraging excessive spread.',
                'Do not bake cookie dough at room temperature if recipe specifies chilling.'
            ],
            'prevention' => [
                'Always chill cookie dough for minimum 30 minutes in the fridge before scooping onto trays.',
                'Line baking trays with parchment baking paper or silicone baking mats.'
            ],
            'science' => 'Butter has a low melting point (32°C-35°C). In warm dough, fat melts instantly upon entering the oven, causing gravity-driven spreading before egg and flour starches reach coagulation temperature (65°C-75°C). Chilling buys crucial minutes for structural setting.',
            'related_recipe_ids' => ['chocolate-brownies', 'artisanal-bread-loaf'],
            'related_lesson_ids' => ['lesson-302']
        ],

        // ==========================================
        // 6. INDIAN SWEETS AND DESSERTS
        // ==========================================
        'sugar-syrup-crystallized' => [
            'id' => 'sugar-syrup-crystallized',
            'title' => 'Sugar Syrup (Chasni) Crystallized into White Hard Sugar',
            'category' => 'Indian Sweets and Desserts',
            'dishes' => ['Gulab Jamun', 'Rasmalai', 'Mysore Pak', 'Jalebi', 'Ariselu'],
            'keywords' => ['crystallized syrup', 'sugar hard', 'chasni crystal', 'white sugar crust', 'cheeni jam gayi'],
            'symptoms' => 'Clear liquid syrup turns cloudy, forming gritty white sugar crystals along pot walls or over sweets.',
            'severity' => 'Minor',
            'causes' => [
                'Over-boiling the syrup past saturation point.',
                'Stirring aggressively with a spoon while boiling at high concentration.',
                'Stray undissolved sugar crystals on the pot rim seeding crystal growth.'
            ],
            'immediate_steps' => [
                'Add acid (lemon juice): Squeeze 3 to 4 drops of fresh lemon juice into the crystallized syrup.',
                'Add hot water: Stir in 3 to 4 tablespoons of hot water.',
                'Gently reheat: Place pot over low heat without stirring violently. Let heat melt the crystals back into a clear liquid.',
                'Wash down pot walls: Dip a pastry brush or clean wet spoon into warm water and wipe down the inner rim of the pot to dissolve any stray seed crystals.',
                'Simmer for 2 minutes and remove from heat.'
            ],
            'alternatives' => [
                [
                    'name' => 'Add Glucose / Corn Syrup / Honey',
                    'suitability' => 'Festive sweets and halwas.',
                    'action' => 'Stir in 1/2 teaspoon liquid glucose or honey; inverted sugars prevent sucrose crystallization.',
                    'limitations' => 'Mildly alters flavor.'
                ]
            ],
            'items_needed' => [
                'required' => ['Lemon juice', 'Hot water', 'Low flame'],
                'optional' => ['Pastry brush / paper towel', 'Honey']
            ],
            'what_not_to_do' => [
                'Do not scrape the crusty white crystals from the sides into the boiling syrup—they act as "seed crystals" that will freeze the entire pot solid.',
                'Do not continue boiling on high flame without adding water.'
            ],
            'prevention' => [
                'Always add 4-5 drops of lemon juice to sugar syrup once it boils—it acts as an anti-crystallization shield.',
                'Stir sugar only until it dissolves; once boiling begins, stop stirring.'
            ],
            'science' => 'Acid breaks sucrose (a disaccharide) down into its component monosaccharides—glucose and fructose (invert sugar). Invert sugar molecules disrupt the rigid geometric lattice structure of sucrose crystals, permanently preventing re-crystallization.',
            'related_recipe_ids' => ['classic-gulab-jamun', 'traditional-mysore-pak', 'rasmalai'],
            'related_lesson_ids' => ['lesson-302']
        ],

        'gulab-jamun-breaking' => [
            'id' => 'gulab-jamun-breaking',
            'title' => 'Gulab Jamuns Breaking or Cracking While Frying in Ghee',
            'category' => 'Indian Sweets and Desserts',
            'dishes' => ['Classic Gulab Jamun'],
            'keywords' => ['jamun breaking', 'cracking in oil', 'jamun split', 'disintegrating', 'mukkalu aipoindi'],
            'symptoms' => 'Smooth dough balls split open, crack, or disintegrate into crumbs as soon as they enter the hot ghee/oil.',
            'severity' => 'Moderate',
            'causes' => [
                'Dough was too dry with cracks on the surface before frying.',
                'Too much baking soda added to the khoya/maida mixture.',
                'Frying oil/ghee was too hot.'
            ],
            'immediate_steps' => [
                'Rescue current frying batch: Remove with a slotted spoon; if partially broken, transfer to sugar syrup anyway (they taste delicious as Halwa-style broken jamun!).',
                'Fix the remaining dough: Add 1-2 teaspoons of warm milk and 1/2 teaspoon ghee to the dough. Knead gently with your palm for 2 minutes until pliable and silky.',
                'Roll with no cracks: Take a marble-sized portion, press firmly between palms to compact, then gently roll into a crack-free shiny sphere.',
                'Lower ghee temperature: Let the oil/ghee cool down until it is just lukewarm. When you drop a test ball, it should sit at the bottom for 15-20 seconds before slowly floating up with tiny bubbles.',
                'Gently swirl the oil (not the jamuns) with a slotted spoon so the balls rotate evenly without touching the pan base directly.'
            ],
            'alternatives' => [
                [
                    'name' => 'Add 1 Teaspoon Maida (Flour)',
                    'suitability' => 'Dough that disintegrates completely into crumbs.',
                    'action' => 'Knead in 1 extra teaspoon all-purpose flour (maida) to provide gluten binding strength.',
                    'limitations' => 'Do not add too much flour or jamuns will become hard inside.'
                ]
            ],
            'items_needed' => [
                'required' => ['Warm milk', 'Ghee for frying', 'Slotted spoon (jhara)'],
                'optional' => ['Extra maida flour']
            ],
            'what_not_to_do' => [
                'Do not fry in smoking hot oil—the exterior burns in 10 seconds while the interior expands violently, exploding the ball.',
                'Do not poke or pierce the soft jamuns with sharp tongs while frying.'
            ],
            'prevention' => [
                'Use strictly a pinch (1/8 tsp) of baking soda per 100g khoya. Excess soda creates explosive gas pressure.',
                'Always roll dough balls between greased palms with zero surface cracks.'
            ],
            'science' => 'Deep frying expands trapped internal steam and leavener gas. If surface tensile strength (gluten-protein binding) is weaker than internal steam pressure, or if cracks provide weak fracture lines, the sphere ruptures along the fracture planes.',
            'related_recipe_ids' => ['classic-gulab-jamun', 'traditional-mysore-pak'],
            'related_lesson_ids' => ['lesson-302']
        ],

        'gulab-jamun-raw-inside' => [
            'id' => 'gulab-jamun-raw-inside',
            'title' => 'Gulab Jamuns are Dark Brown Outside but Raw and Doughy Inside',
            'category' => 'Indian Sweets and Desserts',
            'dishes' => ['Classic Gulab Jamun'],
            'keywords' => ['raw inside', 'doughy jamun', 'hard core', 'uncooked center', 'black outside raw inside'],
            'symptoms' => 'Deep golden or brown crust on the outside, but cutting open reveals a raw, pasty, uncooked flour core.',
            'severity' => 'Moderate',
            'causes' => [
                'Frying oil was too hot, browning the surface before heat could conduct to the core.',
                'Jamun balls were rolled too large.'
            ],
            'immediate_steps' => [
                'Rescue already fried undercooked jamuns: Drop them into warm, simmering sugar syrup and let the syrup simmer on low flame for 4 to 5 minutes. The hot liquid penetrates into the core and cooks the starches through.',
                'Fix frying technique for remaining dough: Turn off the flame completely for 5 minutes to let the oil/ghee cool to gentle warmth (approx. 140°C / 285°F).',
                'Roll smaller balls: Remember that jamuns double in size when soaked in syrup. Roll balls no larger than a marble.',
                'Fry slowly: Fry on lowest flame for a full 10-12 minutes, swirling constantly until uniform golden mahogany color is reached.'
            ],
            'alternatives' => [
                [
                    'name' => 'Microwave in Syrup Pulse',
                    'suitability' => 'Finished jamuns already in syrup with hard cores.',
                    'action' => 'Microwave jamuns submerged in syrup for 60 seconds on medium power (50%). Rest for 30 minutes to absorb.',
                    'limitations' => 'Do not microwave on high power.'
                ]
            ],
            'items_needed' => [
                'required' => ['Warm sugar syrup', 'Low-heat frying setup'],
                'optional' => ['Microwave']
            ],
            'what_not_to_do' => [
                'Do not re-fry already cooked jamuns back in hot oil—the exterior will turn black and bitter.',
                'Do not drop hot fried jamuns directly into ice-cold sugar syrup.'
            ],
            'prevention' => [
                'Patience is the golden rule of Gulab Jamun: Low and slow frying for 10-12 minutes ensures uniform heat conduction to the center.'
            ],
            'science' => 'Thermal conduction in dense dough has low thermal diffusivity. Rapid outer Maillard browning occurs at 160°C in seconds, while the thermal wave requires several minutes to travel the radius to the center without burning the crust.',
            'related_recipe_ids' => ['classic-gulab-jamun'],
            'related_lesson_ids' => ['lesson-302']
        ],

        'payasam-kheer-too-thick' => [
            'id' => 'payasam-kheer-too-thick',
            'title' => 'Payasam / Kheer Becomes Overly Thick and Solid Like Pudding',
            'category' => 'Indian Sweets and Desserts',
            'dishes' => ['Semiya Payasam', 'Rice Payasam (Paramannam)', 'Rava Kesari'],
            'keywords' => ['payasam thick', 'kheer thick', 'solidified', 'gaddalaga aipoindi', 'pudding like'],
            'symptoms' => 'Liquid milk dessert turns into a solid, congealed paste after resting or cooling.',
            'severity' => 'Minor',
            'causes' => [
                'Vermicelli, rice, or sago (sabudana) continues absorbing milk long after heat is turned off.',
                'Over-cooking and boiling milk down to condensed milk consistency.'
            ],
            'immediate_steps' => [
                'Boil fresh full-cream milk separately in a saucepan.',
                'Pour warm milk gradually: Add 1/2 to 1 cup of boiling hot milk into the thickened payasam.',
                'Stir gently over low flame for 2 minutes to restore smooth, velvety, flowing consistency.',
                'Taste and re-balance sugar: Because extra milk was added, stir in 1-2 tablespoons of sugar or warm jaggery syrup if needed.',
                'Finish with a pinch of fresh green cardamom powder and fried cashews in ghee.'
            ],
            'alternatives' => [
                [
                    'name' => 'Evaporated Milk or Condensed Milk Thinning',
                    'suitability' => 'Party or festive kheer.',
                    'action' => 'Thin with warm evaporated milk or light almond milk for extra royal richness.',
                    'limitations' => 'Very rich.'
                ]
            ],
            'items_needed' => [
                'required' => ['Fresh milk', 'Small saucepan to heat milk'],
                'optional' => ['Sugar / jaggery', 'Cardamom powder', 'Ghee']
            ],
            'what_not_to_do' => [
                'Never add cold milk straight from the fridge into hot payasam—it can curdle, especially if jaggery was used.',
                'Never add sugar directly to boiling jaggery payasam (jaggery has acidity that curdles hot milk if boiled together).'
            ],
            'prevention' => [
                'Cook vermicelli or rice until just soft; do not over-cook.',
                'Turn off flame while the payasam is still soupier than your desired final consistency, as it naturally thickens by 50% upon cooling.'
            ],
            'science' => 'Starch retrogradation: Vermicelli (roasted wheat starch) and rice starches undergo ongoing hydrogen bonding upon cooling, locking the surrounding milk liquid into a rigid gel network.',
            'related_recipe_ids' => ['semiya-payasam-kheer', 'traditional-rice-payasam'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        // ==========================================
        // 7. SNACKS, FRYING, AND GENERAL
        // ==========================================
        'fried-snacks-absorbing-oil' => [
            'id' => 'fried-snacks-absorbing-oil',
            'title' => 'Fried Snacks (Pakodi, Vada, Bajji) Absorbing Excess Oil and Turning Soggy',
            'category' => 'Snacks and Fried Foods',
            'dishes' => ['Onion Pakodi', 'Medu Vada', 'Mirchi Bajji', 'Punugulu', 'Veg Cutlet'],
            'keywords' => ['oily snacks', 'absorbing oil', 'greasy pakodi', 'soggy vada', 'telu pettesindi'],
            'symptoms' => 'Snacks feel limp and greasy, leaking heavy oil when pressed, without signature crispy crunch.',
            'severity' => 'Moderate',
            'causes' => [
                'Frying oil temperature was too low (< 160°C / 320°F).',
                'Overcrowding the frying kadai with too many items at once (causes oil temperature to plummet).',
                'Batter had excess water or lacked binding rice flour.'
            ],
            'immediate_steps' => [
                'Rescue current batch: Transfer oily snacks to a wire rack or paper-towel-lined plate. Preheat oven/air fryer to 200°C (400°F) and bake for 4-5 minutes—this expels surface oil and restores crispy crunch.',
                'Increase oil heat: Wait for oil in the kadai to reach optimal temperature (180°C / 350°F). Drop a tiny piece of batter: it must sink halfway and instantly pop to surface in 2 seconds with rapid sizzling.',
                'Fix the batter: Add 1-2 tablespoons of fine rice flour (biyyam pindi) or cornflour to the remaining batter. Rice flour forms a hydrophobic crust that repels oil.',
                'Fry in small batches: Fry only 4-5 pieces at a time so oil temperature stays stable.'
            ],
            'alternatives' => [
                [
                    'name' => 'The Double-Fry Technique (Restaurant Secret)',
                    'suitability' => 'Chicken 65, Gobi Manchurian, Potato Fries, Pakodi.',
                    'action' => 'First fry on medium heat for 70% doneness; remove and rest 3 minutes. Flash fry at high heat (195°C) for 60 seconds right before serving. Guaranteed shatteringly crisp.',
                    'limitations' => 'Requires two rounds of frying.'
                ]
            ],
            'items_needed' => [
                'required' => ['Deep frying kadai with adequate oil', 'Slotted spider spoon (jhara)', 'Wire cooling rack'],
                'optional' => ['Fine rice flour', 'Air fryer / oven']
            ],
            'what_not_to_do' => [
                'Do not stack hot fried pakodis directly on top of each other in a closed plastic container—steam gets trapped, making them limp and soggy in 2 minutes.',
                'Do not drop snacks into lukewarm oil.'
            ],
            'prevention' => [
                'Always include 1-2 tablespoons of rice flour or hot ghee in your pakodi batter.',
                'Drain fried snacks on an elevated wire rack rather than resting flat in pooling oil on paper.'
            ],
            'science' => 'During proper frying, internal water rapidly turns into steam that pushes outward, creating high vapor pressure that physically prevents hot oil from penetrating the food. When oil temperature is low, steam pressure drops, allowing oil to seep into porous starch channels.',
            'related_recipe_ids' => ['crispy-onion-pakodi', 'crispy-medu-vada', 'andhra-onion-bajji', 'andhra-punugulu'],
            'related_lesson_ids' => ['lesson-101', 'lesson-402']
        ],

        'pan-sticking-fried-food' => [
            'id' => 'pan-sticking-fried-food',
            'title' => 'Food Sticking to Pan / Skillet During Sautéing or Shallow Frying',
            'category' => 'Snacks and Fried Foods',
            'dishes' => ['Aloo Fry', 'Bendakaya Fry', 'Fish Fry', 'Tandoori Tikka'],
            'keywords' => ['sticking to pan', 'food stuck', 'burning to pan', 'peeling off', 'kadai sticking'],
            'symptoms' => 'Potato slices, okra, or meat weld to the bottom of the pan, tearing and stripping their crispy seasoned crust.',
            'severity' => 'Minor',
            'causes' => [
                'Placing food into a cold pan before oil has heated sufficiently.',
                'Attempting to flip or stir food too early before a protective sear crust has formed.',
                'Pan had burnt residue from a previous step.'
            ],
            'immediate_steps' => [
                'RESIST TURNING: Stop trying to scrape it immediately! Give it 90 seconds untouched on medium heat. As the food starches/proteins brown and caramelize, they naturally release from the metal surface.',
                'Lower flame slightly and drizzle 1 teaspoon oil along the perimeter wall of the pan so it slips beneath the stuck food.',
                'Use a thin, flexible metal fish spatula rather than a blunt wooden spoon to gently nudge underneath.',
                'Deglaze with a splash of liquid: If sautéing vegetables, splash 1 tablespoon of water or broth—the steam instantly lifts stubborn stuck food without tearing.'
            ],
            'alternatives' => [
                [
                    'name' => 'Lid Steam Release',
                    'suitability' => 'Potato fry, root vegetables.',
                    'action' => 'Cover with tight lid for 2 minutes on low flame; trapped moisture softens the bond and releases food.',
                    'limitations' => 'Slightly reduces crispiness.'
                ]
            ],
            'items_needed' => [
                'required' => ['Thin metal spatula / slotted turner'],
                'optional' => ['Cooking oil / splash of water']
            ],
            'what_not_to_do' => [
                'Do not violently scrape with a fork or blunt tool—you will shred delicate fish, paneer, or potatoes into mush.',
                'Do not add wet, water-dripping vegetables directly into hot oil.'
            ],
            'prevention' => [
                'Preheat the pan first dry, then add oil, wait for oil to shimmer, and THEN add food ("Hot pan, cold oil = food will not stick").',
                'Dry raw potatoes or okra thoroughly on a kitchen towel before tossing into the pan.'
            ],
            'science' => 'Thermal bonding occurs when food proteins and starches form sulfur or chemical bonds with microscopic pores in hot metal. Once the Maillard reaction completes and starches caramelize, the surface dehydrates and contracts, breaking the chemical bonds naturally.',
            'related_recipe_ids' => ['andhra-potato-fry', 'andhra-bendakaya-fry', 'restaurant-paneer-tikka'],
            'related_lesson_ids' => ['lesson-101', 'lesson-201']
        ],

        'vegetables-overcooked-mushy' => [
            'id' => 'vegetables-overcooked-mushy',
            'title' => 'Vegetables Overcooked, Limp, Discolored, or Mushy',
            'category' => 'Vegetables and Side Dishes',
            'dishes' => ['Beans Poriyal', 'Veg Stir-Fry', 'Gobi Matar', 'Kurma'],
            'keywords' => ['overcooked vegetables', 'mushy veggies', 'discolored beans', 'limp carrots', 'mushy broccoli'],
            'symptoms' => 'Vibrant green beans turn army-drab olive, broccoli florets crumble into mush, and vegetables lose all crisp crunch.',
            'severity' => 'Moderate',
            'causes' => [
                'Boiling or simmering vegetables for too long.',
                'Covering green vegetables with a tight lid for extended cooking (traps acidic steam).',
                'Cooking dissimilar vegetables with different cooking times simultaneously.'
            ],
            'immediate_steps' => [
                'Ice Bath Shock: If vegetables just finished cooking, immediately plunge them into an ice water bath (or rinse under cold tap water) to stop residual carry-over cooking.',
                'Repurpose into Creamy Vegetable Soup: Blend overcooked veggies with milk/cream, garlic, and vegetable broth into a comforting soup.',
                'Convert into Vegetable Cutlets / Paratha Stuffing: Mash overcooked veggies with boiled potato, spices, and breadcrumbs, and shallow-fry into delicious cutlets.',
                'Fold into Pasta or Fried Rice: Puree into pasta sauce or stir into fried rice.'
            ],
            'alternatives' => [
                [
                    'name' => 'Crispy Tempura / Pakodi Dip',
                    'suitability' => 'Overcooked florets (cauliflower/broccoli).',
                    'action' => 'Dip in seasoned besan/rice flour batter and deep fry for 2 minutes to restore crunch.',
                    'limitations' => 'Adds frying step.'
                ]
            ],
            'items_needed' => [
                'required' => ['Cold water / ice cubes', 'Colander'],
                'optional' => ['Blender for soup repurposing']
            ],
            'what_not_to_do' => [
                'Do not keep simmering overcooked vegetables hoping they will somehow firm up.',
                'Do not cook green vegetables in acidic tamarind/tomato bases until they are already par-cooked.'
            ],
            'prevention' => [
                'Stagger vegetables into the pot: Add dense root vegetables (carrots, potatoes) first, and delicate greens (peas, beans, spinach) in the final 4 minutes.',
                'Cook green vegetables uncovered over high flame to preserve vibrant chlorophyll green.'
            ],
            'science' => 'Plant cell rigidity is maintained by pectin and cellulose in cell walls. High heat hydrolyzes pectin, causing structural collapse. Chlorophyll loses magnesium ions under heat and acid, converting into olive-brown pheophytin pigment.',
            'related_recipe_ids' => ['beans-poriyal', 'homestyle-vegetable-stir-fry', 'crispy-vegetable-cutlet'],
            'related_lesson_ids' => ['lesson-101', 'lesson-202']
        ],

        'undercooked-pulses-chana-rajma' => [
            'id' => 'undercooked-pulses-chana-rajma',
            'title' => 'Lentils, Chana, or Rajma Remain Hard and Gritty Inside',
            'category' => 'Dal, Sambar, and Rasam',
            'dishes' => ['Chole Masala', 'Rajma Masala', 'Toor Dal', 'Sambar'],
            'keywords' => ['hard chana', 'hard rajma', 'uncooked dal', 'crunchy lentils', 'pulses hard', 'not soft'],
            'symptoms' => 'Beans or lentils resist chewing, have a chalky grainy center, and fail to mash smoothly with fingers.',
            'severity' => 'Moderate',
            'causes' => [
                'Adding acidic ingredients (tomatoes, tamarind, amchur) before the beans were fully tender.',
                'Using old, aged dried pulses that have lost cellular hydration capability.',
                'Inadequate soaking time (chana and rajma require 8 hours minimum).'
            ],
            'immediate_steps' => [
                'Add edible baking soda: Add a tiny 1/4 teaspoon of baking soda directly to the cooking liquid. Baking soda creates an alkaline environment that softens pectin in pulse skins.',
                'Pressure cook with extra water: Return to the pressure cooker with 1 cup extra hot water and cook for 4 to 5 additional whistles on medium flame.',
                'Mash and thicken: Mash a ladleful of cooked beans to blend into the gravy, disguising slightly firmer individual beans.'
            ],
            'alternatives' => [
                [
                    'name' => 'Slow Simmer in Covered Heavy Pot',
                    'suitability' => 'If pressure cooker is unavailable.',
                    'action' => 'Simmer covered on low heat for 35-45 minutes with baking soda pinch, checking liquid level every 10 minutes.',
                    'limitations' => 'Takes considerable time.'
                ]
            ],
            'items_needed' => [
                'required' => ['Pressure cooker', 'Water'],
                'optional' => ['Baking soda (edible sodium bicarbonate)']
            ],
            'what_not_to_do' => [
                'Never add raw tomatoes, tamarind paste, or amchur at the beginning of cooking raw dried beans—acid prevents bean pectin from softening permanently.',
                'Do not consume completely raw undercooked kidney beans (rajma contains phytohaemagglutinin toxin until boiled vigorously).'
            ],
            'prevention' => [
                'Always soak chickpeas (chana) and kidney beans (rajma) in plenty of water for 8-12 hours overnight.',
                'Always pressure cook beans until completely tender BEFORE introducing the onion-tomato masala.'
            ],
            'science' => 'Hemicelluloses in bean cell walls break down in neutral or alkaline pH ($\text{pH} \ge 7.0$). In acidic conditions ($\text{pH} \le 5.5$) created by tomatoes, calcium ions crosslink with pectin, forming an insoluble shell that prevents water penetration even after hours of boiling.',
            'related_recipe_ids' => ['punjabi-chole-masala', 'punjabi-rajma-masala', 'andhra-tomato-pappu'],
            'related_lesson_ids' => ['lesson-101', 'lesson-201']
        ],

        'soup-thin-watery' => [
            'id' => 'soup-thin-watery',
            'title' => 'Soup or Broth is Too Thin and Weak',
            'category' => 'Dal, Sambar, and Rasam',
            'dishes' => ['Tomato Rasam', 'Vegetable Soup', 'Chicken Soup'],
            'keywords' => ['thin soup', 'watery rasam', 'weak broth', 'dilute soup', 'flavorless'],
            'symptoms' => 'Soup lacks body, feels like plain flavored water, and lacks mouth-coating warmth.',
            'severity' => 'Minor',
            'causes' => [
                'Excess water poured into the pot.',
                'Insufficient aromatics or lack of starch/collagen body.'
            ],
            'immediate_steps' => [
                'Uncovered rapid reduction: Boil rapidly without lid for 6-8 minutes to concentrate flavor and reduce water volume by 20%.',
                'Mash vegetable solids: If soup contains cooked vegetables, potatoes, or dal, blend 1 cup of solids into a puree and stir back in.',
                'Butter/Cream mount (Monter au beurre): Whisk in 1 tablespoon of cold butter or heavy cream right before serving for velvet mouthfeel.',
                'Add cornstarch or arrowroot slurry: Mix 1 tsp cornstarch in 2 tbsp cold water, drizzle in, and simmer for 1 minute until clear and lightly thickened.'
            ],
            'alternatives' => [
                [
                    'name' => 'Toasted Breadcrumb Thickening',
                    'suitability' => 'Rustic soups and stews.',
                    'action' => 'Stir in 2 tbsp fine toasted breadcrumbs or crushed crackers; they dissolve into the broth and add body.',
                    'limitations' => 'Adds gluten/carbs.'
                ]
            ],
            'items_needed' => [
                'required' => ['Stovetop'],
                'optional' => ['Cornstarch', 'Cold butter', 'Blender']
            ],
            'what_not_to_do' => [
                'Do not over-thicken traditional South Indian Rasam with cornstarch—Rasam is meant to be a light, clear digestive tonic, not thick Western chowder!'
            ],
            'prevention' => [
                'Start with modest water and add hot liquid as needed.',
                'Use bone broth or homemade vegetable stock instead of plain tap water.'
            ],
            'science' => 'Mouthfeel in broths comes from dissolved gelatin (from bones) or suspended starches. Starch gelatinization binds free water molecules, increasing viscosity and extending flavor contact on taste buds.',
            'related_recipe_ids' => ['andhra-tomato-rasam', 'simple-comfort-dal'],
            'related_lesson_ids' => ['lesson-101']
        ],

        'biryani-too-salty' => [
            'id' => 'biryani-too-salty',
            'title' => 'Biryani is Overly Salty',
            'category' => 'Rice and Biryani',
            'dishes' => ['Hyderabadi Biryani', 'Chicken Dum Biryani', 'Veg Biryani'],
            'keywords' => ['salty biryani', 'too much salt in biryani', 'uppu ekkuva biryani'],
            'symptoms' => 'Intense saltiness in every forkful of rice and meat.',
            'severity' => 'Moderate',
            'causes' => [
                'Over-salting both the boiling rice water and the meat marinade simultaneously.',
                'Reducing marinade too far before layering.'
            ],
            'immediate_steps' => [
                'Cook a small portion of separate unsalted plain Basmati rice: Boil 1/2 cup basmati rice in plain unsalted water until 90% done. Gently fold the unsalted white rice into the biryani.',
                'Serve accompanied by unsalted/mild accompaniment: Prepare a cool cucumber raita with zero added salt, or serve with unsalted boiled eggs.',
                'Squeeze fresh lemon juice over the servings: Gentle acidity distracts taste receptors from sodium intensity.'
            ],
            'alternatives' => [
                [
                    'name' => 'Boiled Potato Insertion',
                    'suitability' => 'Dum pots still on the stove.',
                    'action' => 'Insert boiled unsalted potato chunks into the layers and let rest 10 minutes.',
                    'limitations' => 'Only mild effect.'
                ]
            ],
            'items_needed' => [
                'required' => ['Separate pot to boil plain rice'],
                'optional' => ['Fresh lemon', 'Cucumber raita']
            ],
            'what_not_to_do' => [
                'Do not pour salty salan or salty raita over it—balance with cool, unsalted dairy.'
            ],
            'prevention' => [
                'When boiling rice for biryani, water should taste like sea water, but marinade salt should be kept slightly conservative.'
            ],
            'science' => 'Dilution by volume is the only reliable scientific fix for sodium overload in solid grain dishes like biryani.',
            'related_recipe_ids' => ['andhra-chicken-biryani', 'vegetable-dum-biryani'],
            'related_lesson_ids' => ['lesson-301']
        ]        ,
        'meat-tough-chewy' => array (
  'id' => 'meat-tough-chewy',
  'title' => 'Mutton or Chicken is Tough, Chewy, and Stringy',
  'category' => 'Curries and Gravies',
  'dishes' => 
  array (
    0 => 'Andhra Mutton Curry',
    1 => 'Chicken Curry',
    2 => 'Gongura Chicken',
  ),
  'keywords' => 
  array (
    0 => 'tough meat',
    1 => 'chewy mutton',
    2 => 'hard chicken',
    3 => 'stringy meat',
    4 => 'gaddi laga undi',
  ),
  'symptoms' => 'Meat fibers are tough, dry, or rubbery and resist chewing.',
  'severity' => 'Moderate',
  'causes' => 
  array (
    0 => 'Cooking mutton on high heat without sufficient pressure cooking time.',
    1 => 'Overcooking lean chicken breast until all intracellular moisture is squeezed out.',
    2 => 'Using older tough meat without enzymatic tenderization.',
  ),
  'immediate_steps' => 
  array (
    0 => 'For Mutton: Return to pressure cooker with 1/2 cup warm water or gravy and cook for 4-5 additional whistles on low-medium flame.',
    1 => 'Add natural acid/enzymes: Stir in 2 tablespoons whisked curd, 1 teaspoon raw papaya paste, or 1 tablespoon crushed grated green apple/kiwi.',
    2 => 'Slow braise: Simmer tightly covered on low flame for 20 minutes so collagen gelatinizes into succulent gelatin.',
    3 => 'For overcooked dry chicken: Shred the meat finely and toss back into the rich gravy—shredded fibers soak up sauce like a sponge.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Baking Soda Meat Velvet (Quick Tenderizer)',
      'suitability' => 'Stir-fries and chicken curries.',
      'action' => 'Toss meat with 1/4 tsp baking soda in 2 tbsp water, rest 10 minutes, rinse and simmer.',
      'limitations' => 'Rinse well before adding back.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Pressure cooker or heavy pot',
    ),
    'optional' => 
    array (
      0 => 'Raw curd / papaya paste',
      1 => 'Warm water',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not boil lean chicken breast vigorously for 40 minutes—it turns into dry rubber.',
  ),
  'prevention' => 
  array (
    0 => 'Marinate mutton with yogurt and raw papaya paste or lemon for minimum 2 hours.',
    1 => 'Use bone-in chicken thighs rather than skinless breasts for long-simmered Indian curries.',
  ),
  'science' => 'Toughness is caused by collagen crosslinks in connective tissue. Collagen requires extended cooking above 72°C in moist heat to denature into gelatin, creating meltingly tender meat.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-mutton-curry',
    1 => 'andhra-chicken-curry',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-301',
  ),
)        ,
        'paneer-rubbery-hard' => array (
  'id' => 'paneer-rubbery-hard',
  'title' => 'Paneer Cubes Turn Hard, Chewy, and Rubbery',
  'category' => 'Curries and Gravies',
  'dishes' => 
  array (
    0 => 'Paneer Butter Masala',
    1 => 'Palak Paneer',
    2 => 'Kadai Paneer',
    3 => 'Matar Paneer',
  ),
  'keywords' => 
  array (
    0 => 'rubbery paneer',
    1 => 'hard paneer',
    2 => 'chewy paneer',
    3 => 'stiff paneer',
  ),
  'symptoms' => 'Paneer cubes bounce and squeak between teeth like pencil erasers instead of melting softly.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Deep frying or pan-frying paneer until dry and moistureless.',
    1 => 'Boiling paneer inside hot gravy for more than 5 minutes.',
  ),
  'immediate_steps' => 
  array (
    0 => 'The Warm Salt Water Soak: Remove rubbery paneer from the gravy. Submerge in a bowl of warm, lightly salted water for 10-12 minutes.',
    1 => 'Capillary rehydration: The hot water re-hydrates the tightened protein mesh, restoring pillow softness.',
    2 => 'Return to curry off-heat: Gently drain paneer and fold back into the curry just 2 minutes before serving.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Steam in Gravy Off Flame',
      'suitability' => 'Paneer already immersed.',
      'action' => 'Turn off heat completely, put a tight lid on the pot, and let paneer steam gently in hot curry for 5 minutes.',
      'limitations' => 'Only for mildly stiff paneer.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Warm water',
      1 => 'Salt',
      2 => 'Bowl',
    ),
    'optional' => 
    array (
      0 => 'Tongs',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not deep-fry paneer to dark brown—fry only until faint golden or add raw fresh paneer directly.',
  ),
  'prevention' => 
  array (
    0 => 'Always soak store-bought fried paneer in warm water for 10 minutes before adding to gravies.',
    1 => 'Add paneer in the last 3 minutes of cooking; never boil it.',
  ),
  'science' => 'Paneer is an acid-set casein curd. Excessive heat forces water out of protein pores (syneresis), collapsing the sponge-like matrix into dense rubber.',
  'related_recipe_ids' => 
  array (
    0 => 'restaurant-paneer-butter-masala',
    1 => 'palak-paneer',
    2 => 'kadai-paneer',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-201',
  ),
)        ,
        'dosa-breaking-crumbly' => array (
  'id' => 'dosa-breaking-crumbly',
  'title' => 'Dosa Cracking, Breaking, or Lacking Flexibility',
  'category' => 'Dosa, Idli, and Fermented Foods',
  'dishes' => 
  array (
    0 => 'Crispy Plain Dosa',
    1 => 'Masala Dosa',
    2 => 'Pesarattu',
  ),
  'keywords' => 
  array (
    0 => 'dosa breaking',
    1 => 'cracking dosa',
    2 => 'crumbly dosa',
    3 => 'virigipoindi',
  ),
  'symptoms' => 'Dosa snaps and tears apart when folding instead of rolling crisply.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Excessive rice in proportion to urad dal in the batter.',
    1 => 'Batter was under-fermented, leaving raw starch brittle.',
    2 => 'Tawa was dry without fat seasoning.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Add cooked rice slurry: Blend 2 tablespoons of cooked white rice or 1 tbsp maida/wheat flour with 3 tbsp water and whisk into the batter.',
    1 => 'Rest batter: Allow batter to rest 10 minutes so starches relax.',
    2 => 'Drizzle ghee generously: Ghee provides lipid flexibility along fold lines.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Make Thick Sponge Dosa (Set Dosa)',
      'suitability' => 'Crumbly thin dosa batter.',
      'action' => 'Pour smaller, thicker ladles without spreading thin; cook covered with a lid for soft, fluffy Set Dosas.',
      'limitations' => 'Yields soft rather than wafer-crisp dosas.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Cooked rice or wheat flour',
      1 => 'Water',
      2 => 'Ghee',
    ),
    'optional' => 
    array (
      0 => 'Blender',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not spread wafer thin if the batter lacks sufficient urad dal elasticity.',
  ),
  'prevention' => 
  array (
    0 => 'Maintain classic 3:1 or 4:1 ratio of idli rice to whole urad dal.',
    1 => 'Add 1/2 tsp fenugreek (methi) seeds—methi mucilage imparts elasticity.',
  ),
  'science' => 'Urad dal provides globulin proteins that form a cohesive flexible sheet. Without enough dal protein, pure rice starches become brittle like glass when baked dry.',
  'related_recipe_ids' => 
  array (
    0 => 'crispy-plain-dosa',
    1 => 'masala-dosa',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-202',
  ),
)        ,
        'batter-too-sour' => array (
  'id' => 'batter-too-sour',
  'title' => 'Dosa / Idli Batter is Excessively Sour',
  'category' => 'Dosa, Idli, and Fermented Foods',
  'dishes' => 
  array (
    0 => 'Dosa',
    1 => 'Idli',
    2 => 'Punugulu',
  ),
  'keywords' => 
  array (
    0 => 'sour batter',
    1 => 'over fermented',
    2 => 'pulla ga aipoindi',
    3 => 'khatta batter',
  ),
  'symptoms' => 'Strong acidic vinegar-like smell and unpleasantly tart taste.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Over-fermentation in hot summer weather (> 35°C) left on counter for 18+ hours.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Dilute with fresh starch: Whisk in 2-3 tablespoons of fresh rice flour, sooji (rava), or maida with a splash of fresh milk.',
    1 => 'Neutralize acid: Add 1/4 teaspoon baking soda; it neutralizes excess lactic acid.',
    2 => 'Convert to Andhra Punugulu: Sour batter makes the world’s best street-style Punugulu! Add chopped onions, green chillies, cumin, and rice flour, and deep fry into crispy golden dumplings.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Make Spicy Utthappam',
      'suitability' => 'Overly sour dosa batter.',
      'action' => 'Top thick utthappam with plenty of chopped sweet onions and grated carrots; sweet vegetables mask sourness.',
      'limitations' => 'Cannot be made into paper dosa.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Rice flour / sooji',
      1 => 'Fresh milk or water',
    ),
    'optional' => 
    array (
      0 => 'Baking soda',
      1 => 'Onions & green chillies',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not leave batter at warm room temperature once fermented—refrigerate immediately.',
  ),
  'prevention' => 
  array (
    0 => 'Move batter to refrigerator as soon as it rises by 50% in warm weather.',
  ),
  'science' => 'Lactic acid bacteria produce lactic acid as they consume sugars. Once pH drops below 4.0, acidity tastes harsh. Alkaline soda or fresh unfermented grain raises pH back to pleasant levels.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-punugulu',
    1 => 'crispy-plain-dosa',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)        ,
        'cake-burnt-outside-raw-inside' => array (
  'id' => 'cake-burnt-outside-raw-inside',
  'title' => 'Cake is Dark/Burnt on Top but Liquid/Raw in the Center',
  'category' => 'Cakes and Baking',
  'dishes' => 
  array (
    0 => 'Chocolate Brownies',
    1 => 'Sponge Cake',
    2 => 'Fruit Cake',
  ),
  'keywords' => 
  array (
    0 => 'raw inside burnt outside',
    1 => 'top burnt center raw',
    2 => 'cake uneven',
    3 => 'wet middle',
  ),
  'symptoms' => 'Top crust is dark mahogany or blackened while inserting a toothpick in the center reveals wet batter.',
  'severity' => 'Serious',
  'causes' => 
  array (
    0 => 'Oven temperature was set too high (e.g. 200°C instead of 170°C).',
    1 => 'Cake pan placed too close to top heating element.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Tent with foil: Loosely cover the entire top of the cake pan with a tented sheet of aluminum foil (shiny side up to reflect radiant heat).',
    1 => 'Lower oven temperature: Drop oven temperature by 25°C (45°F).',
    2 => 'Move to lower middle rack: Reposition cake pan away from the upper heating coil.',
    3 => 'Bake until set: Continue baking for 12 to 18 minutes until a skewer inserted in the center comes out clean.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Repurpose as Molten Lava Cake (For Chocolate)',
      'suitability' => 'If center is warm and sanitary chocolate.',
      'action' => 'Embrace the fudgy center as a molten chocolate pudding dessert served hot with ice cream.',
      'limitations' => 'Only for chocolate recipes.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Aluminum foil',
      1 => 'Oven mitts',
      2 => 'Toothpick/skewer',
    ),
    'optional' => 
    array (
      0 => 'Oven thermometer',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not turn off oven and let it sit—raw wet batter will sink into a rubber puddle.',
  ),
  'prevention' => 
  array (
    0 => 'Use an independent oven thermometer to verify true oven temperature; many home ovens run 20°C hotter than dial.',
    1 => 'Always bake on the middle shelf.',
  ),
  'science' => 'Heat transfer in baking involves radiation and conduction. Aluminum foil reflects 95% of radiant thermal waves from top elements, allowing ambient convective air to gently cook the core.',
  'related_recipe_ids' => 
  array (
    0 => 'chocolate-brownies',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-302',
  ),
)        ,
        'cake-dry-crumbly' => array (
  'id' => 'cake-dry-crumbly',
  'title' => 'Cake is Overly Dry, Crumbly, and Stale-Tasting',
  'category' => 'Cakes and Baking',
  'dishes' => 
  array (
    0 => 'Tea Cake',
    1 => 'Sponge Cake',
    2 => 'Brownies',
  ),
  'keywords' => 
  array (
    0 => 'dry cake',
    1 => 'crumbly cake',
    2 => 'choking dry',
    3 => 'dusty cake',
    4 => 'no moisture',
  ),
  'symptoms' => 'Cake crumbles into dust when sliced and feels dry and parched in the mouth.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Baked for 10-15 minutes too long.',
    1 => 'Too much flour or insufficient butter/oil/liquid.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Simple Syrup Soak (Pastry Chef Secret): Dissolve equal parts sugar and hot water with vanilla or citrus zest. Brush liberally over the cake layers with a pastry brush.',
    1 => 'Wrap in plastic while warm: Wrapping a warm cake traps evaporating moisture inside the crumb.',
    2 => 'Serve with rich moisture: Pair slices with warm custard, chocolate ganache, or scoop of vanilla ice cream.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Turn into English Trifle',
      'suitability' => 'Dry sponge cake.',
      'action' => 'Layer cubed dry cake in a glass bowl with fruit compote, vanilla custard, and whipped cream.',
      'limitations' => 'Creates a layered dessert.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Sugar',
      1 => 'Water',
      2 => 'Pastry brush or spoon',
    ),
    'optional' => 
    array (
      0 => 'Vanilla extract',
      1 => 'Custard / ice cream',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not microwave dry cake without covering with a damp towel.',
  ),
  'prevention' => 
  array (
    0 => 'Start testing doneness 5 minutes before the recipe timer expires.',
    1 => 'Measure flour by spooning into the cup and leveling; never scoop directly from bag (packs 25% extra flour).',
  ),
  'science' => 'Starch retrogradation and moisture loss turn crumb structures brittle. A 1:1 simple syrup re-hydrates starch gels without collapsing gluten cell walls.',
  'related_recipe_ids' => 
  array (
    0 => 'chocolate-brownies',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-302',
  ),
)        ,
        'sweet-mixture-too-hard' => array (
  'id' => 'sweet-mixture-too-hard',
  'title' => 'Halwa / Barfi / Mysore Pak Setting Rock Hard',
  'category' => 'Indian Sweets and Desserts',
  'dishes' => 
  array (
    0 => 'Traditional Mysore Pak',
    1 => 'Rava Kesari',
    2 => 'Besan Barfi',
    3 => 'Ariselu',
  ),
  'keywords' => 
  array (
    0 => 'hard barfi',
    1 => 'rock hard sweet',
    2 => 'mysore pak hard',
    3 => 'uncuttable',
    4 => 'stone sweet',
  ),
  'symptoms' => 'Sweet mixture solidifies into an uncuttable rock or brick as it cools.',
  'severity' => 'Serious',
  'causes' => 
  array (
    0 => 'Sugar syrup boiled past hard ball / crack stage (> 125°C).',
    1 => 'Cooked on flame for too long after fat separation.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Re-melt on low heat: Return the hard sweet mixture to a heavy kadai. Add 1/4 cup warm milk or hot water and 1 tablespoon melted ghee.',
    1 => 'Cook on gentle low flame: Stir constantly over lowest flame until the hard sugar dissolves and the mixture softens back into a smooth mass.',
    2 => 'Turn into Crumbled Sweet Halwa: If it cannot be sliced into squares, crumble it and serve as delicious crumbly Ghee Halwa or Mysore Pak Crumble topped with toasted nuts!',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Grind into Sweet Ladoo Mixture',
      'suitability' => 'Brittle, hard barfi.',
      'action' => 'Pulse broken pieces in a food processor with 1 tbsp warm milk and roll into sweet ladoos.',
      'limitations' => 'Changes the shape.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Heavy kadai',
      1 => 'Warm milk / water',
      2 => 'Ghee',
    ),
    'optional' => 
    array (
      0 => 'Food processor for ladoo conversion',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not force a knife through cold rock-hard barfi—you will chip your blade or send sharp shards flying.',
  ),
  'prevention' => 
  array (
    0 => 'Always use a cold water test: Drop a drop of hot syrup in cold water. For Mysore pak and barfi, it should form a soft pliable ball (soft-ball stage, 118°C), not hard glass.',
  ),
  'science' => 'Sugar concentration increases as water evaporates. Above 120°C, sucrose concentration exceeds 85%, forming an amorphous brittle glass on cooling. Adding warm moisture re-dissolves the glass into a flexible crystalline matrix.',
  'related_recipe_ids' => 
  array (
    0 => 'traditional-mysore-pak',
    1 => 'south-indian-rava-kesari',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-302',
  ),
)        ,
        'sweet-mixture-too-soft' => array (
  'id' => 'sweet-mixture-too-soft',
  'title' => 'Barfi / Katli / Mysore Pak Won\'t Set (Remains Sticky Halwa)',
  'category' => 'Indian Sweets and Desserts',
  'dishes' => 
  array (
    0 => 'Mysore Pak',
    1 => 'Besan Barfi',
    2 => 'Kaju Katli',
  ),
  'keywords' => 
  array (
    0 => 'sweet not setting',
    1 => 'barfi too soft',
    2 => 'sticky halwa',
    3 => 'set avaledu',
    4 => 'runny sweet',
  ),
  'symptoms' => 'Mixture poured into greased tray remains soft, sticky, and gooey; cannot be cut into neat pieces.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Sugar syrup was under-boiled before adding flour/nuts.',
    1 => 'Excess liquid or moisture left in the mixture.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Return to pan: Scrape the soft mixture back into the non-stick or heavy kadai.',
    1 => 'Cook on low-medium flame: Stir continuously for 4 to 6 minutes. You will see moisture evaporating and the mixture starting to leave the sides of the pan cleanly.',
    2 => 'Add roasted binder: Stir in 1-2 tablespoons of dry-roasted milk powder, almond flour, or roasted besan.',
    3 => 'Re-grease tray and pour: Transfer back to a greased tray, smooth the top, and chill in refrigerator for 30 minutes to set firmly.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Serve as Warm Halwa / Pudding',
      'suitability' => 'If you do not want to cook further.',
      'action' => 'Garnish with pistachios and serve warm in dessert bowls as royal halwa.',
      'limitations' => 'Different dessert format.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Heavy kadai',
      1 => 'Greased setting tray',
      2 => 'Refrigerator',
    ),
    'optional' => 
    array (
      0 => 'Milk powder / roasted besan',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not crank burner to high heat—nut and besan sweets scorch in seconds.',
  ),
  'prevention' => 
  array (
    0 => 'Wait until the mixture leaves the sides of the pan as a single cohesive mass and froths lightly before turning off heat.',
  ),
  'science' => 'Setting requires sugar crystallization and fat solidification upon cooling. Excess moisture prevents sucrose from reaching supersaturation, remaining in liquid syrup state.',
  'related_recipe_ids' => 
  array (
    0 => 'traditional-mysore-pak',
    1 => 'south-indian-rava-kesari',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-302',
  ),
)        ,
        'rasam-flat-tasteless' => array (
  'id' => 'rasam-flat-tasteless',
  'title' => 'Rasam is Flat, Insipid, or Lacks Depth and Aroma',
  'category' => 'Dal, Sambar, and Rasam',
  'dishes' => 
  array (
    0 => 'Andhra Tomato Rasam (Charu)',
  ),
  'keywords' => 
  array (
    0 => 'flat rasam',
    1 => 'tasteless rasam',
    2 => 'rasam bland',
    3 => 'charu ruchi ledu',
    4 => 'watery rasam',
  ),
  'symptoms' => 'Rasam tastes like sour diluted water with no aromatic punch or warmth.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Spices were stale or pre-ground months ago.',
    1 => 'Boiling rasam vigorously for 15 minutes (destroys volatile top notes).',
    2 => 'Lack of fresh crushed garlic or coriander roots.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Fresh Tadka Boost: Heat 1 tbsp desi ghee in a tadka pan. Add mustard seeds, cumin seeds, 4 crushed garlic cloves with skin, pinch of hing (asafoetida), and fresh curry leaves. Sizzle until golden and pour immediately into the rasam.',
    1 => 'COVER IMMEDIATELY: Trap the aromatic ghee-garlic steam with a tight lid for 5 minutes.',
    2 => 'Stir in fresh black pepper & cumin powder: Pound 1/2 tsp whole black peppercorns and 1/2 tsp cumin freshly in a mortar and stir in.',
    3 => 'Add fresh coriander stems: Finely chop fresh coriander stems and simmer for 60 seconds.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Add 2 Tbsp Boiled Toor Dal Water',
      'suitability' => 'Watery flat rasam.',
      'action' => 'Stir in 2 tbsp mashed cooked yellow dal broth (paruppu thanni) for rich body.',
      'limitations' => 'Requires cooked dal.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Desi ghee',
      1 => 'Garlic cloves',
      2 => 'Black peppercorns & cumin',
      3 => 'Curry leaves',
    ),
    'optional' => 
    array (
      0 => 'Hing (asafoetida)',
      1 => 'Fresh coriander',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Never boil rasam on a rolling boil for 10 minutes—traditional rasam is heated ONLY until it froths on top, then removed from flame immediately.',
  ),
  'prevention' => 
  array (
    0 => 'Always crush black pepper, cumin, and garlic fresh in a stone mortar just before making rasam.',
  ),
  'science' => 'Essential aromatic oils in coriander and garlic (such as allicin and linalool) are highly volatile with low boiling points. Rapid boiling evaporates these compounds into the room, leaving only flat acid water behind.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-tomato-rasam',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-201',
  ),
)        ,
        'sambar-too-sour-tamarind' => array (
  'id' => 'sambar-too-sour-tamarind',
  'title' => 'Sambar is Overly Sour from Excess Tamarind',
  'category' => 'Dal, Sambar, and Rasam',
  'dishes' => 
  array (
    0 => 'Authentic Hotel Style Drumstick Sambar',
  ),
  'keywords' => 
  array (
    0 => 'sour sambar',
    1 => 'excess tamarind',
    2 => 'sambar pullaga undi',
    3 => 'too tart sambar',
  ),
  'symptoms' => 'Aggressive tamarind sharpness overpowers vegetables, dal, and sambar masala.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Soaking tamarind in too little water or using very dark aged tamarind.',
    1 => 'Underestimating tamarind potency before adding dal.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Add Jaggery (Gud): Add 1 teaspoon grated jaggery. Traditional South Indian hotel sambar always balances tamarind with sweet jaggery.',
    1 => 'Add Boiled Yellow Dal: Stir in 1/2 cup of plain mashed boiled toor dal to dilute tamarind concentration.',
    2 => 'Add Fresh Coconut Paste: Blend 2 tbsp fresh grated coconut with 2 tbsp water into a milky paste; stir in and simmer 2 minutes.',
    3 => 'Simmer with sweet vegetables: Drop in pre-boiled sweet pumpkin or carrot chunks.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Pinch of Baking Soda',
      'suitability' => 'Extremely sour sambar.',
      'action' => 'Add 1/8 tsp baking soda to chemically neutralize tartaric acid.',
      'limitations' => 'Use only a tiny pinch.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Jaggery or brown sugar',
    ),
    'optional' => 
    array (
      0 => 'Boiled toor dal',
      1 => 'Fresh coconut',
      2 => 'Baking soda',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not add more salt or chilli powder to fight sourness—you will create an over-seasoned monster.',
  ),
  'prevention' => 
  array (
    0 => 'Measure tamarind by lemon-sized ball; extract in 1 cup warm water and pour half first, tasting before adding the rest.',
  ),
  'science' => 'Tartaric acid from tamarind has a low dissociation constant. Jaggery introduces sucrose and molasses minerals that stimulate sweet taste buds simultaneously, suppressing sour neural signals in the brain.',
  'related_recipe_ids' => 
  array (
    0 => 'hotel-style-sambar',
    1 => 'andhra-tomato-pappu',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-201',
  ),
)        ,
        'chutney-watery-separated' => array (
  'id' => 'chutney-watery-separated',
  'title' => 'Coconut / Peanut Chutney is Watery and Separating',
  'category' => 'Chutneys and Pickles',
  'dishes' => 
  array (
    0 => 'Hotel White Coconut Chutney',
    1 => 'Andhra Peanut Chutney',
    2 => 'Tomato Chutney',
  ),
  'keywords' => 
  array (
    0 => 'watery chutney',
    1 => 'separated chutney',
    2 => 'chutney runny',
    3 => 'neellaga undi chutney',
  ),
  'symptoms' => 'Chutney separates on the plate into a puddle of clear water with solids sinking to the middle.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Adding too much water while grinding in blender.',
    1 => 'Using mature watery coconut with low roasted dal binder.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Add Roasted Gram (Putnala Pappu / Dalia): Add 1-2 tablespoons of roasted gram or roasted peanuts to the blender and pulse with the watery chutney for 20 seconds.',
    1 => 'Drain excess water: If very watery, pour chutney through a fine sieve, return solids to jar with 1 tbsp roasted gram, and re-blend with minimal liquid.',
    2 => 'Hot Tadka binding: Pour a sizzling hot mustard and curry leaf tadka over the top; warm oil helps emulsify fine particles.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Desiccated Coconut Thickener',
      'suitability' => 'Coconut chutney.',
      'action' => 'Stir in 1 tbsp dry unsweetened desiccated coconut; it hydrates in 5 minutes and binds free water.',
      'limitations' => 'Alters texture slightly.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Roasted gram (dalia / putnalu) or peanuts',
      1 => 'Blender',
    ),
    'optional' => 
    array (
      0 => 'Desiccated coconut',
      1 => 'Fine sieve',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not pour half a glass of water when starting the blender—always grind coconut with minimum water first, adding small splashes only as needed.',
  ),
  'prevention' => 
  array (
    0 => 'The Golden Chutney Ratio: 1 cup fresh coconut requires 2 tablespoons roasted gram (chutney dal) to create a velvety emulsion that never separates.',
  ),
  'science' => 'Chutneys are oil-in-water suspensions. Roasted gram starches and proteins act as natural emulsifiers, binding free water and preventing phase separation (syneresis).',
  'related_recipe_ids' => 
  array (
    0 => 'hotel-coconut-chutney',
    1 => 'andhra-peanut-chutney',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)        ,
        'chutney-too-spicy-hot' => array (
  'id' => 'chutney-too-spicy-hot',
  'title' => 'Chutney is Fire-Spicy from Excess Green Chillies',
  'category' => 'Chutneys and Pickles',
  'dishes' => 
  array (
    0 => 'Tomato Pachadi',
    1 => 'Peanut Chutney',
    2 => 'Coconut Chutney',
    3 => 'Gongura Pachadi',
  ),
  'keywords' => 
  array (
    0 => 'spicy chutney',
    1 => 'too hot chutney',
    2 => 'mirchi ekkuva pachadi',
    3 => 'burning chutney',
  ),
  'symptoms' => 'Fiery burning heat overpowering the pleasant nutty, tangy flavor of the chutney.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Accidental addition of overly pungent green or dry red chillies.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Add extra coconut / peanuts: Add 2-3 tablespoons of fresh grated coconut or roasted peanuts and blend again with 2 tbsp water.',
    1 => 'Add fat (curd or ghee): Stir in 2 tablespoons of fresh whisked curd (yogurt) or 1 tablespoon melted ghee.',
    2 => 'Add sweetness & acid: Stir in 1/2 teaspoon jaggery and a squeeze of fresh lemon juice.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Dilute with Boiled Chana / Dal',
      'suitability' => 'Spicy tomato or onion chutney.',
      'action' => 'Blend in 2 tbsp boiled chana dal or roasted gram to dilute spice volume.',
      'limitations' => 'Increases volume.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Fresh coconut or roasted peanuts',
      1 => 'Blender',
    ),
    'optional' => 
    array (
      0 => 'Curd',
      1 => 'Jaggery & lemon',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not add plain water—it only dilutes flavor without mitigating capsaicin burn.',
  ),
  'prevention' => 
  array (
    0 => 'Sauté green chillies lightly in oil before blending—frying mellows raw sharp capsaicin.',
  ),
  'science' => 'Capsaicin dissolves into plant and dairy fats (coconut oil, peanut lipids, ghee), buffering direct contact with tongue mucosal nerves.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-tomato-chutney',
    1 => 'andhra-peanut-chutney',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)        ,
        'rice-smells-burnt-stuck' => array (
  'id' => 'rice-smells-burnt-stuck',
  'title' => 'Plain Cooked Rice Smells Smoky or Stuck to Pressure Cooker',
  'category' => 'Rice and Biryani',
  'dishes' => 
  array (
    0 => 'Steamed Plain Rice',
    1 => 'Lemon Rice',
    2 => 'Curd Rice',
  ),
  'keywords' => 
  array (
    0 => 'smoky rice',
    1 => 'burnt cooker rice',
    2 => 'rice burnt smell',
    3 => 'madina vaasana',
  ),
  'symptoms' => 'Rice at base of cooker has scorched, imparting an acrid smoky aroma to the entire batch.',
  'severity' => 'Moderate',
  'causes' => 
  array (
    0 => 'Insufficient water in the pressure cooker.',
    1 => 'Leaving the burner on high flame after whistles.',
  ),
  'immediate_steps' => 
  array (
    0 => 'DO NOT SCRAPE: Never scrape the bottom with a spoon.',
    1 => 'The Onion Absorption Hack: Cut an onion in half and push the cut sides into the top of the hot cooked rice. Put the lid back on for 10 minutes. The raw onion absorbs volatile smoke molecules.',
    2 => 'The White Bread Slice Hack: Place a single slice of plain white sandwich bread on top of the hot rice, close lid for 8 minutes, then remove and discard bread.',
    3 => 'Gently transfer ONLY the pristine white top layers into a clean serving bowl.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Convert to Andhra Lemon Rice (Chitrannam)',
      'suitability' => 'Slightly smoky rice.',
      'action' => 'Toss with hot mustard-turmeric-peanut tadka and plenty of lemon juice. The vibrant citrus and mustard aroma completely masks faint smokiness.',
      'limitations' => 'Transforms plain rice into variety rice.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Fresh onion or slice of white bread',
      1 => 'Clean serving bowl',
    ),
    'optional' => 
    array (
      0 => 'Lemon & tempering spices (for lemon rice)',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not stir the pot—burnt brown grains will scatter throughout the clean white rice.',
  ),
  'prevention' => 
  array (
    0 => 'Use standard 1:2 ratio of water for raw rice in pressure cooker.',
    1 => 'Cook on medium flame for 3 whistles, then immediately turn flame to low for 2 minutes and turn off.',
  ),
  'science' => 'Porous white bread and raw onion sulfur compounds have high surface adsorption capacity for airborne phenols and creosote molecules that cause acrid smoke smells.',
  'related_recipe_ids' => 
  array (
    0 => 'steamed-plain-rice',
    1 => 'andhra-lemon-rice',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)        ,
        'dal-overflowed-cooker-mess' => array (
  'id' => 'dal-overflowed-cooker-mess',
  'title' => 'Dal Spilled and Frolicked Out of Pressure Cooker Whistle',
  'category' => 'Dal, Sambar, and Rasam',
  'dishes' => 
  array (
    0 => 'Tomato Pappu',
    1 => 'Simple Comfort Dal',
    2 => 'Spinach Dal',
  ),
  'keywords' => 
  array (
    0 => 'dal overflow',
    1 => 'cooker leaking',
    2 => 'whistle water mess',
    3 => 'pappu pongindi',
    4 => 'cooker spray',
  ),
  'symptoms' => 'Yellow dal water sprays violently out of the weight valve, covering stove, cooker lid, and counter in yellow foam.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Overfilling pressure cooker beyond 2/3 capacity.',
    1 => 'High starch foaming of toor/moong dal under rapid pressure.',
    2 => 'Cooking without a drop of oil or ghee inside the dal.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Lower flame: Lower gas burner to low immediately to stop violent boiling.',
    1 => 'Clean safety valve: Once pressure drops naturally, thoroughly clean the vent pipe and rubber gasket under running tap water to ensure no dal skins clog the safety valve.',
    2 => 'Check dal water level: Open cooker and inspect dal; add 1/2 cup warm water if too much liquid sprayed out.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Small Steel Bowl Insert Trick',
      'suitability' => 'Next cooking session.',
      'action' => 'Drop a small, heavy stainless-steel spoon or tiny steel cup directly inside the dal pot; it breaks bubble formation physically.',
      'limitations' => 'Requires small steel item.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Kitchen towel to wipe stove',
      1 => 'Running water to rinse vent pipe',
    ),
    'optional' => 
    array (
      0 => 'Teaspoon of cooking oil or ghee',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Never try to force open a hot pressure cooker with a fork or by lifting the whistle under high pressure—extremely dangerous steam scalding risk!',
  ),
  'prevention' => 
  array (
    0 => 'THE GOLDEN ANTI-FOAM TRICK: Always add 1 teaspoon of cooking oil or ghee directly into the dal and water before closing cooker lid. Oil acts as an anti-foaming surfactant.',
    1 => 'Never fill pressure cooker more than halfway when cooking foaming pulses like toor dal or chana.',
  ),
  'science' => 'Saponins and water-soluble proteins in lentils create a durable viscous foam that traps steam bubbles. Oil acts as a surface-active defoamer, reducing surface tension so steam bubbles pop harmlessly instead of climbing the chimney.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-tomato-pappu',
    1 => 'simple-comfort-dal',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)        ,
        'bread-not-rising-yeast' => array (
  'id' => 'bread-not-rising-yeast',
  'title' => 'Bread / Pizza Dough Fails to Rise (Dead Yeast)',
  'category' => 'Cakes and Baking',
  'dishes' => 
  array (
    0 => 'Artisanal Bread Loaf',
    1 => 'Homemade Pizza Base',
    2 => 'Naan',
  ),
  'keywords' => 
  array (
    0 => 'dough not rising',
    1 => 'dead yeast',
    2 => 'bread flat',
    3 => 'pizza dough hard',
    4 => 'no proofing',
  ),
  'symptoms' => 'Dough ball stays small, heavy, and dense after 2 hours with no inflation or air pockets.',
  'severity' => 'Moderate',
  'causes' => 
  array (
    0 => 'Yeast was killed by water that was too hot (> 45°C / 115°F).',
    1 => 'Expired yeast with zero viable live cells.',
    2 => 'Cold drafty kitchen inhibiting yeast metabolism.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Test for temperature first: Move dough to warm spot (inside oven with light on, or near warm stove) for 45 minutes.',
    1 => 'If still dormant (Dead Yeast Rescue): Proof a fresh teaspoon of yeast in 3 tbsp lukewarm water (38°C) with 1/2 tsp sugar for 10 minutes until frothy.',
    2 => 'Incorporate into dough: Flatten the dense dough, pour the frothy yeast mixture over it, and knead thoroughly for 4 minutes until re-integrated.',
    3 => 'Let rise again: Cover with damp cloth; it will rise beautifully in 60-90 minutes.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Convert to Unleavened Flatbreads (Parathas / Naan)',
      'suitability' => 'If you have no extra yeast.',
      'action' => 'Roll dough thin, brush with ghee, fold and roll into flaky layered flatbreads cooked on tawa.',
      'limitations' => 'Cannot bake as loaf.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Fresh active dry yeast',
      1 => 'Lukewarm water (38°C)',
      2 => 'Pinch of sugar',
    ),
    'optional' => 
    array (
      0 => 'Oven with interior light',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Never mix yeast with boiling water—temperatures above 50°C (122°F) denature and kill yeast proteins instantly.',
    1 => 'Do not add salt directly on top of dry yeast granules before hydration.',
  ),
  'prevention' => 
  array (
    0 => 'Always "proof" your yeast first in lukewarm water with sugar; if it does not froth like beer within 10 minutes, throw it away and buy fresh.',
    1 => 'Store active dry yeast in an airtight jar in the freezer to extend shelf life for up to 1 year.',
  ),
  'science' => '*Saccharomyces cerevisiae* yeast ferment sugars into $CO_2$ gas and alcohol. Yeast enzymes have an optimal operating temperature of 30°C-38°C. Beyond 50°C, thermal denaturation irreversibly kills the single-celled fungi.',
  'related_recipe_ids' => 
  array (
    0 => 'artisanal-bread-loaf',
    1 => 'homemade-pizza-base',
    2 => 'restaurant-style-naan',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-302',
  ),
)        ,
        'pakodi-hard-not-crispy' => array (
  'id' => 'pakodi-hard-not-crispy',
  'title' => 'Onion Pakodi / Vada is Hard as a Rock Instead of Crispy',
  'category' => 'Snacks and Fried Foods',
  'dishes' => 
  array (
    0 => 'Street Style Onion Pakodi',
    1 => 'Crispy Medu Vada',
  ),
  'keywords' => 
  array (
    0 => 'hard pakodi',
    1 => 'tough vada',
    2 => 'pakodi stone',
    3 => 'gaddaga undi',
    4 => 'cannot bite',
  ),
  'symptoms' => 'Snack is tough, hard, and tooth-shattering instead of light, flaky, and crispy.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Dough was kneaded like bread dough with excess water and flour.',
    1 => 'Frying on high heat for too long.',
    2 => 'Omitting hot oil / ghee (mohan) in the dry besan mix.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Rescue future batches: Add 2 tablespoons of SIZZLING HOT OIL directly from the frying pan into the remaining dry pakodi batter. This thermal shock creates instant flakiness (known as "mohan").',
    1 => 'Add more sliced onions: Authentic Andhra pakodi relies on onions, not batter. Add plenty of thinly sliced onions—they release water and create natural gaps.',
    2 => 'Rescue already fried hard pakodi: Dip in warm water for 2 seconds and toss into spicy curd to create delicious Dahi Pakodi or Kadhi Pakodi!',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Add 1/4 tsp Baking Soda',
      'suitability' => 'Dense, hard batter.',
      'action' => 'Gently fold in 1/4 tsp baking soda; it releases micro-bubbles during frying for lighter texture.',
      'limitations' => 'Do not add too much or pakodis absorb oil.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Hot frying oil',
      1 => 'Extra sliced onions',
    ),
    'optional' => 
    array (
      0 => 'Baking soda',
      1 => 'Fresh curd (for dahi pakodi repurpose)',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not make a thick runny batter for onion pakodis—onion pakodi dough should be crumbly and dry, bound solely by onion juices.',
  ),
  'prevention' => 
  array (
    0 => 'Squeeze sliced onions with salt and spices with your bare hands for 2 minutes to draw out natural onion water before adding flour.',
  ),
  'science' => 'Adding hot oil ("mohan") to besan creates an emulsion that physically separates gluten and starch strands before water can hydrate them. This creates short, crumbly, shatteringly crisp textures rather than dense rubber.',
  'related_recipe_ids' => 
  array (
    0 => 'crispy-onion-pakodi',
    1 => 'crispy-medu-vada',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-402',
  ),
)        ,
        'noodles-sticky-clumped' => array (
  'id' => 'noodles-sticky-clumped',
  'title' => 'Hakka Noodles / Pasta Clumped Together into a Sticky Mass',
  'category' => 'Snacks and Fried Foods',
  'dishes' => 
  array (
    0 => 'Street Style Veg Hakka Noodles',
    1 => 'Classic Tomato Basil Pasta',
  ),
  'keywords' => 
  array (
    0 => 'sticky noodles',
    1 => 'clumped noodles',
    2 => 'pasta sticking',
    3 => 'noodles clump',
    4 => 'mushy pasta',
  ),
  'symptoms' => 'Boiled noodles fuse into a solid, gluey block instead of flowing as separate strands.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Boiling in too little water (starch concentrated in the pot).',
    1 => 'Failing to rinse boiled noodles with cold water immediately.',
    2 => 'Omitting oil toss after draining.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Cold Water Colander Rinse: Place the clumped noodles in a colander in the sink. Run cold tap water over them while gently teasing strands apart with your fingers or a fork.',
    1 => 'Toss with cooking oil: Drizzle 1 tablespoon of cooking oil or toasted sesame oil over the separated noodles and toss thoroughly with clean hands. The oil coats every strand with a slick non-stick barrier.',
    2 => 'High Heat Wok Toss: When adding to the stir-fry wok, ensure wok is smoking hot. Tossing over intense heat flashes off surface moisture and restores restaurant texture.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Hot Broth Dunk',
      'suitability' => 'Pasta or noodles.',
      'action' => 'Dunk colander into a pot of boiling water for strictly 5 seconds; strands instantly release.',
      'limitations' => 'Do not leave longer than 5 seconds.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Colander',
      1 => 'Cold running water',
      2 => '1 tbsp cooking oil',
    ),
    'optional' => 
    array (
      0 => 'Sesame oil',
      1 => 'Wok',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not leave hot drained noodles sitting in a dry warm colander without rinsing and oiling—they will glue together into a brick in 90 seconds.',
  ),
  'prevention' => 
  array (
    0 => 'Cook in plenty of rolling boiling water (minimum 3 liters per 200g noodles).',
    1 => 'Boil noodles to 85% "al dente" (firm to the bite with a faint white center), as they cook further in the stir-fry wok.',
  ),
  'science' => 'Boiling releases free surface amylose starch into the surrounding water. When strained, this hot gelatinized starch cools into a sticky glue. Cold rinsing washes away the glue, while oil provides a hydrophobic boundary layer.',
  'related_recipe_ids' => 
  array (
    0 => 'restaurant-hakka-noodles',
    1 => 'classic-tomato-basil-pasta',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-401',
    1 => 'lesson-402',
  ),
)        ,
        'garlic-ginger-paste-turned-green' => array (
  'id' => 'garlic-ginger-paste-turned-green',
  'title' => 'Ginger-Garlic Paste Turned Blue or Green in the Fridge',
  'category' => 'General Cooking Problems',
  'dishes' => 
  array (
    0 => 'Homemade Ginger-Garlic Paste',
    1 => 'Biryani Marinade',
    2 => 'Curry Base',
  ),
  'keywords' => 
  array (
    0 => 'green garlic',
    1 => 'blue ginger garlic',
    2 => 'paste turned green',
    3 => 'garlic oxidized',
    4 => 'is green garlic safe',
  ),
  'symptoms' => 'Freshly ground garlic paste develops an alarming bluish-green or turquoise tint after sitting in the refrigerator.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Natural chemical reaction between garlic sulfur compounds (alliin) and amino acids in slightly acidic environments.',
    1 => 'Contact with copper or trace minerals in old blender blades.',
  ),
  'immediate_steps' => 
  array (
    0 => 'IS IT SAFE? YES, 100% SAFE: This is a completely harmless, non-toxic enzymatic pigment reaction (similar to how anthocyanins change color in red cabbage). It is NOT mold, NOT spoiled, and will not cause illness.',
    1 => 'Use with confidence: The blue-green pigment breaks down into normal golden-brown color as soon as it hits the hot cooking oil in your pan.',
    2 => 'Mask the color: Stir in 1/4 teaspoon turmeric powder (haldi) into the jar—turmeric gives a vibrant golden yellow hue that masks green tints.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Blanch Garlic Before Grinding',
      'suitability' => 'Future paste batches.',
      'action' => 'Blanch peeled garlic cloves in boiling water for 1 minute before grinding; heat deactivates the alliinase enzyme permanently.',
      'limitations' => 'Mellows raw garlic pungency slightly.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Turmeric powder',
    ),
    'optional' => 
    array (
      0 => 'Hot cooking oil',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'DO NOT throw away perfectly good garlic paste! It is not spoiled and does not affect flavor or safety.',
    1 => 'Do not store garlic paste in open bowls without oil/salt preservative.',
  ),
  'prevention' => 
  array (
    0 => 'Always grind ginger and garlic with 1 teaspoon salt and 1 tablespoon hot cooking oil—oil acts as a protective barrier against atmospheric oxidation.',
    1 => 'Store in an airtight glass jar in the coldest part of the refrigerator or freeze in an ice-cube tray.',
  ),
  'science' => 'Garlic contains isoalliin and the enzyme alliinase. When cell walls are ruptured during grinding in an acidic environment, they form polypyrrole pigments (pyrrole complexes)—the exact same natural reaction used to make famous Chinese Laba Garlic.',
  'related_recipe_ids' => 
  array (
    0 => 'andhra-chicken-curry',
    1 => 'andhra-chicken-biryani',
    2 => 'restaurant-paneer-butter-masala',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-201',
  ),
)        ,
        'oil-splattering-violent' => array (
  'id' => 'oil-splattering-violent',
  'title' => 'Oil Splattering and Popping Violently During Tadka (Tempering)',
  'category' => 'General Cooking Problems',
  'dishes' => 
  array (
    0 => 'Tomato Pappu',
    1 => 'Coconut Chutney',
    2 => 'Sambar',
    3 => 'Curd Rice',
  ),
  'keywords' => 
  array (
    0 => 'oil splattering',
    1 => 'tadka popping',
    2 => 'hot oil splash',
    3 => 'popu chinduthundi',
    4 => 'oil burn safety',
  ),
  'symptoms' => 'Hot oil erupts and splatters across the stovetop, arms, and face when spices or curry leaves are added.',
  'severity' => 'Moderate',
  'causes' => 
  array (
    0 => 'Curry leaves, mustard seeds, or ginger were wet with water droplets when dropped into superheated oil.',
  ),
  'immediate_steps' => 
  array (
    0 => 'USE THE LID SHIELD: Immediately hold a pan lid at a 45-degree angle between the pan and your body as a protective shield.',
    1 => 'Move pan off heat: Lift the tadka pan off the flame for 10 seconds to allow the oil temperature to drop slightly.',
    2 => 'Add a pinch of salt / turmeric: Sprinkle a tiny pinch of salt or turmeric powder into the hot oil—salt absorbs micro-moisture and stabilizes sizzling.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Cold Start Curry Leaves',
      'suitability' => 'Next tadka.',
      'action' => 'Add wet curry leaves while oil is still warming up, not smoking hot.',
      'limitations' => 'Must monitor so leaves do not burn.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Pan lid as protective shield',
      1 => 'Tongs',
    ),
    'optional' => 
    array (
      0 => 'Pinch of salt or turmeric',
      1 => 'Kitchen towel',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'NEVER throw water into splattering oil—water instantly flash-boils into steam, creating a dangerous explosive fireball of hot oil droplets!',
    1 => 'Do not stand directly over a smoking hot tadka pan.',
  ),
  'prevention' => 
  array (
    0 => 'ALWAYS pat washed curry leaves, green chillies, and ginger thoroughly dry with a clean cotton kitchen towel before dropping into hot oil.',
    1 => 'Slit green chillies lengthwise with a knife before frying—whole closed chillies trap steam and explode in hot oil like firecrackers.',
  ),
  'science' => 'Water boils at 100°C, while cooking oil heats up to 180°C-200°C. When water droplets enter hot oil, they sink (higher density) and instantly vaporize into steam bubbles. As the gas expands violently, it ruptures the oil surface, ejecting hot aerosolized oil droplets.',
  'related_recipe_ids' => 
  array (
    0 => 'simple-comfort-dal',
    1 => 'andhra-tomato-rasam',
    2 => 'tempered-curd-rice',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
    1 => 'lesson-201',
  ),
)        ,
        'milk-boiled-over-scorched' => array (
  'id' => 'milk-boiled-over-scorched',
  'title' => 'Milk Boiled Over and Scorched on the Burner / Pot Base',
  'category' => 'General Cooking Problems',
  'dishes' => 
  array (
    0 => 'Filter Coffee',
    1 => 'Masala Chai',
    2 => 'Payasam',
    3 => 'Kheer',
  ),
  'keywords' => 
  array (
    0 => 'milk boiled over',
    1 => 'milk spill',
    2 => 'scorched milk',
    3 => 'paalu pongipoyayi',
    4 => 'burnt milk',
  ),
  'symptoms' => 'Milk rose in seconds, overflowed the pot onto the stove, and left a burnt skin at the base of the saucepan.',
  'severity' => 'Minor',
  'causes' => 
  array (
    0 => 'Cooking milk on high flame without watching.',
    1 => 'Surface protein-fat skin trapping boiling steam underneath until explosive eruption.',
  ),
  'immediate_steps' => 
  array (
    0 => 'Transfer immediately: Pour the unburnt top milk into a clean fresh vessel immediately without scraping the bottom of the scorched pot.',
    1 => 'Check taste: Taste a spoonful; if milk tastes fresh with no burnt flavor, use normally for chai, coffee, or payasam.',
    2 => 'If faint scorch taste: Add 2 crushed green cardamom pods or 1/4 tsp pure cinnamon powder; the warm spices effectively mask subtle scorch notes in tea or kheer.',
  ),
  'alternatives' => 
  array (
    0 => 
    array (
      'name' => 'Convert to Homemade Paneer / Chhena',
      'suitability' => 'If milk has mild scorch aroma.',
      'action' => 'Bring to a boil, add 1 tbsp lemon juice or vinegar to curdle, drain whey, and rinse curd with cold water to make fresh paneer.',
      'limitations' => 'Transforms milk into fresh cheese.',
    ),
  ),
  'items_needed' => 
  array (
    'required' => 
    array (
      0 => 'Clean vessel',
      1 => 'Spoon',
    ),
    'optional' => 
    array (
      0 => 'Cardamom pods',
      1 => 'Lemon juice for paneer',
    ),
  ),
  'what_not_to_do' => 
  array (
    0 => 'Do not scrape the bottom of the pot with a metal spoon—burnt milk skin dissolves into bitter brown flecks.',
    1 => 'Never leave milk unattended on medium-high flame.',
  ),
  'prevention' => 
  array (
    0 => 'THE WOODEN SPOON ACROSS THE RIM TRICK: Lay a long wooden spoon or spatula flat across the top rim of the saucepan. When rising milk foam touches the cool dry wood, the bubbles pop and break, preventing overflow.',
    1 => 'Rinse the saucepan with cold water first before pouring milk in—the thin water layer delays milk solids from baking onto the metal base.',
  ),
  'science' => 'Milk contains whey proteins (beta-lactoglobulin) that coagulate and form a skin on top as water evaporates. Steam bubbles from boiling underneath cannot escape the flexible skin, building pressure until the entire foam column rises exponentially and spills over.',
  'related_recipe_ids' => 
  array (
    0 => 'south-indian-filter-coffee',
    1 => 'kadak-masala-chai',
    2 => 'semiya-payasam-kheer',
  ),
  'related_lesson_ids' => 
  array (
    0 => 'lesson-101',
  ),
)
    ];
}

if (!function_exists('get_rescue_categories')) {
function get_rescue_categories(): array {
    return [
        'Curries and Gravies' => [
            'icon' => '🍲',
            'desc' => 'Too salty, too spicy, watery gravies, curdled dairy, and burnt bottoms.'
        ],
        'Rice and Biryani' => [
            'icon' => '🍚',
            'desc' => 'Mushy grains, hard undercooked centers, dry dum, and scorched bases.'
        ],
        'Roti, Chapati, and Paratha' => [
            'icon' => '🫓',
            'desc' => 'Hard dry chapatis, flat rotis that will not puff, and sticky dough.'
        ],
        'Dosa, Idli, and Fermented Foods' => [
            'icon' => '🥞',
            'desc' => 'Batter failing to ferment, dosa sticking to pan, and rock-hard idlis.'
        ],
        'Cakes and Baking' => [
            'icon' => '🍰',
            'desc' => 'Sunken centers, dense rubbery cakes, and spreading puddle cookies.'
        ],
        'Indian Sweets and Desserts' => [
            'icon' => '🍨',
            'desc' => 'Crystallized sugar syrup, cracked jamuns, and solid kheer.'
        ],
        'Snacks and Fried Foods' => [
            'icon' => '🥟',
            'desc' => 'Oily soggy pakodis, snacks sticking to skillet, and loss of crunch.'
        ],
        'Dal, Sambar, and Rasam' => [
            'icon' => '🥣',
            'desc' => 'Hard lentils, sour sambar, thin watery rasam, and over-salted dals.'
        ],
        'Vegetables and Side Dishes' => [
            'icon' => '🥕',
            'desc' => 'Overcooked limp veggies, discolored greens, and scorching.'
        ]
    ];
}
}

if (!function_exists('find_rescue_by_id')) {
function find_rescue_by_id(string $id): ?array {
    $kb = function_exists('get_rescue_entries') ? get_rescue_entries() : get_rescue_knowledge_base();
    foreach ($kb as $item) {
        if (isset($item['id']) && strtolower(trim($item['id'])) === strtolower(trim($id))) {
            return $item;
        }
    }
    return $kb[$id] ?? null;
}
}

