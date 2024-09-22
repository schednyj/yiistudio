<?php

use yii\helpers\Html;
use admin\helpers\Schema;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPEhtml PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <img src="<?= $message->embed(Yii::getAlias('@app') . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'logo.png'); ?>">
            <?php $this->beginBody() ?>
            <hr>
            <?= $content ?>
            <?php $this->endBody() ?>
            <hr>
            <?= Schema::localBusiness() ?>
    </body>
</html>
<?php $this->endPage() ?>