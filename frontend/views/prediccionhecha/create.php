<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccionhecha */

$this->title = Yii::t('app', 'Create Prediccionhecha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccionhechas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccionhecha-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
