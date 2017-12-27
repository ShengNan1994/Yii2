<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\CommonForm;

/**
 * Site controller
 */
class CommonController extends Controller
{
    public $d_users; //当前用户详细信息
//    public $footers; //底部信息

    public function init() {

        //获取用户信息
        if(!empty(Yii::$app->user->getId())){
            $this->d_users = $this->actionusers();
        }
//        var_dump(Yii::$app->user->getId());
//        var_dump($this->d_users);die();
        //获取底部信息
//        $this->footers = $this->actionfooters();

    }
    /**
     * @当前用户详细信息
     */
    public function actionusers()
    {
        $CommonForm = new CommonForm();
        $d_users = $CommonForm->getParts("u1.status = 10 and u1.id = ".Yii::$app->user->getId());
//        var_dump($menus);die();
        return $d_users;
    }
//    /**
//     * @底部
//     */
//    public function actionfooters()
//    {
//        $CommonForm = new CommonForm();
//        $foots = $CommonForm->getFooter("status = 1 and code = 'footer'","sort asc");
////        var_dump($menus);die();
//        return $foots;
//    }

}
