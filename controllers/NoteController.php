<?php
// controllers/NoteController.php
class NoteController {
    private $db;
    private $note;

    public function __construct() {
        // Database connection
        require_once 'config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();

        // Note model
        require_once 'models/Note.php';
        $this->note = new Note($this->db);
    }

    // Display all notes
    public function index() {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $result = $this->note->readUserNotes($user_id);
        $notes = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $notes[] = $row;
        }

        include 'views/notes/index.php';
    }

    // Display create note form
    public function create() {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        include 'views/notes/create.php';
    }

    // Store new note
    public function store() {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && isset($_POST['content'])) {
            $this->note->title = $_POST['title'];
            $this->note->content = $_POST['content'];
            $this->note->user_id = $_SESSION['user_id'];

            if($this->note->create()) {
                header("Location: index.php?action=notes");
                exit;
            } else {
                $error = "Ada masalah saat membuat catatan.";
                include 'views/notes/create.php';
            }
        } else {
            header("Location: index.php?action=create_note");
        }
    }

    // Display single note
    public function show($id) {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->note->id = $id;
        if($this->note->readOne()) {
            // Verify owner
            if($this->note->user_id != $_SESSION['user_id']) {
                header("Location: index.php?action=notes");
                exit;
            }
            include 'views/notes/view.php';
        } else {
            include 'views/404.php';
        }
    }

    // Display edit note form
    public function edit($id) {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->note->id = $id;
        if($this->note->readOne()) {
            // Verify owner
            if($this->note->user_id != $_SESSION['user_id']) {
                header("Location: index.php?action=notes");
                exit;
            }
            include 'views/notes/edit.php';
        } else {
            include 'views/404.php';
        }
    }

    // Update note
    public function update($id) {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && isset($_POST['content'])) {
            $this->note->id = $id;

            // Verify owner
            if(!$this->note->readOne() || $this->note->user_id != $_SESSION['user_id']) {
                header("Location: index.php?action=notes");
                exit;
            }

            $this->note->title = $_POST['title'];
            $this->note->content = $_POST['content'];

            if($this->note->update()) {
                header("Location: index.php?action=show_note&id=$id");
                exit;
            } else {
                $error = "Ada masalah saat update catatan.";
                include 'views/notes/edit.php';
            }
        } else {
            header("Location: index.php?action=edit_note&id=$id");
        }
    }

    // Delete note
    public function delete($id) {
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->note->id = $id;

        // Verify owner
        if(!$this->note->readOne() || $this->note->user_id != $_SESSION['user_id']) {
            header("Location: index.php?action=notes");
            exit;
        }

        if($this->note->delete()) {
            header("Location: index.php?action=notes");
            exit;
        } else {
            $error = "Ada masalah saat menghapus catatan.";
            header("Location: index.php?action=show_note&id=$id");
        }
    }
}
?>