<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Cultivo as BaseCultivo;

/**
 * This is the model class for table "cultivo".
 */
class Cultivo extends BaseCultivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Cultivo', 'Coeficiente'], 'required'],
            [['Coeficiente','id_cultivo'], 'number'],
            [['Cultivo'], 'string', 'max' => 50]
        ]);
    }
	
}
