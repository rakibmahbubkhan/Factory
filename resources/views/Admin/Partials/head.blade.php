<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Mahbub Engineering</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('/Admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/Admin/assets/vendors/base/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('/Admin/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/Admin/assets/images/favicon.png') }}" />
        <x-head.tinymce-config/>

</head>
<body style="background: #f0f3f6;">

<!-- partial:partials/head.blade.php -->
<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">

                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('/Admin/assets/images/logo.png') }}" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('/Admin/assets/images/logo.png') }}" alt="logo"/></a>
                </div>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name">
                                @if(Auth::check())
                                   {{ Auth::user()->name }}
                                @endif
                            </span>
                            <span class="online-status"></span>
                            <img src="{{ asset('images/9187604.png')  }}" alt="profile"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" target="_blank" href="{{ route('home') }}">
                                <i class="mdi mdi-web text-primary"></i>
                                View website
                            </a>

                            <a class="dropdown-item" href="{{ route('Admin.setting') }}">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item{{ request()->routeIs('dashboard') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('Admin.pages.home')}}" class="nav-link">
                        <i class="mdi mdi-home-outline menu-icon"></i>
                        <span class="menu-title">Home Page</span>
                        <i class="menu-arrow"></i>
                    </a>
{{--                    <div class="submenu">--}}
{{--                        <ul>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Slider</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Statistics</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Why Us</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Product Slider</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Team</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#">Client Feedback</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </li>
                <li class="nav-item">
                    <a href="{{ route('Admin.about')  }}" class="nav-link">
                        <i class="mdi mdi-information-outline menu-icon"></i>
                        <span class="menu-title">About</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Admin.services') }}" class="nav-link">
                        <i class="mdi mdi-settings menu-icon"></i>
                        <span class="menu-title">Services</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Admin.clients') }}" class="nav-link">
                        <i class="mdi mdi-account-network menu-icon"></i>
                        <span class="menu-title">Clients</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Admin.certificates') }}" class="nav-link">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Certifications</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Admin.teams') }}" class="nav-link">
                        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                        <span class="menu-title">Team</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('Admin.products')}}" class="nav-link">
                        <i class="mdi mdi-cart-outline menu-icon"></i>
                        <span class="menu-title">Product</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('Admin.contacts')}}" class="nav-link">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Contact</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="mdi mdi-face-profile menu-icon"></i>--}}
{{--                        <span class="menu-title">Profile</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{route('Admin.news')}}" class="nav-link">
                        <i class="mdi mdi-newspaper menu-icon"></i>
                        <span class="menu-title">News</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('content')

@include('Admin.Partials.foot')
