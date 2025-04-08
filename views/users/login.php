<?php
// views/users/login.php
$title = "Login";
ob_start();
?>
<div class="auth-container">
    <h2>Login</h2>

    <form action="index.php?action=process_login" method="POST" class="auth-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-submit">Login</button>
        </div>
    </form>

    <p class="auth-link">Belum punya akun? <a href="index.php?action=register">Register</a></p>
</div>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>

/**
 * 12. USER VIEWS - REGISTER
 * File: views/users/register.php
 * Fungsi: Form untuk registrasi
 */
<?php