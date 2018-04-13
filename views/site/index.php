<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\cbt\search\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <?php ActiveForm::begin([
        'action' => ['/site/index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <?= Html::activeTextInput($searchModel, 'airport', ['class' => 'form-control']) ?>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">SEARCH</button>
                </span>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'corporate_id',
            'number',
            'user_id',
            'created_at',
        ],
    ]); ?>
</div>