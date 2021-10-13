<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CultivoFincaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-cultivo-finca-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_finca')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Finca::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Finca')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_cultivo')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Cultivo::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Cultivo')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tam_tareas')->textInput(['placeholder' => 'Tam Tareas']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
