<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccion */

$this->title = Yii::t('app', 'Crear Prediccion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
