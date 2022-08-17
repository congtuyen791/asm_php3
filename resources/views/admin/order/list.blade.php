@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý Đơn hàng')
@section('content-nav', 'Đơn hàng')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>ngay giao</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th colspan="2">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <form action="{{route('admin.orders.update', $order->id)}}" method="post">
              @csrf
              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                @if($order->ngay_giao == null)
                <td>
                  <input type="date" name="ngay_giao" class="btn btn-info">
                </td>
                @else
                <td>{{$order->ngay_giao}}</td>
                @endif
                <td>{{$order->tong_tien}}</td>
                <td>
                  <select name="status" id="" class="form-control" style="width: 70%;">
                    <option value="0" {{($order->status == 0) ? 'selected' : 0}}>Đang xử lý</option>
                    <option value="1" {{($order->status == 1) ? 'selected' : 0}}>Xác nhận</option>
                    <option value="2" {{($order->status == 2) ? 'selected' : 0}}>Đã giao cho DVVC</option>
                    <option value="3" {{($order->status == 3) ? 'selected' : 0}}>Đã nhận</option>
                    <option value="4" {{($order->status == 4) ? 'selected' : 0}}>Đã hủy</option>
                  </select>
                </td>
                <td>
                  <button class="btn btn-primary">
                    Cập nhật
                  </button>
                  <a class="btn btn-warning" href="{{route('admin.orders.orderDetail', $order->id)}}">
                    Chi tiết
                  </a>
                </td>
              </tr>
            </form>
            @endforeach
        </table>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection