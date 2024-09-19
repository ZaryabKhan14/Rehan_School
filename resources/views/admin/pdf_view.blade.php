<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 0;
            font-size: 12px; /* Smaller font size for fitting content */
        }

        .container {
            width: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h6 {
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .section {
            margin-bottom: 10px;
        }

        .section h6 {
            border-bottom: 1px solid #ced4da;
            padding-bottom: 5px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 8px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 4px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-sizing: border-box;
            font-size: 12px;
        }

        .form-group input[readonly],
        .form-group textarea[readonly] {
            background-color: #e9ecef;
        }

        /* Print Styles */
        @media print {
            body {
                margin: 0;
                font-size: 10px; /* Further reduce font size for printing */
            }

            .container {
                box-shadow: none;
                border: none;
                padding: 0;
                background-color: #ffffff;
                margin: 0;
                page-break-after: always;
            }

            .form-group input,
            .form-group textarea {
                border: none;
                background-color: transparent;
            }

            .form-group label {
                margin-bottom: 2px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h6>Student Information</h6>

    <div class="section">
        <h6>Personal Information</h6>
        <div class="form-group">
            <label>Student ID</label>
            <input type="text" value="{{ $student->id }}" readonly>
        </div>

        <div class="form-group">
            <label>Student Name</label>
            <input type="text" value="{{ $student->name }}" readonly>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" value="{{ $student->email }}" readonly>
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="text" value="{{ $student->age }}" readonly>
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="text" value="{{ $student->date_of_birth }}" readonly>
        </div>

        <div class="form-group">
            <label>Class</label>
            <input type="text" value="{{ $student->class }}" readonly>
        </div>

        <div class="form-group">
            <label>Campus</label>
            <input type="text" value="{{ $student->campus }}" readonly>
        </div>

        <div class="form-group">
            <label>Roll Number</label>
            <input type="text" value="{{ $student->roll_number }}" readonly>
        </div>

        <div class="form-group">
            <label>Date of Joining</label>
            <input type="text" value="{{ $student->date_of_joining }}" readonly>
        </div>

        <div class="form-group">
            <label>Reason for Joining</label>
            <textarea readonly>{{ $student->reason_for_joining }}</textarea>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" value="{{ $student->city }}" readonly>
        </div>

        <div class="form-group">
            <label>Country</label>
            <input type="text" value="{{ $student->country }}" readonly>
        </div>

        <div class="form-group">
            <label>Favorite Food Dishes</label>
            <input type="text" value="{{ $student->favorite_food_dishes }}" readonly>
        </div>

        <div class="form-group">
            <label>Ideal Personalities</label>
            <input type="text" value="{{ $student->ideal_personalities }}" readonly>
        </div>
    </div>

    <div class="section">
        <div class="form-group">
            <label>Father’s Name</label>
            <input type="text" value="{{ $student->fathers_name }}" readonly>
        </div>

        <div class="form-group">
            <label>Father’s Age</label>
            <input type="text" value="{{ $student->fathers_age }}" readonly>
        </div>

        <div class="form-group">
            <label>Father’s Job</label>
            <input type="text" value="{{ $student->fathers_job }}" readonly>
        </div>

        <div class="form-group">
            <label>Father’s WhatsApp Number</label>
            <input type="text" value="{{ $student->fathers_whatsapp_number }}" readonly>
        </div>

        <div class="form-group">
            <label>Mother’s Name</label>
            <input type="text" value="{{ $student->mothers_name }}" readonly>
        </div>

        <div class="form-group">
            <label>Mother’s Age</label>
            <input type="text" value="{{ $student->mothers_age }}" readonly>
        </div>

        <div class="form-group">
            <label>Mother’s Job</label>
            <input type="text" value="{{ $student->mothers_job }}" readonly>
        </div>

        <div class="form-group">
            <label>Mother’s WhatsApp Number</label>
            <input type="text" value="{{ $student->mothers_whatsapp_number }}" readonly>
        </div>

        <div class="form-group">
            <label>Number of Siblings</label>
            <input type="text" value="{{ $student->number_of_siblings }}" readonly>
        </div>

        <div class="form-group">
            <label>Plans if given 1 crore rupees</label>
            <textarea readonly>{{ $student->plans_if_given_1_crore }}</textarea>
        </div>

        <div class="form-group">
            <label>Biggest Wish</label>
            <textarea readonly>{{ $student->biggest_wish }}</textarea>
        </div>

        <div class="form-group">
            <label>Vision for 10 Years Ahead</label>
            <textarea readonly>{{ $student->vision_for_10_years_ahead }}</textarea>
        </div>

        <div class="form-group">
            <label>Student’s WhatsApp Number</label>
            <input type="text" value="{{ $student->students_whatsapp_number }}" readonly>
        </div>
    </div>
</div>

</body>
</html>
