<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminDashboardController extends Controller
{
    public function admin(){
        $total_user = User::count();
        $total_admin = User::where('role','admin')->count();
        $total_teacher = User::where('role','teacher')->count();
        $total_student = User::where('role','student')->count();
        $total_principle = User::where('role','principle')->count();
        $total_korangi_students = User::where('role', 'student')->where('campus', 'Korangi')->count();
        $total_munawar_students = User::where('role', 'student')->where('campus', 'munawar')->count();
        $total_online_academy_students = User::where('role', 'student')->where('campus', 'Online_academy')->count();
        $total_Islamabad_students = User::where('role', 'student')->where('campus', 'Islamabad')->count();

        return view('admin.admin_dashboard',compact('total_user','total_admin', 'total_teacher', 'total_student','total_principle','total_korangi_students','total_Islamabad_students','total_munawar_students','total_online_academy_students'));
    }
    
    
}
