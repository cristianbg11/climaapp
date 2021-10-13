<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\CultivoFinca as BaseCultivoFinca;

/**
 * This is the model class for table "cultivo_finca".
 */
class CultivoFinca extends BaseCultivoFinca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_finca', 'id_cultivo', 'tam_tareas'], 'required'],
            [['id_finca', 'id_cultivo', 'tam_tareas'], 'integer']
        ]);
    }
	
}
