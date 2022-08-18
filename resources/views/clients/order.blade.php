@extends('layouts.main')
@section('content-title', 'Đơn hàng')
@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Các đơn hàng đã mua</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-12">
                <a class="btn btn-warning col-lg-2 mb-3" href="{{asset('/product')}}">Tiếp tục mua sắm</a>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Ngày giao hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td class="text-center">{{$order->created_at}}</td>
                                @if ($order->ngay_giao == null)
                                <td class="text-center">Đang chờ Shops xác nhận</td>
                                @else
                                <td class="text-center">{{$order->ngay_giao}}</td>
                                @endif
                                <td>{{$order->tong_tien}}</td>
                                @if($order->status == 0)
                                <td>Đang xử lý</td>
                                @elseif($order->status == 1)
                                <td>Cửa hàng đã xác nhận đơn hàng</td>
                                @elseif($order->status == 2)
                                <td>Đang giao</td>
                                @elseif($order->status == 3)
                                <td>Đã nhận được hàng</td>
                                @else
                                <td>Đã hủy</td>
                                @endif
                                @if($order->status == 3 || $order->status == 4 || $order->status == 2)
                                <td></td>
                                @else
                                <td>
                                    <form action="{{route('updateOrder', $order->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">
                                            Hủy đơn hàng
                                        </button>
                                    </form>
                                </td>
                                @endif
                                <td>
                                    <a class="btn btn-warning" href="{{route('orderDetail', $order->id)}}">
                                        Chi tiết
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection