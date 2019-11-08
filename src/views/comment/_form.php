<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
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
    <?= $form->field($model, 'entity_type_id')->dropDownList(\Yii::$app->entityTypeService->catalog());?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'allowedContent' => true,
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
