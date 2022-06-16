<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes, HasFactory;

    
    protected $table = "states";

    protected $guarded = ['id'];

    public function store()
    {
        return $this->hasMany(Store::class, 'state_id');
    }
}
