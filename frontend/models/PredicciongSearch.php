<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Predicciong;

/**
 * frontend\models\PredicciongSearch represents the model behind the search form about `frontend\models\Predicciong`.
 */
 class PredicciongSearch extends Predicciong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_estacion', 'id_user'], 'integer'],
            [['fecha_ini', 'fecha_fin', 'fecha'], 'safe'],
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
        $query = Predicciong::find();

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
            'fecha_ini' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
            'fecha' => $this->fecha,
            'id_estacion' => $this->id_estacion,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
