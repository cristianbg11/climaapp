<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\variable */

$this->title = 'Save As New Variable: '. ' ' . $model->id_variable;
$this->params['breadcrumbs'][] = ['label' => 'Variable', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_variable, 'url' => ['view', 'id' => $model->id_variable]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="variable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
