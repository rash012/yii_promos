<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promo_category".
 *
 * @property int $id
 * @property int $category_id
 * @property int $promo_id
 */
class PromoCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'promo_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'promo_id' => 'Promo ID',
        ];
    }
}
