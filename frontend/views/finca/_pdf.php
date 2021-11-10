<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Finca */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fincas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finca-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Finca').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Localidad',
        [
                'attribute' => 'productor.Nombre',
                'label' => Yii::t('app', 'Id Productor')
            ],
        'latitud',
        'longitud',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerCultivoFinca->totalCount){
    $gridColumnCultivoFinca = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                [
                'attribute' => 'cultivo.Cultivo',
                'label' => Yii::t('app', 'Id Cultivo')
            ],
        'tam_tareas',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCultivoFinca,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Cultivo Finca')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnCultivoFinca
    ]);
}
?>
    </div>
</div>
