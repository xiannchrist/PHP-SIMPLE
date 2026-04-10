<?php
$currentPage = 'login';
$pageTitle = 'Login | PHP Output No. 2';
require __DIR__ . '/includes/header.php';
?>
<section class="stack">
    <h2>Login</h2>
    <form class="form-grid compact" method="post" action="#">
        <label>
            Email Address
            <input type="email" name="email" placeholder="Enter your email">
        </label>
        <label>
            Password
            <input type="password" name="password" placeholder="Enter your password">
        </label>
        <div class="actions">
            <button type="submit">Login</button>
            <a class="text-link" href="forgot-password.php">Forgot your password?</a>
        </div>
    </form>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
