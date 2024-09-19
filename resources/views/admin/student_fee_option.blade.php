<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<style>.custom-btn-spacing {
    margin-right: 5px; /* Adjust the value as needed */
}
</style>
@include('admin.tags')
@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Add Fee</h6>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example" style="wdith:200%">
                        <thead class="table-dark">
                            <tr> 
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Campus</th>
                                <th scope="col">Actions</th> <!-- Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fetch_user_details as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->campus }}</td>
                                <td>
                                <div class="btn-group" role="group">
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm custom-btn-spacing" onclick="confirmadd('{{ url('admin/student/fee/form', $user->id) }}')">Add Fee</a>
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
</div>
<!-- Table End -->
<script>
    function confirmadd(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to add this user Fee!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
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
