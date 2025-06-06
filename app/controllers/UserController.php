<?php
require_once dirname(__DIR__) . '/models/User.php';

class UserController {
    private $model;

    public function __construct() {
        session_start();
        $this->model = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->model->register($username, $password)) {
                header('Location: index.php?controller=user&action=login');
                exit;
            } else {
                $_SESSION['register_error'] = "Greška pri registraciji. Korisničko ime možda već postoji.";
            }
        }

        include __DIR__ . '/../views/user/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->login($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=image&action=index');
                exit;
            } else {
                $_SESSION['login_error'] = "Pogrešno korisničko ime ili lozinka.";
            }
        }

        include __DIR__ . '/../views/user/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=user&action=login');
        exit;
    }
}
