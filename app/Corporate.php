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
        return $this->hasMany('App\Sharedholder', 'uuid');
    }

    public function office()
    {
        return $this->belongsTo('App\Office', 'office');
    }
}
