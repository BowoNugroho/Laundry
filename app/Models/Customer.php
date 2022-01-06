<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gender()
    {
    return $this->belongsTo(gender::class);
    }
    public function status()
    {
    return $this->belongsTo(status::class);
    }
}
