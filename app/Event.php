<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'image', 'lat','lng', "type_event_id"
    ];

    public function type()
    {
        return $this->belongsTo('App\TypeEvent', 'type_event_id');
    }
}
