
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
                                    <th scope="col">Student Fees Amount</th>
                                    <th scope="col">Student Campus</th>
                                    <th scope="col">Actions</th> <!-- Actions column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fetch_student_fees as $fee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $fee->student_id }}</td>
                                    <td>{{ $fee->student_name }}</td>
                                    <td>{{ $fee->fees_amount }}</td>
                                    <td>{{ $fee->student_campus }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm custom-btn-spacing" onclick="openFeeVoucherModal('{{ url('principle/generate/voucher') }}', '{{ $fee->student_id }}', '{{ $fee->student_name }}', '{{ $fee->student_campus }}', '{{ $fee->fees_amount }}')">Generate Fees Voucher</a>
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

    <!-- Modal HTML -->
    <div class="modal fade" id="feeVoucherModal" tabindex="-1" role="dialog" aria-labelledby="feeVoucherModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feeVoucherModalLabel">Generate Fee Voucher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form id="feeVoucherForm" action="{{ url('principle/generate/voucher') }}" method="POST">
                        @csrf
                        <input type="hidden" id="voucher_action_url" name="voucher_action_url">
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text" id="student_id" name="student_id" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" id="student_name" name="student_name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="student_campus">Student Campus</label>
                            <input type="text" id="student_campus" name="student_campus" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select id="year" name="year" class="form-control" required>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 1900;
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="month">Month</label>
                            <select id="month" name="month" class="form-control" required>
                                @php
                                    $months = [
                                        1 => 'January', 2 => 'February', 3 => 'March',
                                        4 => 'April', 5 => 'May', 6 => 'June',
                                        7 => 'July', 8 => 'August', 9 => 'September',
                                        10 => 'October', 11 => 'November', 12 => 'December'
                                    ];
                                @endphp
                                @foreach ($months as $monthNumber => $monthName)
                                    <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" id="amount" name="amount" class="form-control" min="0" step="0.01" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Generate Voucher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function openFeeVoucherModal(url, studentId, studentName, studentCampus, feesAmount) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to add this fee voucher!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#feeVoucherForm').attr('action', url);
                    $('#student_id').val(studentId);
                    $('#student_name').val(studentName);
                    $('#student_campus').val(studentCampus);
                    $('#amount').val(feesAmount);
                    $('#feeVoucherModal').modal('show');
                }
            });
        }
    </script>
    @include('principle.footer')

