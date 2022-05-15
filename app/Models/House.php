<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model {
    use HasFactory;

    protected $table = 'house';
    protected $attributes = [
        'remark'    =>      '',
        'status'    =>      1,
        // 'last_update_time'  =>  '0000-00-00 00:00:00'
    ];

    public $timestamps = false;

    public static function getData(){
        return static::query()->get();
    }


    public static function addData($data){
        try{
            return static::query()->insert($data);
        }catch(\Exception $e){
            throw new Exception('数据库添加失败' . $e->getMessage());
        }
    }



    public static function getHouseInfoById(int $houseId){
        return static::query()->where('rid', '=', $houseId)->get();
    }
}
