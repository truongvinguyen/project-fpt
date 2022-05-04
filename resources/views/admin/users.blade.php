@extends('layouts.layout')
@section('title')
Thành viên
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Thành viên  <a href="/add-new-user"><button type="button" class="btn btn-xl btn-outline-primary">Thêm</button></a></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/add-new-user">Danh sách thành
                            viên</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="row clearfix">
@foreach($users as $item)
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="da-card">
            <div class="da-card-photo">
                <img src="/upload/user/{{ $item->user_img }}" height="200px" alt="">
                <div class="da-overlay da-slide-bottom">
                    <div class="da-social">
                        <ul class="clearfix">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="da-card-content">
                <h5 class="h5 mb-10">{{$item->name}}</h5>
                <p class="mb-0">Quản trị viên</p>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection