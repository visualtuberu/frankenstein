<?php

namespace App\Controllers;
use App\View\View;

class PagesController
{

    public function index(): void
    {
        View::show('home');
    }
    public function home(): void
    {
        View::show('home');
    }

    public function about(): void
    {

        View::show('about');
    }
    public function change(): void
    {
        View::show('change');
    }
}