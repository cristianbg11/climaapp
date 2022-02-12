<style>
    /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
    </style>

<?php

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FincaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use frontend\models\base\Finca;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Fincas');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

  <!--The div element for the map -->
  <div id="map"></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0gCtDVapFZQt9Z6O2WtRGPi2LnRsollc&callback=initMap&libraries=&v=weekly"
  async
></script>

<div class="finca-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Finca'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Localidad',
        [
                'attribute' => 'id_productor',
                'label' => Yii::t('app', 'Id Productor'),
                'value' => function($model){                   
                    return $model->productor->Nombre;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\frontend\models\Productor::find()->asArray()->all(), 'id', 'Nombre'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Productor', 'id' => 'grid-finca-search-id_productor']
            ],
        'latitud',
        'longitud',
        [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{update}',
        
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-finca']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>

<?php
 $fincas=Finca::find()->all();
 
?>

<script type="text/javascript">
// Initialize and add the map
function initMap() {
  // The location of Uluru 18.880909,-70.553474
  const uluru = { lat: 18.880909, lng: -70.553474 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: uluru,
    clickableIcons: false
  });
  // The marker, positioned at Uluru
  <?php foreach ($fincas as $esta):?>
    pos={lat:<?=$esta->latitud?>,lng:<?=$esta->longitud?>};
    marker = new google.maps.Marker({
    position: pos,
    label: '<?=$esta->Nombre?>',
    url:'<?=Url::to(['finca/view','id'=>$esta->id])?>',
    map: map
  });

  google.maps.event.addListener(marker, 'click', function() {
    window.location.href = this.url;
});

  <?php endforeach;?>

 
}

</script>
