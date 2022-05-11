<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='orderdetails';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'total', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    //them localSerach
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $data = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
