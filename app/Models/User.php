<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function committees(): HasMany
    {
        return $this->hasMany(Committee::class);
    }

    public function events(): HasManyThrough
    {
        return $this->hasManyThrough(
            Event::class, // The final model (Event)
            Committee::class, // The intermediate model (Commitee)
            'user_id', //Foreign key on Commitee (to User)
            'id', // Foreign key on Event (primary key)
            'id', // Local key on Event (primary key)
            'event_id'  // Foreign key on Commitee (to User)
        )->where('commitees.is_active', 1)->orderBy('events.event_name'); //default is ASC
    }



    /**
     * Get all of the interviewers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interviewers(): HasMany
    {
        return $this->hasMany(Interviewer::class);
    }

    public function asInterviewerDivisions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Division::class, // The final model (User)
            Interviewer::class, // The intermediate model (Interviewer)
            'user_id', //Foreign key on Interviewer (to user)
            'id', // Foreign key on Event (primary key)
            'id', // Local key on Event (primary key)
            'division_id'  // Foreign key on Interviewer (to division)
        )->where('interviewers.is_active', 1)->orderBy('divisions.division_name'); //default is ASC
    }

    public function registration(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function applications(): HasManyThrough
    {
        return $this->hasManyThrough(
            Recruitment::class, // The final model (Recruitment)
            Registration::class, // The intermediate model (Registration)
            'user_id', //Foreign key on Interviewer (to user)
            'id', // Foreign key on Event (primary key)
            'id', // Local key on Event (primary key)
            'recruitment_id'  // Foreign key on Commitee (to Recruitment)
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function authUsers($email, $password)
    {
        $userEmail = User::whereRaw('LOWER(email) = ?', [strtolower($email)])->first();

        if ($userEmail) {
            if ($userEmail && Hash::check($password, $userEmail->password)) {
                return true;
            }
        }
        return false;
    }
    public function getIdByEmail($email)
    {
        return User::where('email', $email)->first()->id;
    }
}