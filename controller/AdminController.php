<?php

require_once __DIR__ . '/../helper/auth.php';

class AdminController
{
    public function dashboard()
    {
        require_once __DIR__ . '/../view/admin/dashboard.php';
    }
}
