<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_stat extends Model
{
    use HasFactory;
    public function signatory()
    {
        return $this->belongsTo(Signatory::class,"signatory_id", "id");
    }
    public function assignatory()
    {
        return $this->belongsTo(Assignatory::class,"assignatory_id", "id");
    }
    public function owned()
    {
        return $this->hasOne(Account::class,"id");
    }
}
