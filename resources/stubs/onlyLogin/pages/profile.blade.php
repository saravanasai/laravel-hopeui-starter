@extends('layouts.master')

@section('tab_tittle', 'My Profile')

@section('content')
   <div class="mt-5">
    <div class="conatiner-fluid content-inner mt-3 py-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                                    <img src="../../assets/images/avatars/01.png" alt="User-Profile"
                                        class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                    <img src="../../assets/images/avatars/avtar_1.png" alt="User-Profile"
                                        class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                                    <img src="../../assets/images/avatars/avtar_2.png" alt="User-Profile"
                                        class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                                    <img src="../../assets/images/avatars/avtar_4.png" alt="User-Profile"
                                        class="theme-color-green-img img-fluid rounded-pill avatar-100">
                                    <img src="../../assets/images/avatars/avtar_5.png" alt="User-Profile"
                                        class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                                    <img src="../../assets/images/avatars/avtar_3.png" alt="User-Profile"
                                        class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                                </div>
                                <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                    <h4 class="me-2 h4">{{ auth()->user()->name }}</h4>
                                    <span> - {{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <ul class="d-flex nav nav-pills mb-0 text-center"
                               id="profile-pills-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('app.setting.change-password') }}">Change
                                        Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('app.home')}}"
                                        >Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>
@endsection
