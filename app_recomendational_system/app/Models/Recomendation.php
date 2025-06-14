<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    protected $table = 'recomendations';
    protected $guarded = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class,'speciality_id','id');
    }
}
