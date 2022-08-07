<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        
    }
    public function getOrder($tt){
        $carts = Cart::select('*')->with('product')->where('user_id', '=', Auth::user()->id)->get();
        return view('clients.checkout', ['cart' => $carts, 'tt' => $tt]);
    }
    public function addOrder($tt){
        $data['user_id'] = Auth::user()->id;
        $data['noi_giao_hang'] = Auth::user()->address;
        $data['status'] = 0;
        $data['tong_tien'] = $tt;
        dd($data);
        // 'user_id',
        // 'product_id',
        // 'ngay_giao',
        // 'noi_giao_hang',
        // 'status',
        // 'tong_tien'
        
    }
}
