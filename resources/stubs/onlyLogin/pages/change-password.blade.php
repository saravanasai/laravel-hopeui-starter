@extends('layouts.master')

@section('tab_tittle','Change Password')

@section('content')
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Change Password</h4>
        </div>
    </div>
    <div class="card-body px-0">
        @livewire('authentication.change-password.change-password-component')
    </div>
@endsection
