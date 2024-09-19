<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@include('admin.tags')

@include('admin.sidebar')
@include('admin.navbar')

<style>
.full-height {
    min-height: 100vh; /* Minimum height of viewport */
    display: flex;
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    background-color: #f8f9fa; /* Light background for the whole page */
}

.custom-width {
    width: 100%;
    max-width: 1200px; /* Max-width for better form readability */
}

.bg-light-rounded {
    background-color: #ffffff; /* White background for the form */
    border-radius: 0.5rem;
    padding: 2rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for visual separation */
    margin: 1rem; /* Margin around the form container */
}

h6 {
    margin-bottom: 1.5rem; /* Space below the heading */
}

.form-floating {
    margin-bottom: 1rem; /* Space between form fields */
}

.form-floating input, 
.form-floating textarea {
    border-radius: 0.25rem; /* Slightly rounded corners for inputs */
    border: 1px solid #ced4da; /* Border color */
    padding: 0.75rem 1.25rem; /* Padding inside inputs */
}

.form-floating label {
    color: #495057; /* Dark label color for contrast */
}

.btn-primary {
    background-color: #007bff; /* Primary button color */
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.25rem;
    font-size: 1rem;
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

textarea.form-control {
    resize: vertical; /* Allow vertical resizing */
}

.row {
    display: flex;
    flex-wrap: wrap; /* Ensure columns wrap on smaller screens */
    gap: 1rem; /* Space between columns */
}

.col-6 {
    flex: 1; /* Each column takes up equal space */
    max-width: 50%; /* Ensure each column takes up 50% of the row */
    box-sizing: border-box; /* Include padding and border in element's total width and height */
}

.block-heading {
    font-size: 1.25rem;
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #343a40;
}
</style>

<div class="full-height">
    <div class="custom-width">
        <div class="bg-light-rounded">
            <form id="staff-form" action="{{route ('add_staff_information') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                @csrf

                <!-- Personal Information -->
                <div class="block-heading">Personal Information</div>
                <div class="row">
                    <div class="col-6">
                    <div class="form-floating">
                            <input type="file" class="form-control custom-file-input" id="profile_image" name="profile_image">
                            <label for="profile_image">Profile Image</label>
                        </div>

                        <div class="form-floating">
                            <input type="file" class="form-control custom-file-input" id="nic_front" name="nic_front">
                            <label for="nic_front">NIC Front Image</label>
                        </div>

                        <div class="form-floating">
                            <input type="file" class="form-control custom-file-input" id="nic_back" name="nic_back">
                            <label for="nic_back">NIC Back Image</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" value="{{$staff->name}}" readonly>
                            <label for="full_name">Full Name</label>
                        </div>

                        <div class="form-floating">
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            <label for="date_of_birth">Date of Birth</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" required>
                            <label for="gender">Gender</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" required>
                            <label for="nationality">Nationality</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
                            <label for="contact_number">Contact Number</label>
                        </div>

                        <div class="form-floating">
                            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="{{$staff->email}}" readonly>
                            <label for="email_address">Email Address</label>
                        </div>

                      
                    </div>

                    <!-- Professional Information -->
                    <div class="col-6">
                    <div class="form-floating">
                            <input type="text" class="form-control" id="residential_address" name="residential_address" placeholder="Residential Address" required>
                            <label for="residential_address">Residential Address</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="position_role" name="position_role" placeholder="Position/Role" value="{{$staff->role}}" readonly>
                            <label for="position_role">Position/Role</label>
                        </div>

                     

                        <div class="form-floating">
                            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" required>
                            <label for="date_of_joining">Date of Joining</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID" value="{{$staff->id}}" readonly>
                            <label for="employee_id">Employee ID</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="qualifications_certifications" name="qualifications_certifications" placeholder="Qualifications and Certifications" required>
                            <label for="qualifications_certifications">Qualifications and Certifications</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" id="previous_work_experience" name="previous_work_experience" placeholder="Previous Work Experience" required></textarea>
                            <label for="previous_work_experience">Previous Work Experience</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="special_skills" name="special_skills" placeholder="Special Skills or Expertise" required>
                            <label for="special_skills">Special Skills or Expertise</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="emergency_contact_details" name="emergency_contact_details" placeholder="Emergency Contact Details" required>
                            <label for="emergency_contact_details">Emergency Contact Details</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="campus" name="campus" placeholder="Campus" value="{{$staff->campus}}" readonly>
                            <label for="campus">Campus</label>
                        </div>
                    </div>
                </div>

               <!-- Educational Background and Health and Safety Information -->
<div class="row">
    <!-- Educational Background -->
    <div class="col-6">
        <div class="block-heading">Educational Background</div>
        <div class="form-floating">
            <input type="text" class="form-control" id="highest_degree_earned" name="highest_degree_earned" placeholder="Highest Degree Earned" required>
            <label for="highest_degree_earned">Highest Degree Earned</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="institutions_attended" name="institutions_attended" placeholder="Institutions Attended" required>
            <label for="institutions_attended">Institutions Attended</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="graduation_year" name="graduation_year" placeholder="Graduation Year" required>
            <label for="graduation_year">Graduation Year</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="additional_courses" name="additional_courses" placeholder="Additional Courses or Training" required>
            <label for="additional_courses">Additional Courses or Training</label>
        </div>
    </div>

    <!-- Health and Safety Information -->
    <div class="col-6">
        <div class="block-heading">Health and Safety Information</div>
        <div class="form-floating">
            <textarea class="form-control" id="medical_history" name="medical_history" placeholder="Medical History (if applicable)"></textarea>
            <label for="medical_history">Medical History</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="allergies" name="allergies" placeholder="Allergies">
            <label for="allergies">Allergies</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="health_conditions" name="health_conditions" placeholder="Health Conditions">
            <label for="health_conditions">Health Conditions</label>
        </div>
    </div>
</div>


                <!-- Bank and Payroll Information -->
                <div class="block-heading">Bank and Payroll Information</div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" required>
                            <label for="bank_name">Bank Name</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" required>
                            <label for="account_number">Account Number</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="Account Holder's Name" required>
                            <label for="account_holder_name">Account Holder's Name</label>
                        </div>

                       
                    </div>

                    <div class="col-6">
                     

                        <div class="form-floating">
                            <input type="text" class="form-control" id="basic_salary" name="basic_salary" placeholder="Basic Salary" required>
                            <label for="basic_salary">Basic Salary</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="Bank Branch" required>
                            <label for="bank_branch">Bank Branch</label>
                        </div>

                       
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('staff-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to submit this information?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            this.submit();
        }
    });
});

</script>
@include('admin.footer')