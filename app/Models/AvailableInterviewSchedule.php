<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AvailableInterviewSchedule extends Model
{
    use HasFactory;

    public function interviewer(): BelongsTo{
        return $this->belongsTo(interviewer::class);
    }

    public static function getScheduleById($eventId, $userId){
        $return = AvailableInterviewSchedule::where('event_id',$eventId)->where('interviewer_id',$userId)->orderBy('interview_date')->orderBy('interview_time')->get();

        return $return;
    }
}
