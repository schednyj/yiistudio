<?php

use yii\helpers\Html;
use admin\widgets\Redactor;
use yii\widgets\ActiveForm;
use admin\modules\comment\moderation\enums\Status;

/* @var $this yii\web\View */
/* @var $model \admin\modules\comment\models\Comment */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('admin/comment', 'Комментарий: {0}', $model->id);
?>
<?= $this->render('_menu') ?>

<?php $form = ActiveForm::begin(); ?>
<p><?=
    $form->field($model, 'content')->widget(Redactor::className(), [
    ])
    ?>
    <?php echo $form->field($model, 'status')->dropDownList(Status::listData()); ?>
</p>
<p>
    <?php echo Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
</p>
<?php ActiveForm::end(); ?>
