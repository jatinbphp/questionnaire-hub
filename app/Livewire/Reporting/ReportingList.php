<?php

namespace App\Livewire\Reporting;

use Livewire\Component;
use Yajra\DataTables\DataTables;
use App\Models\Institution;
use App\Models\QuestionAnswer;
use Carbon\Carbon;
use App\Models\Common;
use App\Models\InstitutionsCompletedSection;

class ReportingList extends Component
{
    public $menu;

    public function mount(){
        $this->menu = "Reporting";
    }

    public function getInstitutionsData(){
        return DataTables::of(Institution::select())
            ->editColumn('progress_bar', function ($row) {
                $totalQuestions = InstitutionsCompletedSection::where('institution_id', $row->id)->count();

                $percentage = ($totalQuestions > 0) ? round(($totalQuestions * 100) / 8, 1) : 0;

                return view('common.progress-bar', ['percentage' => $percentage])->render();
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('status', function ($row) {
                return view('common.status-buttons', $row);
            })
            ->addColumn('actions', function ($row) {
                return view('livewire.reporting.reporting-actions', ['reporting' => $row]);
            })
            ->rawColumns(['actions','progress_bar'])
            ->make(true);
    }

    public function render(){
        return view('livewire.reporting.reporting-list')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}
