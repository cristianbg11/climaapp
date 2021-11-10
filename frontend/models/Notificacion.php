<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Notificacion as BaseNotificacion;

/**
 * This is the model class for table "notificaion".
 */
class Notificacion extends BaseNotificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_estacion', 'id_finca', 'id_prediccion', 'id_cultivo', 'densidad'], 'integer'],
            [['mensaje'], 'string', 'max' => 250]
        ]);
    }
	
}
