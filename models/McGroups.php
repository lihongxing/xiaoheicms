<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mc_groups}}".
 *
 * @property integer $groupid
 * @property integer $uniacid
 * @property string $title
 * @property integer $orderlist
 * @property integer $isdefault
 * @property string $credit
 */
class McGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mc_groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniacid', 'orderlist', 'isdefault', 'credit'], 'integer'],
            [['credit'], 'required'],
            [['title'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'groupid' => 'Groupid',
            'uniacid' => 'Uniacid',
            'title' => 'Title',
            'orderlist' => 'Orderlist',
            'isdefault' => 'Isdefault',
            'credit' => 'Credit',
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
            return array('status' => 100, 'message' => $this->attributes['groupid']);
        }
    }
}
