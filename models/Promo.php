<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promo".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $start_date
 * @property string $end_date
 */
class Promo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('promo_category', ['promo_id'=>'id']);
    }
}
