<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'student';

    public function Usuarios(){
        return $this->hasOne('App\Models\Usuarios','id', 'id_user')->withDefault(['email'=>'']);
    }

    public function Teacher(){
        return $this->hasOne('App\Models\Teacher','id', 'id_teacher')->withDefault(['name'=>'']);
    }
    
    public function Level(){
        return $this->hasOne('App\Models\Level','id', 'id_level')->withDefault(['name'=>'']);
    }
}
