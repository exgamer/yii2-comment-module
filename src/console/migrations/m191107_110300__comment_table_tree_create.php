<?php

use concepture\yii2logic\console\migrations\Migration;

/**
 * Class m191107_110300__comment_table_tree_create
 */
class m191107_110300__comment_table_tree_create extends Migration
{
    function getTableName()
    {
        return 'comment_tree';
    }

    public function up()
    {
        $this->addTable([
            'parent_id' => $this->integer(),
            'child_id' => $this->integer(),
            'level' => $this->integer(),
            'is_root' => $this->integer()
        ]);
        $this->addPK(['parent_id', 'child_id', 'level']);
        $this->addIndex(['parent_id']);
        $this->addIndex(['child_id']);
        $this->addIndex(['level']);
        $this->addIndex(['is_root']);
        $this->addIndex(['parent_id', 'child_id', 'level']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191107_110300__comment_table_tree_create cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191107_110300__comment_table_tree_create cannot be reverted.\n";

        return false;
    }
    */
}
