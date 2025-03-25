<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Role.php';

class AuthController
{
    private $user;
    private $role;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->user = new User($pdo);
        $this->role = new Role($pdo);
    }

    public function loginForm()
    {
        session_start();
        var_dump($_SESSION['user']);
        require_once __DIR__ . '/../view/auth/login.php';
    }

    public function login()
    {
        $nis = $_POST['nis'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->user->getByNis($nis);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            $role = $this->role->getById($user['role_id']);
            if ($role['name'] === 'admin') {
                header('Location: /admin');
                exit;
            }
            header('Location: /');
            exit;
        } else {
            $error = "Username atau password salah!";
            require_once __DIR__ . '/../view/auth/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
