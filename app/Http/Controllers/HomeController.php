<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\OfferBanner;
use App\Models\Product;
use Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::orderBy('id', 'desc')->take(3)->get();
        $categories = Category::with('subcategory')->whereNull('parent_id')->get();
        $categori = Category::with('products')->get();
        $offer_banner = OfferBanner::orderBy('id', 'desc')->take(2)->get();
        $products = Product::orderBy('id', 'desc')->take(8)->get();
        return view('welcome', compact('categories','banners','categori','offer_banner','products'));
    }

    
}

