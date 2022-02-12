<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StationData */

$this->title = Yii::t('app', 'Create Station Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Station Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
