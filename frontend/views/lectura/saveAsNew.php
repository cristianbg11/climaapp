<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\lectura */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Lectura',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lecturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="lectura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
