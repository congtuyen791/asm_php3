<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'description', 'promotion', 'status', 'category_id', 'size_id')
            ->with('category')->with('size')->paginate(3);

        $products_2 = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'description', 'promotion', 'status', 'category_id', 'size_id')
            ->orderBy('id', 'desc')->with('category')->with('size')->paginate(4);

        $sofa = DB::table('products')->join('categorys', 'products.category_id', '=', 'categorys.id')->select('products.*')
            ->where('categorys.name', '=', 'sofa')->limit(1)
            ->get();
        // dd($sofa);
        return view('home', ['product' => $products, 'product_2' => $products_2, 'sofa' => $sofa]);
    }
    public function productDetail(Product $id)
    {
        $comment = Comment::select('id', 'content', 'user_id', 'product_id')->where('product_id', $id->id)
        ->orderBy('id', 'desc')->with('user')->with('product')->paginate(10);
        // dd($comment);
        return view('clients.product-detail', [
            'product' => $id,
            'comments' => $comment,
        ]);
    }
    public function product()
    {
        $products = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'description', 'promotion', 'status', 'category_id', 'size_id')
            ->orderBy('name', 'desc')->with('category')->with('size')->paginate(12);
        $category = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        return view('clients.product', [
            'product' => $products,
            'category' => $category,
            'size' => $size,
        ]);
    }
    public function categoryProducts($id)
    {
        $product = DB::table('products')->join('categorys', 'products.category_id', '=', 'categorys.id')->select('products.*')
            ->where('products.category_id', '=', $id)
            ->paginate(12);
        $category = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        // dd($category);
        return view('clients.product', [
            'product' => $product,
            'category' => $category,
            'size' => $size,
        ]);
    }
    public function sizeProducts($id)
    {
        $product = DB::table('products')->join('size', 'products.size_id', '=', 'size.id')->select('products.*')
            ->where('products.size_id', '=', $id)
            ->paginate(12);
        $category = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        return view('clients.product', [
            'product' => $product,
            'category' => $category,
            'size' => $size,
        ]);
    }
    public function searchProduct(Request $requests)
    {
        $product = Product::where('name', 'like', '%' . $requests->name . '%')->paginate(12);
        $category = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        return view('clients.product', [
            'product' => $product,
            'category' => $category,
            'size' => $size,
        ]);
    }

    public function contact() {
        return view('clients.contact');
    }
}
