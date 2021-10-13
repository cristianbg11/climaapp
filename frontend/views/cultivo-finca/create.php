<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CultivoFinca */

$this->title = Yii::t('app', 'Create Cultivo Finca');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivo Fincas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-finca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
