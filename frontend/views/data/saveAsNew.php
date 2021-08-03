<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Data */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Data',
]). ' ' . $model->Fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Fecha, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
