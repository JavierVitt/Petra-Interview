<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interviewer extends Model
{
    use HasFactory;

    /**
     * Get all of the available_interview_schedules for the Interviewer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function available_interview_schedules(): HasMany
    {
        return $this->hasMany(AvailableInterviewSchedule::class);
    }
}
