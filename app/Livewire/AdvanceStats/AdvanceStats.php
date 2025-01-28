<?php

namespace App\Livewire\AdvanceStats;

use Livewire\Component;
use App\Models\Institution;

class AdvanceStats extends Component
{
    public $menu, $institutionData, $sectionId;

    public function mount($section_id){
        $this->menu = "Advance Stats";
        $this->institution = Institution::all();
        $this->sectionId = $section_id;
    }

    public function render(){
        return view('livewire.advance-stats.advance-stats')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
