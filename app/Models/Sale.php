<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table='sales';

    protected $fillable = ['id', 'name', 'percent', 'start_date', 'end_date', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->hasOne(Product::class, 'sale_id', 'id');
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
