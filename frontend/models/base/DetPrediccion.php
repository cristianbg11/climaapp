<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the base model class for table "det_prediccion".
 *
 * @property integer $id
 * @property string $fecha
 * @property double $calculo_estimado
 * @property integer $id_prediccion
 *
 * @property \frontend\models\Prediccion $prediccion
 */
class DetPrediccion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'prediccion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'calculo_estimado', 'id_prediccion'], 'required'],
            [['fecha'], 'safe'],
            [['calculo_estimado'], 'number'],
            [['id_prediccion'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'det_prediccion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'calculo_estimado' => Yii::t('app', 'Calculo Estimado'),
            'id_prediccion' => Yii::t('app', 'Id Prediccion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrediccion()
    {
        return $this->hasOne(\frontend\models\Prediccion::className(), ['id' => 'id_prediccion']);
    }
    

    /**
     * @inheritdoc
     * @return \frontend\models\DetPrediccionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\DetPrediccionQuery(get_called_class());
    }
}
