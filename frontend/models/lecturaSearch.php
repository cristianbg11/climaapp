<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Lectura;

/**
 * frontend\models\LecturaSearch represents the model behind the search form about `frontend\models\Lectura`.
 */
 class LecturaSearch extends Lectura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_estacion', 'id_variable', 'valor'], 'integer'],
            [['fecha'], 'safe'],
            [['ts', 'temp_out', 'hum_out', 'et', 'solar_rad', 'wind_speed'], 'number'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lectura::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_estacion' => $this->id_estacion,
            'id_variable' => $this->id_variable,
            'valor' => $this->valor,
           // 'station_id' => $this->station_id,
            'ts' => $this->ts,
            'temp_out' => $this->temp_out,
            'hum_out' => $this->hum_out,
            'et' => $this->et,
            'solar_rad' => $this->solar_rad,
            'wind_speed' => $this->wind_speed,
        ]);

        $query->andFilterWhere(['like', 'fecha', $this->fecha])
          //  ->andFilterWhere(['like', 'date', $this->date])
            ;

        return $dataProvider;
    }
}
