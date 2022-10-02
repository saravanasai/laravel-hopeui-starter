<?php

namespace App\Http\Livewire\Authentication\Register;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SimpleRegisterComponent extends Component
{

    public $fullName;
    public $email;
    public $password;
    public $password_confirmation;
    public $rememberMe = false;


    protected $rules = [
        'fullName' => ['required', 'alpha_dash'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:4', 'confirmed'],
        'password_confirmation' => ['required'],
    ];


    protected $messages = [
        'email.unique' => 'The email already exists in our record',
    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }




    public function mount()
    {

        if (!app()->environment('production')) {
            $this->fullName = "localUser" . rand(999, 9999);
            $this->email = "user" . rand(999, 9999) . "@zerocode.com";
            $this->password = "1412";
            $this->password_confirmation = "1412";
        }
    }


    public function register()
    {

        $this->validate();

        $user = User::create([
            "name" => $this->fullName,
            "email" => $this->email,
            "password" => Hash::make($this->password),
        ]);
        Auth::login($user, $this->rememberMe);

        return redirect()->route('app.home');
    }


    public function render()
    {
        return view('livewire.authentication.register.simple-register-component')
            ->extends('layouts.auth')
            ->section('content');
    }
}
