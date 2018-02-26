<?php
namespace backend\controllers;

use backend\controllers\CommonController;
use backend\models\Articles;
use common\models\UserParticulars;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;

/**
 * Site controller
 */
class PostController extends CommonController
{
    function init(){
        parent::init();
//        var_dump($this->d_users);die();
        $view = YII::$app->view;
        $view->params['d_users'] = $this->d_users;

//        $view->params['footers'] = $this->footers;
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //总共有多少条数据
        $counts = Articles::find()->count();
        $data1['pages'] = new Pagination(['totalCount' => $counts]);
//        //总共有多少条页数
//        $totalPage = ceil($counts / $pageSize);
        //每页多少条数据
        $data1['pages']->defaultPageSize = 2;
        $data = Articles::find()->orderBy("id asc")->offset($data1['pages']->offset)->limit($data1['pages']->limit)->asArray()->all();
        $data1['pages']->params=array("tab"=>'all');
        foreach ($data as $k=>$v){
            $u_name = UserParticulars::find()->select(['bi_name'])->from('user_particulars')->where(['user_id' => $v['a_user']])->column();
            if(!empty($u_name[0])){
                $data[$k]['bi_name'] = $u_name[0];
            }else{
                $data[$k]['bi_name'] = "";
            }
            if(empty($v['a_type'])){
                $data[$k]['d_type'] = "";
            }else if ($v['a_type'] == 1){
                $data[$k]['d_type'] = "文章";
            }else if ($v['a_type'] == 2){
                $data[$k]['d_type'] = "相册";
            }else if ($v['a_type'] == 3){
                $data[$k]['d_type'] = "日记";
            }
        }
//        var_dump($data);die();
        $view = YII::$app->view;
        $view->params['datas'] = $data;
        $view->params['data'] = $data1;
//        $view->params['totalPage'] = $totalPage;
//        $view->params['d_Page'] = 1;
//        var_dump($data);die();
        return $this->render('index');
    }

//    function actionArticles(){
//        //获取当前页
//        $loadingPage = \Yii::$app->request->get('nextPage',1);
//        //每页多少条数据
//        $pageSize = 2;
//        //总共有多少条数据
//        $counts = Articles::find()->count();
//        //总共有多少条页数
//        $totalPage = ceil($counts / $pageSize);
//        $data = Articles::find()->offset(($loadingPage - 1) * $pageSize)->orderBy("id desc")->limit($pageSize)->asArray()->all();
//        //下一页
//        $nextPage  = $loadingPage < $totalPage ? $loadingPage + 1 : 0;
//        echo json_encode([
//            'data'     => $data,
//            'nextPage' => $nextPage,
//        ]);
//    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = "login.php";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
