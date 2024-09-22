<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $category->seo('title', $category->model->title);
$this->params['breadcrumbs'][] = $category->model->title;
?>
<h1><?= $category->seo('h1', $category->title) ?></h1>
<br/>

<?php if (count($items)) : ?>
    <?php foreach ($items as $item) : ?>
        <div class="row">
            <div class="col-md-10">
                <h4><?= Html::a($item->title, ['/article/item', 'category' => $category->slug, 'slug' => $item->slug]) ?></h4>
                <p><?= $item->short ?></p>
                <p>
                    <?php foreach ($item->tags as $tag) : ?>
                        <a rel="nofollow" href="<?= Url::to(['/article', 'slug' => $item->category->slug, 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
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
<?php else : ?>
    <p><?= Yii::t('admin/article', 'Нет элементов для отображения') ?></p>
<?php endif; ?>

<?=
$category->pages([
    'prevPageLabel' => '<i class="fa fa-fw fa-long-arrow-left"></i>',
    'nextPageLabel' => '<i class="fa fa-fw fa-long-arrow-right"></i>',
    'disabledListItemSubTagOptions' => ['tag' => 'li', 'style' => 'display:none']
])
?>
