<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CultivoFinca */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivo Fincas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-finca-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Cultivo Finca').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
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
        [
            'attribute' => 'cultivo.Cultivo',
            'label' => Yii::t('app', 'Id Cultivo'),
        ],
        'tam_tareas',
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
</div>
