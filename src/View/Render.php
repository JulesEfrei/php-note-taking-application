<?php

namespace View;

class Render
{

    /*
     * Render view with data associated
     * View -> view to render
     * Data -> Array of variables injected into the view
     *
     * @params $view string
     * @params $data array
     */
    static function render($view, $data = null)
    {
        if ($data !== null) {
            extract($data);
        }

        //Header / Footer toggle
        $activeFH = true;

        require(__DIR__ . '/' . $view . '.php');
    }

}