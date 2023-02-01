<?php

namespace App\Http\Livewire\Authentication\ChangePassword;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordComponent extends Component
{

    public string $oldPassword;
    public string $newPassword;
    public string $newPasswordConfrim;

    public function mount()
    {

        $this->oldPassword = '';
        $this->newPassword = '';
        $this->newPasswordConfrim = '';

    }

    protected $rules = [

        'oldPassword' => ['required'],
        'newPassword' => ['required', 'min:4'],
        'newPasswordConfrim' => ['required', 'same:newPassword', 'min:4'],


    ];

    protected $validationAttributes = [

        'oldPassword' => 'old password',
        'newPassword' => 'new password',
        'newPasswordConfrim' => 'new password confirm',

    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);

    }

    public function changePassword()
    {
        $this->validate();

        if (!Hash::check($this->oldPassword, auth()->user()->password)) {
            $this->addError('oldPassword', 'The old password does not matched');
            exit;
        }

        $user = User::find(auth()->user()->id)->update([
            'password' => Hash::make($this->newPassword)
        ]);

        if ($user) {

            session()->flash('password-changed', 'Password changed successfully.');

            Auth::logout();

        }

    }

    public function render()
    {
        return view('livewire.authentication.change-password.change-password-component');
    }
}
