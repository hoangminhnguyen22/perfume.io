<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';

    protected $fillable = ['id', 'account_id', 'note', 'status', 'total', 'created_at', 'updated_at'];

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
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
