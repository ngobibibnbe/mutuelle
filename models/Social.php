<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property int $user_id
 * @property int $money
 * @property int $description
 * @property string $created_at
 * @property string $auth_key
 *
 * @property User $user
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'money', 'description'], 'integer'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
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
            'user_id' => 'User ID',
            'money' => 'Money',
            'description' => 'Description',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
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
     * @return SocialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SocialQuery(get_called_class());
    }
}
