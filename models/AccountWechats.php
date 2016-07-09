<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account_wechats}}".
 *
 * @property string $acid
 * @property string $uniacid
 * @property string $token
 * @property string $access_token
 * @property string $encodingaeskey
 * @property integer $level
 * @property string $name
 * @property string $account
 * @property string $original
 * @property string $signature
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $username
 * @property string $password
 * @property string $lastupdate
 * @property string $key
 * @property string $secret
 * @property string $styleid
 * @property string $subscribeurl
 * @property string $auth_refresh_token
 */
class AccountWechats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account_wechats}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acid', 'uniacid', 'token', 'access_token', 'encodingaeskey', 'level', 'name', 'account', 'original', 'signature', 'country', 'province', 'city', 'username', 'password', 'lastupdate', 'key', 'secret', 'styleid', 'subscribeurl', 'auth_refresh_token'], 'required'],
            [['acid', 'uniacid', 'level', 'lastupdate', 'styleid'], 'integer'],
            [['token', 'password'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 1000],
            [['encodingaeskey', 'auth_refresh_token'], 'string', 'max' => 255],
            [['name', 'account', 'username'], 'string', 'max' => 30],
            [['original', 'key', 'secret'], 'string', 'max' => 50],
            [['signature'], 'string', 'max' => 100],
            [['country'], 'string', 'max' => 10],
            [['province'], 'string', 'max' => 3],
            [['city'], 'string', 'max' => 15],
            [['subscribeurl'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acid' => 'Acid',
            'uniacid' => 'Uniacid',
            'token' => 'Token',
            'access_token' => 'Access Token',
            'encodingaeskey' => 'Encodingaeskey',
            'level' => 'Level',
            'name' => 'Name',
            'account' => 'Account',
            'original' => 'Original',
            'signature' => 'Signature',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'username' => 'Username',
            'password' => 'Password',
            'lastupdate' => 'Lastupdate',
            'key' => 'Key',
            'secret' => 'Secret',
            'styleid' => 'Styleid',
            'subscribeurl' => 'Subscribeurl',
            'auth_refresh_token' => 'Auth Refresh Token',
        ];
    }

    /**
     * @method 添加方法
     * @param $data
     * @return array
     * @author lihongxing
     */
    public function create($data)
    {
        foreach ($data as $key => $item) {
            $this->setAttribute($key, $item);
        }
        if (!$this->save()) {
            Yii::error(json_encode($this->getErrors()), "error");
            return array('status' => 101);
        } else {
            return array('status' => 100, 'message' => $this->attributes['acid']);
        }
    }
}
