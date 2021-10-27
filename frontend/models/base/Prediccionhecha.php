<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "prediccionhecha".
 *
 * @property integer $id
 * @property integer $temp_out
 * @property integer $hum_out
 * @property integer $solar_rad
 * @property integer $wind_speed
 * @property integer $etp
 * @property string $fecha
 * @property string $fecha_estimada_inicial
 * @property string $fecha_estimada_final
 * @property integer $id_estacion
 * @property integer $id_user
 *
 * @property \frontend\models\Estacion $estacion
 * @property \frontend\models\User $user
 */
class Prediccionhecha extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'estacion',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['temp_out', 'hum_out', 'solar_rad', 'wind_speed', 'etp', 'id_estacion', 'id_user'], 'integer'],
            [['fecha', 'fecha_estimada_inicial', 'fecha_estimada_final'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prediccionhecha';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'temp_out' => Yii::t('app', 'Temp Out'),
            'hum_out' => Yii::t('app', 'Hum Out'),
            'solar_rad' => Yii::t('app', 'Solar Rad'),
            'wind_speed' => Yii::t('app', 'Wind Speed'),
            'etp' => Yii::t('app', 'Etp'),
            'fecha' => Yii::t('app', 'Fecha'),
            'fecha_estimada_inicial' => Yii::t('app', 'Fecha Estimada Inicial'),
            'fecha_estimada_final' => Yii::t('app', 'Fecha Estimada Final'),
            'id_estacion' => Yii::t('app', 'Id Estacion'),
            'id_user' => Yii::t('app', 'Id User'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstacion()
    {
        return $this->hasOne(\frontend\models\Estacion::className(), ['id' => 'id_estacion']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\frontend\models\User::className(), ['id' => 'id_user']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\PrediccionhechaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\PrediccionhechaQuery(get_called_class());
    }
}
