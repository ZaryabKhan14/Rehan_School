<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Table</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Id</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Class</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student_attendence as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->user->id }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td class="text-nowrap">
                            <!-- Present Button -->
                            <a class="btn btn-sm btn-success" href="javascript:void(0);" onclick="confirmAction('{{ url('admin/attendance/present', $student->user->id) }}', 'present')">
                                Present
                            </a>
                            <!-- Absent Button -->
                            <a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="confirmAction('{{ url('admin/attendance/absent', $student->user->id) }}', 'absent')">
                                Absent
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Table End -->

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
