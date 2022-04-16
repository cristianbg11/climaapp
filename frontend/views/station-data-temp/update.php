<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\StationDataTemp */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Station Data Temp',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Station Data Temps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="station-data-temp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
