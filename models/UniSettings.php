<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%uni_settings}}".
 *
 * @property string $uniacid
 * @property string $passport
 * @property string $oauth
 * @property string $uc
 * @property string $notify
 * @property string $creditnames
 * @property string $creditbehaviors
 * @property string $welcome
 * @property string $default
 * @property string $default_message
 * @property string $shortcuts
 * @property string $payment
 * @property string $groupdata
 * @property string $stat
 * @property string $bootstrap
 * @property string $menuset
 * @property string $default_site
 * @property string $sync
 * @property string $jsauth_acid
 * @property string $recharge
 * @property string $tplnotice
 * @property integer $grouplevel
 */
class UniSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%uni_settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniacid', 'uc', 'groupdata', 'stat', 'bootstrap', 'menuset', 'sync', 'jsauth_acid', 'recharge', 'tplnotice', 'grouplevel'], 'required'],
            [['uniacid', 'default_site', 'jsauth_acid', 'grouplevel'], 'integer'],
            [['menuset'], 'string'],
            [['passport'], 'string', 'max' => 200],
            [['oauth', 'groupdata', 'sync'], 'string', 'max' => 100],
            [['uc', 'creditnames', 'creditbehaviors', 'recharge'], 'string', 'max' => 500],
            [['notify', 'payment'], 'string', 'max' => 2000],
            [['welcome', 'default'], 'string', 'max' => 60],
            [['default_message', 'tplnotice'], 'string', 'max' => 1000],
            [['shortcuts'], 'string', 'max' => 5000],
            [['stat'], 'string', 'max' => 300],
            [['bootstrap'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uniacid' => 'Uniacid',
            'passport' => 'Passport',
            'oauth' => 'Oauth',
            'uc' => 'Uc',
            'notify' => 'Notify',
            'creditnames' => 'Creditnames',
            'creditbehaviors' => 'Creditbehaviors',
            'welcome' => 'Welcome',
            'default' => 'Default',
            'default_message' => 'Default Message',
            'shortcuts' => 'Shortcuts',
            'payment' => 'Payment',
            'groupdata' => 'Groupdata',
            'stat' => 'Stat',
            'bootstrap' => 'Bootstrap',
            'menuset' => 'Menuset',
            'default_site' => 'Default Site',
            'sync' => 'Sync',
            'jsauth_acid' => 'Jsauth Acid',
            'recharge' => 'Recharge',
            'tplnotice' => 'Tplnotice',
            'grouplevel' => 'Grouplevel',
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
            return array('status' => 100, 'message' => $this->attributes['Uniacid']);
        }
    }
}
