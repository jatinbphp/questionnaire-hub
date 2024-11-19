<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Common;

class UserShow extends Component
{
    public $menu, $user, $statusList;

    public function mount($id){
        $this->menu = "Users";
        $this->user = User::with('institution')->whereIn('role', ['user', 'submitter'])->findOrFail($id);
        $this->statusList = Common::$status;
    }

    public function render(){
        return view('livewire.users.user-show')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}