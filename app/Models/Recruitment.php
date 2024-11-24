<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Recruitment extends Model
{
    use HasFactory;

    /**
     * Get all of the registration for the Recruitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registration(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function applicants(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class, // The final model (User)
            Registration::class, // The intermediate model (Registration)
            'recruitment_id', //Foreign key on Interviewer (to Division)
            'id', // Foreign key on Event (primary key)
            'id', // Local key on Event (primary key)
            'user_id'  // Foreign key on Commitee (to User)
        )->orderBy('users.name'); //default is ASC
    }
    
    public function available_interview_schedules(): HasMany
    {
        return $this->hasMany(AvailableInterviewSchedule::class);
    }

    /**
     * Get all of the questions for the Recruitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the division associated with the Recruitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function division(): HasOne
    {
        return $this->hasOne(Division::class);
    }
}
