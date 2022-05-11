<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'role_id', 'id');
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
