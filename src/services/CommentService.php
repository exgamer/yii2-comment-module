<?php
namespace concepture\yii2comment\services;

use Yii;
use concepture\yii2logic\forms\Model;
use concepture\yii2logic\services\Service;
use concepture\yii2logic\services\traits\TreeReadTrait;
use concepture\yii2logic\services\traits\StatusTrait;
use concepture\yii2user\enum\UserRoleEnum;
use concepture\yii2user\traits\ServicesTrait as UserServices;

/**
 * Class CommentServices
 * @package concepture\yii2comment\services
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class CommentService extends Service
{
    use TreeReadTrait;
    use StatusTrait;
    use UserServices;

    protected function beforeCreate(Model $form)
    {
        /**
         * Если ID пользователя не указан,
         * проверяем поля username и username формы на заполнение
         * и если там пусто заполняем username дефолтным значением
         */
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
            $form->email = null;
        }

    }

    protected function afterCreate(Model $form)
    {
        /**
         * После создания коммента если указан email
         * добавляем его в  справочник почтовых адресов
         */
        if ($form->email) {
            $this->emailHandbookService()->addEmail($form->email);
        }
    }
}
