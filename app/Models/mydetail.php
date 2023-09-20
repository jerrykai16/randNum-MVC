<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mydetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'mydetail'; 
    protected $fillable = [
        'id',
        'turn',
        'rec'
    ];
}
