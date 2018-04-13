<?php

namespace app\models\nemo_guide_etalon;

use app\models\NemoGuideEtalon;
use Yii;

/**
 * This is the model class for table "airport_name".
 *
 * @property int $id
 * @property int $airport_id
 * @property int $language_id
 * @property string $value
 */
class AirportName extends NemoGuideEtalon
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'airport_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['airport_id', 'value'], 'required'],
            [['airport_id', 'language_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['airport_id', 'language_id'], 'unique', 'targetAttribute' => ['airport_id', 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'airport_id' => 'Airport ID',
            'language_id' => 'Language ID',
            'value' => 'Value',
        ];
    }
}
