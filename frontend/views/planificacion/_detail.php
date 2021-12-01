<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Planificacion */

?>
<div class="planificacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'finca.Nombre',
            'label' => Yii::t('app', 'Id Finca'),
        ],
        'fecha',
        'cant_agua',
        'agua_pendiente',
        'agua_total',
        [
            'attribute' => 'prediccion.etp',
            'label' => Yii::t('app', 'Id Prediccion'),
        ],
        [
            'attribute' => 'cultivo.Cultivo',
            'label' => Yii::t('app', 'Id Cultivo'),
        ],
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Id User'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>