<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    /*NavBar::begin([
        'brandLabel' => Yii::t('common','Yii China'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);*/
    $left_menus = array();
    array_push($left_menus,['label'=>'<img src="../statics/images/small.jpg">','url'=>Yii::$app->homeUrl, 'linkOptions'=>['class' => 'avatar']]);
    array_push($left_menus,['label'=>Yii::t('common','Yii China'),'url'=>Yii::$app->homeUrl, 'linkOptions'=>['class' => 'avatarr']]);
    $menuItems = array();
    foreach ($this->params['menus'] as $v){
        array_push($menuItems,['label' => $v['menu_name'], 'url' => [$v['menu_url']]]);
    }
//    $menuItems = [
//        ['label' => '我的主页', 'url' => ['/site/index']],
//        ['label' => '我的文章', 'url' => ['/site/contact']],
//        ['label' => '关于我们', 'url' => ['/site/about']],
//    ];
//    var_dump($menuItemss);var_dump($menuItems);die();
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//    } else {
//        /*$menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::img(
//                '../statics/images/small.jpg',
//                ['class' => 'avatar']
//            )
//            .'<ul><li>'
//            . Html::submitButton(
//                '退出',
//                ['class' => 'btn btn-link logout']
//            )
//            .'</li></ul>'
//            . Html::endForm()
//            . '</li>';*/
//        $menuItems[] = [
//            'label'=>'<img src="../statics/images/small.jpg" alt="'.Yii::$app->user->identity->username.'">',
//            'linkOptions'=>['class' => 'avatar'],
//            'items'=>[
//                   ['label'=>'退出','url'=>['/site/logout'],'linkOptions'=>['data-method'=>'post']]
//            ],
//
//        ];
//    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $left_menus,
        'encodeLabels' => false,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<section id="footer">
    <div class="inner">
        <ul class="copyright">
            <?php foreach ($this->params['footers'] as $v): ?>
                <li><?= $v['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
