<?php

namespace App\Http\Controllers\alam24;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Alam24Controller extends Controller
{
    public function index($page)
    {
        return view('alam24.'.$page);
    }

    
}
