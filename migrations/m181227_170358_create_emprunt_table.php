<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `emprunt`.
 */
class m181227_170358_create_emprunt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('emprunt', [
            'id' => $this->primaryKey(),
            "session_id" => $this->integer(),
            "user_id" => $this->integer()->notNull(),
            "amount" => $this->Float(),
            "percentage" => $this->float()->defaultValue(3),
            "delay" => $this->integer()->defaultValue(3),
            "states" => $this->integer()->defaultValue(0), //0 pour waittng;reject;accept;
            "state" => $this->tinyInteger()->defaultValue(0), //0 pour waittng;reject;accept;
            "created_at" => $this->dateTime()->defaultValue(new Expression('now()')), // date d'ajout dans la base de donnée
            "auth_key" => $this->string(),

        ]);

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-emprunt-user',
            'emprunt',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-emprunt-session',
            'emprunt',
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
        $this->dropTable('emprunt');
    }
}
