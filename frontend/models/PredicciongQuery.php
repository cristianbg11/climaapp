<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Predicciong]].
 *
 * @see Predicciong
 */
class PredicciongQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Predicciong[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Predicciong|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
