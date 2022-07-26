@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý danh mục')
@section('content-nav', 'Danh mục')

@section('content')
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><a href="{{route('admin.categorys.getCreate')}}" class="btn btn-success">Tạo mới</a></h3>
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
            @foreach($category_list as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>
                <form action="{{route('admin.categorys.edit',  $category->id)}}" method="get">
                  @csrf
                  <button class="btn btn-app">
                    <i class="fas fa-edit"></i>
                  </button>
                </form>
                <form action="{{route('admin.categorys.delete',  $category->id)}}" method="post">
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