<?php
namespace concepture\yii2comment\services;

use Yii;
use concepture\yii2logic\forms\Model;
use concepture\yii2logic\services\Service;
use concepture\yii2logic\services\traits\TreeReadTrait;
use concepture\yii2logic\services\traits\StatusTrait;
use concepture\yii2user\enum\UserRoleEnum;


/**
 * Class CommentServices
 * @package concepture\yii2comment\services
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentService extends Service
{
    use TreeReadTrait;
    use StatusTrait;

    protected function beforeCreate(Model $form)
    {
        if (! $form->user_id){
            /**
             * Для случаев когда нужно разрешить оставлять коменты гостям, без указания имени и почты
             * подставляем метку роли гость
             */
            if (! $form->username) {
                $form->username = UserRoleEnum::label(UserRoleEnum::GUEST);
            }
        }
        /**
         * Если указан ID пользователя,
         * обнуляем явное указание username и username формы
         */
        if ($form->user_id){
            $form->username = null;
            $form->username = null;
        }

    }
}
