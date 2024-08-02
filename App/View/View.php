<?php

namespace App\View;

class View
{
    public static function show($view): void
    {
        $path = __DIR__ . "/../../views/pages/$view.view.php";

        if(file_exists($path)) {

            include $path;
        } else {
            echo "Страница не надена";
        }
    }
    public static function component($component): void
    {
        $path = __DIR__ . "/../../views/components/$component.component.php";
        if(file_exists($path)) {

            include $path;
        } else {
            echo "Компонент не найден";
        }
    }
}