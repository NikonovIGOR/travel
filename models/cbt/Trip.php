<?php

namespace app\models\cbt;

use app\models\Cbt;
use app\models\cbt\query\TripQuery;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property int $corporate_id
 * @property int $number
 * @property int $user_id
 * @property int $created_at Дата и время создания
 * @property int $updated_at Дата и время последнего обновления
 * @property int $coordination_at Дата и время согласования
 * @property int $saved_at Дата и время сохранения
 * @property int $tag_le_id
 * @property int $trip_purpose_id
 * @property int $trip_purpose_parent_id
 * @property string $trip_purpose_desc Цель командировки
 * @property int $status Статус
 *
 * @property TripService[] $tripServices
 */
class Trip extends Cbt
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * @inheritdoc
     * @return TripQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TripQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corporate_id', 'number', 'user_id', 'created_at', 'updated_at', 'coordination_at', 'saved_at', 'tag_le_id', 'trip_purpose_id', 'trip_purpose_parent_id', 'trip_purpose_desc', 'status'], 'required'],
            [['corporate_id', 'number', 'user_id', 'created_at', 'updated_at', 'coordination_at', 'saved_at', 'tag_le_id', 'trip_purpose_id', 'trip_purpose_parent_id'], 'integer'],
            [['trip_purpose_desc'], 'string'],
            [['status'], 'string', 'max' => 1],
            [['corporate_id', 'number'], 'unique', 'targetAttribute' => ['corporate_id', 'number']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'corporate_id' => 'Corporate ID',
            'number' => 'Number',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'coordination_at' => 'Coordination At',
            'saved_at' => 'Saved At',
            'tag_le_id' => 'Tag Le ID',
            'trip_purpose_id' => 'Trip Purpose ID',
            'trip_purpose_parent_id' => 'Trip Purpose Parent ID',
            'trip_purpose_desc' => 'Trip Purpose Desc',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTripServices()
    {
        return $this->hasMany(TripService::class, ['trip_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightSegment()
    {
        return $this->hasMany(FlightSegment::class, ['flight_id' => 'id'])
            ->via('tripServices');
    }
}
