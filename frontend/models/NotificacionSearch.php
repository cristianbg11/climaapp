<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Notificacion;

/**
 * frontend\models\NotificacionSearch represents the model behind the search form about `frontend\models\Notificacion`.
 */
 class NotificacionSearch extends Notificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_estacion', 'id_finca', 'id_prediccion', 'id_cultivo', 'densidad'], 'integer'],
            [['mensaje'], 'safe'],
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
        $query = Notificacion::find();

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
            'id_finca' => $this->id_finca,
            'id_prediccion' => $this->id_prediccion,
            'id_cultivo' => $this->id_cultivo,
            'densidad' => $this->densidad,
        ]);

        $query->andFilterWhere(['like', 'mensaje', $this->mensaje]);

        return $dataProvider;
    }
}
