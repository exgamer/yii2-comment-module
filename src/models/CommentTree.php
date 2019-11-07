<?php
namespace concepture\yii2comment\models;

use concepture\yii2logic\models\TreeActiveRecord;

/**
 * Class PostCategoryTree
 * @package concepture\yii2comment\models
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentTree extends TreeActiveRecord
{
    public static function tableName()
    {
        return '{{comment_tree}}';
    }
}