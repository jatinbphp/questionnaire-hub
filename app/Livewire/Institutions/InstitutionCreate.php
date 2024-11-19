<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use App\Models\Common;

class InstitutionCreate extends Component
{
    use WithFileUploads;

    public $menu, $institutionName, $logo_image, $status, $statusList, $currentImage="";

    public function mount(){
        $this->menu = "Institutions";
        $this->statusList = Common::$status;
    }

    public function store(){

        $this->validate([
            'institutionName' => 'required|max:255',
            'logo_image' => 'nullable|image|max:1024',
            'status' => 'required',
        ]);

        if ($this->logo_image) {
            $imagePath= $this->logo_image->store('uploads/institutions','public');

        } else {
            $imagePath = null;
        }

        $institution = Institution::create([
            'institutionName' => $this->institutionName,
            'status' => $this->status,
            'added_by' => Auth::id(),
            'logo_image' =>$imagePath,
        ]);

        session()->flash('message', 'Institution created successfully.');
        $this->redirect(route('institution.list'), navigate: true);
    }

    public function render(){
        return view('livewire.institutions.institution-create')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
