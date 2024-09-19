<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function redirect(){
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 'admin')
            {
                return redirect()->route('admin');
            }
            else if ($role == 'teacher') 
            {
                return redirect()->route('teacher');
            }
            else if ($role == 'student')
            {
                return redirect()->route('student_dashboard');
            }
            else if ($role == 'principle')
            {
                return redirect()->route('principle');
            }
            
           
        }
        return redirect()->route('login'); 
    }
    
}
