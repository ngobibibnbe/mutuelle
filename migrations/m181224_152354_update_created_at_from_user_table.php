<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m181224_152354_update_created_at_from_user_table
 */
class m181224_152354_update_created_at_from_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("user","created_at",
            $this->timestamp()->defaultValue(new Expression('now()')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181224_152354_update_created_at_from_user_table cannot be reverted.\n";
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_152354_update_created_at_from_user_table cannot be reverted.\n";

        return false;
    }
    */
}
