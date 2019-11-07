<?php

namespace concepture\yii2comment\search;

use concepture\yii2comment\models\Comment;

/**
 * Class CommentSearch
 * @package concepture\yii2handbook\search
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'entity_id',
                    'entity_type_id',
                    'user_id',
                ],
                'integer'
            ]
        ];
    }
}
