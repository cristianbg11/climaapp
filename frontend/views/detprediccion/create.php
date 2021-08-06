<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\DetPrediccion */

$this->title = Yii::t('app', 'Create Det Prediccion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Det Prediccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="det-prediccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
