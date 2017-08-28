<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/17
 * Time: 下午9:44
 */

namespace app\api\controller\v1;


use app\api\validata\Count;
use app\api\model\Product as productModel;
use app\api\validata\IdMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
    /*
     * @url product/recent
     */
    public function getRecent($count=15){
        (new Count())->goCheck();
        $res=productModel::getMostRecent($count);
        //由于$res为对象所以不能直接使用！res。
        if($res->isEmpty()){
            throw new ProductException();
        }
        //$res为一个对象，可以调动对象里面的hidden方法。
        $res=$res->hidden(['summary']);
        return $res;
    }
    public function getCategoryProducts($id){
        (new IdMustBePostiveInt())->goCheck();
        $res =ProductModel::getAllInCategory($id);
        if($res->isEmpty()){
            throw new ProductException();
        }
        return $res;
    }
}