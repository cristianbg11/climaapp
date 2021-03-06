<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CultivoFinca;

/**
 * frontend\models\CultivoFincaSearch represents the model behind the search form about `frontend\models\CultivoFinca`.
 */
 class CultivoFincaSearch extends CultivoFinca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_finca', 'id_cultivo', 'tam_tareas'], 'integer'],
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
        $query = CultivoFinca::find();

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
            'id_finca' => $this->id_finca,
            'id_cultivo' => $this->id_cultivo,
            'tam_tareas' => $this->tam_tareas,
        ]);

        return $dataProvider;
    }
}
