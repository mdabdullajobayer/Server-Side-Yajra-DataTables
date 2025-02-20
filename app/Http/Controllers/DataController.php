<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    public function getData()
    {
        $data = User::query();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function (User $user) {
                return $user->created_at->format('d-m-Y');
            })
            ->editColumn('name', function (User $user) {
                return 'Mr. ' . $user->name . '!';
            })
            ->removeColumn('password')
            ->addColumn('action', 'action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
