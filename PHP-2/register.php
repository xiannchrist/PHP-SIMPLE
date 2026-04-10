<?php
$currentPage = 'register';
$pageTitle = 'Register | PHP Output No. 2';
require __DIR__ . '/includes/header.php';
?>
<section class="stack">
    <h2>Register</h2>
    <form class="form-grid" method="post" action="#">
        <label>
            First Name
            <input type="text" name="first_name" placeholder="Enter first name">
        </label>
        <label>
            Last Name
            <input type="text" name="last_name" placeholder="Enter last name">
        </label>
        <label>
            Email Address
            <input type="email" name="email" placeholder="name@example.com">
        </label>
        <label>
            Password
            <input type="password" name="password" placeholder="Create a password">
        </label>
        <div class="actions">
            <button type="submit">Create Account</button>
            <button type="reset" class="secondary">Clear</button>
        </div>
    </form>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
