@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('admin.Edit Admin')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.super-admin.index')}}">{{__('admin.Admin Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('admin.Edit Admin')}}</strong>
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
                    <h5>{{__('admin.Edit Admin')}}</h5>
                    @if ($errors->any())
                    <div>
                        <div class="font-medium text-red-600">
                            {{ __('Error!') }}
                        </div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="ibox-content">
                    <form action="{{route('admin.super-admin.update', $edit->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.First Name')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" name="first_name" placeholder="Name" value="{{$edit->first_name}}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Last Name')}} </label>

                            <div class="col-sm-10">
                                <input type="text" name="last_name" placeholder="Name" value="{{$edit->last_name}}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Email')}} <span
                                    class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Email" value="{{$edit->email}}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="Enter New Password" value=""
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">

                            <label class="col-sm-2 col-form-label">{{__('admin.Password')}} </label>

                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" placeholder="Confirm New Password"
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
                                <img id="image" src="{{URL::to($edit->avatar)}}" style="width:80px;">
                                <img id="image" src="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-md" type="submit">{{__('admin.Update')}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection