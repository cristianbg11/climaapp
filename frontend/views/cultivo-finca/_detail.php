<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CultivoFinca */

?>
<div class="cultivo-finca-view">

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
            'attribute' => 'finca.id',
            'label' => Yii::t('app', 'Id Finca'),
        ],
        [
            'attribute' => 'cultivo.id',
            'label' => Yii::t('app', 'Id Cultivo'),
        ],
        'tam_tareas',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>