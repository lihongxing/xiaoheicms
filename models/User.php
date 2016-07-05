<?php

namespace app\models;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    
    public static function tableName()
    {
        return '{{%user}}';
    }
    
    public static function findIdentity($id) {
        $user = self::findById($id);
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        $user = User::find()->where(array('accessToken' => $token))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public static function findByUsername($username) {
        $admin = User::find()->where(array('username' => $username))->asArray()->one();
        if ($admin) {
            return new static($admin);
        }
        return null;
    }

    public static function findById($id) {
        $user = User::find()->where(array('id' => $id))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
