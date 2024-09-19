<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@include('student.tags')
@include('student.sidebar')
@include('student.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Table</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Student Id</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Class</th>
                        <th scope="col">Student campus</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $show_freeze_details->student_id }}</td>
                        <td>{{ $show_freeze_details->name }}</td>
                        <td>{{ $show_freeze_details->class }}</td>
                        <td>{{ $show_freeze_details->campus }}</td>
                        <td>{{ $show_freeze_details->start_date}}</td>
                        <td>{{ $show_freeze_details->end_date}}</td>
                        <td>{{ $show_freeze_details->status}}</td>
                    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Table End -->


@include('student.footer')
