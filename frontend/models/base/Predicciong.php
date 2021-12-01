<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "prediccion_g".
 *
 * @property integer $id
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property string $fecha
 * @property integer $id_estacion
 * @property integer $id_user
 *
 * @property \frontend\models\Estacion $estacion
 * @property \frontend\models\User $user
 * @property \frontend\models\Prediccionhecha[] $prediccionhechas
 */
class Predicciong extends \yii\db\ActiveRecord
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
            'user',
            'prediccionhechas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_ini', 'fecha_fin', 'fecha'], 'safe'],
            [['id_estacion', 'id_user'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prediccion_g';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_ini' => 'Fecha Ini',
            'fecha_fin' => 'Fecha Fin',
            'fecha' => 'Fecha',
            'id_estacion' => 'Id Estacion',
            'id_user' => 'Id User',
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
     * @return \yii\db\ActiveQuery
     */
    public function getPrediccionhechas()
    {
        return $this->hasMany(\frontend\models\Prediccionhecha::className(), ['idprec' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\PredicciongQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\PredicciongQuery(get_called_class());
    }
}
