<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'roles'; //dai dien cho bang nao
    public function users(){
        return $this->hasMany(User::class,'role_id','id');
    }
}
