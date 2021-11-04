<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    public function adviser()
    {
        return $this->hasOne(Adviser::class,"id","adviser_id");
    }

    public function students()
    {
        return $this->hasMany(Student::class,"class_id","id");
    }

}
