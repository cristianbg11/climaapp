<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[lectura]].
 *
 * @see lectura
 */
class lecturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return lectura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return lectura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
