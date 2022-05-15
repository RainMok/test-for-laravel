<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTesting extends Model
{
    use HasFactory;

    protected $table = 'user_testing';
    public $timestamps = false;
    protected $attributes = [
        'status'    =>      1,
    ];
    protected $fillable = [
        'nickname',
        'password',
        'email',
        'phone'
    ];


    /**
     * 添加注册信息
     *
     * @param array $data 注册信息
     * @return Model 注册表对象
     */
    public static final function createOneRegister(array $data): Model{
        return static::query()->create($data);
    }


    public static final function queryAccountExists(string $phone, string $email){
        return static::query()->where('phone', '=', $phone)
                              ->orWhere('email', '=', $email)
                              ->get();
    }
}
