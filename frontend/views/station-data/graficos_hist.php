<?php

use frontend\models\Cultivo;
use frontend\models\CultivoFinca;
use frontend\models\Prediccionhecha;
use dosamigos\chartjs\ChartJs;
use frontend\models\StationData;
use frontend\models\Estacion;
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

<?php
$data_hist = StationData::find()->where(['station_id' => $id_sta])->andWhere(['between', 'date', $fecha_ini, $fecha_fin])->all();
$estacion = Estacion::findOne($id_sta);

/* $modelCult = Cultivo::findOne($idcultivo);
  $fincacult = CultivoFinca::find()->where(['id_finca' => $idfinca, 'id_cultivo' => $idcultivo])->one();
  //var_dump($fincacult);die();
  $area = $fincacult->tam_tareas; */
?>
<?php //$predicciones = Prediccionhecha::find()->where(['idprec' => $id])->all(); ?>
<?php
//echo count($data_hist).$id_sta.$fecha_ini.$fecha_fin;
$arr = $data_hist; //explode('**progdata**', $output);
$arrfecha = [];
$arretp = [];
/* $arrvalr = []; //para coeficiente en desarrollo
  $arrvalmedia = []; //para coeficiente en duracion media
  $arrvalduracion = []; //para coeficiente en maduracion
 */
/* $arr_densidad_desarrollo = []; //para coeficiente en duracion
  $arr_densidadmedia = []; //para coeficiente en duracion media
  $arr_densidadmaduracion = []; //para coeficiente en durac
  $arretp=[];
  $arrvalinicialHum = []; */
/// if (count($arr) == 3) {
/* $modelpred = new Prediccion();
  //$modelpred->calculo_estimado=$deficit;
  //$modelpred->id_variable=1;

  $modelpred->id_cultivo = $modelCult->id;
  $modelpred->fecha = date('Y-m-d');
  if (!$modelpred->save()) {
  var_dump($modelpred->getErrors());
  die();
  } */
//$output = $arr[1];
//$predData = json_decode($output);
foreach ($arr as $pred) {
    // $fecha = $fecha / 1000;
    $arrfecha[] = $pred->date; //date('Y-m-d', $fecha);
    $valor = $pred->et;
    $arretp[] = $valor;
}
?>
<?php //if(count($arretp)>0):?>
<h2>Grafico del comportamiento de la Temperatura </h2>
<?=
ChartJs::widget([
    'type' => 'line',
    /*'clientOptions' => [
        'scales' => [
            'xAxes' => [
                'type' => 'time',
                'time' => [
                    'unit' => 'day',
                    'unitStepSize' => 1
                ]
            ]
        ]
    ],*/
    'data' => [
        'labels' => $arrfecha, //["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            /* [
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
              ], */
            [
                'label' => "Precipitacion",
                //'backgroundColor' => "rgba(181,50,50,0.2)",
                'borderColor' => "rgba(181,50,50,1)",
                'pointBackgroundColor' => "rgba(181,50,50,1)",
                'pointBorderColor' => "#f00",
                'pointHoverBackgroundColor' => "#f00",
                'pointHoverBorderColor' => "rgba(181,50,50,1)",
                'data' => $arretp,
                'lineTension' => 0,
                'type' => 'line',
            //' yAxisID' => 'y1'
            ]
        ]
    ]
])
?>
</div>


<?php //endif; ?>
<?php /*
<script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.30.1/date_fns.min.js" integrity="sha512-F+u8eWHrfY8Xw9BLzZ8rG/0wIvs0y+JyRJrXjp3VjtFPylAEEGwKbua5Ip/oiVhaTDaDs4eU2Xtsxjs/9ag2bQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
 
 */