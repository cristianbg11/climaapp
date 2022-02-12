<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estacion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estacion',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estacion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="estacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
