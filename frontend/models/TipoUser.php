<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_user".
 *
 * @property int $id_tipo
 * @property string $Nombre
 *
 * @property User $tipo
 */
class TipoUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo', 'Nombre'], 'required'],
            [['id_tipo'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
            [['id_tipo'], 'unique'],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_tipo' => 'id_tipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(User::className(), ['id_tipo' => 'id_tipo']);
    }
}
