

@include('student.tags')
@include('student.sidebar')
@include('student.navbar')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Student Information Overview</h6>
        @foreach ($information as $info)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">{{ $info->name }}</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Student ID:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->student_id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Student Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" value="{{ $info->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Age:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->age }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Class:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->class }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Date of Birth:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->date_of_birth }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Campus:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->campus }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Roll Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->roll_number }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Date of Joining:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->date_of_joining }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Reason for Joining:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->reason_for_joining }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">City:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->city }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Country:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->country }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Self Introduction:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->self_introduction }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Father’s Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->fathers_name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Father’s Age:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->fathers_age }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Father’s Job:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->fathers_job }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Father’s WhatsApp Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->fathers_whatsapp_number }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mother’s Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->mothers_name }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mother’s Age:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->mothers_age }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mother’s Job:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->mothers_job }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Mother’s WhatsApp Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->mothers_whatsapp_number }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Number of Siblings:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->number_of_siblings }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Favorite Food Dishes:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->favorite_food_dishes }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Plans if Given 1 Crore Rupees:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->plans_if_given_1_crore }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Biggest Wish:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->biggest_wish }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vision for 10 Years Ahead:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->vision_for_10_years_ahead }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Ideal Personalities:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" readonly>{{ $info->ideal_personalities }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">WhatsApp Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $info->students_whatsapp_number }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
          
        </div>
        @endforeach
    </div>
</div>




@include('student.footer')

