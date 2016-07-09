<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%site_multi}}".
 *
 * @property string $id
 * @property string $uniacid
 * @property string $title
 * @property string $styleid
 * @property string $site_info
 * @property string $quickmenu
 * @property integer $status
 * @property string $bindhost
 */
class SiteMulti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%site_multi}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniacid', 'title', 'styleid', 'site_info', 'quickmenu', 'bindhost'], 'required'],
            [['uniacid', 'styleid', 'status'], 'integer'],
            [['site_info'], 'string'],
            [['title'], 'string', 'max' => 30],
            [['quickmenu'], 'string', 'max' => 2000],
            [['bindhost'], 'string', 'max' => 255]
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
            'title' => 'Title',
            'styleid' => 'Styleid',
            'site_info' => 'Site Info',
            'quickmenu' => 'Quickmenu',
            'status' => 'Status',
            'bindhost' => 'Bindhost',
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
            return array('status' => 100, 'message' => $this->attributes['id']);
        }
    }
}
