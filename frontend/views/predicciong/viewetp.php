<?php

use frontend\models\CultivoFinca;
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
    
   
    <?php 
        $fincascultiv=CultivoFinca::find()->all();

    ?>
    <h2>Graficos Comportamiento Etp y Precipitación</h2>
    <ul>
   <?php // Vergraf($id,$idcultivo,$idfinca)?>
    <?php foreach ($fincascultiv as $culfinca):?>

        <li><i class="fa fa-calendar"></i><a href="<?=Url::to(['predicciong/vergraf_etp','id'=>$model->id,'idcultivo'=>$culfinca->id_cultivo,'idfinca'=>$culfinca->id_finca])?>"> <?php echo $culfinca->cultivo->Cultivo.' '.$culfinca->finca->Nombre; ?> </a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php //$predicciones=Prediccionhecha::find()->where(['idpres'=>$model->id]);
