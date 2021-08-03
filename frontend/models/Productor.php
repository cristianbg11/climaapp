<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Productor as BaseProductor;

/**
 * This is the model class for table "productor".
 */
class Productor extends BaseProductor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre'], 'string', 'max' => 50]
        ]);
    }
	
}
