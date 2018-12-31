<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181231_112526_gains
 */
class m181231_112526_gains extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {$this->createTable('gains', [
        'id' => $this->primaryKey(),
        "remboursement_id" => $this->integer(),
        "getter_id" => $this->integer()->notNull(),
        "gain" => $this->float(),
        "created_at" => $this->dateTime()->defaultValue(new Expression('now()')), // date d'ajout dans la base de donnée
        "auth_key" => $this->string(),

    ]);

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-gains-remboursement',
            'gains',
            'remboursement_id',
            'remboursement',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-gains-user',
            'gains',
            'getter_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('gains');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m181231_112526_gains cannot be reverted.\n";

return false;
}
 */
}
