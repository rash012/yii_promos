<?php

use yii\db\Migration;

/**
 * Class m180516_122935_create_table_promo_category
 */
class m180516_122935_create_table_promo_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promo_category', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'promo_id' => $this->integer(),
        ]);

        $this->createIndex('idx-category-id', 'promo_category', 'category_id');
        $this->createIndex('idx-promo-id', 'promo_category', 'promo_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promo_category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180516_122935_create_table_promo_categories cannot be reverted.\n";

        return false;
    }
    */
}
