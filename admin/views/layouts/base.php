<?php

use yii\helpers\Html;
use admin\helpers\AjaxModalPopup;

if($this->context->module->id != 'admin')
{
    $appAssetPath = '\\' . Yii::$app->id . '\assets\AppAsset';
    $appAsset = $appAssetPath::register($this);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>        
        <meta charset="<?= Yii::$app->charset ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta content="<?= Html::encode($this->params['description']) ?>" name="description">
        <meta content="<?= Html::encode($this->params['keywords']) ?>" name="keywords">
        <link rel="shortcut icon" href="<?= $appAsset->baseUrl ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= $appAsset->baseUrl ?>/favicon.ico" type="image/x-icon">        
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
        <?php AjaxModalPopup::renderModal() ?>
        <?= \admin\widgets\Counters::widget(); ?>
    </body>
</html>
<?php $this->endPage() ?>