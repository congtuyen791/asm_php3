<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index() {
        //SELECT categorys.name, COUNT(products.id) as sl, min(products.price) AS giathap, 
        //MAX(products.price) AS GC FROM categorys inner join products on categorys.id=products.category_id GROUP BY categorys.id
        $orders = Order::all()->count();
        $products = Product::all()->count();
        $users = User::all()->count();
        $comments = Comment::all()->count();
        $category = Category::all()->count();

        $category_bd = DB::table('categorys')->select(DB::raw('count(*) as SL, categorys.id'))
            ->join('products', 'categorys.id', '=', 'products.category_id')
            ->groupBy('categorys.id')
            ->get();
        // dd($category_bd);
        return view('admin.home', ['category' => $category, 'orders' => $orders, 'products' => $products, 'users' => $users, 'comments' => $comments, 'category_bd' => $category_bd]);
    }
}
