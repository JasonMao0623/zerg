<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/17
 * Time: 下午9:58
 */

namespace app\api\validata;


class Count extends BaseValidata
{
     protected $rule=[
         'count'=>'isPositiveInteger|between:1,15'
     ];
}