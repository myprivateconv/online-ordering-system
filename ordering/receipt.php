<?php
include 'includes/auth.php';
include 'includes/data.php';

// Only accept orders submitted with POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php'); exit;
}

$name    = trim($_POST['name'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$address = trim($_POST['address'] ?? '');
$qty     = $_POST['qty'] ?? [];

$items = []; $total = 0;
foreach ($products as $p) {
    $q = (int)($qty[$p['id']] ?? 0);
    if ($q > 0) {
        $sub = $q * $p['price'];
        $items[] = ['name' => $p['name'], 'price' => $p['price'], 'qty' => $q, 'sub' => $sub];
        $total += $sub;
    }
}

if ($name === '' || $contact === '' || $address === '') {
    header('Location: index.php?error=' . urlencode('Please complete your customer information.')); exit;
}
if (!$items) {
    header('Location: index.php?error=' . urlencode('Please enter a quantity for at least one product.')); exit;
}

// Cookies: remember customer details for 7 days
$exp = time() + 7 * 24 * 60 * 60;
setcookie('cust_name', $name, $exp);
setcookie('cust_contact', $contact, $exp);
setcookie('cust_address', $address, $exp);

$_SESSION['last_name'] = $name;
$orderNo = 'ORD-' . date('ymdHis');
include 'includes/header.php';
?>
<section class="card receipt">
  <h2>Order Summary / Receipt</h2>
  <p><b><?= e($store['name']) ?></b><br>
     Order No: <?= e($orderNo) ?><br>
     Date &amp; Time: <?= date('F d, Y - h:i:s A') ?></p>
  <p><b>Customer:</b> <?= e($name) ?><br>
     <b>Contact:</b> <?= e($contact) ?><br>
     <b>Address:</b> <?= e($address) ?></p>

  <table>
    <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
    <?php foreach ($items as $i): ?>
    <tr>
      <td><?= e($i['name']) ?></td>
      <td><?= $i['qty'] ?></td>
      <td>&#8369;<?= number_format($i['price'], 2) ?></td>
      <td>&#8369;<?= number_format($i['sub'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
    <tr class="total"><td colspan="3">TOTAL AMOUNT</td><td>&#8369;<?= number_format($total, 2) ?></td></tr>
  </table>

  <p>Thank you for ordering, <?= e($name) ?>!</p>
  <a class="btn" href="index.php">New Order</a>
  <a class="btn alt" href="feedback.php?name=<?= urlencode($name) ?>">Give Feedback</a>
</section>
<?php include 'includes/footer.php'; ?>
