<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function listCart()
    {
        if (Auth::user()) {
            $carts = Cart::select('*')->with('product')->where('user_id', '=', Auth::user()->id)->get();
            $tong_tien = 0;
            // dd($carts);
            return view('clients.cart', ['cart' => $carts, 'tong_tien' => $tong_tien]);
        } else {
            return view('clients.cart');
        }
    }
    public function addCart($id)
    {
        if(Auth::user()){
            $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            $product = Product::select('*')->where('id', $id)->first();
            // dd($product['price']);
            if ($cart && $cart->product_id == $id) {
                $cart->quantity = $cart->quantity + 1;
                $cart->tong_tien = $cart->quantity * $product['price'];
                $cart->save();
                return redirect()->route('listCart');
            }
            $data['product_id'] = $id;
            $data['quantity'] = 1;
            $data['price'] = $product['price'];
            $data['user_id'] = Auth::user()->id;
            $data['tong_tien'] = 1 * $product['price'];
            Cart::create($data);
            return redirect()->route('listCart');
        }else{
            session()->flash('false', 'Bạn cần đăng nhập để thực hiện chức năng này!');
            return redirect()->route('auth.getLogin');
        }
    }
    public function delete(Cart $id)
    {
        if ($id->delete()) {
            return redirect()->back();
        }
    }
}
