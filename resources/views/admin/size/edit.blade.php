@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Sửa size')
@section('content-nav', 'Sửa size')

@section('content')

<div class="container">
    <form action="{{route('admin.size.update', $size->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" name="name" value="{{$size->name}}" placeholder="Nhập vào tên danh mục" id="" class="form-control" >
            @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Cập nhật</button>
            <a class="btn btn-danger" href="{{route('admin.size.list')}}">Hủy sửa</a>
        </div>
    </form><br>
</div>

@endsection