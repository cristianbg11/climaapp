<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Lectura]].
 *
 * @see Lectura
 */
class LecturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Lectura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lectura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
