<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[StationData]].
 *
 * @see StationData
 */
class StationDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return StationData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StationData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
