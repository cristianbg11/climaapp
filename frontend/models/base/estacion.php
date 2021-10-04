<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "estacion".
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $ciudad
 * @property string $latitud
 * @property string $longitud
 * @property string $Ubicacion
 * @property string $Zona
 *
 * @property \frontend\models\Lectura[] $lecturas
 */
class estacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'lecturas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Ubicacion', 'Zona'], 'required'],
            [['Ubicacion'], 'string'],
            [['Nombre', 'Zona'], 'string', 'max' => 50],
            [['ciudad'], 'string', 'max' => 100],
            [['latitud', 'longitud'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estacion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'ciudad' => Yii::t('app', 'Ciudad'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
            'Ubicacion' => Yii::t('app', 'Ubicacion'),
            'Zona' => Yii::t('app', 'Zona'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecturas()
    {
        return $this->hasMany(\frontend\models\Lectura::className(), ['id_estaciones' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\estacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\estacionQuery(get_called_class());
    }
}
