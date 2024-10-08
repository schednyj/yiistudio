<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;

$backTo = null;
$indexUrl = Url::to(['/admin/'.$module]);
$noanswerUrl = Url::to(['/admin/'.$module.'/a/noanswer']);

?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= $indexUrl ?>">
            <?php if($backTo === 'index') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin', 'Все') ?>
        </a>
    </li>
    <li <?= ($action === 'noanswer') ? 'class="active"' : '' ?>>
        <a href="<?= $noanswerUrl ?>">
            <?php if($backTo === 'noanswer') : ?>
                <i class="glyphicon glyphicon-chevron-left fs-12"></i>
            <?php endif; ?>
            <?= Yii::t('admin/guestbook', 'Без ответа') ?>
            <?php if($this->context->noAnswer > 0) : ?>
                <span class="badge"><?= $this->context->noAnswer ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li class="pull-right">
        <?php if($action === 'view') : ?>
            <a href="<?= Url::to(['/admin/'.$module.'/a/setnew', 'id' => Yii::$app->request->get('id')]) ?>" class="text-warning"><span class="glyphicon glyphicon-eye-close"></span> <?= Yii::t('admin/guestbook', 'Пометить как новое') ?></a>
        <?php else : ?>
            <a href="<?= Url::to(['/admin/'.$module.'/a/viewall']) ?>" class="text-warning"><span class="fa fa-eye"></span> <?= Yii::t('admin/guestbook', 'Отметить все как прочитанные') ?></a>
        <?php endif; ?>
    </li>
</ul>
<br>
