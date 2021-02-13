<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function levels()
    {
        return $this->hasMany('App\Models\Level');
    }
}