<?php

use yii\helpers\Html;
use kamaelkz\yii2admin\v1\widgets\ {
    formelements\multiinput\MultiInput,
    formelements\editors\froala\FroalaEditor,
    formelements\activeform\ActiveForm,
    formelements\Pjax,
    formelements\pickers\DatePicker,
    formelements\pickers\TimePicker
};
use concepture\yii2banner\enum\BannerTypesEnum;
use concepture\yii2handbook\enum\TargetAttributeEnum;
use kamaelkz\yii2admin\v1\modules\uikit\enum\UiikitEnum;
use kamaelkz\yii2cdnuploader\enum\StrategiesEnum;
use kamaelkz\yii2cdnuploader\widgets\CdnUploader;
use concepture\yii2logic\enum\StatusEnum;
?>

<?php Pjax::begin(['formSelector' => '#commentform-form']); ?>
<?php $form = ActiveForm::begin(['id' => 'commentform-form']); ?>
<?= $form->errorSummary($model);?>
    <div class="card">
        <div class="card-body text-right">
            <?=  Html::submitButton(
                '<b><i class="icon-checkmark3"></i></b>' . Yii::t('yii2admin', 'Сохранить'),
                [
                    'class' => 'btn bg-success btn-labeled btn-labeled-left ml-1'
                ]
            ); ?>
        </div>
        <div class="card-body">
            <?php if (! isset($originModel) || (isset($originModel) && $originModel->isNewRecord)) : ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= Html::activeHiddenInput($model, 'user_id') ?>
                    <?= Html::activeLabel($model, 'user_id')?>
                    <?= \yii\jui\AutoComplete::widget([
                        'name' => 'name',
                        'value' => $model->getUserName(),
                        'options' => ['class' => 'form-control'],
                        'clientOptions' => [
                            'source' => \yii\helpers\Url::to(['/user/user/list']),
                            'minLength'=>'2',
                            'autoFill'=>true,
                            'select' => new \yii\web\JsExpression("function( event, ui ) {
                                        $('#commentform-user_id').val(ui.item.id);
                                 }")]
                    ]); ?>
                    <?= Html::error($model, 'user_id', ['class' => 'text-danger form-text'])?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form->field($model, 'parent_id')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form
                        ->field($model, 'entity_type_id')
                        ->dropDownList(Yii::$app->entityTypeService->catalog(), [
                            'class' => 'form-control custom-select',
                            'prompt' => ''
                        ]);
                    ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form->field($model, 'entity_id')->textInput(['maxlength' => true]) ?>
                </div>
                <?php endif;?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <?= $form
                        ->field($model, 'status')
                        ->dropDownList(StatusEnum::arrayList(), [
                            'class' => 'form-control custom-select',
                            'prompt' => ''
                        ]);
                    ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?= $form->field($model, 'content')->textarea(); ?>
                </div>

            </div>
        </div>
        <div class="card-body text-right">
            <?=  Html::submitButton(
                '<b><i class="icon-checkmark3"></i></b>' . Yii::t('yii2admin', 'Сохранить'),
                [
                    'class' => 'btn bg-success btn-labeled btn-labeled-left ml-1'
                ]
            ); ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>