<?php
include 'includes/auth.php';
include 'includes/data.php';

$done = false; $errors = [];
// GET passes the name from the receipt page into the form
$prefill = $_GET['name'] ?? ($_SESSION['last_name'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname   = trim($_POST['name'] ?? '');
    $rating  = (int)($_POST['rating'] ?? 0);
    $comment = trim($_POST['comments'] ?? '');
    if ($fname === '') $errors[] = 'Please enter your name.';
    if ($rating < 1 || $rating > 5) $errors[] = 'Please choose a rating.';
    if (!$errors) {
        $line = date('Y-m-d H:i:s') . ' | ' . str_replace('|', '/', $fname) . ' | ' . $rating . '/5 | '
              . str_replace(["\r", "\n", '|'], ' ', $comment) . PHP_EOL;
        file_put_contents(__DIR__ . '/feedback.txt', $line, FILE_APPEND | LOCK_EX);
        $done = true;
    }
}
include 'includes/header.php';
?>
<section class="card narrow">
  <h2>Customer Feedback</h2>
  <?php if ($done): ?>
    <p class="ok">Thank you, <?= e($fname) ?>! You rated us <?= $rating ?>/5 &#9733;</p>
    <p><i><?= e($comment) ?></i></p>
    <a class="btn" href="index.php">Back to Menu</a>
  <?php else: ?>
    <?php foreach ($errors as $er): ?><p class="notice"><?= e($er) ?></p><?php endforeach; ?>
    <form method="post">
      <label>Name <input name="name" value="<?= e($prefill) ?>" required></label>
      <label>Rating
        <select name="rating" required>
          <option value="">-- Select --</option>
          <?php for ($i = 5; $i >= 1; $i--): ?>
            <option value="<?= $i ?>"><?= $i ?> - <?= str_repeat('★', $i) ?></option>
          <?php endfor; ?>
        </select>
      </label>
      <label>Comments / Suggestions <textarea name="comments" rows="4"></textarea></label>
      <button>Submit Feedback</button>
    </form>
  <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
