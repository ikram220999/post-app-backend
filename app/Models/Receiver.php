<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiver extends Model
{
    use SoftDeletes, HasFactory;

    
    protected $table = "receivers";

    protected $guarded = ['id'];

    public function recevier()
    {
        return $this->hasMany(Item::class, 'receiver_id');
    }

}
