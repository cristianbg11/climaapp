<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\variable */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Variable'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variable-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Variable').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerLectura->totalCount){
    $gridColumnLectura = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'fecha',
            [
                'attribute' => 'estaciones.id',
                'label' => Yii::t('app', 'Estaciones')
            ],
                        'valor',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerLectura,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-lectura']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Lectura')),
        ],
        'export' => false,
        'columns' => $gridColumnLectura
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerPrediccion->totalCount){
    $gridColumnPrediccion = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'fecha',
            'fecha_estimada',
            'calculo_estimado',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrediccion,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prediccion']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prediccion')),
        ],
        'export' => false,
        'columns' => $gridColumnPrediccion
    ]);
}
?>

    </div>
</div>
