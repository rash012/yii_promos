<?php

use yii\db\Migration;

/**
 * Class m180516_115351_create_table_promo
 */
class m180516_115351_create_table_promo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promo', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promo');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180516_115351_create_table_promos cannot be reverted.\n";

        return false;
    }
    */
}
