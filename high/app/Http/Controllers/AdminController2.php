<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Adviser;
use App\Models\Account;
use App\Models\Incharge;
use App\Models\Classe;
use App\Models\Signatory;
use App\Models\Schoolyear;
use App\Models\Clearance;
use App\Models\Assignatory;
use App\Models\Student_stat;
use DataTables;

class AdminController2 extends Controller
{

// For STAFF ---------------------------------------------------------------------------------------------------------------------------------

    //ADVISER----
    public function getAdvisers(Request $request)
    {
        if ($request->ajax()) {
            $data = Adviser::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $id=$row->owned->user_id;
                    $actionBtn = "<button class='edit btn btn-success btn-sm empbtn' onclick='userinfo($id)'>Edit</button>";
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $name = $row->fname.' '.$row->lname;
                    return $name;
                })
                ->addColumn('class', function($row){
                    if($row->advisory==null){
                        return('N/A');
                    }
                    $class = $row->advisory->gradelevel.'-'.$row->advisory->name;
                    return $class;
                })
                ->rawColumns(['action','name','class'])
                ->make(true);
        }
    }

    public function storeAdviser(Request $req)
    {
        $adviser=New Adviser;
        $adviser->fname=$req->fname;
        $adviser->lname=$req->lname;
        $adviser->save();

        $user=New User;
        $user->username=$req->username;
        $user->password=Hash::make($user->username);
        $user->rank=2;
        $user->save();

        $account=New Account;
        $account->user_id= $user->id;
        $account->owner_id= $adviser->id;
        $account->position='adviser';
        $account->save();

        return redirect()->back();
    }
    //end of ADVISER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    //Signatory--------
    public function getSignatorys(Request $request)
    {
        if ($request->ajax()) {
            $data = Signatory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $id=$row->owned->user_id;
                    $actionBtn = "<button class='edit btn btn-success btn-sm empbtn' onclick='userinfo($id)'>Edit</button>";
                    return $actionBtn;
                })
                ->addColumn('incharge', function($row){
                    $head=Incharge::find($row->incharge_id);
                    $incharge=$head->fname.' '.$head->lname;
                    return $incharge;
                })
                ->rawColumns(['action','incharge'])
                ->make(true);
        }
    }

    public function storeSignatory(Request $req)
    {
        $signatory=New Signatory;
        $signatory->name=$req->signatory;
        $signatory->incharge_id=$req->incharge;
        $signatory->save();

        $user=New User;
        $user->username=$req->username;
        $user->password=Hash::make($user->username);
        $user->rank= 2 ;
        $user->save();

        $account=New Account;
        $account->user_id= $user->id;
        $account->owner_id= $signatory->id;
        $account->position='signatory';
        $account->save();

        return redirect()->back();
    }

    public function incharge()
    {
    $incharges= Incharge::all();
    return($incharges);
    }
        //incharge-----
            public function storeIC(Request $req)
            {
                $incharge=New Incharge;
                $incharge->fname=$req->fname;
                $incharge->lname=$req->lname;
                $incharge->save();
                return redirect()->back();
            }

            public function getincharge(Request $request)
            {
                if ($request->ajax()) {
                    $data = Incharge::latest()->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $actionBtn = "<button name='$row->id' class='edit btn btn-success btn-sm empbtn' onclick='userinfo($row->id)'>Edit</button>";
                            return $actionBtn;
                        })
                        ->addColumn('name', function($row){
                            $name = $row->fname.' '.$row->lname;
                            return $name;
                        })
                        ->addColumn('dept', function($row){
                            $dept = $row->department;
                            if($dept==null){
                                return('N/A');
                            }
                            return $dept->name;
                        })
                        ->rawColumns(['action','name','dept'])
                        ->make(true);
                }
            }
        //end of incharge>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//END OF STAFF

// For Class ---------------------------------------------------------------------------------------------------------------------------------
    public function storeClass(Request $req)
    {
        $class=New Classe;
        $class->name=$req->section;
        $class->gradelevel=$req->grade;
        $class->adviser_id=$req->adviser;
        $class->save();
        return redirect()->back();
    }

    public function getClass(Request $request)
    {
        if ($request->ajax()) {
            $data = Classe::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<button name='$row->id' class='edit btn btn-success btn-sm empbtn' onclick='userinfo($row->id)'>Edit</button>";
                    return $actionBtn;
                })
                ->addColumn('adviser', function($row){
                    $teacher=Adviser::find($row->adviser_id);
                    $adviser=$teacher->fname.' '.$teacher->lname;
                    return $adviser;
                })
                ->rawColumns(['action','adviser'])
                ->make(true);
        }
    }
    public function teacher()
    {
        $teachers = Adviser::all();
        foreach($teachers as $teacher){
            if($teacher->advisory==null){
                $data[]=$teacher;
            }
        }
        return($data);
    }
//END OF CLASS


// For STUDENT ---------------------------------------------------------------------------------------------------------------------------------
    public function storeStudent(Request $req)
    {
        $student=New Student;
        $student->fname=$req->fname;
        $student->lname=$req->lname;
        $student->grade=$req->gradelevel;
        $student->class_id=$req->class;
        $student->save();

        $user=New User;
        $user->username=$student->id;
        $user->password=Hash::make('acdclearance');
        $user->rank=3;
        $user->save();

        $account=New Account;
        $account->user_id= $user->id;
        $account->owner_id= $student->id;
        $account->position='student';
        $account->save();

        return redirect()->back();
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $id=$row->owned->user_id;
                    $actionBtn = "<button class='edit btn btn-success btn-sm empbtn' onclick='userinfo($id)'>Edit</button>";
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $student=$row->fname.' '.$row->lname;
                    return $student;
                })
                ->addColumn('class', function($row){
                    $class=Classe::find($row->class_id);
                    $class=$class->name;
                    return $class;
                })
                ->rawColumns(['action','name','class'])
                ->make(true);
        }
    }

    public function classes(Request $req)
    {
        $classes = Classe::where("gradelevel",$req->grade)->get();
        return($classes);
    }
//END OF STUDENT



// For SCHOOLYEAR ---------------------------------------------------------------------------------------------------------------------------------
    public function storeSchoolyear(Request $req)
    {
        $schoolyear=New Schoolyear;
        $schoolyear->schoolyear=$req->schoolyear;
        $schoolyear->status=1;

        $existSY = Schoolyear::where('schoolyear',$req->schoolyear)->get();
            if($existSY->isempty()){
                $prevSY = Schoolyear::where('status',1)->get();
                foreach($prevSY as $SY){
                    $SY->status=0;
                    $SY->save();
                }
                $schoolyear->save();
                return redirect()->back();
            }
            return back()->withErrors([
                '       Error: Schoolyear Already Exist         ',
            ]);
    }

    public function getSY(Request $request)
    {
        if ($request->ajax()) {
            $data = Schoolyear::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $statusBtn = "<a href='http://127.0.0.1:8000/admin/SYactive/$row->id' class='edit btn btn-success btn-sm'>Active</a>";
                        return $statusBtn;
                    }else{
                        $statusBtn = "<a href='http://127.0.0.1:8000/admin/SYactive/$row->id' class='edit btn btn-danger btn-sm'>Inactive</a>";
                        return $statusBtn;
                    }
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    }

    public function SYactive($id){
        $data=Schoolyear::find($id);
        if($data->status==0){
            $sys=Schoolyear::where('status',1)->get();
            foreach($sys as $sy){
                $sy->status=0;
                $sy->save();
            }
            $data->status=1;
            $data->save();
            return redirect()->back();
        }
        $data->status=0;
        $data->save();
        return redirect()->back();
    }

//END OF SCHOOLYEAR

// For Clearance ---------------------------------------------------------------------------------------------------------------------------------
    public function clearanceindex()
    {
        $schoolyears = Schoolyear::where('status',1)->get();
        foreach($schoolyears as $schoolyear){
            $schoolyear;
        }
        return view('pages/admin/create_clearance')->with('schoolyear',$schoolyear);
    }

    public function getclearance(Request $request)
    {
        if ($request->ajax()) {
            $data = Clearance::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $statusBtn = "<a href='http://127.0.0.1:8000/admin/Clearanceactive/$row->id' class='edit btn btn-success btn-sm'>Active</a>";
                        return $statusBtn;
                    }else{
                        $statusBtn = "<a href='http://127.0.0.1:8000/admin/Clearanceactive/$row->id' class='edit btn btn-danger btn-sm'>Inactive</a>";
                        return $statusBtn;
                    }
                })
                ->addColumn('name', function($row){
                    $name = "<a href='#' onclick='showassignatory($row->id)' class='' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>$row->name</a>";
                    return $name;
                })
                ->rawColumns(['action','status','name'])
                ->make(true);
        }
    }

    public function Clearanceactive($id){
        $data=Clearance::find($id);
        if($data->level =='jhs'){
            if($data->status==0){
                $clearances=Clearance::where("level",'jhs')->where("status",1)->get();
                foreach($clearances as $clearance){
                    $clearance->status=0;
                    $clearance->save();
                }
                $data->status=1;
                $data->save();
                return redirect()->back()->withErrors([
                    $data->name.'  Active',
                ]);;
            }
            $data->status=0;
            $data->save();
            return redirect()->back();
        }
        if($data->status==0){
            $clearances=Clearance::where("level",'shs')->where("status",1)->get();
            foreach($clearances as $clearance){
                $clearance->status=0;
                $clearance->save();
            }
            $data->status=1;
            $data->save();
            return redirect()->back()->withErrors([
                $data->name.'  Active',
            ]);;
        }
        $data->status=0;
        $data->save();
        return redirect()->back();
    }

    public function assignatory()
    {
        $signatory = Signatory::all();
        return($signatory);
    }

    public function storeClearance(Request $req)
    {
        $sys=Schoolyear::where('status',1)->get();
        foreach($sys as $sy){
            $sy;       
        }

        $clearance=New Clearance;
        if($req->sem!=null && $req->gradelevel== 'shs'){
            $clearance->name="SHSclearance-(".$sy->schoolyear.'/'.$req->sem.'-sem)';
        }else{
            $clearance->name="JHSclearance-(".$sy->schoolyear.')';
        }
        $clearance->schoolyear_id=$sy->id;
        $clearance->level=$req->gradelevel;
        $clearance->status=1;

        $existclearances=Clearance::where('name',$clearance->name)->get();
        foreach($existclearances as $existclearance){
            if($existclearance->name == $clearance->name){
                return back()->withErrors([
                    '       Error: Clearance Already Exist        '.$clearance->name,
                ]);
            }  
        }
        $clearance->save();

        foreach($req->signatory as $signatory){
            $assignatory=New Assignatory;
            $assignatory->clearance_id=$clearance->id;
            $assignatory->signatory_id=$signatory;
            $assignatory->remark='';
            $assignatory->save();

            if($clearance->level=='jhs'){
                $students=DB::select('select * from students where grade < ?', [11]);
            }else{
                $students=DB::select('select * from students where grade > ?', [10]);
            }

            foreach($students as $student){
                $status=New Student_stat;
                $status->student_id=$student->id;
                $status->assignatory_id=$assignatory->id;
                $status->signatory_id=$signatory;
                $status->status=0;
                $status->remark='';
                $status->save();         
            } 

        }
        return redirect()->back();

    }

    public function showassignatory(Request $request,$id)
    {
        if ($request->ajax()) {
            $clearance = Clearance::find($id);
            $data=$clearance->assignatories;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<button class='edit btn btn-danger btn-sm' >Delete</button>";
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    return $name=$row->signatory->name;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }
    }


//END OF CLEARANCE
//Update------------------------------------------------------------------

    //UPDATE USER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function updateuser(Request $req,$id){   //////// changeeeeeeeeeeeeeeeeee
        $user=User::find($id);
        $user->password=Hash::make($req->newpassword);
        $user->save();
        return redirect()->back();
    }
    //END UPDATE USER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


}
