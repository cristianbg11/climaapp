<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Cultivo]].
 *
 * @see Cultivo
 */
class CultivoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Cultivo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cultivo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
