<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use admin\widgets\Redactor;

$action = $this->context->action->id;
?>
<?php

$form = ActiveForm::begin([
            'enableClientValidation' => true
        ]);
?>
<?= $form->field($model, 'subject') ?>
<?=

$form->field($model, 'body')->widget(Redactor::className(), [
    'options' => [
    ]
])
?>
<?php if ($action === 'edit') { ?>
    <?= $form->field($model, 'mailing_list')->textarea() ?>
<?php } ?>
<?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>