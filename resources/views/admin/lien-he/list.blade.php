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
              <th>Email</th>
              <th>Tiêu đề</th>
              <th>Nội dung</th>
              <th colspan="2">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->users->name}}</td>
              <td>{{$item->users->email}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->content}}</td>
              <td>
                <form action="{{route('admin.lienHe.delete',  $item->id)}}" method="post">
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
@endsection