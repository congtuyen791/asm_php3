@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý danh mục')
@section('content-nav', 'Danh mục')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 350px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($category_list as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              
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