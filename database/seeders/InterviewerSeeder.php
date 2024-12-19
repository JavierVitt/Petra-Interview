<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Interviewer;
use Illuminate\Database\Seeder;

class InterviewerSeeder extends Seeder
{
    public function run(): void
    {
        Division::all()->each(function ($division) {
            // Track used IDs for this division
            $usedIdsForDivision = [];
            
            // Create 2 interviewers for each division
            for ($i = 0; $i < 2; $i++) {
                // Keep trying until we get an unused ID for this division
                do {
                    $userId = rand(1, 50);
                } while (in_array($userId, $usedIdsForDivision));
                
                // Add the ID to used list for this division
                $usedIdsForDivision[] = $userId;
                
                Interviewer::create([
                    'division_id' => $division->id,
                    'user_id' => $userId,
                    'is_active' => 1,
                    'event_id' => $division->event_id
                ]);
            }
        });
    }
}
