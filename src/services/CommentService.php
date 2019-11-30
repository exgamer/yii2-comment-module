<?php
namespace concepture\yii2comment\services;

use Yii;
use yii\db\ActiveQuery;
use concepture\yii2logic\forms\Model;
use concepture\yii2logic\services\Service;
use concepture\yii2logic\services\traits\TreeReadTrait;
use concepture\yii2logic\services\traits\StatusTrait;
use concepture\yii2user\enum\UserRoleEnum;
use concepture\yii2user\traits\ServicesTrait as UserServices;
use concepture\yii2user\forms\SignUpForm;
use concepture\yii2handbook\services\traits\ModifySupportTrait as HandbookModifySupportTrait;
use concepture\yii2handbook\services\traits\ReadSupportTrait as HandbookReadSupportTrait;

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
    use HandbookModifySupportTrait;
    use HandbookReadSupportTrait;

    protected function beforeCreate(Model $form)
    {
        $this->setCurrentDomain($form);
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

            /**
             * Если указан email пробуем зарегать пользователя
             * и подставить user_id
             */
            if ($form::$trySignUp && $form->email) {
                $signUpForm = new SignUpForm();
                $signUpForm->username = $form->username;
                $signUpForm->identity = $form->email;
                $signUpForm->validation = Yii::$app->security->generateRandomString(10);
                $user = $this->authService()->signUp($signUpForm);
                if ($user) {
                    $form->user_id = $user->id;
                }
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

    /**
     * Метод для расширения find()
     * !! ВНимание эти данные будут поставлены в find по умолчанию все всех случаях
     *
     * @param ActiveQuery $query
     * @see \concepture\yii2logic\services\Service::extendFindCondition()
     */
    protected function extendQuery(ActiveQuery $query)
    {
        $this->applyDomain($query);
    }
}
