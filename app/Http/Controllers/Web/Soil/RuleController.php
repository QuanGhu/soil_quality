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
            $arr = [];
            foreach($model->rules as $rule)
            {
                array_push($arr, ' '.$rule->criteria->name);
            };

            return $arr;
        })
        ->addColumn('action', function ($model) {
            return 
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-primary pd-x-25">Lihat</a>
                    <a href="#" class="btn btn-warning pd-x-25">Edit</a>
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
