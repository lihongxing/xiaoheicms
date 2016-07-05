<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%uni_group}}".
 *
 * @property string $id
 * @property string $name
 * @property string $modules
 * @property string $templates
 * @property string $uniacid
 */
class UniGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%uni_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'modules', 'templates', 'uniacid'], 'required'],
            [['uniacid'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['modules'], 'string', 'max' => 10000],
            [['templates'], 'string', 'max' => 5000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'modules' => 'Modules',
            'templates' => 'Templates',
            'uniacid' => 'Uniacid',
        ];
    }
}
