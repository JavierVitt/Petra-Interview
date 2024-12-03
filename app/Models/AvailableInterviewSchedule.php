<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableInterviewSchedule extends Model
{
    use HasFactory;

    public static function getScheduleById($eventId, $userId){
        $return = AvailableInterviewSchedule::where('event_id',$eventId)->where('interviewer_id',$userId)->orderBy('interview_date')->get();

        return $return;
    }
}
