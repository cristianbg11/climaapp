<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "planificacion_gen".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $idprec
 * @property integer $idfinca
 * @property integer $idcultivo
 *
 * @property \frontend\models\Cultivo $cultivo
 * @property \frontend\models\Finca $finca
 * @property \frontend\models\PrediccionG $prec
 */
class PlanificacionGen extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'cultivo',
            'finca',
            'prec'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'idprec', 'idfinca', 'idcultivo'], 'required'],
            [['fecha'], 'safe'],
            [['idprec', 'idfinca', 'idcultivo'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planificacion_gen';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'idprec' => 'Idprec',
            'idfinca' => 'Idfinca',
            'idcultivo' => 'Idcultivo',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivo()
    {
        return $this->hasOne(\frontend\models\Cultivo::className(), ['id' => 'idcultivo']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinca()
    {
        return $this->hasOne(\frontend\models\Finca::className(), ['id' => 'idfinca']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrec()
    {
        return $this->hasOne(\frontend\models\PrediccionG::className(), ['id' => 'idprec']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\PlanificacionGenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\PlanificacionGenQuery(get_called_class());
    }
}
