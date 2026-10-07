<?php include_once __DIR__ . '/data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($store['name']) ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="top">
  <a class="brand" href="index.php">
    <img src="<?= e($store['logo']) ?>" alt="Logo" onerror="this.style.display='none'">
    <span><?= e($store['name']) ?></span>
  </a>
  <?php if (isset($_SESSION['user'])): ?>
  <nav>
    <a href="index.php">Order</a>
    <a href="feedback.php">Feedback</a>
    <a href="logout.php">Logout (<?= e($_SESSION['user']) ?>)</a>
  </nav>
  <?php endif; ?>
</header>
<main>
