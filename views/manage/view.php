<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model krok\page\models\Page */
/* @var $layouts [] */
/* @var $templates [] */
/* @var $active [] */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(
            Yii::t('yii', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>

    <?=
    DetailView::widget(
        [
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'title',
                [
                    'label' => Yii::t('page', 'Layout'),
                    'value' => ArrayHelper::getValue($layouts, $model->layout),
                ],
                [
                    'label' => Yii::t('page', 'Template'),
                    'value' => ArrayHelper::getValue($templates, $model->template),
                ],
                [
                    'label' => Yii::t('page', 'Active'),
                    'value' => ArrayHelper::getValue($active, $model->active),
                ],
                'text:html',
                'description',
                'keywords',
            ],
        ]
    ) ?>

</div>
