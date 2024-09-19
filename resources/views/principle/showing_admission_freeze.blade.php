<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Freeze Request Details</h6>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example" style="width:100%; margin-bottom: 20px;">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Class</th>
                                <th scope="col">Student Campus</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status</th>

                                <th scope="col">Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($show_freeze_details as $show_details)
                                <tr>
                                    <td>{{ $show_details->student_id }}</td>
                                    <td>{{ $show_details->name }}</td>
                                    <td>{{ $show_details->class }}</td>
                                    <td>{{ $show_details->campus }}</td>
                                    <td>{{ $show_details->start_date }}</td>
                                    <td>{{ $show_details->end_date }}</td>
                                    <td>{{ $show_details->reason }}</td>
                                    <td>{{ $show_details->status }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('admission_freeze_statuss', ['id' => $show_details->id]) }}" method="POST" style="margin-right: 5px;">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success" {{ $show_details->status == 'approved' ? 'disabled' : '' }}>
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admission_freeze_statuss', ['id' => $show_details->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger" {{ $show_details->status == 'rejected' ? 'disabled' : '' }}>
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    @include('admin.footer')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('form').forEach(form => {
            const approveButton = form.querySelector('button.btn-success');
            const rejectButton = form.querySelector('button.btn-danger');

            if (approveButton) {
                approveButton.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent form submission
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to approve this record!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, approve it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            }

            if (rejectButton) {
                rejectButton.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent form submission
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to reject this record!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reject it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            }
        });
    });
</script>

<style>
    /* Ensure no horizontal scrolling by hiding overflow */
    .table-responsive {
        overflow-x: hidden;
    }
</style>
