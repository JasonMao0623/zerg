<?php

namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    protected $hidden=['delete_time','update_time','from','pivot','create_time'];
    //添加url前置函数
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    //链式查询product
    public static function getMostRecent($count){
        //desc倒叙查询
        $products=self::limit($count)->order('create_time desc')->select();
        return $products;
    }
    public static function getAllInCategory($categoryId){
        $products=self::where('category_id','=',$categoryId)->select();
        return $products;
    }
}
