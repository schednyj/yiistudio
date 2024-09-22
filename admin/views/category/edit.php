<?php
$this->title = Yii::t('admin', 'Редактировать категорию');
?>
<?= $this->render('_menu') ?>

<?php if(!empty($this->params['submenu'])) echo $this->render('_submenu', ['model' => $model], $this->context); ?>
<?= $this->render('_form', ['model' => $model, 'parent' => $parent]) ?>