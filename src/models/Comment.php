<?php
namespace concepture\yii2comment\models;

use Yii;
use concepture\yii2logic\models\ActiveRecord;
use concepture\yii2logic\models\traits\HasTreeTrait;
use concepture\yii2logic\models\traits\StatusTrait;
use concepture\yii2handbook\models\traits\EntityTypeTrait;
use concepture\yii2user\models\traits\UserTrait;

/**
 * Comment model
 *
 * @property integer $id
 * @property integer $entity_id
 * @property integer $entity_type_id
 * @property integer $user_id
 * @property integer $parent_id
 * @property string $title
 * @property string $username
 * @property string $email
 * @property string $content
 * @property integer $status
 * @property datetime $created_at
 * @property datetime $updated_at
 *
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class Comment extends ActiveRecord
{
    use HasTreeTrait;
    use StatusTrait;
    use EntityTypeTrait;
    use UserTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'status',
                    'user_id',
                    'parent_id',
                    'entity_id',
                    'entity_type_id',
                ],
                'integer'
            ],
            [
                [
                    'title',
                ],
                'string',
                'max'=>1024
            ],
            [
                [
                    'username',
                ],
                'string',
                'max'=>100
            ],
            [
                [
                    'email',
                ],
                'email'
            ],
            [
                [
                    'content',
                ],
                'string',
                'max'=>2048
            ],
            [
                [
                    'email',
                    'username',
                ],
                'trim'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('comment','#'),
            'entity_id' => Yii::t('comment','ID сущности'),
            'entity_type_id' => Yii::t('comment','Сущность'),
            'user_id' => Yii::t('comment','Пользователь'),
            'username' => Yii::t('comment','Имя'),
            'email' => Yii::t('comment','email'),
            'parent_id' => Yii::t('comment','ID родителя'),
            'title' => Yii::t('comment','Заголовок'),
            'content' => Yii::t('comment','Комментарий'),
            'status' => Yii::t('comment','Статус'),
            'domain' => Yii::t('comment','Домен'),
            'created_at' => Yii::t('comment','Дата создания'),
            'updated_at' => Yii::t('comment','Дата обновления'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->bindTree();
        return parent::afterSave($insert, $changedAttributes);
    }



    public function beforeDelete()
    {
        $this->removeTree();
        return parent::beforeDelete();
    }
}
