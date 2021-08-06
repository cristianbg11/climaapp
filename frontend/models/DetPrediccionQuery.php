<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[DetPrediccion]].
 *
 * @see DetPrediccion
 */
class DetPrediccionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DetPrediccion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DetPrediccion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
