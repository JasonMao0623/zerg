<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/8/6
 * Time: 下午3:28
 */

namespace app\api\controller\v1;


use app\api\model\service\UserToken;
use app\api\validata\TokenGet;

class Token
{
    public function getToken($code='')
    {
        (new TokenGet()) ->goCheck();
        $ur= new UserToken($code);
        $res= $ur->get();
        return $res;
    }
}