<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon; // Import Carbon
use App\Models\Fee; // Import the Fee model
use App\Models\FeeVocher; // Import the FeeVoucher model
class GenerateMonthlyFeeVouchers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-monthly-fee-vouchers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        
        // Fetch all students' fees
        $studentFees = Fee::all();

        foreach ($studentFees as $fee) {
            // Check if the fee voucher for the current month and year already exists
            $existingVoucher = FeeVocher::where('student_id', $fee->student_id)
                ->where('year', $currentYear)
                ->where('month', $currentMonth)
                ->first();

            if (!$existingVoucher) {
                // Insert a new fee voucher
                FeeVocher::create([
                    'student_id' => $fee->student_id,
                    'student_name' => $fee->student_name,
                    'student_campus' => $fee->student_campus,
                    'year' => $currentYear,
                    'month' => $currentMonth,
                    'amount' => $fee->fees_amount,
                    'status' => 'Pending',
                    'generated_at' => Carbon::now(),
                ]);
                
                $this->info('Fee voucher generated for student ID: ' . $fee->student_id);
            } else {
                $this->info('Fee voucher already exists for student ID: ' . $fee->student_id . ' for this month.');
            }
        }

        $this->info('Monthly fee vouchers generation completed.');
    }
}
