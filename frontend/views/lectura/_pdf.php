<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lectura */

$this->title = $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lecturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectura-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Lectura').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'fecha',
        [
                'attribute' => 'estaciones.id',
                'label' => Yii::t('app', 'Id Estaciones')
            ],
        [
                'attribute' => 'variable.id',
                'label' => Yii::t('app', 'Id Variable')
            ],
        'valor',
        'station_id',
        'ts',
        'date',
        'temp_out',
        'hum_out',
        'et',
        'solar_rad',
        'wind_speed',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
