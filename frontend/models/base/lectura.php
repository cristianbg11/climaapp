<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "lectura".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_estacion
 * @property integer $id_variable
 * @property integer $valor
 * @property double $ts
 * @property double $temp_out
 * @property double $hum_out
 * @property double $et
 * @property double $solar_rad
 * @property double $wind_speed
 *
 * @property \frontend\models\Variable $variable
 * @property \frontend\models\Estacion $estacion
 */
class Lectura extends \yii\db\ActiveRecord
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
            'estacion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estacion', 'id_variable', 'valor'], 'integer'],
            [['ts', 'temp_out', 'hum_out', 'et', 'solar_rad', 'wind_speed'], 'required'],
            [['ts', 'temp_out', 'hum_out', 'et', 'solar_rad', 'wind_speed'], 'number'],
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
            'id_estacion' => Yii::t('app', 'Id Estacion'),
            'id_variable' => Yii::t('app', 'Id Variable'),
            'valor' => Yii::t('app', 'Valor'),
            'ts' => Yii::t('app', 'Ts'),
            'temp_out' => Yii::t('app', 'Temp Out'),
            'hum_out' => Yii::t('app', 'Hum Out'),
            'et' => Yii::t('app', 'Et'),
            'solar_rad' => Yii::t('app', 'Solar Rad'),
            'wind_speed' => Yii::t('app', 'Wind Speed'),
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
    public function getEstacion()
    {
        return $this->hasOne(\frontend\models\Estacion::className(), ['id' => 'id_estacion']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\LecturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\LecturaQuery(get_called_class());
    }
}
