<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mymaster extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'mymaster'; 
    protected $fillable = [
        'id',
        'freq'
    ];
}
