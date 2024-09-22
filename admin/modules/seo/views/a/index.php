<?php

use yii\helpers\Url;

$this->title = Yii::t('admin/seo', 'SEO шаблоны');

$module = $this->context->module->id;
?>

<?= $this->render('_menu') ?>

<?php if ($data->count > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th width="50">#</th>
                <th><?= Yii::t('admin/seo', 'Ключ') ?></th>
                <th><?= Yii::t('admin/seo', 'SEO шаблоны') ?></th>
                <th width="30"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->models as $item) : ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><a href="<?= Url::to(['/admin/' . $module . '/a/edit', 'id' => $item->id]) ?>"><?= $item->slug ?></a></td>
                    <td>
                        TITLE: <?= $item->title ?><br>
                        H1: <?= $item->h1 ?><br>
                        DESCRIPTION: <?= $item->description ?><br>
                        KEYWORDS: <?= $item->keywords ?><br>
                    </td>
                    <td><a href="<?= Url::to(['/admin/' . $module . '/a/delete', 'id' => $item->id]) ?>" class="fa fa-times text-red" title="<?= Yii::t('admin', 'Удалить запись') ?>"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=
    yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination
    ])
    ?>
<?php else : ?>
    <p><?= Yii::t('admin', 'Записи не найдены') ?></p>
<?php endif; ?>