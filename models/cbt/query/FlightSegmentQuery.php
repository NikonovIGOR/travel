<?php

namespace app\models\cbt\query;

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
                $query->andFilterWhere(['like', 'value', $airportName]);
            },
        ], false);
    }
}
