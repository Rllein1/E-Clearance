<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incharge extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->hasOne(Signatory::class,"incharge_id","id");
    }
}