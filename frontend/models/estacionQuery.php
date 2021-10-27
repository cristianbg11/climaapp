<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Estacion]].
 *
 * @see Estacion
 */
class EstacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Estacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Estacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
