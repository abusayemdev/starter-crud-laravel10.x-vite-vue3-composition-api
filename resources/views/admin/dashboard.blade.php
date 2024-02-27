@extends('admin.layouts.app')
@section('admin_dashboard_content')
<?php
$settings = App\Models\Setting::where("Status",1)->first();
$admin = App\Models\User::find(Auth::user()->id); 
?>

<!--dashboard wrapper start-->
<div id="wrapper">
    <!--sidebar start-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <!-- Brand Logo -->
                    <a href="{{route('admin.dashboard')}}" class="brand-link">
                        <img src="{{URL::to($settings->Logo ?? '')}}" class="brand-image img-circle"
                            style="opacity: .8">
                        <span class="brand-text text-white">{{lang($settings->Name ?? '')}} </span>
                    </a>
                </li>

                <li class="{{Route::is('admin.dashboard') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">{{__('admin.Dashboard')}}</span></a>
                </li>

                @if($admin->isMainAdmin == 1)
                <li class="{{Route::is('admin.super-admin*') ? 'active' : ''}}">
                    <a href="{{route('admin.super-admin.index')}}"><i class="fa fa-user"></i> <span
                            class="nav-label">{{__('admin.Super Admin Settings')}}</span></a>
                </li>
                @else
                <li class="{{Route::is('admin.super-admin*') ? 'active' : ''}}">
                    <a href="{{route('admin.super-admin.index')}}"><i class="fa fa-user"></i> <span
                            class="nav-label">{{__('admin.Admin Settings')}}</span></a>
                </li>
                @endif

                <li class="{{Route::is('admin.setting*') ? 'active' : ''}}">
                    <a href="{{route('admin.setting.index')}}"><i class="fa fa-diamond"></i> <span
                            class="nav-label">{{__('admin.Site Settings')}}</span></a>
                </li>

                <li class="{{Route::is('admin.language*') ? 'active' : ''}}">
                    <a href="{{route('admin.language.index')}}"><i class="fa fa-language"></i> <span
                            class="nav-label">{{__('admin.Language')}}</span></a>
                </li>

                <li class="{{Route::is('admin.translation*') ? 'active' : ''}}">
                    <a href="{{route('admin.translation.index')}}"><i class="fa fa-font"></i> <span
                            class="nav-label">{{__('admin.Translation')}}</span></a>
                </li>

                
 
            </ul>
        </div>
    </nav>
    <!--sidebar end-->

    <!--page wrapper start-->
    <div id="page-wrapper" class="gray-bg">
        <!--topbar start-->
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="mr-3">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ lang(Auth::user()->first_name ?? '') }} <b
                                    class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs {{$lang_ar_text_position}}">
                            <li><a href="{{route('admin.super-admin.index')}}"
                                    class="{{$lang_ar_text_right}}"><small>{{__('admin.Account')}}</small> </a>
                            </li>
                            <li><a href="{{route('/')}}"
                                    class="{{$lang_ar_text_right}}"><small>{{__('admin.Back to site')}}</small> </a>
                            </li>
                            <li class="dropdown-divider"></li>

                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <a class="dropdown-item mb-2 text-center" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('admin.Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!--topbar end-->

        <!--content start-->
        @yield('admin_content')
        <!--content start-->

        <!--footer start-->
        <div class="footer text-center">
            <div>
                <strong>{{ __('admin.Copyright') }}</strong> &copy; {{ __('2024') }} {{ __('admin.All right reserved.') }} <span class="mx-1"> <language-dropdown></language-dropdown></span>
            </div>
        </div>
        <!--footer end-->
    </div>
    <!--page wrapper start-->
</div>
<!--dashboard wrapper end-->

@endsection