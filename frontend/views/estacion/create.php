<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Estacion */

$this->title = Yii::t('app', 'Create Estacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estacion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
