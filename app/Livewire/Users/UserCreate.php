<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Common;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class UserCreate extends Component
{   
    use WithFileUploads;

    public $menu, $institution_id, $user_type, $title, $fullname, $designation, $work_phone_number, $mobile_number, $status, $email, $username, $password, $password_confirmation, $institutions, $titles, $statusList, $image, $currentImage='', $userTypes='';
    
    public function mount(){
        $this->menu = "Users";
        $this->institutions = ['' => 'Please Select'] + Institution::orderBy('institutionName', 'ASC')->pluck('institutionName', 'id')->toArray();
        $this->titles = Common::$titles;
        $this->statusList = Common::$status;
        $this->userTypes = Common::$userTypes;
    }

    public function store(){

        $this->validate([
            'institution_id' => 'required',
            'user_type' => 'required|in:user,submitter',
            'fullname' => 'required|max:255',
            'status' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($this->image) {
            $imagePath= $this->image->store('uploads/users','public');
        } else {
            $imagePath = null;
        }

        if ($this->user_type === 'submitter') {
            User::where('institution_id', $this->institution_id)->update(['role' => 'user']);
        }

        User::create([
            'institution_id' => $this->institution_id,
            'role' => $this->user_type,
            'title' => $this->title ?? null,
            'fullname' => $this->fullname,
            'designation' => $this->designation ?? null,
            'work_phone_number' => $this->work_phone_number ?? null,
            'mobile_number' => $this->mobile_number ?? null,
            'status' => $this->status,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'added_by' => Auth::user()->id,
            'image' => $imagePath,
        ]);

        $this->reset();

        session()->flash('success', 'User created successfully!');        
        $this->redirect(route('user.list'), navigate: true);
    }

    public function render(){
        return view('livewire.users.user-create')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}