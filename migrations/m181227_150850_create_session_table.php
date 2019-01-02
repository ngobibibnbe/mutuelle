<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `session`.
 */
class m181227_150850_create_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('session', [
            'id' => $this->primaryKey(),
            'date' => $this->timestamp()->defaultValue(new Expression('now()')),
            'state' => $this->tinyInteger()->defaultValue(0), //0 waiting,1 undo,2 done;

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('session');
    }
}
