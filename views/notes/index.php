<?php

$title = "Catatan Saya";
ob_start();
?>
<h2>Catatan Saya</h2>

<div class="notes-container">
    <?php if(empty($notes)): ?>
        <p>Belum ada catatan. <a href="index.php?action=create_note">Buat catatan baru</a>.</p>
    <?php else: ?>
        <div class="notes-grid">
            <?php foreach($notes as $note): ?>
                <div class="note-card">
                    <h3><a href="index.php?action=show_note&id=<?= $note['id'] ?>"><?= $note['title'] ?></a></h3>
                    <p class="note-excerpt"><?= substr($note['content'], 0, 100) . (strlen($note['content']) > 100 ? '...' : '') ?></p>
                    <div class="note-meta">
                        <span class="note-date">Dibuat: <?= date('d M Y', strtotime($note['created_at'])) ?></span>
                        <div class="note-actions">
                            <a href="index.php?action=edit_note&id=<?= $note['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="index.php?action=delete_note&id=<?= $note['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include 'views/layouts/main.php';
?>

/**
 * 8. NOTES VIEW - CREATE FORM
 * File: views/notes/create.php
 * Fungsi: Form untuk membuat catatan baru
 */
<?php