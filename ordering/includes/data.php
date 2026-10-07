<?php
// ===== EDIT THIS FILE: store info, members, products =====
$store = [
    'name'        => 'Sweet Crumbs Bakery',
    'logo'        => 'images/logo.jfif',
    'description' => 'Freshly baked goodies made by our TLE Baking group. Order online and pick up fresh!',
];

$members = ['Enrico James Jacob', 'Carl Simone Santos', 'Zian Gabriel Villaplaza', 'Prince Dayniel Macaya'];

// Demo accounts only (school project). Do NOT use real passwords.
$accounts = ['customer' => '1234', 'student' => 'tle2026'];

// Products stored in an array. Put pictures inside the images/ folder.
$products = [
    ['id' => 1, 'name' => 'Pandesal (6 pcs)', 'price' => 30.00, 'image' => 'images/pandesal.jpg',
     'desc' => 'Soft, warm bread rolls baked every morning.'],
    ['id' => 2, 'name' => 'Muffin',     'price' => 25.00, 'image' => 'images/muffins.jpg',
     'desc' => 'Moist chocolate muffin with chocolate chips.'],
    ['id' => 3, 'name' => 'Ensaymada',        'price' => 35.00, 'image' => 'images/ensaymada.jpg',
     'desc' => 'Buttery brioche topped with sugar and cheese.'],
    ['id' => 4, 'name' => 'Banana Bread',     'price' => 80.00, 'image' => 'images/banana_bread.jpg',
     'desc' => 'Homemade banana loaf, sweet and soft.'],
];

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
