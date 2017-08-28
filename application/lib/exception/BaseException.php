<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/15
 * Time: 下午10:43
 */
/*
 * 定义一个基类判定该异常属于服务器内部错误还是客户端请求错误
 */

namespace app\lib\exception;

//定义一个基类用于存储错误信息
use think\Exception;
use Throwable;

class BaseException extends Exception
{
    //http状态码 404 200....
    public $code=400;
    //错误信息
    public $msg='参数错误';
    //错误代码
    public $errorCode=40001;
    //通过定义构造函数，可以直接通过传参的方式改写msg的值
    public function __construct($param=[])
    {
        if (!is_array($param)){
            return;
        }
        if(array_key_exists('code',$param)){
            $this->code=$param['code'];
        }
        if(array_key_exists('msg',$param)){
            $this->msg=$param['msg'];
        }
        if(array_key_exists('errorCode',$param)){
            $this->errorCode=$param['errorCode'];
        }
    }
}