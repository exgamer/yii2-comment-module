<?php

use concepture\yii2logic\console\migrations\Migration;

/**
 * Class m191107_105853__comment_table_create
 */
class m191107_105853__comment_table_create extends Migration
{
    function getTableName()
    {
        return 'comment';
    }

    public function up()
    {
        $this->addTable([
            'id' => $this->bigPrimaryKey(),
            'entity_id' => $this->bigInteger()->notNull(),
            'entity_type_id' => $this->bigInteger()->notNull(),
            'user_id' => $this->bigInteger(),
            'username' => $this->string(100),
            'email' => $this->string(100),
            'parent_id' => $this->bigInteger(),
            'title' => $this->string(1024),
            'content' => $this->text()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultValue(new \yii\db\Expression("NOW()")),
            'updated_at' => $this->dateTime()->append('ON UPDATE NOW()'),
        ]);
        $this->addIndex(['entity_id']);
        $this->addIndex(['entity_type_id']);
        $this->addIndex(['user_id']);
        $this->addIndex(['parent_id']);
        $this->addIndex(['status']);
        $this->addForeign('user_id', 'user','id');
        $this->addForeign('parent_id', 'comment','id');
        $this->addForeign('entity_type_id', 'entity_type','id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191107_105853__comment_table_create cannot be reverted.\n";

        return false;
    }
    */
}
