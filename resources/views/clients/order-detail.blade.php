@extends('layouts.main')
@section('content-title', 'Đơn hàng')
@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Các sản phẩm đã mua</h2>
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
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetail as $item)
                            <tr>
                                <td class="text-center"><img src="{{asset($item->product->avatar)}}" style="width: 80px; height: 80px" alt="" /></td>
                                <td>{{$item->product->name}}</td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">{{$item->product->price}}</td>
                                <td class="text-center">{{$item->thanh_tien}}</td>
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