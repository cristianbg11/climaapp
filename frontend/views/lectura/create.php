<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\lectura */

$this->title = Yii::t('app', 'Create Lectura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lecturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
