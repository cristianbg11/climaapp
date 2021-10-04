<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccion */

$this->title = $model->fecha;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prediccion').' '. Html::encode($this->title) ?></h2>
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
            
            
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'variable.id',
            'label' => Yii::t('app', 'Id Variable'),
        ],
        'fecha',
        //'fecha_estimada',
        //'calculo_estimado',
        [
            'attribute' => 'cultivo.id',
            'label' => Yii::t('app', 'Id Cultivo'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerDetPrediccion->totalCount){
    $gridColumnDetPrediccion = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'fecha',
            //'calculo_estimado',
                ];
    echo Gridview::widget([
        'dataProvider' => $providerDetPrediccion,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-det-prediccion']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Det Prediccion')),
        ],
        'columns' => $gridColumnDetPrediccion
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Variable<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php /*
    <?php 
    $gridColumnVariable = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
    ];
    echo DetailView::widget([
        'model' => $model->variable,
        'attributes' => $gridColumnVariable    ]);
    ?>
    <div class="row">
        <h4>Cultivo<?= ' '. Html::encode($this->title) ?></h4>
    </div>*/?>
    <label>Area</label> 100 mts2
    <?php $area=100;?>
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
</div>
<?php
   $arrfecha=[];
   $arrvalr=[];//para coeficiente en desarrollo
   $arrvalmedia=[];//para coeficiente en duracion media
   $arrvalduracion=[];//para coeficiente en maduracion
   
   $arr_densidad_desarrollo=[];//para coeficiente en duracion
   $arr_densidadmedia=[];//para coeficiente en duracion media
   $arr_densidadmaduracion=[];//para coeficiente en dur
    $detprediccion=$model->detPrediccions;
    foreach($detprediccion as $det){
        $arrfecha[]=$det->fecha;
        $valor=$det->calculo_estimado;
        $arrvalr[]=$valor*$model->cultivo->Desarrollo; //etp para desarrikki
        $arr_densidad_desarrollo[]=($valor*$model->cultivo->Desarrollo)*$area;//ddensinda para dessarrollo

        $arrvalmedia[]=($valor)*$model->cultivo->Media;//etp para media
        $arr_densidadmedia[]=(($valor)*$model->cultivo->Media)*$area;//para coeficiente en duracion mediau

        $arrvalduracion[]=($valor)*$model->cultivo->Maduracion;//etp para maduracion
        $arr_densidadmaduracion[]=(($valor)*$model->cultivo->Maduracion)*$area;// densidad para coeficiente en d

    }

    echo '<div><label class="btn btn-warning">Demanda neta en etapa de Desarrollo para coeificiente: '.$model->cultivo->Desarrollo.'</label>';
    echo ChartJs::widget([
        'type' => 'line',
        'options' => [
            'height' => 100,
            'width' => 100
        ],
        'data' => [
            'labels' =>$arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
            'datasets' => [
                [
                    'label' => "Desarrollo",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' =>$arr_densidad_desarrollo, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo '</div>';

    echo '<div><label class="btn btn-warning">Demanda neta en etapa de media para coeificiente: '.$model->cultivo->Media.'</label>';
    echo ChartJs::widget([
        'type' => 'line',
        'options' => [
            'height' => 100,
            'width' => 100
        ],
        'data' => [
            'labels' =>$arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
            'datasets' => [
                [
                    'label' => "Media",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' =>$arr_densidadmedia, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo '</div>';

    echo '<div><label class="btn btn-warning">Demanda neta en etapa de maduracion para coeificiente: '.$model->cultivo->Maduracion.'</label>';
    echo ChartJs::widget([
        'type' => 'line',
        'options' => [
            'height' => 100,
            'width' => 100
        ],
        'data' => [
            'labels' =>$arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
            'datasets' => [
                [
                    'label' => "Maduracion",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' =>$arr_densidadmaduracion, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo '</div>';
?>