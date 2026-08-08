<?php
namespace App\Lib;
readonly class FrontController
{
    public function __construct(private array $routes)
    {

    }

    public function run(): void
    {
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $found = false;
        foreach ($this->routes as $pathDef => $handler) {
            [$method, $routePath] = explode(" ", $pathDef);
            if ($method === $_SERVER['REQUEST_METHOD'] && $routePath === $path) {
                $found = true;
                [$controller, $action] = $handler;
                if (!class_exists($controller) || !method_exists($controller, $action)) {
                    header("HTTP/1.0 404 Not Found");
                    exit();
                }
                $controller = new $controller();
                $controller->$action();
            }
        }
        if (!$found) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    }

}