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
            <h6 class="mb-4">Edit User Form</h6>
            <form action="{{ route('principle_update_user',['id' => $edit_user->id])  }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ ( $edit_user->name) }}">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ ( $edit_user->email) }}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ ( $edit_user->password) }}>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="role" name="role" aria-label="Floating label select example">
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                    <label for="role">Select Role</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('principle.footer')
