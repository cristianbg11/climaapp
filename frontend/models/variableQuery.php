<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[variable]].
 *
 * @see variable
 */
class variableQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return variable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return variable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
