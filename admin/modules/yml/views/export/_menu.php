<?php

use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= Url::to('/admin/' . $module . '/export') ?>">
            <?php if ($action === 'edit') : ?>
                <i class="fa fa-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/yml', 'Список экспортов') ?>
        </a>
    </li>
    <li <?= ($action === 'create') ? 'class="active"' : '' ?>><a href="<?= Url::to(['/admin/' . $module . '/export/create']) ?>"><?= Yii::t('admin', 'Создать') ?></a></li>
</ul>
<br/>