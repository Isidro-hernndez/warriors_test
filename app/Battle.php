<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    protected $table = 'battles';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','user_id', 'warrior_used', 'warrior_fought', 'victory', 'date'
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function used()
    {
        return $this->belongsTo(Warrior::class, 'warrior_used');
    }

    public function fought()
    {
        return $this->belongsTo(Warrior::class, 'warrior_fought');
    }

}
