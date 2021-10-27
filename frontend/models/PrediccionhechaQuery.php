<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Prediccionhecha]].
 *
 * @see Prediccionhecha
 */
class PrediccionhechaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Prediccionhecha[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Prediccionhecha|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
