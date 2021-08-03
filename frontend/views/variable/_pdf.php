<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\variable */

$this->title = $model->id_variable;
$this->params['breadcrumbs'][] = ['label' => 'Variable', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variable-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Variable'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'variable.id_lectura',
                'label' => 'Id Variable'
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
