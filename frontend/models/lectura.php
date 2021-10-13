<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Lectura as BaseLectura;

/**
 * This is the model class for table "lectura".
 */
class Lectura extends BaseLectura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_estacion', 'id_variable', 'valor'], 'integer'],
            [['ts', 'temp_out', 'hum_out', 'et', 'solar_rad', 'wind_speed'], 'required'],
            [['ts', 'temp_out', 'hum_out', 'et', 'solar_rad', 'wind_speed'], 'number'],
            [['fecha'], 'string', 'max' => 80]
        ]);
    }
	
}
