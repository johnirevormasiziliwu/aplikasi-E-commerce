<?php

namespace App\Http\Controllers;

class HomeController extends PwlBaseController
{
    public function home()
    {
        return view('dashboard/home');
    }
}
