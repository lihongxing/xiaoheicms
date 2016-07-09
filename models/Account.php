<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property string $acid
 * @property string $uniacid
 * @property string $hash
 * @property integer $type
 * @property integer $isconnect
 * @property integer $isdeleted
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniacid', 'hash', 'type', 'isconnect', 'isdeleted'], 'required'],
            [['uniacid', 'type', 'isconnect', 'isdeleted'], 'integer'],
            [['hash'], 'string', 'max' => 8]
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
            'hash' => 'Hash',
            'type' => 'Type',
            'isconnect' => 'Isconnect',
            'isdeleted' => 'Isdeleted',
        ];
    }

    /**
     * @method 添加方法
     * @param $data
     * @return array
     * @author lihongxing
     */
    function account_create($uniacid, $account)
    {
        $accountdata = array('uniacid' => $uniacid, 'type' => $account['type'], 'hash' => random(8));
        foreach ($accountdata as $key => $item) {
            $this->setAttribute($key, $item);
        }
        if (!$this->save()) {
            Yii::error(json_encode($this->getErrors()), "error");
        } else {
            $acid = $this->attributes['acid'];
        }
        $account['acid'] = $acid;
        $account['token'] = random(32);
        $account['encodingaeskey'] = random(43);
        $account['uniacid'] = $uniacid;
        unset($account['type']);
        $accountWechatsModel = new AccountWechats();
        $result = $accountWechatsModel->create($account);
        return $result['message'];
    }
}
