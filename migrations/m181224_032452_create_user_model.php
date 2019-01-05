<?php
use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181224_032452_create_user_model
 */
class m181224_032452_create_user_model extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("user", [
            "id" => $this->primaryKey(),
            "social_font" => $this->float()->notNull()->defaultValue(150000),
            "username" => $this->string()->notNull()->unique(),
            "email" => $this->string()->notNull()->unique(),
            "password" => $this->string()->notNull(),
            "first_name" => $this->string()->notNull(), // Prénoms
            "last_name" => $this->string()->notNull(), // Noms
            "is_admin" => $this->boolean()->notNull()->defaultValue(false), // utilisateur est admin?
            "image" => $this->String()->defaultValue("/img/default.jpeg"),
            "is_active" => $this->boolean()->notNull()->defaultValue(true), // utilisateur est actif?
            "created_at" => $this->dateTime()->defaultValue(new Expression('now()')), // date d'ajout dans la base de donnée
            "auth_key" => $this->string(),
        ]);

        $this->insert('user', [
            'username' => 'admin',
            'password' => \Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'email' => 'email@email.com',
            'first_name' => 'chrv',
            'last_name' => 'chrv',
            'is_admin' => true,

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181224_032452_create_user_model cannot be reverted.\n";
        $this->delete("user", [
            "username" => 'admin',
        ]);
        $this->dropTable("user");
        return false;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m181224_032452_create_user_model cannot be reverted.\n";

return false;
}
 */
}
