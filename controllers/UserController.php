<?php

class UserController {
    private $db;
    private $user;

    public function __construct() {

        require_once 'config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();


        require_once 'models/User.php';
        $this->user = new User($this->db);
    }


    public function login() {

        session_start();
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=notes");
            exit;
        }
        include 'views/users/login.php';
    }


    public function processLogin() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $this->user->username = $_POST['username'];
            $this->user->password = $_POST['password'];

            if($this->user->login()) {
                session_start();
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                header("Location: index.php?action=notes");
                exit;
            } else {
                $error = "Username atau password salah!";
                include 'views/users/login.php';
            }
        } else {
            header("Location: index.php?action=login");
        }
    }


    public function register() {

        session_start();
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=notes");
            exit;
        }
        include 'views/users/register.php';
    }


    public function processRegister() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' &&
           isset($_POST['username']) &&
           isset($_POST['password']) &&
           isset($_POST['email'])) {

            $this->user->username = $_POST['username'];


            if($this->user->isUsernameExists()) {
                $error = "Username sudah digunakan!";
                include 'views/users/register.php';
                return;
            }

            $this->user->password = $_POST['password'];
            $this->user->email = $_POST['email'];

            if($this->user->create()) {
                $success = "Akun berhasil dibuat! Silakan login.";
                include 'views/users/login.php';
            } else {
                $error = "Ada masalah saat membuat akun!";
                include 'views/users/register.php';
            }
        } else {
            header("Location: index.php?action=register");
        }
    }


    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>
