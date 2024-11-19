<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Common;
use App\Models\Institution;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class EditProfile extends Component
{   
    use WithFileUploads;

    public $menu, $institution_id, $title, $fullname, $designation, $work_phone_number, $mobile_number, $status, $email, $username, $password, $password_confirmation, $institutions, $titles, $statusList, $image, $currentImage='';

    public function mount(){
        $this->menu = "Edit Profile";
        $this->institutions = ['' => 'Please Select'] + Institution::where('status', 'active')->pluck('institutionName', 'id')->toArray();
        $user = Auth::user();
        $this->titles = Common::$titles;
        $this->username = $user->username;
        $this->fullname = $user->fullname;
        $this->email = $user->email;
        $this->currentImage = $user->image; 
        $this->institution_id = $user->institution_id;
        $this->title = $user->title;
        $this->designation = $user->designation;
        $this->work_phone_number = $user->work_phone_number;
        $this->mobile_number = $user->mobile_number;
        
    }

    public function updateProfile(){

        $rules = [
            'username' => 'required|unique:users,username,' . Auth::id(),
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Check if the user has the 'user' role and add additional validation rules
        if (Auth::user() && in_array(Auth::user()->role, ['user', 'submitter'])) {
            $rules = array_merge($rules, [
                'designation' => 'required',
                'work_phone_number' => 'required',
                'mobile_number' => 'required',
            ]);
        }

        $this->validate($rules);
        $user = Auth::user();
        if ($this->image) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $imagePath = $this->image->store('uploads/users','public');
        } else {
            $imagePath = $user->image;
        }

        $data = [
            'title' => $this->title,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
            'image' => $imagePath,
        ];

        if (Auth::user() && in_array(Auth::user()->role, ['user', 'submitter'])) {
            $data = array_merge($data, [
                'designation' => $this->designation,
                'work_phone_number' => $this->work_phone_number,
                'mobile_number' => $this->mobile_number,
            ]);
        }

        // Perform the update
        $user->update($data);


        session()->flash('success', 'Profile updated successfully.');
        $this->redirect(route('profile.edit'), navigate: true);
    }

    public function render(){
        return view('livewire.edit-profile')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}