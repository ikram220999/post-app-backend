<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "items";

    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
