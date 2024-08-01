<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        "name",
        "IP_address",
        "model",
    ];
}
