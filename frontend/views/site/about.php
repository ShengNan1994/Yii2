<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '关于我们';
?>
<section id="wrapper">
    <header>
        <div class="inner">
            <h2>关于我们</h2>
            <?php foreach ($this->params['about_me'] as $v): ?>
                <p><?= $v['name'] ?></p>
            <?php endforeach; ?>
        </div>
    </header>
    <!-- Content -->
</section>
