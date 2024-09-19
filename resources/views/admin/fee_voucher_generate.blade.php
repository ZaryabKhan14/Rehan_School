@include('admin.tags')
    @include('admin.sidebar')
    @include('admin.navbar')
<body>
    <div class="container mt-5">
        <h1>Generate Fee Voucher</h1>
        
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.Stduent_fee_voucher') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control" value="" required>
            </div>
            
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" id="student_name" name="student_name" class="form-control" value="" required>
            </div>
            
            <div class="form-group">
                <label for="student_campus">Student Campus</label>
                <input type="text" id="student_campus" name="student_campus" class="form-control" value="">
            </div>
            
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" class="form-control" value="" min="1900" max="{{ date('Y') }}" required>
            </div>
            
            <div class="form-group">
                <label for="month">Month</label>
                <input type="number" id="month" name="month" class="form-control" value="" min="1" max="12" required>
            </div>
            
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" value="" min="0" step="0.01" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Generate Voucher</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script> <!-- Adjust path as needed -->
</body>
</html>
@include('admin.footer')