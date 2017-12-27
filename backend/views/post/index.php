<?php

/* @var $this yii\web\View */

$this->params['breadcrumbs'][] = '内容管理';
$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <input class="input-sm" type="text" name="w_name" value="" placeholder="请输出文章名称"/>
    <input class="input-sm" type="text" name="u_name" value="" placeholder="请输出作者名称"/>
    <button class="btn btn-primary">搜索</button>
    <a class="btn btn-success" href="#">写文章</a>
    <table class="table table-bordered" id="table2">
        <thead>
        <tr id="t2">
            <th>ID</th>
            <th>标题</th>
            <th>作者</th>
            <th>类型</th>
            <th>简介</th>
            <th>操作</th>
        </tr>
        <?php foreach ($this->params['datas'] as $v): ?>
            <tr>
                <td><?=$v['id']?></td>
                <td><?=$v['a_title']?></td>
                <td><?=$v['a_user']?></td>
                <td><?=$v['a_type']?></td>
                <td><?=$v['a_intro']?></td>
                <td><a class="btn btn-danger" href="#">删除</a></td>
            </tr>
        <?php endforeach; ?>
        </thead>
    </table>
    <div class="text-right">
        <button class="btn btn-page">上一页</button>
        <button class="btn btn-page"><?=$this->params['d_Page']?></button>
        <button class="btn btn-page" onclick="">下一页</button>
    </div>
</div>