<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return view('products', compact('items'));
    }
    public function addproductCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                'shiping_charge'=>100,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }

    public function productCart(Request $request){  

        $cart = $request->session()->get('cart', []);
        $subtotalPrice = $this->calculateTotalPrice($cart);
        $shipping = $this-> total($cart);

        // Calculate total
        $total = $subtotalPrice + $shipping;
        
        return view('shopingcart', compact('cart', 'subtotalPrice','total'));

    }
    private function total($cart){
        return collect($cart)->contains('location', 'Dhaka') ? 0 : 100;
    }
    private function calculateTotalPrice($cart)
    {
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    

    public function deleteProduct(Request $request){
            if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }

    public function incrementCartItem(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            $request->session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function decrementCartItem(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] -= 1;
            $request->session()->put('cart', $cart);
        }

        return redirect()->back();
    }
}


