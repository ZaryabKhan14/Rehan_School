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
            padding: 0;
            width: 210mm;
            height: 297mm;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%;
            padding: 0; /* Removed padding to use full height */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Aligns the voucher to the top of the page */
            align-items: center;
        }
        .voucher {
            border: 1px solid #000;
            padding: 10mm;
            width: 150mm; /* Reduced width to make it narrower */
            height: 250mm; /* Increased height */
            box-sizing: border-box;
            page-break-inside: avoid;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Distributes space evenly between the header, table, and footer */
        }
        .voucher-header {
            text-align: center;
            margin-bottom: 10px;
        }
        .voucher-header img {
            width: 100px;
        }
        .voucher-header h1 {
            margin: 5px 0;
            font-size: 18px;
        }
        .voucher-header p {
            margin: 2px 0;
            font-size: 14px;
        }
        .voucher-title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            text-decoration: underline;
        }
        .voucher table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .voucher th, .voucher td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 14px;
            text-align: left;
        }
        .voucher th {
            background-color: #f2f2f2;
        }
        .voucher-footer {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
        }
        .note {
            font-size: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="voucher">
        <div class="voucher-header">
            <img src="your-logo-url-here" alt="School Logo">
            <h1>Fee Voucher</h1>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
        </div>
        <div class="voucher-title">Record Copy</div>

        <table>
            <tr>
                <th>Student ID</th>
                <td>{{ $fee->student_id }}</td>
            </tr>
            <tr>
                <th>Student Name</th>
                <td>{{ $fee->student_name }}</td>
            </tr>
            <tr>
                <th>Campus</th>
                <td>{{ $fee->student_campus }}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{ $fee->year }}</td>
            </tr>
            <tr>
                <th>Month</th>
                <td>{{ $fee->month }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>{{ $fee->amount }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $fee->status }}</td>
            </tr>
            <tr>
                <th>Generated At</th>
                <td>{{ $fee->generated_at }}</td>
            </tr>
        </table>

        <div class="voucher-footer">
            <p>Thank you for your payment. For any queries, contact the finance office.</p>
        </div>

        <p class="note">Note: Fee dues must be paid before the 10th of every month. Once paid, the fee will not be refunded. A reissuance fee of Rs. 50/- will be charged for issuing a new voucher.</p>
    </div>
</div>

</body>
</html>
