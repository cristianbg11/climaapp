<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estacion */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Lectura', 
        'relID' => 'lectura', 
        'value' => \yii\helpers\Json::encode($model->lecturas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="estacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true, 'placeholder' => 'Ciudad']) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => true, 'placeholder' => 'Latitud']) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => true, 'placeholder' => 'Longitud']) ?>

    <?= $form->field($model, 'Ubicacion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Zona')->textInput(['maxlength' => true, 'placeholder' => 'Zona']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Lectura')),
            'content' => $this->render('_formLectura', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->lecturas),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
