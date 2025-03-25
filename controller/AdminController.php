<?php

require_once __DIR__ . '/../helper/auth.php';

class AdminController
{
    private $active;
    public function __construct()
    {
        if (!isAuthenticated()) {
            header('Location: /login');
            exit;
        }
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function dashboard()
    {
        require_once __DIR__ . '/../view/admin/dashboard.php';
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
