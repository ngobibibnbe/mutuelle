<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remboursement".
 *
 * @property int $id
 * @property int $session_id
 * @property int $emprunt_id
 * @property int $tranche
 * @property int $state
 * @property string $created_at
 * @property string $auth_key
 *
 * @property Gains[] $gains
 * @property Emprunt $emprunt
 * @property Session $session
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
            [['session_id', 'emprunt_id', 'tranche', 'state'], 'integer'],
            [['emprunt_id'], 'required'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 255],
            [['emprunt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Emprunt::className(), 'targetAttribute' => ['emprunt_id' => 'id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Session::className(), 'targetAttribute' => ['session_id' => 'id']],
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
            'tranche' => 'Tranche',
            'state' => 'State',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGains()
    {
        return $this->hasMany(Gains::className(), ['remboursement_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprunt()
    {
        return $this->hasOne(Emprunt::className(), ['id' => 'emprunt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(Session::className(), ['id' => 'session_id']);
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
