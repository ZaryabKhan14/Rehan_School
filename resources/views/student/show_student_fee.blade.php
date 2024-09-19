
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fc;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: #007bff;
            color: #black;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid #0056b3;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
            font-weight: 600;
        }
        .table tbody tr {
            transition: background-color 0.3s ease;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
        .page-title {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 600;
            color: #343a40;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table td {
            font-size: 0.875rem;
        }
        .table-container {
            border-radius: 8px;
            overflow: hidden;
        }
        .table-container .table {
            margin-bottom: 0;
        }
        .table th, .table td {
            padding: 0.75rem;
            border-top: 1px solid #dee2e6;
        }
        .btn-payment {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }
        .btn-payment:hover {
            background-color: #218838;
            color: white;
        }
        .total-fees {
            font-size: 1.25rem;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>

@include('student.tags')
@include('student.sidebar')
@include('student.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-money-bill-wave me-2"></i> Student Fee
                </div>
                <div class="card-body">
                    
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Campus</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Generated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->student_id }}</td>
                                        <td>{{ $item->student_name }}</td>
                                        <td>{{ $item->student_campus }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->generated_at }}</td>
                                        
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="total-fees">
                        <strong>Total Pending Fees:</strong> {{ $totalPendingFees }} 
                        <form id="payment-form-{{ $item->id }}" action="{{ route('stripe') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $item->student_id }}">
                        <input type="hidden" name="student_name" value="{{ $item->student_name }}">
                        <input type="hidden" name="student_campus" value="{{ $item->student_campus }}">
                        <input type="hidden" name="amount" value="{{ $totalPendingFees }}">
                        <button type="button" class="btn-payment" onclick="submitPaymentForm({{ $item->id }})">
                            <i class="fas fa-credit-card me-1"></i> Pay
                        </button>
                    </form>

                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('student.footer')


<script>
    function submitPaymentForm(id) {
        var form = document.getElementById('payment-form-' + id);
        if (form) {
            form.submit();
        } else {
            console.error('Form with id ' + id + ' not found.');
        }
    }
</script>
