<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use App\Models\Institution;
use App\Models\User;
use App\Models\Common;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;


class InstitutionShow extends Component
{
    public $menu, $institution,$institutionId;

    public function mount($id){
        $this->menu = "Institutions";
        $this->institution = Institution::findOrFail($id);
        $this->institutionId = $this->institution->id;
    }

    public function getInstitutionsUserData(){
        $institutionId = request()->institution_id;

        if(!empty($institutionId)){
            $user = User::where('institution_id', $institutionId)->select();

            return DataTables::of($user)
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })
                ->editColumn('status', function ($row) {
                    return view('common.status-buttons', $row);
                })
                ->make(true);
        }
    }

    public function render(){
        return view('livewire.institutions.institution-show')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}