<?php

/* @var $this yii\web\View */
use frontend\models\Data;
use practically\chartjs\Chart;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;

$this->title = 'Deficit hidrico - densidad agua';
?>


<div class="site-index">

    <div class="jumbotron">
        
    </div>

    <div class="body-content">

    
    
<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
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
    $output = shell_exec('python prediccion.py');
    echo "<pre>$output</pre>";
    echo "hola como esta";
    ?>



    </div>
</div>
