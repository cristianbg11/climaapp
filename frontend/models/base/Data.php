<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "data".
 *
 * @property integer $id
 * @property string $Fecha
 * @property string $Tiempo
 * @property double $temp_out
 * @property double $Out_Hum
 * @property double $Wind_Speed
 * @property double $Solar_Rad
 * @property double $Msnm
 * @property double $ETP
 */
class Data extends \yii\db\ActiveRecord
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
            [['temp_out', 'Out_Hum', 'Wind_Speed', 'Solar_Rad', 'Msnm', 'ETP'], 'number'],
            [['Fecha'], 'string', 'max' => 80],
            [['Tiempo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Fecha' => Yii::t('app', 'Fecha'),
            'Tiempo' => Yii::t('app', 'Tiempo'),
            'temp_out' => Yii::t('app', 'Temp Out'),
            'Out_Hum' => Yii::t('app', 'Out Hum'),
            'Wind_Speed' => Yii::t('app', 'Wind Speed'),
            'Solar_Rad' => Yii::t('app', 'Solar Rad'),
            'Msnm' => Yii::t('app', 'Msnm'),
            'ETP' => Yii::t('app', 'Etp'),
        ];
    }


    /**
     * @inheritdoc
     * @return \frontend\models\DataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\DataQuery(get_called_class());
    }
}
