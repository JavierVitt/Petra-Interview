<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviewer;

class DivisionController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $count = $request['count'];

        $divisions = [];
        $interviewers = [];

        for ($i = 0; $i < $count; $i++) {
            array_push($divisions, $request['divisionName' . ($i + 1)]);
            array_push($interviewers, $request['interviewer' . (($i * 2) + 1)]);
            array_push($interviewers, $request['interviewer' . (($i * 2) + 2)]);
        }

        for ($i = 0; $i < $count; $i++) {

            $division = new Division();

            $division->division_name = $divisions[$i];
            $division->event_id = $eventId;
            $division->created_at = now();
            $division->updated_at = now();

            $division->save();
        }

        //Ini connectin interviewernya nanti yaa
        //Code
        for ($i = 0; $i < $count; $i++) {
            $divisionId = Division::where('division_name', $divisions[$i])->where('event_id', $eventId)->first();
            $interviewer1 = User::where('email', $interviewers[2 * $i])->first();

            $interviewer = new Interviewer();

            $interviewer->division_id = $divisionId->id;
            $interviewer->user_id = $interviewer1->id;

            $interviewer->save();

            if (User::where('email', $interviewers[(2 * $i) + 1]) != null) {
                $interviewer2 = User::where('email', $interviewers[(2 * $i) + 1]);

                $interviewer = new Interviewer();

                $interviewer->division_id = $divisionId->id;
                $interviewer->user_id = $interviewer2->id;

                $interviewer->save();
            }
        }
    }
}
