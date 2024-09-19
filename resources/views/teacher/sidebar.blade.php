<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Rehan School</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">

@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
    <div class="dropdown-item text-center">
        <img class="rounded-circle mb-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width: 40px; height: 40px;">
    </div>
@endif

                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                        {{ Auth::user()->name }}

                        </h6>
                        <span>
                        {{ Auth::user()->role }}
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('teacher') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('student_form') }}" class="dropdown-item">Add Students</a>
                            <a href="{{route('show_student')}}" class="dropdown-item">Show Students</a>

                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Students</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('show_student') }}" class="dropdown-item">Add Student Information</a>
                            <a href="{{route('show_student_information') }}" class="dropdown-item">Show Student Information</a>
                             <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        <!-- </div>
                    </div> --> 

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Attendence</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('student_attendence') }}" class="dropdown-item">Add Student Attendence</a>
                            <a href="{{route('display_student_attendence') }}" class="dropdown-item">Show Student Attendence</a>
                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->