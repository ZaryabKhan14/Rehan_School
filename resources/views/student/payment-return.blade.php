
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eaf0e4;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #28a745;
            color: green;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid #218838;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-body {
            padding: 2rem;
        }
        .payment-details {
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 1.5rem;
            background-color: #ffffff;
        }
        .payment-details p {
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
        }
        .payment-details p strong {
            color: #28a745;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>


@include('student.tags')
@include('student.sidebar')
@include('student.navbar')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-check-circle"></i> Payment Confirmation
        </div>
        <div class="card-body">
            <div class="payment-details">
                <h4 class="mb-4">Payment Details</h4>
                <p><strong>Student Name:</strong> {{ session('student_name') }}</p>
                <p><strong>Student ID:</strong> {{ session('student_id') }}</p>
                <p><strong>Amount:</strong> ${{ session('amount') }}</p>
                <p><strong>Payment Date:</strong> {{ session('payment_date') }}</p>
                <p><strong>Student Campus:</strong> {{ session('student_campus') }}</p>
                <a href="{{ route('redirect') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-home"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

@include('student.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        @endif
    });

    function submitPaymentForm(id) {
        var form = document.getElementById('payment-form-' + id);
        if (form) {
            Swal.fire({
                title: 'Confirm Payment',
                text: "Are you sure you want to proceed with the payment?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, pay now!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            console.error('Form with id ' + id + ' not found.');
        }
    }
</script>

