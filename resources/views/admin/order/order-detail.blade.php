@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Chi tiết đơn hàng')
@section('content-nav', 'Đơn hàng')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{route('admin.orders.list')}}" class="btn btn-secondary" style="width: 20%;">Quay lại</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Ảnh sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Giá SP</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orderDetail as $orderDetail)
              <tr>
                <td>{{$orderDetail->id}}</td>
                <td><img src="{{asset($orderDetail->product->avatar)}}" alt="" style="width: 150px;"></td>
                <td>{{$orderDetail->product->name}}</td>
                <td>{{$orderDetail->product->price}}</td>
                <td>{{$orderDetail->quantity}}</td>
                <td>{{$orderDetail->thanh_tien}}</td>
              </tr>
            @endforeach
        </table>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection