<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';
    protected $guarded = false;

    public function recomendations(){
        return $this->hasMany(Recomendation::class, 'speciality_id','id');
    }

}
