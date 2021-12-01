<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Predicciong */

?>
<div class="predicciong-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'fecha_ini',
        'fecha_fin',
        'fecha',
        [
            'attribute' => 'estacion.Nombre',
            'label' => Yii::t('app', 'Id Estacion'),
        ],
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Id User'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>