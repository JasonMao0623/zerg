<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/11
 * Time: 下午9:40
 */

namespace app\api\controller\v2;
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
        return 'this is v2 version';
    }
}