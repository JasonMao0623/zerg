<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/15
 * Time: 下午10:29
 */
/*
 * 通过继承Handle类并改写原有的render方法改变异常抛出方式
 */
namespace app\lib\exception;


use think\exception\Handle;
use think\Log;
use think\Request;
use think\Exception;

class ExceptionHandler extends Handle
{   private $code;
    private $msg;
    private $errorCode;
    private $requestUrl;
    public function render(\Exception $e)
    {
        $request=Request::instance()->url();
        $this->requestUrl=$request;
        if($e instanceof BaseException){
            $this->msg=$e->msg;
            $this->code=$e->code;
            $this->errorCode=$e->errorCode;
        }else{
            /*面对客户端开发人员我们需要把服务器内部的错误具体信息隐藏
             *面对开发环境我们需要了解具体那个位置产生了了错误
             * 所以我们需要定义一个开关来实现生产环境与开发环境的切换
             * 所以这个模式的开关就是生产环境和开发环境
             */
            //开发者模式，不需要改写render
            if (config('app_debug')){
                /*
                 * 我们是通过继承Handle类的来改写默认的抛出异常方法
                 * 所以只需要直接返回父类的render方法
                 */
                return parent::render($e);
            }
            //生产环境模式
            else{
                $this->msg='服务器内部错误';
                $this->code=500;
                $this->errorCode=999;
            }
            $this->recordErrorLog($e);
        }
        $res=[
            'error_code'=>$this->errorCode,
            'request_url'=>$this->requestUrl,
            'msg'=>$this->msg
        ];
        return json($res);
    }
    private function recordErrorLog($e){
        Log::init([
            'type' => 'file',
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);
        Log::record($e,'error');
    }
}