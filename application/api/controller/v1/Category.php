<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/7/23
 * Time: 下午12:57
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategorise(){
        $res = CategoryModel::getCategoriesPic();
        if($res->isEmpty()){
            throw new CategoryException();
        }
        return $res;
    }
}