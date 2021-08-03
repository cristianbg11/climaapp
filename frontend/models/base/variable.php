<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "variable".
 *
 * @property integer $id
 * @property string $Nombre
 *
 * @property \frontend\models\Lectura[] $lecturas
 * @property \frontend\models\Prediccion[] $prediccions
 */
class variable extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'lecturas',
            'prediccions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variable';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecturas()
    {
        return $this->hasMany(\frontend\models\Lectura::className(), ['id_variable' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrediccions()
    {
        return $this->hasMany(\frontend\models\Prediccion::className(), ['id_variable' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\variableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\variableQuery(get_called_class());
    }
}
