<?php
$currentPage = 'home';
$pageTitle = 'Home | PHP Output No. 2';
require __DIR__ . '/includes/header.php';
?>
<section class="stack">
    <h2>Home Page</h2>
    <p>This project is the required Output #2 with separate web pages for Home, Register, Login, and Forgot Password.</p>
    <div class="grid two">
        <article class="mini-card">
            <h3>Reusable PHP</h3>
            <p>The header and footer are loaded with <code>require</code> so the layout is shared across all pages.</p>
        </article>
        <article class="mini-card">
            <h3>Styled Interface</h3>
            <p>The design is styled with a dedicated CSS file to keep the output neat and presentable.</p>
        </article>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
