<?php

namespace app\controllers;

use app\models\cbt\FlightSegment;
use app\models\cbt\search\TripSearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new TripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $fly = FlightSegment::find()->searchByName('Домодедово, Москва')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
