<?php

namespace krok\page\models;

use Yii;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $language
 *
 * @property Language $language0
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 128],
            [['text'], 'string'],
            [['description', 'keywords'], 'string', 'max' => 256],
            [['language'], 'string', 'max' => 8],
            [['name', 'title'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('page', 'ID'),
            'name' => Yii::t('page', 'Name'),
            'title' => Yii::t('page', 'Title'),
            'text' => Yii::t('page', 'Text'),
            'description' => Yii::t('page', 'Description'),
            'keywords' => Yii::t('page', 'Keywords'),
            'language' => Yii::t('page', 'Language'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['iso' => 'language']);
    }
}
