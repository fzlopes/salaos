<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client', 'date', 'hour', 'observation', 'value', 'service_id'
    ];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}


