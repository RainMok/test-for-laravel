<?php
/**
 * 整个项目的状态码管理类
 */

namespace App\Services;

class StatusCodeService {

    // 正确状态码
    const SUCCESS_CODE = 200;

    //----------------------------------微信相关错误码
    // 注册注册失败
    const WX_REGISTOR_FAIL = 700;
    // 微信注册昵称缺失
    const WX_REGISTOR_FAIL_WITHOUT_NICKNAME = 701;
    // 微信注册邮箱缺失
    const WX_REGISTOR_FAIL_WITHOUT_EMAIL = 702;
    // 微信注册密码缺失
    const WX_REGISTOR_FAIL_WITHOUT_PASSWORD = 703;
    // 微信注册手机号缺失
    const WX_REGISTOR_FAIL_WITHOUT_PHONE = 704;
}
