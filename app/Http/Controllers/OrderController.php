<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('*')->with('user')->orderBy('id', 'desc')->paginate(10);

        return view('admin.order.list', ['orders' => $orders]);
    }
    public function getOrder($tt)
    {
        $carts = Cart::select('*')->with('product')->where('user_id', '=', Auth::user()->id)->get();
        return view('clients.checkout', ['cart' => $carts, 'tt' => $tt]);
    }
    public function addOrder($tt)
    {
        if (Auth::user()->address == Null || Auth::user()->phone == null) {
            session()->flash('false', 'Bạn cần cập nhật đầy đủ thông tin mới thì mới thực hiện được chức năng này');
            return redirect()->route('profile');
        } else {
            $data = new Order();
            $data->user_id = Auth::user()->id;
            $data->noi_giao_hang = Auth::user()->address;
            $data->status = 0;
            $data->tong_tien = $tt;
            $data->save();
            $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
            foreach ($cart as $cart) {
                $orderDetail = new OrderDetail();
                $orderDetail->product_id = $cart->product_id;
                $orderDetail->quantity = $cart->quantity;
                $orderDetail->thanh_tien = $cart->tong_tien;
                $orderDetail->order_id = $data->id;
                $orderDetail->save();
                Cart::destroy($cart->id);
            }
        }
        session()->flash('success', 'Bạn đã đặt hàng thành công!');
        return redirect()->route('orderView');
    }
    //<=============================================== hiển thị đơn hàng đã đặt phía client =========================================>
    public function orderView(){
        $orders = Order::select('*')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('clients.order', ['orders' => $orders]);
    }
    // <=============================================== hiển thị chi tiết đơn hàng đã đặt phía client =========================================>
    public function viewOrderDetail($id)
    {
        $orderDetail = OrderDetail::select('*')->where('order_id', '=', $id)->with('product')->with('order')->get();
        // dd($orderDetail);
        return view('clients.order-detail', ['orderDetail' => $orderDetail]);
    }
    // <=============================================== hủy đơn phía client =========================================>
    public function updateOrder($id){
        // dd($id);
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        session()->flash('success', 'Cập nhật đơn hàng có mã '.$id.' thành công!');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);
        if(isset($request->ngay_giao)){
            $order->ngay_giao = $request->ngay_giao;
        }
        $order->status = $request->status;
        $order->save();
        session()->flash('success', 'Cập nhật đơn hàng thành công!');
        return redirect()->back();
    }

    public function orderDetail($id)
    {
        $orderDetail = OrderDetail::select('*')->with('order')->with('product')->where('order_details.order_id', $id)->get();
        return view('admin.order.order-detail', ['orderDetail' => $orderDetail]);
    }
}
