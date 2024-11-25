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
            'event_description' => "An event to welcome the new generation of students in 2025, filled with various activities and programs to help them get acquainted with the campus and each other. The event will feature orientation sessions, campus tours, and interactive workshops designed to provide valuable information about university life. Students will have the opportunity to meet faculty members, explore different academic departments, and learn about the resources available to support their academic journey. There will be social events, including ice-breaking activities and team-building exercises, to foster a sense of community among the new students. Additionally, guest speakers and alumni will share their experiences and offer advice on how to make the most of their time at the university. The event aims to create a welcoming and inclusive environment where students can build lasting friendships and connections. Various clubs and organizations will also be present to introduce themselves and recruit new members. The event will conclude with a grand celebration, featuring performances, games, and prizes. Overall, the Welcome Grateful Generation 2025 event is designed to ensure that new students feel supported, informed, and excited about their future at the university.",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Pengutusan Wisudawan 2025",
            'event_description' => "The Pengutusan Wisudawan 2025 event is a grand graduation ceremony celebrating the achievements of the graduating class of 2025. The event will feature a formal procession of graduates, faculty, and distinguished guests. Graduates will receive their diplomas and be recognized for their hard work and dedication. The ceremony will include speeches from university officials, guest speakers, and student representatives. There will be musical performances and other entertainment to add to the festive atmosphere. Family and friends are invited to join in the celebration and share in the joy of the graduates' accomplishments. The event aims to honor the graduates and inspire them as they embark on their future endeavors. A reception will follow the ceremony, providing an opportunity for graduates and their guests to mingle and celebrate. The event will be a memorable occasion, marking the culmination of years of academic effort and personal growth. It will be a day of pride, joy, and reflection for all involved.",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Informatics Rally Games and Logic 2025",
            'event_description' => "The Informatics Rally Games and Logic 2025 is an exciting event designed to challenge and engage students in the field of informatics. Participants will compete in a series of games and puzzles that test their logical thinking and problem-solving skills. The event will include individual and team competitions, encouraging collaboration and teamwork. There will be a variety of activities, from coding challenges to logic puzzles, ensuring that there is something for everyone. Prizes will be awarded to the top performers, adding an element of competition and motivation. The event aims to promote interest in informatics and provide a fun and educational experience for all participants. It will also offer networking opportunities, allowing students to connect with peers and professionals in the field. Workshops and seminars will be held alongside the competitions, providing valuable learning experiences. The event will be a highlight of the academic year, fostering a sense of community and enthusiasm for informatics. It promises to be a day of excitement, learning, and camaraderie.",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Bank Panitia 2025",
            'event_description' => "Bank Panitia 2025 is an event aimed at recruiting and training committee members for various university events and activities. The event will provide an overview of the different roles and responsibilities available, helping students find positions that match their interests and skills. There will be informational sessions, workshops, and interactive activities to prepare participants for their roles. Experienced committee members and university staff will share their insights and offer guidance. The event will also include team-building exercises to foster collaboration and camaraderie among the new recruits. Participants will have the opportunity to network with peers and build connections that will be valuable throughout their university experience. The event aims to create a strong and capable team of committee members who are ready to contribute to the success of future events. It will be a day of learning, growth, and excitement, setting the stage for a productive and rewarding year. The event will conclude with a social gathering, allowing participants to relax and celebrate their new roles.",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);
        DB::table('events')->insert([
            'event_name' => "Business Accounting Competition 2025",
            'event_description' => "The Business Accounting Competition 2025 is a prestigious event that brings together students from various universities to showcase their accounting skills and knowledge. Participants will compete in a series of challenges that test their understanding of accounting principles and practices. The competition will include case studies, financial analysis, and problem-solving tasks. Judges will be industry professionals and academics, providing valuable feedback and insights. The event aims to promote excellence in accounting education and provide a platform for students to demonstrate their abilities. It will also offer networking opportunities, allowing participants to connect with peers and potential employers. Workshops and seminars will be held alongside the competition, offering additional learning experiences. Prizes will be awarded to the top performers, recognizing their hard work and dedication. The event will be a highlight of the academic year, fostering a sense of achievement and pride among participants. It promises to be a day of intense competition, learning, and professional growth.",
            'recruitment_start_date' => Carbon::createFromTimestamp(rand(strtotime('2025-01-01'), strtotime('2025-06-30')))->format('Y-m-d'),
            'recruitment_end_date' => Carbon::createFromTimestamp(rand(strtotime('2025-07-01'), strtotime('2025-12-30')))->format('Y-m-d'),
            'number_of_committee_members' => 30
        ]);

        DB::table('events')->insert([
            'event_name' => "Utilizing Artificial Intelligence",
            'event_description' => "Utilizing Artificial Intelligence is an event focused on exploring the latest advancements and applications of AI technology. The event will feature keynote speeches from leading experts in the field, providing insights into current trends and future developments. There will be workshops and hands-on sessions, allowing participants to gain practical experience with AI tools and techniques. The event aims to promote understanding and awareness of AI, highlighting its potential to transform various industries. Participants will have the opportunity to network with professionals and researchers, fostering collaboration and knowledge sharing. The event will also include panel discussions and Q&A sessions, providing a platform for in-depth exploration of AI-related topics. It will be a day of learning, innovation, and inspiration, encouraging participants to think creatively about the possibilities of AI. The event will conclude with a showcase of AI projects and applications, demonstrating the real-world impact of this technology. It promises to be an exciting and informative experience for all attendees.",
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
