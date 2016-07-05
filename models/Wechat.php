<?php

namespace app\models;
use Yii;

class Wechat extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $wechatname;
    public $password;
    public $authKey;
    public $accessToken;
    
    public static function tableName()
    {
        return '{{%wechat}}';
    }
    
    public static function findIdentity($id) {
        $wechat = self::findById($id);
        if ($wechat) {
            return new static($wechat);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        $wechat = Wechat::find()->where(array('accessToken' => $token))->asArray()->one();
        if ($wechat) {
            return new static($wechat);
        }
        return null;
    }

    public static function findByUsername($wechatname) {
        $wechat = Wechat::find()->where(array('username' => $wechatname))->asArray()->one();
        if ($wechat) {
            return new static($wechat);
        }
        return null;
    }

    public static function findById($id) {
        $wechat = Wechat::find()->where(array('id' => $id))->asArray()->one();
        if ($wechat) {
            return new static($wechat);
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
