<?php
/**
 * Created by PhpStorm.
 * User: mjj
 * Date: 2017/6/29
 * Time: 下午10:02
 */

namespace app\api\controller\v1;
use app\api\model\Theme as ThemeModel;
use app\api\validata\IdCollection;
use app\lib\exception\ThemeMissException;
use app\api\validata\IdMustBePostiveInt;

class Theme
{
    /*
     * @url theme?ids=id1,id2....
     * @return 一组theme
     */
    public function getSimpleList($ids=''){
        (new IdCollection())->goCheck();
        //将以，分割的参数设置成数组
        $ids=explode(',',$ids);
        $res=ThemeModel::getThemePic($ids);
        if($res->isEmpty()){
            throw new ThemeMissException();
        }
        return $res;
    }
    /*
     * @url theme/id
     * @return 单个theme详细信息
     */
    public function getComplexOne($id){
        (new IdMustBePostiveInt())->goCheck();
        $res=ThemeModel::getThemeWithProduct($id);
        if(!$res){
            throw new ThemeMissException();
        }
        return $res;
    }
}