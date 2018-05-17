<?php
/**
 * Created by PhpStorm.
 * User: Rash
 * Date: 16.05.2018
 * Time: 22:51
 */

namespace app\modules\admin\views\promo\helpers;


class PromoHelper
{
    public static function getCategoriesString($model){
        $categories = '';
        foreach ($model->categories as $category){
            $categories .= $category->title . ', ';
        }
        $categories = substr($categories,0,-2);
        return $categories;
    }
}