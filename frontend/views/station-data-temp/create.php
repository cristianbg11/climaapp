<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StationDataTemp */

$this->title = Yii::t('app', 'Create Station Data Temp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Station Data Temps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-data-temp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
