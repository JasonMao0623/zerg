<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/11
 * Time: 下午9:40
 */

namespace app\api\controller\v1;
use app\api\validata\IdMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;

/**
 * url:/banner/id
 * type:get
 * @id:banner的id
 */
class Banner
{
    public function getBanner($id){
        (new IdMustBePostiveInt())->goCheck();
        $res=BannerModel::getBannerById($id);
        //所有的异常都会经过handle类抛出
        if(!$res){
            /*
             * 选择抛出异常的类型
             */
            throw new BannerMissException();
        }else{
            return $res;
        }

    }
}