<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use frontend\models\Finca;

/* @var $this yii\web\View */
/* @var $model frontend\models\Predicciong */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Predicciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predicciong-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prediccion #').' '. Html::encode($this->title) ?></h2>
        </div>
   <?php /*     <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>*/?>
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
            'label' => Yii::t('app', 'Estacion'),
        ],
        /*
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Id User'),
        ],
        */
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <?php 
    /* <div class="row">
        <h4>Estacion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    
    $gridColumnEstacion = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'ciudad',
        'latitud',
        'longitud',
        'Ubicacion',
        'Zona',
    ];
    echo DetailView::widget([
        'model' => $model->estacion,
        'attributes' => $gridColumnEstacion    ]);
       
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div> */
    ?>
    <?php /*
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email',
        'status',
        'verification_token',
        'id_tipo',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);*/
    ?>
    
    <div class="row">
<?php
if($providerPrediccionhecha->totalCount){
    $gridColumnPrediccionhecha = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
           /* 'temp_out',
            'hum_out',
            'solar_rad',
            'wind_speed',*/
            'rain',
            'etp',
            'fecha',
          /*  'fecha_estimada_inicial',
            'fecha_estimada_final',*/
            [
                'attribute' => 'estacion.Nombre',
                'label' => Yii::t('app', 'Estacion')
            ],
            /*
            [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'Id User')
            ],
            */
                ];
    echo Gridview::widget([
        'dataProvider' => $providerPrediccionhecha,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prediccionhecha']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prediccion')),
        ],
        'export' => false,
        'columns' => $gridColumnPrediccionhecha
    ]);
}
?>

    </div>
    <?php 
        $fincas=Finca::find()->all();

    ?>
    <h2>Planificar fincas</h2>
    <ul>
    <?php foreach ($fincas as $finc):?>

        <li><i class="fa fa-calendar"></i><a href="<?=Url::to(['finca/view','id'=>$finc->id,'idprec'=>$model->id])?>"> <?php echo $finc->Nombre; ?> </a></li>
        <?php endforeach;?>
    </ul>
</div>
