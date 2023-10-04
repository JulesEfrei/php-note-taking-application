<?php

$main = "components/authForm";

if (isset($error)) {
    \View\Render::render("components/Modal");
}

require(__DIR__ . "/base.php");