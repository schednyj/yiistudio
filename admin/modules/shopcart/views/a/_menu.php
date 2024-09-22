<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;

$backTo = null;
$indexUrl = Url::to(['/admin/'.$module]);
$pendingUrl = Url::to(['/admin/'.$module.'/a/pending']);
$processedUrl = Url::to(['/admin/'.$module.'/a/processed']);
$sentUrl = Url::to(['/admin/'.$module.'/a/sent']);
$completedUrl = Url::to(['/admin/'.$module.'/a/completed']);
$failsUrl = Url::to(['/admin/'.$module.'/a/fails']);
$blankUrl = Url::to(['/admin/'.$module.'/a/blank']);
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= $indexUrl ?>">
            <?php if($backTo === 'index') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Все') ?>
            <?php if($this->context->all > 0) : ?>
                <span class="badge"><?= $this->context->all ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'pending') ? 'class="active"' : '' ?>>
        <a href="<?= $pendingUrl ?>">
            <?php if($backTo === 'pending') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'В обработке') ?>
            <?php if($this->context->pending > 0) : ?>
                <span class="badge"><?= $this->context->pending ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'processed') ? 'class="active"' : '' ?>>
        <a href="<?= $processedUrl ?>">
            <?php if($backTo === 'processed') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Обработан') ?>
            <?php if($this->context->processed > 0) : ?>
                <span class="badge"><?= $this->context->processed ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'sent') ? 'class="active"' : '' ?>>
        <a href="<?= $sentUrl ?>">
            <?php if($backTo === 'sent') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Отправлен') ?>
            <?php if($this->context->sent > 0) : ?>
                <span class="badge"><?= $this->context->sent ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'completed') ? 'class="active"' : '' ?>>
        <a href="<?= $completedUrl ?>">
            <?php if($backTo === 'completed') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Выполнен') ?>
        </a>
    </li>
    <li <?= ($action === 'fails') ? 'class="active"' : '' ?>>
        <a href="<?= $failsUrl ?>">
            <?php if($backTo === 'fails') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Ошибка') ?>
        </a>
    </li>
    <li <?= ($action === 'blank') ? 'class="active"' : '' ?>>
        <a href="<?= $blankUrl ?>">
            <?php if($backTo === 'blank') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/shopcart', 'Корзины') ?>
        </a>
    </li>
</ul>
<br>