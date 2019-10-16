<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function landlord()
    {
        return $this->hasOne('App\Landlord', 'reference', 'uuid');
    }

    public function shareholder()
    {
        return $this->belongsTo('App\Office', 'office');
    }
}
