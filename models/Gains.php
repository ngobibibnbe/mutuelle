<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gains".
 *
 * @property int $id
 * @property int $remboursement_id
 * @property int $getter_id
 * @property double $gain
 * @property string $created_at
 * @property string $auth_key
 *
 * @property Remboursement $remboursement
 * @property User $getter
 */
class Gains extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gains';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remboursement_id', 'getter_id'], 'integer'],
            [['getter_id'], 'required'],
            [['gain'], 'number'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 255],
            [['remboursement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Remboursement::className(), 'targetAttribute' => ['remboursement_id' => 'id']],
            [['getter_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['getter_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'remboursement_id' => 'id du remboursement',
            'getter_id' => 'id du gagnant',
            'gain' => 'Gain',
            'created_at' => 'Fait le ',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemboursement()
    {
        return $this->hasOne(Remboursement::className(), ['id' => 'remboursement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGetter()
    {
        return $this->hasOne(User::className(), ['id' => 'getter_id']);
    }

    /**
     * {@inheritdoc}
     * @return GainsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GainsQuery(get_called_class());
    }
}
