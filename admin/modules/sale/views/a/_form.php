<?php

use kartik\datetime\DateTimePicker;
use admin\helpers\Image;
use admin\widgets\TagsInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use admin\widgets\Redactor;
use admin\modules\seo\widgets\SeoTextForm;

$module = $this->context->module->id;
?>
<?php
$form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
        ]);
?>
<?= $form->field($model, 'title') ?>
<?php if ($this->context->module->settings['enableThumb']) : ?>
    <?php if ($model->image) : ?>
        <img src="<?= Image::thumb($model->image, 180) ?>">
        <a href="<?= Url::to(['/admin/' . $module . '/a/clear-image', 'id' => $model->id]) ?>" class="text-danger text-red" title="<?= Yii::t('admin', 'Сбросить изображение') ?>"><?= Yii::t('admin', 'Сбросить изображение') ?></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>
<?php endif; ?>

<?= $form->field($model, 'short')->textarea() ?>
<?=
$form->field($model, 'text')->widget(Redactor::className(), [
    'options' => [
        'imageUpload' => Url::to(['/admin/redactor/upload', 'dir' => 'news']),
        'fileUpload' => Url::to(['/admin/redactor/upload', 'dir' => 'news']),
    ]
])
?>
        



<?= $form->field($model, 'time')->widget(DateTimePicker::className()); ?>

<?php if ($this->context->module->settings['enableTags']) : ?>
    <?= $form->field($model, 'tagNames')->widget(TagsInput::className()) ?>
<?php endif; ?>


<?= $form->field($model, 'slug') ?>
<br>
<br>
<?= $form->field($model, 'banner_background_color') ?>
<?= $form->field($model, 'banner_border_color') ?>
<?= $form->field($model, 'banner_title')->textarea() ?>
<?= $form->field($model, 'banner_content_text')->textarea() ?>
<?= $form->field($model, 'banner_content_button')->textarea() ?>
        
        
<?= SeoTextForm::widget(['model' => $model]) ?>


<?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
