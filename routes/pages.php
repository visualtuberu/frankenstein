<?php
use App\Router\Router;
use App\Controllers\PagesController;

Router::page('/', PagesController::class, 'home' );
Router::page('/home', PagesController::class, 'home' );
Router::page('/about', PagesController::class, 'about' );
Router::page('/change', PagesController::class, 'change' );