
@php
    use Carbon\Carbon;
@endphp


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
@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4 text-center font-weight-bold">Student Information Overview</h6>
        <div class="table-responsive">
            <table id="studentsTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="table-heading">#</th>
                        <th scope="col" class="table-heading">Student Id</th>
                        <th scope="col" class="table-heading">Name</th>
                        <th scope="col" class="table-heading">Email</th>
                        <th scope="col" class="table-heading">Age</th>
                        <th scope="col" class="table-heading">Campus</th>
                        <th scope="col" class="table-heading">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students_information as $information)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $information->student_id }}</td>
                        <td>{{ $information->name }}</td>
                        <td>{{ $information->email }}</td>
                        <td>{{ $information->age }}</td>
                        <td>{{ $information->campus }}</td>
                        <td>
                            <a href="{{ route('generateStudentinformationPDF', ['student_id' => $information->id]) }}" class="btn btn-info btn-sm">Download PDF</a>
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
@foreach ($students_information as $information)
<div class="modal fade" id="studentModal{{ $information->id }}" tabindex="-1" aria-labelledby="studentModalLabel{{ $information->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-black">
                <h5 class="modal-title" id="studentModalLabel{{ $information->id }}">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Student Data -->
                        <p><span class="modal-label">Student ID:</span> {{ $information->student_id }}</p>
                        <p><span class="modal-label">Student Name:</span> {{ $information->name }}</p>
                        <p><span class="modal-label">Email:</span> {{ $information->email }}</p>
                        <p><span class="modal-label">Age:</span> {{ $information->age }}</p>
                        <p><span class="modal-label">Class:</span> {{ $information->class }}</p>
                        <p><span class="modal-label">Date of Birth:</span> {{ Carbon::parse($information->date_of_birth)->format('d M Y') }}</p>
                        <p><span class="modal-label">Campus:</span> {{ $information->campus }}</p>
                        <p><span class="modal-label">Roll Number:</span> {{ $information->roll_number }}</p>
                        <p><span class="modal-label">Date of Joining:</span> {{ Carbon::parse($information->date_of_joining)->format('d M Y') }}</p>
                        <p><span class="modal-label">Reason for Joining:</span> {{ $information->reason_for_joining }}</p>
                        <p><span class="modal-label">City:</span> {{ $information->city }}</p>
                        <p><span class="modal-label">Country:</span> {{ $information->country }}</p>
                        <p><span class="modal-label">Self Introduction:</span> {{ $information->self_introduction }}</p>
                        <p><span class="modal-label">Father’s Name:</span> {{ $information->fathers_name }}</p>
                        <p><span class="modal-label">Father’s Age:</span> {{ $information->fathers_age }}</p>
                        <p><span class="modal-label">Father’s Profession:</span> {{ $information->fathers_job }}</p>
                        <p><span class="modal-label">Father’s WhatsApp Number:</span> {{ $information->fathers_whatsapp_number }}</p>
                        <p><span class="modal-label">Mother’s Name:</span> {{ $information->mothers_name }}</p>
                        <p><span class="modal-label">Mother’s Age:</span> {{ $information->mothers_age }}</p>
                        <p><span class="modal-label">Mother’s Profession:</span> {{ $information->mothers_job }}</p>
                        <p><span class="modal-label">Mother’s WhatsApp Number:</span> {{ $information->mothers_whatsapp_number }}</p>
                        <p><span class="modal-label">Number of Siblings:</span> {{ $information->number_of_siblings }}</p>
                        <p><span class="modal-label">Favorite Food Dishes:</span> {{ $information->favorite_food_dishes }}</p>
                        <p><span class="modal-label">Plans if Given 1 Crore Rupees:</span> {{ $information->plans_if_given_1_crore }}</p>
                        <p><span class="modal-label">Biggest Wish:</span> {{ $information->biggest_wish }}</p>
                        <p><span class="modal-label">Vision for 10 Years Ahead:</span> {{ $information->vision_for_10_years_ahead }}</p>
                        <p><span class="modal-label">Ideal Personalities:</span> {{ $information->ideal_personalities }}</p>
                        <p><span class="modal-label">WhatsApp Number:</span> {{ $information->students_whatsapp_number }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <!-- Profile Image -->
                        @if($information->profile_image)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $information->profile_image)) }}" class="img-fluid" alt="Student Image" style="width: 100%; height: auto; object-fit: cover;">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-sm" onclick="confirmedit('{{ url('/admin/edit/student/information', $information->id) }}')">Edit Information</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ url('/admin/delete_student_information', $information->id) }}')">Delete Information</button>
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

@include('admin.footer')
