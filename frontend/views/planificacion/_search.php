<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanificacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-planificacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_finca')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Finca::find()->orderBy('id')->asArray()->all(), 'id', 'Nombre'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Finca')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'fecha')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'cant_agua')->textInput(['placeholder' => 'Cant Agua']) ?>

    <?= $form->field($model, 'agua_pendiente')->textInput(['placeholder' => 'Agua Pendiente']) ?>

    <?php /* echo $form->field($model, 'agua_total')->textInput(['placeholder' => 'Agua Total']) */ ?>

    <?php /* echo $form->field($model, 'id_prediccion')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Prediccionhecha::find()->orderBy('id')->asArray()->all(), 'id', 'etp'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Prediccionhecha')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'id_cultivo')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Cultivo::find()->orderBy('id')->asArray()->all(), 'id', 'Cultivo'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Cultivo')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'id_user')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
