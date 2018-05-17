<?php
/**
 * Created by PhpStorm.
 * User: Rash
 * Date: 16.05.2018
 * Time: 17:35
 */

namespace app\models;

use yii\helpers\ArrayHelper;


class PromoWithCategories extends Promo
{
    public $category_ids = [];

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_ids' => 'Categories',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['category_ids', 'safe'],
        ]);
    }

    public function loadCategories()
    {
        $this->category_ids = [];
        if (!empty($this->id)) {
            $rows = PromoCategory::find()
                ->select(['category_id'])
                ->where(['promo_id' => $this->id])
                ->asArray()
                ->all();
            foreach ($rows as $row) {
                $this->category_ids[] = $row['category_id'];
            }
        }
    }

    public function saveCategories()
    {
        PromoCategory::deleteAll(['promo_id' => $this->id]);
        if (is_array($this->category_ids)) {
            foreach ($this->category_ids as $category_id) {
                $pc = new PromoCategory();
                $pc->promo_id = $this->id;
                $pc->category_id = $category_id;
                $pc->save();
            }
        }
    }
}