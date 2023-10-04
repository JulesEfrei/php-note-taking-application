<?php

namespace Controller;

use Attributes\Route;
use Entity\Entity;
use View\Render;

class HomeController
{

    #[Route("GET", "/")]
    public function home()
    {
        if (empty($_SESSION["email"])) {
            header("Location: /login");
            die();
        }

        Render::render("home");
    }

    #[Route("GET", "/s")]
    public function second()
    {
        return "<p>Test HTMX</p>";
    }

}