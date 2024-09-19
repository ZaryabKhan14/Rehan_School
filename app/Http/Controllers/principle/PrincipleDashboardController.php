<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PrincipleDashboardController extends Controller
{
    public function principle(){
        $user = Auth::user();
        $campus = $user->campus;


        $total_user = User::where('campus',$campus)->count();
        $total_principle = User::where('role','principle')->where('campus',$campus)->count();
        $total_teacher = User::where('role','teacher')->where('campus',$campus)->count();
        $total_student = User::where('role','student')->where('campus',$campus)->count();
        return view('principle.principle_dashboard',compact('total_user','total_principle', 'total_teacher', 'total_student'));
    }
}
