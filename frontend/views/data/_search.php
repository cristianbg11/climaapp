<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Fecha')->textInput(['maxlength' => true, 'placeholder' => 'Fecha']) ?>

    <?= $form->field($model, 'Tiempo')->textInput(['maxlength' => true, 'placeholder' => 'Tiempo']) ?>

    <?= $form->field($model, 'temp_out')->textInput(['placeholder' => 'Temp Out']) ?>

    <?= $form->field($model, 'Out_Hum')->textInput(['placeholder' => 'Out Hum']) ?>

    <?php /* echo $form->field($model, 'Wind_Speed')->textInput(['placeholder' => 'Wind Speed']) */ ?>

    <?php /* echo $form->field($model, 'Solar_Rad')->textInput(['placeholder' => 'Solar Rad']) */ ?>

    <?php /* echo $form->field($model, 'Msnm')->textInput(['placeholder' => 'Msnm']) */ ?>

    <?php /* echo $form->field($model, 'ETP')->textInput(['placeholder' => 'ETP']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
