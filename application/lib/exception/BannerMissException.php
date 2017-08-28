<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/15
 * Time: 下午10:49
 */
/*
 * 通过继承BaseException类来定义不同的异常抛出格式
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code =404;
    public $msg='请求的Banner不存在';
    public $errorCode=40000;
}