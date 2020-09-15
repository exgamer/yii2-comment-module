<?php

use concepture\yii2logic\console\migrations\Migration;

/**
 * Class m200915_083616_change_comment_updated_at_type
 */
class m200915_083616_change_comment_updated_at_type extends Migration
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
        $this->alterColumn($this->getTableName(),'updated_at', $this->dateTime()->defaultValue(new \yii\db\Expression("NULL ON UPDATE CURRENT_TIMESTAMP")));
    }
}