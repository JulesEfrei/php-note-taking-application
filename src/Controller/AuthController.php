<?php

namespace Controller;

use Attributes\Route;
use Entity\User;
use View\Render;

class AuthController
{

    #[Route("GET", "/login")]
    public function login()
    {
        Render::render("auth", ["mode" => "login"]);
    }

    #[Route("GET", "/register")]
    public function register()
    {
        Render::render("auth", ["mode" => "register"]);
    }

    #[Route("POST", "/login")]
    public function pLogin()
    {
        //if one field is empty
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            Render::render("auth", ["mode" => "login", "error" => true]);
            die();
        }

        $userModel = new User();
        $user = $userModel->findBy(["email" => $_POST["email"]]);

        if(!isset($user)) {
            Render::render("auth", ["mode" => "login", "error" => true]);
            die();
        }

        if(password_verify($_POST["password"], $user[0]["password"])) {
            $_SESSION["email"] = $user[0]["email"];
            header("Location: /");
        } else {
            Render::render("auth", ["mode" => "login", "error" => true]);
            die();
        }
    }

    #[Route("POST", "/register")]
    public function pRegister()
    {
        //if one field is empty
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
            Render::render("auth", ["mode" => "register", "error" => true]);
            die();
        }

        if($_POST["password"] !== $_POST["confirmPassword"]) {
            Render::render("auth", ["mode" => "register", "error" => true]);
            die();
        }

        $userEntity = new User();
        $user = $userEntity
            ->setName($_POST["name"])
            ->setEmail($_POST["email"])
            ->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

        try {
            $userEntity->persist($user);
            $_SESSION["email"] = $user->getEmail();
            header('Location: /');
        } catch (\PDOException $e) {
            Render::render("auth", ["mode" => "register", "error" => true]);
            die();
        }

    }

    #[Route("GET", "/disconnect")]
    public function disconnect() {
        $_SESSION = array();
        header("Location: /login");
    }

}