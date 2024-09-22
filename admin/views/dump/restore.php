<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = Yii::t('admin', 'Восстановить');
?>
<?= $this->render('_menu') ?>

<b><?= Yii::t('admin', 'Восстановить') . ': ' . $file ?></b>
<br>
<br>
<?php
$form = ActiveForm::begin([
            'action' => ['restore', 'id' => $id],
            'method' => 'post',
        ])
?>

<?= $form->errorSummary($model) ?>

<?= $form->field($model, 'restoreScript')->checkbox() ?>

<?php if ($model->hasPresets()): ?>
    <?= $form->field($model, 'preset')->dropDownList($model->getCustomOptions(), ['prompt' => '']) ?>
<?php endif ?>

<?= Html::submitButton(Yii::t('admin', 'Восстановить'), ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>


