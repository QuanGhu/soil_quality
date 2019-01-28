<?php

namespace App\Http\Controllers\Web\Soil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Criteria;
use App\Models\Rule;
use DataTables;
use Crud;
use Validator;

class RuleController extends Controller
{
    public function __construct(Properties $property)
    {
        $this->table = $property;
    }

    public function index()
    {
        return view('admin.rule.index');
    }

    public function new()
    {
        return view('admin.rule.new')
            ->with('properties', Properties::orderBy('code_name','asc')->pluck('name','id'))
            ->with('criterias', Criteria::orderBy('code_name','asc')->get());
    }

    public function list()
    {
        return DataTables::of(Crud::base($this->table)->has('rules')->get())
        ->addColumn('rule', function($model) {
            return 'Aturan';
        })
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

            foreach($request->soil_criteria_id as $criteria)
            {
                $addRule = new Rule;
                $addRule->soil_properties_id = $request->soil_properties_id;
                $addRule->soil_criteria_id = $criteria;
                $addRule->save();
            }

            return $addRule 
                ? redirect()->route('property.rule.index')->with('success','Ketentuan Baru Berhasil Disimpan')
                : redirect()->back()->with('danger','Data Cannot Saved')->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

}
