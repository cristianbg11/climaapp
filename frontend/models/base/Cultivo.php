<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "cultivo".
 *
 * @property integer $id
 * @property string $Cultivo
 * @property double $Coeficiente
 */
class Cultivo extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cultivo', 'Coeficiente'], 'required'],
            [['Coeficiente','Desarrollo', 'Media', 'Maduracion','id_cultivo'], 'number'],
            [['Cultivo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cultivo';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Cultivo' => Yii::t('app', 'Cultivo'),
            'Coeficiente' => Yii::t('app', 'Coeficiente'),
        ];
    }


    /**
     * @inheritdoc
     * @return \frontend\models\CultivoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\CultivoQuery(get_called_class());
    }
}
