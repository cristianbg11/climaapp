<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Prediccionhecha as BasePrediccionhecha;

/**
 * This is the model class for table "prediccionhecha".
 */
class Prediccionhecha extends BasePrediccionhecha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['temp_out', 'hum_out', 'solar_rad', 'wind_speed', 'etp', 'id_estacion', 'id_user'], 'integer'],
            [['fecha', 'fecha_estimada_inicial', 'fecha_estimada_final'], 'safe']
        ]);
    }
	
}
