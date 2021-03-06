<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Notificacion */

$this->title = Yii::t('app', 'Crear Notificacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notificacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
