<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/17
 * Time: 下午10:37
 */
/*
 * 参数异常类，baseValidata类的gocheck()方法调用
 */
namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code=400;
    public  $msg='参数错误';
    public $errorCode=10000;
}