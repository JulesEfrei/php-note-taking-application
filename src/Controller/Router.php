<?php

namespace Controller;

class Router {

    private array $controllers;

    public function __construct(array $controllers) {
        $this->controllers = $controllers;
    }

    public function match() {
        foreach ($this->controllers as $handler) {
            try {
                $reflection = new \ReflectionClass($handler);

                if ($reflection === null) {
                    return "Error";
                }

                $methods = array_filter($reflection->getMethods(\ReflectionMethod::IS_PUBLIC), function (\ReflectionMethod $method) {
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

            } catch (\ReflectionException $e) {
                return "Error";
            }
        }

        return "Error 404: Page not found";
    }

}