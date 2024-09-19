<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<style>
    .btn-primary {
        background-color: #007bff; /* Change to your desired color */
        border-color: #007bff; /* Ensure the border matches the background */
        white-space: nowrap; /* Prevent text from wrapping */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Change to a darker shade for hover effect */
        border-color: #004085; /* Ensure the border matches the hover background */
    }
    .form-control {
        height: calc(2.25rem + 2px); /* Adjust the height of select boxes */
    }
    .btn {
        height: calc(2.25rem + 2px); /* Match button height to select boxes */
        min-width: 150px; /* Set a minimum width to fit the button text */
    }
</style>
@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4"> 
    <div class="bg-light rounded p-4">
        <h4 class="mb-4 text-center">Student Attendance</h4>

        <!-- Month and Year Selection Form -->
        <form method="GET" action="{{ route('show_student_attendence') }}" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="month">Select Month:</label>
                    <select id="month" name="month" class="form-control">
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $selectedMonth == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="year">Select Year:</label>
                    <select id="year" name="year" class="form-control">
                        @for($i = \Carbon\Carbon::now()->year; $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary btn-block">
                        View Attendance
                    </button>
                </div>
            </div>
        </form>

        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded p-4">
                <div class="">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example">
                                <thead class="table-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Student Id</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_attendence as $student)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $student->student_id }}</td>
                                        <td>{{ $student->user->name ?? 'N/A' }}</td>
                                        <td>{{ $student->status }}</td>
                                        <td>{{ $student->day }}</td>
                                        <td>{{ $student->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<script>
function confirmAction(url, status) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to mark this student as ${status}. This action cannot be reverted.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark as ' + status,
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

// Display SweetAlert if there is a success or error message
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
@endif

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "{{ session('error') }}",
        confirmButtonText: 'OK'
    });
@endif
</script>

@include('admin.footer')
