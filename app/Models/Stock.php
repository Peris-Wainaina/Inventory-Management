<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable = [
        'stationery_id', 'change_type', 'quantity'
    ];
//     public function stationery()
// {
//     return $this->belongsTo(Stationery::class);
// }
}
