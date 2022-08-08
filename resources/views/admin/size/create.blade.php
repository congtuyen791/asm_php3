@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Tạo mới Size')
@section('content-nav', 'Tạo mới Size')

@section('content')

<div class="container">
    <form action="{{route('admin.size.postCreate')}}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="">Tên loại</label>
            <input type="text" name="name" placeholder="Nhập vào tên loại" id="" class="form-control" >
            @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
            <button class="btn btn-danger" type="reset">Nhập lại</button>
        </div>
    </form><br>
</div>

@endsection