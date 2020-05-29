<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id', 'question', 'ans_a', 'ans_b', 'ans_c', 'ans_d', 'answer' ,'level'
    ];


    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
