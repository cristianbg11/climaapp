<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\StationData;

/**
 * frontend\models\StationDataSearch represents the model behind the search form about `frontend\models\StationData`.
 */
 class StationDataSearch extends StationData
{
    var $fecha_ini;
    var $fecha_fin;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'station_id', 'arch_int', 'rev_type', 'rain_rate_clicks', 'rain_rate_in', 'rain_rate_mm', 'rain_storm_clicks', 'rain_day_clicks', 'rain_day_in', 'rain_day_mm', 'rain_month_clicks', 'rain_month_mm', 'rain_year_clicks', 'bar_trend', 'solar_rad_avg', 'solar_rad_hi', 'solar_rad', 'uv', 'uv_index_avg', 'uv_index_hi', 'wind_num_samples', 'wind_speed_10_min_avg', 'wind_speed_avg', 'wind_speed_hi', 'wind_dir', 'wind_dir_of_hi', 'wind_dir_of_prevail', 'wet_leaf_1', 'wet_leaf_2', 'wet_leaf_3', 'wet_leaf_4'], 'integer'],
            [['ts', 'date', 'migration', 'created_at', 'updated_at'], 'safe'],
            [['temp_out', 'temp_out_hi', 'temp_out_lo', 'temp_in', 'hum_in', 'hum_out', 'rainfall_in', 'rainfall_clicks', 'rainfall_mm', 'rain_rate_hi_in', 'rain_rate_hi_clicks', 'rain_rate_hi_mm', 'rain_storm_in', 'rain_storm_mm', 'rain_month_in', 'rain_year_in', 'rain_year_mm', 'et', 'et_day', 'et_month', 'et_year', 'bar', 'wind_speed', 'moist_soil_1', 'moist_soil_2', 'moist_soil_3', 'moist_soil_4', 'temp_soil_1', 'temp_soil_2', 'temp_soil_3', 'temp_soil_4', 'temp_leaf_1', 'temp_leaf_2', 'temp_leaf_3', 'temp_leaf_4', 'temp_extra_1', 'temp_extra_2', 'temp_extra_3', 'temp_extra_4', 'temp_extra_5', 'temp_extra_6', 'temp_extra_7', 'hum_extra_1', 'hum_extra_2', 'hum_extra_3', 'hum_extra_4', 'hum_extra_5', 'hum_extra_6', 'hum_extra_7', 'forecast_rule', 'abs_press', 'bar_noaa', 'bar_alt', 'air_density', 'dew_point', 'dew_point_out', 'dew_point_in', 'emc', 'heat_index_out', 'heat_index_in', 'heat_index', 'wind_chill', 'wind_run', 'deg_days_heat', 'deg_days_cool', 'solar_energy', 'uv_dose', 'thw_index', 'wet_bulb', 'night_cloud_cover', 'iss_reception'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function searchByDay($params)
    {
        $query = StationData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //die($this->station_id);
        $query->andFilterWhere([
            'id' => $this->id,
            'station_id' => $this->station_id,
            'date' => $this->date,
            'arch_int' => $this->arch_int,
            'rev_type' => $this->rev_type,
            'temp_out' => $this->temp_out,
            'temp_out_hi' => $this->temp_out_hi,
            'temp_out_lo' => $this->temp_out_lo,
            'temp_in' => $this->temp_in,
            'hum_in' => $this->hum_in,
            'hum_out' => $this->hum_out,
            'rainfall_in' => $this->rainfall_in,
            'rainfall_clicks' => $this->rainfall_clicks,
            'rainfall_mm' => $this->rainfall_mm,
            'rain_rate_hi_in' => $this->rain_rate_hi_in,
            'rain_rate_hi_clicks' => $this->rain_rate_hi_clicks,
            'rain_rate_hi_mm' => $this->rain_rate_hi_mm,
            'rain_rate_clicks' => $this->rain_rate_clicks,
            'rain_rate_in' => $this->rain_rate_in,
            'rain_rate_mm' => $this->rain_rate_mm,
            'rain_storm_clicks' => $this->rain_storm_clicks,
            'rain_storm_in' => $this->rain_storm_in,
            'rain_storm_mm' => $this->rain_storm_mm,
            'rain_day_clicks' => $this->rain_day_clicks,
            'rain_day_in' => $this->rain_day_in,
            'rain_day_mm' => $this->rain_day_mm,
            'rain_month_clicks' => $this->rain_month_clicks,
            'rain_month_in' => $this->rain_month_in,
            'rain_month_mm' => $this->rain_month_mm,
            'rain_year_clicks' => $this->rain_year_clicks,
            'rain_year_in' => $this->rain_year_in,
            'rain_year_mm' => $this->rain_year_mm,
            'et' => $this->et,
            'et_day' => $this->et_day,
            'et_month' => $this->et_month,
            'et_year' => $this->et_year,
            'bar' => $this->bar,
            'bar_trend' => $this->bar_trend,
            'solar_rad_avg' => $this->solar_rad_avg,
            'solar_rad_hi' => $this->solar_rad_hi,
            'solar_rad' => $this->solar_rad,
            'uv' => $this->uv,
            'uv_index_avg' => $this->uv_index_avg,
            'uv_index_hi' => $this->uv_index_hi,
            'wind_num_samples' => $this->wind_num_samples,
            'wind_speed' => $this->wind_speed,
            'wind_speed_10_min_avg' => $this->wind_speed_10_min_avg,
            'wind_speed_avg' => $this->wind_speed_avg,
            'wind_speed_hi' => $this->wind_speed_hi,
            'wind_dir' => $this->wind_dir,
            'wind_dir_of_hi' => $this->wind_dir_of_hi,
            'wind_dir_of_prevail' => $this->wind_dir_of_prevail,
            'moist_soil_1' => $this->moist_soil_1,
            'moist_soil_2' => $this->moist_soil_2,
            'moist_soil_3' => $this->moist_soil_3,
            'moist_soil_4' => $this->moist_soil_4,
            'temp_soil_1' => $this->temp_soil_1,
            'temp_soil_2' => $this->temp_soil_2,
            'temp_soil_3' => $this->temp_soil_3,
            'temp_soil_4' => $this->temp_soil_4,
            'wet_leaf_1' => $this->wet_leaf_1,
            'wet_leaf_2' => $this->wet_leaf_2,
            'wet_leaf_3' => $this->wet_leaf_3,
            'wet_leaf_4' => $this->wet_leaf_4,
            'temp_leaf_1' => $this->temp_leaf_1,
            'temp_leaf_2' => $this->temp_leaf_2,
            'temp_leaf_3' => $this->temp_leaf_3,
            'temp_leaf_4' => $this->temp_leaf_4,
            'temp_extra_1' => $this->temp_extra_1,
            'temp_extra_2' => $this->temp_extra_2,
            'temp_extra_3' => $this->temp_extra_3,
            'temp_extra_4' => $this->temp_extra_4,
            'temp_extra_5' => $this->temp_extra_5,
            'temp_extra_6' => $this->temp_extra_6,
            'temp_extra_7' => $this->temp_extra_7,
            'hum_extra_1' => $this->hum_extra_1,
            'hum_extra_2' => $this->hum_extra_2,
            'hum_extra_3' => $this->hum_extra_3,
            'hum_extra_4' => $this->hum_extra_4,
            'hum_extra_5' => $this->hum_extra_5,
            'hum_extra_6' => $this->hum_extra_6,
            'hum_extra_7' => $this->hum_extra_7,
            'forecast_rule' => $this->forecast_rule,
            'abs_press' => $this->abs_press,
            'bar_noaa' => $this->bar_noaa,
            'bar_alt' => $this->bar_alt,
            'air_density' => $this->air_density,
            'dew_point' => $this->dew_point,
            'dew_point_out' => $this->dew_point_out,
            'dew_point_in' => $this->dew_point_in,
            'emc' => $this->emc,
            'heat_index_out' => $this->heat_index_out,
            'heat_index_in' => $this->heat_index_in,
            'heat_index' => $this->heat_index,
            'wind_chill' => $this->wind_chill,
            'wind_run' => $this->wind_run,
            'deg_days_heat' => $this->deg_days_heat,
            'deg_days_cool' => $this->deg_days_cool,
            'solar_energy' => $this->solar_energy,
            'uv_dose' => $this->uv_dose,
            'thw_index' => $this->thw_index,
            'wet_bulb' => $this->wet_bulb,
            'night_cloud_cover' => $this->night_cloud_cover,
            'iss_reception' => $this->iss_reception,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        if (!empty($this->fecha_ini) && !empty($this->fecha_fin)) {
            $query->andWhere(['between', 'date', $this->fecha_ini, $this->fecha_fin]);
        }
        $query->andFilterWhere(['like', 'ts', $this->ts])
            ->andFilterWhere(['like', 'migration', $this->migration]);
            //$query->groupBy('DATE(date)');
            $query->orderBy('date');
        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = StationData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //die($this->station_id);
        $query->andFilterWhere([
            'id' => $this->id,
            'station_id' => $this->station_id,
            'date' => $this->date,
            'arch_int' => $this->arch_int,
            'rev_type' => $this->rev_type,
            'temp_out' => $this->temp_out,
            'temp_out_hi' => $this->temp_out_hi,
            'temp_out_lo' => $this->temp_out_lo,
            'temp_in' => $this->temp_in,
            'hum_in' => $this->hum_in,
            'hum_out' => $this->hum_out,
            'rainfall_in' => $this->rainfall_in,
            'rainfall_clicks' => $this->rainfall_clicks,
            'rainfall_mm' => $this->rainfall_mm,
            'rain_rate_hi_in' => $this->rain_rate_hi_in,
            'rain_rate_hi_clicks' => $this->rain_rate_hi_clicks,
            'rain_rate_hi_mm' => $this->rain_rate_hi_mm,
            'rain_rate_clicks' => $this->rain_rate_clicks,
            'rain_rate_in' => $this->rain_rate_in,
            'rain_rate_mm' => $this->rain_rate_mm,
            'rain_storm_clicks' => $this->rain_storm_clicks,
            'rain_storm_in' => $this->rain_storm_in,
            'rain_storm_mm' => $this->rain_storm_mm,
            'rain_day_clicks' => $this->rain_day_clicks,
            'rain_day_in' => $this->rain_day_in,
            'rain_day_mm' => $this->rain_day_mm,
            'rain_month_clicks' => $this->rain_month_clicks,
            'rain_month_in' => $this->rain_month_in,
            'rain_month_mm' => $this->rain_month_mm,
            'rain_year_clicks' => $this->rain_year_clicks,
            'rain_year_in' => $this->rain_year_in,
            'rain_year_mm' => $this->rain_year_mm,
            'et' => $this->et,
            'et_day' => $this->et_day,
            'et_month' => $this->et_month,
            'et_year' => $this->et_year,
            'bar' => $this->bar,
            'bar_trend' => $this->bar_trend,
            'solar_rad_avg' => $this->solar_rad_avg,
            'solar_rad_hi' => $this->solar_rad_hi,
            'solar_rad' => $this->solar_rad,
            'uv' => $this->uv,
            'uv_index_avg' => $this->uv_index_avg,
            'uv_index_hi' => $this->uv_index_hi,
            'wind_num_samples' => $this->wind_num_samples,
            'wind_speed' => $this->wind_speed,
            'wind_speed_10_min_avg' => $this->wind_speed_10_min_avg,
            'wind_speed_avg' => $this->wind_speed_avg,
            'wind_speed_hi' => $this->wind_speed_hi,
            'wind_dir' => $this->wind_dir,
            'wind_dir_of_hi' => $this->wind_dir_of_hi,
            'wind_dir_of_prevail' => $this->wind_dir_of_prevail,
            'moist_soil_1' => $this->moist_soil_1,
            'moist_soil_2' => $this->moist_soil_2,
            'moist_soil_3' => $this->moist_soil_3,
            'moist_soil_4' => $this->moist_soil_4,
            'temp_soil_1' => $this->temp_soil_1,
            'temp_soil_2' => $this->temp_soil_2,
            'temp_soil_3' => $this->temp_soil_3,
            'temp_soil_4' => $this->temp_soil_4,
            'wet_leaf_1' => $this->wet_leaf_1,
            'wet_leaf_2' => $this->wet_leaf_2,
            'wet_leaf_3' => $this->wet_leaf_3,
            'wet_leaf_4' => $this->wet_leaf_4,
            'temp_leaf_1' => $this->temp_leaf_1,
            'temp_leaf_2' => $this->temp_leaf_2,
            'temp_leaf_3' => $this->temp_leaf_3,
            'temp_leaf_4' => $this->temp_leaf_4,
            'temp_extra_1' => $this->temp_extra_1,
            'temp_extra_2' => $this->temp_extra_2,
            'temp_extra_3' => $this->temp_extra_3,
            'temp_extra_4' => $this->temp_extra_4,
            'temp_extra_5' => $this->temp_extra_5,
            'temp_extra_6' => $this->temp_extra_6,
            'temp_extra_7' => $this->temp_extra_7,
            'hum_extra_1' => $this->hum_extra_1,
            'hum_extra_2' => $this->hum_extra_2,
            'hum_extra_3' => $this->hum_extra_3,
            'hum_extra_4' => $this->hum_extra_4,
            'hum_extra_5' => $this->hum_extra_5,
            'hum_extra_6' => $this->hum_extra_6,
            'hum_extra_7' => $this->hum_extra_7,
            'forecast_rule' => $this->forecast_rule,
            'abs_press' => $this->abs_press,
            'bar_noaa' => $this->bar_noaa,
            'bar_alt' => $this->bar_alt,
            'air_density' => $this->air_density,
            'dew_point' => $this->dew_point,
            'dew_point_out' => $this->dew_point_out,
            'dew_point_in' => $this->dew_point_in,
            'emc' => $this->emc,
            'heat_index_out' => $this->heat_index_out,
            'heat_index_in' => $this->heat_index_in,
            'heat_index' => $this->heat_index,
            'wind_chill' => $this->wind_chill,
            'wind_run' => $this->wind_run,
            'deg_days_heat' => $this->deg_days_heat,
            'deg_days_cool' => $this->deg_days_cool,
            'solar_energy' => $this->solar_energy,
            'uv_dose' => $this->uv_dose,
            'thw_index' => $this->thw_index,
            'wet_bulb' => $this->wet_bulb,
            'night_cloud_cover' => $this->night_cloud_cover,
            'iss_reception' => $this->iss_reception,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        if (!empty($this->fecha_ini) && !empty($this->fecha_fin)) {
            $query->andWhere(['between', 'date', $this->fecha_ini, $this->fecha_fin]);
        }
        $query->andFilterWhere(['like', 'ts', $this->ts])
            ->andFilterWhere(['like', 'migration', $this->migration]);

        return $dataProvider;
    }
}
