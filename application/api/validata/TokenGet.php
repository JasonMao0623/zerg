<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/8/6
 * Time: 下午3:32
 */

namespace app\api\validata;


class TokenGet extends BaseValidata
{
    protected $rule=[
      'code' => 'require|isNotEmpty'
    ];
    protected $message=[
        'code' => 'code不能为空'
    ];
}