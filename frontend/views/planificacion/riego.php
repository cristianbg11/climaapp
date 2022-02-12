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

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlanificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kriss\calendarSchedule\widgets\FullCalendarWidget;
use kriss\calendarSchedule\widgets\processors\EventProcessor;
use kriss\calendarSchedule\widgets\processors\HeaderToolbarProcessor;
use kriss\calendarSchedule\widgets\processors\LocaleProcessor;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

//$this->title = Yii::t('app', 'Planificacions');
//$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Planificación de Riego</h1>
<h2><?= $plangen->finca->Nombre; ?></h2>
<h3><?= $plangen->cultivo->Cultivo; ?></h3>
<script type="text/javascript">
    function afterCal(calendar) {
        //alert('here');
        calendar.on('eventClick', function(info) {
            // console.log(JSON.stringify(event));
            goPlanAgua(info.event.extendedProps.plan_id);
        });

    }

    function goPlanAgua(planid) {
        var demanda = prompt("Demanda de Agua:");
        if (demanda) {
            window.location.href = '<?= Url::to(['/planificacion/riego-demanda']) ?>?planid=' + planid + '&demanda=' + demanda;
        }

    }
</script>
<div style="background-color:white">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="<?=$etapa=='ini'?'active':''?>"><a href="<?=Url::to(['riego','id'=>$plangen->id,'etapa'=>'ini'])?>">
                Etapa inicial
            </a></li>
        <li class="<?=$etapa=='des'?'active':''?>"><a href="<?=Url::to(['riego','id'=>$plangen->id,'etapa'=>'des'])?>">
                Etapa de Desarrollo
            </a></li>
        <li class="<?=$etapa=='med'?'active':''?>"><a href="<?=Url::to(['riego','id'=>$plangen->id,'etapa'=>'med'])?>">
                Etapa media
            </a></li>
        <li class="<?=$etapa=='mad'?'active':''?>"><a href="<?=Url::to(['riego','id'=>$plangen->id,'etapa'=>'mad'])?>">
                Etapa maduracion
            </a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="planificacion-index">

                <?php
                $eventos = [];
                foreach ($planifs as $plan) {
                    $evento = [
                        'title' => $plan->finca->Nombre . '(' . ($plan->agua_pendiente - $plan->agua_total) . ')',
                        'plan_id' => $plan->id,
                        'start' => $plan->fecha, 'end' => $plan->fecha,
                        //'url'=>Url::to(['planificacion/view','id'=>$plan->id])
                    ];

                    $aguaRef = '';
                    switch ($etapa) {
                        case 'ini';
                            $aguaRef = $plan->agua_pendiente;
                            break;

                        case 'des':
                            $aguaRef = $plan->aguapend_desarrollo;
                            break;

                        case 'med';
                            $aguaRef = $plan->aguapend_media;
                            break;

                        case 'mad':
                            $aguaRef = $plan->aguapend_maduracion;
                            break;
                    }
                    if ($aguaRef > $plan->agua_total) {
                        $evento['backgroundColor'] = 'red';
                    }
                    $eventos[] = $evento;
                }
                echo FullCalendarWidget::widget([
                    'calendarRenderBefore' => "console.log('before', calendar)",
                    'calendarRenderAfter' => "afterCal(calendar);",
                    'clientOptions' => [
                        // all options from fullCalendar
                    ],
                    'processors' => [
                        // quick solve fullCalendar options
                        new LocaleProcessor([
                            'locale' => 'es',
                        ]),
                        new HeaderToolbarProcessor(),
                        new EventProcessor([
                            // use Array
                            'events' =>
                            $eventos,
                            // use Ajax
                            // 'events' => ['site/events'], // see FullCalendarEventsAction
                        ]),
                    ],
                ]);
                ?>

            </div>
        </div>


    </div>

</div>