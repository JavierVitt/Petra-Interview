<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // USER SEEDING


        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => "Veleroy Juan Andika",
            'email' => "c14220235@john.petra.ac.id",
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Javier Vittorio",
            'email' => "C14220237@john.petra.ac.id",
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Malvin Alexious Suwanto",
            'email' => "C14220245@john.petra.ac.id",
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Alexander Yofilio Setiawan",
            'email' => "C14220071@john.petra.ac.id",
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Nicholas Kenneth",
            'email' => "C14220106@john.petra.ac.id",
            'password' => Hash::make('password'),
        ]);

        // EVENT SEEDING

        $startDate = Carbon::createFromDate(2025, 1, 1);
        $endDate = Carbon::createFromDate(2025, 6, 30);
        $startDate2 = Carbon::createFromDate(2025, 6, 1);
        $endDate2 = Carbon::createFromDate(2025, 12, 30);
        
        // DB::table('events')->insert([
        //     'event_name' => "Welcome Grateful Generation 2025",
        //     'recruitment_start_date' => CarbonPeriod::create('2025-1-1', '2025-6-30')->random()->format('Y-m-d'),
        //     'recruitment_end_date' => CarbonPeriod::create('2025-7-1', '2025-12-30')->random()->format('Y-m-d'),
        //     // 'recruitment_start_date' => Carbon::random($startDate, $endDate)->format('Y-m-d'),
        //     // 'recruitment_end_date' => Carbon::random($startDate2, $endDate2)->format('Y-m-d'),
        //     'number_of_committee_members' => 30
        // ]);

        DB::table('events')->insert([
            'event_name' => "Welcome Grateful Generation 2025",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Wisuda 2025",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Informatics Rally Games and Logic 2025",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Bank Panitia 2025",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "BSLT 2025",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);

        DB::table('events')->insert([
            'event_name' => "Utiltizing Artificial Intelligence",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);


        // DIVISION SEEDING
        
        DB::table('divisions')->insert([
            'division_name' => "Acara",
            'event_id'=> 1
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Creative",
            'event_id'=> 1
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Keamanan",
            'event_id'=> 6
        ]);



        // INTERVIEWER SEEDING

        DB::table('interviewers')->insert([
            'division_id' => "1",
            'user_id'=> 1
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "1",
            'user_id'=> 2
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "2",
            'user_id'=> 3
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "2",
            'user_id'=> 4
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "3",
            'user_id'=> 5
        ]);


        // RECRUITMENT SEEDING

        DB::table('recruitments')->insert([
            'division_id' => "1",
        ]);
        DB::table('recruitments')->insert([
            'division_id' => "2",
        ]);
        DB::table('recruitments')->insert([
            'division_id' => "3",
        ]);

    }
}
