<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Account;
use App\Models\Assignatory;
use App\Models\Adviser;
use App\Models\Signatory;
use App\Models\Schoolyear;
use App\Models\Clearance;
use App\Models\Student_stat;
use App\Models\Classe;
use App\Models\incharge;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class testcontroller extends Controller
{
    public function test()
    {
        // $test=Student_stat::find(4);

        // return($test->assignatory);

        $data=Auth::user()->account->owner;
        return($data);
    }

}
