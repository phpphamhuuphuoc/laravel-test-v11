<?php

use App\Http\Controllers\Frontend\FormController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LandingController;
use App\Http\Controllers\Frontend\NewsController;

function dispatchPage($page) {
    $templateTitle = $page->template->title;
    switch ($templateTitle) {
        case 'home':
            $controller = new HomeController($page);
            return app()->call([$controller, 'index']);
            break;
        case 'landing':
            $controller = new LandingController($page);
            return app()->call([$controller, 'index']);
            break;
        case 'news/index':
            $controller = new NewsController($page);
            return app()->call([$controller, 'index']);
            break;
        case 'form':
            $controller = new FormController($page);
            return app()->call([$controller, 'index']);
            break;
        default:
            abort(404); 
            break;
    }
}