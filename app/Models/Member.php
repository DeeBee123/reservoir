<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $fillable = ['name', 'surname', 'live', 'experience', 'registered', 'reservoir_id'];

    public function reservoir(){
        return $this->belongsTo('App\Models\Reservoir');
    }
}
