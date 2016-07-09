<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%site_styles}}".
 *
 * @property string $id
 * @property string $uniacid
 * @property string $templateid
 * @property string $name
 */
class SiteStyles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%site_styles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniacid', 'templateid', 'name'], 'required'],
            [['uniacid', 'templateid'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uniacid' => 'Uniacid',
            'templateid' => 'Templateid',
            'name' => 'Name',
        ];
    }

    /**
     * 添加方法
     * @param $data
     * @return array
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
            return array('status' => 100, 'message' => $this->attributes['id']);
        }
    }
}
