<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccion */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Prediccion',
]). ' ' . $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fecha, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="prediccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
