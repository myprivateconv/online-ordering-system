<?php
include 'includes/auth.php';
include 'includes/header.php';
// Cookie remembers the customer's details from the last order
$c = fn($k) => e($_COOKIE[$k] ?? '');
?>
<section class="card">
  <h2>Welcome to <?= e($store['name']) ?></h2>
  <p><?= e($store['description']) ?></p>
  <p class="hint"><b>Owners/Group Members:</b> <?= e(implode(', ', $members)) ?></p>
</section>

<?php if (!empty($_GET['error'])): ?>
  <p class="notice"><?= e($_GET['error']) ?></p>
<?php endif; ?>

<form method="post" action="receipt.php">
  <h2>Our Products</h2>
  <div class="grid">
    <?php foreach ($products as $p): ?>
    <article class="card product">
      <div class="img"><img src="<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>" onerror="this.style.display='none'"></div>
      <h3><?= e($p['name']) ?></h3>
      <p class="price">&#8369;<?= number_format($p['price'], 2) ?></p>
      <p><?= e($p['desc']) ?></p>
      <label>Quantity
        <input type="number" name="qty[<?= (int)$p['id'] ?>]" min="0" max="99" value="0">
      </label>
    </article>
    <?php endforeach; ?>
  </div>

  <section class="card">
    <h2>Customer Information</h2>
    <label>Customer Name <input name="name" value="<?= $c('cust_name') ?>" required></label>
    <label>Contact Number <input name="contact" value="<?= $c('cust_contact') ?>" pattern="[0-9+ \-]{7,15}" required></label>
    <label>Address <textarea name="address" rows="2" required><?= $c('cust_address') ?></textarea></label>
    <button>Place Order</button>
  </section>
</form>
<?php include 'includes/footer.php'; ?>
