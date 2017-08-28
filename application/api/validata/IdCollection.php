<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/29
 * Time: 下午11:08
 */

namespace app\api\validata;


class IdCollection extends BaseValidata
{
    protected $rule=[
        'ids'=>'require|checkIDs'
    ];
    protected $message=[
        'ids'=>'所传参数必须是以逗号分隔的正整数'
    ];
    protected function checkIDs($value){
        //判断参数是否为以','间隔。
        $value=explode(',',$value);
        if(empty($value)){
            return false;
        }
        //循环便利数组，id必须是正整数
        foreach ($value as $id){
            //将isPositive。。。设置成基类，直接调用
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}