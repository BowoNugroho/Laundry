<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
