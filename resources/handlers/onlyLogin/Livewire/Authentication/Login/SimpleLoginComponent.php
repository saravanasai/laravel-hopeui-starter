<?php

namespace App\Http\Livewire\Authentication\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SimpleLoginComponent extends Component
{
    public $email;
    public $password;
    public $rememberMe = false;


    protected $rules = [
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required', 'min:4', 'max:6'],
    ];

    protected $messages = [
        'email.exists' => 'The email not exists in our record',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {


        if (!app()->environment('production')) {
            $this->email = "admin@zerocode.com";
            $this->password = "1412";
        }
    }


    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->rememberMe)) {

            return redirect()->route('app.home');
        }
        session()->flash('error', 'Invalid Credentials');
    }

    public function render()
    {
        return view('livewire.authentication.login.simple-login-component')
            ->extends('layouts.auth')
            ->section('content');
    }
}
