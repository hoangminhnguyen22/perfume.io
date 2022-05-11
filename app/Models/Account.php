<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table='accounts';

    protected $fillable = ['id', 'role_id', 'username', 'password', 'name', 'email', 'phone', 'address'];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'account_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class,'account_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'account_id', 'id');
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
