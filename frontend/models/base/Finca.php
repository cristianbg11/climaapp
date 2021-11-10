<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "finca".
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Localidad
 * @property integer $id_productor
 * @property string $latitud
 * @property string $longitud
 *
 * @property \frontend\models\CultivoFinca[] $cultivoFincas
 * @property \frontend\models\Productor $productor
 */
class Finca extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'cultivoFincas',
            'productor'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_productor'], 'required'],
            [['id_productor'], 'integer'],
            [['Nombre', 'Localidad'], 'string', 'max' => 50],
            [['latitud', 'longitud'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finca';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Localidad' => Yii::t('app', 'Localidad'),
            'id_productor' => Yii::t('app', 'Id Productor'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivoFincas()
    {
        return $this->hasMany(\frontend\models\CultivoFinca::className(), ['id_finca' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductor()
    {
        return $this->hasOne(\frontend\models\Productor::className(), ['id' => 'id_productor']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\FincaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\FincaQuery(get_called_class());
    }
}
