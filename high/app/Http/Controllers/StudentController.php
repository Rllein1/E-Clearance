<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clearance;
use App\Models\Student_stat;
use DataTables;

class StudentController extends Controller
{
    public function getclearance(Request $request)
    {
        if ($request->ajax()) {
            if(Auth::user()->account->student->grade < 11){
                $data = Clearance::where('level',"jhs")->where('status',1)->get();
            }else{
                $data = Clearance::where('level',"shs")->where('status',1)->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<button class='edit btn btn-success btn-sm viewbtn' onclick='clearanceinfo($row->id)'>View</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function requirements(Request $request)
    {
        if ($request->ajax()) {
            $data = Student_stat::where('student_id',Auth::user()->username)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = $row->signatory->name;
                    return $name;
                })
                ->addColumn('status', function($row){
                    if($row->status==0){
                        return "<p class='fw-bold text-danger'>Not Cleared</p>";
                    }
                    return "<p class='fw-bold text-success'>Clear</p>";
                })
                ->rawColumns(['name','status'])
                ->make(true);
        }
    }
}
