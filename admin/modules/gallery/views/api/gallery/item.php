<?php

use admin\modules\page\api\Page;
use admin\modules\carousel\api\SlickLightbox;

$this->title = $album->seo('title', $album->model->title);

$page = Page::get('page-gallery');

$this->params['breadcrumbs'][] = ['label' => $page->model->title, 'url' => ['/gallery']];
$this->params['breadcrumbs'][] = $album->model->title;
?>
<h1><?= $album->seo('h1', $album->title) ?></h1>


<?php if (count($photos)) { ?>
    <?php
    SlickLightbox::begin([
    ]);
    ?>
    <?php foreach ($photos as $photo) { ?>
        <?= $photo->box(200, 200) ?>
    <?php } ?>
    <?php SlickLightbox::end(); ?>
    <br/>
<?php } else { ?>
    <p><?= Yii::t('admin/gallery', 'Нет изображений') ?></p>
<?php } ?>
<?=
$album->pages([
    'prevPageLabel' => '<i class="fa fa-fw fa-long-arrow-left"></i>',
    'nextPageLabel' => '<i class="fa fa-fw fa-long-arrow-right"></i>',
    'disabledListItemSubTagOptions' => ['tag' => 'li', 'style' => 'display:none']
])
?>
