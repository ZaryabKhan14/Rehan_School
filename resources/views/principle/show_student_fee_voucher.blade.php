
    @include('principle.tags')
    @include('principle.sidebar')
    @include('principle.navbar')

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Student Add Fee</h6>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Campus</th>
                                    <th scope="col">Student Year</th>
                                    <th scope="col">Student MOnth</th>
                                    <th scope="col">Student Amount</th>
                                    <th scope="col">Student Status</th>
                                    <th scope="col">Generate At</th>
                                    <th scope="col">Actions</th> <!-- Actions column -->
                                    <th scope="col">Approve/Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fetch_user_fee as $fee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $fee->student_id }}</td>
                                    <td>{{ $fee->student_name }}</td>
                                    <td>{{ $fee->student_campus }}</td>
                                    <td>{{ $fee->year }}</td>
                                    <td>{{ $fee->month }}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->status }}</td>
                                    <td>{{ $fee->generated_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <a href="{{ route('generate.pdf', ['id' => $fee->id]) }}" class="btn btn-primary btn-sm">Download PDF</a>
                                        </div>
                                    </td>
                                    <td>
    <form action="{{ route('updateFeeStatus', ['id' => $fee->id, 'status' => 'approved']) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-sm btn-success" {{ $fee->status == 'approved' ? 'disabled' : '' }}>
            Approve
        </button>
    </form>
    <form action="{{ route('updateFeeStatus', ['id' => $fee->id, 'status' => 'rejected']) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-sm btn-danger" {{ $fee->status == 'rejected' ? 'disabled' : '' }}>
            Reject
        </button>
    </form>
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
    @include('principle.footer')
