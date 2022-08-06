<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'description', 'promotion', 'status', 'category_id', 'size_id')->orderBy('id', 'desc')->with('category')->with('size')->paginate(5);
        return view('admin.product.list', ['product_list' => $products]);
    }

    public function create()
    {
        $categorys = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        return view('admin.product.create', ['category_list' => $categorys, 'size_list' => $size]);
    }
    public function postCreate(Request $request)
    {
        $data = new Product();
        $data->fill($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $data->avatar = $avatar->storeAs('images/products', $avatarName);
        } else {
            $data->avatar = '';
        }
        $data->save();
        return  redirect()->route('admin.products.list');
    }

    public function delete(Product $product)
    {
        if ($product->delete()) {
            return redirect()->back();
        }
    }

    public function edit(Product $id)
    {
        $categorys = Category::select('id', 'name')->get();
        $size = Size::select('id', 'name')->get();
        return view('admin.product.edit', [
            'product' => $id,
            'category' => $categorys,
            'size_list' => $size
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->hasFile('avatar_up')) {
            $avatar = $request->avatar_up;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $avatar_up = $avatar->storeAs('images/users', $avatarName);
        } else {
            $avatar_up = $request->avatar;
        }
        $product->update([
            'name'=> $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'promotion' => $request->promotion,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'size_id' => $request->size_id,
            'avatar' => $avatar_up,
        ]);
        return redirect()->route('admin.products.list');
    }

    public function status(Product $product)
    {
        if ($product->status == 1) {
            $product->update(['status' => 0]);
            return redirect()->back();
        } else {
            $product->update(['status' => 1]);
            return redirect()->back();
        }
    }
}
