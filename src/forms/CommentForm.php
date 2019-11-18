<?php
namespace concepture\yii2comment\forms;


use Yii;
use concepture\yii2logic\forms\Form;
use concepture\yii2logic\enum\StatusEnum;

/**
 * Class CommentForm
 * @package concepture\yii2comment\forms
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentForm extends Form
{
    public $user_id;
    public $parent_id;
    public $entity_id;
    public $entity_type_id;
    public $username;
    public $email;
    public $title;
    public $content;
    public $status = StatusEnum::ACTIVE;

    /**
     * @see CForm::formRules()
     */
    public function formRules()
    {
        return [
            [
                [
                    'content',
                    'entity_type_id',
                    'entity_id',
                ],
                'required'
            ],
        ];
    }
}
