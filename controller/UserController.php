<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Role.php';

class UserController
{
    private $user;
    private $role;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->user = new User($pdo);
        $this->role = new Role($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function index()
    {
        $data = $this->user->getAll();
        include __DIR__ . '/../view/user/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../view/user/create.php';
    }

    public function store()
    {
        $role = $this->role->getByName('user');
        $_POST['role_id'] = $role['id'];
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->user->create($_POST);
        header('Location: /');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = $this->user->getById($id);
        include __DIR__ . '/../view/user/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $this->user->update($id, $_POST);
        header('Location: /');
    }

    public function delete()
    {
        $this->user->delete($_POST['id']);
        header('Location: index.php');
    }
    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
