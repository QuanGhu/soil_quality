<?php

namespace App\Http\Controllers\Web\Soil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Criteria;
use DataTables;
use Crud;
use Validator;

class CriteriaController extends Controller
{
    public function __construct(Criteria $criteria)
    {
        $this->table = $criteria;
    }

    public function index()
    {
        return view('admin.soilcriteria.index');
    }

    public function list()
    {
        return DataTables::of(Crud::getAll($this->table, 'code_name', 'asc'))
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
                'code_name' => 'unique:soil_criteria',
                'name' => 'unique:soil_criteria'
            ]);

            if ($validate->fails())
                return response()->json(['message' => 'Kode atau nama telah terpakai'], 400);

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
                'code_name' => 'unique:soil_criteria,code_name,'.$request->id,
                'name' => 'unique:soil_criteria,name,'.$request->id
            ]);

            if ($validate->fails())
                return response()->json(['message' => 'Kode atau nama telah terpakai'], 400);

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
