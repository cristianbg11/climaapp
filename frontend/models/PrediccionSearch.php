<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Prediccion;

/**
 * frontend\models\PrediccionSearch represents the model behind the search form about `frontend\models\Prediccion`.
 */
 class PrediccionSearch extends Prediccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_variable', 'id_cultivo'], 'integer'],
            [['fecha', 'fecha_estimada'], 'safe'],
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
        $query = Prediccion::find();

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
            'id_variable' => $this->id_variable,
            'calculo_estimado' => $this->calculo_estimado,
            'id_cultivo' => $this->id_cultivo,
        ]);

        $query->andFilterWhere(['like', 'fecha', $this->fecha])
            ->andFilterWhere(['like', 'fecha_estimada', $this->fecha_estimada]);

        return $dataProvider;
    }
}
