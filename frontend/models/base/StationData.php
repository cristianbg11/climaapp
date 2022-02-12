<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "station_data".
 *
 * @property string $id
 * @property string $station_id
 * @property string $ts
 * @property string $date
 * @property integer $migration
 * @property integer $arch_int
 * @property integer $rev_type
 * @property string $temp_out
 * @property string $temp_out_hi
 * @property string $temp_out_lo
 * @property string $temp_in
 * @property string $hum_in
 * @property string $hum_out
 * @property string $rainfall_in
 * @property string $rainfall_clicks
 * @property string $rainfall_mm
 * @property string $rain_rate_hi_in
 * @property string $rain_rate_hi_clicks
 * @property string $rain_rate_hi_mm
 * @property integer $rain_rate_clicks
 * @property integer $rain_rate_in
 * @property integer $rain_rate_mm
 * @property integer $rain_storm_clicks
 * @property string $rain_storm_in
 * @property string $rain_storm_mm
 * @property integer $rain_day_clicks
 * @property integer $rain_day_in
 * @property integer $rain_day_mm
 * @property integer $rain_month_clicks
 * @property string $rain_month_in
 * @property integer $rain_month_mm
 * @property integer $rain_year_clicks
 * @property string $rain_year_in
 * @property string $rain_year_mm
 * @property string $et
 * @property string $et_day
 * @property string $et_month
 * @property string $et_year
 * @property string $bar
 * @property integer $bar_trend
 * @property integer $solar_rad_avg
 * @property integer $solar_rad_hi
 * @property integer $solar_rad
 * @property integer $uv
 * @property integer $uv_index_avg
 * @property integer $uv_index_hi
 * @property integer $wind_num_samples
 * @property string $wind_speed
 * @property integer $wind_speed_10_min_avg
 * @property integer $wind_speed_avg
 * @property integer $wind_speed_hi
 * @property integer $wind_dir
 * @property integer $wind_dir_of_hi
 * @property integer $wind_dir_of_prevail
 * @property string $moist_soil_1
 * @property string $moist_soil_2
 * @property string $moist_soil_3
 * @property string $moist_soil_4
 * @property string $temp_soil_1
 * @property string $temp_soil_2
 * @property string $temp_soil_3
 * @property string $temp_soil_4
 * @property integer $wet_leaf_1
 * @property integer $wet_leaf_2
 * @property integer $wet_leaf_3
 * @property integer $wet_leaf_4
 * @property string $temp_leaf_1
 * @property string $temp_leaf_2
 * @property string $temp_leaf_3
 * @property string $temp_leaf_4
 * @property string $temp_extra_1
 * @property string $temp_extra_2
 * @property string $temp_extra_3
 * @property string $temp_extra_4
 * @property string $temp_extra_5
 * @property string $temp_extra_6
 * @property string $temp_extra_7
 * @property string $hum_extra_1
 * @property string $hum_extra_2
 * @property string $hum_extra_3
 * @property string $hum_extra_4
 * @property string $hum_extra_5
 * @property string $hum_extra_6
 * @property string $hum_extra_7
 * @property string $forecast_rule
 * @property string $abs_press
 * @property string $bar_noaa
 * @property string $bar_alt
 * @property string $air_density
 * @property string $dew_point
 * @property string $dew_point_out
 * @property string $dew_point_in
 * @property string $emc
 * @property string $heat_index_out
 * @property string $heat_index_in
 * @property string $heat_index
 * @property string $wind_chill
 * @property string $wind_run
 * @property string $deg_days_heat
 * @property string $deg_days_cool
 * @property string $solar_energy
 * @property string $uv_dose
 * @property string $thw_index
 * @property string $wet_bulb
 * @property string $night_cloud_cover
 * @property string $iss_reception
 * @property string $created_at
 * @property string $updated_at
 */
class StationData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_id', 'ts'], 'required'],
            [['station_id', 'arch_int', 'rev_type', 'rain_rate_clicks', 'rain_rate_in', 'rain_rate_mm', 'rain_storm_clicks', 'rain_day_clicks', 'rain_day_in', 'rain_day_mm', 'rain_month_clicks', 'rain_month_mm', 'rain_year_clicks', 'bar_trend', 'solar_rad_avg', 'solar_rad_hi', 'solar_rad', 'uv', 'uv_index_avg', 'uv_index_hi', 'wind_num_samples', 'wind_speed_10_min_avg', 'wind_speed_avg', 'wind_speed_hi', 'wind_dir', 'wind_dir_of_hi', 'wind_dir_of_prevail', 'wet_leaf_1', 'wet_leaf_2', 'wet_leaf_3', 'wet_leaf_4'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['temp_out', 'temp_out_hi', 'temp_out_lo', 'temp_in', 'hum_in', 'hum_out', 'rainfall_in', 'rainfall_clicks', 'rainfall_mm', 'rain_rate_hi_in', 'rain_rate_hi_clicks', 'rain_rate_hi_mm', 'rain_storm_in', 'rain_storm_mm', 'rain_month_in', 'rain_year_in', 'rain_year_mm', 'et', 'et_day', 'et_month', 'et_year', 'bar', 'wind_speed', 'moist_soil_1', 'moist_soil_2', 'moist_soil_3', 'moist_soil_4', 'temp_soil_1', 'temp_soil_2', 'temp_soil_3', 'temp_soil_4', 'temp_leaf_1', 'temp_leaf_2', 'temp_leaf_3', 'temp_leaf_4', 'temp_extra_1', 'temp_extra_2', 'temp_extra_3', 'temp_extra_4', 'temp_extra_5', 'temp_extra_6', 'temp_extra_7', 'hum_extra_1', 'hum_extra_2', 'hum_extra_3', 'hum_extra_4', 'hum_extra_5', 'hum_extra_6', 'hum_extra_7', 'forecast_rule', 'abs_press', 'bar_noaa', 'bar_alt', 'air_density', 'dew_point', 'dew_point_out', 'dew_point_in', 'emc', 'heat_index_out', 'heat_index_in', 'heat_index', 'wind_chill', 'wind_run', 'deg_days_heat', 'deg_days_cool', 'solar_energy', 'uv_dose', 'thw_index', 'wet_bulb', 'night_cloud_cover', 'iss_reception'], 'number'],
            [['ts'], 'string', 'max' => 255],
            [['migration'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'station_id' => Yii::t('app', 'Station ID'),
            'ts' => Yii::t('app', 'Ts'),
            'date' => Yii::t('app', 'Date'),
            'migration' => Yii::t('app', 'Migration'),
            'arch_int' => Yii::t('app', 'Arch Int'),
            'rev_type' => Yii::t('app', 'Rev Type'),
            'temp_out' => Yii::t('app', 'Temp Out'),
            'temp_out_hi' => Yii::t('app', 'Temp Out Hi'),
            'temp_out_lo' => Yii::t('app', 'Temp Out Lo'),
            'temp_in' => Yii::t('app', 'Temp In'),
            'hum_in' => Yii::t('app', 'Hum In'),
            'hum_out' => Yii::t('app', 'Hum Out'),
            'rainfall_in' => Yii::t('app', 'Rainfall In'),
            'rainfall_clicks' => Yii::t('app', 'Rainfall Clicks'),
            'rainfall_mm' => Yii::t('app', 'Rainfall Mm'),
            'rain_rate_hi_in' => Yii::t('app', 'Rain Rate Hi In'),
            'rain_rate_hi_clicks' => Yii::t('app', 'Rain Rate Hi Clicks'),
            'rain_rate_hi_mm' => Yii::t('app', 'Rain Rate Hi Mm'),
            'rain_rate_clicks' => Yii::t('app', 'Rain Rate Clicks'),
            'rain_rate_in' => Yii::t('app', 'Rain Rate In'),
            'rain_rate_mm' => Yii::t('app', 'Rain Rate Mm'),
            'rain_storm_clicks' => Yii::t('app', 'Rain Storm Clicks'),
            'rain_storm_in' => Yii::t('app', 'Rain Storm In'),
            'rain_storm_mm' => Yii::t('app', 'Rain Storm Mm'),
            'rain_day_clicks' => Yii::t('app', 'Rain Day Clicks'),
            'rain_day_in' => Yii::t('app', 'Rain Day In'),
            'rain_day_mm' => Yii::t('app', 'Rain Day Mm'),
            'rain_month_clicks' => Yii::t('app', 'Rain Month Clicks'),
            'rain_month_in' => Yii::t('app', 'Rain Month In'),
            'rain_month_mm' => Yii::t('app', 'Rain Month Mm'),
            'rain_year_clicks' => Yii::t('app', 'Rain Year Clicks'),
            'rain_year_in' => Yii::t('app', 'Rain Year In'),
            'rain_year_mm' => Yii::t('app', 'Rain Year Mm'),
            'et' => Yii::t('app', 'Et'),
            'et_day' => Yii::t('app', 'Et Day'),
            'et_month' => Yii::t('app', 'Et Month'),
            'et_year' => Yii::t('app', 'Et Year'),
            'bar' => Yii::t('app', 'Bar'),
            'bar_trend' => Yii::t('app', 'Bar Trend'),
            'solar_rad_avg' => Yii::t('app', 'Solar Rad Avg'),
            'solar_rad_hi' => Yii::t('app', 'Solar Rad Hi'),
            'solar_rad' => Yii::t('app', 'Solar Rad'),
            'uv' => Yii::t('app', 'Uv'),
            'uv_index_avg' => Yii::t('app', 'Uv Index Avg'),
            'uv_index_hi' => Yii::t('app', 'Uv Index Hi'),
            'wind_num_samples' => Yii::t('app', 'Wind Num Samples'),
            'wind_speed' => Yii::t('app', 'Wind Speed'),
            'wind_speed_10_min_avg' => Yii::t('app', 'Wind Speed 10 Min Avg'),
            'wind_speed_avg' => Yii::t('app', 'Wind Speed Avg'),
            'wind_speed_hi' => Yii::t('app', 'Wind Speed Hi'),
            'wind_dir' => Yii::t('app', 'Wind Dir'),
            'wind_dir_of_hi' => Yii::t('app', 'Wind Dir Of Hi'),
            'wind_dir_of_prevail' => Yii::t('app', 'Wind Dir Of Prevail'),
            'moist_soil_1' => Yii::t('app', 'Moist Soil 1'),
            'moist_soil_2' => Yii::t('app', 'Moist Soil 2'),
            'moist_soil_3' => Yii::t('app', 'Moist Soil 3'),
            'moist_soil_4' => Yii::t('app', 'Moist Soil 4'),
            'temp_soil_1' => Yii::t('app', 'Temp Soil 1'),
            'temp_soil_2' => Yii::t('app', 'Temp Soil 2'),
            'temp_soil_3' => Yii::t('app', 'Temp Soil 3'),
            'temp_soil_4' => Yii::t('app', 'Temp Soil 4'),
            'wet_leaf_1' => Yii::t('app', 'Wet Leaf 1'),
            'wet_leaf_2' => Yii::t('app', 'Wet Leaf 2'),
            'wet_leaf_3' => Yii::t('app', 'Wet Leaf 3'),
            'wet_leaf_4' => Yii::t('app', 'Wet Leaf 4'),
            'temp_leaf_1' => Yii::t('app', 'Temp Leaf 1'),
            'temp_leaf_2' => Yii::t('app', 'Temp Leaf 2'),
            'temp_leaf_3' => Yii::t('app', 'Temp Leaf 3'),
            'temp_leaf_4' => Yii::t('app', 'Temp Leaf 4'),
            'temp_extra_1' => Yii::t('app', 'Temp Extra 1'),
            'temp_extra_2' => Yii::t('app', 'Temp Extra 2'),
            'temp_extra_3' => Yii::t('app', 'Temp Extra 3'),
            'temp_extra_4' => Yii::t('app', 'Temp Extra 4'),
            'temp_extra_5' => Yii::t('app', 'Temp Extra 5'),
            'temp_extra_6' => Yii::t('app', 'Temp Extra 6'),
            'temp_extra_7' => Yii::t('app', 'Temp Extra 7'),
            'hum_extra_1' => Yii::t('app', 'Hum Extra 1'),
            'hum_extra_2' => Yii::t('app', 'Hum Extra 2'),
            'hum_extra_3' => Yii::t('app', 'Hum Extra 3'),
            'hum_extra_4' => Yii::t('app', 'Hum Extra 4'),
            'hum_extra_5' => Yii::t('app', 'Hum Extra 5'),
            'hum_extra_6' => Yii::t('app', 'Hum Extra 6'),
            'hum_extra_7' => Yii::t('app', 'Hum Extra 7'),
            'forecast_rule' => Yii::t('app', 'Forecast Rule'),
            'abs_press' => Yii::t('app', 'Abs Press'),
            'bar_noaa' => Yii::t('app', 'Bar Noaa'),
            'bar_alt' => Yii::t('app', 'Bar Alt'),
            'air_density' => Yii::t('app', 'Air Density'),
            'dew_point' => Yii::t('app', 'Dew Point'),
            'dew_point_out' => Yii::t('app', 'Dew Point Out'),
            'dew_point_in' => Yii::t('app', 'Dew Point In'),
            'emc' => Yii::t('app', 'Emc'),
            'heat_index_out' => Yii::t('app', 'Heat Index Out'),
            'heat_index_in' => Yii::t('app', 'Heat Index In'),
            'heat_index' => Yii::t('app', 'Heat Index'),
            'wind_chill' => Yii::t('app', 'Wind Chill'),
            'wind_run' => Yii::t('app', 'Wind Run'),
            'deg_days_heat' => Yii::t('app', 'Deg Days Heat'),
            'deg_days_cool' => Yii::t('app', 'Deg Days Cool'),
            'solar_energy' => Yii::t('app', 'Solar Energy'),
            'uv_dose' => Yii::t('app', 'Uv Dose'),
            'thw_index' => Yii::t('app', 'Thw Index'),
            'wet_bulb' => Yii::t('app', 'Wet Bulb'),
            'night_cloud_cover' => Yii::t('app', 'Night Cloud Cover'),
            'iss_reception' => Yii::t('app', 'Iss Reception'),
        ];
    }


    /**
     * @inheritdoc
     * @return \frontend\models\StationDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\StationDataQuery(get_called_class());
    }
}
