<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
]); ?>
<?php if($model->image) : ?>
    <img src="<?= $model->image ?>" style="width: 848px">
<?php endif; ?>
<?= $form->field($model, 'image')->fileInput() ?>
<?= $form->field($model, 'link') ?>
<?php if($this->context->module->settings['enableTitle']) : ?>
    <?= $form->field($model, 'title')->textarea() ?>
<?php endif; ?>
<?php if($this->context->module->settings['enableText']) : ?>
    <?= $form->field($model, 'text')->textarea() ?>
<?php endif; ?>
<?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>