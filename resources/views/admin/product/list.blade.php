@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý sản phẩm')
@section('content-nav', 'Sản phẩm')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><a href="{{route('admin.products.create')}}" class="btn btn-success">Tạo mới</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Kích thước</th>
              <th>Avatar</th>
              <th>Danh mục</th>
              <th>Trạng thái</th>
              <th colspan="2" class="text-center">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product_list as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{ isset($product->size) ? $product->size->name : '' }}</td>
              <td><img src="{{asset($product->avatar)}}" alt="" style="width: 150px;"></td>
              <td>{{ isset($product->category) ? $product->category->name : '' }}</td>
              @if ($product['status'] == 1)
              <td>
                <form action="{{route('admin.products.status', [$product->id, $product->status])}}" method="POST">
                  @csrf
                  <button class="btn btn-primary">Còn hàng</button>
                </form>
              </td>
              @else
              <td>
                <form action="{{route('admin.products.status', [$product->id, $product->status])}}" method="POST">
                  @csrf
                  <button class="btn btn-danger">Hết hàng</button>
                </form>
              </td>
              @endif
             
              <td>
                <form action="{{route('admin.products.edit',  $product->id)}}" method="get">
                  @csrf
                  <button class="btn btn-app">
                  <i class="fas fa-edit"></i>
                  </button>
                </form>
                <form action="{{route('admin.products.delete',  $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-app">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </table>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<div>
  {{ $product_list->links() }}
</div>
@endsection