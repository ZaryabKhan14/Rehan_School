<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInformation;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentINformationController extends Controller
{
    public function show_student_information(){
        $students_information = StudentInformation::all();
        return view('admin.show_student_add_information',compact('students_information'));
    }

    public function delete_student_information($id){
        $delete_Information = StudentInformation::find($id);
        if ($delete_Information) {
            $delete_Information->delete();
            session()->flash('success', 'User successfully deleted.');
            } 
            else {
                session()->flash('error', 'User not found.');
            }
            return redirect()->back();
    
    }

    public function edit_student_information($id){
    $edit_information = StudentInformation::find($id);

    // Decode JSON fields
    $edit_information->favorite_food_dishes = json_decode($edit_information->favorite_food_dishes, true);
    $edit_information->ideal_personalities = json_decode($edit_information->ideal_personalities, true);

    return view('admin.edit_student_information', compact('edit_information'));
}

public function update_student_information(Request $request, $id){
    try {
        $update_student_information = StudentInformation::find($id);

        // Update fields
        $update_student_information->student_id = $request->input('student_id');
        $update_student_information->name = $request->input('name');
        $update_student_information->email = $request->input('email');
        $update_student_information->age = $request->input('age');
        $update_student_information->class = $request->input('class');
        $update_student_information->date_of_birth = $request->input('date_of_birth');
        $update_student_information->campus = $request->input('campus');
        $update_student_information->roll_number = $request->input('roll_number');
        $update_student_information->date_of_joining = $request->input('date_of_joining');
        $update_student_information->reason_for_joining = $request->input('reason_for_joining');
        $update_student_information->city = $request->input('city');
        $update_student_information->country = $request->input('country');
        $update_student_information->self_introduction = $request->input('self_introduction');
        $update_student_information->fathers_name = $request->input('fathers_name');
        $update_student_information->fathers_age = $request->input('fathers_age');
        $update_student_information->fathers_job = $request->input('fathers_job');
        $update_student_information->fathers_whatsapp_number = $request->input('fathers_whatsapp_number');
        $update_student_information->mothers_name = $request->input('mothers_name');
        $update_student_information->mothers_age = $request->input('mothers_age');
        $update_student_information->mothers_job = $request->input('mothers_job');
        $update_student_information->mothers_whatsapp_number = $request->input('mothers_whatsapp_number');
        $update_student_information->number_of_siblings = $request->input('number_of_siblings');
        $update_student_information->favorite_food_dishes = json_encode($request->input('favorite_food_dishes')); // Convert to JSON
        $update_student_information->plans_if_given_1_crore = $request->input('plans_if_given_1_crore');
        $update_student_information->biggest_wish = $request->input('biggest_wish');
        $update_student_information->vision_for_10_years_ahead = $request->input('vision_for_10_years_ahead');
        $update_student_information->ideal_personalities = json_encode($request->input('ideal_personalities')); // Convert to JSON
        $update_student_information->students_whatsapp_number = $request->input('students_whatsapp_number');

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/profile_images');
            $update_student_information->profile_image = $path;
        }

         // Handle NIC images upload
    if ($request->hasFile('nic_back_image')) {
        $file = $request->file('nic_back_image');
        $path = $file->store('public/nic_images');
        $update_student_information->nic_back_image = $path;
    }

    if ($request->hasFile('nic_front_image')) {
        $file = $request->file('nic_front_image');
        $path = $file->store('public/nic_images');
        $update_student_information->nic_front_image = $path;
    }

        $update_student_information->save();

        return redirect()->route('show_student_information')->with('success', 'Student updated successfully');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'There was a problem updating the student information.');
    }
}


    public function generateStudentinformationPDF(Request $request)
             {
            // Find student information using the student ID from the request
            $student = StudentInformation::find($request->student_id);

            // Check if student exists
            if (!$student) {
                return redirect()->back()->with('error', 'Student not found.');
            }

            // Prepare data for the view
            $data = [
                'student' => $student,
            ];

            // Load the view with the data and generate the PDF
            $pdf = \PDF::loadView('admin.pdf_view', $data);

            // Render PDF and download
            return $pdf->download('student_information.pdf');
        }
}
