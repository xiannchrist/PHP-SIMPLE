<?php
$currentPage = $currentPage ?? 'home';
$pageTitle = $pageTitle ?? 'PHP Output No. 2';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="shell">
        <header class="hero">
            <p class="eyebrow">PHP Output No. 2</p>
            <h1>Multi-Page PHP Website</h1>
            <p class="lead">This output uses <code>require</code> to reuse layout files and custom CSS for styling.</p>
            <nav class="nav">
                <a class="<?php echo $currentPage === 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
                <a class="<?php echo $currentPage === 'register' ? 'active' : ''; ?>" href="register.php">Register</a>
                <a class="<?php echo $currentPage === 'login' ? 'active' : ''; ?>" href="login.php">Login</a>
                <a class="<?php echo $currentPage === 'forgot-password' ? 'active' : ''; ?>" href="forgot-password.php">Forgot Password</a>
            </nav>
        </header>
        <main class="card">
