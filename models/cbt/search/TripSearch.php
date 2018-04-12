<?php

namespace app\models\cbt\search;

use app\models\cbt\Trip;
use yii\data\ActiveDataProvider;

/**
 * TripSearch represents the model behind the search form of `app\models\cbt\Trip`.
 */
class TripSearch extends Trip
{
    const TRIP_CORPORATE_ID = 3;
    const TRIP_SERVICE_SERVICE_ID = 2;
    /**
     * QUERY
     *
     * @var
     */
    public $q;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Trip::find()->with();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        $query->andFilterWhere(['corporate_id' => self::TRIP_CORPORATE_ID]);

        return $dataProvider;
    }
}
