<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stationery extends Model
{
    protected $table = 'stationery';
    use HasFactory;
    protected $fillable = ['item_name', 'description', 'quantity'];
}
