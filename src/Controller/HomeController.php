<?php

namespace Controller;

use Attributes\Route;
use Entity\DatabaseConnection;

class HomeController
{

    #[Route("GET", "/")]
    public function home() {
        return '<h1>Home route</h1>';
    }

    #[Route("GET", "/s")]
    public function second() {
        $db = new DatabaseConnection();
        $db->connect();
        dump($db->query("SELECT version()"));
        return "DEDE";
    }

}