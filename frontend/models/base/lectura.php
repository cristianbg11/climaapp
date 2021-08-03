<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "lectura".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_estaciones
 * @property integer $id_variable
 * @property integer $valor
 *
 * @property \frontend\models\Variable $variable
 * @property \frontend\models\Estacion $estaciones
 */
class lectura extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'variable',
            'estaciones'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estaciones', 'id_variable', 'valor'], 'integer'],
            [['fecha'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lectura';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'id_estaciones' => Yii::t('app', 'Id Estaciones'),
            'id_variable' => Yii::t('app', 'Id Variable'),
            'valor' => Yii::t('app', 'Valor'),
        ];
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
    public function getEstaciones()
    {
        return $this->hasOne(\frontend\models\Estacion::className(), ['id' => 'id_estaciones']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\lecturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\lecturaQuery(get_called_class());
    }
}
