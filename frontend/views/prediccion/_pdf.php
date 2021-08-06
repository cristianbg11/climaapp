<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccion */

$this->title = $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prediccion').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'variable.id',
                'label' => Yii::t('app', 'Id Variable')
            ],
        'fecha',
        'fecha_estimada',
        'calculo_estimado',
        [
                'attribute' => 'cultivo.id',
                'label' => Yii::t('app', 'Id Cultivo')
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerDetPrediccion->totalCount){
    $gridColumnDetPrediccion = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'fecha',
        'calculo_estimado',
            ];
    echo Gridview::widget([
        'dataProvider' => $providerDetPrediccion,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Det Prediccion')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnDetPrediccion
    ]);
}
?>
    </div>
</div>
