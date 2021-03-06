<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccionhecha */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccionhechas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccionhecha-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prediccionhecha').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        ['attribute' => 'temp_out', 'visible' => false],
        ['attribute' => 'hum_out', 'visible' => false],
        ['attribute' => 'solar_rad', 'visible' => false],
        ['attribute' => 'wind_speed', 'visible' => false],
        ['attribute' => 'etp', 'visible' => false],
        ['attribute' => 'fecha', 'visible' => false],
        'fecha_estimada_inicial',
        'fecha_estimada_final',
        [
                'attribute' => 'estacion.Nombre',
                'label' => Yii::t('app', 'Estacion')
            ],
        ['attribute' => 'id_user', 'visible' => false],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
