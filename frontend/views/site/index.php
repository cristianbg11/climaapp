<?php

/* @var $this yii\web\View */
use frontend\models\Data;
use practically\chartjs\Chart;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use frontend\models\Estacion;
use frontend\models\Finca;

$this->title = 'Deficit hidrico - densidad agua';
?>


<div class="site-index">

    <div class="body-content">
<div class="row">

        <div class="col-xs-2 col-lg-2 text-center">
            <a href="/manufactura/v2/web/orden-mayor/import" class="btn btn-app btn-sm btn-danger">
                <i class="ace-icon fa fa-upload bigger-160"></i>
                Import   
            </a>
            <p><big style="font-weight:bold">PREDECIR</big></p>
        </div>

         <div class="col-xs-2 col-lg-2 text-center">
            <a href="/manufactura/v2/web/orden-mayor/import-prod-numb" class="btn btn-app btn-sm btn-warning">
                <i class="ace-icon fa fa-upload bigger-160"></i>
                Import   
            </a>
            <p><big style="font-weight:bold">Prod. Orders</big></p>
        </div>
        <div class="col-xs-2 col-lg-2 text-center">
            <a onclick="showForecastIcons()" class="btn btn-app btn-sm btn-warning">
                <i class="ace-icon fa fa-calendar-plus-o bigger-160"></i>
                Forecast  
            </a>
            <p><big style="font-weight:bold">Scenarios</big></p>
        </div>
        <div class="col-xs-2 col-lg-2 text-center">
            <a href="/manufactura/v2/web/plan/index" class="btn btn-app btn-sm btn-info">
                <i class="ace-icon fa fa-calendar bigger-160"></i>
                Plan  
            </a>
            <p><big style="font-weight:bold">Forecasts</big></p>
        </div>

        <div class="col-xs-2 col-lg-2 text-center">
            <a href="/manufactura/v2/web/plan/planes_transfer" class="btn btn-app btn-sm btn-success">
                <i class="ace-icon fa fa-paper-plane bigger-160"></i>
                Transfer
            </a>
            <p><big style="font-weight:bold">Orders Create</big> </p> 
        </div>


    </div>
<hr />
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"># de estaciones</span>
              <?php
              $esta_canti=Estacion::find()->count();
              ?>
              <span class="info-box-number"><?=$esta_canti?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fincas</span>
              <?php
              $canti=Finca::find()->count();
              ?>
              <span class="info-box-number"><?=$canti;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ultima prediccion</span>
              <span class="info-box-number">01/07/2022</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      </div>
    
<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["June", "July", "August", "September", "October", "November", "December"],
        'datasets' => [
            [
                'label' => "Deficit",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'label' => "Volumen",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>
    
    <?php
    /*
    echo Chart::widget([
        'type' => Chart::TYPE_BAR,
        'datasets' => [
            [
                'data' => [
                    'Label 1' => 10,
                    'Label 2' => 20,
                    'Label 3' => 30
                ]
            ]
        ]
    ]);
    */
    /*
    $output = shell_exec('python prediccion.py');
    echo "<pre>$output</pre>";
    echo "hola como esta";
    */
    ?>



    </div>
</div>
