<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Data',
]) . ' ' . $model->Fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Fecha, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
