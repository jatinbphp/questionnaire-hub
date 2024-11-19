<?php

namespace App\Livewire\Reporting;

use Livewire\Component;
use App\Models\Institution;
use App\Models\User;
use App\Models\Common;
use App\Models\InstitutionsCompletedSection;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ReportingShow extends Component
{   
    public $menu, $institution,$institutionId, $sectionId, $percentage;

    public function mount($id, $section_id){
        $this->menu = "Reporting";
        $this->institution = Institution::findOrFail($id);
        $this->institutionId = $this->institution->id;
        $this->sectionId = $section_id;
        $totalQuestions = InstitutionsCompletedSection::where('institution_id', $this->institution->id)->count();
        $this->percentage = ($totalQuestions > 0) ? round(($totalQuestions * 100) / 8, 1) : 0;
    }

    public function render(){
        return view('livewire.reporting.reporting-show')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }

    public function startLoading(){
    }
}
