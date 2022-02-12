<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[PlanificacionGen]].
 *
 * @see PlanificacionGen
 */
class PlanificacionGenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PlanificacionGen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PlanificacionGen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
