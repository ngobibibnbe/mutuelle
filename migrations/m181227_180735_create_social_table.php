<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `social`.
 */
class m181227_180735_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('social', [
            'id' => $this->primaryKey(),
            "user_id"=>$this->integer()->notNull()->unique(),
            "money"=>$this->integer(),
            "dette"=>$this->integer()->defaultValue(0),
            "delay"=>$this->integer(),
            "state"=>$this->tinyInteger()->defaultValue(0),//0 pour waittng;reject;accept;
            "created_at"=>$this->dateTime()->defaultValue(new Expression('now()')),                               // date d'ajout dans la base de donnée
            "auth_key"=>$this->string(),

        ]);

      

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-social-user',
            'social',
            'user_id',
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
        $this->dropTable('social');
    }
}