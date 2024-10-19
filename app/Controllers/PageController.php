<?php

namespace App\Controllers;
use App\Application\Views\View;

class PageController
{
    public function home(): void
    {
        View::show('pages/home', [
            'title' => 'My Framework'
        ]);
    }
}