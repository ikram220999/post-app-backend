<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'staff';

    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'staff_id');
    }
}
