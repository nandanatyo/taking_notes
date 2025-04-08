<?php
// views/layouts/main.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Taking Notes App" ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Taking Notes App</h1>
            <nav>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <span>Halo, <?= $_SESSION['username'] ?>!</span>
                    <a href="index.php?action=notes">Catatan Saya</a>
                    <a href="index.php?action=create_note">Buat Catatan</a>
                    <a href="index.php?action=logout">Logout</a>
                <?php else: ?>
                    <a href="index.php?action=login">Login</a>
                    <a href="index.php?action=register">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="container">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?= $content ?>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?= date('Y') ?> Taking Notes App - MVC PHP</p>
        </div>
    </footer>

    <script src="public/js/script.js"></script>
</body>
</html>