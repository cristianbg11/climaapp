<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Data as BaseData;

/**
 * This is the model class for table "data".
 */
class Data extends BaseData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['temp_out', 'Out_Hum', 'Wind_Speed', 'Solar_Rad', 'Msnm', 'ETP'], 'number'],
            [['Fecha'], 'string', 'max' => 80],
            [['Tiempo'], 'string', 'max' => 50]
        ]);
    }
	
}
