<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DetPrediccion */

?>
<div class="det-prediccion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->fecha) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'fecha',
        'calculo_estimado',
        [
            'attribute' => 'prediccion.fecha',
            'label' => Yii::t('app', 'Id Prediccion'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>