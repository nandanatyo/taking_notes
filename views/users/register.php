<?php

$title = "Register";
ob_start();
?>
<div class="auth-container">
    <h2>Register</h2>

    <form action="index.php?action=process_register" method="POST" class="auth-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-submit">Register</button>
        </div>
    </form>

    <p class="auth-link">Sudah punya akun? <a href="index.php?action=login">Login</a></p>
</div>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>