<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Institution;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $menu, $userCount, $institutionCount, $inProgressApplication, $completedApplication;

    public function mount(){
        $this->menu = "Dashboard";
        $this->userCount = User::whereIn('role', ['user', 'submitter'])->count();
        $getInstitutions = Institution::where('status', 'active')->get();
        $this->institutionCount = count($getInstitutions);

        $institutions = Institution::find($getInstitutions);
        $inProgressApplication = 0;
        $completedApplication = 0;
        if(!empty($institutions)){
            foreach ($institutions as $key => $value) {
                $results = InstitutionsCompletedSection::select('id')->where('status', 1)->where('institution_id', $value->id)->count();

                if($results==8){
                    $completedApplication++;
                } else {
                    $inProgressApplication++; 
                }
                
            }
        }
        $this->completedApplication = $completedApplication;
        $this->inProgressApplication = $inProgressApplication;
        
                   
    }

    public function render(){
        return view('livewire.dashboard')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
