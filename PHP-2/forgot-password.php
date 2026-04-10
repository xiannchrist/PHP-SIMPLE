<?php
$currentPage = 'forgot-password';
$pageTitle = 'Forgot Password | PHP Output No. 2';
require __DIR__ . '/includes/header.php';
?>
<section class="stack">
    <h2>Forgot Password Page</h2>
    <p>Enter your email address and we will send a password reset link.</p>
    <form class="form-grid compact" method="post" action="#">
        <label>
            Email Address
            <input type="email" name="email" placeholder="Enter your email">
        </label>
        <div class="actions">
            <button type="submit">Send Reset Link</button>
        </div>
    </form>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
