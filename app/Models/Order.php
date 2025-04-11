<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    use HasFactory;
    protected $fillable = [ 'stationery_id','item_name', 'quantity'];

    public function stationery()
    {
        return $this->belongsTo(Stationery::class);
    }
}
