<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LecturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-lectura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true, 'placeholder' => 'Fecha']) ?>

    <?= $form->field($model, 'id_estacion')->widget(\kartik\widgets\Select2::classname(), [
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

    <?php /* echo $form->field($model, 'station_id')->textInput(['placeholder' => 'Station']) */ ?>

    <?php /* echo $form->field($model, 'ts')->textInput(['placeholder' => 'Ts']) */ ?>

    <?php /* echo $form->field($model, 'date')->textInput(['maxlength' => true, 'placeholder' => 'Date']) */ ?>

    <?php /* echo $form->field($model, 'temp_out')->textInput(['placeholder' => 'Temp Out']) */ ?>

    <?php /* echo $form->field($model, 'hum_out')->textInput(['placeholder' => 'Hum Out']) */ ?>

    <?php /* echo $form->field($model, 'et')->textInput(['placeholder' => 'Et']) */ ?>

    <?php /* echo $form->field($model, 'solar_rad')->textInput(['placeholder' => 'Solar Rad']) */ ?>

    <?php /* echo $form->field($model, 'wind_speed')->textInput(['placeholder' => 'Wind Speed']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
