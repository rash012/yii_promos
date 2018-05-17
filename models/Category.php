<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
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
            'description' => 'Description',
        ];
    }

    public function getPromos()
    {
        return $this->hasMany(Category::className(), ['id' => 'promo_id'])->viaTable('promo_category', ['category_id'=>'id']);
    }

    public static function getAvailableCategories()
    {
        $categories = self::find()->asArray()->all();
        $items = ArrayHelper::map($categories, 'id', 'title');
        return $items;
    }
}
