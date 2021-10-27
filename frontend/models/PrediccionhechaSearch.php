<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Prediccionhecha;

/**
 * frontend\models\PrediccionhechaSearch represents the model behind the search form about `frontend\models\Prediccionhecha`.
 */
 class PrediccionhechaSearch extends Prediccionhecha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'temp_out', 'hum_out', 'solar_rad', 'wind_speed', 'etp', 'id_estacion', 'id_user'], 'integer'],
            [['fecha', 'fecha_estimada_inicial', 'fecha_estimada_final'], 'safe'],
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
        $query = Prediccionhecha::find();

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
            'temp_out' => $this->temp_out,
            'hum_out' => $this->hum_out,
            'solar_rad' => $this->solar_rad,
            'wind_speed' => $this->wind_speed,
            'etp' => $this->etp,
            'fecha' => $this->fecha,
            'fecha_estimada_inicial' => $this->fecha_estimada_inicial,
            'fecha_estimada_final' => $this->fecha_estimada_final,
            'id_estacion' => $this->id_estacion,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
