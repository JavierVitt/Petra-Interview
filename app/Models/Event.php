<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaAcara',
        'tanggalOprec',
        'tanggalCloserec',
        'deskripsiAcara',
        'tanggalAcara',
        'lingkupAcara',
        'lokasiAcara',
        'proposalAcara',
        'raRmaAcara'
    ];
    

    protected $attributes = [
        'status' => "ongoing"
    ];

    public function committees(): HasMany
    {
        return $this->hasMany(Committee::class);
    }

    /**
     * Get all of the divisions for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class, // The final model (User)
            Committee::class, // The intermediate model (Commitee)
            'event_id', //Foreign key on Commitee (to Event)
            'id', // Foreign key on User (primary key)
            'id', // Local key on Event (primary key)
            'user_id'  // Foreign key on Commitee (to User)
        )->where('commitees.is_active', 1)->orderBy('users.name'); //default is ASC
    }
}
