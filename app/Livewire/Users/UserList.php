<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Common;

class UserList extends Component
{
    public $menu;

    public function mount(){
        $this->menu = "Users";
    }

    public function deleteRecord($userId) {
        $user = User::whereIn('role', ['user', 'submitter'])->find($userId);
        if ($user) {
            if($user->role=='submitter'){
                return response()->json(['error' => 'Deletion of a submitter is not permitted. If you need to remove a submitter, please create a new one instead.'], 400);    
            }
            $user->delete();
            return response()->json(['success' => 'User deleted successfully!'], 200);
        } else {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    public function getUsersData(){
        return DataTables::of(User::with('institution')->whereIn('role', ['user', 'submitter']))
            ->addColumn('institution_name', function ($row) {
                return $row->institution->institutionName ?? '-';
            })
            ->addColumn('role', function ($row) {
                if ($row->role === 'user') {
                    return '<span class="badge bg-success">User</span>';
                } elseif ($row->role === 'submitter') {
                    return '<span class="badge bg-danger">Submitter</span>';
                }
            })
            ->editColumn('fullname', function ($row) {
                return $row->title . ' ' . $row->fullname;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('status', function ($row) {
                return view('common.status-buttons', $row);
            })
            ->addColumn('actions', function ($row) {
                return view('livewire.users.user-actions', ['user' => $row]);
            })
            ->filterColumn('institution_name', function ($query, $keyword) {
                $query->whereHas('institution', function ($q) use ($keyword) {
                    $q->where('institutionName', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['actions', 'role'])
            ->make(true);
    }

    public function getUsersDataOld(){
        return DataTables::of(User::with('institution')->whereIn('role', ['user', 'submitter']))
            ->addColumn('institution_name', function ($row) {
                return $row->institution->institutionName ?? '-';
            })
            ->addColumn('role', function ($row) {
                if ($row->role === 'user') {
                    return '<span class="badge bg-success">User</span>';
                } elseif ($row->role === 'submitter') {
                    return '<span class="badge bg-danger">Submitter</span>';
                }
            })
            ->editColumn('fullname', function ($row) {
                return $row->title.' '.$row->fullname;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('status', function ($row) {
                return view('common.status-buttons', $row);
            })
            ->addColumn('actions', function ($row) {
                return view('livewire.users.user-actions', ['user' => $row]);
            })
            ->rawColumns(['actions', 'role'])
            ->make(true);
    }

    public function render(){
        return view('livewire.users.user-list')->extends('layouts.app', ['menu' => $this->menu])->section('content');
    }
}