<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Data */

$this->title = Yii::t('app', 'Crear Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
