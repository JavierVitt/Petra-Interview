<?php
//Cek lagi ini, trakhir kurang bagian lek user itu hrs dicek sek 2 2 e valid apa ga e
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Interviewer;
use App\Models\Recruitment;

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

        for ($i=0; $i <$count ; $i++) { 
            $interviewer1 = User::where('email', $interviewers[2 * $i])->first();
            $interviewer2 = User::where('email', $interviewers[(2 * $i) + 1])->first();

            if (is_null($interviewer1)) {
                return false;
            }
            if ($interviewer2 != null) {
                return false;
            }
        }
        
        for ($i = 0; $i < $count; $i++) {

            $division = new Division();

            $division->division_name = $divisions[$i];
            $division->event_id = $eventId;
            $division->created_at = now();
            $division->updated_at = now();

            $division->save();

            $recruitment = new Recruitment();
            $recruitment->division_id = Division::where('event_id',$eventId)->where('division_name',$divisions[$i])->first()->id;
            $recruitment->save();
        }
        for ($i = 0; $i < $count; $i++) {
            $divisionId = Division::where('division_name', $divisions[$i])->where('event_id', $eventId)->first();
            $interviewer1 = User::where('email', $interviewers[2 * $i])->first();

            if (is_null($interviewer1)) {
                return false;
            }
            $interviewer = new Interviewer();
            
            $interviewer->division_id = $divisionId->id;
            $interviewer->user_id = $interviewer1->id;
            $interviewer->event_id = $eventId;
            
            $interviewer->save();
            
            $interviewer2 = User::where('email', $interviewers[(2 * $i) + 1])->first();
            
            if ($interviewer2 != null) {
                $interviewer = new Interviewer();
                
                $interviewer->division_id = $divisionId->id;
                $interviewer->user_id = $interviewer2->id;
                $interviewer->event_id = $eventId;
                
                $interviewer->save();
            }
        }
        
        return true;
    }
}
