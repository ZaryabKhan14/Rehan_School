<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<style>
    /* Center the main heading */
.text-center {
    text-align: center;
}

/* Make table headings bold and black */
.table-heading {
    color: black;
    font-weight: bold;
}
/* Center the main heading */
.text-center {
    text-align: center;
}

/* Make table headings bold and black */
.table-heading {
    color: black;
    font-weight: bold;
}
/* Style for modal labels */
.modal-label {
    color: black;
    font-weight: bold;
}


/* Style the modal header to have black text */
.modal-header-black .modal-title {
    color: black;
}

</style>
@include('principle.tags')
@include('principle.sidebar')
@include('principle.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4 text-center font-weight-bold">Staff Information Overview</h6>
        <div class="table-responsive">
            <table id="studentsTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="table-heading">#</th>
                        <th scope="col" class="table-heading">Staff ID</th>
                        <th scope="col" class="table-heading">Staff Name</th>
                        <th scope="col" class="table-heading">Staff Email</th>
                        <th scope="col" class="table-heading">Staff Campus</th>
                        <th scope="col" class="table-heading">Staff Position</th>
                        <th scope="col" class="table-heading">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $information)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $information->employee_id }}</td>
                        <td>{{ $information->full_name }}</td>
                        <td>{{ $information->email_address }}</td>
                        <td>{{ $information->campus }}</td>
                        <td>{{ $information->position_role }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal{{ $information->id }}">View Details</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($staff as $information)
<div class="modal fade" id="studentModal{{ $information->id }}" tabindex="-1" aria-labelledby="studentModalLabel{{ $information->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-black">
                <h5 class="modal-title" id="studentModalLabel{{ $information->id }}">Staff Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Staff Data -->
                        <p><span class="modal-label">Full Name:</span> {{ $information->full_name }}</p>
                        <p><span class="modal-label">Campus:</span> {{ $information->campus }}</p>
                        <p><span class="modal-label">Date of Birth:</span> {{ $information->date_of_birth }}</p>
                        <p><span class="modal-label">Gender:</span> {{ $information->gender }}</p>
                        <p><span class="modal-label">Nationality:</span> {{ $information->nationality }}</p>
                        <p><span class="modal-label">Contact Number:</span> {{ $information->contact_number }}</p>
                        <p><span class="modal-label">Email Address:</span> {{ $information->email_address }}</p>
                        <p><span class="modal-label">Residential Address:</span> {{ $information->residential_address }}</p>
                        <p><span class="modal-label">Position/Role:</span> {{ $information->position_role }}</p>
                        <p><span class="modal-label">Date of Joining:</span> {{ $information->date_of_joining }}</p>
                        <p><span class="modal-label">Staff ID:</span> {{ $information->employee_id }}</p>
                        <p><span class="modal-label">Qualifications/Certifications:</span> {{ $information->qualifications_certifications }}</p>
                        <p><span class="modal-label">Previous Work Experience:</span> {{ $information->previous_work_experience }}</p>
                        <p><span class="modal-label">Special Skills:</span> {{ $information->special_skills }}</p>
                        <p><span class="modal-label">Emergency Contact Details:</span> {{ $information->emergency_contact_details }}</p>
                        <p><span class="modal-label">Highest Degree Earned:</span> {{ $information->highest_degree_earned }}</p>
                        <p><span class="modal-label">Institutions Attended:</span> {{ $information->institutions_attended }}</p>
                        <p><span class="modal-label">Graduation Year:</span> {{ $information->graduation_year }}</p>
                        <p><span class="modal-label">Additional Courses:</span> {{ $information->additional_courses }}</p>
                        <p><span class="modal-label">Medical History:</span> {{ $information->medical_history }}</p>
                        <p><span class="modal-label">Allergies:</span> {{ $information->allergies }}</p>
                        <p><span class="modal-label">Health Conditions:</span> {{ $information->health_conditions }}</p>
                        <p><span class="modal-label">Bank Name:</span> {{ $information->bank_name }}</p>
                        <p><span class="modal-label">Account Number:</span> {{ $information->account_number }}</p>
                        <p><span class="modal-label">Account Holder Name:</span> {{ $information->account_holder_name }}</p>
                        <p><span class="modal-label">Basic Salary:</span> {{ $information->basic_salary }}</p>
                        <p><span class="modal-label">Bank Branch:</span> {{ $information->bank_branch }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
    <!-- Profile Image -->
    @if($information->profile_image)
        <img src="{{ asset('storage/' . str_replace('public/', '', $information->profile_image)) }}" class="img-fluid" alt="Profile Image" style="width: 100%; height: auto; object-fit: cover;">
    @endif
</div>

                    <div class="col-md-12 mb-3">
                        <!-- Download NIC Images -->
                        <p><span class="modal-label">Download NIC Front:</span> 
                        @if($information->nic_front)
                            <a href="{{ asset('storage/' . str_replace('public/', '', $information->nic_front)) }}" class="btn btn-primary btn-sm" download>Download NIC Front</a>
                        @endif
                        </p>
                        <p><span class="modal-label">Download NIC Back:</span> 
                        @if($information->nic_back)
                            <a href="{{ asset('storage/' . str_replace('public/', '', $information->nic_back)) }}" class="btn btn-primary btn-sm" download>Download NIC Back</a>
                        @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-sm" onclick="confirmedit('{{ url('/principle/edit_form_staff_information', $information->id) }}')">Edit Information</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ url('/principle/deleting_staff_information', $information->id) }}')">Delete Information</button>
            </div>
        </div>
    </div>
</div>
@endforeach



<script>
$(document).ready(function() {
    $('#studentsTable').DataTable();

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
                window.location.href = url;
            }
        });
    }
});

function confirmDelete(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete this user!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

function confirmedit(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to edit this user!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, edit it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>

@include('principle.footer')
