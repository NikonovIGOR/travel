<?php

namespace app\models\cbt\query;

/**
 * This is the ActiveQuery class for [[Trip]].
 *
 * @see Trip
 */
class TripQuery extends \yii\db\ActiveQuery
{
    const TRIP_CORPORATE_ID = 3;
    const TRIP_SERVICE_SERVICE_ID = 2;

    public function actual()
    {
        return $this->andWhere(['corporate_id' => self::TRIP_CORPORATE_ID])->joinWith([
            'tripServices' => function ($query) {
                $query->andWhere(['service_id' => self::TRIP_SERVICE_SERVICE_ID]);
            },
        ], false);
    }

    public function airport($name)
    {
        return $this->joinWith([
            'flightSegment' => function ($query) use ($name) {
                $query->searchByName($name);
            },
        ], false);
    }
}
