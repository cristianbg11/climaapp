<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cultivo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cultivo',
]) . ' ' . $model->Cultivo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Cultivo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="cultivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
