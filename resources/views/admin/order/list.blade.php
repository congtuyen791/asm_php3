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
              <!-- <th colspan="2">Chức năng</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->user->name}}</td>
              <td>{{$order->ngay_giao}}</td>
              <td>{{$order->tong_tien}}</td>
              @if($order->status == 0)
              <td>
                <a href="" class="btn btn-danger">Đang xử lý</a>
              </td>
              @else
              <td>
                <a href="" class="btn btn-success">Đã gửi hàng đi</a>
              </td>
              @endif
              <td>
                
              </td>
              <!-- <td>
                <form action="{{route('admin.orders.delete',  $order->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-app">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td> -->
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