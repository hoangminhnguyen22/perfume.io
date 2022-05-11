<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    protected $fillable = ['id', 'sale_id', 'category_id', 'name', 'slug', 'images', 'quantity', 'price', 'description', 'created_at', 'updated_at'];

    public function sale()
    {
        return $this->hasOne(Sale::class, 'id', 'sale_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
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
