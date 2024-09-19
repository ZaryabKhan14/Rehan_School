<!-- Add SweetAlert2 via CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('principle.tags')
@include('principle.sidebar')
@include('principle.navbar')

<style>
.full-height {
    height: 60vh; /* Full viewport height */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
}

.custom-width {
    width: 100%;
}

.bg-light-rounded {
    background-color: #f8f9fa; /* Ensure this matches your design */
    border-radius: 0.5rem;
    padding: 2rem;
}
</style>

<div class="full-height">
    <div class="col-10 custom-width">
        <div class="bg-light-rounded">
            <h6 class="mb-4">Add User Form</h6>
            <form id="addUserForm" action="{{ route('principle_add_user') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="role" name="role" aria-label="Floating label select example" required>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                    <label for="role">Select Role</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <select class="form-select" id="campus" name="campus" aria-label="Floating label select example" required>
                        <option value="korangi">Rehan School Korangi Campus</option>
                        <option value="munawar">Rehan School Munawar Campus</option>
                        <option value="islamabad">Rehan School Islamabad Campus</option>
                        <option value="Online_academy">Rehan School Online Academy Campus</option>
                    </select>
                    <label for="role">Select Campus</label>
                </div> -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="campus" name="campus" placeholder="campus" value='{{$user_campus->campus}}' readonly>
                    <label for="campus">Campus</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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

document.getElementById('addUserForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to add this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            this.submit();
        }
    })
});
</script>

@include('principle.footer')
