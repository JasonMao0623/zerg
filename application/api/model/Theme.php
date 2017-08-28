<?php

namespace app\api\model;

use think\Model;

class Theme extends BaseModel
{
    protected $hidden=['topic_img_id','delete_time','head_img_id','update_time'];
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }
    //注意theme——product并没有定义模型
    public function product(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }
    //select方法将会多次遍历ids
    public static function getThemePic($ids){
        return self::with(['topicImg','headImg'])->select($ids);
    }
    //获取单个theme图片函数
    public static function getThemeWithProduct($id){
        $theme=self::with('product,topicImg,headImg')->find($id);
        return $theme;
    }
}
