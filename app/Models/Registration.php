<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    /**
     * Get the interview associated with the Registration
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interview(): HasOne
    {
        return $this->hasOne(Interview::class);
    }
    
}
