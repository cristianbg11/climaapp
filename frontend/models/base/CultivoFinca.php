<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "cultivo_finca".
 *
 * @property integer $id
 * @property integer $id_finca
 * @property integer $id_cultivo
 * @property integer $tam_tareas
 *
 * @property \frontend\models\Cultivo $cultivo
 * @property \frontend\models\Finca $finca
 */
class CultivoFinca extends \yii\db\ActiveRecord
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
            'finca'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_finca', 'id_cultivo', 'tam_tareas'], 'required'],
            [['id_finca', 'id_cultivo', 'tam_tareas'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cultivo_finca';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_finca' => Yii::t('app', 'Id Finca'),
            'id_cultivo' => Yii::t('app', 'Id Cultivo'),
            'tam_tareas' => Yii::t('app', 'Tam Tareas'),
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
     * @inheritdoc
     * @return \frontend\models\CultivoFincaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\CultivoFincaQuery(get_called_class());
    }
}
