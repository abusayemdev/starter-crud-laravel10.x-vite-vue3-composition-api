@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('admin.Create Admin')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.super-admin.index')}}">{{__('admin.Admin Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('admin.Create Admin')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                href="{{route('admin.super-admin.index')}}">{{__('admin.Admin Index')}}</a>
        </div>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('admin.Create Admin')}}</h5>
                </div>
                <div class="ibox-content">
                    <form action="{{route('admin.super-admin.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.First Name')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="first_name" placeholder="First Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Last Name')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Email')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Password')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Avatar')}} </label>

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="custom-file-input"
                                        name="example-file-input-custom" accept="image/*" onchange="readURL(this);">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img id="image" src="">
                            </div>
                        </div>

                        <div class="form-group  i-checks row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Is Main Admin')}} </label>

                            <div class="col-sm-10 pt-1">
                                <input type="checkbox" class="icheckbox_square-green" name="isMainAdmin" value="1">
                            </div>
                        </div>

                        <input type="hidden" name="status" value="1">

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary btn-md" type="submit">{{__('admin.Create New')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection