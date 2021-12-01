<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "planificacion".
 *
 * @property integer $id
 * @property integer $id_finca
 * @property string $fecha
 * @property integer $cant_agua
 * @property integer $agua_pendiente
 * @property integer $agua_total
 * @property integer $id_prediccion
 * @property integer $id_cultivo
 * @property integer $id_user
 *
 * @property \frontend\models\Cultivo $cultivo
 * @property \frontend\models\Finca $finca
 * @property \frontend\models\Prediccionhecha $prediccion
 * @property \frontend\models\User $user
 */
class Planificacion extends \yii\db\ActiveRecord
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
            'prediccion',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_finca', 'id_prediccion', 'id_cultivo', 'id_user'], 'integer'],
            [['aguapend_media','aguapend_maduracion','aguapend_desarrollo','cant_agua', 'agua_pendiente', 'agua_total'],'number'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planificacion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_finca' => Yii::t('app', 'Id Finca'),
            'fecha' => Yii::t('app', 'Fecha'),
            'cant_agua' => Yii::t('app', 'Cant Agua'),
            'agua_pendiente' => Yii::t('app', 'Agua Pendiente'),
            'agua_total' => Yii::t('app', 'Agua Total'),
            'id_prediccion' => Yii::t('app', 'Id Prediccion'),
            'id_cultivo' => Yii::t('app', 'Id Cultivo'),
            'id_user' => Yii::t('app', 'Id User'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivo()
    {
        return $this->hasOne(\frontend\models\Cultivo::className(), ['id' => 'id_cultivo']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinca()
    {
        return $this->hasOne(\frontend\models\Finca::className(), ['id' => 'id_finca']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrediccion()
    {
        return $this->hasOne(\frontend\models\Prediccionhecha::className(), ['id' => 'id_prediccion']);
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
     * @return \frontend\models\PlanificacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\PlanificacionQuery(get_called_class());
    }
}
