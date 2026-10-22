<?php
// includes/recipe-data.php - Aggregates complete recipe collection for Amma's Recipe Book

require_once __DIR__ . '/recipe-data-part1.php';
require_once __DIR__ . '/recipe-data-part2.php';

// Merge both sets
$recipes = array_merge($recipes_part1, $recipes_part2);

// Index recipes by ID for ultra fast lookups
$recipes_by_id = [];
foreach ($recipes as $r) {
    if (isset($r['id'])) {
        $recipes_by_id[$r['id']] = $r;
    }
}
