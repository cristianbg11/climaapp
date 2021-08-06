<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\DetPrediccion as BaseDetPrediccion;

/**
 * This is the model class for table "det_prediccion".
 */
class DetPrediccion extends BaseDetPrediccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['fecha', 'calculo_estimado', 'id_prediccion'], 'required'],
            [['fecha'], 'safe'],
            [['calculo_estimado'], 'number'],
            [['id_prediccion'], 'integer']
        ]);
    }
	
}
