<?php

namespace app\models;

use Yii;


class Cbt extends \yii\db\ActiveRecord
{
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_cbt');
    }
}
