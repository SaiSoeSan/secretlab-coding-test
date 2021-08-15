<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiModel extends Model
{
    protected $fillable = [
        'mykey', 'myvalue', 'timestamp',
    ];

    protected $table = 'versions';
}
