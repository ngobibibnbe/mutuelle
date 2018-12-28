<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `retrait`.
 */
class m181227_171209_create_retrait_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('retrait', [
            'id' => $this->primaryKey(),
            "session_id"=>$this->integer(),
            "user_id"=>$this->integer()->notNull(),
            "money"=>$this->integer(),
            "state"=>$this->tinyInteger()->defaultValue(0),//0 pour waittng;reject;accept;
            "created_at"=>$this->dateTime()->defaultValue(new Expression('now()')),                               // date d'ajout dans la base de donnée
            "auth_key"=>$this->string(),

        ]);

      

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-retrait-user',
            'retrait',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-retrait-session',
            'retrait',
            'session_id',
            'session',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('retrait');
    }
}
