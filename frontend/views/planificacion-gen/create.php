<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PlanificacionGen */

$this->title = Yii::t('app', 'Crear Planificacion Gen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planificacion Gens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planificacion-gen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
