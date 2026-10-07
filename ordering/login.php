<?php
session_start();
include 'includes/data.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';
    if (isset($accounts[$u]) && $accounts[$u] === $p) {
        $_SESSION['user'] = $u;           // session keeps the customer logged in
        header('Location: index.php');
        exit;
    }
    $error = 'Wrong username or password.';
}
if (isset($_GET['loggedout'])) $error = 'You have been logged out.';
include 'includes/header.php';
?>
<section class="card narrow">
  <h2>Customer Login</h2>
  <?php if ($error): ?><p class="notice"><?= e($error) ?></p><?php endif; ?>
  <form method="post">
    <label>Username <input name="username" required></label>
    <label>Password <input type="password" name="password" required></label>
    <button>Log in</button>
  </form>
  <p class="hint">Demo account: <b>customer</b> / <b>1234</b></p>
</section>
<?php include 'includes/footer.php'; ?>
