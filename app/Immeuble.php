<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    protected $fillable = ['nb_residents', 'nb_flats', 'street', 'city', 'zip_code'];
    /**
     * The users that owns the building.
     */
    public function owners()
    {
        return $this->belongsToMany(User::class);
    }
}
