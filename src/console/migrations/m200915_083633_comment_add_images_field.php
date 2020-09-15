<?php

use concepture\yii2logic\console\migrations\Migration;

/**
 * Class m200915_083633_comment_add_images_field
 */
class m200915_083633_comment_add_images_field extends Migration
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
        $this->addColumn($this->getTableName(), 'images', $this->text());
    }
}