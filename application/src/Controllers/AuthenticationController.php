<?php

namespace App\Controllers;

use App\Lib\ViewDispatcher;
use App\Models\User;

class AuthenticationController
{
    public function regFrom()
    {
        ViewDispatcher::getInstance()->render("regForm");
    }

    public function register()
    {
        $user = User::create($_POST["login"], $_POST["password"]);
        $_SESSION["msg"] = "User created";
        header("Location: /login");
    }

    public function loginFrom()
    {
        $msg = $_SESSION["msg"] ?? null;
        $error = $_SESSION["error"] ?? null;
        unset($_SESSION["msg"]);
        unset($_SESSION["error"]);
        ViewDispatcher::getInstance()->render("loginForm", [
            "msg" => $msg,
            "error" => $error
        ]);
    }

    public function login()
    {
        try {
            $user = User::findByLogin($_POST["login"]);
            $_SESSION["userId"] = $user->id;
            header("Location: /");
        } catch (\Exception $e) {
            $_SESSION["error"] = "Invalid credentials";
            header("Location: /login");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}