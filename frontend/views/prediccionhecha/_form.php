<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use frontend\models\Prediccion;
use yii\widgets\ActiveForm;
use dosamigos\chartjs\ChartJs;
use frontend\models\DetPrediccion;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccionhecha */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="prediccionhecha-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'temp_out', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'hum_out', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'solar_rad', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'wind_speed', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'etp', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'fecha', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'fecha_estimada_inicial')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha Estimada Inicial'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'fecha_estimada_final')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha Estimada Final'),
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'id_estacion')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Estacion::find()->orderBy('id')->asArray()->all(), 'id', 'Nombre'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Estacion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_user', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php

/**if($fecha_estimada_inicial!=false && $fecha_estimada_final!=false){
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

        $arrvalinicial[]=($valor*24)*$model->Coeficiente;
        $arr_densidad_desarrollo[]=(($valor*24)*$model->Coeficiente)*$area;

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
    echo '<div><label class="btn btn-warning">Deficit hidrico en etapa inicial para coeificiente: '.$model->Coeficiente.'</label>';
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
                    'label' => "Inicial",
                    'backgroundColor' => "rgba(179,181,198,0.2)",
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' =>$arrvalinicial, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo '</div><div><label class="btn btn-info">Deficit hidrico en etapa de Desarrollo para coeificiente: '.$model->Desarrollo.'</label>';

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
                    'data' =>$arrvalr, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo "</div>";

    echo '</div><div><label class="btn btn-info">Deficit hidrico en etapa media para coeificiente: '.$model->Media.'</label>';

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
                    'data' =>$arrvalmedia, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo "</div>";

    echo '</div><div><label class="btn btn-info">Deficit hidrico en etapa maduracion para coeificiente: '.$model->Maduracion.'</label>';

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
                    'data' =>$arrvalduracion, //[65, 59, 90, 81, 56, 55, 40]
                ],
            ]
        ]
    ]);
    echo "</div>";

}
//echo '<pre>'.$output.'</pre>';
}

*/
    ?>

</div>
<script type="text/javascript">
function enviarForm(){

    $('#subBut').html('Cargando ...');
}
</script>