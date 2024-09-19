<?php

namespace App\Http\Controllers\principle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShowingStudentsDataController extends Controller
{
    public function show_students_data(){
        $user = Auth::user();
        $campus = $user->campus;
        $students = User::where('role', 'student')
        ->where('campus', $campus)
        ->get();
        return view('principle.show _student_details',compact('students'));
    }

    public function student_information_add($id){
        $students = User::find($id);
        return view('principle.add_student_information_form',compact('students'));
    }

    public function adding_student_information(Request $request){

        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'class' => 'required',
            'date_of_birth' => 'required|date',
            'campus' => 'required',
            'roll_number' => 'required',
            'date_of_joining' => 'required|date',
            'reason_for_joining' => 'required',
            'city' => 'required',
            'country' => 'required',
            'favorite_food_dishes' => 'required',
            'ideal_personalities' => 'required',
            'self_introduction' => 'required',
            'fathers_name' => 'required',
            'fathers_age' => 'required|numeric',
            'fathers_job' => 'required',
            'fathers_whatsapp_number' => 'required',
            'mothers_name' => 'required',
            'mothers_age' => 'required|numeric',
            'mothers_job' => 'required',
            'mothers_whatsapp_number' => 'required',
            'number_of_siblings' => 'required|numeric',
            'plans_if_given_1_crore' => 'required',
            'biggest_wish' => 'required',
            'vision_for_10_years_ahead' => 'required',
            'students_whatsapp_number' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $add_student_information = new StudentInformation();
        $add_student_information->student_id = $request->input('student_id');
        $add_student_information->name = $request->input('name');
        $add_student_information->email = $request->input('email');
        $add_student_information->age = $request->input('age');
        $add_student_information->class = $request->input('class');
        $add_student_information->date_of_birth = $request->input('date_of_birth');
        $add_student_information->campus = $request->input('campus');
        $add_student_information->roll_number = $request->input('roll_number');
        $add_student_information->date_of_joining = $request->input('date_of_joining');
        $add_student_information->reason_for_joining = $request->input('reason_for_joining');
        $add_student_information->city = $request->input('city');
        $add_student_information->country = $request->input('country');
        $add_student_information->self_introduction = $request->input('self_introduction');
        $add_student_information->fathers_name = $request->input('fathers_name');
        $add_student_information->fathers_age = $request->input('fathers_age');
        $add_student_information->fathers_job = $request->input('fathers_job');
        $add_student_information->fathers_whatsapp_number = $request->input('fathers_whatsapp_number');
        $add_student_information->mothers_name = $request->input('mothers_name');
        $add_student_information->mothers_age = $request->input('mothers_age');
        $add_student_information->mothers_job = $request->input('mothers_job');
        $add_student_information->mothers_whatsapp_number = $request->input('mothers_whatsapp_number');
        $add_student_information->number_of_siblings = $request->input('number_of_siblings');
        $add_student_information->favorite_food_dishes = json_encode($request->input('favorite_food_dishes')); // Convert to JSON
        $add_student_information->plans_if_given_1_crore = $request->input('plans_if_given_1_crore');
        $add_student_information->biggest_wish = $request->input('biggest_wish');
        $add_student_information->vision_for_10_years_ahead = $request->input('vision_for_10_years_ahead');
        $add_student_information->ideal_personalities = json_encode($request->input('ideal_personalities')); // Convert to JSON
        $add_student_information->students_whatsapp_number = $request->input('students_whatsapp_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/profile_images');
            $add_student_information->profile_image = $path; // Save the correct path
        }
                // Handle NIC images upload
    if ($request->hasFile('nic_back_image')) {
        $file = $request->file('nic_back_image');
        $path = $file->store('public/nic_images');
        $add_student_information->nic_back_image = $path;
    }

    if ($request->hasFile('nic_front_image')) {
        $file = $request->file('nic_front_image');
        $path = $file->store('public/nic_images');
        $add_student_information->nic_front_image = $path;
    }
        $add_student_information->save();

    return redirect()->route('show_students_data')->with('success', 'Student added successfully');
}
}
