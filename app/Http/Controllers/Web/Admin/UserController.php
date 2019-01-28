<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function list()
    {
        return DataTables::of(Users::orderBy('id', 'asc')->get())
        ->addColumn('level', function($model) {
            return $model->level->name;
        })
        ->addIndexColumn()->make(true);
    }
}
