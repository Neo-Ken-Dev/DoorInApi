<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['city', 'date_of_birth'];
    /**
     * Get the user that owns the account.
     */
    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
