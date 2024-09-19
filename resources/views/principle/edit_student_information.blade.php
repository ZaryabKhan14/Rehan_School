
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
</style>

<div class="full-height">
    <div class="custom-width">
        <div class="bg-light-rounded">
            <h6>Add Student Information</h6>
            <form id="student-form" action="{{ route('update_information_student',['id' => $edit_information->id])  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <!-- First Column -->
                    <div class="col-6">
                        <!-- Student ID -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $edit_information->user->id }}" >
                            <label for="student_id">Student ID</label>
                        </div>

                        <!-- Name -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $edit_information->name }}" readonly>
                            <label for="name">Student Name</label>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $edit_information->email }}" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating">
                            <input type="file" class="form-control" name="image" id="profile_image">
                        </div>

                        <!-- Age -->
                        <div class="form-floating">
                            <input type="number" class="form-control" id="age" name="age" placeholder="Age" value="{{ $edit_information->age }}" required>
                            <label for="age">Age</label>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-floating">
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $edit_information->date_of_birth }}" required>
                            <label for="date_of_birth">Date of Birth</label>
                        </div>

                        <!-- Class -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="class" name="class" placeholder="Class" value="{{ $edit_information->class }}" required>
                            <label for="class">Class</label>
                        </div>

                        <!-- Campus -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="campus" name="campus" placeholder="Campus" value="{{ $edit_information->campus }}" readonly>
                            <label for="campus">Campus</label>
                        </div>

                        <!-- Roll Number -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="roll_number" name="roll_number" placeholder="Roll Number" value="{{ $edit_information->roll_number }}" required>
                            <label for="roll_number">Roll Number</label>
                        </div>

                        <!-- Date of Joining -->
                        <div class="form-floating">
                            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="{{ $edit_information->date_of_joining }}" required>
                            <label for="date_of_joining">Date of Joining</label>
                        </div>

                        <!-- Reason for Joining -->
                        <div class="form-floating">
                            <textarea class="form-control" id="reason_for_joining" name="reason_for_joining" placeholder="Reason for Joining" required>{{ $edit_information->reason_for_joining }}</textarea>
                            <label for="reason_for_joining">Reason for Joining</label>
                        </div>

                        <!-- City -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $edit_information->city }}" required>
                            <label for="city">City</label>
                        </div>

                        <!-- Country -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ $edit_information->country }}" required>
                            <label for="country">Country</label>
                        </div>

                        <!-- Favorite Food Dishes -->
                @foreach($edit_information->favorite_food_dishes as $index => $dish)
                    <div class="form-floating">
                        <input type="text" class="form-control" name="favorite_food_dishes[]" value="{{ $dish }}" required>
                        <label for="favorite_food_dishes_{{ $index }}">Favorite Food Dish {{ $index + 1 }}</label>
                    </div>
                @endforeach

                <!-- Ideal Personalities -->
                @foreach($edit_information->ideal_personalities as $index => $personality)
                    <div class="form-floating">
                        <input type="text" class="form-control" name="ideal_personalities[]" value="{{ $personality }}" required>
                        <label for="ideal_personalities_{{ $index }}">Ideal Personality {{ $index + 1 }}</label>
                    </div>
                @endforeach

                        <!-- NIC Front Image -->
                        <div class="form-floating">
                            <input type="file" class="form-control" name="nic_front_image" id="nic_front_image" accept="image/*">
                            <label for="nic_front_image">NIC Front Image</label>
                        </div>

                        <!-- NIC Back Image -->
                        <div class="form-floating">
                            <input type="file" class="form-control" name="nic_back_image" id="nic_back_image" accept="image/*">
                            <label for="nic_back_image">NIC Back Image</label>
                        </div>

                    </div>

                    <!-- Second Column -->
                    <div class="col-6">
                        <!-- Self Introduction -->
                        <div class="form-floating">
                            <textarea class="form-control" id="self_introduction" name="self_introduction" placeholder="Self Introduction" required>{{ $edit_information->self_introduction }}</textarea>
                            <label for="self_introduction">Self Introduction</label>
                        </div>

                        <!-- Father's Name -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="fathers_name" name="fathers_name" placeholder="Father’s Name" value="{{ $edit_information->fathers_name }}" required>
                            <label for="fathers_name">Father’s Name</label>
                        </div>

                        <!-- Father's Age -->
                        <div class="form-floating">
                            <input type="number" class="form-control" id="fathers_age" name="fathers_age" placeholder="Father’s Age" value="{{ $edit_information->fathers_age }}" required>
                            <label for="fathers_age">Father’s Age</label>
                        </div>

                        <!-- Father's Job -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="fathers_job" name="fathers_job" placeholder="Father’s Job" value="{{ $edit_information->fathers_job }}" required>
                            <label for="fathers_job">Father’s Job</label>
                        </div>

                        <!-- Father's WhatsApp Number -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="fathers_whatsapp_number" name="fathers_whatsapp_number" placeholder="Father’s WhatsApp Number" value="{{ $edit_information->fathers_whatsapp_number }}" required>
                            <label for="fathers_whatsapp_number">Father’s WhatsApp Number</label>
                        </div>

                        <!-- Mother's Name -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="mothers_name" name="mothers_name" placeholder="Mother’s Name" value="{{ $edit_information->mothers_name }}" required>
                            <label for="mothers_name">Mother’s Name</label>
                        </div>

                        <!-- Mother's Age -->
                        <div class="form-floating">
                            <input type="number" class="form-control" id="mothers_age" name="mothers_age" placeholder="Mother’s Age" value="{{ $edit_information->mothers_age }}" required>
                            <label for="mothers_age">Mother’s Age</label>
                        </div>

                        <!-- Mother's Job -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="mothers_job" name="mothers_job" placeholder="Mother’s Job" value="{{ $edit_information->mothers_job }}" required>
                            <label for="mothers_job">Mother’s Job</label>
                        </div>

                        <!-- Mother's WhatsApp Number -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="mothers_whatsapp_number" name="mothers_whatsapp_number" placeholder="Mother’s WhatsApp Number" value="{{ $edit_information->mothers_whatsapp_number }}" required>
                            <label for="mothers_whatsapp_number">Mother’s WhatsApp Number</label>
                        </div>

                        <!-- Number of Siblings -->
                        <div class="form-floating">
                            <input type="number" class="form-control" id="number_of_siblings" name="number_of_siblings" placeholder="Number of Siblings" value="{{ $edit_information->number_of_siblings }}" required>
                            <label for="number_of_siblings">Number of Siblings</label>
                        </div>

                        <!-- Student's WhatsApp Number -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="students_whatsapp_number" name="students_whatsapp_number" placeholder="Student’s WhatsApp Number" value="{{ $edit_information->students_whatsapp_number }}" required>
                            <label for="students_whatsapp_number">Student’s WhatsApp Number</label>
                        </div>

                        <!-- Plans if Given 1 Crore Rupees -->
                        <div class="form-floating">
                            <textarea class="form-control" id="plans_if_given_1_crore" name="plans_if_given_1_crore" placeholder="Plans if Given 1 Crore Rupees" required>{{ $edit_information->plans_if_given_1_crore }}</textarea>
                            <label for="plans_if_given_1_crore">Plans if Given 1 Crore Rupees</label>
                        </div>

                        <!-- Biggest Wish -->
                        <div class="form-floating">
                            <textarea class="form-control" id="biggest_wish" name="biggest_wish" placeholder="Biggest Wish" required>{{ $edit_information->biggest_wish }}</textarea>
                            <label for="biggest_wish">Biggest Wish</label>
                        </div>

                        <!-- Vision for 10 Years Ahead -->
                        <div class="form-floating">
                            <textarea class="form-control" id="vision_for_10_years_ahead" name="vision_for_10_years_ahead" placeholder="Vision for 10 Years Ahead" required>{{ $edit_information->vision_for_10_years_ahead }}</textarea>
                            <label for="vision_for_10_years_ahead">Vision for 10 Years Ahead</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" onclick="confirmAction('{{ route('update_information_student',['id' => $edit_information->id])  }}')">Submit</button>
            </form>
        </div>
    </div>
</div>


<script>
function confirmAction(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('student-form').submit();
        }
    });
}
</script>
@include('principle.footer')
