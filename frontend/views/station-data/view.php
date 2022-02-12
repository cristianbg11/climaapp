<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\StationData */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Station Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-data-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Station Data').' '. Html::encode($this->title) ?></h2>
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
        'station_id',
        'ts',
        'date',
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
        'iss_reception',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
