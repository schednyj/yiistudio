<?php

use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>><a href="<?= Url::to(['/admin/dump']) ?>"> <?php if($action != 'index') { ?><i class="glyphicon glyphicon-chevron-left fs-12"></i> <?php } ?><?= Yii::t('admin', 'Бэкапы') ?></a></li>
</ul>
<br>


