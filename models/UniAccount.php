<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%uni_account}}".
 *
 * @property string $uniacid
 * @property integer $groupid
 * @property string $name
 * @property string $description
 * @property string $default_acid
 * @property integer $rank
 */
class UniAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%uni_account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupid', 'name', 'description', 'default_acid'], 'required'],
            [['groupid', 'default_acid', 'rank'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uniacid' => 'Uniacid',
            'groupid' => 'Groupid',
            'name' => 'Name',
            'description' => 'Description',
            'default_acid' => 'Default Acid',
            'rank' => 'Rank',
        ];
    }

    public function create($data)
    {
        foreach($data as $key => $item){
            $this->setAttribute($key, $item);
        }
        if(!$this->save()){
            Yii::error(json_encode($this->getErrors()),"xiaohei");
            return array('status' => 101);
        }else{
            return array('status' => 100, 'message' => $this->attributes['uniacid']);
        }
    }
}
