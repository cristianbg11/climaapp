<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\DetPrediccion */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Det Prediccion',
]). ' ' . $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Det Prediccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fecha, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="det-prediccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
