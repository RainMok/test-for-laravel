<?php

namespace App\Http\Controllers\Wx;

use App\Http\Controllers\Controller;
use App\Services\RegistorService;
use Illuminate\Http\Request;

/**
 * 微信登录相关操作
 */
class LoginController extends Controller {

    /**
     * 微信登录注册
     *
     * @param Request $request 前端输入请求
     * @return array 注册结果
     */
    public function registor(Request $request): array{
        return RegistorService::registor($request);
    }
}
