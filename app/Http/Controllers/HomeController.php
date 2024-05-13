<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->take(3)->get();
        $categories = Category::with('subcategory')->whereNull('parent_id')->get();
        return view('welcome', compact('categories','banners'));
    }
}
