<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "prediccion".
 *
 * @property integer $id
 * @property integer $id_variable
 * @property string $fecha
 * @property string $fecha_estimada
 * @property double $calculo_estimado
 * @property integer $id_cultivo
 *
 * @property \frontend\models\DetPrediccion[] $detPrediccions
 * @property \frontend\models\Variable $variable
 * @property \frontend\models\Cultivo $cultivo
 */
class Prediccion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'detPrediccions',
            'variable',
            'cultivo'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_variable', 'id_cultivo'], 'integer'],
            [['calculo_estimado'], 'number'],
            [['fecha', 'fecha_estimada'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prediccion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_variable' => Yii::t('app', 'Id Variable'),
            'fecha' => Yii::t('app', 'Fecha'),
            'fecha_estimada' => Yii::t('app', 'Fecha Estimada'),
            'calculo_estimado' => Yii::t('app', 'Calculo Estimado'),
            'id_cultivo' => Yii::t('app', 'Id Cultivo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetPrediccions()
    {
        return $this->hasMany(\frontend\models\DetPrediccion::className(), ['id_prediccion' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariable()
    {
        return $this->hasOne(\frontend\models\Variable::className(), ['id' => 'id_variable']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivo()
    {
        return $this->hasOne(\frontend\models\Cultivo::className(), ['id' => 'id_cultivo']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\PrediccionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\PrediccionQuery(get_called_class());
    }
}
