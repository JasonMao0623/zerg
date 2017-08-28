<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/8/6
 * Time: 下午3:43
 */

namespace app\api\model\service;


use think\Config;

class UserToken
{
    protected $code;
    protected $wxAppId;
    protected $wxSecret;
    protected $wxLoginUrl;
    //定义构造行数，并且将url拼接
    function __construct($code)
    {
        $wx=Config::get('wx');
        $this->code=$code;
        $this->wxAppId=$wx['appid'];
        $this->wxSecret=$wx['app_secret'];
        $this->wxLoginUrl=sprintf($wx['url'],$this->wxAppId, $this->wxSecret,$this->code);
    }

    public function get(){
        return 'success';
    }
}