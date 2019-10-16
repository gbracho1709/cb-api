<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user');
    }

    public function office()
    {
        return $this->belongsTo('App\Office', 'office');
    }
}
