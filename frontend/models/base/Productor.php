<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "productor".
 *
 * @property integer $id
 * @property string $Nombre
 *
 * @property \frontend\models\Finca[] $fincas
 */
class Productor extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'fincas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productor';
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
    public function getFincas()
    {
        return $this->hasMany(\frontend\models\Finca::className(), ['id_productor' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\ProductorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\ProductorQuery(get_called_class());
    }
}
