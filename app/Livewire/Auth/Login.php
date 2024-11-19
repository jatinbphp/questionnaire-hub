<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class Login extends Component
{
    public $username;
    public $password;

    public function login(){
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check if the user exists
        $user = User::where('username', $this->username)->first();

        // Check if the user exists
        if (!$user) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        /*// Check if any user from the same institution is already logged in
        $activeUser = User::where('id', '!=', $user->id)->where('institution_id', $user->institution_id)->where('is_active', true)->whereIn('role', ['user', 'submitter'])->first();

        if ($activeUser) {
            throw ValidationException::withMessages([
                'username' => [$activeUser['fullname'].', is already logged in from this institution.'],
            ]);
        }*/

        // Attempt to log in
        if (!Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Set user as active
        $user->is_active = true; // Mark user as active
        $user->save();

        // Redirect based on user role
        if (in_array(Auth::user()->role, ['user', 'submitter'])) {
            $this->redirect(getRoleWiseHomeUrl(), navigate: true);
            return;
        }

        $this->redirect(getRoleWiseHomeUrl(), navigate: true);
    }

    public function render(){
        return view('livewire.auth.login')->extends('layouts.authentication', ['menu' => 'Login'])->section('content');
    }
}

