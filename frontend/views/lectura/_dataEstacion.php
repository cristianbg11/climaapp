<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model Estacion */

?>
<?php if(!is_null($model)): ?>
<div>

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id_estacion) ?></h2>
        </div>
    </div>

    <div class="row">
    <?php 
        $gridColumn = [
            [
            'attribute' => 'estacion.id_lectura',
            'label' => 'Estacion',
        ],
            'Nombre',
            'Ubicacion',
            'Zona',
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
    ?>
    </div>
</div>
<?php else: ?>
<div class="estacion-view">
    <div class="row">
        <div class="col-sm-9">
            <h2>Estacion</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">Estacion not set.</div>
    </div>
</div>
<?php endif; ?>
