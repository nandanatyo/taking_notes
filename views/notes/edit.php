<?php

$title = "Edit Catatan";
ob_start();
?>
<h2>Edit Catatan</h2>

<form action="index.php?action=update_note&id=<?= $this->note->id ?>" method="POST" class="note-form">
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" id="title" name="title" value="<?= $this->note->title ?>" required>
    </div>

    <div class="form-group">
        <label for="content">Isi Catatan</label>
        <textarea id="content" name="content" rows="10" required><?= $this->note->content ?></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-submit">Update Catatan</button>
        <a href="index.php?action=show_note&id=<?= $this->note->id ?>" class="btn btn-cancel">Batal</a>
    </div>
</form>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>