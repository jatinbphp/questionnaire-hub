<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Institution;
use App\Models\Common;
use Illuminate\Support\Facades\Auth;

class InstitutionEdit extends Component
{
    use WithFileUploads;

    public $menu, $id, $institution, $institutionName, $logo_image, $status, $statusList, $currentImage;

    public function mount($id){
        $this->menu = "Institutions";
        $institution = Institution::findOrFail($id);
        $this->id = $institution->id;
        $this->institutionName = $institution->institutionName;
        $this->status = $institution->status;
        $this->statusList = Common::$status;
        $this->currentImage = $institution->logo_image; 
    }

    public function update(){

        $this->validate([
            'institutionName' => 'required|max:255',
            'logo_image' => 'nullable|image|max:1024',
            'status' => 'required',
        ]);

        $institution = Institution::findOrFail($this->id);

        if ($this->logo_image) {
            if ($institution->logo_image && file_exists(public_path($institution->logo_image))) {
                unlink(public_path($institution->logo_image));
            }
            $imagePath = $this->logo_image->store('uploads/institutions','public');
        } else {
            $imagePath = $institution->logo_image;
        }

        $institution->update([
            'institutionName' => $this->institutionName,
            'status' => $this->status,
            'logo_image' => $imagePath,
        ]);

        session()->flash('success', 'Institution updated successfully.');
        $this->redirect(route('institution.list'), navigate: true);
    }

    public function render(){
        return view('livewire.institutions.institution-edit')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}