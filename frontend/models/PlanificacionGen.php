<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\PlanificacionGen as BasePlanificacionGen;

/**
 * This is the model class for table "planificacion_gen".
 */
class PlanificacionGen extends BasePlanificacionGen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['fecha', 'idprec', 'idfinca', 'idcultivo'], 'required'],
            [['fecha'], 'safe'],
            [['idprec', 'idfinca', 'idcultivo'], 'integer']
        ]);
    }
	
}
