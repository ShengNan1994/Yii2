<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\UserParticulars;
use common\models\Syscodedata;

/**
 * ContactForm is the model behind the contact form.
 */
class CommonForm extends Model
{
    //当前用户详情查询
    public function getParts($where)
    {
        $Part = new UserParticulars();

        $parts = $Part->findIdentitys($where);

        return $parts;
    }
    //码表查询
    public function getFooter($where,$order)
    {
        $Foot = new Syscodedata();

        $foots = $Foot->findIdentitys($where,$order);

        return $foots;
    }

}
