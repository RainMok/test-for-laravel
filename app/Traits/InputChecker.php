<?php
declare(strict_types=1);
/**
 * 外部输入检查
 */

namespace App\Traits;

use Illuminate\Http\Request;
use App\Services\StatusCodeService;
use Illuminate\Support\Str;


trait InputChecker {

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    protected final static function checkInputDataForWxRegistor(Request $request): array{
        // 昵称检查
        if (!$request->has('nickname'))
        throw new \Exception('昵称不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_NICKNAME);

        $nickname = $request->input('nickname');
        if (Str::of($nickname)->trim()->isEmpty())
        throw new \Exception('昵称不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_NICKNAME);


        // 邮箱检查
        if (!$request->has('email'))
        throw new \Exception('邮箱不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_EMAIL);

        $email = $request->input('email');
        if (Str::of($email)->trim()->isEmpty())
        throw new \Exception('邮箱不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_EMAIL);


        // 密码检查
        if (!$request->has('password'))
        throw new \Exception('密码不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_PASSWORD);

        $password = $request->input('password');
        if (Str::of($password)->trim()->isEmpty())
        throw new \Exception('密码不能为空2', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_PASSWORD);


        // 手机号检查
        if (!$request->has('phone'))
        throw new \Exception('手机号不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_PHONE);

        $phone = $request->input('phone');
        if (Str::of($phone)->trim()->isEmpty())
        throw new \Exception('手机号不能为空', StatusCodeService::WX_REGISTOR_FAIL_WITHOUT_PHONE);



        // todo: 其他进一步校验




        // 返回统一结果以便后期调用数据
        return [
            'nickname'  =>      trim($nickname),
            'email'     =>      trim($email),
            'password'  =>      trim($password),
            'phone'     =>      trim($phone)
        ];
    }
}
