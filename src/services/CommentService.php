<?php
namespace concepture\yii2comment\services;


use concepture\yii2logic\services\Service;
use concepture\yii2logic\services\traits\TreeReadTrait;
use concepture\yii2logic\services\traits\StatusTrait;


/**
 * Class CommentServices
 * @package concepture\yii2comment\services
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentService extends Service
{
    use TreeReadTrait;
    use StatusTrait;
}
