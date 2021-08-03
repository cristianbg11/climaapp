<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Finca as BaseFinca;

/**
 * This is the model class for table "finca".
 */
class Finca extends BaseFinca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_productor'], 'required'],
            [['id_productor'], 'integer'],
            [['Nombre', 'Localidad'], 'string', 'max' => 50]
        ]);
    }
	
}
