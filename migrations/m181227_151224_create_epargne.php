<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181227_151224_create_epargne
 */
class m181227_151224_create_epargne extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("epargne", [
            "id" => $this->primaryKey(),
            "session_id" => $this->integer(),
            "user_id" => $this->integer()->notNull(),
            "money" => $this->integer(),
            "state" => $this->tinyInteger()->defaultValue(0), //0 pour waittng;accept;reject
            "created_at" => $this->dateTime()->defaultValue(new Expression('now()')), // date d'ajout dans la base de donnée
            "auth_key" => $this->string(),

        ]);

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-epargne-user',
            'epargne',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-epargne-session',
            'epargne',
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
        $this->dropTable('epargne');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m181227_151224_create_epargne cannot be reverted.\n";

return false;
}
 */
}
