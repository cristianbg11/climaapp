<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Cultivo */

$this->title = Yii::t('app', 'Crear Cultivo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
