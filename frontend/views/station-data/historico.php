<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\StationData */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

$this->title = Yii::t('app', 'Histórico de Lectura de variables');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<div class="station-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*
          <?= Html::a(Yii::t('app', 'Create Station Data'), ['create'], ['class' => 'btn btn-success']) ?>
         */ ?>
       
    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php $form = ActiveForm::begin(['method'=>'get']); ?>

    <?= $form->errorSummary($model); ?>

    <?php
    $arr = [
        'temp_out' => $model->getAttributeLabel('temp_out'),
        'rain_rate_in' => $model->getAttributeLabel('rainfall_mm'),
        'et' => $model->getAttributeLabel('et_day'),
    ];
    ?>
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-3">
            Fecha desde: <?=
            DateControl::widget([
                'name' => 'fecha-ini',
                'value' => $fechaini,
                'id' => 'fecha-ini',
                'type' => DateControl::FORMAT_DATE,
            ]);
            ?>
        </div>
        <div class="col-xs-10 col-sm-3">
            Fecha hasta: <?=
            DateControl::widget([
                'name' => 'fecha-fin',
                'value' => $fechafin,
                'id' => 'fecha-fin',
                'type' => DateControl::FORMAT_DATE,
            ]);
            ?>
        </div>
        <div class="col-xs-10 col-sm-3">
            <?=
            $form->field($model, 'station_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Estacion::find()->where(['id' => [7, 15, 21, 26, 33]])->orderBy('id')->asArray()->all(), 'id', 'Nombre'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Estacion')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>




    </div>
    <div class="row mb-1">
        <div class="col-xs-6 text-right">
            <?= Html::checkboxList('variables', $variables, $arr) ?> 

        </div>
        <div class="col-xs-3">
            <button class="btn btn-info"><i class="fa fa-search"></i> Buscar </button>
        </div>
        <div class="col-xs-3">
            <?php if ($showData): ?>
                <a class="btn btn-danger" onclick="goBuscar()"><i class="fa fa-line-chart"></i> Graficar </a>
            <?php endif ?>
        </div>

    </div>



    <?php ActiveForm::end(); ?>
    <?php if ($showData): ?>
        <?php
        $gridColumn = [
            //['class' => 'yii\grid\SerialColumn'],
            //['attribute' => 'id', 'visible' => false],
            'station_id',
                    // 'ts',
                  'date',
                  /*
                  'migration',
                  'arch_int',
                  'rev_type',
                  'temp_out',
                  'temp_out_hi',
                  'temp_out_lo',
                  'temp_in',
                  'hum_in',
                  'hum_out',
                  'rainfall_in',
                  'rainfall_clicks',
                  'rainfall_mm',
                  'rain_rate_hi_in',
                  'rain_rate_hi_clicks',
                  'rain_rate_hi_mm',
                  'rain_rate_clicks',
                  'rain_rate_in',
                  'rain_rate_mm',
                  'rain_storm_clicks',
                  'rain_storm_in',
                  'rain_storm_mm',
                  'rain_day_clicks',
                  'rain_day_in',
                  'rain_day_mm',
                  'rain_month_clicks',
                  'rain_month_in',
                  'rain_month_mm',
                  'rain_year_clicks',
                  'rain_year_in',
                  'rain_year_mm',
                  'et',
                  'et_day',
                  'et_month',
                  'et_year',
                  'bar',
                  'bar_trend',
                  'solar_rad_avg',
                  'solar_rad_hi',
                  'solar_rad',
                  'uv',
                  'uv_index_avg',
                  'uv_index_hi',
                  'wind_num_samples',
                  'wind_speed',
                  'wind_speed_10_min_avg',
                  'wind_speed_avg',
                  'wind_speed_hi',
                  'wind_dir',
                  'wind_dir_of_hi',
                  'wind_dir_of_prevail',
                  'moist_soil_1',
                  'moist_soil_2',
                  'moist_soil_3',
                  'moist_soil_4',
                  'temp_soil_1',
                  'temp_soil_2',
                  'temp_soil_3',
                  'temp_soil_4',
                  'wet_leaf_1',
                  'wet_leaf_2',
                  'wet_leaf_3',
                  'wet_leaf_4',
                  'temp_leaf_1',
                  'temp_leaf_2',
                  'temp_leaf_3',
                  'temp_leaf_4',
                  'temp_extra_1',
                  'temp_extra_2',
                  'temp_extra_3',
                  'temp_extra_4',
                  'temp_extra_5',
                  'temp_extra_6',
                  'temp_extra_7',
                  'hum_extra_1',
                  'hum_extra_2',
                  'hum_extra_3',
                  'hum_extra_4',
                  'hum_extra_5',
                  'hum_extra_6',
                  'hum_extra_7',
                  'forecast_rule',
                  'abs_press',
                  'bar_noaa',
                  'bar_alt',
                  'air_density',
                  'dew_point',
                  'dew_point_out',
                  'dew_point_in',
                  'emc',
                  'heat_index_out',
                  'heat_index_in',
                  'heat_index',
                  'wind_chill',
                  'wind_run',
                  'deg_days_heat',
                  'deg_days_cool',
                  'solar_energy',
                  'uv_dose',
                  'thw_index',
                  'wet_bulb',
                  'night_cloud_cover',
                  'iss_reception', */
                /* [
                  'class' => 'yii\grid\ActionColumn',
                  ], */
        ];
        if (count($variables) > 0) {
            $gridColumn = array_merge($gridColumn, $variables);
        }
        ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumn,
            // 'pjax' => true,
            //  'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-station-data']],
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
                ]),
            ],
        ]);
        ?>
    <?php endif ?>
</div>
<script type="text/javascript">
    function goBuscar() {
        var ini = $('#fecha-ini').val();
        var fin = $('#fecha-fin').val();
        var esta = $('#stationdata-station_id').val();
        if (ini != '' && fin != '') {
            window.location.href = "<?= Url::to(['ver-graf']) ?>" + '?ini=' + ini + '&fin=' + fin + '&id_esta=' + esta + '&var=' + 'etp';
        }
    }
</script>