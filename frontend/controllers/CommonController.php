<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\CommonForm;

/**
 * Site controller
 */
class CommonController extends Controller
{
    public $menus; //菜单
    public $footers; //底部信息

    public function init() {

        //获取菜单
        $this->menus = $this->actionmenus();
        //获取底部信息
        $this->footers = $this->actionfooters();

    }
    /**
     * @菜单
     */
    public function actionmenus()
    {
        $CommonForm = new CommonForm();
        $menus = $CommonForm->getMenu("status = 1");
//        var_dump($menus);die();
        return $menus;
    }
    /**
     * @底部
     */
    public function actionfooters()
    {
        $CommonForm = new CommonForm();
        $foots = $CommonForm->getFooter("status = 1 and code = 'footer'","sort asc");
//        var_dump($menus);die();
        return $foots;
    }

}
