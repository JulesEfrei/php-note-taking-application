<?php

namespace Controller;

use Attributes\Route;
use View\Render;

class HomeController
{

    #[Route("GET", "/")]
    public function home() {
        Render::render("home");
    }

    #[Route("GET", "/s")]
    public function second() {
        return "<p>Test HTMX</p>";
    }

}