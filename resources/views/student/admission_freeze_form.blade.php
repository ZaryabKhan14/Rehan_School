<!-- Add SweetAlert2 via CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('student.tags')
@include('student.sidebar')
@include('student.navbar')

<style>
.full-height {
    height: 100vh; /* Full viewport height for better alignment */
    display: flex;
    align-items: center;
    justify-content: center; /* Center content vertically and horizontally */
}

.custom-width {
    width: 100%;
    max-width: 800px; /* Increased max-width for a wider form */
}

.bg-light-rounded {
    background-color: #f8f9fa; /* Background color for the form */
    border-radius: 0.5rem;
    padding: 2rem;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for better visibility */
}
</style>

<div class="full-height">
    <div class="custom-width">
        <div class="bg-light-rounded">
            <h6 class="mb-4 text-center">Admission Freeze Request Form</h6> <!-- Center the title -->
            <form id="freezeAdmissionForm" action="{{route('add_freeze_form_details')}}" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="id" name="Student_id" placeholder="Student ID" value="{{$userId}}" readonly>
                    <label for="id">Student ID</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$name}}" readonly>
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="class" name="class" placeholder="Class" required>
                    <label for="class">Class</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="campus" name="campus" placeholder="Campus"  value="{{$campus}}" readonly>
                    <label for="campus">Campus</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Freeze Start Date" required>
                    <label for="start_date">Freeze Start Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Freeze End Date" required>
                    <label for="end_date">Freeze End Date</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="reason" name="reason" placeholder="Reason for Freezing" required style="height: 100px;"></textarea>
                    <label for="reason">Reason for Freezing</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button> <!-- Full-width button -->
            </form>
        </div>
    </div>
</div>

<script>
// Check for success message from session
@if(session('success'))
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
@endif

// Check for error messages from validation
@if($errors->any())
    Swal.fire({
        title: 'Error!',
        text: '{{ $errors->first() }}', // Display the first error message
        icon: 'error',
        confirmButtonText: 'OK'
    });
@endif

document.getElementById('freezeAdmissionForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to submit this admission freeze request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, submit it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            this.submit();
        }
    })
});
</script>

@include('student.footer')
