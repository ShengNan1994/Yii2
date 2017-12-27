<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Menu;
use common\models\Syscodedata;

/**
 * ContactForm is the model behind the contact form.
 */
class CommonForm extends Model
{
    //菜单查询
    public function getMenu($where)
    {
        $Menu = new Menu();

        $menus = $Menu->findIdentitys($where);

        return $menus;
    }
    //码表查询
    public function getFooter($where,$order)
    {
        $Foot = new Syscodedata();

        $foots = $Foot->findIdentitys($where,$order);

        return $foots;
    }

}
