<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $products = Product::select('*')->where('status', '=', '1')->with('category')->with('size')->limit(3)->get();

        $products_2 = Product::select('*')->where('status', '=', '1')->orderBy('id', 'desc')->with('category')->with('size')->limit(4)->get();

        $sofa = DB::table('products')->join('categorys', 'products.category_id', '=', 'categorys.id')->select('products.*')
            ->where('categorys.name', '=', 'sofa')->limit(1)->get();
        // dd($sofa);
        return view('home', ['product' => $products, 'product_2' => $products_2, 'sofa' => $sofa]);
    }
    public function productDetail(Product $id)
    {
        $comment = Comment::select('id', 'content', 'user_id', 'product_id', 'created_at', 'updated_at')->where('product_id', $id->id)
            ->orderBy('id', 'desc')->with('user')->with('product')->paginate(10);
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
        session()->flash('search', 'Chúng tôi tìm thấy '.count($product).' sản phẩm có tên là: '.$requests->name.'.');
        return view('clients.product', [
            'product' => $product,
            'category' => $category,
            'size' => $size,
        ]);
    }

    public function contact()
    {
        return view('clients.contact');
    }

    public function profile()
    {
        return view('clients.profile');
    }

    public function updateUser(ProfileRequest $request) {
        
        $request->validate([
            'name' => 'required|min:6|max:50',
            'email' => 'required|min:6|email|max:32',
            'birthday' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|min:6|max:50'
        ]);
        $user = User::find($request->id);
        if ($request->hasFile('avatar_up')) {
            $avatar = $request->avatar_up;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $avatar_up = $avatar->storeAs('images/users', $avatarName);
        } else {
            $avatar_up = $request->avatar;
        }
        // dd($user->id, $request->all(), $avatar_up);
        $user->update([
            'name'=> $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar_up,
        ]);
        session()->flash('success', 'Cập nhật tài khoản thành công!');
        return redirect()->back();
    }

    public function getUpdateUserPassword() {
        // dd(1);
        return view('clients.profile-password');
    }

    public function updateUserPassword(PasswordRequest $request) {
        // dd($request->password);
        $request->validate([
            'password' => 'required|min:6|max:32',
            'password_new' => 'required|min:6|max:32',
            'password_new_xn' => 'required|min:6|max:32',
        ]);
        $user = User::find($request->id);
        // dd($user);
        if(Auth::attempt(['password' => $request->password, 'email' => $user->email])) {
            if($request->password_new === $request->password_new_xn) {
                $user->password = bcrypt($request->password_new_xn);
                $user->save();
                session()->flash('success', 'Cập nhật mật khẩu mới thành công!');
                return redirect()->back();
            }else{
                session()->flash('false', '2 mật khẩu không khớp nhau!');
                return redirect()->back();
            }
        }else{
            session()->flash('false', 'Mật khẩu cũ không đúng!');
                return redirect()->back();
        }
    }
}
