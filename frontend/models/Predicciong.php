<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Predicciong as BasePredicciong;

/**
 * This is the model class for table "prediccion_g".
 */
class Predicciong extends BasePredicciong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['fecha_ini', 'fecha_fin', 'fecha'], 'safe'],
            [['id_estacion', 'id_user'], 'integer']
        ]);
    }
	
}
