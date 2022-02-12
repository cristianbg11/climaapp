<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\StationDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-station-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'station_id')->textInput(['maxlength' => true, 'placeholder' => 'Station']) ?>

    <?= $form->field($model, 'ts')->textInput(['maxlength' => true, 'placeholder' => 'Ts']) ?>

    <?= $form->field($model, 'date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date'),
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'migration')->checkbox() ?>

    <?php /* echo $form->field($model, 'arch_int')->textInput(['placeholder' => 'Arch Int']) */ ?>

    <?php /* echo $form->field($model, 'rev_type')->textInput(['placeholder' => 'Rev Type']) */ ?>

    <?php /* echo $form->field($model, 'temp_out')->textInput(['maxlength' => true, 'placeholder' => 'Temp Out']) */ ?>

    <?php /* echo $form->field($model, 'temp_out_hi')->textInput(['maxlength' => true, 'placeholder' => 'Temp Out Hi']) */ ?>

    <?php /* echo $form->field($model, 'temp_out_lo')->textInput(['maxlength' => true, 'placeholder' => 'Temp Out Lo']) */ ?>

    <?php /* echo $form->field($model, 'temp_in')->textInput(['maxlength' => true, 'placeholder' => 'Temp In']) */ ?>

    <?php /* echo $form->field($model, 'hum_in')->textInput(['maxlength' => true, 'placeholder' => 'Hum In']) */ ?>

    <?php /* echo $form->field($model, 'hum_out')->textInput(['maxlength' => true, 'placeholder' => 'Hum Out']) */ ?>

    <?php /* echo $form->field($model, 'rainfall_in')->textInput(['maxlength' => true, 'placeholder' => 'Rainfall In']) */ ?>

    <?php /* echo $form->field($model, 'rainfall_clicks')->textInput(['maxlength' => true, 'placeholder' => 'Rainfall Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rainfall_mm')->textInput(['maxlength' => true, 'placeholder' => 'Rainfall Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_hi_in')->textInput(['maxlength' => true, 'placeholder' => 'Rain Rate Hi In']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_hi_clicks')->textInput(['maxlength' => true, 'placeholder' => 'Rain Rate Hi Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_hi_mm')->textInput(['maxlength' => true, 'placeholder' => 'Rain Rate Hi Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_clicks')->textInput(['placeholder' => 'Rain Rate Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_in')->textInput(['placeholder' => 'Rain Rate In']) */ ?>

    <?php /* echo $form->field($model, 'rain_rate_mm')->textInput(['placeholder' => 'Rain Rate Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_storm_clicks')->textInput(['placeholder' => 'Rain Storm Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_storm_in')->textInput(['maxlength' => true, 'placeholder' => 'Rain Storm In']) */ ?>

    <?php /* echo $form->field($model, 'rain_storm_mm')->textInput(['maxlength' => true, 'placeholder' => 'Rain Storm Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_day_clicks')->textInput(['placeholder' => 'Rain Day Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_day_in')->textInput(['placeholder' => 'Rain Day In']) */ ?>

    <?php /* echo $form->field($model, 'rain_day_mm')->textInput(['placeholder' => 'Rain Day Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_month_clicks')->textInput(['placeholder' => 'Rain Month Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_month_in')->textInput(['maxlength' => true, 'placeholder' => 'Rain Month In']) */ ?>

    <?php /* echo $form->field($model, 'rain_month_mm')->textInput(['placeholder' => 'Rain Month Mm']) */ ?>

    <?php /* echo $form->field($model, 'rain_year_clicks')->textInput(['placeholder' => 'Rain Year Clicks']) */ ?>

    <?php /* echo $form->field($model, 'rain_year_in')->textInput(['maxlength' => true, 'placeholder' => 'Rain Year In']) */ ?>

    <?php /* echo $form->field($model, 'rain_year_mm')->textInput(['maxlength' => true, 'placeholder' => 'Rain Year Mm']) */ ?>

    <?php /* echo $form->field($model, 'et')->textInput(['maxlength' => true, 'placeholder' => 'Et']) */ ?>

    <?php /* echo $form->field($model, 'et_day')->textInput(['maxlength' => true, 'placeholder' => 'Et Day']) */ ?>

    <?php /* echo $form->field($model, 'et_month')->textInput(['maxlength' => true, 'placeholder' => 'Et Month']) */ ?>

    <?php /* echo $form->field($model, 'et_year')->textInput(['maxlength' => true, 'placeholder' => 'Et Year']) */ ?>

    <?php /* echo $form->field($model, 'bar')->textInput(['maxlength' => true, 'placeholder' => 'Bar']) */ ?>

    <?php /* echo $form->field($model, 'bar_trend')->textInput(['placeholder' => 'Bar Trend']) */ ?>

    <?php /* echo $form->field($model, 'solar_rad_avg')->textInput(['placeholder' => 'Solar Rad Avg']) */ ?>

    <?php /* echo $form->field($model, 'solar_rad_hi')->textInput(['placeholder' => 'Solar Rad Hi']) */ ?>

    <?php /* echo $form->field($model, 'solar_rad')->textInput(['placeholder' => 'Solar Rad']) */ ?>

    <?php /* echo $form->field($model, 'uv')->textInput(['placeholder' => 'Uv']) */ ?>

    <?php /* echo $form->field($model, 'uv_index_avg')->textInput(['placeholder' => 'Uv Index Avg']) */ ?>

    <?php /* echo $form->field($model, 'uv_index_hi')->textInput(['placeholder' => 'Uv Index Hi']) */ ?>

    <?php /* echo $form->field($model, 'wind_num_samples')->textInput(['placeholder' => 'Wind Num Samples']) */ ?>

    <?php /* echo $form->field($model, 'wind_speed')->textInput(['maxlength' => true, 'placeholder' => 'Wind Speed']) */ ?>

    <?php /* echo $form->field($model, 'wind_speed_10_min_avg')->textInput(['placeholder' => 'Wind Speed 10 Min Avg']) */ ?>

    <?php /* echo $form->field($model, 'wind_speed_avg')->textInput(['placeholder' => 'Wind Speed Avg']) */ ?>

    <?php /* echo $form->field($model, 'wind_speed_hi')->textInput(['placeholder' => 'Wind Speed Hi']) */ ?>

    <?php /* echo $form->field($model, 'wind_dir')->textInput(['placeholder' => 'Wind Dir']) */ ?>

    <?php /* echo $form->field($model, 'wind_dir_of_hi')->textInput(['placeholder' => 'Wind Dir Of Hi']) */ ?>

    <?php /* echo $form->field($model, 'wind_dir_of_prevail')->textInput(['placeholder' => 'Wind Dir Of Prevail']) */ ?>

    <?php /* echo $form->field($model, 'moist_soil_1')->textInput(['maxlength' => true, 'placeholder' => 'Moist Soil 1']) */ ?>

    <?php /* echo $form->field($model, 'moist_soil_2')->textInput(['maxlength' => true, 'placeholder' => 'Moist Soil 2']) */ ?>

    <?php /* echo $form->field($model, 'moist_soil_3')->textInput(['maxlength' => true, 'placeholder' => 'Moist Soil 3']) */ ?>

    <?php /* echo $form->field($model, 'moist_soil_4')->textInput(['maxlength' => true, 'placeholder' => 'Moist Soil 4']) */ ?>

    <?php /* echo $form->field($model, 'temp_soil_1')->textInput(['maxlength' => true, 'placeholder' => 'Temp Soil 1']) */ ?>

    <?php /* echo $form->field($model, 'temp_soil_2')->textInput(['maxlength' => true, 'placeholder' => 'Temp Soil 2']) */ ?>

    <?php /* echo $form->field($model, 'temp_soil_3')->textInput(['maxlength' => true, 'placeholder' => 'Temp Soil 3']) */ ?>

    <?php /* echo $form->field($model, 'temp_soil_4')->textInput(['maxlength' => true, 'placeholder' => 'Temp Soil 4']) */ ?>

    <?php /* echo $form->field($model, 'wet_leaf_1')->textInput(['placeholder' => 'Wet Leaf 1']) */ ?>

    <?php /* echo $form->field($model, 'wet_leaf_2')->textInput(['placeholder' => 'Wet Leaf 2']) */ ?>

    <?php /* echo $form->field($model, 'wet_leaf_3')->textInput(['placeholder' => 'Wet Leaf 3']) */ ?>

    <?php /* echo $form->field($model, 'wet_leaf_4')->textInput(['placeholder' => 'Wet Leaf 4']) */ ?>

    <?php /* echo $form->field($model, 'temp_leaf_1')->textInput(['maxlength' => true, 'placeholder' => 'Temp Leaf 1']) */ ?>

    <?php /* echo $form->field($model, 'temp_leaf_2')->textInput(['maxlength' => true, 'placeholder' => 'Temp Leaf 2']) */ ?>

    <?php /* echo $form->field($model, 'temp_leaf_3')->textInput(['maxlength' => true, 'placeholder' => 'Temp Leaf 3']) */ ?>

    <?php /* echo $form->field($model, 'temp_leaf_4')->textInput(['maxlength' => true, 'placeholder' => 'Temp Leaf 4']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_1')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 1']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_2')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 2']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_3')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 3']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_4')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 4']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_5')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 5']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_6')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 6']) */ ?>

    <?php /* echo $form->field($model, 'temp_extra_7')->textInput(['maxlength' => true, 'placeholder' => 'Temp Extra 7']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_1')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 1']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_2')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 2']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_3')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 3']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_4')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 4']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_5')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 5']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_6')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 6']) */ ?>

    <?php /* echo $form->field($model, 'hum_extra_7')->textInput(['maxlength' => true, 'placeholder' => 'Hum Extra 7']) */ ?>

    <?php /* echo $form->field($model, 'forecast_rule')->textInput(['maxlength' => true, 'placeholder' => 'Forecast Rule']) */ ?>

    <?php /* echo $form->field($model, 'abs_press')->textInput(['maxlength' => true, 'placeholder' => 'Abs Press']) */ ?>

    <?php /* echo $form->field($model, 'bar_noaa')->textInput(['maxlength' => true, 'placeholder' => 'Bar Noaa']) */ ?>

    <?php /* echo $form->field($model, 'bar_alt')->textInput(['maxlength' => true, 'placeholder' => 'Bar Alt']) */ ?>

    <?php /* echo $form->field($model, 'air_density')->textInput(['maxlength' => true, 'placeholder' => 'Air Density']) */ ?>

    <?php /* echo $form->field($model, 'dew_point')->textInput(['maxlength' => true, 'placeholder' => 'Dew Point']) */ ?>

    <?php /* echo $form->field($model, 'dew_point_out')->textInput(['maxlength' => true, 'placeholder' => 'Dew Point Out']) */ ?>

    <?php /* echo $form->field($model, 'dew_point_in')->textInput(['maxlength' => true, 'placeholder' => 'Dew Point In']) */ ?>

    <?php /* echo $form->field($model, 'emc')->textInput(['maxlength' => true, 'placeholder' => 'Emc']) */ ?>

    <?php /* echo $form->field($model, 'heat_index_out')->textInput(['maxlength' => true, 'placeholder' => 'Heat Index Out']) */ ?>

    <?php /* echo $form->field($model, 'heat_index_in')->textInput(['maxlength' => true, 'placeholder' => 'Heat Index In']) */ ?>

    <?php /* echo $form->field($model, 'heat_index')->textInput(['maxlength' => true, 'placeholder' => 'Heat Index']) */ ?>

    <?php /* echo $form->field($model, 'wind_chill')->textInput(['maxlength' => true, 'placeholder' => 'Wind Chill']) */ ?>

    <?php /* echo $form->field($model, 'wind_run')->textInput(['maxlength' => true, 'placeholder' => 'Wind Run']) */ ?>

    <?php /* echo $form->field($model, 'deg_days_heat')->textInput(['maxlength' => true, 'placeholder' => 'Deg Days Heat']) */ ?>

    <?php /* echo $form->field($model, 'deg_days_cool')->textInput(['maxlength' => true, 'placeholder' => 'Deg Days Cool']) */ ?>

    <?php /* echo $form->field($model, 'solar_energy')->textInput(['maxlength' => true, 'placeholder' => 'Solar Energy']) */ ?>

    <?php /* echo $form->field($model, 'uv_dose')->textInput(['maxlength' => true, 'placeholder' => 'Uv Dose']) */ ?>

    <?php /* echo $form->field($model, 'thw_index')->textInput(['maxlength' => true, 'placeholder' => 'Thw Index']) */ ?>

    <?php /* echo $form->field($model, 'wet_bulb')->textInput(['maxlength' => true, 'placeholder' => 'Wet Bulb']) */ ?>

    <?php /* echo $form->field($model, 'night_cloud_cover')->textInput(['maxlength' => true, 'placeholder' => 'Night Cloud Cover']) */ ?>

    <?php /* echo $form->field($model, 'iss_reception')->textInput(['maxlength' => true, 'placeholder' => 'Iss Reception']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
