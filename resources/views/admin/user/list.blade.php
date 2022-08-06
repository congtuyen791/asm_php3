@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Quản lý người dùng')
@section('content-nav', 'Người dùng')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

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
              <th>User</th>
              <th>Email</th>
              <th>Số DT</th>
              <th>Avatar</th>
              <th>Quyền</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user_list as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone}}</td>
              <td><img src="{{asset($user->avatar)}}" style="width: 150px;" alt=""></td>
               <!-- cấp quyền ------------------------------------------------------------------------------------>
              @if(($user->role) == 0)
              <td>
                <form action="{{route('admin.users.role', $user->id)}}" method="post">
                  @csrf
                  <button class="btn btn-info">Người dùng</button>
                </form>
              </td>
              @else
              <td>Admin</td>
              @endif
              <!-- cập nhật trạng thái người dùng ----------------------------------------------------------------->
              @if (($user->status) == 1)
              <td>
                <form action="{{route('admin.users.status', $user->id)}}" method="POST">
                  @csrf
                  <button class="btn btn-primary">Đang mở</button>
                </form>
              </td>
              @else
              <td>
                <form action="{{route('admin.users.status', $user->id)}}" method="POST">
                  @csrf
                  <button class="btn btn-danger">Đã khóa</button>
                </form>
              </td>
              @endif
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