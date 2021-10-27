<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-estacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true, 'placeholder' => 'Ciudad']) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => true, 'placeholder' => 'Latitud']) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => true, 'placeholder' => 'Longitud']) ?>

    <?php /* echo $form->field($model, 'Ubicacion')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'Zona')->textInput(['maxlength' => true, 'placeholder' => 'Zona']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
