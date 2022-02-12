<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lectura */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Lectura',
]) . ' ' . $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lecturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fecha, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="lectura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
