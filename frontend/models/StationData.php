<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\StationData as BaseStationData;

/**
 * This is the model class for table "station_data".
 */
class StationData extends BaseStationData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['station_id', 'ts'], 'required'],
            [['station_id', 'arch_int', 'rev_type', 'rain_rate_clicks', 'rain_rate_in', 'rain_rate_mm', 'rain_storm_clicks', 'rain_day_clicks', 'rain_day_in', 'rain_day_mm', 'rain_month_clicks', 'rain_month_mm', 'rain_year_clicks', 'bar_trend', 'solar_rad_avg', 'solar_rad_hi', 'solar_rad', 'uv', 'uv_index_avg', 'uv_index_hi', 'wind_num_samples', 'wind_speed_10_min_avg', 'wind_speed_avg', 'wind_speed_hi', 'wind_dir', 'wind_dir_of_hi', 'wind_dir_of_prevail', 'wet_leaf_1', 'wet_leaf_2', 'wet_leaf_3', 'wet_leaf_4'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['temp_out', 'temp_out_hi', 'temp_out_lo', 'temp_in', 'hum_in', 'hum_out', 'rainfall_in', 'rainfall_clicks', 'rainfall_mm', 'rain_rate_hi_in', 'rain_rate_hi_clicks', 'rain_rate_hi_mm', 'rain_storm_in', 'rain_storm_mm', 'rain_month_in', 'rain_year_in', 'rain_year_mm', 'et', 'et_day', 'et_month', 'et_year', 'bar', 'wind_speed', 'moist_soil_1', 'moist_soil_2', 'moist_soil_3', 'moist_soil_4', 'temp_soil_1', 'temp_soil_2', 'temp_soil_3', 'temp_soil_4', 'temp_leaf_1', 'temp_leaf_2', 'temp_leaf_3', 'temp_leaf_4', 'temp_extra_1', 'temp_extra_2', 'temp_extra_3', 'temp_extra_4', 'temp_extra_5', 'temp_extra_6', 'temp_extra_7', 'hum_extra_1', 'hum_extra_2', 'hum_extra_3', 'hum_extra_4', 'hum_extra_5', 'hum_extra_6', 'hum_extra_7', 'forecast_rule', 'abs_press', 'bar_noaa', 'bar_alt', 'air_density', 'dew_point', 'dew_point_out', 'dew_point_in', 'emc', 'heat_index_out', 'heat_index_in', 'heat_index', 'wind_chill', 'wind_run', 'deg_days_heat', 'deg_days_cool', 'solar_energy', 'uv_dose', 'thw_index', 'wet_bulb', 'night_cloud_cover', 'iss_reception'], 'number'],
            [['ts'], 'string', 'max' => 255],
            [['migration'], 'string', 'max' => 1]
        ]);
    }
	
}
