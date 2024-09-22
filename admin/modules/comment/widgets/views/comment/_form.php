<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $commentModel \admin\modules\comment\models\Comment */
/* @var $encryptedEntity string */
/* @var $formId string comment form id */
?>
<div class="comment-form-container">
    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => $formId,
            'class' => 'comment-box',
        ],
        'action' => Url::to(['/comment/create', 'entity' => $encryptedEntity]),
        'validateOnChange' => false,
        'validateOnBlur' => false,
    ]); ?>

    <?php echo $form->field($commentModel, 'content', ['template' => '{input}{error}'])->textarea(['placeholder' => Yii::t('admin/comment', 'Добавить комментарий...'), 'rows' => 4, 'data' => ['comment' => 'content']]) ?>
    <?php echo $form->field($commentModel, 'parentId', ['template' => '{input}'])->hiddenInput(['data' => ['comment' => 'parent-id']]); ?>
    <div class="comment-box-partial">
        <div class="button-container show">
            <?php echo Html::a(Yii::t('admin/comment', 'Нажмите здесь, чтобы отменить ответ'), '#', ['id' => 'cancel-reply', 'class' => 'pull-right', 'data' => ['action' => 'cancel-reply']]); ?>
            <?php echo Html::submitButton(Yii::t('admin/comment', 'Опубликовать комментарий'), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
    <?php $form->end(); ?>
    <div class="clearfix"></div>
</div>
