@include('teacher.tags')
@include('teacher.sidebar')
@include('teacher.navbar')

<style>
    .table-container {
        margin-bottom: 20px;
    }

    .table {
        font-size: 16px;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    .table thead th {
        background-color: #343a40;
        color: #fff;
        text-align: center;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .table td, .table th {
        padding: 15px;
        text-align: center;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .search-bar {
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .search-bar input {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
        width: 200px;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Table</h6>
      
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Campus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_student as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>••••••••</td> <!-- Masked password -->
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->campus }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('teacher.footer')


