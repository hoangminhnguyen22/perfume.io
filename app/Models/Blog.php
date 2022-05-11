<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table='blogs';

    protected $fillable = ['id', 'account_id', 'title', 'description', 'slug', 'images', 'created_at', 'updated_at'];

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
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
