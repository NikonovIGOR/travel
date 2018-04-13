<?php

namespace app\models;

use Yii;


class NemoGuideEtalon extends \yii\db\ActiveRecord
{
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_nemo_guide_etalon');
    }
}
