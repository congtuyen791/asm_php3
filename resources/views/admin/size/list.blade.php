@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý Size')
@section('content-nav', 'Size')

@section('content')
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><a href="{{route('admin.size.getCreate')}}" class="btn btn-success">Tạo mới</a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th colspan="2">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($size_list as $size)
            <tr>
              <td>{{$size->id}}</td>
              <td>{{$size->name}}</td>
              <td>
                <form action="{{route('admin.size.edit',  $size->id)}}" method="get">
                  @csrf
                  <button class="btn btn-app">
                    <i class="fas fa-edit"></i>
                  </button>
                </form>
                <form action="{{route('admin.size.delete',  $size->id)}}" method="post">
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