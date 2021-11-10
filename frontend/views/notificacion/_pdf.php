<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Notificacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notificacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Notificacion').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'estacion.Nombre',
                'label' => Yii::t('app', 'Id Estacion')
            ],
        [
                'attribute' => 'finca.Nombre',
                'label' => Yii::t('app', 'Id Finca')
            ],
        [
                'attribute' => 'prediccion.etp',
                'label' => Yii::t('app', 'Id Prediccion')
            ],
        [
                'attribute' => 'cultivo.Cultivo',
                'label' => Yii::t('app', 'Id Cultivo')
            ],
        'densidad',
        'mensaje',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
