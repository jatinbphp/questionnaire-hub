<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use Yajra\DataTables\DataTables;
use App\Models\Institution;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Common;

class InstitutionList extends Component
{
    public $menu;

    public function mount(){
        $this->menu = "Institutions";
    }

    public function deleteRecord($institutionId){

        $institution = Institution::find($institutionId);
        if ($institution) {

            $users = User::where('institution_id', $institutionId)->count();

            if($users>0){
                return response()->json(['error' => 'You cannot delete this institution because it is currently assigned to users.'], 401);    
            }

            $institution->delete();
            return response()->json(['success' => 'Institution deleted successfully!']);
        } else {
            return response()->json(['error' => 'Institution not found.']);
        }
    }

    public function getInstitutionsData(){
        return DataTables::of(Institution::with('submitter'))
            ->addColumn('submitter_name', function ($row) {
                $title = $row->submitter->title ?? ''; // Get title or set to empty if not available
                $fullname = $row->submitter->fullname ?? '-'; // Get fullname or set to '-' if not available

                return trim("$title $fullname") ?: '-'; // Return the combined title and fullname or '-'
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('status', function ($row) {
                return view('common.status-buttons', $row);
            })
            ->addColumn('actions', function ($row) {
                return view('livewire.institutions.institution-actions', ['institution' => $row]);
            })
            ->rawColumns(['actions', 'submitter_name'])
            ->make(true);
    }

    public function render(){
        return view('livewire.institutions.institution-list')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
