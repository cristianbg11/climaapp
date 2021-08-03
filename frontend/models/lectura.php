<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\lectura as Baselectura;

/**
 * This is the model class for table "lectura".
 */
class lectura extends Baselectura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_estaciones', 'id_variable', 'valor'], 'integer'],
            [['fecha'], 'string', 'max' => 80]
        ]);
    }
	
}
