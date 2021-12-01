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
<div class="planificacion-index">

    <?php 
    $eventos=[];
    foreach($planifs as $plan){
        $evento= ['title' => $plan->finca->Nombre.'('.($plan->aguapend_desarrollo-$plan->cant_agua).')',
         'start' =>$plan->fecha, 'end' => $plan->fecha,
        'url'=>Url::to(['planificacion/view','id'=>$plan->id])];

        if($plan->aguapend_desarrollo>$plan->cant_agua){
            $evento['backgroundColor']='red';
        }
         $eventos[]=$evento;
    }
    echo FullCalendarWidget::widget([
        'calendarRenderBefore' => "console.log('before', calendar)",
        'calendarRenderAfter' => "console.log('after', calendar)",
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
                   $eventos
                ,
                // use Ajax
               // 'events' => ['site/events'], // see FullCalendarEventsAction
            ]),
        ],
    ]);
    ?>

   
</div>
