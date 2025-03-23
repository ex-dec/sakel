<?php
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Role.php';

class UserController
{
    private $user;
    private $role;

    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }

    public function index()
    {
        $data = $this->user->getAll();
        include __DIR__ . '/../view/user/index.php';
    }

    public function create()
    {
        $roles = $this->role->getAll();
        include __DIR__ . '/../view/user/create.php';
    }

    public function store()
    {
        $this->user->create($_POST);
        header('Location: index.php');
    }

    public function edit($id)
    {
        $user = $this->user->getById($id);
        $roles = $this->role->getAll();
        include __DIR__ . '/../view/user/edit.php';
    }

    public function update($id)
    {
        $this->user->update($id, $_POST);
        header('Location: index.php');
    }

    public function delete($id)
    {
        $this->user->delete($id);
        header('Location: index.php');
    }
}
