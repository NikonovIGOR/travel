<?php

namespace app\models\cbt\search;

use app\models\cbt\Trip;
use yii\data\ActiveDataProvider;

/**
 * TripSearch represents the model behind the search form of `app\models\cbt\Trip`.
 */
class TripSearch extends Trip
{
    public $airport;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['airport'], 'safe'],
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
        $query = Trip::find()->actual();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);
        $query->airport($this->airport);

        return $dataProvider;
    }
}
