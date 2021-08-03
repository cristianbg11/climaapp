<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\variable */

?>
<div class="variable-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_variable) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'variable.id_lectura',
            'label' => 'Id Variable',
        ],
        'Nombre',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>