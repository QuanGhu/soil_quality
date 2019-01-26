<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;
use DataTables;
use Crud;
use Validator;

class UserLevelController extends Controller
{
    public function __construct(Level $level)
    {
        $this->table = $level;
    }

    public function index()
    {
        return view('admin.level.index');
    }

    public function list()
    {
        return DataTables::of(Crud::getAll($this->table, 'name', 'asc'))
        ->addColumn('action', function ($model) {
            return 
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm btn-primary edit" style="padding: 0.45rem .7rem;"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-sm btn-danger delete" style="padding: 0.45rem .7rem;"><i class="fa fa-trash"></i></button>
                </div>';
        })->addIndexColumn()->make(true);
    }

    public function save(Request $request)
    {
        try {

            $validate = Validator::make($request->all(),[
                'name' => 'unique:user_level'
            ]);

            if ($validate->fails())
                return response()->json(['message' => 'Nama telah terpakai'], 400);

            $data = $request->all();
            $store = Crud::save($this->table, $data);
            
            return $store ? response()->json(['message' => 'Data Berhasil Disimpan'], 200)
                          : response()->json(['message' => 'Data Gagal Untuk Disimpan'], 400);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        try {

            $validate = Validator::make($request->all(),[
                'name' => 'unique:user_level,name,'.$request->id
            ]);

            if ($validate->fails())
                return response()->json(['message' => 'Nama telah terpakai'], 400);

            $data = $request->except('_token','type','id');
            $update = Crud::update($this->table,'id',$request->id,$data);
            
            return $update ? response()->json(['message' => 'Data Berhasil Diperbarui'], 200)
                          : response()->json(['message' => 'Data Gagal Untuk Diperbarui'], 400);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {

            $delete = Crud::delete($this->table,'id',$request->id);
            
            return $delete ? response()->json(['message' => 'Data Berhasil Dihapus'], 200)
                          : response()->json(['message' => 'Data Gagal Untuk Dihapus'], 400);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
