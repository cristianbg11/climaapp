<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Prediccion as BasePrediccion;

/**
 * This is the model class for table "prediccion".
 */
class Prediccion extends BasePrediccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_variable', 'id_cultivo'], 'integer'],
            [['calculo_estimado'], 'number'],
            [['fecha', 'fecha_estimada'], 'string', 'max' => 80]
        ]);
    }
	
}
