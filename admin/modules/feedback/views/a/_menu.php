<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;

$backTo = null;
$indexUrl = Url::to(['/admin/'.$module]);
$noanswerUrl = Url::to(['/admin/'.$module.'/a/noanswer']);
$allUrl = Url::to(['/admin/'.$module.'/a/all']);
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= $indexUrl ?>">
            <?php if($backTo === 'index') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin', 'Новые') ?>
            <?php if($this->context->new > 0) : ?>
                <span class="badge"><?= $this->context->new ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'noanswer') ? 'class="active"' : '' ?>>
        <a href="<?= $noanswerUrl ?>">
            <?php if($backTo === 'noanswer') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/feedback', 'Не отвеченные') ?>
            <?php if($this->context->noAnswer > 0) : ?>
                <span class="badge"><?= $this->context->noAnswer ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'all') ? 'class="active"' : '' ?>>
        <a href="<?= $allUrl ?>">
            <?php if($backTo === 'all') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin', 'Все') ?>
        </a>
    </li>
    <?php if($action === 'view' && isset($noanswer) && !$noanswer) : ?>
        <li class="pull-right">
            <a href="<?= Url::to(['/admin/'.$module.'/a/set-answer', 'id' => Yii::$app->request->get('id')]) ?>" class="text-warning"><span class="fa fa-check"></span> <?= Yii::t('admin/feedback', 'Отметить как отвеченное') ?></a>
        </li>
    <?php endif; ?>
</ul>
<br>
