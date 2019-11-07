<?php
namespace concepture\yii2comment\traits;

use concepture\yii2comment\services\CommentService;
use Yii;

/**
 * Trait ServicesTrait
 * @package concepture\yii2comment\traits
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
trait ServicesTrait
{
    /**
     * @return CommentService
     */
    public function commentService()
    {
        return Yii::$app->commentService;
    }
}

