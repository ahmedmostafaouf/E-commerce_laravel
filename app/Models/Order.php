<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'user_id',
        'product_id',
        'bank_transaction_id',
        'status',
        'status_code'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Products::class,'product_order_table','order_id','product_id')->withPivot('quantity');
    }
}
