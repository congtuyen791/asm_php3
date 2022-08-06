@extends('admin.layouts.main')
@section('title', 'Trang Admin')
@section('content-title', 'Tạo mới sản phẩm')
@section('content-nav', 'Tạo mới sản phẩm')

@section('content')

<div class="container">
    <form action="{{route('admin.products.postCreate')}}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" placeholder="Nhập vào tên sản phẩm" id="" class="form-control" >
        </div>
        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="number" name="price" placeholder="Nhập vào giá sản phẩm" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Số lượng sản phẩm</label>
            <input type="number" name="quantity" placeholder="Nhập vào số lương sản phẩm" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="avatar" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Giá khiến mại</label>
            <input type="number" name="promotion" placeholder="Có thể nhập giá khuyến mại hoặc không" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <select name="status" id="" class="form-control">
                <option value="0">Hết hàng</option>
                <option value="1">Còn hàng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="size_id">Size</label>
            <select name="size_id" id="" class="form-control">
                @foreach($size_list as $key)
                    <option value="{{$key->id}}">{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="" class="form-control">
                @foreach($category_list as $key)
                    <option value="{{$key->id}}">{{$key->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Nhập vào mô tả sản phẩm..."></textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
            <button class="btn btn-danger" type="reset">Nhập lại</button>
        </div>
    </form><br>
</div>

@endsection