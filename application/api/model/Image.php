<?php

namespace app\api\model;

use think\Config;
use think\Model;

class Image extends BaseModel
{
    protected $hidden=['delete_time','update_time','id','from'];
    /*
     * URL拼接
     * $value接收url，这个方法会有个循环
     * config（）访问配置文件里面的参数，只能读取convention里面的参数，所以需要在convention里面配置
     * img_prefix写法不变
     * Url是表格中的title定义的，可以为from，可以为其他的
     * getUrlAttr->过滤器
     */
//    public function getUrlAttr($value,$data){
//        //var_dump($data);
//        if($data['from']==1){
//            $c=Config::get('img_prefix');
//            return $c.$value;
//        }else{
//            return $value;
//        }
//    }
//将上述方法封装到basemodel类中，然后在子类中调用
    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}

