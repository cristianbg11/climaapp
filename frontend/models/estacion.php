<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\estacion as Baseestacion;

/**
 * This is the model class for table "estacion".
 */
class estacion extends Baseestacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre', 'Ubicacion', 'Zona'], 'required'],
            [['Ubicacion'], 'string'],
            [['Nombre', 'Zona'], 'string', 'max' => 50],
            [['ciudad'], 'string', 'max' => 100],
            [['latitud', 'longitud'], 'string', 'max' => 250]
        ]);
    }
	
}
