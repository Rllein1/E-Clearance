<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->rank== 1){
                return redirect()->route('admin.clearance');
            }
            elseif(Auth::user()->rank==2){
                return redirect()->route('staff.clearance');
            }
            elseif(Auth::user()->rank==3){
                return redirect()->route('student.myclearance');
            }
            
        }
        return back()->withErrors([
            '       Error: Invalid user         ',
        ]);
    }
}
