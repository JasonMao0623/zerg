<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/17
 * Time: 下午10:21
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code =404;
    public $msg='指定的商品不存在，请注意count';
    public $errorCode=20000;
}