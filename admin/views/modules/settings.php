<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
?>
<?= $this->render('_menu') ?>
<?= $this->render('_submenu', ['model' => $model]) ?>

<?php if (sizeof($model->settings) > 0) : ?>
    <?= Html::beginForm(); ?>
    <?php foreach ($model->settings as $key => $value) : ?>
        <?php if (is_array($value)) : ?>
            <?= Html::hiddenInput('text', 'Settings[' . $key . ']', $value, ['class' => 'form-control']); ?>
        <?php elseif (!is_bool($value)) : ?>
            <div class="form-group">
                <label><?= $key; ?></label>
                <?= Html::input('text', 'Settings[' . $key . ']', $value, ['class' => 'form-control']); ?>
            </div>
        <?php else : ?>
            <div class="checkbox">
                <label>
                    <?= Html::checkbox('Settings[' . $key . ']', $value, ['uncheck' => 0]) ?> <?= $key ?>
                </label>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
    <?php Html::endForm(); ?>
<?php else : ?>
    <?= $model->title ?> <?= Yii::t('admin', 'модуль не имеет никаких настроек') ?>
<?php endif; ?>
<a href="<?= Url::to(['/admin/modules/restore-settings', 'id' => $model->id]) ?>" class="pull-right text-warning"><i class="glyphicon glyphicon-flash"></i> <?= Yii::t('admin', 'Восстановить настройки по-умолчанию') ?></a>

<div class="row mt-40">
    <div class="col-md-4">
        <a href="<?= Url::to(['/admin/modules/migrate-down', 'id' => $model->id]) ?>" class="btn btn-default btn-block"><i class="fa fa-angle-double-down"></i> <?= Yii::t('admin', 'Миграция: откат на предыдущую') ?></a>
    </div> 
    <div class="col-md-4">
        <a href="<?= Url::to(['/admin/modules/migrate', 'id' => $model->id]) ?>" class="btn btn-default btn-block"><i class="fa fa-angle-double-up"></i> <?= Yii::t('admin', 'Миграция: накатить следующую') ?></a>
    </div>
   
</div>           