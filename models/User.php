<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property double $social_font
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $image
 * @property string $last_name
 * @property int $is_admin
 * @property int $is_active
 * @property string $created_at
 * @property string $auth_key
 *
 * @property Emprunt[] $emprunts
 * @property Epargne[] $epargnes
 * @property Gains[] $gains
 * @property Retrait[] $retraits
 * @property Social $social
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['social_font'], 'number'],
            [['username', 'email', 'password', 'first_name', 'last_name'], 'required'],
            [['is_admin', 'is_active'], 'boolean'],
            [['created_at'], 'safe'],
            [['username', 'email', 'password', 'first_name', 'last_name', 'auth_key', 'image'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'id' => 'ID',
            'social_font' => 'Social Font',
            'username' => "Nom d'Utilisateur",
            'email' => 'Email',
            'password' => 'Mot de Paasse',
            'first_name' => 'Prénom',
            'last_name' => 'Nom',
            'is_admin' => 'Admin',
            'is_active' => ' Actif',
            'created_at' => "Date d'ajout",
            'auth_key' => 'Auth Key',
            'image' => 'image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprunts()
    {
        return $this->hasMany(Emprunt::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpargnes()
    {
        return $this->hasMany(Epargne::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGains()
    {
        return $this->hasMany(Gains::className(), ['getter_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetraits()
    {
        return $this->hasMany(Retrait::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocial()
    {
        return $this->hasOne(Social::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    public function getis_admin()
    {
        return $this->is_admin;
    }
    public function getis_active()
    {
        return $this->is_active;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function getusername()
    {
        return $this->username;
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function setPassword($password)
    {
        $this->password = \Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
                'value' => function () {return date('Y-m-j G:i:s');}, // unix timestamp
            ],
            [
                'class' => \yii\behaviors\AttributeBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'password',
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'password',
                ],
                'value' => function ($event) {
                    return \Yii::$app->getSecurity()->generatePasswordHash($this->password);
                },
            ],
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
