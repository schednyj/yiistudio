<?php

use admin\modules\sale\api\Sale;
use admin\modules\page\api\Page;
use yii\helpers\Html;
use yii\helpers\Url;

$page = Page::get('page-sale');

$this->title = $page->seo('title');
$this->params['description'] = $page->seo('description');
$this->params['keywords'] = $page->seo('keywords');
$this->params['breadcrumbs'][] = $page->title;
?>
<h1><?= $page->seo('h1') ?></h1>
<br/>
<?php if (count($sale)) { ?>
    <?php foreach ($sale as $item) : ?>
        <div class="row">
            <div class="col-md-10">
                <span class="label label-primary"><?= $item->date ?></span> <?= Html::a($item->title, ['/sale', 'slug' => $item->slug]) ?>
                <p class="mt-10"><?= $item->short ?></p>
                <p>
                    <?php foreach ($item->tags as $tag) : ?>
                        <a rel="nofollow" href="<?= Url::to(['/sale', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
                    <?php endforeach; ?>
                </p>
            </div>
            <div class="col-md-2">
                <?php if (!empty($item->image)) {
                    ?>
                    <?= Html::img($item->thumb(160, 120)) ?>
                <?php } ?>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
<?php } else { ?>
    <p><?= Yii::t('admin/sale', 'На данный момент, действующих акций нет') ?></p>
<?php } ?>
<?= Sale::pages() ?>
