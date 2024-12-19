<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            'Petra Megah 2024',
            'Petra Mengajar 2024',
            'Petra Bakti 2024',
            'Petra Parade 2024',
            'Petra Fest 2024',
            'Petra Adventure 2024',
            'Petra Sport Week 2024',
            'Petra Art Festival 2024',
            'Petra Technology Week 2024',
            'Petra Business Fair 2024'
        ];

        foreach ($events as $eventName) {
            Event::create([
                'chairman_id' => rand(1, 20), // Changed from 50 to 20 to match available users
                'event_name' => $eventName,
                'event_description' => 'Deskripsi ' . $eventName,
                'recruitment_start_date' => now(),
                'recruitment_end_date' => now()->addDays(14),
                'event_scope' => 'Universitas',
                'event_date' => now()->addMonths(2),
                'event_location' => 'Petra Christian University',
                'status' => 1
            ]);
        }
    }
}
