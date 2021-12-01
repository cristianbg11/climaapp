<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "prediccionhecha".
 *
 * @property integer $id
 * @property double $temp_out
 * @property double $hum_out
 * @property double $solar_rad
 * @property double $wind_speed
 * @property double $etp
 * @property string $fecha
 * @property string $fecha_estimada_inicial
 * @property string $fecha_estimada_final
 * @property integer $id_estacion
 * @property integer $id_user
 * @property integer $idprec
 *
 * @property \frontend\models\Notificacion[] $notificacions
 * @property \frontend\models\Planificacion[] $planificacions
 * @property \frontend\models\PrediccionG[] $prediccionGs
 * @property \frontend\models\Estacion $estacion
 * @property \frontend\models\User $user
 * @property \frontend\models\PrediccionG $prec
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
            'notificacions',
            'planificacions',
            'prediccionGs',
            'estacion',
            'user',
            'prec'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['temp_out', 'hum_out', 'solar_rad', 'wind_speed', 'etp','rain'], 'number'],
            [['fecha', 'fecha_estimada_inicial', 'fecha_estimada_final'], 'safe'],
            [['id_estacion', 'id_user', 'idprec'], 'integer'],
         /*   [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']*/
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
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
   /* public function optimisticLock() {
        return 'lock';
    }**/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'temp_out' => 'Temp Out',
            'hum_out' => 'Hum Out',
            'solar_rad' => 'Solar Rad',
            'wind_speed' => 'Wind Speed',
            'etp' => 'Etp',
            'fecha' => 'Fecha',
            'fecha_estimada_inicial' => 'Fecha Estimada Inicial',
            'fecha_estimada_final' => 'Fecha Estimada Final',
            'id_estacion' => 'Id Estacion',
            'id_user' => 'Id User',
            'idprec' => 'Idprec',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacions()
    {
        return $this->hasMany(\frontend\models\Notificacion::className(), ['id_prediccion' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanificacions()
    {
        return $this->hasMany(\frontend\models\Planificacion::className(), ['id_prediccion' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrediccionGs()
    {
        return $this->hasMany(\frontend\models\PrediccionG::className(), ['id_det' => 'id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getPrec()
    {
        return $this->hasOne(\frontend\models\PrediccionG::className(), ['id' => 'idprec']);
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
