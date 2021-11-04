<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;
    public function owned()
    {
        return $this->belongsTo(Account::class,"id", "owner_id");
    }

    public function advisory()
    {
        return $this->belongsTo(Classe::class,"id", "adviser_id");
    }
}
