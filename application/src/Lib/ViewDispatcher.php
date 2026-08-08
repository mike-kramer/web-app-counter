<?php

namespace App\Lib;

class ViewDispatcher
{
    readonly private string $viewDir;
    private static self $instance;

    private function __construct()
    {
        $this->viewDir = dirname($_SERVER["SCRIPT_FILENAME"], 2) . "/views/";
    }

    private function __clone()
    {

    }

    public static function getInstance(): self
    {
        self::$instance ??= new self();
        return self::$instance;
    }

    public function render(string $viewName, array $params = []): void
    {
        extract($params);
        require $this->viewDir . $viewName . ".php";
    }
}