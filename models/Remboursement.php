<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remboursement".
 *
 * @property int $id
 * @property int $session_id
 * @property int $emprunt_id
 * @property double $amount
 * @property int $tranche
 * @property string $created_at
 * @property string $auth_key
 */
class Remboursement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'remboursement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'emprunt_id', 'tranche'], 'integer'],
            [['emprunt_id', 'amount'], 'required'],
            [['amount'], 'number'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'Session ID',
            'emprunt_id' => 'Emprunt ID',
            'amount' => 'Amount',
            'tranche' => 'Tranche',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RemboursementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RemboursementQuery(get_called_class());
    }
}
