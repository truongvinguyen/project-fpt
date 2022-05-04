@extends('layouts.layout')
@section('title')
Thêm ảnh chi tiết sản phẩm
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý hình ảnh sản phẩm </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý ảnh sản phẩm</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="container">
        <div class="row">
            <h2 class="h4 col-md-4" style="padding-left: 20px;padding-top: 20px;">Thêm hình ảnh</h2>

        </div>
    </div>
    <div class="container">
        <div class="col-md-7 m-auto">
            <form action="/insert-image-product/{{$product_id}}" method="post" style="padding: 30px;"
                class="justify-content-center" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$product_id}}" name="product_id">
                <input type="hidden" value="{{$product_name}}" name="product_name">
                <input class="btn btn-secondary text-center" type="file" id="image" name="image[]" accept="image/*"
                    multiple>
                <span id="error_image"></span>
                <input class="btn btn-primary" type="submit" name="upload" value="Thêm">

            </form>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <h2 class="h4" style="padding-left: 20px;padding-top: 20px;">Hình ảnh của <span
            class="text-danger">{{$product_name}}</span></h2>
    <p class="" style="padding-left: 20px;"> sản phẩm</p>
    <input type="hidden" value="{{$product_id}}" name="product_id" class="product_id">
    <form>
        @csrf
        <div id="image-load">
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên hình ảnh</th>
                        <th>Hình ảnh</th>
                        <th>Tùy chọn</th>
                        <th class="datatable-nosort">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td>
                        </td>
                        <td class="table-plus">
                            <!-- <img src="/upload/product/" width="70px" height="70px" alt=""> -->
                        </td>
                        <td>
                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Xóa</a>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Xóa</a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
    </form>
</div>
</form>
</div>
<a href="#" class="btn-block" data-toggle="modal" data-target="#confirmation-modal" type="button">
    <img src="vendors/images/modal-img3.jpg" alt="modal">
</a>
@foreach($image_product as $item)
<div class="modal fade" id="confirmation-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Bạn có chắc muốn xóa ảnh</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        Hủy
                    </div>
                    <div class="col-6">
                        <button type="button" data-item_id="{{$item->id}}" class="delete-image btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                        Có
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endforeach

<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
</div>
@endsection