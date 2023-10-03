<?php

namespace Controller;

use Attributes\Route;
use View\Render;

class AuthController {

    #[Route("GET", "/login")]
    public function login() {
        Render::render("auth", ["mode" => "login"]);
    }

    #[Route("GET", "/register")]
    public function register() {
        Render::render("auth", ["mode" => "register"]);
    }

}