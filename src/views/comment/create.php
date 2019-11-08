<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model concepture\user\models\User */

$this->title = Yii::t('backend', 'Добавить комментарий');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Комментарии'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>