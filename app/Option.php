<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'option_title', 'option', 'multiple_choice_id',
    ];

    public function mcConnect(){
        return $this->belongsTo('App\MultipleChoice');
    }
}
