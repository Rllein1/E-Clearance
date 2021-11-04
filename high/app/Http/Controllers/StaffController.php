<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Student_stat;
use App\Models\Clearance;
use App\Models\Assignatory;
use DataTables;

class StaffController extends Controller
{
    public function getmystudent(Request $request)
    {
        if ($request->ajax()) {

            $class = Auth::user()->account->adviser->advisory;
            $data=$class->students;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/staff/updatestatus/$row->id' class='edit btn btn-success btn-sm'>Update Status</a>";
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $name = $row->fname.' '.$row->lname;
                    return $name;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }
    }
    public function getclearance(Request $request){
        if ($request->ajax()) {
            $datas = Clearance::where("status",1)->get();
            foreach($datas as $data){
                foreach($data->assignatories as $assignatory){
                    if($assignatory->signatory_id == Auth::user()->account->owner_id){
                        $set[]=$assignatory->from;
                    }
                }
            }
            return Datatables::of($set)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='javascript:void(0)' onclick='showclearance($row->id)' class='edit btn btn-success btn-sm'>View</a>";
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $actionBtn = "<a href='javascript:void(0)' onclick='showstudent($row->id)' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>$row->name</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }
    }

    public function updatestatus($id)
    {
        $student=Student_stat::find($id);
        if($student->status== 0){
            $student->status=1;
            $student->save();
            return redirect()->back();
        }
        $student->status=0;
        $student->save();
        return redirect()->back();
    }

    public function remark($id){
        $datas=Clearance::find($id);
        foreach($datas->assignatories as $data){
            if($data->signatory_id==Auth::user()->account->owner_id){
                return response()->json($data);
            }
        }
        return 1;
    }

    public function viewclearance($id)
    {
        if ($request->ajax()) {
            $clearance = Clearance::find($id);
            $data=$clearance->requires;
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    //GETSTUDENT?????????????????????????????
    public function student(Request $request,$id)
    {
        if ($request->ajax()) {
            $student_stats = Student_stat::where('signatory_id',Auth::user()->account->owner_id)->get();
            foreach($student_stats as $stat){
                if($stat->assignatory->clearance_id==$id){
                    $data[]=$stat;
                }
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                $student=Student::find($row->student_id);
                $name=$student->fname.' '.$student->lname;
                return $name;
            })
            ->addColumn('action', function($row){
                $actionBtn = "<a href='http://127.0.0.1:8000/staff/updatestatus/$row->id' class='edit btn btn-success btn-sm'>Update Status</a>";
                return $actionBtn;
            })
            ->addColumn('status', function($row){
                if($row->status==0){
                    return "<p class='fw-bold text-danger'>Not Cleared</p>";
                }
                return "<p class='fw-bold text-success'>Clear</p>";
                                
            })
            ->addColumn('select', function($row){

                return "<input type='checkbox' value='$row->id' name='checkbox[]' class='checkbox'></input>";
            })
            ->rawColumns(['select','name','action','status'])
            ->make(true);
        }
    }

    //////////remark
    public function addremark(Request $req, $id){
        $assignatory=Assignatory::find($id);
        $remark="";
        foreach($req->addremark as $data){
            $remark=$remark.'</li><li>'.$data;
        }
        $remark='<ul>'.$remark.'</ul>';
        $assignatory->remark=$remark;
        $assignatory->save();
        return redirect()->back();
    }
    
    ///update student stat----
    public function select(Request $req){
        foreach($req->checkbox as $checkbox){
            StaffController::updatestatus($checkbox);
            return redirect()->back();
        }
    }

}
