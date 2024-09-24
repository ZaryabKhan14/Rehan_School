@include('admin.navbar')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-shield fa-3x text-primary"></i>
                <div class="ms-3">
                <a href="{{route('show_admin')}}" class="mb-2">Total Admin</a>
                    <h6 class="mb-0">{{$total_admin}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-shield fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{route('show_principle')}}" class="mb-2">Total Principal</a>
                    <h6 class="mb-0">{{$total_principle}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-graduation-cap fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{route('show_student_user')}}" class="mb-2">Total Students</a>
                    <h6 class="mb-0">{{$total_student}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="ms-3">
                     <a href="{{route('show_teacher')}}" class="mb-2">Total Teachers</a>
                    <h6 class="mb-0">{{$total_teacher}}</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="ms-3">
                     <p  class="mb-2">Total Korangi Students</p>
                    <h6 class="mb-0">{{$total_korangi_students}}</h6>
                </div>
            </div>
            
            </div>
            <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="ms-3">
                     <p  class="mb-2">Total Munawar Students</p>
                    <h6 class="mb-0">{{$total_munawar_students}}</h6>
                </div>
            </div>
            
            </div>


            <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="ms-3">
                     <p  class="mb-2">Total Online Academy Students</p>
                    <h6 class="mb-0">{{$total_online_academy_students}}</h6>
                </div>
            </div>
            
            </div>


            <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="ms-3">
                     <p  class="mb-2">Total Islamabad Students</p>
                    <h6 class="mb-0">{{$total_Islamabad_students}}</h6>
                </div>
            </div>
            
            </div>
    </div>
</div>

        



    <!-- Campus-Wise Student Count Start -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                <div class="d-flex w-100 justify-content-between">
                    <div class="ms-3">
                        <p class="mb-2">Total Korangi Students</p>
                        <h6 class="mb-0">{{ $total_korangi_students }}</h6>
                    </div>
                    <div class="ms-3">
                        <p class="mb-2">Total Munawar Students</p>
                        <h6 class="mb-0">{{ $total_munawar_students }}</h6>
                    </div>
                    <div class="ms-3">
                        <p class="mb-2">Total Online Academy Students</p>
                        <h6 class="mb-0">{{ $total_online_academy_students }}</h6>
                    </div>
                    <div class="ms-3">
                        <p class="mb-2">Total Islamabad Students</p>
                        <h6 class="mb-0">{{ $total_Islamabad_students }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Campus-Wise Student Count End -->
