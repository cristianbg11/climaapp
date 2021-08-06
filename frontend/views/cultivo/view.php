<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use frontend\models\Prediccion;
use yii\widgets\ActiveForm;
use dosamigos\chartjs\ChartJs;
use frontend\models\DetPrediccion;


/* @var $this yii\web\View */
/* @var $model frontend\models\Cultivo */

$this->title = $model->Cultivo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Cultivo').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
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
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
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
        'Cultivo',
       // 'Coeficiente',
       'Desarrollo',
        'Media',
         'Maduracion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <?php $form = ActiveForm::begin(['options'=>['onsubmit'=>'enviarForm()'],'method'=>'get','action'=>['view','id'=>$model->id]]); ?>
    <?= yii\jui\DatePicker::widget(['name' => 'ini','dateFormat'=>'php:Y-m-d']) ?>

    <?= yii\jui\DatePicker::widget(['name' => 'fin','dateFormat'=>'php:Y-m-d']) ?>
    <?php $area=100;?>
    <label class="btn btn info">Area en Metro2: <?=$area;?></label> 
    <span id="subBut"><input type="submit" value="Calcular" /></span>
    <?php ActiveForm::end(); ?>
<?php


if($ini!=false && $fin!=false){
    //echo "<h3>Prediccion de $ini a $fin</h3>";
chdir ('C:\xampp\htdocs\climaapp\frontend\views\site');
$output = shell_exec("python WDA_Forecast_FBProphet_Params.py ET 800 $ini $fin");
$arr= explode('**progdata**',$output);
$arrfecha=[];
$arrvalr=[];//para coeficiente en desarrollo
$arrvalmedia=[];//para coeficiente en duracion media
$arrvalduracion=[];//para coeficiente en maduracion

$arr_densidad_desarrollo=[];//para coeficiente en duracion
$arr_densidadmedia=[];//para coeficiente en duracion media
$arr_densidadmaduracion=[];//para coeficiente en durac
if(count($arr)==3){
$modelpred=new Prediccion();
//$modelpred->calculo_estimado=$deficit;
//$modelpred->id_variable=1;

$modelpred->id_cultivo=$model->id;
$modelpred->fecha=date('Y-m-d');
if(!$modelpred->save()){
    var_dump($modelpred->getErrors());
    die();
}
    $output=$arr[1];
    $predData=json_decode($output);
    foreach($predData as $fecha=>$valor){
        $fecha=$fecha/1000;
        $arrfecha[]=date('Y-m-d',$fecha);
        $arrvalr[]=($valor*24)*$model->Desarrollo;
        $arr_densidad_desarrollo[]=(($valor*24)*$model->Desarrollo)*$area;

        $arrvalmedia[]=($valor*24)*$model->Media;
        $arr_densidadmedia[]=(($valor*24)*$model->Media)*$area;//para coeficiente en duracion mediau

        $arrvalduracion[]=($valor*24)*$model->Maduracion;
        $arr_densidadmaduracion[]=(($valor*24)*$model->Maduracion)*$area;//para coeficiente en d

        $modeldet= new Detprediccion();
      $modeldet->fecha=date('Y-m-d',$fecha);;
      $modeldet->calculo_estimado=($valor*24);//*$model->Coeficiente;
      $modeldet->id_prediccion=$modelpred->id;
     // $modeldet->save();
      if(!$modeldet->save()){
        var_dump($modeldet->getErrors());
        die();
      }
        echo date('Y-m-d',$fecha)." : $valor <br>";
    }
    echo '<div><label class="btn btn-warning">Kto en etapa de Desarrollo para coeificiente: '.$model->Desarrollo.'</label>';
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
                    'data' =>$arrvalr, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo '</div><div><label class="btn btn-info">Densidad de agua en etapa de Desarrollo para coeificiente: '.$model->Desarrollo.'</label>';

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
                    'data' =>$arr_densidad_desarrollo, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo "</div>";

}
//echo '<pre>'.$output.'</pre>';
}

/*$intersecto=(float)trim($output);
$etp=$intersecto;
$deficit=$etp*$model->Coeficiente;
echo '<b>Calculo ETP ESTIMADO:</b>'.$etp;
echo '<br><b>CALCULDO DE DEFICIT HIDRICO:</b>'.$deficit;*/
/*$modelpred=new Prediccion();
$modelpred->calculo_estimado=$deficit;
//$modelpred->id_variable=1;
$modelpred->id_cultivo=$model->id;
$modelpred->fecha=date('Y-m-d');
if(!$modelpred->save()){
var_dump($modelpred->save());die();
}*/
?>


</div>
<script type="text/javascript">
function enviarForm(){

    $('#subBut').html('Cargando ...');
}
</script>