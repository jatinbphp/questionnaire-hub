<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Common;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class UserEdit extends Component
{
    use WithFileUploads;

    public $menu, $user, $userId, $institution_id, $user_type, $title, $fullname, $designation, $work_phone_number, $mobile_number, $status, $email, $username, $password, $password_confirmation, $institutions, $titles, $statusList, $image, $currentImage, $userTypes;

    public function mount($id){
        $this->menu = "Users";
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->user_type = $user->role;
        $this->title = $user->title;
        $this->fullname = $user->fullname;
        $this->designation = $user->designation;
        $this->work_phone_number = $user->work_phone_number;
        $this->mobile_number = $user->mobile_number;
        $this->status = $user->status;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->institutions = ['' => 'Please Select'] + Institution::orderBy('institutionName', 'ASC')->pluck('institutionName', 'id')->toArray();
        $this->titles = Common::$titles;
        $this->statusList = Common::$status;
        $this->currentImage = $user->image; 
        $this->userTypes = Common::$userTypes;

        $existingInstitution = Institution::find($user->institution_id);

        if (!$existingInstitution) {
            $this->institution_id = ''; // Reset to "Please Select"
        } else {
            $this->institution_id = $user->institution_id;
        }

    }

    public function update(){
        $this->validate([
            'user_type' => 'required|in:user,submitter',
            'institution_id' => 'required',
            'fullname' => 'required|max:255',
            'status' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
            'username' => 'required|max:255|unique:users,username,' . $this->userId,
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($this->userId);

         if ($this->image) {

            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            
            $imagePath = $this->image->store('uploads/users','public');
        } else {
            $imagePath = $user->image;
        }

        if ($this->user_type === 'submitter') {
            User::where('institution_id', $this->institution_id)->update(['role' => 'user']);
        }
        
        $user->update([
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
            'password' => $this->password ? Hash::make($this->password) : $user->password,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'User updated successfully!');
        $this->redirect(route('user.list'), navigate: true);
    }

    public function render(){
        return view('livewire.users.user-edit')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
