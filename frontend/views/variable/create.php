<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\variable */

$this->title = Yii::t('app', 'Create Variable');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Variable'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
