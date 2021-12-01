<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Planificacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planificacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planificacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Planificacion').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'finca.Nombre',
            'label' => Yii::t('app', 'Id Finca'),
        ],
        'fecha',
        'cant_agua',
        'agua_pendiente',
        'agua_total',
        [
            'attribute' => 'prediccion.etp',
            'label' => Yii::t('app', 'Id Prediccion'),
        ],
        [
            'attribute' => 'cultivo.Cultivo',
            'label' => Yii::t('app', 'Id Cultivo'),
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
    <div class="row">
        <h4>Cultivo<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCultivo = [
        ['attribute' => 'id', 'visible' => false],
        'Cultivo',
        'Coeficiente',
        'Desarrollo',
        'Media',
        'Maduracion',
    ];
    echo DetailView::widget([
        'model' => $model->cultivo,
        'attributes' => $gridColumnCultivo    ]);
    ?>
    <div class="row">
        <h4>Finca<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnFinca = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Localidad',
        'id_productor',
        'latitud',
        'longitud',
    ];
    echo DetailView::widget([
        'model' => $model->finca,
        'attributes' => $gridColumnFinca    ]);
    ?>
    <div class="row">
        <h4>Prediccionhecha<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPrediccionhecha = [
        ['attribute' => 'id', 'visible' => false],
        ['attribute' => 'temp_out', 'visible' => false],
        ['attribute' => 'hum_out', 'visible' => false],
        ['attribute' => 'solar_rad', 'visible' => false],
        ['attribute' => 'wind_speed', 'visible' => false],
        'etp',
        'fecha',
        'fecha_estimada_inicial',
        'fecha_estimada_final',
        'id_estacion',
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Id User'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model->prediccion,
        'attributes' => $gridColumnPrediccionhecha    ]);
    ?>
    
   
</div>
