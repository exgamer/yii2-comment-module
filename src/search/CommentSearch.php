<?php

namespace concepture\yii2comment\search;

use concepture\yii2comment\models\Comment;
use yii\db\ActiveQuery;

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

    protected function extendQuery(ActiveQuery $query)
    {
        $query->andFilterWhere([
            'id' => $this->id
        ]);
        $query->andFilterWhere([
            'entity_id' => $this->entity_id
        ]);
        $query->andFilterWhere([
            'entity_type_id' => $this->entity_type_id
        ]);
        $query->andFilterWhere([
            'user_id' => $this->user_id
        ]);
    }
}
