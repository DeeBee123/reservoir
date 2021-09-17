<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    use HasFactory;
    public $fillable = ['title', 'area', 'about'];

    public function members(){
        return $this->hasMany('App\Models\Member');
    }
}
