<?php

namespace app\models\cbt\query;

use app\models\nemo_guide_etalon\AirportName;

/**
 * This is the ActiveQuery class for [[FlightSegment]].
 *
 * @see FlightSegment
 */
class FlightSegmentQuery extends \yii\db\ActiveQuery
{
    public function searchByName($airportName)
    {
        return $this->joinWith([
            'airportName' => function ($query) use ($airportName) {
                $query->from('nemo_guide_etalon.' . AirportName::tableName())
                    ->andFilterWhere(['like', 'value', $airportName]);
            },
        ]);
    }
}
