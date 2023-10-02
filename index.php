<?php

require_once('vendor/autoload.php');

/*
 * Autoload classes
 * We only need to import classes inside "/src" so don't need to create our Autolaod class.
 */
spl_autoload_register(function ($class_name) {
    require "src/" . str_replace("\\", "/", $class_name) . '.php';
});

use Controller\HomeController;

$controllers = [
    HomeController::class
];

function router(array $controllers)
{
    foreach ($controllers as $handler) {
        try {
            $reflection = new ReflectionClass($handler);

            if ($reflection === null) {
                return "Error";
            }

            $methods = array_filter($reflection->getMethods(ReflectionMethod::IS_PUBLIC), function (ReflectionMethod $method) {
                return $method->getAttributes(\Attributes\Route::class);
            });

            foreach ($methods as $method) {
                $attribute = $method->getAttributes(\Attributes\Route::class)[0];
                if ($attribute->getArguments()[0] === $_SERVER['REQUEST_METHOD']) {
                    if ($attribute->getArguments()[1] === $_SERVER['REQUEST_URI']) {
                        $methodName = $method->getName();
                        return (new $handler)->$methodName();
                    }
                }
            }

        } catch (ReflectionException $e) {
            //Show Error page
            return "Error";
        }
    }

    return "Error 404: Page not found";
}

$response = router($controllers);

echo $response;