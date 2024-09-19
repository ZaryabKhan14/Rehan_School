<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff_Information;

class AddStaffInformationController extends Controller
{

    public function showing_staff(){
        $show_staff = User::where('role', 'principle')
        ->orWhere('role', 'teacher')
        ->get();
        return view('admin.staff',compact('show_staff'));
    }

    public function staff_information_form($id){
        $staff = User::find($id);
        return view('admin.add_staff_information_form',compact('staff'));
    }

    public function add_staff_information(Request $request){

        $adding_staff_information = new Staff_Information();

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('public/staff_profile_images');
            $adding_staff_information->profile_image = $path;
        }
    
        if ($request->hasFile('nic_front')) {
            $file = $request->file('nic_front');
            $path = $file->store('public/staff_nic_front');
            $adding_staff_information->nic_front = $path;
        }
    
        if ($request->hasFile('nic_back')) {
            $file = $request->file('nic_back');
            $path = $file->store('public/staff_nic_back');
            $adding_staff_information->nic_back = $path;
        }
    
        // Save other form data
        $adding_staff_information->full_name = $request->input('full_name');
        $adding_staff_information->campus = $request->input('campus');
        $adding_staff_information->date_of_birth = $request->input('date_of_birth');
        $adding_staff_information->gender = $request->input('gender');
        $adding_staff_information->nationality = $request->input('nationality');
        $adding_staff_information->contact_number = $request->input('contact_number');
        $adding_staff_information->email_address = $request->input('email_address');
        $adding_staff_information->residential_address = $request->input('residential_address');
        $adding_staff_information->position_role = $request->input('position_role');
        $adding_staff_information->date_of_joining = $request->input('date_of_joining');
        $adding_staff_information->employee_id = $request->input('employee_id');
        $adding_staff_information->qualifications_certifications = $request->input('qualifications_certifications');
        $adding_staff_information->previous_work_experience = $request->input('previous_work_experience');
        $adding_staff_information->special_skills = $request->input('special_skills');
        $adding_staff_information->emergency_contact_details = $request->input('emergency_contact_details');
        $adding_staff_information->highest_degree_earned = $request->input('highest_degree_earned');
        $adding_staff_information->institutions_attended = $request->input('institutions_attended');
        $adding_staff_information->graduation_year = $request->input('graduation_year');
        $adding_staff_information->additional_courses = $request->input('additional_courses');
        $adding_staff_information->medical_history = $request->input('medical_history');
        $adding_staff_information->allergies = $request->input('allergies');
        $adding_staff_information->health_conditions = $request->input('health_conditions');
        $adding_staff_information->bank_name = $request->input('bank_name');
        $adding_staff_information->account_number = $request->input('account_number');
        $adding_staff_information->account_holder_name = $request->input('account_holder_name');
        $adding_staff_information->basic_salary = $request->input('basic_salary');
        $adding_staff_information->bank_branch = $request->input('bank_branch');
    
        $adding_staff_information->save();
    
        return redirect()->back()->with('success', 'Staff information added successfully!');
    }
}
