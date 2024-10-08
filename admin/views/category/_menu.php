<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= Url::to('/admin/' . $module) ?>">
            <?php if($action != 'index') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin', 'Категории') ?>
        </a>
    </li>
    <li <?= ($action === 'create') ? 'class="active"' : '' ?>><a href="<?= Url::to(['/admin/'.$this->context->moduleName.'/a/create']) ?>"><?= Yii::t('admin', 'Создать категорию') ?></a></li>
</ul>
<br>