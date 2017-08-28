<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/28
 * Time: 下午9:50
 */

namespace app\api\model;


use think\Config;
use think\Model;

class BaseModel extends Model
{
    public function prefixImgUrl($value,$data){
        if($data['from']==1){
            $c=Config::get('img_prefix');
            return $c.$value;
        }else{
            return $value;
        }
}
}