@extends('frontend.layouts.app')
@section('dashboard_content')
<?php
$settings = App\Models\Setting::where("Status",1)->first();
?>

<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            @if(isset($settings->Logo))
            <div>
                <a href="{{route('dashboard')}}"><img src="{{URL::to($settings->Logo ?? '')}}" class="logo-icon"
                        alt="logo icon"></a>
            </div>
            @endif
            <div>
                <h4 class="logo-text"><a href="{{route('dashboard')}}">{{lang($settings->Name ?? 'Site Name')}}</a></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i></div>
        </div>

        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li class="{{Route::is('dashboard') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">{{__('user.Dashboard')}}</div>
                </a>
            </li>

            <li class="{{Route::is('profile*') ? 'active' : ''}}">
                <a href="{{route('profile')}}">
                    <div class="parent-icon"><i class='bx bx-user-pin'></i>
                    </div>
                    <div class="menu-title">{{__('user.Profile')}}</div>
                </a>
            </li>


            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">{{__('user.Application')}}</div>
                </a>
                <ul>
                    <li> <a href="#">{{__('user.Option 1')}}</a></li>
                    <li> <a href="#">{{__('user.Option 2')}}</a></li>
                    <li> <a href="#">{{__('user.Option 3')}}</a></li>
                </ul>

            </li>
        </ul>
        </li>

        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->


    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <!-- topbar left -->
                <div class="flex-grow-1">
                    <div class="position-relative">

                    </div>
                </div>

                <!-- topbar center -->
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-start">
                        <!-- Header Notification -->
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">

                                    </div>
                                </a>
                                <div class="header-notifications-list">

                                </div>
                            </div>
                        </li>

                        <!-- Header Message -->
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">

                                    </div>
                                </a>
                                <div class="header-message-list">

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>


                <!-- topbar right -->
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="{{asset('frontend/assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar"> -->
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{ lang(Auth::user()->first_name ?? '') }}
                                {{ lang(Auth::user()->last_name ?? '') }} <i class="bx bx-chevron-down"></i></p>
                            <!-- <p class="designattion mb-0">Web Designer</p> -->
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
							<a class="dropdown-item" href="{{route('profile')}}">
								<i class="bx bx-user"></i><span>{{__('user.Profile')}}</span>
							</a>
                        </li>
                        <li>
							<a class="dropdown-item" href="{{route('/')}}">
								<i class="bx bx-arrow-to-right"></i><span>{{__('user.Back to Site')}}</span>
							</a>
                        </li>

                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <a class="dropdown-item" href="javascript:;"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class='bx bx-log-out-circle'></i><span>{{__('user.Logout')}}</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>
    <!--end header -->

    <!--start page wrapper -->
    @yield('content')
    <!--end page wrapper -->


    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <footer class="page-footer">

        <p class="mb-0"> {{__('user.Copyright')}} © 2024. {{__('user.All right reserved.')}} 
			<span class="mx-1"><language-dropdown></language-dropdown></span> 
		</p>

    </footer>

</div>
<!--end wrapper-->

@endsection