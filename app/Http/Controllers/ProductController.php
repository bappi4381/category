<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        return view('admin.product.show-product');
    }
    public function create(){
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        return view('admin.product.store-product',compact('categories'));
    }
    public function store(Request $request){
        $product        = $request->file('image');
        $extention      = $product ->getClientOriginalName();
        $imageName      = 'Product_'.time().'.'.$extention;
        $product->storeAs('public\Product ',$imageName);

        $product  = new  Product();

        $product ->name              = $request->name;
        $product ->sku               = $request->sku;
        $product ->category_id       = $request->category_id;
        $product ->allcategory_id    = $request->allcategory_id;
        $product ->description       = $request->description;
        $product ->quantity          = $request->quantity;
        $product ->price             = $request->price;
        $product ->image             = $imageName;
        
        $product ->save();
        return redirect()->route('product');
    }
    public function edit(){}
    public function update(){}
    public function delete(){}
}
