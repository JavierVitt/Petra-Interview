<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = ['Keamanan', 'Acara', 'Sekonkes', 'Kreatif', 'Perlengkapan'];
        
        Event::all()->each(function ($event) use ($divisions) {
            foreach ($divisions as $divisionName) {
                Division::create([
                    'division_name' => $divisionName,
                    'event_id' => $event->id
                ]);
            }
        });
    }
}
