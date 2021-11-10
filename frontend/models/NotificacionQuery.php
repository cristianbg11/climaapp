<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Notificacion]].
 *
 * @see Notificacion
 */
class NotificacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Notificacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Notificacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
