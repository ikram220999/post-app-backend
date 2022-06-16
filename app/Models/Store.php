<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "stores";

    protected $guarded = ['id'];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'store_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'store_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
