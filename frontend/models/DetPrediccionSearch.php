<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\DetPrediccion;

/**
 * frontend\models\DetPrediccionSearch represents the model behind the search form about `frontend\models\DetPrediccion`.
 */
 class DetPrediccionSearch extends DetPrediccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_prediccion'], 'integer'],
            [['fecha'], 'safe'],
            [['calculo_estimado'], 'number'],
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
        $query = DetPrediccion::find();

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
            'fecha' => $this->fecha,
            'calculo_estimado' => $this->calculo_estimado,
            'id_prediccion' => $this->id_prediccion,
        ]);

        return $dataProvider;
    }
}
