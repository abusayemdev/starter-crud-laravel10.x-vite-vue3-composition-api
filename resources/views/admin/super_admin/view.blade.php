@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('admin.Admin Details')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.super-admin.index')}}">{{__('admin.Admin Index')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{__('admin.Admin Details')}}</strong>
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
                    <h5>{{__('admin.Admin Details')}}</h5>
                </div>
                <div class="ibox-content">
                    <dl class="row">
                        <dt class="col-sm-12">
                            <div class="m-3">
                                <img src="{{URL::to($admin->avatar)}}" width="100px" class="brround" alt="user">
                            </div>
                        </dt>
                        <dt class="col-sm-3">{{__('admin.Name')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$admin->first_name}} {{$admin->last_name}}</dd>
                        <dt class="col-sm-3">ID<span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$admin->id}}</dd>
                        <dt class="col-sm-3">{{__('admin.Email')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$admin->email}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection