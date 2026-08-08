<?php
return [
    "GET /" => [\App\Controllers\IndexController::class, "index"],
    "GET /reg" => [\App\Controllers\AuthenticationController::class, "regFrom"],
    "POST /reg" => [\App\Controllers\AuthenticationController::class, "register"],
    "GET /login" => [\App\Controllers\AuthenticationController::class, "loginFrom"],
    "POST /login" => [\App\Controllers\AuthenticationController::class, "login"],
    "POST /inc" => [\App\Controllers\CounterController::class, "inc"],
];
