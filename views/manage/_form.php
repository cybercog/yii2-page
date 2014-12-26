<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use krok\imperavi\widgets\ImperaviWidget;

/* @var $this yii\web\View */
/* @var $model krok\page\models\Page */
/* @var $form yii\widgets\ActiveForm */
/* @var $layouts [] */
/* @var $templates [] */
/* @var $active [] */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?=
    $form->field($model, 'text')->widget(
        ImperaviWidget::className(),
        [
            'clientOptions' => [
                'buttonSource' => true,
                'fileUpload' => Yii::$app->getUrlManager()->createUrl(['/cp/imperavi/manage/FileUpload']),
                'fileManagerJson' => Yii::$app->getUrlManager()->createUrl(['/cp/imperavi/manage/FileList']),
                'imageUpload' => Yii::$app->getUrlManager()->createUrl(['/cp/imperavi/manage/ImageUpload']),
                'imageManagerJson' => Yii::$app->getUrlManager()->createUrl(['/cp/imperavi/manage/ImageList']),
                'definedLinks' => Yii::$app->getUrlManager()->createUrl(['/cp/imperavi/manage/PageList']),
                'plugins' => [
                    'filemanager',
                    'imagemanager',
                    'definedlinks',
                    'fontfamily',
                    'fontcolor',
                    'fontsize',
                    'table',
                    'video',
                ],
            ],
        ]
    ) ?>

    <?= $form->field($model, 'layout')->dropDownList($layouts) ?>

    <?= $form->field($model, 'template')->dropDownList($templates) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'active')->dropDownList($active) ?>

    <div class="form-group">
        <?=
        Html::submitButton(
            $model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
