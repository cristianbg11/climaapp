<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use frontend\models\Prediccion;
use frontend\models\Cultivo;
use yii\widgets\ActiveForm;
use dosamigos\chartjs\ChartJs;
use frontend\models\base\CultivoFinca;
use frontend\models\DetPrediccion;

/* @var $this yii\web\View */
/* @var $model frontend\models\Finca */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fincas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finca-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Finca') . ' ' . Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=
            Html::a(
                '<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'),
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            ) ?>
<?php /*
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/
            ?>
        </div>
    </div>

    <div class="row">
        <?php /*
        $gridColumn = [
            ['attribute' => 'id', 'visible' => false],
            'Nombre',
            'Localidad',
            [
                'attribute' => 'productor.Nombre',
                'label' => Yii::t('app', 'Id Productor'),
            ],
            'latitud',
            'longitud',
            
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);*/
        ?>
    </div>

    <div class="row">
        <?php
        if ($providerCultivoFinca->totalCount) {
            $gridColumnCultivoFinca = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                [
                    'attribute' => 'cultivo.Cultivo',
                    'label' => Yii::t('app', 'Id Cultivo')
                ],
                'tam_tareas',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {detorden}',
                    'buttons' => [
                        'detorden' => function ($url, $model) {
                            return Html::a('<i class="fa fa-calendar-plus-o"></i>', '/manufactura/v2/web/orden-mayor/index?id=' . $model->id, ['title' => 'Forecast BUY']);
                        },
                    ],
                ],
            ];
            echo Gridview::widget([
                'dataProvider' => $providerCultivoFinca,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-cultivo-finca']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Cultivo Finca')),
                ],
                'columns' => $gridColumnCultivoFinca
            ]);
        }
        ?>

    </div>
    <div class="row">
        <h4>Productor<?= ' ' . Html::encode($this->title) ?></h4>
    </div>
    <?php
    $gridColumnProductor = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
    ];
    echo DetailView::widget([
        'model' => $model->productor,
        'attributes' => $gridColumnProductor
    ]);
    ?>
</div>

<?php
/*
 echo ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 100,
        'width' => 100,
        'interaction'=>[
            'mode'=>'index',
            'intersect'=> false,
        ],
        'stacked'=>false,
        'scales' => [
            'y' => [
                'type' => 'linear',
                'display' => true,
                'position' => 'left',
            ],
            'y1' => [
                'type' => 'linear',
                'display' => true,
                'position' => 'right',

                // grid line settings
                'grid' => [
                    'drawOnChartArea' => false, // only want the grid lines for one axis to show up
                ],
            ],
        ],
    ],

    'data' => [
        'labels' => ['luna','mar','mier'], //["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'label' => "Inicial",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [2,5,8], //[65, 59, 90, 81, 56, 55, 40]
                'yAxisID' => 'y'
            ],
            [
                'label' => "Inicial Precipitacion",
                'backgroundColor' => "rgba(181,179,198,0.2)",
                'borderColor' => "rgba(181,179,198,1)",
                'pointBackgroundColor' => "rgba(181,179,198,1)",
                'pointBorderColor' => "#f00",
                'pointHoverBackgroundColor' => "#f00",
                'pointHoverBorderColor' => "rgba(181,179,198,1)",
                'data' => [100,150,75],
                'yAxisID' => 'y1'
            ]
        ]
    ]
]);
*/
?>

<hr />
<b>Seleccionar Cultivos a planificar</b><br>
<?php
    $cultivos_finca =CultivoFinca::find()->where(['id_finca'=>$model->id])->all();?>
    
    <?php //var_dump($cultivos_finca);die();?>
    <?php foreach  ($cultivos_finca as $cultivon):?>
    <a href="<?=Url::to(['finca/planificar','id_cultivo'=>$cultivon->cultivo->id,'id_finca'=>$model->id,'id_pred'=>$idprec,'area'=>$cultivon->tam_tareas]);?>"
    <?php /*<?=Url::to(['view','id'=>$model->id,'cult'=>$cultivon->cultivo->id,'area'=>$cultivon->tam_tareas])?>*/?>
     onclick=""><?php echo $cultivon->cultivo->Cultivo?><img src="<?=$cultivon->cultivo->Cultivo.'.jpg'?>" style="width:50px;height:60px;">

<?php endforeach?>

<?php $form = ActiveForm::begin(['options' => ['onsubmit' => 'enviarForm()'], 'method' => 'get', 'action' => ['view', 'id' => $model->id]]); ?>
<?php /*<?= yii\jui\DatePicker::widget(['name' => 'ini', 'dateFormat' => 'php:Y-m-d']) ?>

<?= yii\jui\DatePicker::widget(['name' => 'fin', 'dateFormat' => 'php:Y-m-d']) ?>
<?php /*
<a href="<?=Url::to(['finca/planificar','id_cultivo'=>$id,'id_finca'=>$model->id,'id_pred'=>$idprec]);?>>Planificar</a>
*/?>
<?php /*
<span id="subBut"><input type="submit" value="Planificar" /></span>*/?>
<?php ActiveForm::end(); ?>
<?php


//if ($ini != false && $fin != false) {
if ($cult>0) {
    $fini=new DateTime();
    $fini->add(new DateInterval('P1D'));
    $ini=$fini->format('Y-m-d');
   
    $fin= $fini->add(new DateInterval('P9D'))->format('Y-m-d');
    //echo "<h3>Prediccion de $ini a $fin</h3>";
    $modelCult = Cultivo::findOne($cult); //Maiz cultivo
    echo "<h2>".$modelCult->Cultivo."</h2>";
    echo '<label class="btn btn info">Area en Metro2: '. $area.'</label>';
    $cache = Yii::$app->cache;

    $output =     $cache->get("ET_data-$ini-$fin");

    if ($output === false) {
        chdir('C:\xampp\htdocs\climaapp\frontend\views\site');
        $command = "python WDA_Forecast_FBProphet_Params.py ET 800 $ini $fin";

        $output = shell_exec($command);
        $cache->set("ET_data-$ini-$fin", $output);
    }
    $arr = explode('**progdata**', $output);
    $arrfecha = [];
    $arrvalr = []; //para coeficiente en desarrollo
    $arrvalmedia = []; //para coeficiente en duracion media
    $arrvalduracion = []; //para coeficiente en maduracion

    $arr_densidad_desarrollo = []; //para coeficiente en duracion
    $arr_densidadmedia = []; //para coeficiente en duracion media
    $arr_densidadmaduracion = []; //para coeficiente en durac
    if (count($arr) == 3) {
        /* $modelpred = new Prediccion();
        //$modelpred->calculo_estimado=$deficit;
        //$modelpred->id_variable=1;

        $modelpred->id_cultivo = $modelCult->id;
        $modelpred->fecha = date('Y-m-d');
        if (!$modelpred->save()) {
            var_dump($modelpred->getErrors());
            die();
        }*/
        $output = $arr[1];
        $predData = json_decode($output);
        foreach ($predData as $fecha => $valor) {
            $fecha = $fecha / 1000;
            $arrfecha[] = date('Y-m-d', $fecha);

            $arrvalinicial[] = ($valor * 24) * $modelCult->Coeficiente;
            $arr_densidad_desarrollo[] = (($valor * 24) * $modelCult->Coeficiente) * $area;

            $arrvalr[] = ($valor * 24) * $modelCult->Desarrollo;
            $arr_densidad_desarrollo[] = (($valor * 24) * $modelCult->Desarrollo) * $area;

            $arrvalmedia[] = ($valor * 24) * $modelCult->Media;
            $arr_densidadmedia[] = (($valor * 24) * $modelCult->Media) * $area; //para coeficiente en duracion mediau

            $arrvalduracion[] = ($valor * 24) * $modelCult->Maduracion;
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

        $output =  $cache->get("Hum_data-$ini-$fin");

        if ($output === false) {
            $command = "python WDA_Forecast_FBProphet_Params.py Out_Hum 800 $ini $fin";
            $output = shell_exec($command);
            $cache->set("Hum_data-$ini-$fin", $output);
        }
        $arr = explode('**progdata**', $output);


        $output = $arr[1];
        $predData = json_decode($output);
        foreach ($predData as $fecha => $valor) {


            $arrvalinicialHum[] = ($valor * 24) * $modelCult->Coeficiente / 200;
            $arr_densidad_desarrolloHum[] = (($valor * 24) * $modelCult->Coeficiente) * $area / 200;

            $arrvalrHum[] = ($valor * 24) * $modelCult->Desarrollo / 200;
            $arr_densidad_desarrolloHum[] = (($valor * 24) * $modelCult->Desarrollo) * $area / 200;

            $arrvalmediaHum[] = ($valor * 24) * $modelCult->Media / 200;
            $arr_densidadmediaHum[] = (($valor * 24) * $modelCult->Media) * $area / 200; //para coeficiente en duracion mediau

            $arrvalduracionHum[] = ($valor * 24) * $modelCult->Maduracion / 200;
            $arr_densidadmaduracionHum[] = (($valor * 24) * $modelCult->Maduracion) * $area / 200; //para coeficiente en d



        }

        echo '<div><label class="btn btn-warning">Deficit hidrico en etapa inicial para coeificiente: ' . $modelCult->Coeficiente . '</label>';
        echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                // 'height' => 100,
                // 'width' => 100,
                /*'scales' => [
                    'y' => [
                        'type' => 'linear',
                        'display' => true,
                        'position' => 'left',
                    ],
                    'y1' => [
                        'type' => 'linear',
                        'display' => true,
                        'position' => 'right',

                        // grid line settings
                        'grid' => [
                            'drawOnChartArea' => false, // only want the grid lines for one axis to show up
                        ],
                    ],
                ],*/],

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
                        'data' => $arrvalinicial, //[65, 59, 90, 81, 56, 55, 40]
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
        ]);
        echo '</div><hr /><div><label class="btn btn-info">Deficit hidrico en etapa de Desarrollo para coeificiente: ' . $modelCult->Desarrollo . '</label>';

        echo ChartJs::widget([
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
                        'data' => $arrvalr, //[65, 59, 90, 81, 56, 55, 40]
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
        ]);


        echo '</div><hr /><div><label class="btn btn-info">Deficit hidrico en etapa media para coeificiente: ' . $modelCult->Media . '</label>';

        echo ChartJs::widget([
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
                        'type'=>'bar',
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => $arrvalmedia, //[65, 59, 90, 81, 56, 55, 40]
                    ],
                    [
                        'label' => "Demanda de Agua",
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
        ]);


        echo '</div><hr /><div><label class="btn btn-info">Deficit hidrico en etapa maduracion para coeificiente: ' . $modelCult->Maduracion . '</label>';

        echo ChartJs::widget([
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
                        'type'=>'bar',
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => $arrvalduracion, //[65, 59, 90, 81, 56, 55, 40]
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
        ]);
        echo "</div>";
    }
    //echo '<pre>'.$output.'</pre>';
}

/*$intersecto=(float)trim($output);
$etp=$intersecto;
$deficit=$etp*$modelCult->Coeficiente;
echo '<b>Calculo ETP ESTIMADO:</b>'.$etp;
echo '<br><b>CALCULDO DE DEFICIT HIDRICO:</b>'.$deficit;*/
/*$modelpred=new Prediccion();
$modelpred->calculo_estimado=$deficit;
//$modelpred->id_variable=1;
$modelpred->id_cultivo=$modelCult->id;
$modelpred->fecha=date('Y-m-d');
if(!$modelpred->save()){
var_dump($modelpred->save());die();
}*/
?>



</div>

<script type="text/javascript">
    function enviarForm() {

        $('#subBut').html('Cargando ...');
    }
</script>