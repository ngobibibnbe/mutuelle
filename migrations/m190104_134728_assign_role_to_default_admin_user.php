<?php

use yii\db\Migration;

/**
 * Class m190104_134728_assign_role_to_default_admin_user
 */
class m190104_134728_assign_role_to_default_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole,1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190104_134728_assign_role_to_default_admin_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190104_134728_assign_role_to_default_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
