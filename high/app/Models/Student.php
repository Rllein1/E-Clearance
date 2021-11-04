<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function owned()
    {
        return $this->belongsTo(Account::class,"id", "owner_id");
    }

    public function status()
    {
        return $this->hasMany(Student_stat::class,"student_id");
    }

    public function class()
    {
        return $this->belongsTo(Classe::class,"id", "class_id");
    }
}
