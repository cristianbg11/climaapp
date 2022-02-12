<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Notificacion */

?>
<div class="notificacion-view">

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
            'attribute' => 'estacion.Nombre',
            'label' => Yii::t('app', 'Estacion'),
        ],
        [
            'attribute' => 'finca.Nombre',
            'label' => Yii::t('app', 'Id Finca'),
        ],
        [
            'attribute' => 'prediccion.etp',
            'label' => Yii::t('app', 'Id Prediccion'),
        ],
        [
            'attribute' => 'cultivo.Cultivo',
            'label' => Yii::t('app', 'Id Cultivo'),
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