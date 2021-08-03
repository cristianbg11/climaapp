<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Fecha')->textInput(['maxlength' => true, 'placeholder' => 'Fecha']) ?>

    <?= $form->field($model, 'Tiempo')->textInput(['maxlength' => true, 'placeholder' => 'Tiempo']) ?>

    <?= $form->field($model, 'temp_out')->textInput(['placeholder' => 'Temp Out']) ?>

    <?= $form->field($model, 'Out_Hum')->textInput(['placeholder' => 'Out Hum']) ?>

    <?= $form->field($model, 'Wind_Speed')->textInput(['placeholder' => 'Wind Speed']) ?>

    <?= $form->field($model, 'Solar_Rad')->textInput(['placeholder' => 'Solar Rad']) ?>

    <?= $form->field($model, 'Msnm')->textInput(['placeholder' => 'Msnm']) ?>

    <?= $form->field($model, 'ETP')->textInput(['placeholder' => 'ETP']) ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
