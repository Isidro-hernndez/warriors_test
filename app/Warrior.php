<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warrior extends Model
{
    protected $table = 'warriors';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name', 'speed', 'strength', 'skills'
    ];
}
