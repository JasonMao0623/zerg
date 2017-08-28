<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/9
 * Time: 下午2:29
 */

namespace app\lib\exception;


class ThemeMissException extends BaseException
{
    public $code =404;
    public $msg='指定主题不存在，请注意主题id';
    public $errorCode=30000;
}