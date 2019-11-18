<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use concepture\yii2logic\enum\StatusEnum;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (! isset($originModel) || (isset($originModel) && $originModel->isNewRecord)) : ?>
        <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>
        <?= Html::activeLabel($model, 'user_id')?>
        <?= \yii\jui\AutoComplete::widget([
            'name' => 'name',
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'source' => \yii\helpers\Url::to(['/user/user/list']),
                'minLength'=>'2',
                'autoFill'=>true,
                'select' => new \yii\web\JsExpression("function( event, ui ) {
                        $('#commentform-user_id').val(ui.item.id);
                 }")]
        ]); ?>
        <?= Html::error($model, 'user_id')?>
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'parent_id')->textInput() ?>
        <?= $form->field($model, 'entity_type_id')->dropDownList(\Yii::$app->entityTypeService->catalog());?>
        <?= $form->field($model, 'entity_id')->textInput() ?>
    <?php endif;?>
    <?= $form->field($model, 'content')->textarea(['rows' => '6']) ?>
    <?= $form->field($model, 'status')->dropDownList(StatusEnum::arrayList());?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
