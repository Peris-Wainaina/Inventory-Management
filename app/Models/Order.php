<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $table = 'order';
    use HasFactory;
    protected $fillable = [ 'stationery_id','item_name', 'quantity', 'user_id', 'status'];

    public function stationery()
    {
        return $this->belongsTo(Stationery::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
