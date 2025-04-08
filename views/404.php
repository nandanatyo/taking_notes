<?php
// views/404.php
$title = "Halaman Tidak Ditemukan";
ob_start();
?>
<div class="error-container">
    <h2>404 - Halaman Tidak Ditemukan</h2>
    <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
    <a href="index.php" class="btn">Kembali ke Beranda</a>
</div>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>