<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccionhecha */

$this->title = Yii::t('app', 'Generar Prediccion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Predicciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccionhecha-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
