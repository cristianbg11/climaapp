<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Productor */

$this->title = Yii::t('app', 'Crear Productor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
