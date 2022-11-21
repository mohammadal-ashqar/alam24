<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FastNews;
use App\Models\News;
use App\Models\poster;
use App\Models\poster_adress;
use App\Models\User;

class AdminController extends Controller
{


    public function index()
    {

        $news = News::count();
        $fast_news = FastNews::count();
        $poster = poster::count();
        $categories = Category::count();
        $users = User::count();
        $poster_adress=poster_adress::count();

        return view('admin.index', compact('news', 'fast_news',   'poster',  'categories',    'users', 'poster_adress'));
    }
}
