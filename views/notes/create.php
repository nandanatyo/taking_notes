<?php

$title = "Buat Catatan Baru";
ob_start();
?>
<h2>Buat Catatan Baru</h2>

<form action="index.php?action=store_note" method="POST" class="note-form">
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="content">Isi Catatan</label>
        <textarea id="content" name="content" rows="10" required></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-submit">Simpan Catatan</button>
        <a href="index.php?action=notes" class="btn btn-cancel">Batal</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>