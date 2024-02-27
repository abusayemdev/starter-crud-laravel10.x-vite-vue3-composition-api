@extends('admin.dashboard')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        @if($isAdmin->isMainAdmin ==1)
        <h2>{{__('admin.Admin List')}}</h2>
        @else
        <h2>{{__('admin.Admin Settings')}}</h2>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{__('admin.Home')}}</a>
            </li>

            <li class="breadcrumb-item active">
                @if($isAdmin->isMainAdmin ==1)
                <strong>{{__('admin.All Admins')}}</strong>
                @else
                <strong>{{__('admin.Admin Settings')}}</strong>
                @endif
            </li>
        </ol>
    </div>

    <div class="col-lg-2 align-self-center ">

        @if($isAdmin->isMainAdmin ==1)
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                href="{{route('admin.super-admin.create')}}">{{__('admin.Create Admin')}}</a>
        </div>
        @endif
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    @if($isAdmin->isMainAdmin ==1)
                    <h5>{{__('admin.Admin List')}}</h5>
                    @else
                    <h5>{{__('admin.Admin Settings')}}</h5>
                    @endif
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>{{__('admin.Name')}}</th>
                                    <th>{{__('admin.Avatar')}}</th>
                                    <th>{{__('admin.Email')}}</th>
                                    @if($isAdmin->isMainAdmin ==1)
                                    <th>{{__('admin.Admin Status')}}</th>
                                    @endif
                                    <th>{{__('admin.Action')}}</th>
                                </tr>
                            </thead>
                            <?php
                            $sl=1;
                            ?>
                            <tbody>
                                @if($isAdmin->isMainAdmin ==1)
                                @foreach($admins as $admin)
                                <tr class="gradeX">
                                    <td>{{$sl++}}</td>

                                    @if($admin->id == $isAdmin->id)
                                    <td>{{$admin->first_name}} {{$admin->last_name}} (You)</td>
                                    @else
                                    <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                                    @endif

                                    <td><img src="{{URL::to($admin->avatar)}}" width="70" alt=""></td>

                                    @if($admin->id == $isAdmin->id)
                                    <td> {{$admin->email}} (You)</td>
                                    @else
                                    <td> {{$admin->email}}</td>
                                    @endif

                                    @if($isAdmin->isMainAdmin ==1)
                                    <td>

                                        @if($admin->isMainAdmin ==1)
                                        <span class="badge">Is Super Admin</span>
                                        @else
                                        <span class="badge">Make Super Admin</span>
                                        @endif

                                        @if($admin->id != $isAdmin->id)
                                        @if($admin->isMainAdmin ==1)
                                        <label class="switch ml-3">
                                            <input type="checkbox" class="input_status" checked
                                                value="{{URL::to('/admin/make-admin/'.$admin->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                        @else
                                        <label class="switch ml-3">
                                            <input type="checkbox" class="input_status"
                                                value="{{URL::to('/admin/make-super-admin/'.$admin->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                        @endif
                                        @endif

                                    </td>
                                    @endif

                                    <td>
                                        @if($admin->id == $isAdmin->id)
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('admin.super-admin.show', $admin->id)}}">{{__('admin.View')}}</a>
                                        @endif

                                        @if($admin->id == $isAdmin->id)
                                        <a class="btn btn-success btn-sm"
                                            href="{{route('admin.super-admin.edit', $admin->id)}}">{{__('admin.Edit')}}</a>
                                        @endif

                                        @if($admin->id != $isAdmin->id)
                                        <a href="javascript:;" class="btn btn-sm btn-danger delete"
                                            data-form-id="super-admin-delete-{{$admin->id}}">{{__('admin.Delete')}} </a>
                                        <form action="{{route('admin.super-admin.destroy', $admin->id)}}"
                                            id="super-admin-delete-{{$admin->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="gradeX">
                                    <td>{{$sl++}}</td>
                                    <td>{{$isAdmin->name}}</td>
                                    <td> {{$isAdmin->email}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('admin.super-admin.show', $isAdmin->id)}}">{{__('admin.View')}}</a>
                                        <a class="btn btn-success btn-sm"
                                            href="{{route('admin.super-admin.edit', $isAdmin->id)}}">{{__('admin.Edit')}}</a>
                                    </td>
                                </tr>
                                @endif

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection