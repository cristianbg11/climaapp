<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Data;

/**
 * frontend\models\DataSearch represents the model behind the search form about `frontend\models\Data`.
 */
 class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Fecha', 'Tiempo'], 'safe'],
            [['temp_out', 'Out_Hum', 'Wind_Speed', 'Solar_Rad', 'Msnm', 'ETP'], 'number'],
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
        $query = Data::find();

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
            'Out_Hum' => $this->Out_Hum,
            'Wind_Speed' => $this->Wind_Speed,
            'Solar_Rad' => $this->Solar_Rad,
            'Msnm' => $this->Msnm,
            'ETP' => $this->ETP,
        ]);

        $query->andFilterWhere(['like', 'Fecha', $this->Fecha])
            ->andFilterWhere(['like', 'Tiempo', $this->Tiempo]);

        return $dataProvider;
    }
}
