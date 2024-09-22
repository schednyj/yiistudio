<?php

use yii\helpers\Url;
use admin\modules\carousel\api\SlickLightbox;

$this->title = $news->seo('title');
$this->params['description'] = $news->seo('description');
$this->params['keywords'] = $news->seo('keywords');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin/news', 'Новости'), 'url' => ['/news']];
$this->params['breadcrumbs'][] = $news->title;
?>
<h1><?= $news->seo('h1') ?></h1>
<br><span class="label label-primary"><?= $news->date ?></span><br><br>
<?= $news->text ?>
<?php if (count($news->photos)) : ?>
<p>   
    <?php
    SlickLightbox::begin([
    ]);
    ?>
    <?php foreach ($news->photos as $photo) : ?>
        <?= $photo->box(100, 100) ?>
    <?php endforeach; ?>
    <?php SlickLightbox::end(); ?>
</p>
<?php endif; ?>
<p>
    <?php foreach ($news->tags as $tag) : ?>
        <a rel="nofollow" href="<?= Url::to(['/news', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
    <?php endforeach; ?>
</p>

<small class="text-muted"><?= Yii::t('admin/news', 'Просмотров') ?>: <?= $news->views ?></small>