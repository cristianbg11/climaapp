<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Planificacion;

/**
 * frontend\models\PlanificacionSearch represents the model behind the search form about `frontend\models\Planificacion`.
 */
 class PlanificacionSearch extends Planificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_finca', 'cant_agua', 'agua_pendiente', 'agua_total', 'id_prediccion', 'id_cultivo', 'id_user'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Planificacion::find();

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
            'fecha' => $this->fecha,
            'cant_agua' => $this->cant_agua,
            'agua_pendiente' => $this->agua_pendiente,
            'agua_total' => $this->agua_total,
            'id_prediccion' => $this->id_prediccion,
            'id_cultivo' => $this->id_cultivo,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
