<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181231_112426_remboursement
 */
class m181231_112426_remboursement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('remboursement', [
            'id' => $this->primaryKey(),
            "session_id" => $this->integer(),
            "emprunt_id" => $this->integer()->notNull(),
            "tranche" => $this->integer()->defaultValue(0),
            "created_at" => $this->dateTime()->defaultValue(new Expression('now()')), // date d'ajout dans la base de donnée
            "auth_key" => $this->string(),

        ]);

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-remboursement-emprunt',
            'remboursement',
            'emprunt_id',
            'emprunt',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-remboursement-session',
            'remboursement',
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
        $this->dropTable('remboursement');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m181231_112426_remboursement cannot be reverted.\n";

return false;
}
 */
}
