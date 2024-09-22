<?php

use admin\helpers\Image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use admin\modules\seo\widgets\SeoTextForm;
use admin\modules\seo\widgets\SeoTemplateForm;
use admin\widgets\Redactor;
use kartik\datetime\DateTimePicker;

$class = $this->context->categoryClass;
$settings = $this->context->module->settings;
?>
<?php
$form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>
<?= $form->field($model, 'title') ?>
<?php
$parents = [];
if ($model->id) {
    $parents = $class::find()->where(['<>', 'id', $model->id])->sort()->asArray()->all();
} else {
    $parents = $class::find()->sort()->asArray()->all();
}
?>
<div class="form-group field-category-title required">
    <label for="category-parent" class="control-label"><?= Yii::t('admin', 'Родительская категория') ?></label>
    <select class="form-control" id="category-parent" name="parent">
        <option value="" class="text-muted"><?= Yii::t('admin', '(нет)') ?></option>
        <?php foreach ($parents as $node) : ?>
            <option
                value="<?= $node['id'] ?>"
                <?php if ($parent == $node['id']) echo 'SELECTED' ?>
                style="padding-left: <?= $node['depth'] * 20 ?>px;"
                ><?= $node['title'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<?php if ($settings['categoryThumb']) : ?>
    <?php if ($model->image) : ?>
        <img src="<?= Image::thumb($model->image, 180) ?>">
        <a href="<?= Url::to(['/admin/' . $this->context->moduleName . '/a/clear-image', 'id' => $model->primaryKey]) ?>" class="text-danger text-red" title="<?= Yii::t('admin', 'Сбросить изображение') ?>"><?= Yii::t('admin', 'Сбросить изображение') ?></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'slug') ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'time')->widget(DateTimePicker::className()); ?>
    </div>
</div>
<?php if (in_array('description', $model->attributes())) { ?>
    <?=
    $form->field($model, 'description')->widget(Redactor::className(), [
        'options' => [
            'imageUpload' => Url::to(['/admin/redactor/upload', 'dir' => 'catalog'], true),
            'fileUpload' => Url::to(['/admin/redactor/upload', 'dir' => 'catalog'], true),
        ]
    ])
    ?>       
<?php } ?>
<?= SeoTextForm::widget(['model' => $model]) ?>
<?= SeoTemplateForm::widget(['model' => $model]) ?>



<?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>