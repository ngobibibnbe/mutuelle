<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprunt".
 *
 * @property int $id
 * @property int $session_id
 * @property int $user_id
 * @property int $amount
 * @property double $percentage
 * @property int $delay
 * @property int $state
 * @property string $created_at
 * @property string $auth_key
 *
 * @property Session $session
 * @property User $user
 * @property Remboursement[] $remboursements
 */
class Emprunt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emprunt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'user_id', 'amount', 'delay', 'state'], 'integer'],
            [['user_id'], 'required'],
            [['percentage'], 'number'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 255],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Session::className(), 'targetAttribute' => ['session_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'id de la Session',
            'user_id' => "id de l'utilisateur",
            'amount' => 'montant',
            'percentage' => 'Pourcentage',
            'delay' => 'Delais',
            'state' => 'Etat',
            'created_at' => 'fait le',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(Session::className(), ['id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemboursements()
    {
        return $this->hasMany(Remboursement::className(), ['emprunt_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EmpruntQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpruntQuery(get_called_class());
    }
}
