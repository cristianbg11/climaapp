<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lectura */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="lectura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true, 'placeholder' => 'Fecha']) ?>

    <?= $form->field($model, 'id_estaciones')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Estacion::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Estacion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_variable')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Variable::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Variable')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'valor')->textInput(['placeholder' => 'Valor']) ?>

    <?= $form->field($model, 'station_id')->textInput(['placeholder' => 'Station']) ?>

    <?= $form->field($model, 'ts')->textInput(['placeholder' => 'Ts']) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true, 'placeholder' => 'Date']) ?>

    <?= $form->field($model, 'temp_out')->textInput(['placeholder' => 'Temp Out']) ?>

    <?= $form->field($model, 'hum_out')->textInput(['placeholder' => 'Hum Out']) ?>

    <?= $form->field($model, 'et')->textInput(['placeholder' => 'Et']) ?>

    <?= $form->field($model, 'solar_rad')->textInput(['placeholder' => 'Solar Rad']) ?>

    <?= $form->field($model, 'wind_speed')->textInput(['placeholder' => 'Wind Speed']) ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
