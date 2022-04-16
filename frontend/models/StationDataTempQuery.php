<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[StationDataTemp]].
 *
 * @see StationDataTemp
 */
class StationDataTempQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return StationDataTemp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StationDataTemp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
