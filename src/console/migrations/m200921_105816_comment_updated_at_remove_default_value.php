<?php

use concepture\yii2logic\console\migrations\Migration;

/**
 * Class m200921_105816_comment_updated_at_remove_default_value
 */
class m200921_105816_comment_updated_at_remove_default_value extends Migration
{
    /**
     * @return string
     */
    public function getTableName()
    {
        return 'comment';
    }

    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->alterColumn($this->getTableName(),'updated_at', $this->dateTime()->defaultValue(null));
    }
}