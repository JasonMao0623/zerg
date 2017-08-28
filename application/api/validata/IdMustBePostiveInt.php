<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/13
 * Time: 下午10:00
 */

namespace app\api\validata;


use app\api\validata\BaseValidata;
use app\lib\exception\BannerMissException;
use app\lib\exception\IdMustBePostiveIntException;

class IdMustBePostiveInt extends BaseValidata
{
    //通过改写rule规则验证错误,其中只要有一个验证错误则返回false。
    protected $rule =[
        //自定义ispos规则
        'id' =>'require|isPositiveInteger',
    ];
    //自定义规则，调用isPositive..protect方法，由于是protect方法，所以集成的函数直接可以继承。
}