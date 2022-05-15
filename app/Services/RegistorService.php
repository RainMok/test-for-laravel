<?php
/**
 * 注册相关业务逻辑
 */

namespace App\Services;

use App\Models\UserTesting;
use Illuminate\Http\Request;
use App\Traits\InputChecker;

class RegistorService extends StatusCodeService {
    use InputChecker;

    /**
     * 微信注册
     *
     * @param Request $request 前端输入的注册数据
     * @return array 注册结果 [操作码，操作结果]
     */
    public static function registor(Request $request): array{
        try{
            // 注册输入校验，
            $registData = static::checkInputDataForWxRegistor($request);

            // 查询是否已注册
            $checkExistsRes = UserTesting::queryAccountExists($registData['phone'], $registData['email'])->toArray();
            if (count($checkExistsRes) > 0) return [
                'status'    =>      StatusCodeService::WX_REGISTOR_FAIL,
                'message'   =>      '该手机号或邮箱已经注册'
            ];

            // todo: 新用户，信息入库
            $insertRes = UserTesting::createOneRegister([
                'nickname'      =>      $registData['nickname'],
                'password'      =>      sha1($registData['password']),
                'email'         =>      $registData['email'],
                'phone'         =>      $registData['phone']
            ]);


            // 注册成功
            return [
                'message'   =>  'ok',
                'status'    =>  static::SUCCESS_CODE,
                'data'      =>  $checkExistsRes
            ];
        }catch(\Exception $e){
            // todo: 错误缓存处理，需要分级缓存，打到对应的级别才做缓存处理

            return [
                'message'   =>      $e->getMessage(),
                'status'    =>      $e->getCode()
            ];
        }
    }
}
