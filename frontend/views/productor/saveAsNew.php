<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Productor */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Productor',
]). ' ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="productor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
