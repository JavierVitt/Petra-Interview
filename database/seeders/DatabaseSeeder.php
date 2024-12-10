<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\CarbonPeriod;
use DateTime;
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
            'chairman_id' => 1,
            'event_name' => "Welcome Grateful Generation 2025",
            'event_description' => "Welcome Grateful Generation 2025 offers tours, workshops, and socials to welcome new students, build connections, and foster an inclusive campus community.",
            'recruitment_start_date' => (new DateTime('2025-02-12'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-03-15'))->format('Y-m-d'),
            'event_scope' => "Universitas",
            'event_date' => (new DateTime('2025-07-20'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
        ]);
        DB::table('events')->insert([
            'chairman_id' => 2,
            'event_name' => "Pengutusan Wisudawan 2025",
            'event_description' => "Pengutusan Wisudawan 2025 celebrates graduates with diplomas, inspiring speeches, performances, and a reception to honor achievements and new beginnings.",
            'recruitment_start_date' => (new DateTime('2025-03-09'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-03-17'))->format('Y-m-d'),
            'event_scope' => "Fakultas",
            'event_date' => (new DateTime('2025-04-15'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
        ]);
        DB::table('events')->insert([
            'chairman_id' => 3,
            'event_name' => "Informatics Rally Games and Logic 2025",
            'event_description' => "Informatics Rally Games 2025 features coding, puzzles, and team contests, offering workshops, networking, and prizes to foster skills and community in informatics.",
            'recruitment_start_date' => (new DateTime('2025-02-20'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-03-06'))->format('Y-m-d'),
            'event_scope' => "Nasional",
            'event_date' => (new DateTime('2025-10-30'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
        ]);
        DB::table('events')->insert([
            'chairman_id' => 4,
            'event_name' => "Bank Panitia 2025",
            'event_description' => "Bank Panitia 2025 recruits and trains committee members with workshops, team-building, networking, and a social gathering to foster skills and collaboration.",
            'recruitment_start_date' => (new DateTime('2025-10-25'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-11-03'))->format('Y-m-d'),
            'event_scope' => "Internal IC",
            'event_date' => (new DateTime('2025-11-19'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
        ]);
        DB::table('events')->insert([
            'chairman_id' => 5,
            'event_name' => "Business Accounting Competition 2025",
            'event_description' => "The Business Accounting Competition 2025 challenges students with case studies and analysis, offering workshops, networking, and prizes to promote excellence in accounting.",
            'recruitment_start_date' => (new DateTime('2025-04-07'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-04-21'))->format('Y-m-d'),
            'event_scope' => "Regional",
            'event_date' => (new DateTime('2025-09-14'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
        ]);

        DB::table('events')->insert([
            'chairman_id' => 1,
            'event_name' => "Utilizing Artificial Intelligence",
            'event_description' => "Utilizing AI features keynotes, workshops, and panels, with networking and a project showcase, inspiring innovation and collaboration in AI technology.",
            'recruitment_start_date' => (new DateTime('2025-03-04'))->format('Y-m-d'),
            'recruitment_end_date' => (new DateTime('2025-03-17'))->format('Y-m-d'),
            'event_scope' => "Internal IC",
            'event_date' => (new DateTime('2025-05-12'))->format('Y-m-d'),
            'event_location' => "Petra Christian University",
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
            'event_id'=> 1
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Sekretariat",
            'event_id'=> 1
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Konkes",
            'event_id'=> 1
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Acara",
            'event_id'=> 2
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Creative",
            'event_id'=> 2
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Keamanan",
            'event_id'=> 2
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Acara",
            'event_id'=> 3
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Creative",
            'event_id'=> 3
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Keamanan",
            'event_id'=> 3
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Acara",
            'event_id'=> 4
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Creative",
            'event_id'=> 4
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Keamanan",
            'event_id'=> 4
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Acara",
            'event_id'=> 5
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Creative",
            'event_id'=> 5
        ]);
        DB::table('divisions')->insert([
            'division_name' => "Keamanan",
            'event_id'=> 5
        ]);



        // INTERVIEWER SEEDING

        DB::table('interviewers')->insert([
            'division_id' => "1",
            'user_id'=> 1,
            'event_id'=> 1
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "1",
            'user_id'=> 2,
            'event_id'=> 1
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "2",
            'user_id'=> 3,
            'event_id'=> 1
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "2",
            'user_id'=> 4,
            'event_id'=> 1
        ]);
        DB::table('interviewers')->insert([
            'division_id' => "3",
            'user_id'=> 5,
            'event_id'=> 1
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
