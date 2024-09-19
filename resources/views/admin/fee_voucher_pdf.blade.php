<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .voucher-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .voucher-header img {
            max-height: 60px;
        }
        .voucher-header h1 {
            margin: 0;
            color: #333;
        }
        .voucher-title {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .voucher-footer {
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .note {
            font-size: 0.9em;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="voucher">
        <div class="voucher-header">
            <h1>Fee Ledger</h1>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
        </div>
        <div class="voucher-title">Fee Record</div>

        <!-- Display Student Information -->
        @if ($fees->isNotEmpty())
            <table>
                <tr>
                    <th>Student ID</th>
                    <td>{{ $student_id }}</td>
                </tr>
                <tr>
                    <th>Student Name</th>
                    <td>{{ $fees->first()->student_name }}</td>
                </tr>
                <tr>
                    <th>Campus</th>
                    <td>{{ $fees->first()->student_campus }}</td>
                </tr>
            </table>
        @endif

        <!-- Display Fee Details Table -->
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Generated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $fee)
                    <tr>
                        <td>{{ $fee->year }}</td>
                        <td>{{ DateTime::createFromFormat('!m', $fee->month)->format('F') }}</td>
                        <td>{{ $fee->amount }}</td>
                        <td>{{ $fee->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->generated_at)->format('d-M-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="voucher-footer">
            <p>Thank you for your payment. For any queries, contact the finance office.</p>
        </div>

        <p class="note">Note: Fee dues must be paid before the 10th of every month. Once paid, the fee will not be refunded. A reissuance fee of Rs. 50/- will be charged for issuing a new voucher.</p>
    </div>
</div>

</body>
</html>
