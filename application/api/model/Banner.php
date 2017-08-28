<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/14
 * Time: 下午10:04
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends BaseModel
{
    protected $hidden=['delete_time','update_time'];
    //定义一个关联模型的方法
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerById($id){
        //查询数据
        /*
         * items:调用items方法
         *items.img调用items下的img方法=》Image.php
         */
        $res=self::with(['items','items.img'])->find($id);
        if ($res){
            return $res;
        }else{
            return false;
        }
    }
}