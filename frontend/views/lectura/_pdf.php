<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\lectura */

$this->title = $model->id;
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
                'attribute' => 'estaciones.Nombre',
                'label' => Yii::t('app', 'Id Estaciones')
            ],
        [
                'attribute' => 'variable.Nombre',
                'label' => Yii::t('app', 'Id Variable')
            ],
        'valor',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
