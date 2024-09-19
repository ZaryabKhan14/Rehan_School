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
                        Principal
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('principle') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('principle_adding_user_form') }}" class="dropdown-item"><i class="fa fa-user-plus me-2"></i>Add Users</a>
                            <a href="{{route('principle_show_student_user')}}" class="dropdown-item"><i class="fa fa-user-graduate me-2"></i>Students</a>
                            <a href="{{route('principle_show_teacher')}}" class="dropdown-item"><i class="fa fa-chalkboard-teacher me-2"></i>Teachers</a>

                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-graduation-cap me-2"></i>Students</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('show_students_data') }}" class="dropdown-item"><i class="fa fa-user-edit me-2"></i>Add Student Information</a>
                        <a href="{{route('showing_student_information') }}" class="dropdown-item"><i class="fa fa-info-circle me-2"></i>Show Student Information</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-calendar-check me-2"></i>Attendence</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('student_attendence_form') }}" class="dropdown-item"><i class="fa fa-plus me-2"></i>Add Student Attendance</a>
                        <a href="{{route('displaying_student_attendence') }}" class="dropdown-item"><i class="fa fa-eye me-2"></i>Show Student Attendance</a>
                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                    
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-dollar-sign me-2"></i>Student Fees</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('Student_fee') }}" class="dropdown-item"><i class="fa fa-money-check-alt me-2"></i>Add Student Fee</a>
                            <a href="{{route('show_student_fee') }}" class="dropdown-item"><i class="fa fa-list me-2"></i>Show Student Fees</a>
                            <a href="{{route('show_student_fee_voucher') }}" class="dropdown-item"><i class="fa fa-file-pdf me-2"></i>Generate Voucher PDF</a>
                            <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                        </div>
                        <a href="{{ route('showing_payments') }}" class="nav-item nav-link"><i class="fa fa-credit-card me-2"></i>Online Payments</a>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-calendar-check me-2"></i>Staff Information
                        </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('show_staffs') }}" class="dropdown-item">
                                <i class="fa fa-plus-circle me-2"></i>Add Staff Information
                            </a>
                            <a href="{{ route('showing_staff_information') }}" class="dropdown-item">
                                <i class="fa fa-eye me-2"></i>Show Staff Information
                            </a>
                        </div>
                        <a href="{{ route('showing_admission_freeze_detail') }}" class="nav-item nav-link">
                        <i class="fas fa-snowflake me-2"></i>Admission Freeze
                    </a>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->