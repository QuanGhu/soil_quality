<?php

namespace App\Http\Controllers\Web\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Properties;
use App\Models\Rule;
use App\Models\Analyze;
use App\Models\SubAnalyze;
use Crud;
use DataTables;
use Auth;
use PDF;

class SoilQualityAssessmentController extends Controller
{

    public function __construct(Analyze $analyze, SubAnalyze $subanalyze)
    {
        $this->analyze = $analyze;
        $this->subanalyze = $subanalyze;
    }

    public function index()
    {
        return view('user.soilform.index');
    }

    public function new()
    {
        return view('user.soilform.new')
        ->with('criterias', Criteria::all());
    }

    public function list()
    {
        if(Auth::user()->user_level_id == 1)
        {
            $data = Crud::getAll($this->analyze, 'created_at','desc');
        } else {
            $data = Crud::getWhere($this->analyze, 'user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        }
        return DataTables::of($data)
        ->addColumn('action', function ($model) {
            return 
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <a href="'.route('customer.result', $model->id).'" class="btn btn-primary pd-x-25">Lihat Hasil</a>
                </div>';
        })->addIndexColumn()->make(true);
    }

    public function analyze(Request $request)
    {
        try {

            $arrChoosen = [];

            foreach($request->soil_criteria_id as $criteria)
            {
                $checkProperty = Rule::where('soil_criteria_id', $criteria)->first();
                
                array_push($arrChoosen, $checkProperty ? $checkProperty->property->name : null);
            }

            
            
            foreach($arrChoosen as $key => $value)
            {
                if(empty($value) || $value === "")
                unset($arrChoosen[$key]);
            }
            

            if($arrChoosen)
            {
                $result = array_count_values($arrChoosen);
                arsort($result);

                foreach($result as $an => $result)
                {
                    $modusValue = $an; 
                    break;
                }

                return $this->save($request, $modusValue);
            } else {

                return redirect()->back()->with('danger','Maaf kami tidak bisa menentukan hasil nya, silakan coba lagi')->withInput();
            }


        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function save(Request $request, $result)
    {
        try {
            
            $data = $request->all();
            $data['result'] = $result;
            $saveAnalyze = Crud::save($this->analyze, $data);

            foreach($request->soil_criteria_id as $criteria)
            {
                if($criteria) {
                    $findCriteria = Criteria::where('id', $criteria)->first();
                    $addSubAnalyze = new SubAnalyze;
                    $addSubAnalyze->soil_criteria = $findCriteria->name;
                    $addSubAnalyze->analyze_id = $saveAnalyze->id;
                    $addSubAnalyze->save();
                }
            }

            return $addSubAnalyze 
                ? redirect()->route('customer.result', $saveAnalyze->id)->with('success','Hasil Berhasil Ditentukan')
                : redirect()->back()->with('danger','Data Cannot Saved')->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function showResult($id)
    {
        $analyze = Analyze::where('id', $id)->first();
        $property = Properties::where('name', $analyze->result)->first();
        return view('user.soilform.result')
            ->with('anaylze' , $analyze)
            ->with('property', $property);
    }

    public function showListReport()
    {
        if(Auth::user()->user_level_id == 1)
        {
            $datas = Crud::getAll($this->analyze, 'created_at','desc');
        } else {
            $datas = Crud::getWhere($this->analyze, 'user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        }
        $pdf = PDF::loadView('pdf.monthly', ['datas' => $datas] );
        return $pdf->stream();
    }

    public function printDetail($id)
    {
        $analyze = Crud::getWhere($this->analyze, 'id',$id)->first();
        $property = Properties::where('name', $analyze->result)->first();
        $pdf = PDF::loadView('pdf.detail', ['anaylze' => $analyze, 'property' => $property] );
        return $pdf->stream();
    }
}
