<?php

$title = $this->note->title;
ob_start();
?>
<div class="note-single">
    <h2><?= $this->note->title ?></h2>

    <div class="note-meta">
        <p class="note-date">
            Dibuat: <?= date('d M Y H:i', strtotime($this->note->created_at)) ?>
            <?php if($this->note->updated_at): ?>
                | Diupdate: <?= date('d M Y H:i', strtotime($this->note->updated_at)) ?>
            <?php endif; ?>
        </p>
    </div>

    <div class="note-content">
        <?= nl2br($this->note->content) ?>
    </div>

    <div class="note-actions">
        <a href="index.php?action=notes" class="btn">Kembali</a>
        <a href="index.php?action=edit_note&id=<?= $this->note->id ?>" class="btn btn-edit">Edit</a>
        <a href="index.php?action=delete_note&id=<?= $this->note->id ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>