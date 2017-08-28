<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/23
 * Time: 下午1:48
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code =404;
    public $msg='指定的类目不存在，请检查参数';
    public $errorCode=50000;
}