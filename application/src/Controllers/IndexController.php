<?php

namespace App\Controllers;

use App\Lib\ViewDispatcher;
use App\Models\User;

class IndexController
{
    public function index()
    {
        if (!isset($_SESSION["userId"])) {
            header("Location: /login");
            return;
        }
        $user = User::findById($_SESSION["userId"]);
        ViewDispatcher::getInstance()->render("index", [
            "user" => $user
        ]);
    }
}