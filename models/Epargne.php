<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "epargne".
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
class Epargne extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'epargne';
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
            'session_id' => 'Session ID',
            'user_id' => 'User ID',
            'money' => 'Money',
            'state' => 'State',
            'created_at' => 'Created At',
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
     * @return EpargneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EpargneQuery(get_called_class());
    }
}
