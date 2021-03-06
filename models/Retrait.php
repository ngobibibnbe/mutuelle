<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retrait".
 *
 * @property int $id
 * @property int $session_id
 * @property int $user_id
 * @property int $money
 * @property int $state
 * @property string $created_at
 * @property string $auth_key
 *
 * @property Session $session
 * @property User $user
 */
class Retrait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retrait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'user_id', 'money', 'state'], 'integer'],
            [['user_id'], 'required'],
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
            'session_id' => 'ID de la Session',
            'user_id' => "Id de l'utilisateur",
            'money' => 'Montant',
            'state' => 'Etat',
            'created_at' => 'Fait le ',
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
     * {@inheritdoc}
     * @return RetraitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RetraitQuery(get_called_class());
    }
}
