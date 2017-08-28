<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/23
 * Time: 下午12:58
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden=['update_time','delete_time','topic_img_id'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public static function getCategoriesPic(){
        $categoriesPic=self::with('img')->select();
        return $categoriesPic;
    }
}