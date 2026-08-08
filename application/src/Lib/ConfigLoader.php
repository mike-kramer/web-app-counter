<?php
class ConfigLoader {
    public static function loadEnv(): void
    {
        $envDir = dirname($_SERVER["SCRIPT_FILENAME"], 2);
        if (!file_exists($envDir . "/.env")) {
            return;
        }
        $lines = file($envDir . "/.env");
        foreach ($lines as $line) {
            if (strpos($line, "=") !== false) {
                [$key, $value] = explode("=", $line);
                $key = trim($key);
                $value = trim($value);
                $_ENV[$key] = $value;
            }
        }
    }
}