<?php

namespace Controller;

use Attributes\Route;

class HomeController
{

    #[Route("GET", "/")]
    public function home() {
        return '<h1>Root route</h1>';
    }

    #[Route("GET", "/second")]
    public function second() {
        return '<h4>Second</h4>';
    }

}