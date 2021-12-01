<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Planificacion as BasePlanificacion;

/**
 * This is the model class for table "planificacion".
 */
class Planificacion extends BasePlanificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_finca', 'id_prediccion', 'id_cultivo', 'id_user'], 'integer'],
            [['aguapend_media','aguapend_maduracion','aguapend_desarrollo','cant_agua', 'agua_pendiente', 'agua_total'],'number'],
            [['fecha'], 'safe']
        ]);
    }
	
}
