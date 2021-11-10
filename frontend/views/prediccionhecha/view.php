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

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Prediccionhecha */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prediccionhechas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prediccionhecha-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prediccionhecha').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
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
        ['attribute' => 'temp_out', 'visible' => false],
        ['attribute' => 'hum_out', 'visible' => false],
        ['attribute' => 'solar_rad', 'visible' => false],
        ['attribute' => 'wind_speed', 'visible' => false],
        ['attribute' => 'etp', 'visible' => false],
        ['attribute' => 'fecha', 'visible' => false],
        'fecha_estimada_inicial',
        'fecha_estimada_final',
        [
            'attribute' => 'estacion.Nombre',
            'label' => Yii::t('app', 'Id Estacion'),
        ],
        ['attribute' => 'id_user', 'visible' => false],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Estacion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnEstacion = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'ciudad',
        'latitud',
        'longitud',
        'Ubicacion',
        'Zona',
    ];
    echo DetailView::widget([
        'model' => $model->estacion,
        'attributes' => $gridColumnEstacion    ]);
    ?>

<div id="map"></div>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0gCtDVapFZQt9Z6O2WtRGPi2LnRsollc&callback=initMap&libraries=&v=weekly"
  async
></script>

<?php

use frontend\models\base\Lectura;

//$estaciones=Lectura::find()->where(['fecha'=>'2021-09-12 01:00:00'])->groupBy('id_estacion')->all();
 //print_r($estaciones);die();
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
  });
  // The marker, positioned at Uluru
  <?php //foreach ($estaciones as $esta):?>
    pos={lat:<?=$model->estacion->latitud?>,lng:<?=$model->estacion->longitud?>};
    marker = new google.maps.Marker({
    position: pos,
    label: '<?= "Et:".$model->etp*24?>',
    map: map,
  });
  <?php //endforeach;?>
}
</script>
    <div class="row">
        <h4> <?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php /*
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email',
        'status',
        'verification_token',
        'id_tipo',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>*/?>
</div>
