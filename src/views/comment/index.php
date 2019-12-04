<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kamaelkz\yii2admin\v1\widgets\formelements\Pjax;
use concepture\yii2handbook\converters\LocaleConverter;
use concepture\yii2logic\enum\StatusEnum;
use concepture\yii2logic\enum\IsDeletedEnum;
use yii\helpers\Url;

$this->setTitle($searchModel::label());
$this->pushBreadcrumbs($this->title);
$this->viewHelper()->pushPageHeader();
?>
<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'searchVisible' => true,
    'searchParams' => [
        'model' => $searchModel
    ],
    'columns' => [
        'id',
        'content',
        'parent_id',
        'entity_id',
        [
            'attribute'=>'entity_type_id',
            'filter'=> Yii::$app->entityTypeService->catalog(),
            'value'=>function($data) {
                return $data->getEntityName();
            }
        ],
        [
            'attribute'=>'user_id',
            'filter'=> Yii::$app->userService->catalog(),
            'value'=>function($data) {
                return $data->getUserName();
            }
        ],
        [
            'attribute'=>'status',
            'filter'=> StatusEnum::arrayList(),
            'value'=>function($data) {
                return $data->statusLabel();
            }
        ],
        'username',
        'email',
        'created_at',
        'updated_at',

        [
            'class'=>'yii\grid\ActionColumn',
        ],
    ],
]); ?>

<?php Pjax::end(); ?>
