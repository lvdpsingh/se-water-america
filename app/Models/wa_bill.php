<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wa_bill extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function customer(){
        return $this->hasOne(User::class, 'id','customerID');
    }
}
