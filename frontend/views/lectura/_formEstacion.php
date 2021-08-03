<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estacion */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="lectura-form">

    <?= $form->field($Estacion, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($Estacion, 'Ubicacion')->textInput(['maxlength' => true, 'placeholder' => 'Ubicacion']) ?>

    <?= $form->field($Estacion, 'Zona')->textInput(['maxlength' => true, 'placeholder' => 'Zona']) ?>

</div>
