<?php

namespace App\Models;

use App\Models\Interviewer;
use App\Models\Recruitment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Division extends Model
{
    use HasFactory;


    /**
     * Get the recruitment associated with the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recruitment(): HasOne
    {
        return $this->hasOne(Recruitment::class);
    }

    /**
     * Get all of the interviewers for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interviewers(): HasMany
    {
        return $this->hasMany(Interviewer::class);
    }

    public function interviewerUsers(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class, // The final model (User)
            Interviewer::class, // The intermediate model (Interviewer)
            'division_id', //Foreign key on Interviewer (to Division)
            'id', // Foreign key on Event (primary key)
            'id', // Local key on Event (primary key)
            'user_id'  // Foreign key on Commitee (to User)
        )->where('interviewers.is_active', 1)->orderBy('users.name'); //default is ASC
    }
}
