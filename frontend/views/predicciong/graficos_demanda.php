<?php

use frontend\models\Cultivo;
use frontend\models\CultivoFinca;
use frontend\models\Prediccionhecha;
use dosamigos\chartjs\ChartJs;

?>
<style>
    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
    }

    .tab {
        font-family: 'Nunito', sans-serif;
    }

    .tab .nav-tabs {
        background-color: transparent;
        border: none;
    }

    .tab .nav-tabs li a {
        color: #222;
        background: transparent;
        font-size: 18px;
        font-weight: 800;
        letter-spacing: 1px;
        text-align: center;
        text-transform: uppercase;
        padding: 15px 15px 10px;
        margin: 0;
        border: none;
        border-radius: 0;
        overflow: hidden;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }

    .tab .nav-tabs li:last-child a {
        margin-right: 0;
    }

    .tab .nav-tabs li a:hover,
    .tab .nav-tabs li.active a {
        color: #222;
        background: #fff;
        border: none;
    }

    .tab .nav-tabs li.active a {
        color: #6CBF1C;
    }

    .tab .nav-tabs li a:before,
    .tab .nav-tabs li a:after {
        content: "";
        background-color: #d1d1d1;
        height: 7px;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        transition: all 0.5s ease 0s;
    }

    .tab .nav-tabs li a:after {
        background-color: #6CBF1C;
        height: 100%;
        opacity: 0;
    }

    .tab .nav-tabs li.active a:before,
    .tab .nav-tabs li a:hover:before {
        height: 100%;
        opacity: 0;
    }

    .tab .nav-tabs li.active a:after,
    .tab .nav-tabs li a:hover:after {
        height: 7px;
        opacity: 1;
    }

    .tab .tab-content {
        color: #555;
        background: #fff;
        font-size: 15px;
        letter-spacing: 1px;
        line-height: 23px;
        padding: 20px;
    }

    .tab .tab-content h3 {
        color: #222;
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0 0 7px 0;
    }

    @media only screen and (max-width: 479px) {
        .tab .nav-tabs li {
            width: 100%;
        }

        .tab .nav-tabs li a {
            margin: 0 0 10px;
        }

        .tab .tab-content h3 {
            font-size: 18px;
        }
    }
</style>
<h2>Gr&aacute;ficos de demanda de agua por etapa de cultivo</h2>

<?php
$modelCult = Cultivo::findOne($idcultivo);
$fincacult = CultivoFinca::find()->where(['id_finca' => $idfinca, 'id_cultivo' => $idcultivo])->one();
//var_dump($fincacult);die();
$area = $fincacult->tam_tareas;
?>
<?php $predicciones = Prediccionhecha::find()->where(['idprec' => $id])->all(); ?>
<?php
$arr = $predicciones; //explode('**progdata**', $output);
$arrfecha = [];
$arrvalr = []; //para coeficiente en desarrollo
$arrvalmedia = []; //para coeficiente en duracion media
$arrvalduracion = []; //para coeficiente en maduracion

$arr_densidad_desarrollo = []; //para coeficiente en duracion
$arr_densidadmedia = []; //para coeficiente en duracion media
$arr_densidadmaduracion = []; //para coeficiente en durac
$arretp=[];
$arrvalinicialHum = [];
/// if (count($arr) == 3) {
/* $modelpred = new Prediccion();
        //$modelpred->calculo_estimado=$deficit;
        //$modelpred->id_variable=1;

        $modelpred->id_cultivo = $modelCult->id;
        $modelpred->fecha = date('Y-m-d');
        if (!$modelpred->save()) {
            var_dump($modelpred->getErrors());
            die();
        }*/
//$output = $arr[1];
//$predData = json_decode($output);
foreach ($predicciones as $pred) {
    // $fecha = $fecha / 1000;
    $arrfecha[] = $pred->fecha; //date('Y-m-d', $fecha);
    $valor = $pred->etp;
    $arretp[] =$valor;
    $arrvalinicial[] =$pred->rain;// ($valor * 24) * $modelCult->Coeficiente;
    $arr_densidad_inicial[] = (($valor * 24) * $modelCult->Coeficiente) * $area;

    $arrvalr[] =$pred->rain;// ($valor * 24) * $modelCult->Desarrollo;
    $arr_densidad_desarrollo[] = (($valor * 24) * $modelCult->Desarrollo) * $area;

    $arrvalmedia[] = $pred->rain;//($valor * 24) * $modelCult->Media;
    $arr_densidadmedia[] = (($valor * 24) * $modelCult->Media) * $area; //para coeficiente en duracion mediau

    $arrvalduracion[] = $pred->rain;//($valor * 24) * $modelCult->Maduracion;
    $arr_densidadmaduracion[] = (($valor * 24) * $modelCult->Maduracion) * $area; //para coeficiente en d

    /*$modeldet = new Detprediccion();
            $modeldet->fecha = date('Y-m-d', $fecha);;
            $modeldet->calculo_estimado = ($valor * 24); //*$modelCult->Coeficiente;
            $modeldet->id_prediccion = $modelpred->id;
            // $modeldet->save();
            if (!$modeldet->save()) {
                var_dump($modeldet->getErrors());
                die();
            } */
    // echo date('Y-m-d', $fecha) . " : $valor <br>";
}

$arrvalrHum = []; //para coeficiente en desarrollo
$arrvalmediaHum = []; //para coeficiente en duracion media
$arrvalduracionHum = []; //para coeficiente en maduracion

$arr_densidad_desarrolloHum = []; //para coeficiente en duracion
$arr_densidadmediaHum = []; //para coeficiente en duracion media
$arr_densidadmaduracionHum = []; //para coeficiente en durac

/* $output =  $cache->get("Hum_data-$ini-$fin");

        if ($output === false) {
            $command = "python WDA_Forecast_FBProphet_Params.py Out_Hum 800 $ini $fin";
            $output = shell_exec($command);
            $cache->set("Hum_data-$ini-$fin", $output);
        }
        $arr = explode('**progdata**', $output);


        $output = $arr[1];
        $predData = json_decode($output);*/
foreach ($predicciones as $pred) {
    //$predicciones as $pred
    $valor =$pred->etp; //$pred->rain;
    $arrvalinicialHum[] =$pred->rain;// ($valor * 24) * $modelCult->Coeficiente;
    $arr_densidad_inicial[] = (($valor * 24) * $modelCult->Coeficiente) * $area;

    $arrvalrHum[] = $pred->rain;//($valor * 24) * $modelCult->Desarrollo / 200;
    $arr_densidad_desarrolloHum[] = (($valor * 24) * $modelCult->Desarrollo) * $area;

    $arrvalmediaHum[] = $pred->rain;//($valor * 24) * $modelCult->Media;
    $arr_densidadmediaHum[] = (($valor * 24) * $modelCult->Media) * $area; //para coeficiente en duracion mediau

    $arrvalduracionHum[] = $pred->rain;//($valor * 24) * $modelCult->Maduracion;
    $arr_densidadmaduracionHum[] = (($valor * 24) * $modelCult->Maduracion) * $area; //para coeficiente en d



}
?>
<?php /*
<h2>Grafico del comportamiento de la Evapotranspiración </h2>
            <?= ChartJs::widget([
                'type' => 'line',
                'data' => [
                    'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        /*[
                            'label' => "Demanda de Agua",
                            'backgroundColor' => "rgba(0,0,200,0.7)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'type' => 'bar',
                            'data' => $arretp, //[65, 59, 90, 81, 56, 55, 40]
                            //' yAxisID' => 'y'
                        ],*/
                      /*  [
                            'label' => "Precipitacion",
                            //'backgroundColor' => "rgba(181,50,50,0.2)",
                            'borderColor' => "rgba(181,50,50,1)",
                            'pointBackgroundColor' => "rgba(181,50,50,1)",
                            'pointBorderColor' => "#f00",
                            'pointHoverBackgroundColor' => "#f00",
                            'pointHoverBorderColor' => "rgba(181,50,50,1)",
                            'data' => $arretp,
                            'lineTension'=>0,
                            'type' => 'line',
                            //' yAxisID' => 'y1'
                        ]
                    ]
                ]
            ]) ?>
        </div>*/?>
<div style="background-color:white">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                Etapa inicial para coeificiente: <?= $modelCult->Coeficiente ?>
            </a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                Etapa de Desarrollo para coeificiente:<?= $modelCult->Desarrollo ?>
            </a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                Etapa media para coeificiente:<?= $modelCult->Media ?>
            </a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                Etapa maduracion para coeificiente: <?= $modelCult->Maduracion ?>
            </a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">

            <?= ChartJs::widget([
                'type' => 'line',
                'data' => [
                    'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        [
                            'label' => "Demanda de Agua",
                            'backgroundColor' => "rgba(0,0,200,0.7)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'type' => 'bar',
                            'data' => $arr_densidad_inicial, //[65, 59, 90, 81, 56, 55, 40]
                            //' yAxisID' => 'y'
                        ],
                        [
                            'label' => "Precipitacion",
                            'backgroundColor' => "rgba(181,50,50,0.2)",
                            'borderColor' => "rgba(181,50,50,1)",
                            'pointBackgroundColor' => "rgba(181,50,50,1)",
                            'pointBorderColor' => "#f00",
                            'pointHoverBackgroundColor' => "#f00",
                            'pointHoverBorderColor' => "rgba(181,50,50,1)",
                            'data' => $arrvalinicialHum,
                            'type' => 'line',
                            //' yAxisID' => 'y1'
                        ]
                    ]
                ]
            ]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <?= ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 100,
                    'width' => 100
                ],
                'data' => [
                    'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        [
                            'label' => "Demanda de Agua",
                            'backgroundColor' => "rgba(0,0,200,0.7)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $arr_densidad_desarrolloHum, //[65, 59, 90, 81, 56, 55, 40]
                            'type' => 'bar',
                        ],
                        [
                            'label' => "Precipitacion",
                            'backgroundColor' => "rgba(181,50,50,0.2)",
                            'borderColor' => "rgba(181,50,50,1)",
                            'pointBackgroundColor' => "rgba(181,50,50,1)",
                            'pointBorderColor' => "#f00",
                            'pointHoverBackgroundColor' => "#f00",
                            'pointHoverBorderColor' => "rgba(181,50,50,1)",
                            'data' => $arrvalrHum,

                        ]
                    ]
                ]
            ]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="messages">
            <?= ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 100,
                    'width' => 100
                ],
                'data' => [
                    'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        [
                            'label' => "Demanda de Agua",
                            'backgroundColor' => "rgba(0,0,200,0.7)",
                            'type' => 'bar',
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $arr_densidadmediaHum, //[65, 59, 90, 81, 56, 55, 40]
                        ],
                        [
                            'label' => "Lluvia (Precipitación)",
                            'backgroundColor' => "rgba(181,50,50,0.2)",
                            'borderColor' => "rgba(181,50,50,1)",
                            'pointBackgroundColor' => "rgba(181,50,50,1)",
                            'pointBorderColor' => "#f00",
                            'pointHoverBackgroundColor' => "#f00",
                            'pointHoverBorderColor' => "rgba(181,50,50,1)",
                            'data' => $arrvalmediaHum,

                        ]
                    ]
                ]
            ]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="settings">
            <?= ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 100,
                    'width' => 100
                ],
                'data' => [
                    'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
                    'datasets' => [
                        [
                            'label' => "Demanda de agua",
                            'backgroundColor' => "rgba(0,0,200,0.7)",
                            'type' => 'bar',
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $arr_densidadmaduracionHum, //[65, 59, 90, 81, 56, 55, 40]
                        ],
                        [
                            'label' => "Precipitacion",
                            'backgroundColor' => "rgba(181,50,50,0.2)",
                            'borderColor' => "rgba(181,50,50,1)",
                            'pointBackgroundColor' => "rgba(181,50,50,1)",
                            'pointBorderColor' => "#f00",
                            'pointHoverBackgroundColor' => "#f00",
                            'pointHoverBorderColor' => "rgba(181,50,50,1)",
                            'data' => $arrvalduracionHum,

                        ]
                    ]
                ]
            ]) ?>
        </div>
    </div>

</div>