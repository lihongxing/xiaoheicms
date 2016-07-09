<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%site_templates}}".
 *
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $author
 * @property string $url
 * @property string $type
 * @property string $sections
 * @property string $version
 */
class SiteTemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%site_templates}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'sections', 'version'], 'required'],
            [['sections'], 'integer'],
            [['name', 'title'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 500],
            [['author'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
            [['version'], 'string', 'max' => 64]
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
            'title' => 'Title',
            'description' => 'Description',
            'author' => 'Author',
            'url' => 'Url',
            'type' => 'Type',
            'sections' => 'Sections',
            'version' => 'Version',
        ];
    }
}
