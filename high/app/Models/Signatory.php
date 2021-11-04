<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signatory extends Model
{
    use HasFactory;
    public function owned()
    {
        return $this->belongsTo(Account::class,"id", "owner_id");
    }

}
