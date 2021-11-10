<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "notificaion".
 *
 * @property integer $id
 * @property integer $id_estacion
 * @property integer $id_finca
 * @property integer $id_prediccion
 * @property integer $id_cultivo
 * @property integer $densidad
 * @property string $mensaje
 *
 * @property \frontend\models\Cultivo $cultivo
 * @property \frontend\models\Estacion $estacion
 * @property \frontend\models\Finca $finca
 * @property \frontend\models\Prediccionhecha $prediccion
 */
class Notificacion extends \yii\db\ActiveRecord
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
            'estacion',
            'finca',
            'prediccion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estacion', 'id_finca', 'id_prediccion', 'id_cultivo', 'densidad'], 'integer'],
            [['mensaje'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificaion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_estacion' => Yii::t('app', 'Id Estacion'),
            'id_finca' => Yii::t('app', 'Id Finca'),
            'id_prediccion' => Yii::t('app', 'Id Prediccion'),
            'id_cultivo' => Yii::t('app', 'Id Cultivo'),
            'densidad' => Yii::t('app', 'Densidad'),
            'mensaje' => Yii::t('app', 'Mensaje'),
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
    public function getEstacion()
    {
        return $this->hasOne(\frontend\models\Estacion::className(), ['id' => 'id_estacion']);
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
     * @inheritdoc
     * @return \frontend\models\NotificacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\NotificacionQuery(get_called_class());
    }
}
