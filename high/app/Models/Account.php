<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Account extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class,"id");
    }

    public function student()
    {
        return $this->belongsTo(Student::class,"owner_id","id");
    }

    public function adviser()
    {
        return $this->belongsTo(Adviser::class,"owner_id","id");
    }

    public function owner()
    {
        if(Auth::user()->account->position=='adviser'){
            return $this->belongsTo(Adviser::class,"owner_id","id");
        }elseif(Auth::user()->account->position=='student'){
            return $this->belongsTo(Student::class,"owner_id","id");
        }else{
            return $this->belongsTo(Signatory::class,"owner_id","id");
        }
        
    }


}
