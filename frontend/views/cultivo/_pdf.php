<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cultivo */

$this->title = $model->Cultivo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Cultivo').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Cultivo',
        'Coeficiente',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
