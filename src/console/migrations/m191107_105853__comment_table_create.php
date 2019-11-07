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
            'id' => $this->primaryKey(),
            'entity_id' => $this->integer(),
            'entity_type_id' => $this->integer(),
            'user_id' => $this->integer(),
            'parent_id' => $this->integer(),
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
