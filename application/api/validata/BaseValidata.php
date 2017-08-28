<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/13
 * Time: 下午10:50
 */
//定义一个基类，其他验证类都可以调用
namespace app\api\validata;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Validate;
use think\Request;

class BaseValidata extends Validate
{
    //定义gocheck函数用于参数校验
    public function goCheck(){
        //获取参数
        $params=Request::instance()->param();
        //执行check方法，因为该类集成与Validata所以不需要实例化，直接调用$this方法
        $res=$this->batch()->check($params);
        //var_dump($res);
        //如果验证失败
        if(!$res){
            //抛出异常,调用ParameterException类
            //这里面对于改写msg的值有两种方法
            //第一种直接改写$e的msg值
//            $e=new ParameterException();
//            $e->msg=$this->getError();
            //第二种通过构造函数直接传入参数改写
            $e =new ParameterException([
                //获取验证器的具体错误信息，并传入msg值
                'msg' =>$this->getError()
            ]);
            throw $e;
        }else{
            return true;
        }
    }
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value)&&is_int($value+0)&&($value+0)>0) {
            //echo $value.'这是true';
//            echo $data;
//            echo 'field是'.$field;
//            echo 'rule是'.$rule;
            return true;
        }else{
            return false;
        }
    }
    //自定义规则，不能是空值
    protected  function isNotEmpty($value,$rule='',$data='',$filed=''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
}