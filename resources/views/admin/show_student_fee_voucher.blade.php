    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .text-center {
            text-align: center;
        }

        .table-heading {
            color: black;
            font-weight: bold;
        }

        .modal-label {
            color: black;
            font-weight: bold;
        }

        .modal-header-black .modal-title {
            color: black;
        }
    </style>

    @include('admin.tags')
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4 text-center font-weight-bold">Student Fees Overview</h6>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Campus</th>
                            <th scope="col" class="table-heading">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fetch_user_fee as $student_id => $fees)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student_id }}</td>
                            <td>{{ $fees->first()->student_name }}</td>
                            <td>{{ $fees->first()->student_campus }}</td>
                            <td>
                                
                            <a href="{{ route('generatepdf', ['student_id' => $student_id]) }}" class="btn btn-primary btn-sm">Download PDF</a>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal{{ $student_id }}">View Details</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($fetch_user_fee as $student_id => $fees)
    <div class="modal fade" id="studentModal{{ $student_id }}" tabindex="-1" aria-labelledby="studentModalLabel{{ $student_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-header-black">
                    <h5 class="modal-title" id="studentModalLabel{{ $student_id }}">Student Fee Ledger</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Student Basic Information -->
                    <p><span class="modal-label">Student ID:</span> {{ $student_id }}</p>
                    <p><span class="modal-label">Student Name:</span> {{ $fees->first()->student_name }}</p>
                    <p><span class="modal-label">Campus:</span> {{ $fees->first()->student_campus }}</p>
                    <!-- Fee Details Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Generated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $fee)
                            <tr>
                                <td>{{ $fee->year }}</td>
                                <td>{{ DateTime::createFromFormat('!m', $fee->month)->format('F') }}</td>
                                <td>{{ $fee->amount }}</td>
                                <td>{{ $fee->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($fee->generated_at)->format('d-M-Y') }}</td>
                                <td>
                                    <!-- Approve Button -->
                                    <form action="{{ route('updateFeeStatus', ['id' => $fee->id, 'status' => 'approved']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" {{ $fee->status == 'approved' ? 'disabled' : '' }}>
                                            Approve
                                        </button>
                                    </form>
                                    <!-- Reject Button -->
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('admin.footer')
