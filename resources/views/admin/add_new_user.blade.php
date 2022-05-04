@extends('layouts.layout')
@section('title')
 Thêm thành viên mới
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Thêm thành viên </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/add-new-user">Thêm thành viên
                            mới</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="save-user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="clearfix">

        </div>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" name="sunmit" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                    data-toggle="collapse" role="button"><i class="icon-copy ion-person-add"></i></i> Thêm</button>
            </div>

        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Họ và tên<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{old('name')}}" class="form-control name" type="text"
                            placeholder="Nhập họ và tên" name="name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .name {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-3 col-form-label">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{old('email')}}" class="form-control email" placeholder="Nhập Email" type="email"
                            name="email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .email {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Mật khẩu<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{old('password')}}" class="form-control password"
                                    placeholder="Nhập mật khẩu" type="password" name="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .password {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Xác nhận mật khẩu<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{old('password_confirmation')}}" class="form-control password_cf"
                                    placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .password_cf {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Chọn ảnh đại diện <span
                                    class="text-danger">*</span></label>
                            <div class="custom-file col-md-12">
                                <input type="file" class="custom-file-input form-control user_img" name="user_img">
                                <label class="custom-file-label">Choose file</label>
                                @error('user_img')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .user_img {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-6 col-md-12 col-form-label">Ngày sinh<span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{old('birthday')}}" class="form-control name" type="date"
                                    placeholder="chọn ngày sinh" name="birthday">
                                @error('birthday')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .birthday {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                





            </div>
            <div class="col-md-4">

           
               
                
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Quyền truy cập<span class="text-danger">*</span>
                        @error('user_rule')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .user_rule {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </label>
                    <div class="col-sm-12 col-md-12">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio1" value="1" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Quản trị viên website</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio2" value="2" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Quản trị sản phẩm</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio3" value="3" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3">Quản trị bài viết</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio4" value="4" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">Quản trị đơn hàng</label>
                        </div>

                    </div>
                </div>
                <hr>

                <input type="hidden" value="{{ Auth::user()->name }}" name="add_member">
            </div>



        </div>
</div>


</form>

</div>
@endsection