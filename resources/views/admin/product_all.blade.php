@extends('layouts.layout')
@section('title')
Sản phẩm
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý sản phẩm  <a href="/add-new-product"><button type="button" class="btn btn-xl btn-outline-primary">Thêm</button></a></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý sản phẩm</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
          
        </div>
    </div>
</div>
<div class="card-box mb-30">

    <h2 class="h4" style="padding-left: 20px;padding-top: 20px;">Sản phẩm </h2>
    <p class="" style="padding-left: 20px;">{{count($product)}} sản phẩm</p>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th></th>
                <th class="table-plus datatable-nosort">Product</th>
                <th>Name</th>
                <th>Giá gốc</th>
                <th>Giá KM<span class="text-danger">(Giá bán)</span></th>
                <th>Ẩn/Hiện</th>
                <th>Loại</th>
                <th class="datatable-nosort">Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $item)
            <tr>
                <td></td>
                <td class="table-plus">
                    <img src="/upload/product/{{ $item->product_image }}" width="70px" height="70px" alt="">
                </td>
                <td>
                    <h5 class="font-16" contentedittable>{{$item->product_name}}</h5>
                    by: {{$item->product_user}} 
                </td>
                <td>{{number_format($item->product_price_sale)}}</td>
                <td class="text-danger">{{number_format($item->product_price)}}</td>
                @if ($item->product_status ==1)
                <td><i class="icon-copy ion-eye text-dark " style="font-size: 25px;"></i></td>
                @else
                <td><i class="icon-copy ion-eye-disabled text-danger" style="font-size: 25px;""></i></i></td>
                @endif
                <td>{{$item->category_name}}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                            <a class="droupdow-item product-item" href="#"><i class="dw dw-eye"></i> Xem chi tiết</a>
                            <a class="item product-item" href="#"><i class="dw dw-eye"></i> Xem kho</a>
                            <a class="item product-item" href="#"><i class="dw dw-edit2"></i> Chỉnh sửa</a>
                            <a class="item product-item" href="#"><i class="dw dw-delete-3"></i> Xóa</a>
                            <a class="item product-item" href="/add-image-product/{{$item->id}}/for={{$item->product_name}}"><i class="dw dw-image" aria-hidden="true"></i></i>Thêm hình ảnh</a>
                        <!-- </div> -->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
</div>
@endsection