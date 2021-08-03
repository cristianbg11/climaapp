<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\variable as Basevariable;

/**
 * This is the model class for table "variable".
 */
class variable extends Basevariable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50]
        ]);
    }
	
}
